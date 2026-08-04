<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ClassScheduleController; 



    Route::get('/messages', [MessageController::class, 'index'])->name('messages');

    Route::get('/messages/{user}', [MessageController::class, 'chat'])->name('messages.chat');

    Route::post('/messages/send', [MessageController::class, 'send'])->name('messages.send');

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
   Route::get('/dashboard', function () {
    $userId = Auth::id();

    $users = User::where('id', '!=', $userId)
        ->orderBy('name')
        ->get(['id', 'name']);

    $sessions = \App\Models\ClassSchedule::where(function ($query) use ($userId) {
        $query->where('requester_id', $userId)
            ->orWhere('teacher_id', $userId);
    })
        ->orderBy('starts_at')
        ->get();

    return view('dashboard', compact('users', 'sessions'));
})->name('dashboard');

    Route::get('/complete-profile', [ProfileController::class, 'edit'])
    ->name('profile.setup');

Route::post('/complete-profile', [ProfileController::class, 'update'])
    ->name('profile.update');

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

    Route::post('/phone-signup', function (Request $request) {

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:20|unique:users,phone',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $user = User::create([
        'name' => $validated['name'],
        'phone' => $validated['phone'],
        'password' => Hash::make($validated['password']),
    ]);

    Auth::login($user);

    $request->session()->regenerate();

    return redirect()->route('dashboard');

})->name('phone.signup.store');

    Route::post('/phone-login', function () {
    return redirect()->route('otp.verify');
})->name('phone.sendOtp');

Route::view('/verify-otp', 'verify-otp')
    ->name('otp.verify');

Route::post('/verify-otp', function (Request $request) {

    $request->validate([
        'otp' => 'required',
    ]);

    if ($request->otp == '123456') {
        return redirect()->route('dashboard');
    }

    return back()->withErrors([
        'otp' => 'Invalid OTP. Please try again.',
    ]);

})->name('verify.otp.submit');

Route::get('/add-skills', function () {
    return view('add-skills');
})->name('add.skills');
    

Route::get('/calendar', [ClassScheduleController::class, 'index'])
    ->middleware('auth')
    ->name('calendar');

Route::get('/matches', [ProfileController::class, 'findMatches'])
-> middleware('auth')
    ->name('find.matches');

    
Route::post('/calendar/schedule', [ClassScheduleController::class, 'store'])
    ->middleware('auth')
    ->name('calendar.store');




