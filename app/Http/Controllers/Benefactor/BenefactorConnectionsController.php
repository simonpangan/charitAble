<?php

namespace App\Http\Controllers\Benefactor;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\Benefactor;
use Illuminate\Http\Request;
use App\Enums\CharityCategory;
use App\Models\Charity\CharityFollowers;

class BenefactorConnectionsController
{
    public function index(Request $request): Response
    {
        return Inertia::render('Benefactor/Connections/Index', [
            'charityCategories' => CharityCategory::getCategoriesValues(),
            'followingList' => $this->getCharityFollowingLists($request->get('search')),
            'charityFollowingCategotyNumber' => fn () => $this->getFharityFollowingPerCategotyStats(),
        ]);
    }

    private function getCharityFollowingLists(string $name = null)
    {
        return Benefactor::auth()
            ->followingCharitiesByName($name)
            ->get(['name', 'id']);
    }

    private function getFharityFollowingPerCategotyStats()
    {
        return CharityFollowers::query()
            ->join('charities', 'charities.id', '=', 'charity_followers.charity_id')
            // ->selectRaw("count(case when status = 'confirmed' then 1 end) as confirmed")
            // ->selectRaw("count(case when status = 'unconfirmed' then 1 end) as unconfirmed")
            // ->selectRaw("count(case when status = 'cancelled' then 1 end) as cancelled")
            // ->selectRaw("count(case when status = 'bounced' then 1 end) as bounced")
            ->selectRaw('count(*) as total')
            ->first();
    }
}