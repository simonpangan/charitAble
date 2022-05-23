<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Auth  Routes
|--------------------------------------------------------------------------
|
| Routes that can only be access by authenticated user
|
*/

Route::middleware('role:ADMIN')->group(function () {
    Route::inertia('/admin', 'Benefactor/Index')->name('admin.index');
});

Route::middleware('role:CHARITY_SUPER_ADMIN,CHARITY_ADMIN')->group(function () {
    Route::inertia('/charity', 'Charity/Index')->name('charity.index');
});

Route::middleware('role:BENEFACTOR')->group(function () {
    Route::inertia('/benefactor', 'Benefactor/Index')->name('benefactor.index');
});
