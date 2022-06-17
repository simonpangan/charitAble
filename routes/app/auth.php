<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\ {
    LoginController,
    VerificationController
};

use App\Http\Controllers\Benefactor\{
    BenefactorLogController,
    BenefactorHomeController,
    BenefactorProfileController,
    BenefactorCharitySearchController,
    BenefactorConnectionsController,
    BenefactorDashboardController,
};

use App\Http\Controllers\Charity\{
    CharityPostsController,
    CharityProfileController,
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


    Route::group([
        'middleware' => 'role:CHARITY_SUPER_ADMIN,CHARITY_ADMIN',
        'as' => 'charity.',
        'prefix' => 'charity',
    ], function () {

        Route::get('/profile', [CharityProfileController::class, 'index'])
            ->name('profile.index');



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
            Route::get('volunteer-posts/create', 'create')->name('volunteer.create');
            Route::get('volunteer-posts/{id}', 'show')->name('volunteer.show');
            Route::get('volunteer-posts/{id}/edit', 'edit')->name('volunteer.edit');
            Route::put('volunteer-posts/{id}', 'update')->name('volunteer.update');
            Route::delete('volunteer-posts/{id}', 'destroy')->name('volunteer.destroy');
        });

        Route::controller(CharityPostsController::class)->group(function(){
            Route::get('post','create')->name('post.create');
            Route::post('post-posts', 'store')->name('post.store');
            Route::post('uploadPostPhoto','uploadPostPhoto')->name('post.store.image');
        });

    });

    Route::group([
        'middleware' => 'role:BENEFACTOR',
        'as' => 'benefactor.',
        'prefix' => 'benefactor',
    ], function () {

        Route::get('/logs', BenefactorLogController::class)
            ->name('logs.index');

        Route::get('/connections',[ BenefactorConnectionsController::class, 'index'])
            ->name('connection.index');

        Route::get('/home', [BenefactorHomeController::class, 'index'])
            ->name('home.index');

        Route::get('/charity-search', [BenefactorCharitySearchController::class, 'index'])
            ->name('charity-search.index');


        Route::get('/dashboard', [BenefactorDashboardController::class, 'index'])
            ->name('dashboard.index');
        

        Route::get('/profile', [BenefactorProfileController::class, 'index'])
            ->name('profile.index');

        Route::put('/profile/update', [BenefactorProfileController::class, 'update'])
            ->name('profile.update');
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

