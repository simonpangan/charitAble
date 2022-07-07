<?php

namespace App\Http\Controllers\Benefactor;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\Charity\Charity;
use App\Models\ProgramDonation;
use App\Models\Charity\CharityProgram;

class BenefactorDonationController
{
    public function index(int $id): Response
    {
        $program = CharityProgram::query()->findOrFail($id);
        $charity_id = $program->charity_id;

        //If user has donate
        $donated = null;
        if ($program_id = session()->pull('program_donation_id', null)
        ) {
            $donated = ProgramDonation::find($program_id);
        };

        return Inertia::render('Benefactor/Payment/Donate',[
            'program' => $program,
            'charity' => Charity::where('id',$charity_id)->get()->toArray(),
            'donated' => $donated 
        ]); 
    }

    public function successIndex(int $id, string $transaction_id): Response
    {
        $program = CharityProgram::query()->findOrFail($id);
        $charity_id = $program->charity_id;
        $transaction_data = ProgramDonation::where('transaction_id',$transaction_id)
            ->get()
            ->toArray();

        return Inertia::render('Benefactor/Payment/DonateSuccess',[
            'program' => $program,
            'charity' => Charity::where('id',$charity_id)->get()->toArray(),
            'transaction' => $transaction_data
        ]);
    }
}
