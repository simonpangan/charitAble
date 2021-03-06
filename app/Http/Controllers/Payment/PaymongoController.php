<?php

namespace App\Http\Controllers\Payment;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\ProgramDonation;
use Illuminate\Validation\Rule;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Auth;
use Luigel\Paymongo\Facades\Paymongo;
use App\Models\Charity\CharityProgram;


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
            'tip_level' => $request->tip_level,
            'wallet' => $request->wallet,
            'price' => $request->price,
            'is_anonymous' => $request->is_anonymous
        ]]);

        session(['payment_id' => $gCash->id]);
        
        return Inertia::location($gCash->redirect['checkout_url']);
    }

    public function rules () {
        return [
            'price' => ['required' ,'int', 'min:100', 'max:50000'], 
            'wallet' => ['required' , Rule::in(['G-CASH', 'GRAB PAY']),], 
            'tip_level' => ['required', 'int', 'min:0', 'max:30'], 
            'is_anonymous' => ['required', Rule::in(['true', 'false'])], 
        ];
    }

    public function callback()
    {
        $paymentDetails = session()->pull('payment_details');
        $paymentID =  session()->pull('payment_id');
        
        $program = CharityProgram::findOrFail($paymentDetails['program_id']);

        $message =  'Paid an amount for ' . $paymentDetails['price'] . ' to ' .
        $program->name . ' with a tip level of ' . $paymentDetails['tip_level'] . '%.';
        
        $charitableTip = $paymentDetails['price'] * ($paymentDetails['tip_level'] / 100);

        try {
            $payment = Paymongo::payment()
                ->create([
                    'amount' => $paymentDetails['price'],
                    'currency' => 'PHP',
                    'description' => $message,
                    'statement_descriptor' => $message,
                    'source' => [
                        'id' => $paymentID,
                        'type' => 'source'
                    ]
                ]);
        } catch (\Throwable $th) {
            abort(403);
        }
        
        $totalDonation = ($payment->net_amount / 100) - $charitableTip; 

        $programDonation = ProgramDonation::create([
            'benefactor_id' => Auth::id(),
            'charity_program_id' => $paymentDetails['program_id'],
            'amount' => $totalDonation,
            // 'donated_at' => Carbon::createFromTimestamp($payment->created_at)->format('Y-m-d\TH:i:s.uP'),
            'donated_at' => now(),
            'transaction_id' => $payment->id,
            'tip_price' => $charitableTip,
            'is_anonymous' => ($paymentDetails['is_anonymous'] == 'true') ? 1 : 0,
        ]);

        session(['program_donation_id' => $programDonation->id]);

        Auth::user()->createLog($message);
        
        Paymongo::payment()->find($payment->id);

        return to_route('charity.donate.create', [
            'id' => $paymentDetails['program_id'],
        ]);
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

    public function createPaymentIntent(Request $request)   
    {
        // $request->validate($this->rules());
        $program = CharityProgram::findOrFail($request->program_id);

        $message =  'Paid an amount for ' . $request->price . ' to ' .
        $program->name . ' with a tip level of ' . $request->tip_level . '%.';

        $paymentIntent = Paymongo::paymentIntent()->create([
            'amount' => $request->price,
            'payment_method_allowed' => [
                'card'
            ],
            'payment_method_options' => [
                'card' => [
                    'request_three_d_secure' => 'automatic'
                ]
            ],
            'description' => $message,
            'statement_descriptor' => $message,
            'currency' => "PHP",
        ]);
        
        return $paymentIntent->id;
    }

    public function cardPay(Request $request)
    {
        $program = CharityProgram::findOrFail($request->program_id);

        $message =  'Paid an amount for ' . $request->price . ' to ' .
        $program->name . ' with a tip level of ' . $request->tip_level . '%.';
        
        $charitableTip = $request->price * ($request->tip_level / 100);

        $totalDonation = ($request->net_amount / 100) - $charitableTip; 

        ProgramDonation::create([
            'benefactor_id' => Auth::id(),
            'charity_program_id' => $request->program_id,
            'amount' => $totalDonation,
            'donated_at' => Carbon::createFromTimestamp($request->payment_created_at, 'Asia/Manila')->format('Y-m-d\TH:i:s.uP'),
            'transaction_id' => '123123',
            'tip_price' => $charitableTip,
            'is_anonymous' => ($request->is_anonymous == 'true') ? 1 : 0,
        ]);

        Auth::user()->createLog($message);
        
        return to_route('charity.donate.create', [
            'id' => $request->program_id,
        ])->with(
           'message', 'Sucessful G-Cash Transaction'
        );
    }

    public function search(Request $request): void
    {
        $loww = Paymongo::payment()->find('pay_PBNfyqR46QKa6UV5CL52V5gU');


        // $charitableTip = $paymentDetails['price'] * ($paymentDetails['tip_level'] / 100);
        // $totalDonation = $payment->net_amount - $charitableTip; 

        dd($loww);
        $date = Carbon::createFromTimestamp($loww->created_at, 'Asia/Manila')->format('Y-m-d\TH:i:s.uP');  
    }
}
