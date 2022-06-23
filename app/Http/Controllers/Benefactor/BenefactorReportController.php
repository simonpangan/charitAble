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
        'benefactor.report.generate', now()->addSecond(10),
       ));
    }

        public function generate()
    {
        $users = Auth::user();

        $data = [
            'title' => 'Report',
            'date' => now()->toDateTimeString(),
            'user' => array_merge($users->toArray(), $users->benefactor->toArray())
        ]; 

        $pdf = PDF::loadView('reports/benefactor', $data);
        
        return $pdf->stream();
    }
}
