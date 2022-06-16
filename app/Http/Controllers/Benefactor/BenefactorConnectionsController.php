<?php

namespace App\Http\Controllers\Benefactor;

use Inertia\Inertia;
use Inertia\Response;
use App\Enums\CharityCategory;
use App\Models\Benefactor;
use App\Models\Charity\CharityFollowers;

class BenefactorConnectionsController
{
    public function index(): Response
    {
        $charityFollowingLists = Benefactor::auth()
            ->followingCharities()
            ->get(['name']);
        
        $charityFollowingCategotyNumber =  CharityFollowers::query()
            ->join('charities', 'charities.id', '=', 'charity_followers.charity_id')
            // ->selectRaw("count(case when status = 'confirmed' then 1 end) as confirmed")
            // ->selectRaw("count(case when status = 'unconfirmed' then 1 end) as unconfirmed")
            // ->selectRaw("count(case when status = 'cancelled' then 1 end) as cancelled")
            // ->selectRaw("count(case when status = 'bounced' then 1 end) as bounced")
            ->selectRaw('count(*) as total')
            ->first();

        

        return Inertia::render('Benefactor/Connections', [
            'charityCategories' => CharityCategory::getCategoriesValues(),
            'followingList' => $charityFollowingLists,
            'charityFollowingCategotyNumber' => $charityFollowingCategotyNumber,
        ]);
    }
}