<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminCategoryController extends Controller
{
    public function index(){
        $categories = Category::latest()->get();
        return view('backEnd.category.index',compact('categories'));
    }

    public function edit($id){
        $category = Category::find($id);
        return view('backEnd.category.edit',compact('category'));
    }

    public function create(){
        return view('backEnd.category.create');
    }

    public function save(Request $request){
        $request->validate([
            'name'=>'required|unique:categories'
        ]);
        $category = $request->all();
        $category['slug']= Str::slug($request->name,"-");
        Category::create($category);
        return redirect()->route('category.index')->with('success','Category Created Successfully');
    }
    public function update(Request $request){
        $request->validate([
            'name'=>'required'
        ]);
        // Find the existing category by ID
        $category = Category::find($request->id);

        if (!$category) {
            return redirect()->route('category.index')->with('error', 'Category not found.');
        }
        $data = $request->all();
        $data['slug'] = Str::slug($request->name, '-');
        $category->update($data);
        return redirect()->route('category.index')->with('success','Category Created Successfully');
    }

    public function delete($id)
    {
        $defaultCategory = Category::where('name', 'Uncategorized')->first();
        if (!$defaultCategory) {
            return redirect()->back()->with('error', 'Default category "Uncategorized" not found.');
        }
        $categoryDefaultId = $defaultCategory->id;
        $category = Category::find($id);
        if (!$category) {
            return redirect()->back()->with('error', 'Category not found.');
        }
        if ($category->name === 'Uncategorized') {
            return abort(404);
        }
        $category->blog()->update(['category_id' => $categoryDefaultId]);
        $category->delete();
        return redirect()->back()->with('success', 'Category has been deleted.');
    }


}
