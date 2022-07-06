<?php

namespace App\Http\Controllers\Payment;

use App\Models\Charity\CharityProgram;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\ProgramDonation;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Auth;
use Luigel\Paymongo\Facades\Paymongo;


class PaymongoController
{
    public function pay(Request $request)
    {
        $request->validate($this->rules());

        $gCash = Paymongo::source()->create([
            'type' => ($request->wallet == 'G-CASH') ? 'gcash' : 'grab_pay',
            'amount' => $request->price,
            'currency' => 'PHP',
            'redirect' => [
                'success' => env('APP_URL') . 'paymongo/callback',
                'failed' => env('APP_URL') . "paymongo/callback/failed"
            ]
        ]);
                
        session(['payment_details' => [
            'program_id' => $request->program_id,
            'tip_price' => $request->tip_level,
            'wallet' => $request->wallet
        ]]);

        session(['payment_id' => $gCash->id]);
        
        return Inertia::location($gCash->redirect['checkout_url']);
    }

    public function rules () {
        return [
            'price' => ['required'], 
            'tip_level' => ['required'], 
        ];
    }

    public function callback()
    {
        $paymentDetails = session()->pull('payment_details');
        $paymentID =  session()->pull('payment_id');

        try {
            $payment = Paymongo::payment()
                ->create([
                    'amount' => $paymentDetails['total_price'],
                    'currency' => 'PHP',
                    'description' => 'TEST',
                    'statement_descriptor' => 'Test Paymongo',
                    'source' => [
                        'id' => $paymentID,
                        'type' => 'source'
                    ]
                ]);
        } catch (\Throwable $th) {
            abort(403);
        }
    
        ProgramDonation::create([
            'benefactor_id' => Auth::id(),
            'charity_program_id' => $paymentDetails['program_id'],
            'amount' => $payment->amount,
            'donated_at' => Carbon::createFromTimestamp($payment->created_at, 'Asia/Manila')->format('Y-m-d\TH:i:s.uP'),
            'transaction_id' => $payment->id,
            'tip_price' => 0,
        ]);

        $program = CharityProgram::find($paymentDetails['program_id']);

        Auth::user()->createLog(
            'You have donated an amount of ' . $payment->amount . ' to program \'' .
            $program->name . '\' with a tip price of ' . $paymentDetails['tip_price'] . '.' 
        );
        
        Paymongo::payment()->find($payment->id);

        return to_route('charity.donate.create', [
            'id' => $paymentDetails['program_id'],
            'payment_id' => $paymentID
        ])->with(
           'message', 'Sucessful G-Cash Transaction'
        );
    }

    public function failed(Request $request)
    {
        session()->forget('payment_id');

        $paymentDetails = session()->pull('payment_details');

        $wallet = ($paymentDetails['wallet'] == 'G-CASH') ? 'G-CASH' : 'GRAB PAY';

        return to_route('charity.donate.create', $paymentDetails['program_id'])->withErrors(
            new MessageBag(['paymongo' => "Invalid {$wallet} Transaction"])
        );
    }

    public function createPaymentIntent()   
    {
        $paymentIntent = Paymongo::paymentIntent()->create([
            'amount' => 100,
            'payment_method_allowed' => [
                'card'
            ],
            'payment_method_options' => [
                'card' => [
                    'request_three_d_secure' => 'automatic'
                ]
            ],
            'description' => 'This is a test payment intent',
            'statement_descriptor' => 'LUIGEL STORE',
            'currency' => "PHP",
        ]);
        

        session(['client_key' => $paymentIntent->client_key]);

        $paymentMethod = Paymongo::paymentMethod()->create([
            'type' => 'card',
            'details' => [
                'card_number' => '4343434343434345',
                'exp_month' => 12,
                'exp_year' => 25,
                'cvc' => "123",
            ],
            'billing' => [
                'address' => [
                    'line1' => 'Somewhere there',
                    'city' => 'Cebu City',
                    'state' => 'Cebu',
                    'country' => 'PH',
                    'postal_code' => '6000',
                ],
                'name' => 'Rigel Kent Carbonel',
                'email' => 'rigel20.kent@gmail.com',
                'phone' => '0935454875545'
            ],
        ]);

        $paymentIntent = Paymongo::paymentIntent()->find($paymentIntent->id);
        // Attached the payment method to the payment intent
        $successfulPayment = $paymentIntent->attach($paymentMethod->id);

        dd($paymentMethod);

        return $paymentIntent;
    }

    public function search(Request $request): void
    {
        $loww = Paymongo::payment()->find('pay_6K3Kaasn4tLRzstFsQCzx8AKS');
        dd($loww);
        $date = Carbon::createFromTimestamp($loww->created_at, 'Asia/Manila')->format('Y-m-d\TH:i:s.uP');  
    }
}
