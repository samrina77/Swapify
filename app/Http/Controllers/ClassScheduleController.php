<?php

namespace App\Http\Controllers;

use App\Models\ClassSchedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

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
        'teacher_id' => 'required|exists:users,id',
        'skill_name' => 'required|string|max:100',
        'starts_at' => 'required|date|after:now',
        'duration_minutes' => 'required|integer',
        'mode' => 'required|in:online,in_person',
        'notes' => 'nullable|string|max:500',
    ]);

    ClassSchedule::create([
        'requester_id' => Auth::id(),
        'teacher_id' => $validated['teacher_id'],
        'skill_name' => $validated['skill_name'],
        'starts_at' => $validated['starts_at'],
        'duration_minutes' => $validated['duration_minutes'],
        'mode' => $validated['mode'],
        'status' => 'pending',
        'notes' => $validated['notes'] ?? null,
    ]);

    return redirect()
        ->route('dashboard')
        ->with('success', 'Class schedule request added successfully.');

        
}
}