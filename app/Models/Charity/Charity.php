<?php

namespace App\Models\Charity;

use App\Models\Charity\CharityPosts;
use App\Models\Charity\CharityOfficers;
use Illuminate\Database\Eloquent\Model;
use App\Models\Charity\CharityVolunteerPost;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Charity extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function officers()
    {
        return $this->hasMany(CharityOfficers::class);
    }
    public function documents()
    {
        return $this->hasMany(CharityDocuments::class);
    }

    public function posts()
    {
        return $this->hasMany(CharityPosts::class);
    }


    public function volunteerPosts()
    {
        return $this->hasMany(CharityVolunteerPost::class);
    }
}
