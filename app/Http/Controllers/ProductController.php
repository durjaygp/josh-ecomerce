<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Validator;
use App\Models\ProductCategory;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('backEnd.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backEnd.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => [
                'required',
                Rule::unique('blogs', 'name'),
            ],
            'image' => 'required',
            'status' => 'required',
            'description' => 'required',
            'product_category_id' => 'required',
        ];

        // Validation messages (customize these as needed)
        $messages = [
            'name.required' => 'Blog name is required.',
            'name.unique' => 'This Blog is already available.',
            'description.required' => 'Description is required.',
            'product_category_id.required' => 'Category is required.',
            'image.required' => 'Image is required.',
            'status.required' => 'Status is required.',
        ];

        // Validate the request
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $product = $request->all();
        $product['slug']= Str::slug($request->name, '-');
        if ($request->file('image')) {
            $product['image'] = $this->saveImage($request);
        }
        Product::create($product);
        return redirect()->route('admin-products.index')->with('success','Product Created Successfully');
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
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = ProductCategory::latest()->get();
        return view('backEnd.product.edit', compact('product', 'categories'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Define validation rules
        $rules = [
            'name' => [
                'required',
                Rule::unique('products', 'name')->ignore($id),
            ],
            'status' => 'required',
            'description' => 'required',
            'product_category_id' => 'required',
        ];

        // Validation messages
        $messages = [
            'name.required' => 'Product name is required.',
            'name.unique' => 'This product name is already available.',
            'description.required' => 'Description is required.',
            'product_category_id.required' => 'Category is required.',
            'status.required' => 'Status is required.',
        ];

        // Validate the request
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Gather all input data
        $productData = $request->except(['_token', '_method']);

        // Generate slug from name
        $productData['slug'] = Str::slug($request->name, '-');

        // Handle image upload if a new image is provided
        if ($request->hasFile('image')) {
            $productData['image'] = $this->saveImage($request);
        }
        $product = Product::find($id);
        // Update the product
        $product->update($productData);

        // Redirect with success message
        return redirect()->route('admin-products.index')->with('success', 'Product Updated Successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('success', 'Product Deleted Successfully');
    }
}
