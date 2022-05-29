<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ {
    LoginController,
    VerificationController
};

/*
|--------------------------------------------------------------------------
| Auth  & Verified Routes
|--------------------------------------------------------------------------
|
| Routes that can only be access by authenticated and verified user
|
*/

Route::middleware('verified:auth.verification.notice')->group(function () {
    Route::middleware('role:ADMIN')->group(function () {
        Route::inertia('/admin', 'Benefactor/Index')->name('admin.index');
    });

    Route::middleware('role:CHARITY_SUPER_ADMIN,CHARITY_ADMIN')->group(function () {
        Route::inertia('/charity', 'Charity/Index')->name('charity.index');
    });

    Route::middleware('role:BENEFACTOR')->group(function () {
        Route::inertia('/benefactor', 'Benefactor/Index')->name('benefactor.index');
    });
});


/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
| Routes that can be access by authenticated user
|
*/

Route::name('auth.')->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');

    Route::middleware('throttle:6,1')->group(function () {
        Route::post('/email/verification-notification', [VerificationController::class, 'resend'])
            ->name('verification.send');

        Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
            ->name('verification.verify')
            ->middleware('signed');
    });
});

