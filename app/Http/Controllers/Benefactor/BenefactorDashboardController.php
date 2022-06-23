<?php

namespace App\Http\Controllers\Benefactor;

use Inertia\Inertia;
use Inertia\Response;
use App\Http\Controllers\Controller;
use App\Models\Benefactor;

class BenefactorDashboardController extends Controller
{
    public function index(): Response
    {
        $benefactor = Benefactor::auth();

        $programDonations = $benefactor->programDonations()
            ->latest()
            ->paginate(10, ['name', 'program_donations.amount']);

        return Inertia::render('Benefactor/Dashboard', [
            'benefactor' => $benefactor,    
            'programDonations' => $programDonations 
        ]);
    }
}
