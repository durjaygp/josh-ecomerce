<?php

namespace App\Http\Controllers;

use App\Models\HomepageSetting;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomepageSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = HomepageSetting::find(1);
        return view('backEnd.homepage.create',compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(HomepageSetting $homepageSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HomepageSetting $homepageSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $setting = HomepageSetting::find(1);
        $data = $request->all();
        if ($request->file('hero_section_image')) {
            $data["hero_section_image"] = $this->saveImage($request);
        }
        if ($request->file('hero_section_image')) {

            $data["about_section_image"] = $this->saveAnotherImage($request);
        }

        $setting->update($data);
        return redirect()->back()->with('success','Updated Successfully');
    }


    public function saveImage($request)
    {
        $this->image = $request->file('hero_section_image');
        $this->imageName = rand().'.'.$this->image->getClientOriginalExtension();
        $this->directory = 'uploads/';
        $this->imageUrl = $this->directory . $this->imageName;
        $this->image->move($this->directory, $this->imageName);
        return $this->imageUrl;
    }

    public function saveAnotherImage($request)
    {
        $this->image = $request->file('about_section_image');
        $this->imageName = rand().'.'.$this->image->getClientOriginalExtension();
        $this->directory = 'uploads/';
        $this->imageUrl = $this->directory . $this->imageName;
        $this->image->move($this->directory, $this->imageName);
        return $this->imageUrl;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HomepageSetting $homepageSetting)
    {
        //
    }
}
