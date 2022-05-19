<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ {
    LoginController,
    RegisterController,
    GoogleLoginController,
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', fn() => Inertia::render('Index'))->name('index');

Route::name('register.')->group(function () {
    Route::post('/register', [RegisterController::class, 'register'])->name('store');
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('index');
    Route::get('/register-Step2', [RegisterController::class, 'showRegistrationStep2Form'])->name('index2');
});

Route::name('auth.')->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])
        ->name('logout')
        ->middleware('auth');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('index');

    Route::name('google.')->group(function () {
        Route::get('/login-google-callback', [GoogleLoginController::class, 'handleGoogleCallback']);
        Route::get('/login-google', [GoogleLoginController::class, 'redirectToGoogle'])->name('index');
    });
});


Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', fn() => Inertia::render('Home'))->name('home');
});
