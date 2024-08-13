<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItems;
use App\Models\Order;
use App\Models\Shiping;
use Illuminate\Http\Request;

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

        // Get all the request data and add the user_id
        $data = $request->all();
        $data['user_id'] = $user->id;

        // Check if a shipping record exists for the user, update if it does, create if it doesn't
        Shiping::updateOrCreate(
            ['user_id' => $user->id], // Condition to check if the record exists
            $data // Data to update or create with
        );

        // Optionally redirect or return a response
        return redirect()->back()->with('success', 'Shipping information saved successfully.');
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
