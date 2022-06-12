<?php

namespace App\Models\Charity;

use App\Traits\CharityID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharityOfficers extends Model
{
    use HasFactory, CharityID;

    protected $guarded = ['id'];

}
