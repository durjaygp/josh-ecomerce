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


    public function blog(){
        $blogs = Blog::latest()->whereStatus(1)->get();
        return view('homePage.blog.blog',compact('blogs'));
    }



    public function contactMessage(Request $request) {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'service' => 'required',
            'phone' => 'required',
            'description' => 'required|max:500',
            'honeypot' => 'nullable',
            'mathcaptcha' => 'required|mathcaptcha',
        ], [
            'mathcaptcha.required' => 'Please solve the math question.',
            'mathcaptcha.mathcaptcha' => 'The math captcha answer is incorrect.',
        ]);

        // Check if the honeypot field is filled
        if (!empty($request->honeypot)) {
            return redirect()->back()->withErrors(['honeypot' => 'Spam detected.']);
        }

        // Fetch spam keywords from the database
        $settings = setting(); // Assuming a `setting()` helper function or use your model directly
        $spamKeywords = json_decode($settings->contact_spam_keywords, true) ?? [];

        // Check if description contains any spam keywords
        if ($this->containsSpam($request->description, $spamKeywords)) {
            return redirect()->back()->withErrors(['description' => 'Your message appears to be spam.']);
        }

        // Explicitly select the fields to prevent mass assignment issues
        $messageData = $request->only(['name', 'email', 'service', 'phone', 'description']);

        // Create the contact message
        Contact::create($messageData);

        return redirect()->back()->with('success', 'Message sent successfully.');
    }


    protected function containsSpam($description, $spamKeywords) {
        foreach ($spamKeywords as $keyword) {
            if (stripos($description, $keyword) !== false) {
                return true; // Found a spam keyword
            }
        }
        return false; // No spam keywords found
    }







}
