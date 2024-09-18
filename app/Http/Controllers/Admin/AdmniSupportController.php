<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderItems;
use App\Models\Support;
use App\Models\SupportMessage;
use Illuminate\Http\Request;

class AdmniSupportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $support = Support::latest()->get();
        return view('backEnd.support.index',compact('support'));
    }

    public function chat($supportId)
    {
        $support = Support::find($supportId);
        $messages = SupportMessage::where('support_id', $support->id)->with('user')->get();
        return view('user.support.chat',compact('support','messages','supportId'));
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
