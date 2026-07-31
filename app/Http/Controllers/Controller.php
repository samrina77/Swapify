<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    // Forgot Password Page
    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }

    // Check Email
    public function checkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'Email not found.');
        }

        return view('auth.reset-password', [
            'email' => $request->email
        ]);
    }

    // Update Password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'User not found.');
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/login')->with('success', 'Password updated successfully.');
    }

}