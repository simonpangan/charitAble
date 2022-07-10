<?php

namespace App\Http\Controllers;

use App\Models\ProgramDonation;
use Exception;
use Illuminate\Http\Request;

class BlockchainTransactionController extends Controller
{
    public function __invoke(Request $request)
    {
        $donation = ProgramDonation::findOrFail($request->program_donation);

        $donation->update([
            'blockchain_transaction' => $request->blockchain_transaction,
        ]);

        return to_route('charity.donate.success', [
            'id' => $request->program_id, 
            'donation_id' => $donation->id,
        ]);
    }

    public function PaypalUpdateBlockchainHash(Request $request)
    {

        $donation = ProgramDonation::findOrFail($request->program_donation);

            $donation->update([
                'blockchain_transaction' => $request->blockchain_transaction,
            ]);

            return '200';
    }


}
