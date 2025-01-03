<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Models\Cart;
use App\Models\CartItems;
use App\Models\Cupon;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Product;
use App\Models\Shiping;
use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Mail\InvoiceMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;


class StripePaymentController extends Controller
{
//    public function stripe()
//    {
//        return view('stripe');
//    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */


    public function stripePost(Request $request)
    {
        $user = auth()->user();
        try {
            // Start transaction
            DB::beginTransaction();

        // Store shipping information
        $shipping = Shiping::where('user_id', $user->id)->first();



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
        $total = $subtotal - $discount;

        // Convert total to cents and ensure it's an integer
        $totalCents = (int)round($total * 100);

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

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
            "source" => $request->stripeToken,
        ]);

        Stripe\Charge::create([
            "amount" => $totalCents, // amount in cents
            "currency" => "usd",
            "customer" => $customer->id,
            "description" => $shipping->details,
            "shipping" => [
                "name" => $shipping->first_name . " " . $shipping->last_name,
                "address" => [
                    "line1" => $shipping->address,
                    "postal_code" => $shipping->postal_code,
                    "city" => $shipping->town,
                    "state" => $shipping->state,
                    "country" => "USA",
                ],
            ],
        ]);

        $order = Order::create([
            'user_id' => $user->id,
            'order_number' => 'ORD-' . strtoupper(substr(uniqid(), -5)), // Generates a 5-character unique ID
            'coupon_id' => $cp->id,
            'total_price' => $total,
            'shipping_id' => $shipping->id,
            'status' => 'pending',
            'payment_status' => 'paid',
            'shipping_status' => 'pending',
            'payment_method' => 'Stripe',
        ]);


