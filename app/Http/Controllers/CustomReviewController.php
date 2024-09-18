<?php

namespace App\Http\Controllers;

use App\Models\CustomReview;
use Illuminate\Http\Request;

class CustomReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = CustomReview::latest()->get();
        return view('backEnd.review.index',compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backEnd.review.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'rating' => 'required|string',
            'subject' => 'required|string',
            'review' => 'nullable|string',
            'image' => 'nullable|image',
            'status' => 'nullable|string',
        ]);

        $data = $request->all();

        // Handle image upload if exists
        if ($request->hasFile('image')) {
            $data['image'] = $this->saveImage($request);
        }

        CustomReview::create($data);

        return redirect()->route('custom-review.index')->with('success', 'Review created successfully!');
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
    public function show(CustomReview $customReview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $customReview = CustomReview::find($id);
        return view('backEnd.review.edit',compact('customReview'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'rating' => 'required|string',
            'subject' => 'required|string',
            'review' => 'nullable|string',
            'image' => 'nullable|image',
            'status' => 'nullable|string',
        ]);

        $data = $request->all();

        // Handle image upload if exists
        if ($request->hasFile('image')) {
            $data['image'] = $this->saveImage($request);
        }

        $rev = CustomReview::find($id);
        $rev->update($data);

        return redirect()->route('custom-review.index')->with('success', 'Review created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomReview $customReview)
    {
        //
    }
}
