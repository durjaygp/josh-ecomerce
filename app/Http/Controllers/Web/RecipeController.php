<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index(){
        $recipes = Recipe::latest()->where('status',1)->get();
        return view('frontEnd_old.recipe.index',compact('recipes'));
    }

    public function details($id){
        //$recipe = Recipe::where('slug', $slug)->first();
        $recipe = Recipe::find($id);
       // return $recipe;
        return view('frontEnd_old.recipe.show',compact('recipe'));
    }
}
