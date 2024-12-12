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
        try {
            // Start transaction
            DB::beginTransaction();
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
            'password' => 'nullable',
            'details' => 'nullable|string|max:500',
            'radioGroup' => 'required|integer', // Ensure payment method is selected
        ]);

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
            $request->except('password', 'radioGroup')
        );

        // Retrieve cart data from the session
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
                    'image' => $product->image,
                    'slug' => $product->slug,
                ];
            }
        }

        // Calculate subtotal
        $subtotal = array_reduce($carts, fn($carry, $item) => $carry + $item['total_price'], 0);

        // Calculate discount
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

        // Calculate total
        $total = $subtotal - $discount;

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

        // Process payment based on the selected method
        if ($request->radioGroup == 1) {
            return $this->processPayPalPayment($carts, $subtotal, $discount, $total, $user, $request);
        } elseif ($request->radioGroup == 2) {
            return view('stripe');
        }

        return redirect()->back()->with('success', 'Order successfully placed.');

        } catch (\Exception $e) {
            // Rollback transaction on failure
            DB::rollBack();
            return redirect()->back()->withErrors('An error occurred: ' . $e->getMessage());
        }
    }


    /**
     * Process PayPal Payment
     */
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

                 // Clear session data after successful order
                 session()->forget('order_data');
                 session()->forget('cart');
                 session()->forget('coupon');

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
