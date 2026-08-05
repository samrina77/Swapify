<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $users = User::with('profile')->get();

        if ($search) {
            $users = $users->filter(function ($user) use ($search) {

                if (!$user->profile || !$user->profile->skills_to_teach) {
                    return false;
                }

                $skills = $user->profile->skills_to_teach;

                if (is_string($skills)) {
                    $skills = json_decode($skills, true);
                }

                return collect($skills)->contains(function ($skill) use ($search) {
                    return stripos($skill, $search) !== false;
                });
            });
        }

        return view('find-skills', compact('users', 'search'));
    }
}