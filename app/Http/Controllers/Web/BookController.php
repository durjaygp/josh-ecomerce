<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        return view('frontEnd_old.books.index');
    }
    public function details($slug){
        $book = Book::where('slug', $slug)->first();
        return view('frontEnd_old.books.details',compact('book'));
    }
}
