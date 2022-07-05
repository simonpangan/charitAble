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
            'locations'=> Location::all()->sortBy('name')->values(),
            'charities' => $this->getCharities(
                request()->get('name'), request()->get('location')
            )
        ]);
    }

    private function getCharities($name = null, $location = null)
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
            ->when(($name), function($query, $value) {
                $query->where('charities.name', 'like', '%'.$value.'%'); 
            })
            ->when(($location && ! is_null($locationDB)), function($query) use ($locationDB) {
                $query->join('users', 'users.id', '=', 'charities.id');
                $query->where('users.location_id', $locationDB->id);
            })
            ->paginate(20)
            ->withQueryString();
    }
}
