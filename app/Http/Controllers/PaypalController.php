<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalController extends Controller
{
    public function paypal(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken=$provider->getAccessToken();
        $response =$provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('success'),
                "cancel_url" => route('cancel')
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $request->amount
                    ]
                ]
            ]
        ]);
       // dd($response);
       if(isset($response['id']) && $response['id']!=null)
       {
            foreach($response['links'] as $link)
            {
                if($link['rel']=='approve')
                {
                    // session()->put('paypal_payment_id',$response['id']);
                return redirect()->away($link['href']);
                }
            }
       }else{
              return redirect()->route('cancel');
       }
    }
    public function success(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken=$provider->getAccessToken();
        $response =$provider->capturePaymentOrder($request->token);
       // dd($response);
       if(isset($response['status']) && $response['status']=='COMPLETED')
       {
        // insert in db

        return "payment is successful";
        }
    else
        {
           return redirect()->route('cancel');

       }
    }

    public function cancel()
    {

    }
}
