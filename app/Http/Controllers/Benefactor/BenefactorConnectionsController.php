<?php

namespace App\Http\Controllers\Benefactor;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\Benefactor;
use Illuminate\Http\Request;
use App\Enums\CharityCategory;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\Charity\CharityFollowers;

class BenefactorConnectionsController
{
    public function index(Request $request): Response
    {
        return Inertia::render('Benefactor/Connections/Index', [
            'followingList' => $this->getCharityFollowingLists(
                $request->get('name'), $request->get('category')
            ),
            'charityFollowingCategoryNumber' => fn () => $this->getCharityFollowingPerCategoryStats(),
            'search' => $request->get('name') ?? '',
        ]);
    }

    private function getCharityFollowingLists(string $name = null, string $category = null)
    {
        return Benefactor::auth()
            ->filterBy($name, $category)
            ->get(['name', 'id']);
    }

    private function getCharityFollowingPerCategoryStats()
    {
        return CharityFollowers::query()
        ->selectRaw("count(case when charity_categories.category_id = '1' then 1 end) as Animal_Conservation")
        ->selectRaw("count(case when charity_categories.category_id = '2' then 1 end) as Agriculture")
        ->selectRaw("count(case when charity_categories.category_id = '3' then 1 end) as Womens_Empowerment")
        ->selectRaw("count(case when charity_categories.category_id = '4' then 1 end) as Children_Youth")
        ->selectRaw("count(case when charity_categories.category_id = '5' then 1 end) as Community_Development")
        ->selectRaw("count(case when charity_categories.category_id = '6' then 1 end) as Education")
        ->selectRaw("count(case when charity_categories.category_id = '7' then 1 end) as Environment")
        ->selectRaw("count(case when charity_categories.category_id = '8' then 1 end) as Wildlife_Protection")
        ->selectRaw('count(distinct charity_followers.charity_id) as All_Charities')
                ->join('charity_categories', 'charity_categories.charity_id', 
                        '=', 
                        'charity_followers.charity_id'
                    )
                ->where('charity_followers.benefactor_id', Auth::id())
            ->first();
    }

    public function destroy (int $id): RedirectResponse
    {
        Benefactor::auth()
            ->followingCharities()
            ->detach($id);

        return to_route('benefactor.connections.index');
    }
}