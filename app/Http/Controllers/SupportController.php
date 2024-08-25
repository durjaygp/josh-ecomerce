<?php

namespace App\Http\Controllers;

use App\Models\OrderItems;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user()->id;
        $orders = OrderItems::where('user_id',$user)->latest()->get();
        $support = Support::where('user_id',$user)->latest()->get();
        return view('user.support.index',compact('support','orders'));
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
        $user = auth()->user()->id;

        $request->validate([
            'title' => 'required|string|max:255',
            'order_item_id' => 'required',
            'reason' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg', // Validate the image
            'status' => 'nullable|string|max:50',
        ]);

        $data = $request->all();
        $data['user_id'] = $user;
        $data['status'] = 1;
        if ($request->hasFile('image')){
            $data['image'] = $this->saveImage($request);
        }
        Support::create($data);
        return redirect()->back()->with('success','Your Ticket Created Successfully');
    }


    public $image, $imageName, $imageUrl, $directory;
    public function saveImage($request)
    {
        $this->image = $request->file('image');
        $this->imageName = rand().'.'.$this->image->getClientOriginalExtension();
        $this->directory = 'uploads/';
        $this->imageUrl = $this->directory . $this->imageName;
        $this->image->move($this->directory, $this->imageName);
        return $this->imageUrl;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $support = Support::find($id);
        return view('user.support.chat',compact('support'));
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
