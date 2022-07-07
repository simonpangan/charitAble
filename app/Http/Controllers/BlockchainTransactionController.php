<?php

namespace App\Http\Controllers;

use App\Models\ProgramDonation;
use Illuminate\Http\Request;

class BlockchainTransactionController extends Controller
{
    public function __invoke(Request $request)
    {
        $donation = ProgramDonation::findOrFail($request->program_donation);

        $donation->update([
            'blockchain_transaction' => $request->blokchain_transaction,
        ]);

        return to_route('charity.donate.create',$request->program_id)
            ->with('message', 'Successful blochain transaction');
    }
}
