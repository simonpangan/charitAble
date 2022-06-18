<?php

namespace App\Models;

use App\Models\Charity\Charity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Benefactor extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $timestamps = false;


    protected $guarded = [];

    protected function preferences(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => explode(",", $value),
            set: fn ($value) => implode(",", $value),
        );
    }

    public static function auth()
    {
        return Benefactor::find(Auth::id());   
    }

    public function followingCharities()        
    {
        return $this->belongsToMany(Charity::class, 'charity_followers');
    }

    public function filterBy($search, $category)
    {
        if ($category && is_null($search)) {
            return $this->filterByCategory($category);
        }

        if(! is_null($search) && is_null($category)) 
        {
            return $this->filterByName($search);
        }
        
        return $this->followingCharities();
    }

    private function filterByCategory(String $category)
    {
        # code...
    }
    private function filterByName(String $search)
    {
        return $this->followingCharities()->where('charities.name', 'like', '%'.$search.'%');
    }
}
