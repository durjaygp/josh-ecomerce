<?php

namespace App\Http\Controllers;

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
        $request->validate([
            'message' => 'required|string',
            'support_id' => 'required',
        ]);

        // Store the new message
        SupportMessage::create([
            'message' => $request->message,
            'files' => $request->files ? json_encode($request->files) : null,
            'user_id' => auth()->user()->id,
            'support_id' => $request->support_id,
        ]);

        return response()->json(['success' => 'Message sent successfully']);
    }

    public function fetchMessages($supportId)
    {
        $messages = SupportMessage::where('support_id', $supportId)->with('user')->get();
        return response()->json($messages);
    }
}
