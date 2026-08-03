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
}