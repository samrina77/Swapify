<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('/about', 'about')->name('about');

Route::view('/contact', 'contact')->name('contact');

Route::view('/login', 'login')->name('login');

Route::view('/signup', 'signup')->name('signup');

Route::post('/signup', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $user = User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
    ]);

    Auth::login($user);

    $request->session()->regenerate();

    return redirect()
        ->route('dashboard')
        ->with('success', 'Account created successfully.');
})->name('signup.store');

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }

    return back()
        ->withErrors([
            'email' => 'Invalid email or password.',
        ])
        ->onlyInput('email');
})->name('login.store');

Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'dashboard')
        ->name('dashboard');

    Route::view('/complete-profile', 'complete-profile')
        ->name('profile.setup');

    Route::post('/complete-profile', function (Request $request) {
        // Profile validation and saving code goes here.
    })->name('profile.store');

    Route::post('/logout', function (Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    })->name('logout');
});

Route::get(
    '/forgot-password',
    [AuthController::class, 'forgotPassword']
)->name('forgot.password');

Route::post(
    '/check-email',
    [AuthController::class, 'checkEmail']
)->name('check.email');

Route::post(
    '/update-password',
    [AuthController::class, 'updatePassword']
)->name('update.password');

Route::view('/phone-login', 'phone-login')
    ->name('phone.login');

    Route::view('/phone-signup', 'phone-signup')
    ->name('phone.signup');

    Route::post('/phone-login', function () {
    return redirect()->route('otp.verify');
})->name('phone.sendotp');

Route::view('/verify-otp', 'verify-otp')
    ->name('otp.verify');