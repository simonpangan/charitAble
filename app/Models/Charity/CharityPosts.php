<?php

namespace App\Models\Charity;

use App\Traits\CharityID;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CharityPosts extends Model
{
    use HasFactory, CharityID;

    protected $guarded = ['id'];

    protected $appends = ['created_at_formatted'];

    public function getCreatedAtFormattedAttribute()
    {
        return (Carbon::parse($this->created_at)->diffForHumans());
    }

    public function program()
    {
        return $this->belongsTo(CharityProgram::class, 'charity_programs_id');
    }
}
