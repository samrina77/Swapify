<?php

namespace App\Http\Controllers;

use App\Models\ClassSchedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClassScheduleController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $sessions = ClassSchedule::with(['requester', 'teacher'])
            ->where(function ($query) use ($userId) {
                $query->where('requester_id', $userId)
                    ->orWhere('teacher_id', $userId);
            })
            ->orderBy('starts_at')
            ->get();

        $users = User::where('id', '!=', $userId)
            ->orderBy('name')
            ->get(['id', 'name']);

        return view('calendar', compact('sessions', 'users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'teacher_id' => 'required|integer|exists:users,id',
            'skill_name' => 'required|string|max:100',
            'starts_at' => 'required|date|after:now',
            'duration_minutes' => 'required|integer|min:15|max:480',
            'mode' => 'required|in:online,in_person',
            'notes' => 'nullable|string|max:500',
        ]);

        if ((int) $validated['teacher_id'] === (int) Auth::id()) {
            return back()
                ->withInput()
                ->withErrors([
                    'teacher_id' => 'You cannot send a schedule request to yourself.',
                ]);
                
        }

        $teacher = User::findOrFail($validated['teacher_id']);

        $schedule = ClassSchedule::create([
            'requester_id' => Auth::id(),
            'teacher_id' => $teacher->id,
            'skill_name' => $validated['skill_name'],
            'starts_at' => $validated['starts_at'],
            'duration_minutes' => $validated['duration_minutes'],
            'mode' => $validated['mode'],
            'status' => 'pending',
            'notes' => $validated['notes'] ?? null,
        ]);

        $classType = $validated['mode'] === 'online'
            ? 'Online'
            : 'In Person';

        $duration = $validated['duration_minutes'] === 60
            ? '1 hour'
            : $validated['duration_minutes'] . ' minutes';

        DB::table('notifications')->insert([
            'id' => Str::uuid()->toString(),

            'type' => 'class_schedule_request',

            'notifiable_type' => 'App\\Models\\User',

            // Notification matched teacher लाई मात्र जान्छ
            'notifiable_id' => $teacher->id,

            'data' => json_encode([
                'schedule_id' => $schedule->id,

                'student_id' => Auth::id(),

                'student_name' => Auth::user()->name,

                'teacher_id' => $teacher->id,

                'teacher_name' => $teacher->name,

                'message' => Auth::user()->name
                    . ' sent you a schedule request for '
                    . $validated['skill_name'],

                'skill' => $validated['skill_name'],

                'date_time' => $validated['starts_at'],

                'duration' => $duration,

                'class_type' => $classType,

                'notes' => $validated['notes'] ?? null,

                'status' => 'pending',
            ]),

            'read_at' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with(
            'success',
            'Schedule request sent to ' . $teacher->name . ' successfully.'
        );
    }
public function complete(ClassSchedule $schedule)
{
    if (
        auth()->id() != $schedule->requester_id &&
        auth()->id() != $schedule->teacher_id
    ) {
        abort(403);
    }

    $schedule->update([
        'status' => 'completed',
    ]);

    return back()->with(
        'success',
        'Class marked as completed.'
    );
}

public function approve($scheduleId, $notificationId)
{
    $teacherId = Auth::id();

    $schedule = ClassSchedule::where('id', $scheduleId)
        ->where('teacher_id', $teacherId)
        ->firstOrFail();

    if ($schedule->status === 'approved') {
        return back()->with('success', 'This class has already been approved.');
    }

    $schedule->status = 'approved';
    $schedule->save();

    DB::table('notifications')
        ->where('id', $notificationId)
        ->where('notifiable_id', $teacherId)
        ->update([
            'read_at' => now(),
            'updated_at' => now(),
        ]);

    $teacher = User::findOrFail($teacherId);

    DB::table('notifications')->insert([
        'id' => (string) Str::uuid(),
        'type' => 'schedule_approved',
        'notifiable_type' => User::class,
        'notifiable_id' => $schedule->requester_id,

        'data' => json_encode([
            'schedule_id' => $schedule->id,
            'teacher_name' => $teacher->name,
            'skill' => $schedule->skill_name,
            'date_time' => $schedule->starts_at,
            'status' => 'approved',
            'message' => 'Your class with ' .
                $teacher->name .
                ' has been approved.',
        ]),

        'read_at' => null,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return back()->with(
        'success',
        'Class approved successfully.'
    );
}
}