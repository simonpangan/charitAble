<?php

namespace App\Http\Controllers\Benefactor;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\Categories;
use App\Models\Charity\Charity;
use Illuminate\Support\Facades\Auth;
use App\Models\Charity\CharityProgram;
use App\Models\Charity\CharityCategories;

class BenefactorCharitySearchProgramController
{
    public function __invoke(): Response
    {
        return Inertia::render('Benefactor/Search/Program', [
            'charityCategories'=> fn() => Categories::all(  ),
            'programs' => $this->getPrograms(
                request()->only('name'), request()->only('category')
            )
        ]);
    }

    private function getPrograms($name, $category = null)
    {
        return CharityProgram::query()
            ->select(['charity_programs.*', 'charities.name as charity_name'])
            ->join('charities', 'charities.id', '=', 'charity_programs.charity_id')
            ->latest()
            // ->when($name, function ($query, $name) {
            //     // $query->join('charity_programs', 'charities.id', '=', 'charity_programs.charity_id');
            //     // $query->where('role_id', $name);
            // })
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
            'charity_programs.charity_id', 
            $charityID->toArray()
        );
    }
}
