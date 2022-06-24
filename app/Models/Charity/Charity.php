<?php

namespace App\Models\Charity;

use App\Models\Categories;
use App\Models\Charity\CharityPosts;
use App\Models\Charity\CharityOfficers;
use Illuminate\Database\Eloquent\Model;
use App\Models\Charity\CharityVolunteerPost;
use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Charity extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $guarded = [];

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

    public function programs()
    {
        return $this->hasMany(CharityProgram::class);
    }

    public function categories()
    {
        return $this->belongsToMany(
            Categories::class, 'charity_categories',
            'charity_id', 'category_id'
        );
    }

    public function locations()
    {
        return $this->belongsToMany(Location::class);
    }
}
