<?php

namespace App\Models\Charity;

use App\Traits\CharityID;
use App\Models\Categories;
use Illuminate\Support\Carbon;
use App\Models\Charity\Charity;
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

    protected $appends = ['created_at_formatted'];
    
    public function getCreatedAtFormattedAttribute()
    {
        return (Carbon::parse($this->created_at)->diffForHumans());
    }

    public function charity()
    {
        return $this->belongsTo(Charity::class);
    }

    public function scopeFilterVolunteerPostBy($query, $name, $category)
    {
        //name is only in the query
        if(! is_null($name) && is_null($category)) 
        {
            return $this->filterVolunteerPostByName($query, $name);
        }

        //category is only in the query
        if ($category && is_null($name)) {
            return $this->filterVolunteerPostByCategory($query, $category);
        }

        return $query->whereIn(
            'charity_volunteer_posts.charity_id', 
           $this->benefactorFollowing()
        );
    }

    private function filterVolunteerPostByName($query, $name)
    {
        return $query->whereIn(
            'charity_volunteer_posts.charity_id', 
            $this->benefactorFollowing()
        )->where('charity_volunteer_posts.name', 'like', '%'.$name.'%');   
    }

    private function filterVolunteerPostByCategory($query, $category)
    {  
        $benefactorFollowing = $this->benefactorFollowing();


        $category = Categories::select('id')->whereName($category)->first();


        if (is_null($category)) {
            return $query->whereIn(
                'charity_volunteer_posts.charity_id', 
               $this->benefactorFollowing()
            );
        }

        $charityID = CharityCategories::query()
            ->whereIn('charity_id',  $benefactorFollowing)
            ->where(
                'category_id',
                $category->id
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
