<?php

namespace App\Models\Charity;

use App\Traits\CharityID;
use App\Models\Categories;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CharityProgram extends Model
{
    use HasFactory, CharityID;

    protected $guarded = ['id'];   

    protected $casts = [
        'goals' => 'array',
        'expenses' => 'array',
    ];

    protected $appends = ['created_at_formatted'];


    public function charity()
    {
        return $this->belongsTo(Charity::class);
    }
    
    public function getCreatedAtFormattedAttribute()
    {
        return (Carbon::parse($this->created_at)->diffForHumans());
    }

    public function scopeFilterProgramBy($query, $name, $category)
    {
        //name is only in the query
        if(! is_null($name) && is_null($category)) 
        {
            return $this->filterProgramByName($query, $name);
        }

        //category is only in the query
        if ($category && is_null($name)) {
            return $this->filteProgramByCategory($query, $category);
        }

        return $query->whereIn(
            'charity_programs.charity_id', 
           $this->benefactorFollowing()
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

    private function filterProgramByName($query, $name)
    {
        return $query->whereIn(
            'charity_programs.charity_id', 
            $this->benefactorFollowing()
        )->where('charity_programs.name', 'like', '%'.$name.'%'); 
    }

    private function filteProgramByCategory($query, $category)
    {
        $benefactorFollowing = $this->benefactorFollowing();


        $category = Categories::select('id')->whereName($category)->first();


        if (is_null($category)) {
            return $query->whereIn(
                'charity_programs.charity_id', 
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
            'charity_programs.charity_id', 
            $charityID->toArray()
        );
    }
}
