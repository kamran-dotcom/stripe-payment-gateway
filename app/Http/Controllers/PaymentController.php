<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;

class PaymentController extends Controller
{
    //

    public function index(Request $request)
    {
        // dd("index function working");

        $validate_data = $request->validate([
            'first_name' => "required",
            "last_name" => "required",
            "phone" => "required",
            "email" => "required",
            "line1" => "required",
            "city" => "required",
            "province" => "required",
            "country" => "required",
            "card_no" => "required|numeric",
            "expiry_month" => "required|numeric",
            "expiry_year" => "required|numeric",
            "cvc" => "required|numeric",
            "amount" => "required|numeric"
        ]);

        // dd("data added");

        $stripe = Stripe::make(env('STRIPE_KEY'));

        try{
            $token = $stripe->tokens()->create([
                "card"=>[
                    "number" => $request->card_no,
                    "exp_month" => $request->expiry_month,
                    "exp_year" => $request->expiry_year,
                    "cvc" => $request->cvc
                ]
            ]);

            if(!isset($token['id']))
            {
                dd("payment not created");
            }
            else
            {
                $customer = $stripe->customers()->create([
                    'name' => $request->first_name ." ". $request->last_name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'address'=>[
                        'line1' => $request->line1,
                        'city' => $request->city,
                        'postal_code' => $request->zipcode,
                        'state' => $request->province,
                        'country' => $request->country
                    ],
                    'shipping'=>[
                        'name' => $request->first_name ." ". $request->last_name,
                        'phone' => $request->phone,
                        'address'=>[
                            'line1' => $request->line1,
                            'city' => $request->city,
                            'postal_code' => $request->zipcode,
                            'state' => $request->province,
                            'country' => $request->country
                            ]
                        ],
                        'source'=> $token['id']
                ]);

                $charge = $stripe->charges()->create([
                    'customer' => $customer['id'],
                    'currency' => 'USD',
                    'amount'   => $request->amount,
                ]);

                if($charge['status'] == "successed")
                {
                    dd("transection aproved");
                }
            }
        } catch(Exception $e)
        {
            dd("error");
        } 


    }
}
