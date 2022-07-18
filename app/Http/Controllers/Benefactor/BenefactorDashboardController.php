<?php

namespace App\Http\Controllers\Benefactor;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\Benefactor;
use App\Models\Charity\Charity;
use App\Http\Controllers\Controller;
use App\Models\Charity\CharityFollowers;
use App\Models\ProgramDonation;
use Illuminate\Support\Facades\Auth;

class BenefactorDashboardController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Benefactor/Dashboard', [
            'benefactor' => fn() => $this->getBenefactorStats(),
            'programDonations'=> fn() => $this->getProgramDonations(),
            'charities' => fn () => $this->getCharities(),
            'canDownload' => Auth::user()->is_allowed_to_download
        ]);
    }

    private function getBenefactorStats() {
        $donationStats =  ProgramDonation::query()
            ->selectRaw("count(*) as total_number_donations")
            ->where('benefactor_id' , Auth::id())
            ->first()
            ->getAttributes();
            
            $charityFollowing = CharityFollowers::where('benefactor_id', Auth::id())->count();

            $totalCharitiesDonated = $this->getBenefactorAuth()->programDonations()
            ->latest('donated_at')
            ->get(['charity_id'])
            ->pluck('charity_id')
            ->unique()
            ->count();

            $benefactorDonation = ProgramDonation::query()
                ->select(['amount'])
                ->where('benefactor_id' , Auth::id())
                ->get();
        
        $benefactorDonation = $benefactorDonation->sum('amount');

        return array_merge($donationStats, 
            ['total_charities_followed' => $charityFollowing] + 
            ['total_charities_donated' => $totalCharitiesDonated] +
            ['total_donation' => $benefactorDonation]
        );
    }

    private function getBenefactorAuth()
    {
        return Benefactor::auth();
    }

    private function getProgramDonations()
    {
        return ProgramDonation::query()
            ->with('program')
            ->where('benefactor_id', Auth::id())
            ->latest('donated_at')
            ->paginate(10, '*', $pageName = 'donation');
    }

    private function getCharities()
    {
        $charityID = $this->getBenefactorAuth()->programDonations()
            ->latest('donated_at')
            ->get(['name', 'charity_id','program_donations.amount'])
            ->pluck('charity_id')->unique()->toArray();

        return Charity::whereIn('id', $charityID)->paginate(10, '*', $pageName = 'charity');
    }
}
