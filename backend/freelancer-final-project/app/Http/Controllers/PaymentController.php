<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;

use PayPalHttp\HttpException;
use Stripe\Customer;

class PaymentController extends Controller
{
    public function checkout()
    {
        return view('frontsite.dashboard-user.checkout');
    }

    public function postPaymentStripe(Request $request)
    {
//        dd($request->all());
//        dd($request->cardType);
        if ($request->cardType == 'paypal') {
            $validator = Validator::make($request->all(), [
                'amount' => 'required',
            ]);
            if (!$validator->fails()) {
               return redirect()->route('user.paypal',$request->amount);
            } else {
                return redirect()->route('user.checkout')->with('error', $validator->messages()->first());
            }
        } else {
            $validator = Validator::make($request->all(), [
                'nameOnCard' => 'required',
                'cardNumber' => 'required',
                'expiryMonth' => 'required',
                'expiryYear' => 'required',
                'cvv' => 'required',
                'amount' => 'required',
//            'cardType' => 'required|in:paypal,creditCard'
            ]);

            $input = $request->except('_token');

            if (!$validator->fails()) {
                $stripe = Stripe::setApiKey(env('STRIPE_SECRET'));

                try {
                    $token = $stripe->tokens()->create([
                        'card' => [
                            'number' => $request->post('cardNumber'),
                            'exp_month' => $request->post('expiryMonth'),
                            'exp_year' => $request->post('expiryYear'),
                            'cvc' => $request->post('cvv'),
                        ],
                    ]);

                    if (!isset($token['id'])) {
                        return redirect()->route('stripe.add.money');
                    }
//                $customer = Customer::create(array(
//
//                    "email" => Auth::user()->email,
//
//                    "name" => Auth::user()->name,
//
//                    "source" => $request->stripeToken,
//
//                ));


                    $charge = $stripe->charges()->create([
                        'card' => $token['id'],
                        'currency' => 'USD',
                        'amount' => $request->amount,
//                    "customer" => $customer->id,
                        'description' => 'wallet',
                    ]);

                    if ($charge['status'] == 'succeeded') {
//                    dd($charge);
                        // Create Payment
                        $payment = new Payment();
                        $payment->forceFill([
                            'user_id' => Auth::id(),
                            'gateway' => 'stripe',
                            'status' => 'success',
                            'currency' => $charge['currency'],
                            'reference_id' => $charge['id'],
                            'amount' => $charge['amount'],
                            'data' => json_encode($charge),
                        ])->save();
                        $request->user()->increment('wallet', $request->amount);
                        return redirect()->route('user.success.payment');
                    } else {
                        return redirect()->route('user.checkout')->with('error', 'Money not add in wallet!');
                    }
                } catch (Exception $e) {
//                dd('eee');
                    return redirect()->route('user.checkout')->with('error', $e->getMessage());
                }
            } else {
                return redirect()->route('user.checkout')->with('error', $validator->messages()->first());
            }
        }

    }

    public function getSuccessPayment()
    {
        return view('frontsite.dashboard-user.success-payment');
    }

    public function paypal($amount)
    {

        $client = app()->make('paypal.client');

        $request = new OrdersCreateRequest();
        $request->prefer('return=representation');
        $request->body = [
            "intent" => "CAPTURE",
            "purchase_units" => [[
                "reference_id" => Auth::id(),
                "amount" => [
                    "value" => $amount,
                    "currency_code" => "USD"
                ]
            ]],
            "application_context" => [
                "cancel_url" => route('user.payments.cancel', Auth::id()),
                "return_url" => route('user.payments.return', Auth::id())
            ]
        ];

        try {
            // Call API with your client and get a response for your call
            $response = $client->execute($request);
//            dd($response);
            if ($response->statusCode == 201) {
                Session::put('paypal_order_id', $response->result->id);
                Session::put('user_id', Auth::id());
                foreach ($response->result->links as $link) {
                    if ($link->rel == 'approve') {
                        return redirect()->away($link->href);
                    }
                }
            }
            // If call returns body in response, you can get the deserialized version from the result attribute of the response
//
        } catch (HttpException $ex) {
            echo $ex->statusCode;
            dd($ex->getMessage());
        }
    }

    public function store(Request $request, $user)
    {
        $client = app('paypal.client');
        $request = new OrdersCaptureRequest($request->token);
        $request->prefer('return=representation');
        try {
            // Call API with your client and get a response for your call
            $response = $client->execute($request);
//dd($response);
            // If call returns body in response, you can get the deserialized version from the result attribute of the response
            if ($response->statusCode == 201) {
                if (strtoupper($response->result->status) == 'COMPLETED') {
                    $user_id = Session::get('user_id');
                    $amount = $response->result->purchase_units[0]->amount->value;
                    $payment = new Payment();
                    $payment->forceFill([
                        'user_id' => Auth::id(),
                        'gateway' => 'paypal',
                        'status' => 'success',
                        'currency' => $response->result->purchase_units[0]->amount->currency_code,
                        'reference_id' => $response->result->id,
                        'amount' => $amount,
                        'data' => json_encode($response),
                    ])->save();
                    \session()->forget('paypal_order_id', 'order_id');
                    Auth::user()->increment('wallet', $amount);
                    return redirect()->route('user.success.payment');

                }
            }
        } catch (HttpException $ex) {
            echo $ex->statusCode;
            print_r($ex->getMessage());
        }
    }

    public function cancel($user)
    {
        return 'cancelr';
    }
}
