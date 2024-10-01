<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Support;
use Illuminate\Http\Request;
use App\Models\SupportMessage;

class SupportChatController extends Controller
{
    public function index($supportId)
    {
        // Fetch all messages for the support ticket
        $support = Support::find($supportId);
        $messages = SupportMessage::where('support_id', $supportId)->with('user')->get();
        // return Auth()->user()->role_id;
        return view('user.support.chat', compact('messages', 'supportId','support'));
    }

     public function sendMessage(Request $request)
     {
         $message = new SupportMessage();
         $message->message = $request->input('message');
         $message->user_id = auth()->id();
         $message->support_id = $request->input('support_id');
         $message->save();
         return response()->json(['status' => 'Message Sent!']);
     }

//     public function sendMessage(Request $request)
// {
//     $request->validate([
//         'image' => 'nullable|image',  // Validate that the uploaded file is an image
//         'message' => 'required|string',
//         'support_id' => 'required|integer',
//     ]);

//     $message = new SupportMessage();
//     $message->message = $request->input('message');
//     $message->user_id = auth()->id();
//     $message->support_id = $request->input('support_id');

//     // Handle image upload if provided
//     if ($request->hasFile('image')) {
//         $imagePath = $request->file('image')->store('uploads/', 'public'); // Save the image
//         $message->image = $imagePath; // Store image path in the database
//     }

//     $message->save();
//     return response()->json(['status' => 'Message Sent!']);
// }



    public function fetchMessages($supportId)
    {
        $messages = SupportMessage::where('support_id', $supportId)
            ->with('user')
            ->get();

        // Ensure that messages have necessary data
        return response()->json($messages);
    }



}
