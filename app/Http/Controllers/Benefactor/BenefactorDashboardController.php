<?php

namespace App\Http\Controllers\Benefactor;

use Inertia\Inertia;
use Inertia\Response;
use App\Http\Controllers\Controller;

class BenefactorDashboardController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Benefactor/Dashboard');
    }
}
