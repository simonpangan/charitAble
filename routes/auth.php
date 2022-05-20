<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Auth  Routes
|--------------------------------------------------------------------------
|
| Routes that can only be access by authenticated user
|
*/

Route::get('/home', fn() => Inertia::render('Home'))->name('home');
