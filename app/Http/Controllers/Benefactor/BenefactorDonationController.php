<?php

namespace App\Http\Controllers\Benefactor;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\Charity\Charity;
use App\Models\ProgramDonation;
use Illuminate\Support\Facades\Auth;
use App\Models\Charity\CharityProgram;

class BenefactorDonationController
{
    public function index(int $id)
    {
        $program = CharityProgram::findOrFail($id);
        $charity_id = $program->charity_id;

        $charity = Charity::find($charity_id);
        
        if (is_null($charity->charity_verified_at) || (! $program->is_active)) {
            return back();
        }

        //If user has donate
        $donated = null;
        if ($program_id = session()->pull('program_donation_id', null)
        ) {
            $donated = ProgramDonation::find($program_id);
        };

        return Inertia::render('Benefactor/Payment/Donate',[
            'program' => $program,
            'charity' => $charity,
            'donated' => $donated
        ]);
    }

    public function successIndex(int $programID, string $donationID): Response
    {
        $program = CharityProgram::query()
            ->with('charity')
            ->findOrFail($programID);
    
        $donation = ProgramDonation::findOrFail($donationID);

        abort_if($donation->charity_program_id != $program->id, 404);
        abort_if($donation->benefactor_id != Auth::id(), 403);

        return Inertia::render('Benefactor/Payment/DonateSuccess',[
            'program' => $program,
            'transaction' => $donation->blockchain_transaction
        ]);
    }
}
