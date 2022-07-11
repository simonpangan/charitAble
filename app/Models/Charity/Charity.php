<?php

namespace App\Models\Charity;

use App\Models\User;
use DateTimeInterface;
use App\Models\Categories;
use App\Models\Charity\CharityPosts;
use App\Models\Charity\CharityOfficers;
use Illuminate\Database\Eloquent\Model;
use App\Models\Charity\CharityVolunteerPost;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Charity extends Model
{
    use HasFactory;

    public $incrementing = false;   
    public $timestamps = false;

    protected $guarded = [];

    public $casts = [
        'created_at' => 'datetime',
    ];

    
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->toDayDateTimeString();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function officers()
    {
        return $this->hasMany(CharityOfficers::class);
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
}
