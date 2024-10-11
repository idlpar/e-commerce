<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialController;

Route::get('/test', function () {
    return view('test');
});
Route::get('/', function () {
    // Only verified users can see this page
    return view('home');
})->middleware(['auth', 'verified']);
//Route::get('/', [RegisterController::class, 'verifyOtp'])->name('home');
//Route::post('/verify-otp', [RegisterController::class, 'verifyOtp'])->name('verify.otp');

//Auth::routes();
Auth::routes(['verify' => true]);

// OTP route only for users who are authenticated but not verified
Route::get('/otp', function () {
    // Check if user is authenticated and not verified
    if (Auth::check() && !Auth::user()->hasVerifiedEmail()) {
        return view('auth.otp');
    }

    // If the user is verified, redirect them to home or another route
    return redirect()->route('home');
})->middleware('auth')->name('otp.form');

Route::post('/verify-otp', [\App\Http\Controllers\OtpController::class, 'verifyOtp'])->name('verify.otp');
Route::post('/resend-otp', [\App\Http\Controllers\OtpController::class, 'resendOtp'])->name('resend.otp');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login/{provider}', [SocialController::class, 'redirectToProvider'])->name('social.redirect');
Route::get('/login/{provider}/callback', [SocialController::class, 'handleProviderCallback'])->name('social.callback');
