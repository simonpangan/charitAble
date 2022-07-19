<?php

namespace App\Http\Controllers\Benefactor;

use PDF;
use App\Models\User;
use App\Models\Benefactor;
use App\Models\Charity\Charity;
use App\Models\ProgramDonation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use App\Models\Charity\CharityFollowers;

class BenefactorReportController
{
    public function redirectToGeneratedReport()
    {
       return redirect()->to(URL::temporarySignedRoute(
        'benefactor.report.generate', now()->addHour(2),
       ));
    }

    public function generate()
    {
        $user = Auth::user();

        abort_if(! $user->is_allowed_to_download, 403);

        $donations =  $user->benefactor->programDonations()
            ->latest('donated_at')
            ->get(['name', 'charity_id','program_donations.amount']);

        $charities = Charity::find($donations->pluck('charity_id')->unique()->toArray(), ['name']);

        $data = [
            'title' => 'Report',
            'date' => now()->toDateTimeString(),
            'user' => $user,    
            'benefactor' => $this->getBenefactorStats(),
            'donations' => $donations,
            'donatedCharities' =>  $charities
        ]; 

        $pdf = PDF::loadView('reports/benefactor', $data);

        $user->update(['last_generate_report' => now()]);

        $user->createLog('You have generated report');

        return $pdf->download(now()->timestamp.'.pdf');
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
}
