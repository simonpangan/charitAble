<?php

namespace App\Http\Controllers;

use App\Models\ProgramDonations;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;


class PaypalPaymentController extends Controller
{
    public function __construct()
    {
        $this->PayPalClient = new PayPalClient;
    }


    public function create(Request $request)
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
                    "description" => $tip_price
                ]
            ],
        ]);
        return response()->json($order);


        //return redirect($order['links'][1]['href'])->send();
       // echo('Create working');
    }

    public function capture(Request $request)
    {

        $data = json_decode($request->getContent(), true);
        $orderId = $data['orderId'];
        $this->PayPalClient->setApiCredentials(config('paypal'));
        $token = $this->PayPalClient->getAccessToken();
        $this->PayPalClient->setAccessToken($token);
        $result = $this->PayPalClient->capturePaymentOrder($orderId);

//            $result = $result->purchase_units[0]->payments->captures[0];

        return ("FUCKKK");


    }

    public function createProgram($data){

        ProgramDonations::create([
            //benefactor_id : Auth::id
            //program_id : Pass from url_id
        ]);
    }
}
