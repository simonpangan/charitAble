<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\ {
    LoginController,
    VerificationController
};

use App\Http\Controllers\Benefactor\{
    BenefactorLogController,
    BenefactorHomeController,
    BenefactorReportController,
    BenefactorProfileController,
    BenefactorDashboardController,
    BenefactorCharitySearchController,
    BenefactorConnectionsCharitiesController,
    BenefactorConnectionsProgramController,
    BenefactorConnectionsVolunteerController,
};

use App\Http\Controllers\Charity\{
    CharityPostsController,
    CharityProfileController,
    CharityProgramController,
    CharityVolunteerPostController
};

use App\Http\Controllers\Admin\ {
    AdminHomeController
};
use App\Http\Controllers\PaymongoController;

/*
|--------------------------------------------------------------------------
| Auth  & Verified Routes
|--------------------------------------------------------------------------
|
| Routes that can only be access by authenticated and verified user
|
*/

Route::middleware('verified:auth.verification.notice')->group(function () {

    Route::group([
        'middleware' => 'role:ADMIN',
        'as' => 'admin.',
        'prefix' => 'admin',
    ], function () {
        Route::get('/home', [AdminHomeController::class, 'index'])->name('home.index');
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
        Route::get('/paymongo', [PaymongoController::class, 'store']);
        Route::get('/paymongo/callback', [PaymongoController::class, 'callback']);
        Route::get('/paymongo/search', [PaymongoController::class, 'search']);


        Route::get('/report/redirect',[ BenefactorReportController::class, 'redirectToGeneratedReport'])
            ->name('report.redirect');
        Route::get('/report',[ BenefactorReportController::class, 'generate'])
            ->name('report.generate')
            ->middleware('signed')
            ;

        Route::get('/logs', BenefactorLogController::class)
            ->name('logs.index');

        Route::get('/connections-charities',[ BenefactorConnectionsCharitiesController::class, 'index'])
            ->name('connections.charities.index');
        Route::delete('/connections/{id}',[ BenefactorConnectionsCharitiesController::class, 'destroy'])
            ->name('connections.charities.destroy');
        Route::post('/connections/',[ BenefactorConnectionsCharitiesController::class, 'store'])
            ->name('connections.charities.store');

        Route::get('/connections-volunteer',[ BenefactorConnectionsVolunteerController::class, 'index'])
            ->name('connections.volunteer.index');


        Route::get('/connections-program',[ BenefactorConnectionsProgramController::class, 'index'])
            ->name('connections.program.index');


        Route::get('/home', [BenefactorHomeController::class, 'index'])
            ->name('home.index');

        Route::get('/charity-search/followers', [BenefactorCharitySearchController::class, 'index'])
            ->name('charity-search.followers.index');


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

