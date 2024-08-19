<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItems;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Shiping;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user()->id;
        $carts = CartItems::where('user_id',$user)->get();
        $mainCart = Cart::where('user_id',$user)->first();
        $ship = Shiping::where('user_id',$user)->first();
        return view('frontEnd.order.checkout',compact('ship','carts','mainCart'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
//    public function store(Request $request)
//    {
//        // Validate the incoming request
//        $request->validate([
//            'first_name' => 'required|string|max:255',
//            'last_name' => 'required|string|max:255',
//            'company_name' => 'nullable|string|max:255',
//            'address' => 'required|string|max:255',
//            'town' => 'required|string|max:255',
//            'state' => 'required|string|max:255',
//            'postal_code' => 'required|string|max:20',
//            'email' => 'required|email|max:255',
//            'phone' => 'required|string|max:20',
//            'details' => 'nullable|string|max:500',
//        ]);
//
//        $user = auth()->user();
//
//        $data = $request->all();
//        $data['user_id'] = $user->id;
//
//        Shiping::updateOrCreate(
//            ['user_id' => $user->id],
//            $data
//        );
//
//
//        $mainCart = Cart::where('user_id',$user->id)->first();
//        $carts = CartItems::where('user_id',$user->id)->where('cart_id',$mainCart->id)->get();
//
//        $provider = new PayPalClient;
//        $provider->setApiCredentials(config('paypal'));
//        $paypalToken = $provider->getAccessToken();
//        $response = $provider->createOrder([
//            "intent" => "CAPTURE",
//            "application_context" => [
//                "return_url" => route('successTransaction'),
//                "cancel_url" => route('cancelTransaction'),
//            ],
//            "purchase_units" => [
//                0 => [
//                    "amount" => [
//                        "currency_code" => "USD",
//                        "value" => "5.00"
//                    ]
//                ]
//            ]
//        ]);
//        if (isset($response['id']) && $response['id'] != null) {
//            // redirect to approve href
//            foreach ($response['links'] as $links) {
//                if ($links['rel'] == 'approve') {
//                    return redirect()->away($links['href']);
//                }
//            }
//            return redirect()
//                ->route('createTransaction')
//                ->with('error', 'Something went wrong.');
//        } else {
//            return redirect()
//                ->route('createTransaction')
//                ->with('error', $response['message'] ?? 'Something went wrong.');
//        }
//
//        return redirect()->back()->with('success', 'Order successfully');
//    }

public function store(Request $request)
{
    // Validate the incoming request
    $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'company_name' => 'nullable|string|max:255',
        'address' => 'required|string|max:255',
        'town' => 'required|string|max:255',
        'state' => 'required|string|max:255',
        'postal_code' => 'required|string|max:20',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'details' => 'nullable|string|max:500',
    ]);

    $user = auth()->user();

    // Store shipping information
    $shipping = Shiping::updateOrCreate(
        ['user_id' => $user->id],
        $request->all()
    );

    // Retrieve the main cart and its items
    $mainCart = Cart::where('user_id', $user->id)->first();
    $cartItems = CartItems::where('user_id', $user->id)->where('cart_id', $mainCart->id)->get();

    if ($request->radioGroup == 1) {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction'),
                "cancel_url" => route('cancelTransaction'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => "1000.00" // Update this with the actual cart total
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {
            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
            return redirect()->back()->with('error', 'No approval link found.');
        } else {
            \Log::error('PayPal error:', $response);
            return redirect()->back()->with('error', $response['message'] ?? 'Something went wrong.');
        }

    } elseif ($request->radioGroup == 2) {
        return "PayPal"; // Ensure this is the expected behavior
    }

    return redirect()->back()->with('success', 'Order successfully placed.');
}



    public function processTransaction(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction'),
                "cancel_url" => route('cancelTransaction'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => "5.00"
                    ]
                ]
            ]
        ]);
        if (isset($response['id']) && $response['id'] != null) {
            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
            return redirect()
                ->route('createTransaction')
                ->with('error', 'Something went wrong.');
        } else {
            return redirect()
                ->route('createTransaction')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransaction(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            return redirect()
                ->route('createTransaction')
                ->with('success', 'Transaction complete.');
        } else {
            return redirect()
                ->route('createTransaction')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }
    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction(Request $request)
    {
        return redirect()
            ->route('createTransaction')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
