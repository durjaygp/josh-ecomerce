<?php

namespace App\Http\Controllers;

use App\Models\Cupon;
use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Http\Request;

class UserRouteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user()->id;
        $orders = Order::latest()->where('user_id',$user)->get();
        return view('user.order.index',compact('orders'));
    }

    public function userOrder($id)
    {
        $user = auth()->user()->id;

        $order = Order::where('user_id',$user)->findOrFail($id);
        $orderItems = OrderItems::with('product')->where('user_id',$user)->where('order_id', $order->id)->get();

        // Calculate the subtotal
        $subTotal = $orderItems->sum(function($item) {
            return $item->product->price * $item->quantity;
        });

        // Apply any coupon if available
        $discount = 0;
        if ($order->coupon_id) {
            $coupon = Cupon::find($order->coupon_id);
            if ($coupon) {
                if ($coupon->type == 1) {
                    // Percent discount
                    $discount = ($coupon->value / 100) * $subTotal;
                } elseif ($coupon->type == 2) {
                    // Flat discount
                    $discount = $coupon->value;
                }
            }
        }

        // Calculate the total
        $total = $subTotal - $discount;

        return view('backEnd.order.invoice', compact('order', 'orderItems', 'subTotal', 'discount', 'total'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
