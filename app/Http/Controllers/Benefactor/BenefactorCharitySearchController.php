<?php

namespace App\Http\Controllers\Benefactor;

use Inertia\Inertia;
use Inertia\Response;

class BenefactorCharitySearchController
{
    public function index(): Response
    {
        return Inertia::render('Benefactor/Search');
    }
}
