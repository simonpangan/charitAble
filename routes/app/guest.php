<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ {
    LoginController,
    GoogleLoginController,
    ResetPasswordController,
    ForgotPasswordController,
    Register\BenefactorRegisterController,
    Register\CharityRegisterController
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

//route
Route::name('register.')->group(function () {
    Route::post('/register/benefactor/store', [BenefactorRegisterController::class, 'store'])->name('benefactor.store');
    Route::get('/register/benefactor', [BenefactorRegisterController::class, 'index'])->name('benefactor.index');


    Route::get('/register/charity', [CharityRegisterController::class, 'index'])->name('charity.index');

    Route::get('/register/charity', [CharityRegisterController::class, 'index'])->name('charity.index');
    Route::post('/register/charity/store',[CharityRegisterController::class,'store'])->name('charity.store');
    Route::post('/register/charity/upload', [CharityRegisterController::class, 'uploadPhoto']);
    Route::post('/register/charity/uploadDocuments', [CharityRegisterController::class, 'uploadDocumentsPhoto']);

});
