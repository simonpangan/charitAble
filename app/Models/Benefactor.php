<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Models\Charity\Charity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Models\Charity\CharityFollowers;
use App\Models\Charity\CharityProgram;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Benefactor extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $timestamps = false;

    protected $guarded = [];

    public $casts = [
        'first_name' => 'encrypted',
        'last_name' => 'encrypted',
        'total_donation' => 'encrypted',
        'account_type' => 'encrypted',
        'total_charities_donated' => 'encrypted',
        'total_charities_followed' => 'encrypted',
        'total_number_donations' => 'encrypted',
    ];

    protected function preferences(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                $preferences = collect(explode(",", $value))->map(function ($preference) {
                    return Str::of($preference)
                    ->replace('_', ' ')
                    ->title()
                    ->value;
                });

                return $preferences->toArray();
            },
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

    public function filterBy($name, $category)
    {
        //name is only in the query
        if(! is_null($name) && is_null($category)) 
        {
            return $this->filterByName($name);
        }

        //category is only in the query
        if ($category && is_null($name)) {
            return $this->filterByCategory($category);
        }

        
        //default = get all following charity
        return $this->followingCharities();
    }

    private function filterByCategory(String $category)
    {
        $category = Categories::query()
            ->where('name', $category)
            ->first();

        // if category does not exists then we just fetch all following charities
        if (is_null($category)) {
            return $this->followingCharities();
        }

        $benefactorFollowingCharityID = CharityFollowers::query()
            ->join('charity_categories', 'charity_categories.charity_id', 
                    '=', 
                    'charity_followers.charity_id'
                )
            ->where('charity_followers.benefactor_id', Auth::id())
            ->where('charity_categories.category_id', $category->id)
        ->get('charity_followers.charity_id');

        return $this->followingCharities()
            ->whereIn('charities.id', $benefactorFollowingCharityID);
    }
    private function filterByName(String $search)
    {
        return $this->followingCharities()->where('charities.name', 'like', '%'.$search.'%');
    }

    public function programDonations()
    {
        return $this->belongsToMany(CharityProgram::class, 'program_donations', 'benefactor_id', 'charity_program_id')
            ->using(ProgramDonation::class);
    }


}
