<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VolunteerPostInterest extends Model
{
    use HasFactory;

    const UPDATED_AT = null;

    protected $guarded = [];

    protected $appends = ['created_at_formatted'];
    
    public function getCreatedAtFormattedAttribute()
    {
        return (Carbon::parse($this->created_at)->diffForHumans());
    }
}

