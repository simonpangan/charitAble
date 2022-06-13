<?php

namespace App\Http\Controllers\Benefactor;

use Inertia\Inertia;
use Inertia\Response;

class BenefactorHomeController
{
    public function index(): Response
    {
        return Inertia::render('Benefactor/Home');
    }
}
