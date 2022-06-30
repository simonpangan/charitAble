<?php

namespace App\Models\Charity;

use App\Traits\CharityID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CharityOfficers extends Model
{
    use HasFactory, CharityID;

    protected $guarded = ['id'];
}
