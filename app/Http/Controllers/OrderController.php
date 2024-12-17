<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItems;
use App\Models\Cupon;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Product;
use App\Models\Shiping;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Stripe;
use Stripe\PaymentMethod;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
//    public function index()
//    {
//        $user = auth()->user()->id;
//        $mainCart = Cart::where('user_id',$user)->first();
//        if ($mainCart){
//            $carts = CartItems::where('user_id',$user)->get();
//            $ship = Shiping::where('user_id',$user)->first();
//            return view('frontEnd.order.checkout',compact('ship','carts','mainCart'));
//        }
//        return redirect()->route('home.products')->with('error','Please add some product');
//    }

    public function index()
    {
        // Retrieve the cart data from the session
        $cart = session()->get('cart', [
            'items' => [],
            'total_quantity' => 0,
        ]);

        // If the cart is empty, redirect the user
        if (empty($cart['items'])) {
            return redirect()->route('home.products')->with('error', 'Please add some product');
        }

        // Get the shipping information (if available in the session)
        $ship = session()->get('shipping_address', null);

        // Prepare the cart items data
        $carts = [];
        foreach ($cart['items'] as $cartItem) {
            $product = Product::find($cartItem['product_id']);
            if ($product) {
                $carts[] = [
                    'product_id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => $cartItem['quantity'],
                    'total_price' => $product->price * $cartItem['quantity'],
                    'image' => $product->image,
                    'slug' => $product->slug,
                ];
            }
        }

        // Calculate the subtotal
        $subtotal = 0;
        foreach ($carts as $cart) {
            $subtotal += $cart['total_price'];
        }

        // Calculate discount
        $coupon = session()->get('coupon');
        $discount = 0;

        if ($coupon) {
            // Retrieve the full coupon details from the database
            $cp = Cupon::where('code', $coupon['code'])->first();

            if ($cp) {
                if ($cp->type == 1) { // Percentage-based discount
                    $discount = $subtotal * ($cp->value / 100);
                } elseif ($cp->type == 2) { // Flat discount
                    $discount = min($subtotal, $cp->value); // Ensure discount does not exceed subtotal
                }
            }
        }

        return view('website.order.checkout', [
            'ship' => $ship,
            'carts' => $carts,
            'mainCart' => $cart,
            'subtotal' => $subtotal,
            'discount' => $discount,
            'coupon' => $coupon,
        ]);
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
        // Start transaction
//        DB::beginTransaction();
//
//        try {


            // Validate the incoming request
            $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'town' => 'required|string|max:255',
                'state' => 'required|string|max:255',
                'postal_code' => 'required|string|max:20',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:20',
                'radioGroup' => 'required|integer', // Ensure payment method selection is validated
            ]);

           /* // Get or create user
            $user = auth()->check() ? auth()->user() : User::create([
                'name' => $request->first_name . ' ' . $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password ?? 'defaultpassword'),
                'role_id' => 1,
            ]);

            Auth::login($user);*/

            if (auth()->check()) {
                $user = auth()->user();
            }else{
                // Create a new user
                $user = User::create([
                    'name' => $request->first_name . ' ' . $request->last_name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'role_id' => 1,
                ]);

                Auth::login($user);
            }


            // Store shipping information
            $shipping = Shiping::updateOrCreate(
                ['user_id' => $user->id],
                $request->except('stripePaymentMethod', 'radioGroup', '_token')
            );

            // Retrieve cart data and calculate totals
            $cart = session()->get('cart', ['items' => [], 'total_quantity' => 0]);
            $carts = [];
            foreach ($cart['items'] as $cartItem) {
                $product = Product::find($cartItem['product_id']);
                if ($product) {
                    $carts[] = [
                        'product_id' => $product->id,
                        'name' => $product->name,
                        'price' => $product->price,
                        'quantity' => $cartItem['quantity'],
                        'total_price' => $product->price * $cartItem['quantity'],
                    ];
                }
            }
            $subtotal = array_sum(array_column($carts, 'total_price'));

            // Apply coupon discount
            $coupon = session()->get('coupon');
            $discount = 0;
            $cp = null;
            if ($coupon) {
                $cp = Cupon::where('code', $coupon['code'])->first();
                if ($cp) {
                    $discount = $cp->type == 1
                        ? $subtotal * ($cp->value / 100)
                        : min($subtotal, $cp->value);
                }
            }
            $total = $subtotal - $discount;

            // Convert total to cents
            $totalCents = (int)round($total * 100);

            if ($request->radioGroup == 1) {

//                return $user;
                // Store order data in the session
            session([
                'order_data' => [
                    'user_id' => $user->id,
                    'order_number' => 'ORD-' . strtoupper(substr(uniqid(), -5)),
                    'coupon_id' => optional($cp)->id,
                    'total_price' => $total,
                    'shipping_id' => $shipping->id,
                    'cart_items' => $carts,
                ]
            ]);
                return $this->processPayPalPayment($carts, $subtotal, $discount, $total, $user, $request);
            }elseif ($request->radioGroup == 2){

            // Initialize Stripe
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            // Create Stripe customer
            $customer = Stripe\Customer::create([
                "address" => [
                    "line1" => $shipping->address,
                    "postal_code" => $shipping->postal_code,
                    "city" => $shipping->town,
                    "state" => $shipping->state,
                    "country" => "USA",
                ],
                "email" => $shipping->email,
                "name" => $shipping->first_name . " " . $shipping->last_name,
                "source" => $request->stripeToken, // Use the token from the front-end
            ]);

            // Create a PaymentIntent
            $intent = Stripe\PaymentIntent::create([
                'amount' => $totalCents,
                'currency' => 'usd',
                'payment_method' => $request->stripePaymentMethod, // Payment method ID
                'customer' => $customer->id ?? null,
                'description' => "Order Payment for " . $shipping->first_name . ' ' . $shipping->last_name,
                'confirm' => true,
                'return_url' => route('payment.return'), // Define your return URL route
            ]);

            // Handle PaymentIntent confirmation
            if ($intent->status === 'requires_action' || $intent->status === 'requires_source_action') {
                // Payment requires additional actions like 3D Secure
                return response()->json([
                    'requires_action' => true,
                    'payment_intent_client_secret' => $intent->client_secret,
                ]);
            } elseif ($intent->status === 'succeeded') {
                // Payment succeeded, proceed to order creation
            } else {
                throw new \Exception('Payment failed. Please try again.');
            }

            // Save order details
            $order = Order::create([
                'user_id' => $user->id,
                'order_number' => 'ORD-' . strtoupper(substr(uniqid(), -5)),
                'total_price' => $total,
                'shipping_id' => $shipping->id,
                'status' => 'pending',
                'payment_status' => 'paid',
                'payment_method' => 'Stripe',
            ]);

            foreach ($cart['items'] as $cartItem) {
                OrderItems::create([
                    'user_id' => $user->id,
                    'order_id' => $order->id,
                    'product_id' => $cartItem['product_id'],
                    'quantity' => $cartItem['quantity'],
                ]);
            }

            // Clear session
            session()->forget('cart');
            session()->forget('coupon');

            }
            // Commit transaction
            DB::commit();

            // Redirect to order success page
            return view('order_success');

