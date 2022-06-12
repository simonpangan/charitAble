<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\ {
    LoginController,
    VerificationController
};

use App\Http\Controllers\Charity\{
    CharityProgramController,
    CharityVolunteerPostController
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

    Route::inertia('/charity', 'Charity/Index')->name('charity.index');

    Route::group([
            'middleware' => 'role:CHARITY_SUPER_ADMIN,CHARITY_ADMIN', 
            'as' => 'charity.', 
            'prefix' => 'charity',
        ], function () {
     
        Route::controller(CharityProgramController::class)->group(function () {
            Route::get('program', 'index')->name('program.index');
            Route::get('program', 'create')->name('program.create');
            Route::post('program', 'store')->name('program.store');
            Route::get('program/{id}', 'show')->name('program.show');
            Route::get('program/{id}/edit', 'edit')->name('program.edit');
            Route::put('program/{id}', 'update')->name('program.update');
            Route::delete('program/{id}', 'destroy')->name('program.destroy');
        });

        Route::controller(CharityVolunteerPostController::class)->group(function () {
            Route::post('volunteer-posts', 'store')->name('volunteer.store');
            Route::get('volunteer-posts/{id}', 'show')->name('volunteer.show');
            Route::get('volunteer-posts/{id}/edit', 'edit')->name('volunteer.edit');
            Route::put('volunteer-posts/{id}', 'update')->name('volunteer.update');
            Route::delete('volunteer-posts/{id}', 'destroy')->name('volunteer.destroy');
        });
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
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');

    Route::post('/email/verification-notification', [VerificationController::class, 'resend'])
        ->name('verification.send')
        ->middleware('throttle:6,1');

    Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
        ->name('verification.verify')
        ->middleware(['signed','throttle:6,1']);
});

