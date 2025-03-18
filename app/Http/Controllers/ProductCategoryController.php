<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ProductCategory::latest()->get();
        return view('backEnd.product_category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backEnd.product_category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);
        $category = $request->all();
        $category['slug'] = Str::slug($request->name,'-');
        ProductCategory::create($category);
        return redirect()->route('admin-product-category.index')->with('success','Product Category Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = ProductCategory::find($id);
        return view('backEnd.product_category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required'
        ]);
        $category =  ProductCategory::find($id);
        $data = $request->all();
        $data['slug'] = Str::slug($request->name,'-');
        $category->update($data);
        return redirect()->route('admin-product-category.index')->with('success','Product Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = ProductCategory::find($id);
        $category->delete();
        return redirect()->back()->with('success','Product Category Deleted Successfully');
    }
}
