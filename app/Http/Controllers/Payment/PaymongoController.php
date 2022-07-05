<?php

namespace App\Http\Controllers\Payment;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\ProgramDonation;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Auth;
use Luigel\Paymongo\Facades\Paymongo;


class PaymongoController
{
    public function gcash(Request $request)
    {
        $gCash = Paymongo::source()->create([
            'type' => 'gcash',
            'amount' => $request->total_price,
            'currency' => 'PHP',
            'redirect' => [
                'success' => env('APP_URL') . 'paymongo/callback-gcash',
                'failed' => env('APP_URL') . "paymongo/callback-gcash/failed"
            ]
        ]);
                
        session(['payment_details' => [
            'program_id' => $request->program_id,
            'total_price' => $request->total_price
        ]]);

        session(['payment_id' => $gCash->id]);
        
        return Inertia::location($gCash->redirect['checkout_url']);
    }

    public function gcashCallback()
    {
        $paymentDetails = session()->pull('payment_details');
        $paymentID =  session()->pull('payment_id');

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
    
        ProgramDonation::create([
            'benefactor_id' => Auth::id(),
            'charity_program_id' => $paymentDetails['program_id'],
            'amount' => $payment->amount,
            'donated_at' => Carbon::createFromTimestamp($payment->created_at, 'Asia/Manila')->format('Y-m-d\TH:i:s.uP'),
            'transaction_id' => $payment->id,
            'tip_price' => 0,
        ]);

        
        Paymongo::payment()->find($payment->id);

        return to_route('charity.donate.create', [
            'id' => $paymentDetails['program_id'],
            'payment_id' => $paymentID
        ])->with(
           'message', 'Sucessful G-Cash Transaction'
        );
    }

    public function gcashFailed(Request $request)
    {
        session()->forget('payment_id');

        $paymentDetails = session()->pull('payment_details');


        return to_route('charity.donate.create', $paymentDetails['program_id'])->withErrors(
            new MessageBag(['paymongo' => 'Invalid Gcash Transaction'])
        );
    }

    public function grabPay(Request $request)
    {
        $grab = Paymongo::source()->create([
            'type' => 'grab_pay',
            'amount' => 100.00,
            'currency' => 'PHP',
            'redirect' => [
                'success' => env('APP_URL') . 'paymongo/callback-grab',
                'failed' => env('APP_URL') . 'paymongo/callback-grab/failed?program_id=99',
            ]
        ]);

        session(['payment_details' => [
            'program_id' => $request->program_id,
            'total_price' => $request->total_price
        ]]);

        session(['payment_id' => $grab->id]);

        return Inertia::location($grab->redirect['checkout_url']);
    }

    public function grabPayCallback(Request $request)
    {
        $paymentDetails = session()->pull('payment_details');

        $payment = Paymongo::payment()
            ->create([
                'amount' => $paymentDetails['total_price'],
                'currency' => 'PHP',
                'description' => 'TEST',
                'statement_descriptor' => 'Test Paymongo',
                'source' => [
                    'id' => session()->pull('payment_id'),
                    'type' => 'source'
                ]
            ]);

        Paymongo::payment()->find($payment->id);

        return to_route('charity.donate.create', $paymentDetails['program_id'])->with(
           'message', 'Successfuly Grab Pay Transaction'
        );
    }

    public function grabPayFailed(Request $request)
    {
        session()->forget('payment_id');

        $paymentDetails = session()->pull('payment_details');

        return to_route('charity.donate.create', $paymentDetails['program_id'])->withErrors(
            new MessageBag(['paymongo' => 'Invalid Grab Pay Transaction'])
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
        $loww = Paymongo::payment()->find('pay_6K3Kaan4tLRzstFsQCzx8AKS');
        $date = Carbon::createFromTimestamp($loww->created_at, 'Asia/Manila')->format('Y-m-d\TH:i:s.uP');  
    }
}
