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
    BenefactorConnectionsProgramController,
    BenefactorCharitySearchProgramController,
    BenefactorConnectionsVolunteerController,
    BenefactorConnectionsCharitiesController,
    BenefactorCharitySearchLocationController,
    BenefactorCharitySearchVolunteerController
};

use App\Http\Controllers\Charity\{
    CharityLogController,
    CharityPostsController,
    CharityProfileController,
    CharityProgramController,
    CharityVolunteerPostController,
    CharityOfficerController
};

use App\Http\Controllers\Admin\ {
    AdminHomeController,
    AdminApprovalController
};

use App\Http\Controllers\BenefactorDonationController;
use App\Http\Controllers\PaymongoController;
use App\Http\Controllers\PaypalPaymentController;
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
        Route::get('/home/documents/{id}', [AdminHomeController::class, 'download'])->name('home.download');
        Route::post('/approval/approve', [AdminApprovalController::class, 'approve'])->name('approval.approve');
        Route::post('/approval/disapprove', [AdminApprovalController::class, 'disApprove'])->name('approval.disapprove');
    });


    Route::group([
        'middleware' => 'role:CHARITY_SUPER_ADMIN,CHARITY_ADMIN',
        'as' => 'charity.',
        'prefix' => 'charity',
    ], function () {

        Route::get('/profile', [CharityProfileController::class, 'index'])
            ->name('profile.index');

        Route::get('/logs', CharityLogController::class)->name('logs.index');

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
            Route::get('post','index')->name('post.index');
            Route::get('post/create','create')->name('post.create');
            Route::post('post-posts', 'store')->name('post.store');
            Route::post('uploadPostPhoto','uploadPostPhoto')->name('post.store.image');
        });

        Route::controller(CharityOfficerController::class)->group(function(){
            Route::get('officer','create')->name('officer.create');
            Route::get('officer/{id}/edit','edit')->name('officer.edit');
            Route::post('officer', 'store')->name('officer.store');
        });

        Route::get('/payment/{id}',[BenefactorDonationController::class,'show'])->name('donate.create');
        Route::get('/payment/success',[BenefactorDonationController::class,'successIndex'])->name('donate.success');

        Route::group(['prefix'=>'payment/paypal'], function(){
            Route::post('/order/create',[PaypalPaymentController::class,'create']);
            Route::post('/order/capture/',[PaypalPaymentController::class,'capture']);
        });

    });

    Route::group([
        'middleware' => 'role:BENEFACTOR',
        'as' => 'benefactor.',
        'prefix' => 'benefactor',
    ], function () {
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

        Route::get('/charity-search/followers', BenefactorCharitySearchController::class)
            ->name('charity-search.followers');
        Route::get('/charity-search/locations', BenefactorCharitySearchLocationController::class)
            ->name('charity-search.location');
        Route::get('/charity-search/programs', BenefactorCharitySearchProgramController::class)
            ->name('charity-search.program');
        Route::get('/charity-search/volunteer', BenefactorCharitySearchVolunteerController::class)
            ->name('charity-search.volunteer');



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


/*
|--------------------------------------------------------------------------
| Payment Routes
|--------------------------------------------------------------------------
|
| Routes that can be access by authenticated user
|
*/

Route::get('/paymongo/gcash', [PaymongoController::class, 'gcash']);
Route::get('/paymongo/callback-gcash', [PaymongoController::class, 'gcashCallback']);
Route::get('/paymongo/callback-gcash/failed', [PaymongoController::class, 'gcashFailed']);

Route::get('/paymongo/grab', [PaymongoController::class, 'grabPay']);
Route::get('/paymongo/callback-grab', [PaymongoController::class, 'grabPayCallback']);
Route::get('/paymongo/callback-grab/failed', [PaymongoController::class, 'grabPayFailed']);

Route::get('/paymongo/search', [PaymongoController::class, 'search']);
Route::get('/paymongo/payment-intent', [PaymongoController::class, 'createPaymentIntent']);

