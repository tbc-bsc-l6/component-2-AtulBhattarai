<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalController extends Controller
{
    public function createpaypal()
    {
        return view('paypal_view');
    }

    public function processPaypal(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        
        // Get the PayPal access token
        $paypalToken = $provider->getAccessToken();

        // Log the PayPal Token to check the response
        \Log::info('PayPal Token: ' . json_encode($paypalToken));

        // Create the order with PayPal
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('processSuccess'),
                "cancel_url" => route('processCancel'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => "100.00"
                    ]
                ]
            ]
        ]);

        // Log the full PayPal API response for debugging
        \Log::info('PayPal API Response: ', $response);

        if (isset($response['id']) && $response['id'] != null) {
            // Find the approve link in the response and redirect to it
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            return redirect()
                ->route('createpaypal')
                ->with('error', 'Something went wrong.');
        } else {
            return redirect()
                ->route('createpaypal')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    public function processSuccess(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        
        // Capture the payment order
        $response = $provider->capturePaymentOrder($request['token']);

        // Log the capture response
        \Log::info('Capture Payment Response: ', $response);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            return redirect()
                ->route('createpaypal')
                ->with('success', 'Transaction complete.');
        } else {
            return redirect()
                ->route('createpaypal')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    public function processCancel(Request $request)
    {
        // Handle payment cancellation
        return redirect()
            ->route('createpaypal')
            ->with('error', 'You have canceled the transaction.');
    }
}
