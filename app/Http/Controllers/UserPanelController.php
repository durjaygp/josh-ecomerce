<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
class UserPanelController extends Controller
{
    public function index(){
        $orders = Order::latest()->where('status',0)->where('user_id',auth()->user()->id)->get();
        return view('userPanel.book.index',compact('orders'));
    }
    public function read($encryptedId)
    {
        try {
            $id = Crypt::decrypt($encryptedId);
            $mybook = Order::find($id);

            if (!$mybook) {
                abort(404); // Handle not found
            }

            return view('userPanel.book.show', compact('mybook'));
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            abort(404); // Handle decryption failure
        }
    }
}
