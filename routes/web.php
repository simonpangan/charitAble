<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ {
    LoginController,
    RegisterController
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
Route::get('/home', fn() => Inertia::render('Home'))->name('home');

Route::post('/register', [RegisterController::class, 'register'])->name('register.store');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.index');
Route::get('/register-Step2', [RegisterController::class, 'showRegistrationStep2Form'])->name('register.index2');

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.index');

Auth::routes();


