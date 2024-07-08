<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        $row = Setting::find(1);
        return view('backEnd.admin.update_setting',compact('row'));
    }

    public function update(Request $request){

        $this->setting = Setting::find(1);
        $this->setting->name = $request->name;
        $this->setting->footer = $request->footer;
        $this->setting->description = $request->description;
        $this->setting->google = $request->google;
        $this->setting->author = $request->author;
        $this->setting->keywords = $request->keywords;
        $this->setting->tags = $request->tags;
        $this->setting->url = $request->url;
        $this->setting->email = $request->email;
        $this->setting->address = $request->address;
        $this->setting->phone = $request->phone;
        if ($request->file('website_logo')!=null){
            $this->setting->website_logo = $this->saveImage($request);
        }
        if ($request->file('fav_icon')!=null){
            $this->setting->fav_icon = $this->savefav($request);
        }
        $this->setting->save();
        return redirect()->back()->with('success', 'Settings Updated Successfully');
    }

    public $image, $imageName, $imageUrl, $directory;
    public function saveImage($request)
    {
        $this->image = $request->file('website_logo');
        $this->imageName = rand().'.'.$this->image->getClientOriginalExtension();
        $this->directory = 'upload/website/';
        $this->imageUrl = $this->directory . $this->imageName;
        $this->image->move($this->directory, $this->imageName);
        return $this->imageUrl;
    }
    public function savefav($request)
    {
        $this->image = $request->file('fav_icon');
        $this->imageName = rand().'.'.$this->image->getClientOriginalExtension();
        $this->directory = 'upload/website/';
        $this->imageUrl = $this->directory . $this->imageName;
        $this->image->move($this->directory, $this->imageName);
        return $this->imageUrl;
    }

}
