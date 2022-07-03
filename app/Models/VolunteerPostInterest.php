<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VolunteerPostInterest extends Pivot
{
    use HasFactory;

    const UPDATED_AT = null;

    protected $guarded = [];

    protected $table = 'volunteer_post_interests';

    protected $appends = ['created_at_formatted'];
    
    public function getCreatedAtFormattedAttribute()
    {
        return (Carbon::parse($this->created_at)->diffForHumans());
    }
}

