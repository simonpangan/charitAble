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

        return to_route('charity.donate.create',$request->program_id)
            ->with('blockchain_message', [
                'message' => 'Successful transaction',
                'transaction' => $request->blockchain_transaction,
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
