<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewPages;
use App\Models\Page;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = NewPages::latest()->get();
        return view('backEnd.pages.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backEnd.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // return $request->all();
        $request->validate([
            'title'=>'required',
            'description'=>'required',
        ]);
        $page = new NewPages();
        $page->title = $request->title;
        $page->slug = Str::slug($request->title,'-');
        $page->description = $request->description;
        $page->main_content = $request->main_content;
        $page->status = $request->status;
        $page->is_featured = $request->is_featured;
        if ($request->file('image')) {
            $page->image = $this->saveImage($request);
        }
        $page->save();
        return redirect()->route('new-page.index')->with('success','Page Created');

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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $row = NewPages::find($id);
        return view('backEnd.pages.edit',compact('row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
        ]);
        $page = NewPages::find($id);
        $page->title = $request->title;
        $page->slug = Str::slug($request->title,'-');
        $page->description = $request->description;
        $page->main_content = $request->main_content;
        $page->status = $request->status;
        $page->is_featured = $request->is_featured;
        if ($request->file('image')) {
            $page->image = $this->saveImage($request);
        }
        $page->save();
        return redirect()->route('new-page.index')->with('success','Page Created');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $page = NewPages::find($id);
        $page->delete();
        return redirect()->back()->with('success','Page Deleted Successfully');
    }
}
