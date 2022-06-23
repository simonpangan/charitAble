<?php

namespace App\Http\Controllers\Benefactor;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\Categories;
use App\Enums\CharityCategory;
use App\Models\Charity\Charity;
use App\Models\Charity\CharityFollowers;
use Illuminate\Support\Facades\Auth;

class BenefactorCharitySearchController
{
    public function index(): Response
    {
        return Inertia::render('Benefactor/Search',[
            'charityCategories'=> fn() => Categories::all(),
            'charities' => $this->getCharities(request()->only('category'))
        ]);
    }

    private function getCharities($category = null)
    {
        $id = Categories::select('id')->whereName($category)->take(1)->first()->id;

        return Charity::query()
            ->select('charities.*')
            ->addSelect(
                \DB::raw(
                    '
                    (EXISTS (SELECT * FROM charity_followers 
                    WHERE charity_followers.charity_id = charities  .id
                    AND charity_followers.benefactor_id = '.Auth::id().')) 
                    as isFollowed'
                )
            )
            ->orderBy('followers', 'desc')
            ->when($category, function($query) use ($id) {
                $query->join('charity_categories', 'charity_categories.charity_id', '=', 'charities.id');
                $query->where('charity_categories.category_id', $id);
            })
            ->paginate(20);
    }
}
