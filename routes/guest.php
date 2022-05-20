<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ {
    LoginController,
    RegisterController,
    GoogleLoginController,
    ForgotPasswordController,
};

/*
|--------------------------------------------------------------------------
| Guest  Routes
|--------------------------------------------------------------------------
|
| Routes that can only be access by unauthenticated user
|
*/

Route::name('auth.')->group(function () {
//    Route::get('/logout', [LoginController::class, 'logout'])
//        ->name('logout')
//        ->middleware('auth');

    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('index');

    Route::name('google.')->group(function () {
        Route::get('/login-google-callback', [GoogleLoginController::class, 'handleGoogleCallback']);
        Route::get('/login-google', [GoogleLoginController::class, 'redirectToGoogle'])->name('index');
    });

    Route::name('password.')->group(function () {
        Route::get('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('email');
        Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('request');
    });
});

Route::name('register.')->group(function () {
    Route::post('/register', [RegisterController::class, 'register'])->name('store');
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('index');
    Route::get('/register-Step2', [RegisterController::class, 'showRegistrationStep2Form'])->name('index2');
});

//Auth::routes();
