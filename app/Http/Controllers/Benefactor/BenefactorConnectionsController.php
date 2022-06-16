<?php

namespace App\Http\Controllers\Benefactor;

use Inertia\Inertia;
use Inertia\Response;
use App\Enums\CharityCategory;

class BenefactorConnectionsController
{
    public function index(): Response
    {
        return Inertia::render('Benefactor/Connections', [
            'charityCategories' => CharityCategory::getCategoriesValues() 
        ]);
    }
}