<?php

namespace App\Http\Controllers\Benefactor;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\Benefactor;
use App\Models\Categories;
use App\Models\Charity\CharityFollowers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Charity\CharityVolunteerPost;
use App\Models\Charity\CharityCategories;

class BenefactorConnectionsVolunteerController
{
    public function index(Request $request)
    {
        return Inertia::render('Benefactor/Connections/Volunteer', [
            'followingCharitiesVolunteerPost' => $this->getFollowingCharitiesVolunteerPost(
                $request->get('name'), $request->get('category')
            ),
            'charityFollowingCategoryNumber' => fn () => $this->getCharityFollowingPerCategoryStats(),
            'search' => $request->get('name') ?? '',
        ]);
    }

    private function getFollowingCharitiesVolunteerPost(string $name = null, string $category = null)   
    {
        return CharityVolunteerPost::query()
            ->select('charity_volunteer_posts.*')
            ->filterVolunteerPostBy($name, $category)
            ->paginate(10)
            ->withQueryString();
    }

    private function getCharityFollowingPerCategoryStats()
    {
        return CharityVolunteerPost::query()
            ->selectRaw("count(case when charity_categories.category_id = '1' then 1 end) as Animal_Conservation")
            ->selectRaw("count(case when charity_categories.category_id = '2' then 1 end) as Agriculture")
            ->selectRaw("count(case when charity_categories.category_id = '3' then 1 end) as Children_and_Youth")
            ->selectRaw("count(case when charity_categories.category_id = '4' then 1 end) as Community_Development")
            ->selectRaw("count(case when charity_categories.category_id = '5' then 1 end) as Education")
            ->selectRaw("count(case when charity_categories.category_id = '6' then 1 end) as Environment")
            ->selectRaw("count(case when charity_categories.category_id = '7' then 1 end) as Wildlife_Protection")
            ->selectRaw("count(case when charity_categories.category_id = '8' then 1 end) as Womens_Empowerment")
            ->selectRaw('count(distinct charity_volunteer_posts.id) as All_Posts')
                    ->join('charity_categories', 'charity_categories.charity_id', 
                            '=',
                            'charity_volunteer_posts.charity_id'
                        )
                    ->whereIn(
                        'charity_volunteer_posts.charity_id', 
                        CharityFollowers::query()
                         ->select('charity_id')
                         ->where('benefactor_id', Auth::id())
                         ->get()
                    )
                ->first();
    }

}
