<?php

namespace App\Http\Controllers\Benefactor;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\Categories;
use App\Models\Charity\CharityCategories;
use App\Models\Charity\CharityVolunteerPost;


class BenefactorCharitySearchVolunteerController
{
    public function __invoke(): Response
    {
        return Inertia::render('Benefactor/Search/Volunteer', [
            'charityCategories'=> fn() => Categories::all(),
            'volunteerPosts' => $this->getVolunteerPosts(
                request()->get('name'), request()->get('category')
            )
        ]);
    }

    private function getVolunteerPosts($name = null, $category = null)
    {
        return CharityVolunteerPost::query()
            ->select(['charity_volunteer_posts.*', 'charities.name as charity_name'])
            ->join('charities', 'charities.id', '=', 'charity_volunteer_posts.charity_id')
            ->latest()
            ->when($name, function ($query, $name) {
                $query->where('charity_volunteer_posts.name', 'like', '%'.$name.'%'); 
            })
            ->when($category, function ($query, $category) {
                $this->filterByCategory($query, $category);
            })
            ->paginate(10)
            ->withQueryString();
    }

    private function filterByCategory($query, $category)
    {
        $category = Categories::select('id')->whereName($category)->first();

        if (is_null($category)) {
            return;
        }    

        $charityID = CharityCategories::query()
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
}
