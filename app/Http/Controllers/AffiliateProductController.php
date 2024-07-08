<?php

namespace App\Http\Controllers;

use App\Models\AffiliateProduct;
use App\Models\Blog;
use Illuminate\Http\Request;

class AffiliateProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $affiliates = AffiliateProduct::whereStatus(1)->latest()->get();
        return view('backEnd.affiliate.index',compact('affiliates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blogs = Blog::whereStatus(1)->latest()->get();
        return view('backEnd.affiliate.create',compact('blogs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'blog_id' => 'required',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'required',
            'status' => 'required|in:1,2',
        ]);

        $affiliate = new AffiliateProduct();
        $affiliate->name = $request->input('name');
        $affiliate->price = $request->input('price');
        $affiliate->link = $request->input('link');
        $affiliate->description = $request->input('description');
        $affiliate->status = $request->input('status');
        $affiliate->blog_id = json_encode($request->blog_id);
        if ($request->file('image')) {
            $affiliate->image = $this->saveImage($request);
        }
        $affiliate->save();
        return redirect()->route('affiliate.index')->with('success', 'Affiliate created successfully.');
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
    public function show($affiliateProduct)
    {
        $affiliateProduct = AffiliateProduct::find($affiliateProduct);
        $blogs = Blog::whereIn('id', json_decode($affiliateProduct->blog_id, true))->get();

        return view('backEnd.affiliate.show', compact('affiliateProduct','blogs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($affiliateProduct)
    {
        $affiliateProduct = AffiliateProduct::find($affiliateProduct);
        $blogs = Blog::whereStatus(1)->latest()->get();
        return view('backEnd.affiliate.edit', compact('affiliateProduct', 'blogs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'blog_id' => 'required',
            'name' => 'required|string|max:255',
            'price' => 'required',
            'status' => 'required',
        ]);

        $affiliateProduct = AffiliateProduct::find($id);
        $affiliateProduct->name = $request->input('name');
        $affiliateProduct->price = $request->input('price');
        $affiliateProduct->link = $request->input('link');
        $affiliateProduct->description = $request->input('description');
        $affiliateProduct->status = $request->input('status');
        $affiliateProduct->blog_id = json_encode($request->input('blog_id'));

        if ($request->file('image')) {
            // Handle the file upload and save the new image path
            $affiliateProduct->image = $this->saveImage($request);
        }

        $affiliateProduct->save();

        return redirect()->route('affiliate.index')->with('success', 'Affiliate updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = AffiliateProduct::find($id);
        if (!$product) {
            return redirect()->back()->with('error', 'Affiliate Product not found');
        }
        if (file_exists($product->image)) {
            unlink($product->image);
        }
        $product->delete();
        return redirect()->back()->with('success', 'Deleted successfully');
    }
}
