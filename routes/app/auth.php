<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ {
    LoginController,
    VerificationController
};
use App\Http\Controllers\Charity\CharityVolunteerPostController;

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

    Route::group([
            'middleware' => 'role:CHARITY_SUPER_ADMIN,CHARITY_ADMIN', 
            'as' => 'charity.', 
            'prefix' => 'charity'
        ], function () {
            
        Route::post('volunteer', [CharityVolunteerPostController::class, 'store'])->name('volunteer.store');
        // Route::inertia('', 'Charity/Index')->name('charity.index');
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

    Route::post('/email/verification-notification', [VerificationController::class, 'resend'])
        ->name('verification.send')
        ->middleware('throttle:6,1');

    Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
        ->name('verification.verify')
        ->middleware(['signed','throttle:6,1']);
});

