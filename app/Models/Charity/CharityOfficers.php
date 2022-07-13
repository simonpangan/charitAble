<?php

namespace App\Models\Charity;

use DateTimeInterface;
use App\Traits\CharityID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CharityOfficers extends Model
{
    use HasFactory, CharityID;

    protected $guarded = ['id'];

    public $casts = [
        'officer_since' => 'date',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->toFormattedDateString();
    }
}
