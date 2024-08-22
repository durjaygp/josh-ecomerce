<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::latest()->get();
        return view('backEnd.service.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backEnd.service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|unique:services',
            'description'=>'required',
        ]);

        $service = $request->all();
        $service['slug'] = Str::slug($request->title,'-');
        $service['image'] = $this->saveImage($request);
        $service['user_id']= auth()->user()->id;
        Service::create($service);
        return redirect()->route('admin-service.index')->with('success','Service Created Successfully');
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
        $service = Service::find($id);
        return view('backEnd.service.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|unique:services,title,' . $id,
            'description'=>'required',
        ]);
        $data = $request->all();
        $data['slug'] = Str::slug($request->title,'-');
        if ($request->file('image')) {
            $data['image'] = $this->saveImage($request);
        }
        $data['user_id']= auth()->user()->id;
        $service = Service::find($id);
        $service->update($data);
        return redirect()->route('admin-service.index')->with('success','Service Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::find($id);
        $service->delete();
        return redirect()->back()->with('success','Service Deleted Successfully');
    }
}
