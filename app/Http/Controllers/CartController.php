<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItems;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user()->id;
        $carts = CartItems::where('user_id',$user)->get();
        $mainCart = Cart::where('user_id',$user)->first();
       return view('frontEnd.order.cart',compact('carts','mainCart'));
    }

    public function cartCount(){
        $cart = CartItems::where('user_id',auth()->user()->id)->sum('quantity');
        return response()->json(['cart' => $cart]);
    }

    public function removeCart($id){
        $cart = CartItems::find($id);
        $cart->delete();
        return redirect()->back()->with('success', 'Cart Updated Successfully');
    }

    public function cartAdd($id){
        $cart = CartItems::find($id);
        $cart->update([
            'quantity' => $cart->quantity + 1,
        ]);
        return redirect()->back()->with('success', 'Cart Updated Successfully');
    }

    public function cartOneRemove($id){
        $cart = CartItems::find($id);
        if ($cart->quantity == 1){
            $this->removeCart($id);
        }else{
            $cart->update([
                'quantity' => $cart->quantity - 1,
            ]);
        }
        return redirect()->back()->with('success', 'Cart Updated Successfully');
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
            if (auth()->check()) {
                $user = auth()->user()->id;
                $product = Product::findOrFail($request->product_id);

                $cart = Cart::firstOrCreate([
                    'user_id' => $user,
                    'status' => 1,
                ]);

                $existingCartItem = CartItems::where('cart_id', $cart->id)->where('product_id', $product->id)->first();

                if ($existingCartItem) {
                    $existingCartItem->update([
                        'quantity' => $existingCartItem->quantity + $request->quantity,
                    ]);
                    $cartItem = $existingCartItem; // Set cartItem to existingCartItem
                } else {
                    $cartItem = CartItems::create([
                        'cart_id' => $cart->id,
                        'user_id' => $user,
                        'product_id' => $product->id,
                        'quantity' => $request->quantity,
                    ]);
                }

                return response()->json(['success' => 'Product added to cart successfully!', 'cartItem' => $cartItem]);
            } else {
                return response()->json(['error' => 'Please login first.'], 401);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


//                $existingProduct = Cart::where('user_id', $user)->where('product_id', $product->id)->first();
//
//                if ($existingProduct) {
//                    // Update the existing cart item
//                    $existingProduct->update([
//                        'quantity' => $existingProduct->quantity + $request->quantity,
//                    ]);
//                    $cart = $existingProduct;
//                } else {
//                    // Create a new cart item
//                    $cart = Cart::create([
//                        'user_id' => $user,
//                        'product_id' => $product->id,
//                        'quantity' => $request->quantity,
//                    ]);
//                }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
