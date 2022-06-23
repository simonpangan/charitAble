<?php

namespace App\Http\Controllers\Benefactor;


use PDF;
use App\Models\User;
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
        $data = [
            'title' => 'Report',
            'date' => now()->toDateTimeString(),
            'user' => Auth::user(),
        ]; 

        $pdf = PDF::loadView('reports/benefactor', $data);
        
        return $pdf->stream();
    }
}
