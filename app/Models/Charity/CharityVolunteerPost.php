<?php

namespace App\Models\Charity;

use App\Traits\CharityID;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CharityVolunteerPost extends Model
{
    use HasFactory, CharityID;

    protected $guarded = ['id'];

    protected $casts = [
        'qualifications' => 'array',
    ];

    public function scopeFilterVolunteerPostBy($query, $name, $category)
    {
        //name is only in the query
        if(! is_null($name) && is_null($category)) 
        {
            return $this->filterVolunteerPostByName($name);
        }

        //category is only in the query
        if ($category && is_null($name)) {
            return $this->filterVolunteerPostByCategory($query, $category);
        }

        // ->when($category, function ($query, $category) {
        //     $query->where(
        //         'charity_categories.category_id', 
        //         Categories::select(['id'])->whereName($category)->first()->id
        //     );
        // })  

        //default = get all following charity volunteer post
        return $query->whereIn(
            'charity_volunteer_posts.charity_id', 
           $this->benefactorFollowing()
        );
    }

    private function filterVolunteerPostByCategory($query, $category)
    {  
        $benefactorFollowing = $this->benefactorFollowing();

        $charityID = CharityCategories::query()
            ->whereIn('charity_id',  $benefactorFollowing)
            ->where(
                'category_id',
                Categories::select('id')->whereName($category)->first()->id
            )
            ->get(['charity_id'])
            ->pluck('charity_id');

        return  $query->whereIn(
            'charity_volunteer_posts.charity_id', 
            $charityID->toArray()
        );
    }

    private function benefactorFollowing () {
        return CharityFollowers::query()
            ->select('charity_id')
            ->where('benefactor_id', Auth::id())
            ->get()
            ->pluck('charity_id')
            ->toArray();
    }
}
