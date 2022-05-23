<?php


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

Route::middleware('guest')
    ->group(base_path('routes/guest.php'));

Route::middleware('auth')
    ->group(base_path('routes/auth.php'));

// Routes that can be access both by authenticated and unauthenticated users

Route::inertia('/', 'Index')->name('index');
