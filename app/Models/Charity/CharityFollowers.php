<?php

namespace App\Models\Charity;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CharityFollowers extends Model
{
    use HasFactory;

    public function scopeBenefactorFollowing($query)
    {
        return $query->where('benefactor_id', Auth::id());
    }
}
