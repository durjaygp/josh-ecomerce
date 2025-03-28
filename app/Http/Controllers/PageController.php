<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
//use Intervention\Image\ImageManagerStatic;
use Intervention\Image\Image; // Import the Image facade
use App\Models\Page;
use Intervention\Image\ImageManager;
use Illuminate\Support\Str;


class PageController extends Controller
{
    public function about(){
        $about = About::find(1);
        return view('website.pages.about',compact('about'));
    }
    public function faq(){
        $faqs = Faq::whereStatus(1)->get();
        return view('website.pages.faq',compact('faqs'));
    }

    public function contact(){
        $faqs = Faq::whereStatus(1)->get();
        app('mathcaptcha')->reset();

        return view('website.pages.contact',compact('faqs'));
    }

    public function privacy(){
        $page = Page::whereStatus(1)->get();
        return $page;
        return view('website.pages.contact',compact('page'));
    }

    public function index()
    {
        return view('image-upload');
    }

    public function store(Request $request): RedirectResponse
    {
        // Validate the image
        $this->validate($request, [
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048'],
        ]);

        // Get all input data
        $input = $request->all();

        // Convert the uploaded image to webp format
        $image = Image::make($request->file('image'))->encode('webp');

        // Generate a unique name for the image
        $imageName = Str::random() . '.webp';

        // Save the image to the public/images directory
        $image->save(public_path('images/' . $imageName));

        // Store the image name in the input array
        $input['image_name'] = $imageName;

        // Redirect back with a success message and the image name
        return back()
            ->with('success', 'Image converted and saved successfully!')
            ->with('imageName', $imageName);
    }

}
