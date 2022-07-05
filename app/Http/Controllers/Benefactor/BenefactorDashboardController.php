<?php

namespace App\Http\Controllers\Benefactor;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\Benefactor;
use App\Models\Charity\Charity;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BenefactorDashboardController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Benefactor/Dashboard', [
            'benefactor' => fn() => $this->getBenefactorAuth(),
            'programDonations'=> fn() => $this->getProgramDonations(),
            'charities' => fn () => $this->getCharities(),
            'canDownload' => Auth::user()->is_allowed_to_download
        ]);
    }

    private function getBenefactorAuth()
    {
        return Benefactor::auth();
    }

    private function getProgramDonations()
    {
        return $this->getBenefactorAuth()->programDonations()
        ->latest()
        ->paginate(10, ['name', 'program_donations.amount']);
    }

    private function getCharities()
    {
        $charityID = $this->getBenefactorAuth()->programDonations()
            ->latest('donated_at')
            ->get(['name', 'charity_id','program_donations.amount'])
            ->pluck('charity_id')->unique()->toArray();

        return Charity::whereIn('id', $charityID)->paginate(10);
    }

    private function getTotalDonation(){
        return dd();
    }
}
