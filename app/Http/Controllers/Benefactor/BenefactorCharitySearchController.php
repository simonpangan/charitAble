<?php

namespace App\Http\Controllers\Benefactor;

use Inertia\Inertia;
use Inertia\Response;
use App\Enums\CharityCategory;

class BenefactorCharitySearchController
{
    public function index(): Response
    {
        return Inertia::render('Benefactor/Search',[
            'charityCategories'=> CharityCategory::getCategories()
        ]);
    }
}
