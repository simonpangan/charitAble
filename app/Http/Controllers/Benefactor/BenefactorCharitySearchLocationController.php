<?php

namespace App\Http\Controllers\Benefactor;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\Location;
use App\Models\Categories;
use App\Models\Charity\Charity;
use FontLib\Table\Type\loca;
use Illuminate\Support\Facades\Auth;

class BenefactorCharitySearchLocationController
{
    public function __invoke(): Response
    {
        return Inertia::render('Benefactor/Search/Location', [
            'locations'=> fn() => Location::all(),
            'charities' => $this->getCharities(request()->only('location'))
        ]);
    }

    private function getCharities($location = null)
    {
        $locationDB = Location::select('*')->whereName($location)->first();

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
            ->when(($location && ! is_null($locationDB)), function($query) use ($locationDB) {
                $query->join('charity_location', 'charity_location.charity_id', '=', 'charities.id');
                $query->where('charity_location.location_id', $locationDB->id);
            })
            ->paginate(20)
            ->withQueryString();
    }
}
