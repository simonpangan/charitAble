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
    CharityOfficerController,
    CharityVolunteerPostController,
    CharityProgramStatusController,
    CharityProgramReportController,
    CharityVolunteerPostReportController,
};

use App\Http\Controllers\Admin\ {
    AdminHomeController,
    AdminApprovalController,
    AdminWithdrawRequestController,
};

use App\Models\Charity\CharityVolunteerPost;
use App\Http\Controllers\Benefactor\BenefactorDonationController;
use App\Http\Controllers\BlockchainTransactionController;
use App\Http\Controllers\PaypalPaymentController;
use App\Http\Controllers\Payment\PaymongoController;

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
        Route::get('/home/documents/{id}', [AdminHomeController::class, 'download'])->where('id', '[0-9]+')->name('home.download');

        Route::get('/withdraw', [AdminWithdrawRequestController::class, 'index'])->name('withdraw.index');
        Route::post('/withdraw/approve', [AdminWithdrawRequestController::class, 'approve'])
            ->name('withdraw.approve');

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
            Route::get('program/{id}/edit', 'edit')->where('id', '[0-9]+')->name('program.edit');
            Route::put('program/{id}', 'update')->where('id', '[0-9]+')->name('program.update');
            Route::delete('program/{id}', 'destroy')->where('id', '[0-9]+')->name('program.destroy');
            Route::post('uploadProgramPhoto','uploadProgramPhoto')->name('program.store.image');
            Route::post('uploadProgramUpdate','updateHeader')->name('program.update.image');
            Route::post('uploadProgramPhoto/revert','uploadProgramPhotoRevert')->name('program.revert.image');

            Route::post('/program/{id}/withdraw-request', 'withdrawRequest')
                ->where('id', '[0-9]+')->name('program.withdraw-request');
            Route::post('/program/{id}/withdraw-request/cancel', 'cancelWithdrawRequest')
                ->where('id', '[0-9]+')->name('program.withdraw-request.cancel');
        });

        Route::get('program/{id}/report', [CharityProgramReportController::class, 'redirect'])
            ->where('id', '[0-9]+')->name('program.report');
        Route::get('program/{id}/download', [CharityProgramReportController::class, 'generate'])
            ->where('id', '[0-9]+')->name('program.download');

        Route::put('program/{id}/status', CharityProgramStatusController::class)
            ->where('id', '[0-9]+')->name('program.status');

        Route::controller(CharityVolunteerPostController::class)->group(function () {
            Route::post('volunteer-posts', 'store')->name('volunteer.store');
            Route::get('volunteer-posts/create', 'create')->name('volunteer.create');
            Route::get('volunteer-posts/{id}/edit', 'edit')->where('id', '[0-9]+')->name('volunteer.edit');
            Route::put('volunteer-posts/{id}', 'update')->name('volunteer.update');
            Route::delete('volunteer-posts/{id}', 'destroy')->where('id', '[0-9]+')->name('volunteer.destroy');
        });

        Route::controller(CharityVolunteerPostReportController::class)->group(function () {
            Route::get('volunteer-posts/{id}/report', 'redirectToGeneratedReport')
                ->where('id', '[0-9]+')
                ->name('volunteer.report');
            Route::get('volunteer-posts/{id}/generate', 'generate')
                ->where('id', '[0-9]+')
                ->name('volunteer.download');
        });

        Route::controller(CharityPostsController::class)->group(function(){
            Route::get('post/create','create')->name('post.create');
            Route::post('post', 'store')->name('post.store');
            Route::delete('post/{id}', 'destroy')
                ->where('id', '[0-9]+')
                ->name('post.destroy');
            Route::post('uploadPostPhoto','uploadPostPhoto')->name('post.store.image');
            Route::post('uploadPostPhoto/revert','uploadPostPhotoRevert')->name('post.revert.image');

        });

        Route::controller(CharityOfficerController::class)->group(function(){
            Route::get('officer','create')->name('officer.create');
            Route::post('officer/create','store')->name('officer.store');
            Route::get('officer/{id}/edit','show')
                ->where('id', '[0-9]+')
                ->name('officer.show');
            Route::put('officer','edit')->name('officer.edit');
            Route::delete('officer/{id}', 'destroy')
                ->where('id', '[0-9]+')
                ->name('officer.destroy');
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
            ->middleware('signed');

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
        Route::get('charity/{id?}/program', 'index')
            ->name('charity.program.index')->where('id', '[0-9]+');

        Route::get('charity/program/{id}', 'show')
            ->where('id', '[0-9]+')
            ->name('charity.program.show');
        Route::get('charity/program/{id}/supporters', 'supporters')
            ->where('id', '[0-9]+')
            ->name('charity.program.supporters');
        Route::get('charity/program/{id}/gallery', 'gallery')
            ->where('id', '[0-9]+')
            ->name('charity.program.gallery');
        Route::get('charity/program/{id}/charitysuporters','charitysettings')
            ->where('id', '[0-9]+')->name('charity.program.setting');
        Route::get('charity/program/{id}/updates','updateSection')
            ->where('id', '[0-9]+')->name('charity.program.updates');
        Route::get('charity/program/{id}/history','historySection')
            ->where('id', '[0-9]+')->name('charity.program.history');
    });

    Route::get('charity/{id?}/post', [CharityPostsController::class, 'index'])
        ->name('charity.post.index')
        ->where('id', '[0-9]+');

    Route::controller(CharityVolunteerPostController::class)->group(function () {
        Route::get('charity/{id?}/volunteer-posts', 'index')->name('charity.volunteer.index')->where('id', '[0-9]+');
        Route::get('charity/volunteer-posts/{id}', 'show')->name('charity.volunteer.show')->where('id', '[0-9]+');
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
        ->name('verification.send');

    Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
        ->name('verification.verify')
        ->where('id', '[0-9]+');
});


/*
|--------------------------------------------------------------------------
| Payment Routes
|--------------------------------------------------------------------------
|
| Routes that can be access by authenticated user
|
*/

Route::group(
    ['middleware' => ['role:BENEFACTOR', 'verified:auth.verification.notice']]
    , function () {

    Route::get('charity/program/{id}/donate', [BenefactorDonationController::class, 'index'])
        ->name('charity.donate.create')->where('id', '[0-9]+');
    Route::get('charity/program/{id}/donate/{donation_id}/success', [BenefactorDonationController::class, 'successIndex'])
        ->name('charity.donate.success')->where(['id', 'donation_id'], '[0-9]+');

    Route::get('/blockchain', BlockchainTransactionController::class)->name('blockchain');
    Route::post('/blockchain/paypal', [BlockchainTransactionController::class, 'PaypalUpdateBlockchainHash'])->name('blockchain-paypal');

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
});




