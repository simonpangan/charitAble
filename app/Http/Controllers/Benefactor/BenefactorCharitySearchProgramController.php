<?php

namespace App\Http\Controllers\Benefactor;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\Categories;
use App\Models\Charity\CharityProgram;
use App\Models\Charity\CharityCategories;

class BenefactorCharitySearchProgramController
{
    public function __invoke(): Response
    {
        return Inertia::render('Benefactor/Search/Program', [
            'charityCategories'=> fn() => Categories::all(  ),
            'programs' => $this->getPrograms(
                request()->get('name'), request()->get('category')
                , request()->get('status')
            ),
            'name' => request()->get('name') ?? '',
            'filters' => [
                'status' => (request()->get('status')) ? request()->get('status') : 'All',
                'category' => (request()->get('category')) ? request()->get('category') : 'All'
            ],
        ]);
    }

    private function getPrograms($name, $category = null, $status = null)
    {
        return CharityProgram::query()
            ->select(['charity_programs.*', 'charities.name as charity_name'])
            ->join('charities', 'charities.id', '=', 'charity_programs.charity_id')
            ->latest()
            ->when($name, function ($query, $name) {
                $query->where('charity_programs.name', 'like', '%'.$name.'%'); 
            })
            ->when($category, function ($query, $category) {
              $this->filterByCategory($query, $category);
            })
            ->when($status, function ($query, $status) {
                if ($status == 'Inactive') 
                {
                    $query->where('charity_programs.is_active', false);
                } else if ($status == 'Active') {
                    $query->where('charity_programs.is_active', true);
                }
            })
            ->whereNotNull('charities.charity_verified_at')
            ->paginate(12)
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