//        } catch (\Stripe\Exception\CardException $e) {
//            // Handle Stripe card errors
//            DB::rollBack();
//            return redirect()->back()->withErrors('Card error: ' . $e->getMessage());
//        } catch (\Exception $e) {
//            // Rollback on failure
//            DB::rollBack();
//            return redirect()->back()->withErrors('An error occurred: ' . $e->getMessage());
//        }
    }

    public function handleReturn(Request $request)
    {
        // Retrieve PaymentIntent ID
        $paymentIntentId = $request->input('payment_intent');

        try {
            // Confirm the PaymentIntent
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $paymentIntent = Stripe\PaymentIntent::retrieve($paymentIntentId);

            if ($paymentIntent->status === 'succeeded') {
                // Payment succeeded, process the order
                return redirect()->route('order_success');
            } else {
                // Handle other statuses
                return redirect()->route('order_failed')->withErrors('Payment not completed.');
            }
        } catch (\Exception $e) {
            return redirect()->route('order_failed')->withErrors('An error occurred: ' . $e->getMessage());
        }
    }

    private function processPayPalPayment($carts, $subtotal, $discount, $total, $user, $request)
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
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => number_format($total, 2, '.', ''),
                        "breakdown" => [
                            "item_total" => ["currency_code" => "USD", "value" => number_format($subtotal, 2, '.', '')],
                            "discount" => ["currency_code" => "USD", "value" => number_format($discount, 2, '.', '')],
                        ]
                    ],
                    "description" => $request->details ?? "Order Payment",
                    "invoice_id" => "INV-" . uniqid(),
                    "custom_id" => $user->id,
                    "items" => array_map(function ($item) {
                        return [
                            "name" => $item['name'],
                            "unit_amount" => ["currency_code" => "USD", "value" => number_format($item['price'], 2, '.', '')],
                            "quantity" => $item['quantity'],
                        ];
                    }, $carts),
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
            return redirect()->back()->with('error', 'No approval link found.');
        }

        return redirect()->back()->with('error', $response['message'] ?? 'Something went wrong.');
    }
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
                try {
                    DB::beginTransaction();

                    // Ensure user exists
                    $user = User::find($orderData['user_id']);
                    if (!$user) {
                        throw new \Exception('User not found.');
                    }

                    // Ensure coupon exists or is null
                    $couponId = $orderData['coupon_id'] ?? null;
                    if ($couponId && !Cupon::find($couponId)) {
                        $couponId = null;
                    }

                    // Create the order
                    $order = Order::create([
                        'user_id' => $orderData['user_id'],
                        'order_number' => $orderData['order_number'],
                        'coupon_id' => $couponId,
                        'total_price' => $orderData['total_price'],
                        'shipping_id' => $orderData['shipping_id'],
                        'status' => 'pending',
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

                    // Commit transaction
                    DB::commit();

                    // Clear session data
                    session()->forget('order_data');
                    session()->forget('cart');
                    session()->forget('coupon');

                    return view('order_success');
                } catch (\Exception $e) {
                    DB::rollBack();
                    // Log the error for debugging
                    \Log::error('Order creation failed: ' . $e->getMessage());

                    return redirect()
                        ->route('home')
                        ->with('error', 'Failed to process the order. Please try again.');
                }
            }

            return redirect()
                ->route('home')
                ->with('error', 'Order data not found in session.');
        } else {
            // Log the error message from PayPal
            \Log::error('PayPal transaction failed: ' . ($response['message'] ?? 'No response message'));

            return redirect()
                ->route('home')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

//    public function successTransaction(Request $request)
//    {
//        $provider = new PayPalClient;
//        $provider->setApiCredentials(config('paypal'));
//        $provider->getAccessToken();
//        $response = $provider->capturePaymentOrder($request['token']);
//
//        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
//            // Retrieve order data from session
//            $orderData = session('order_data');
//            if ($orderData) {
//
//                // Ensure user exists
//                $user = User::find($orderData['user_id']);
//                if (!$user) {
//                    return redirect()->back()->withErrors('User not found.');
//                }
//
//                // Ensure coupon exists or is null
//                $couponId = $orderData['coupon_id'] ?? null;
//                if ($couponId && !Cupon::find($couponId)) {
//                    $couponId = null;
//                }
//
//
//                // Store order in the database
//                $order = Order::create([
//                    'user_id' => $orderData['user_id'],
//                    'order_number' => $orderData['order_number'],
//                    'coupon_id' => $couponId,
//                    'total_price' => $orderData['total_price'],
//                    'shipping_id' => $orderData['shipping_id'],
//                    'status' => 'pending',
//                    'payment_status' => 'paid',
//                    'shipping_status' => 'pending',
//                    'payment_method' => 'PayPal',
//                ]);
//
//                // Store order items
//                foreach ($orderData['cart_items'] as $cartItem) {
//                    OrderItems::create([
//                        'user_id' => $orderData['user_id'],
//                        'order_id' => $order->id,
//                        'product_id' => $cartItem['product_id'],
//                        'quantity' => $cartItem['quantity'],
//                    ]);
//                }
//
//                // Clear session data after successful order
//                session()->forget('order_data');
//                session()->forget('cart');
//                session()->forget('coupon');
//
//                return view('order_success');
//            }
//
//            return redirect()
//                ->route('home')
//                ->with('error', 'Order data not found in session.');
//        } else {
//            return redirect()
//                ->route('home')
//                ->with('error', $response['message'] ?? 'Something went wrong.');
//        }
//    }



//    public function store(Request $request)
//    {
//        try {
//            // Start transaction
//            DB::beginTransaction();
//            // Validate the incoming request
//            $request->validate([
//                'first_name' => 'required|string|max:255',
//                'last_name' => 'required|string|max:255',
//                'company_name' => 'nullable|string|max:255',
//                'address' => 'required|string|max:255',
//                'town' => 'required|string|max:255',
//                'state' => 'required|string|max:255',
//                'postal_code' => 'required|string|max:20',
//                'email' => 'required|email|max:255',
//                'phone' => 'required|string|max:20',
//                'password' => 'nullable',
//                'details' => 'nullable|string|max:500',
//                'radioGroup' => 'required|integer', // Ensure payment method is selected
//            ]);
//
//            if (auth()->check()) {
//                $user = auth()->user();
//            }else{
//                // Create a new user
//                $user = User::create([
//                    'name' => $request->first_name . ' ' . $request->last_name,
//                    'email' => $request->email,
//                    'password' => Hash::make($request->password),
//                    'role_id' => 1,
//                ]);
//
//                Auth::login($user);
//            }
//
//
//            // Store shipping information
//            $shipping = Shiping::updateOrCreate(
//                ['user_id' => $user->id],
//                $request->except('password', 'radioGroup')
//            );
//
//            // Retrieve cart data from the session
//            $cart = session()->get('cart', ['items' => [], 'total_quantity' => 0]);
//            $carts = [];
//            foreach ($cart['items'] as $cartItem) {
//                $product = Product::find($cartItem['product_id']);
//                if ($product) {
//                    $carts[] = [
//                        'product_id' => $product->id,
//                        'name' => $product->name,
//                        'price' => $product->price,
//                        'quantity' => $cartItem['quantity'],
//                        'total_price' => $product->price * $cartItem['quantity'],
//                        'image' => $product->image,
//                        'slug' => $product->slug,
//                    ];
//                }
//            }
//
//            // Calculate subtotal
//            $subtotal = array_reduce($carts, fn($carry, $item) => $carry + $item['total_price'], 0);
//
//            // Calculate discount
//            $coupon = session()->get('coupon');
//            $discount = 0;
//            $cp = null;
//
//            if ($coupon) {
//                $cp = Cupon::where('code', $coupon['code'])->first();
//                if ($cp) {
//                    $discount = $cp->type == 1
//                        ? $subtotal * ($cp->value / 100)
//                        : min($subtotal, $cp->value);
//                }
//            }
//
//            // Calculate total
//            $total = $subtotal - $discount;
//
//            // Store order data in the session
//            session([
//                'order_data' => [
//                    'user_id' => $user->id,
//                    'order_number' => 'ORD-' . strtoupper(substr(uniqid(), -5)),
//                    'coupon_id' => optional($cp)->id,
//                    'total_price' => $total,
//                    'shipping_id' => $shipping->id,
//                    'cart_items' => $carts,
//                ]
//            ]);
//
//        // Process payment based on the selected method
//        if ($request->radioGroup == 1) {
//            return $this->processPayPalPayment($carts, $subtotal, $discount, $total, $user, $request);
//        } elseif ($request->radioGroup == 2) {
//            // Store shipping information
//           // $shipping = Shiping::where('user_id', $user->id)->first();
//
//
//
//            $cart = session()->get('cart', ['items' => [], 'total_quantity' => 0]);
//            $carts = [];
//            foreach ($cart['items'] as $cartItem) {
//                $product = Product::find($cartItem['product_id']);
//                if ($product) {
//                    $carts[] = [
//                        'product_id' => $product->id,
//                        'name' => $product->name,
//                        'price' => $product->price,
//                        'quantity' => $cartItem['quantity'],
//                        'total_price' => $product->price * $cartItem['quantity'],
//                        'image' => $product->image,
//                        'slug' => $product->slug,
//                    ];
//                }
//            }
//
//            // Calculate subtotal
//            $subtotal = array_reduce($carts, fn($carry, $item) => $carry + $item['total_price'], 0);
//
//            // Calculate discount
//            $coupon = session()->get('coupon');
//            $discount = 0;
//            $cp = null;
//
//            if ($coupon) {
//                $cp = Cupon::where('code', $coupon['code'])->first();
//                if ($cp) {
//                    $discount = $cp->type == 1
//                        ? $subtotal * ($cp->value / 100)
//                        : min($subtotal, $cp->value);
//                }
//            }
//            $total = $subtotal - $discount;
//
//            // Convert total to cents and ensure it's an integer
//            $totalCents = (int)round($total * 100);
//
//            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
//
//            $customer = Stripe\Customer::create([
//                "address" => [
//                    "line1" => $shipping->address,
//                    "postal_code" => $shipping->postal_code,
//                    "city" => $shipping->town,
//                    "state" => $shipping->state,
//                    "country" => "USA",
//                ],
//                "email" => $shipping->email,
//                "name" => $shipping->first_name . " " . $shipping->last_name,
//                "source" => $request->stripeToken,
//            ]);
//
//            Stripe\Charge::create([
//                "amount" => $totalCents, // amount in cents
//                "currency" => "usd",
//                "customer" => $customer->id,
//                "description" => $shipping->details,
//                "shipping" => [
//                    "name" => $shipping->first_name . " " . $shipping->last_name,
//                    "address" => [
//                        "line1" => $shipping->address,
//                        "postal_code" => $shipping->postal_code,
//                        "city" => $shipping->town,
//                        "state" => $shipping->state,
//                        "country" => "USA",
//                    ],
//                ],
//            ]);
//
//            $order = Order::create([
//                'user_id' => $user->id,
//                'order_number' => 'ORD-' . strtoupper(substr(uniqid(), -5)), // Generates a 5-character unique ID
//                'coupon_id' => $cp->id,
//                'total_price' => $total,
//                'shipping_id' => $shipping->id,
//                'status' => 'pending',
//                'payment_status' => 'paid',
//                'shipping_status' => 'pending',
//                'payment_method' => 'Stripe',
//            ]);
//
//
//            // Store order items
//            foreach ($cart['items'] as $cartItem) {
//                OrderItems::create([
//                    'user_id' => $user->id,
//                    'order_id' => $order->id,
//                    'product_id' => $cartItem['product_id'],
//                    'quantity' => $cartItem['quantity'],
//                ]);
//            }
//
//            // Clear session data after successful order
//            session()->forget('order_data');
//            session()->forget('cart');
//            session()->forget('coupon');
//
//            return view('order_success');
//        }
//
//        return redirect()->back()->with('success', 'Order successfully placed.');
//
//        } catch (\Exception $e) {
//            // Rollback transaction on failure
//            DB::rollBack();
//            return redirect()->back()->withErrors('An error occurred: ' . $e->getMessage());
//        }
//    }


    /**
     * Process PayPal Payment
     */



    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */








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
