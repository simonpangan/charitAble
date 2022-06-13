<?php

namespace App\Http\Controllers\Benefactor;

use Inertia\Inertia;
use App\Http\Controllers\Controller;

class BenefactorLogController extends Controller
{
    public function __invoke()
    {
        return Inertia::render('Benefactor/Logs');
    }
}
