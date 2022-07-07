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
    BenfactorSendEmailController,
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
    CharityOfficerController,
    CharityProgramReportController,
    CharityVolunteerPostReportController
};

use App\Http\Controllers\Admin\ {
    AdminHomeController,
    AdminApprovalController,
    AdminWithdrawRequestController,
};

use App\Http\Controllers\Benefactor\BenefactorDonationController;
use App\Http\Controllers\Payment\PaymongoController;
use App\Http\Controllers\PaypalPaymentController;
use App\Models\Charity\CharityVolunteerPost;

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

        Route::get('/withdraw', [AdminWithdrawRequestController::class, 'index'])->name('withdraw.index');

        Route::post('/approval/permits', [AdminApprovalController::class, 'permits'])->name('approval.permits');
        Route::post('/approval/approve', [AdminApprovalController::class, 'approve'])->name('approval.approve');
        Route::post('/approval/disapprove', [AdminApprovalController::class, 'disApprove'])->name('approval.disapprove');
   
        Route::post('/checkEthAddress',[AdminApprovalController::class,'checkIfEthAddressExists'])->name('eth.check');
        Route::post('/createEthAddress',[AdminApprovalController::class,'createEthAddress'])->name('eth.create');

    });


    Route::group([
        'middleware' => 'role:CHARITY_SUPER_ADMIN,CHARITY_ADMIN',
        'as' => 'charity.',
        'prefix' => 'charity',
    ], function () {
        Route::get('/logs', CharityLogController::class)->name('logs.index');

        Route::controller(CharityProgramController::class)->group(function () {
            Route::get('program/create', 'create')->name('program.create');
            Route::post('program', 'store')->name('program.store');
            Route::get('program/{id}/edit', 'edit')->name('program.edit');
            Route::put('program/{id}', 'update')->name('program.update');
            Route::delete('program/{id}', 'destroy')->name('program.destroy');
            Route::post('uploadProgramPhoto','uploadProgramPhoto')->name('program.store.image');
            Route::post('uploadProgramPhoto/revert','uploadProgramPhotoRevert')->name('program.revert.image');
        });

        Route::get('program/{id}/report', [CharityProgramReportController::class, 'redirect'])->name('program.report');
        Route::get('program/{id}/download', [CharityProgramReportController::class, 'generate'])->name('program.download');


        Route::controller(CharityVolunteerPostController::class)->group(function () {
            Route::post('volunteer-posts', 'store')->name('volunteer.store');
            Route::get('volunteer-posts/create', 'create')->name('volunteer.create');
            Route::get('volunteer-posts/{id}/edit', 'edit')->name('volunteer.edit');
            Route::put('volunteer-posts/{id}', 'update')->name('volunteer.update');
            Route::delete('volunteer-posts/{id}', 'destroy')->name('volunteer.destroy');
        });

        Route::controller(CharityVolunteerPostReportController::class)->group(function () {
            Route::get('volunteer-posts/{id}/report', 'redirectToGeneratedReport')->name('volunteer.report');
            Route::get('volunteer-posts/{id}/generate', 'generate')->name('volunteer.download');
        });

        Route::controller(CharityPostsController::class)->group(function(){
            Route::get('post/create','create')->name('post.create');
            Route::post('post', 'store')->name('post.store');
            Route::delete('post/{id}', 'destroy')->name('post.destroy');
            Route::post('uploadPostPhoto','uploadPostPhoto')->name('post.store.image');
            Route::post('uploadPostPhoto/revert','uploadPostPhotoRevert')->name('post.revert.image');

        });

        Route::controller(CharityOfficerController::class)->group(function(){
            Route::get('officer','create')->name('officer.create');
            Route::post('officer/create','store')->name('officer.store');
            Route::get('officer/{id}/edit','show')->name('officer.show');
            Route::put('officer','edit')->name('officer.edit');
            Route::delete('officer/{id}', 'destroy')->name('officer.destroy');
        });
    });

    Route::get('charity/program/{id}/donate',[BenefactorDonationController::class,'index'])
        ->name('charity.donate.create');
    Route::get('charity/program/{id}/{transaction_id}/donate/success',[BenefactorDonationController::class,'successIndex'])
        ->name('charity.donate.success');


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

        Route::post('/volunteer-posts/email', BenfactorSendEmailController::class)
            ->name('sendEmail');

        Route::get('/dashboard', [BenefactorDashboardController::class, 'index'])
            ->name('dashboard.index');


        Route::get('/profile', [BenefactorProfileController::class, 'index'])
            ->name('profile.index');

        Route::put('/profile/update', [BenefactorProfileController::class, 'update'])
            ->name('profile.update');
    });







      //CAN BE ACCESS BY ANY VERIFIED USER
    Route::get('charity/profile/{id?}', [CharityProfileController::class, 'index'])
        ->name('charity.profile.index')
        ->where('id', '[0-9]+');

    Route::controller(CharityProgramController::class)->group(function () {
        Route::get('charity/{id?}/program', 'index')->name('charity.program.index')->where('id', '[0-9]+');
        Route::get('charity/program/{id}', 'show')->name('charity.program.show');
        Route::get('charity/program/{id}/supporters', 'supporters')->name('charity.program.supporters');
    });

    Route::get('charity/{id?}/post', [CharityPostsController::class, 'index'])
        ->name('charity.post.index')
        ->where('id', '[0-9]+');

    Route::controller(CharityVolunteerPostController::class)->group(function () {
        Route::get('charity/{id?}/volunteer-posts', 'index')->name('charity.volunteer.index')->where('id', '[0-9]+');
        Route::get('charity/volunteer-posts/{id}', 'show')->name('charity.volunteer.show');
    });

  //-------------------------
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

Route::get('/paymongo', [PaymongoController::class, 'pay'])->name('paymongo');
Route::get('/paymongo/callback', [PaymongoController::class, 'callback']);
Route::get('/paymongo/callback/failed', [PaymongoController::class, 'failed']);

Route::get('/paymongo/search', [PaymongoController::class, 'search']);

Route::post('/paymongo/payment-intent', [PaymongoController::class, 'createPaymentIntent'])->name('paymongo.payment_intent');
Route::post('/paymongo/cardPay', [PaymongoController::class, 'cardPay'])->name('paymongo.cardPay');

Route::group(['prefix'=>'payment/paypal'], function(){
    Route::post('/order/create',[PaypalPaymentController::class,'create'])->name('paypal.create');
    Route::post('/order/capture/',[PaypalPaymentController::class,'capture'])->name('paypal.capture');
});