        // Store order items
        foreach ($cart['items'] as $cartItem) {
            OrderItems::create([
                'user_id' => $user->id,
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

        } catch (\Exception $e) {
            // Rollback transaction on failure
            DB::rollBack();
            return redirect()->back()->withErrors('An error occurred: ' . $e->getMessage());
        }
    }
//
//    public function stripePost(Request $request)
//    {
//        $user = auth()->user();
//
//        // Store shipping information
//        $shipping = Shiping::where('user_id', $user->id)->first();
//
//        // Retrieve the main cart and its items
//        $mainCart = Cart::where('user_id', $user->id)->first();
//        $cartItems = CartItems::where('user_id', $user->id)->where('cart_id', $mainCart->id)->get();
//
//        $subtotal = 0;
//        foreach ($cartItems as $item) {
//            $subtotal += $item->product->price * $item->quantity;
//        }
//
//        $discount = 0;
//        if (optional($mainCart->coupon)->type == 1) {
//            $discount = $subtotal * (optional($mainCart->coupon)->value / 100);
//        } elseif (optional($mainCart->coupon)->type == 2) {
//            $discount = optional($mainCart->coupon)->value;
//        }
//
//        $total = $subtotal - $discount;
//
//        // Convert total to cents and ensure it's an integer
//        $totalCents = (int)round($total * 100);
//
//        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
//
//        $customer = Stripe\Customer::create([
//            "address" => [
//                "line1" => $shipping->address,
//                "postal_code" => $shipping->postal_code,
//                "city" => $shipping->town,
//                "state" => $shipping->state,
//                "country" => "USA",
//            ],
//            "email" => $shipping->email,
//            "name" => $shipping->first_name . " " . $shipping->last_name,
//            "source" => $request->stripeToken,
//        ]);
//
//        Stripe\Charge::create([
//            "amount" => $totalCents, // amount in cents
//            "currency" => "usd",
//            "customer" => $customer->id,
//            "description" => $shipping->details,
//            "shipping" => [
//                "name" => $shipping->first_name . " " . $shipping->last_name,
//                "address" => [
//                    "line1" => $shipping->address,
//                    "postal_code" => $shipping->postal_code,
//                    "city" => $shipping->town,
//                    "state" => $shipping->state,
//                    "country" => "USA",
//                ],
//            ],
//        ]);
//
//        // // Create the order
//        // $order = Order::create([
//        //     'user_id' => $user->id,
//        //     'order_number' => uniqid('ORD-'),
//        //     'coupon_id' => $mainCart->coupon_id,
//        //     'total_price' => $total,
//        //     'shipping_id' => $shipping->id,
//        //     'status' => 'completed',
//        //     'payment_status' => 'paid',
//        //     'shipping_status' => 'pending',
//        //     'payment_method' => 'Stripe',
//        // ]);
//        // Create the order
//
//        $order = Order::create([
//            'user_id' => $user->id,
//            'order_number' => 'ORD-' . strtoupper(substr(uniqid(), -5)), // Generates a 5-character unique ID
//            'coupon_id' => $mainCart->coupon_id,
//            'total_price' => $total,
//            'shipping_id' => $shipping->id,
//            'status' => Status::IN_PROGRESS(),
//            'payment_status' => 'paid',
//            'shipping_status' => Status::PENDING(),
//            'payment_method' => 'Stripe',
//        ]);
//
//
//        // Store order items
//        foreach ($cartItems as $cartItem) {
//            OrderItems::create([
//                'user_id' => $user->id,
//                'order_id' => $order->id,
//                'product_id' => $cartItem->product_id,
//                'quantity' => $cartItem->quantity,
//            ]);
//        }
//
//        // Delete the cart items
//        CartItems::where('cart_id', $mainCart->id)->delete();
//
//        // Delete the cart
//        if ($mainCart) {
//            $mainCart->delete();
//        }
//
//        // Send invoice email to user
//        // Mail::to($user->email)->send(new InvoiceMail($order, $cartItems, $subtotal, $discount, $total));
//
//
//        return view('order_success');
//    }



//    public function stripePost(Request $request)
//
//    {
//        $user = auth()->user();
//
//        // Store shipping information
//        $shipping = Shiping::where('user_id',$user->id)->first();
//
//        // Retrieve the main cart and its items
//        $mainCart = Cart::where('user_id', $user->id)->first();
//        $cartItems = CartItems::where('user_id', $user->id)->where('cart_id', $mainCart->id)->get();
//
//        $subtotal = 0;
//        foreach ($cartItems as $item) {
//            $subtotal += $item->product->price * $item->quantity;
//        }
//
//        $discount = 0;
//        if(optional($mainCart->coupon)->type == 1){
//            $discount = $subtotal * (optional($mainCart->coupon)->value / 100);
//        } elseif(optional($mainCart->coupon)->type == 2) {
//            $discount = optional($mainCart->coupon)->value;
//        }
//
//        $total = $subtotal - $discount;
//
//        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
//
//
//
//        $customer = Stripe\Customer::create(array(
//
//            "address" => [
//
//                "line1" => $shipping->address,
//
//                "postal_code" => $shipping->postal_code,
//
//                "city" => $shipping->town,
//
//                "state" => $shipping->state,
//
//                "country" => "USA",
//
//            ],
//
//            "email" => $shipping->email,
//
//            "name" => $shipping->first_name . " ". $shipping->last_name,
//
//            "source" => $request->stripeToken
//
//        ));
//
//
//
//        Stripe\Charge::create ([
//
//            "amount" => $total,
//
//            "currency" => "usd",
//
//            "customer" => $customer->id,
//
//            "description" => $shipping->details,
//
//            "shipping" => [
//
//                "name" => $shipping->first_name . " ". $shipping->last_name,
//
//                "address" => [
//
//                    "line1" => $shipping->address,
//
//                    "postal_code" => $shipping->postal_code,
//
//                    "city" => $shipping->town,
//
//                    "state" => $shipping->state,
//
//                    "country" => "USA",
//
//                ],
//
//            ]
//
//        ]);
//
//
//        $order = Order::create([
//            'user_id' => $orderData['user_id'],
//            'order_number' => $orderData['order_number'],
//            'coupon_id' => $orderData['coupon_id'],
//            'total_price' => $orderData['total_price'],
//            'shipping_id' => $orderData['shipping_id'],
//            'status' => 'completed',
//            'payment_status' => 'paid',
//            'shipping_status' => 'pending',
//        ]);
//
//        // Store order items
//        foreach ($orderData['cart_items'] as $cartItem) {
//            OrderItems::create([
//                'user_id' => $orderData['user_id'],
//                'order_id' => $order->id,
//                'product_id' => $cartItem['product_id'],
//                'quantity' => $cartItem['quantity'],
//            ]);
//        }
//        $delCart = Cart::where('user_id', $orderData['user_id'])->first();
//
//        // Delete the cart items
//        CartItems::where('cart_id', $delCart->id)->delete();
//
//        // Delete the cart
//        $delCart = Cart::where('user_id', $orderData['user_id'])->first();
//        if ($delCart) {
//            $delCart->delete();
//        }
//
//
//
//        return redirect()->route('home')->with('success','Transaction complete and order placed successfully.');
//
//    }


}
