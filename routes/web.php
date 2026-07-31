<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});

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

    return back()->withErrors([
        'email' => 'Invalid email or password.',
    ]);

})->name('login.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware('auth')
    ->name('dashboard');

Route::post('/logout', function (Request $request) {

    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login');

})->name('logout');

Route::get('/phone-login', function () {
    return view('phone-login');
})->name('phone.login');



Route::post('/phone/send-otp', function (Request $request) {

    $request->validate([
        'phone' => 'required|min:10|max:15'
    ]);

    session([
        'phone_number' => $request->phone,
        'demo_otp' => '123456'
    ]);

    return redirect()->route('verify.otp');

})->name('phone.sendOtp');


Route::get('/verify-otp', function () {

    if (!session()->has('phone_number')) {
        return redirect()->route('phone.login');
    }

    return view('verify-otp');

})->name('verify.otp');


Route::post('/verify-otp', function (Request $request) {

    $request->validate([
        'otp' => 'required|digits:6'
    ]);

    if ($request->otp !== session('demo_otp')) {
        return back()->withErrors([
            'otp' => 'Invalid OTP. Use 123456.'
        ]);
    }

    session()->forget('demo_otp');

    return redirect()->route('dashboard');

})->name('verify.otp.submit');

Route::view('/phone-signup', 'phone-signup')
    ->name('phone.signup');

Route::post('/phone-signup', function (Request $request) {

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:20|unique:users,phone',
        'password' => 'required|string|min:8|confirmed',
        'terms' => 'accepted',
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

Route::view('/about', 'about')->name('about');
Route::get('/', function () {
    return view('contact');
});


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::view('/contact', 'contact')->name('contact');
