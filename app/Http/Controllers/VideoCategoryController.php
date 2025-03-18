<?php

namespace App\Http\Controllers;

use App\Models\VideoCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class VideoCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = VideoCategory::latest()->get();
        return view('backEnd.video_category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backEnd.video_category.create');
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
        VideoCategory::create($category);
        return redirect()->route('admin-video-category.index')->with('success','Product Category Created Successfully');
    }

    public function uploadFile(Request $request)
    {
        // Validate request
        $request->validate([
            'file' => 'required|file|max:5120', // Max 5MB
        ]);

        // Get uploaded file
        $file = $request->file('file');

        // Define a destination path
        $path = 'video/' . $file->getClientOriginalName();

        // Upload to Nextcloud (WebDAV)
        Storage::disk('webdav')->put($path, file_get_contents($file));

        return response()->json(['message' => 'File uploaded successfully!', 'path' => $path]);
    }

    /**
     * Display the specified resource.
     */
    public function show(VideoCategory $VideoCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = VideoCategory::find($id);
        return view('backEnd.video_category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required'
        ]);
        $category =  VideoCategory::find($id);
        $data = $request->all();
        $data['slug'] = Str::slug($request->name,'-');
        $category->update($data);
        return redirect()->route('admin-video-category.index')->with('success','Product Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = VideoCategory::find($id);
        $category->delete();
        return redirect()->back()->with('success','Product Category Deleted Successfully');
    }
}
