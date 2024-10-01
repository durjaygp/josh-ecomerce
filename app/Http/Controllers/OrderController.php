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
        $mainCart = Cart::where('user_id',$user)->first();
        if ($mainCart){
            $carts = CartItems::where('user_id',$user)->get();
            $ship = Shiping::where('user_id',$user)->first();
            return view('frontEnd.order.checkout',compact('ship','carts','mainCart'));
        }
        return redirect()->route('home.products')->with('error','Please add some product');
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

        $subtotal = 0;
        foreach ($cartItems as $item) {
            $subtotal += $item->product->price * $item->quantity;
        }

        $discount = 0;
        if(optional($mainCart->coupon)->type == 1){
            $discount = $subtotal * (optional($mainCart->coupon)->value / 100);
        } elseif(optional($mainCart->coupon)->type == 2) {
            $discount = optional($mainCart->coupon)->value;
        }

        $total = $subtotal - $discount;

         // Save order data in session
        session([
            'order_data' => [
                'user_id' => $user->id,
                // 'order_number' => 'ORD-' . strtoupper(uniqid()),
                'order_number' => 'ORD-' . strtoupper(substr(uniqid(), -5)),
                'coupon_id' => optional($mainCart->coupon)->id,
                'total_price' => $total,
                'shipping_id' => $shipping->id,
                'cart_items' => $cartItems->toArray()
            ]
        ]);


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
                            "value" => number_format($total, 2, '.', ''), // Use the dynamic total value
                            "breakdown" => [
                                "item_total" => [
                                    "currency_code" => "USD",
                                    "value" => number_format($subtotal, 2, '.', ''),
                                ],
                                "discount" => [
                                    "currency_code" => "USD",
                                    "value" => number_format($discount, 2, '.', ''),
                                ]
                            ]
                        ],
                        "description" => $request->details, // Add a description
                        "invoice_id" => "INV-".uniqid(), // Add a unique invoice ID
                        "custom_id" => $user->id,
                        "cart_id" => $mainCart->id,
                        "items" => $cartItems->map(function($item) {
                            return [
                                "name" => $item->product->name,
                                "unit_amount" => [
                                    "currency_code" => "USD",
                                    "value" => number_format($item->product->price, 2, '.', '')
                                ],
                                "quantity" => $item->quantity,
                                "sku" => $item->product->sku,
                            ];
                        })->toArray()
                    ]
                ]
            ]);


            if (isset($response['id']) && $response['id'] != null) {
                // Redirect to approve href
                foreach ($response['links'] as $links) {
                    if ($links['rel'] == 'approve') {
                        return redirect()->away($links['href']);
                    }
                }
                return redirect()->back()->with('error', 'No approval link found.');
            } else {
                // \Log::error('PayPal error:', $response);
                return redirect()->back()->with('error', $response['message'] ?? 'Something went wrong.');
            }

        } elseif ($request->radioGroup == 2) {
            return view('stripe');
        }

        return redirect()->back()->with('success', 'Order successfully placed.');
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
             // Retrieve order data from session
             $orderData = session('order_data');
             if ($orderData) {
                 // Store order in the database
                 $order = Order::create([
                     'user_id' => $orderData['user_id'],
                     'order_number' => $orderData['order_number'],
                     'coupon_id' => $orderData['coupon_id'],
                     'total_price' => $orderData['total_price'],
                     'shipping_id' => $orderData['shipping_id'],
                     'status' => 'completed',
                     'payment_status' => 'paid',
                     'shipping_status' => 'pending',
                     'payment_method' => 'PayPal',
                 ]);

                 // Store order items
                 foreach ($orderData['cart_items'] as $cartItem) {
                     OrderItems::create([
                         'user_id' => $orderData['user_id'],
                         'order_id' => $order->id,
                         'product_id' => $cartItem['product_id'],
                         'quantity' => $cartItem['quantity'],
                     ]);
                 }
                 $delCart = Cart::where('user_id', $orderData['user_id'])->first();

                 // Delete the cart items
                 CartItems::where('cart_id', $delCart->id)->delete();

                 // Delete the cart
                 $delCart = Cart::where('user_id', $orderData['user_id'])->first();
                 if ($delCart) {
                     $delCart->delete();
                 }

                 // Clear session data after successful order
                 session()->forget('order_data');

                 return view('order_success');
             }

             return redirect()
                 ->route('home')
                 ->with('error', 'Order data not found in session.');
         } else {
             return redirect()
                 ->route('home')
                 ->with('error', $response['message'] ?? 'Something went wrong.');
         }
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
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction(Request $request)
    {
        return redirect()
        ->route('home')
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
