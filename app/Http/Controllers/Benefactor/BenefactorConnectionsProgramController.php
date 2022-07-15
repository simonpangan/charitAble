<?php

namespace App\Http\Controllers\Benefactor;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Charity\CharityProgram;
use App\Models\Charity\CharityFollowers;

class BenefactorConnectionsProgramController
{
    public function index(Request $request)
    {
        return Inertia::render('Benefactor/Connections/Program', [
            'programs' => $this->getFollowingCharitiesProgramPost(
                $request->get('name'), $request->get('category'), request()->get('status')
            ),
            'charityFollowingProgramCategoryStats' => fn () => $this->charityFollowingProgramCategoryStats(),
            'name' => $request->get('name') ?? '',
            'filters' => [
                'status' => (request()->get('status')) ? request()->get('status'): 'All'
            ]
        ]);
    }


    private function getFollowingCharitiesProgramPost(
        string $name = null, string $category = null , $status = null
    ) {
        return CharityProgram::query()
            ->select(['charity_programs.*', 'charities.name as charity_name'])
            ->join('charities', 'charities.id', '=', 'charity_programs.charity_id')
            ->filterProgramBy($name, $category)
            ->when($status, function ($query, $status) {
                if ($status == 'Inactive') 
                {
                    $query->where('charity_programs.is_active', false);
                } else if ($status == 'Active') {
                    $query->where('charity_programs.is_active', true);
                }
            })
            ->latest()
            ->whereNotNull('charities.charity_verified_at')
            ->paginate(12)
            ->withQueryString();
    }
    private function charityFollowingProgramCategoryStats()
    {
        return CharityProgram::query()
            ->selectRaw("count(case when charity_categories.category_id = '1' then 1 end) as Animal_Conservation")
            ->selectRaw("count(case when charity_categories.category_id = '2' then 1 end) as Agriculture")
            ->selectRaw("count(case when charity_categories.category_id = '3' then 1 end) as Children_and_Youth")
            ->selectRaw("count(case when charity_categories.category_id = '4' then 1 end) as Community_Development")
            ->selectRaw("count(case when charity_categories.category_id = '5' then 1 end) as Education")
            ->selectRaw("count(case when charity_categories.category_id = '6' then 1 end) as Environment")
            ->selectRaw("count(case when charity_categories.category_id = '7' then 1 end) as Wildlife_Protection")
            ->selectRaw("count(case when charity_categories.category_id = '8' then 1 end) as Womens_Empowerment")
            ->selectRaw('count(distinct charity_programs.id) as All_Posts')
                    ->join('charity_categories', 'charity_categories.charity_id', 
                            '=',
                            'charity_programs.charity_id'
                        )
                    ->whereIn(
                        'charity_programs.charity_id', 
                        CharityFollowers::query()
                         ->select('charity_id')
                         ->where('benefactor_id', Auth::id())
                         ->get()
                    )
                ->first()
                ->getAttributes()
                ;
    }
}
