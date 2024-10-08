<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Contact;
use App\Models\Page;
use App\Models\Setting;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('backEnd.admin.update');
    }
    public function message() {
        $message = Contact::latest()->get();

        // Get the spam keywords from settings
        $spams = setting()->contact_spam_keywords;

        // Check if $spams is a JSON string; if so, decode it
        if (is_string($spams)) {
            $spams = json_decode($spams, true);
        } else {
            $spams = []; // Default to an empty array if it's not a string
        }

        return view('backEnd.admin.message', compact('message', 'spams'));
    }


    public function updateSpamKeywords(Request $request) {
        $request->validate([
            'contact_spam_keywords' => 'required|string',
        ]);

        // Convert the comma-separated string to an array
        $keywordsArray = explode(',', $request->contact_spam_keywords);

        // Save the keywords as a JSON array in the settings
        $settings = setting(); // Assuming you have a way to get the settings instance
        $settings->contact_spam_keywords = json_encode(array_map('trim', $keywordsArray)); // Trim spaces
        $settings->save();

        return redirect()->back()->with('success', 'Spam keywords updated successfully.');
    }



    public function messageDelete($id){
        $message = Contact::find($id);
        $message->delete();
        return  redirect()->back()->with('success','Deleted Successful');
    }
    public function homeAbout(){
        $row = About::find(1);
        return view('backEnd.pages.about',compact('row'));
    }

    public function homePrivacy(){
        $row = Page::find(1);
        return view('backEnd.pages.privacy',compact('row'));
    }

    public function homeAboutSave(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        $about = About::find(1);
        $about->title = $request->title;
        $about->header = $request->header;
        $about->description = $request->description;
        $about->main_content = $request->main_content;
        if ($request->file('image')) {
            $about->image = $this->saveImage($request);
        }
        $about->save();
        return  redirect()->back()->with('success','updated Successful');
    }

    public function homePrivacySave(Request $request){
        $request->validate([
            'page_title' => 'required',
            'description' => 'required'
        ]);
        $about = Page::find(1);
        $about->page_title = $request->page_title;
        $about->content = $request->content;
        $about->description = $request->description;
        if ($request->file('image')) {
            $about->image = $this->saveImage($request);
        }
        $about->save();
        return  redirect()->back()->with('success','updated Successful');
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


    public function ckeditorUpload(Request $request) { if ($request->hasFile('upload')) {

        $originName = $request->file('upload')->getClientOriginalName();
        $fileName = pathinfo($originName, PATHINFO_FILENAME);
        $extention = $request->file('upload')->getClientOriginalExtension();
        $fileName = $fileName . '_' . time() . '.' . $extention;
        $request->file('upload')->move(public_path('media'), $fileName);

        $url = asset('media/' . $fileName);

        return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
    }
    }

    public function summernoteUpload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $request->file('upload')->move(public_path('media'), $fileName);

            $url = asset('media/' . $fileName);

            return response()->json(['url' => $url]);
        }
    }
}
