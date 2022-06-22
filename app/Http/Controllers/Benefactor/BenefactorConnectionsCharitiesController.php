<?php

namespace App\Http\Controllers\Benefactor;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\Benefactor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\Charity\CharityFollowers;

class BenefactorConnectionsCharitiesController
{
    public function index(Request $request): Response
    {
        return Inertia::render('Benefactor/Connections/Charities', [
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
        ->selectRaw("count(case when charity_categories.category_id = '3' then 1 end) as Children_and_Youth")
        ->selectRaw("count(case when charity_categories.category_id = '4' then 1 end) as Community_Development")
        ->selectRaw("count(case when charity_categories.category_id = '5' then 1 end) as Education")
        ->selectRaw("count(case when charity_categories.category_id = '6' then 1 end) as Environment")
        ->selectRaw("count(case when charity_categories.category_id = '7' then 1 end) as Wildlife_Protection")
        ->selectRaw("count(case when charity_categories.category_id = '8' then 1 end) as Womens_Empowerment")
        ->selectRaw('count(distinct charity_followers.charity_id) as All_Charities')
                ->join('charity_categories', 'charity_categories.charity_id', 
                        '=', 
                        'charity_followers.charity_id'
                    )
                ->where('charity_followers.benefactor_id', Auth::id())
            ->first();
    }

    public function store(Request $request): RedirectResponse
    {
        $benefactor = Benefactor::auth();

        $benefactor
            ->followingCharities()
            ->attach($request->only('id'));
        
        $benefactor->update(['total_charities_followed' => ($benefactor->total_charities_followed + 1)]);

        return back();        
    }

    public function destroy (int $id): RedirectResponse
    {
        $benefactor = Benefactor::auth();

        $benefactor
            ->followingCharities()
            ->detach($id);

        $benefactor->update(['total_charities_followed' => ($benefactor->total_charities_followed - 1)]);

        return to_route('benefactor.connections.index');
    }
}