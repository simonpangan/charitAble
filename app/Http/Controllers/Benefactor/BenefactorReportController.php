<?php

namespace App\Http\Controllers\Benefactor;

use App\Models\Charity\Charity;
use PDF;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;

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

        $donations =  $user->benefactor->programDonations()
            ->latest()
            ->get(['name', 'charity_id','program_donations.amount', 'program_donations.created_at']);

            
        $charities = Charity::find($donations->pluck('charity_id')->unique()->toArray(), ['name']);

        $data = [
            'title' => 'Report',
            'date' => now()->toDateTimeString(),
            'user' => $user,
            'donations' => $donations,
            'donatedCharities' =>  $charities
        ]; 

        $pdf = PDF::loadView('reports/benefactor', $data);
        
        return $pdf->stream();
    }
}
