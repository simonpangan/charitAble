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
        return response()->json($order);


        //return redirect($order['links'][1]['href'])->send();
       // echo('Create working');
    }

    public function capture(Request $request)
    {

        try{
            ProgramDonation::create([
                'benefactor_id' =>  Auth::user()->id,
                'charity_program_id' => $request['charity_program_id'],
                'amount' => $request['amount'],
                'transaction_id' => $request['transaction_id'],
                'tip_price' => $request['tip_price'],
                'donated_at' => Carbon::now(),
                'is_anonymous' => $request['is_anonymous']
            ]);

            // $charity_name = Charity::where('id',$request['charity_program_id'])->pluck('name')->get();
            Auth::user()->createLog("Donated to a charity" . "with the amount of " . $request['amount']);

            return "Status 500";
        }catch(\Exception $e){
            return response($e);
        }


    }

   
}
