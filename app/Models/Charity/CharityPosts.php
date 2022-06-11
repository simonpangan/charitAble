<?php

namespace App\Models\Charity;

use App\Traits\CharityID;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CharityPosts extends Model
{
    use HasFactory, CharityID;

    protected $guarded = ['id'];

}
