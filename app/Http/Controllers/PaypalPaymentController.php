<?php

namespace App\Http\Controllers;

use App\Models\ProgramDonation;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Exceptions;
use App\Http\Requests\Benefactor\BenefactorPaymentRequest;
use App\Models\Charity\Charity;

class PaypalPaymentController extends Controller
{
    public function __construct()
    {
        $this->PayPalClient = new PayPalClient;
    }


    public function create(BenefactorPaymentRequest $request)
    {
        $tip_level = $request->input('tip_level');
        $tip_price = $request->input('tip_price');
        $total_price = $request->input('total_contribution_amount');


        $this->PayPalClient->setApiCredentials(config('paypal'));
        $token = $this->PayPalClient->getAccessToken();
        $this->PayPalClient->setAccessToken($token);
        $order = $this->PayPalClient->createOrder([
            "intent"=> "CAPTURE",
            "purchase_units"=> [
                 [
                    "amount"=> [
                        "currency_code"=> "PHP",
                        "value"=> $total_price
                    ],
                    "description" => $request->input('description')
                ]
            ],
        ]);

        // return (dd(strcmp($order['error']['message'],"Request is not well-formed, syntactically incorrect, or violates schema.") == 0 ));
        if($order['status'] == "CREATED"){
            return response()->json($order);
        }if($order['error']['message'] === "Request is not well-formed, syntactically incorrect, or violates schema."){
            return to_route('charity.donate.create')->with(
               'message', 'Invalid donation amount. Please try again.'
            );
        }else{
            return to_route('charity.donate.create')->with(
                'message', 'Something went wrong with Paypal123. Please try again.'
             );
        }


        //return redirect($order['links'][1]['href'])->send();
       // echo('Create working');
    }

    public function capture(Request $request)
    {
           $donation =  ProgramDonation::create([
                'benefactor_id' =>  Auth::user()->id,
                'charity_program_id' => $request['charity_program_id'],
                'amount' => $request['amount'],
                'transaction_id' => $request['transaction_id'],
                'tip_price' => $request['tip_price'],
                'donated_at' => Carbon::now(),
                'is_anonymous' => $request['is_anonymous']
            ]);

            Auth::user()->createLog("Donated to a charity" . "with the amount of " . $request['amount']);

            return $donation->id;
    }





}
