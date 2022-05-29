<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ {
    LoginController,
    RegisterController,
    GoogleLoginController,
    ResetPasswordController,
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
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('index');

    Route::name('google.')->group(function () {
        Route::get('/login-google-callback', [GoogleLoginController::class, 'handleGoogleCallback']);
        Route::get('/login-google', [GoogleLoginController::class, 'redirectToGoogle'])->name('index');
    });

    Route::name('password.')->group(function () {
        Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('email');
        Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('request');

        Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('update');
        Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('reset');
    });
});

Route::name('register.')->group(function () {
    Route::post('/register', [RegisterController::class, 'register'])->name('store');
    Route::get('/register/benefactor', [RegisterController::class, 'showBenefactorRegistrationForm'])->name('benefactor');
    Route::get('/register/charity', [RegisterController::class, 'showCharityRegistrationForm'])->name('charity');
});
