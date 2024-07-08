<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Book;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\NewPages;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function page($slug){
        $page = NewPages::where('slug',$slug)->first();
        return view('frontEnd.pages.details',compact('page'));
    }

    public function index(){
        $books = Book::latest()->where('is_featured',1)->take(1)->get();
        return view('frontEnd_old.home.index',compact('books'));
    }

    public function pay(){
        return view('payfast');
    }

    public function success(){
        return 'Done';
    }

    public function blogDetails($slug){
        $blog = Blog::where('slug',$slug)->first();
        $comments = Comment::where('blog_id', $blog->id)->get();
        return view('homePage.blog.details',compact('blog','comments'));
    }

    public function category($slug){
        $category = Category::where('slug',$slug)->first();
        $recipes = Recipe::where('category_id',$category->id)->latest()->get();
        return view('frontEnd_old.recipe.category',compact('category','recipes'));
    }
    public function blog(){
        $blogs = Blog::latest()->whereStatus(1)->get();
        return view('homePage.blog.blog',compact('blogs'));
    }

    public function searchBooks(Request $request){
        $search = '%' . $request->input('search') . '%';

        $books = Book::where('name', 'like', $search)
            ->orWhere('description', 'like', $search)
            ->orWhere('body', 'like', $search)
            ->get();

        return view('frontEnd_old.books.search', compact('books', 'search'));
    }

    public function searchRecipe(Request $request){
        $search = '%' . $request->input('search') . '%';

        $recipes = Recipe::where('name', 'like', $search)
            ->orWhere('description', 'like', $search)
            ->orWhere('recipe', 'like', $search)
            ->get();

        return view('frontEnd_old.recipe.search', compact('recipes', 'search'));
    }

    public function contactMessage(Request $request){
        $request->validate([
            'name'=>'required|max:255',
            'email'=>'required',
            'message'=>'required|max:255',
        ]);
        $message = new Contact();
        $message->name = $request->name;
        $message->email = $request->email;
        $message->message = $request->message;
        $message->save();
        return redirect()->back()->with('success','Message Send Successful');
    }



}
