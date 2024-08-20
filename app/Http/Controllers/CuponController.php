<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Cupon;
use Carbon\Carbon;

class CuponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = Cupon::latest()->get();
        return view('backEnd.coupons.index',compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backEnd.coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'code'=>'required',
            'value'=>'required',
            'type'=>'required',
            'expiry_date'=>'required',
            'status'=>'required',
        ]);
        $data = $request->all();
        Cupon::create($data);
        return redirect()->back()->with('success','Coupon Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cupon $cupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $coupon = Cupon::find($id);
        return view('backEnd.coupons.edit',compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'code'=>'required',
            'value'=>'required',
            'type'=>'required',
            'expiry_date'=>'required',
            'status'=>'required',
        ]);
        $data = $request->all();
        $coupon = Cupon::find($id);
        $coupon->update($data);
        return redirect()->back()->with('success','Coupon Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $coupon = Cupon::find($id);
        $coupon->delete();
        return redirect()->back()->with('success','Coupon Deleted Successfully');
    }

    public function applyCoupon(Request $request)
    {
        try {
            $couponCode = $request->input('code');

            // Ensure the coupon code is provided
            if (!$couponCode) {
                return redirect()->back()->with('error', 'Please enter a coupon code.');
            }

            // Find the coupon by code
            $coupon = Cupon::where('code', $couponCode)->first();

            // Check if the coupon exists
            if (!$coupon) {
                return redirect()->back()->with('error', 'Invalid coupon code.');
            }

            // Check if the coupon is expired
            if ($coupon->expiry_date && Carbon::parse($coupon->expiry_date)->isPast()) {
                return redirect()->back()->with('error', 'Coupon has expired.');
            }

            // Check if the coupon is deactivated
            if ($coupon->status == 2) {
                return redirect()->back()->with('error', 'Coupon has been deactivated.');
            }

            // Assuming user is authenticated and cart belongs to the user
            $cart = Cart::where('user_id', auth()->user()->id)->first();

            if (!$cart) {
                return redirect()->back()->with('error', 'Cart not found.');
            }

            // Apply the coupon to the cart
            $cart->coupon_id = $coupon->id;
            $cart->save();

            return redirect()->back()->with('success', 'Coupon applied successfully.');

        } catch (\Exception $e) {
            // Log the exception for debugging purposes
            \Log::error('Error applying coupon: ' . $e->getMessage());

            // Redirect back with a generic error message
            return redirect()->back()->with('error', 'An error occurred while applying the coupon. Please try again.');
        }
    }





    public function removeCoupon()
    {
        $cart = Cart::where('user_id',auth()->user()->id)->first();
        // Apply the coupon to the cart
        $cart->coupon_id = null;
        $cart->save();
        return redirect()->back()->with('success','Coupon Removed successfully.');
    }


}
