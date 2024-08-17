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

        // Calculate the total price
        $totalPrice = 0;
        foreach ($cartItems as $item) {
            $totalPrice += $item->quantity * $item->product->price; // Assuming you have a relationship with Product
        }

        // PayPal payment process
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
                        "value" => $totalPrice
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {
            // Store order information
            $order = Order::create([
                'user_id' => $user->id,
                'order_number' => 'ORD-' . strtoupper(Str::random(10)),
                'coupon_id' => $mainCart->coupon_id,
                'total_price' => $totalPrice,
                'shipping_id' => $shipping->id,
                'status' => 1,
                'payment_status' => '1', // Set as pending or processing
                'shipping_status' => '1', // Set as pending or processing
            ]);

            // Store order items
            foreach ($cartItems as $item) {
                OrderItems::create([
                    'user_id' => $user->id,
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                    'discount' => 0, // Assuming no discount for now
                    'total' => $item->quantity * $item->product->price,
                ]);
            }

            // Redirect to PayPal approval
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            return redirect()->route('createTransaction')->with('error', 'Something went wrong with the PayPal approval.');
        } else {
            return redirect()->route('createTransaction')->with('error', $response['message'] ?? 'Something went wrong with the PayPal process.');
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
