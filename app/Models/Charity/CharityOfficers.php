<?php

namespace App\Models\Charity;

use DateTimeInterface;
use App\Traits\CharityID;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CharityOfficers extends Model
{
    use HasFactory, CharityID;

    protected $guarded = ['id'];

    protected $appends = ['officer_since_formatted'];

    protected $casts = [
        'officer_since' => 'date',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->toDateString();
    }

    public function getFirstNameAttribute($value) {
        return Str::title($value);
    }

    public function getLastNameAttribute($value) {
        return Str::title($value);
    }
    
    public function getOfficerSinceFormattedAttribute()
    {
        return (new Carbon($this->officer_since))->toFormattedDateString();
    }
}
