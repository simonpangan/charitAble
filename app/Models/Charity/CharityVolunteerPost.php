<?php

namespace App\Models\Charity;

use App\Traits\CharityID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CharityVolunteerPost extends Model
{
    use HasFactory, CharityID;

    protected $guarded = ['id'];

    protected $casts = [
        'qualifications' => 'array',
    ];
}
