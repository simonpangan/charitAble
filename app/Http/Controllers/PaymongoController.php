<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Luigel\Paymongo\Facades\Paymongo;


class PaymongoController extends Controller
{
    public function store()
    {
        // dd();
        $gCash = Paymongo::source()->create([
            'type' => 'gcash',
            'amount' => 100.00,
            'currency' => 'PHP',
            'redirect' => [
                'success' => env('APP_URL') . 'benefactor/paymongo/callback',
                'failed' => 'http://127.0.0.1:8000/failed'
            ]
        ]);

        session(['payment_id' => $gCash->id]);

        return redirect()->away($gCash->redirect['checkout_url']);
    }

    public function callback(Request $request): void
    {
        $payment = Paymongo::payment()
            ->create([
                'amount' => 100.00,
                'currency' => 'PHP',
                'description' => 'Testing payment',
                'statement_descriptor' => 'Test Paymongo',
                'source' => [
                    'id' => session()->pull('payment_id'),
                    'type' => 'source'
                ]
            ]);

        $loww = Paymongo::payment()->find($payment->id);


        dd($loww);
    }

    public function search(Request $request): void
    {
        $loww = Paymongo::payment()->find('pay_6K3Kaan4tLRzstFsQCzx8AKS');

        dd($loww);
    }
}
