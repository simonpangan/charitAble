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
            ->when($category, function($query, $value) {
                dd($query);
            })
            ->paginate(20);
    }
}
