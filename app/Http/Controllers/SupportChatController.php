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
        return view('user.support.chat', compact('messages', 'supportId','support'));
    }

    public function sendMessage(Request $request)
    {
        $message = new SupportMessage();
        $message->message = $request->input('message');
        $message->user_id = auth()->id();
        $message->support_id = $request->input('support_id');
        $message->save();

        // Broadcast the event
        broadcast(new MessageSent($message))->toOthers();

        return response()->json(['status' => 'Message Sent!']);
    }


    public function fetchMessages($supportId)
    {
        $messages = SupportMessage::where('support_id', $supportId)->with('user')->get();
        return response()->json($messages);
    }
}
