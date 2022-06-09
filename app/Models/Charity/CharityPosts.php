<?php

namespace App\Models\Charity;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CharityPosts extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function boot() {
        parent::boot();
    
        self::creating(function ($model) {
            $model->charity_id = Auth::id();
        });
    }
}
