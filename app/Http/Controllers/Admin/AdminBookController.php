<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;
use Str;

class AdminBookController extends Controller
{
    public function index(){
        $books = Book::latest()->get();
        return view('backEnd.book.index',compact('books'));
    }

    public function create(){
        return view('backEnd.book.create');
    }

    public function edit($id){
        $book = Book::find($id);
        return view('backEnd.book.edit',compact('book'));
    }

    public function save(Request $request){
        // Validation rules
        $rules = [
            'name' => [
                'required',
                Rule::unique('books', 'name'),
            ],
            'price' => 'required',
            'print_price' => 'required',
            'image' => 'required',
            'status' => 'required',
        ];

        // Validation messages (customize these as needed)
        $messages = [
            'name.required' => 'Book name is required.',
            'crs_name.unique' => 'The Book is already available.',
            'price.required' => 'Price is required.',
            'print_price.required' => 'Printing price is required.',
            'image.required' => 'Image is required.',
            'status.required' => 'Status is required.',
        ];

        // Validate the request
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $book = new Book();
        $book->name = $request->name;
        $book->slug = Str::slug($request->name, '-');
        $book->print_price = $request->print_price;
        $book->publish_date = $request->publish_date;
        $book->pages = $request->pages;
        $book->price = $request->price;
        $book->total_recipe = $request->total_recipe;
        $book->shipping_price = $request->shipping_price;
        $book->description = $request->description;
        $book->body = $request->body;
        $book->status = $request->status;
        $book->is_featured = $request->is_featured;
        // $course->image = $this->saveImage($request);
        if ($request->file('image')) {
            $book->image = $this->saveImage($request);
        }
        if ($request->file('file')) {
            $book->file = $this->saveFile($request);
        }
        $book->save();
        return redirect()->route('book.list')->with('success','Book Created Successfully');
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

    public function saveFile($request)
    {
        $this->image = $request->file('file');
        $this->imageName = rand().'.'.$this->image->getClientOriginalExtension();
        $this->directory = 'uploads/';
        $this->imageUrl = $this->directory . $this->imageName;
        $this->image->move($this->directory, $this->imageName);
        return $this->imageUrl;
    }

    public function delete($id){
        $book = Book::find($id);

        if (!$book) {
            return redirect()->back()->with('error', 'Book not found');
        }
        Cart::where('book_id', $book->id)->delete();
        Order::where('book_id', $book->id)->delete();

        if (file_exists($book->image)) {
            unlink($book->image);
        }

        if (file_exists($book->file)) {
            unlink($book->file);
        }

        $book->delete();

        return redirect()->back()->with('success', 'Book deleted successfully');
    }


    public function update(Request $request)
    {

        $rules = [
            'name' => 'required',
            'price' => 'required',
            'status' => 'required',
        ];

        // Validation messages (customize these as needed)
        $messages = [
            'name.required' => 'Book name is required.',
            'price.required' => 'Price is required.',
            'status.required' => 'Status is required.',
        ];
        // Validate the request
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // If validation passes, update the student
        $book = Book::find($request->id);
        $book->name = $request->name;
        $book->slug = Str::slug($request->name, '-');
        $book->price = $request->price;
        $book->total_recipe = $request->total_recipe;
        $book->shipping_price = $request->shipping_price;
        $book->publish_date = $request->publish_date;
        $book->pages = $request->pages;
        $book->total_recipe = $request->total_recipe;
        $book->description = $request->description;
        $book->body = $request->body;
        $book->status = $request->status;
        $book->is_featured = $request->is_featured;
//        // $course->image = $this->saveImage($request);
//        if ($request->file('image')) {
//            $book->image = $this->saveImage($request);
//        }
//        if ($request->file('file')) {
//            $book->file = $this->saveFile($request);
//        }
        if ($request->file('image')) {
            if (file_exists($book->image)) {
                unlink($book->image);
            }
            $book->image = $this->saveImage($request);
        }
        if ($request->file('file')) {
            if (file_exists($book->file)) {
                unlink($book->file);
            }
            $book->file = $this->saveFile($request);
        }
        $book->save();

        return redirect()->route('book.list')->with('success', 'Update Successfully');
    }


}
