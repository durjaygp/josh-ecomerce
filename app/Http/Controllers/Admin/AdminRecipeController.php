<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;
use Illuminate\Support\Str;

class AdminRecipeController extends Controller
{
    public function index(){
        $recipes = Blog::latest()->where('type','recipe')->get();
        return view('backEnd.recipe.index',compact('recipes'));
    }

    public function create(){
        $categories = Category::latest()->where('status',1)->get();
        return view('backEnd.recipe.create',compact('categories'));
    }

    public function edit($id){
        $recipe = Blog::find($id);
        $categories = Category::latest()->where('status',1)->get();
        return view('backEnd.recipe.edit',compact('recipe','categories'));
    }

    public function save(Request $request){
        //return $request;
        // Validation rules
        $rules = [
            'name' => [
                'required',
                Rule::unique('recipes', 'name'),
            ],
            'image' => 'required',
            'status' => 'required',
        ];

        // Validation messages (customize these as needed)
        $messages = [
            'name.required' => 'Recipe name is required.',
            'name.unique' => 'This Recipe is already available.',
            'image.required' => 'Image is required.',
            'status.required' => 'Status is required.',
        ];

        // Validate the request
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $recipe = new Blog();
        $recipe->name = $request->name;
        $recipe->slug = Str::slug($request->name, '-');
        $recipe->user_id = auth()->user()->id;
        $recipe->category_id = $request->category_id;
        $recipe->ingredients = $request->ingredients;
        $recipe->description = $request->description;
        $recipe->ingredients_content = $request->ingredients_content;
        $recipe->peoples = $request->peoples;
        $recipe->duration = $request->duration;

        $recipe->main_content = $request->main_content;
        $recipe->position = $request->position;
        $recipe->status = $request->status;
        $recipe->seo_description = $request->seo_description;
        $recipe->seo_tags = $request->seo_tags;
        $recipe->seo_keywords = $request->seo_keywords;
        $recipe->type = 'recipe';
        // $book->image = $this->saveImage($request);
        if ($request->file('image')) {
            $recipe->image = $this->saveImage($request);
        }
        $recipe->save();
        return redirect()->route('recipe.list')->with('success','Recipe Created Successfully');
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

    public function delete($id){
        $recipe = Blog::find($id);
        if (!$recipe) {
            return redirect()->back()->with('error', 'Recipe not found');
        }
        if (file_exists($recipe->image)) {
            unlink($recipe->image);
        }
        $recipe->delete();
        return redirect()->back()->with('success', 'Recipe deleted successfully');
    }


    public function update(Request $request)
    {
        $rules = [
            'name' => 'required',
            'status' => 'required',
        ];

        // Validation messages (customize these as needed)
        $messages = [
            'name.required' => 'Recipe name is required.',
            'status.required' => 'Status is required.',
        ];

        // Validate the request
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // If validation passes, update the student
        $recipe = Blog::find($request->id);
        $recipe->name = $request->name;
        $recipe->slug = Str::slug($request->name, '-');
        $recipe->user_id = auth()->user()->id;
        $recipe->category_id = $request->category_id;
        $recipe->ingredients = $request->ingredients;
        $recipe->description = $request->description;
        $recipe->ingredients_content = $request->ingredients_content;
        $recipe->peoples = $request->peoples;
        $recipe->duration = $request->duration;

        $recipe->main_content = $request->main_content;
        $recipe->position = $request->position;
        $recipe->status = $request->status;
        $recipe->seo_description = $request->seo_description;
        $recipe->seo_tags = $request->seo_tags;
        $recipe->seo_keywords = $request->seo_keywords;

        if ($request->file('image')) {
            if (file_exists($recipe->image)) {
                unlink($recipe->image);
            }
            $recipe->image = $this->saveImage($request);
        }

        $recipe->save();

        return redirect()->route('recipe.list')->with('success', 'Update Successfully');
    }


}
