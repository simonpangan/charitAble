<?php

namespace App\Traits;


use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;


trait CharityID
{
    public static function bootCharityID() {
        self::creating(function ($model) {
            $model->charity_id = Auth::id();
        });
    }
}
