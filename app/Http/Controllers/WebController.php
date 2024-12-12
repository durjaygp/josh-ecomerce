<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AffiliateProduct;
use App\Models\Blog;
use App\Models\Category;
use App\Models\CustomReview;
use App\Models\Faq;
use App\Models\HomepageSetting;
use App\Models\NewPages;
use App\Models\Page;
use App\Models\Project;
use App\Models\Service;
use App\Models\Slider;
use Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Http\Response; // Import the Response class


class WebController extends Controller
{
//    public function index(){
//        $latestBlogs = Blog::latest()->whereStatus(1)->take(6)->get();
//        $sliders = Slider::latest()->whereStatus(1)->get();
//        $services = Service::latest()->whereStatus(1)->take(3)->get();
//        $about = About::find(1);
//        $reviews = CustomReview::whereStatus(1)->latest()->get();
//        return view('frontEnd.home.index',compact('latestBlogs','sliders','services','about','reviews'));
//    }

    public function index()
    {
        $latestBlogs = Cache::remember('latestBlogs', now()->addMinutes(10), function () {
            return Blog::select('id', 'name','slug','description','image', 'created_at')->latest()->whereStatus(1)->take(3)->get();
        });

        $sliders = Cache::remember('sliders', now()->addMinutes(10), function () {
            return Slider::select('id','title','description', 'image', 'upper_subtitle')->latest()->whereStatus(1)->get();
        });

        $services = Cache::remember('services', now()->addMinutes(10), function () {
            return Service::select('id', 'title', 'slug','description','image')->latest()->whereStatus(1)->take(3)->get();
        });

        $faqs = Cache::remember('faqs', now()->addMinutes(10), function () {
            return Faq::select('id', 'question', 'answer','status')->latest()->whereStatus(1)->take(5)->get();
        });

        $about = Cache::remember('about', now()->addMinutes(10), function () {
            return About::find(1);
        });

        $homepage = Cache::remember('homepage', now()->addMinutes(10), function () {
            return HomepageSetting::find(1);
        });

//        return $homepage;

        $reviews = Cache::remember('reviews', now()->addMinutes(10), function () {
            return CustomReview::select('id', 'review','name', 'rating', 'image', 'subject')
                ->whereStatus(1)
                ->latest()
                ->take(6)
                ->get();
        });

        return view('website.home.index', compact('homepage','latestBlogs','faqs', 'sliders', 'services', 'about', 'reviews'));
    }



    public function services(){
        $services = Service::latest()->whereStatus(1)->paginate(9);
        return view('website.service.index',compact('services'));
    }

    public function blog(){
        $blogs = Blog::latest()->whereStatus(1)->with('user')->paginate(8);
        return view('website.blog.index',compact('blogs'));
    }


    public function blogDetails($slug){
        $blog = Blog::where('slug',$slug)->firstOrFail();
        $blogs = Blog::latest()->whereStatus(1)->whereCategoryId($blog->category_id)->take(4)->get();
       //$wordCount = str_word_count(strip_tags($blog->main_content));
       //$readingTime = ceil($wordCount / 200);
        return view('website.blog.details',compact('blog','blogs'));
    }


    public function serviceDetails($slug){
        $service = Service::where('slug',$slug)->firstOrFail();
        return view('website.service.service',compact('service'));
    }

    public function pageDetails($slug){
        $page = NewPages::where('slug',$slug)->firstOrFail();
        return view('frontEnd.page.details',compact('page'));
    }

    public function category($slug) {
        $category = Category::where('slug', $slug)->firstOrFail();
        $blogs = Blog::where('category_id', $category->id)->with('category')->whereStatus(1)->paginate(9);
        return view('website.blog.category', compact('category', 'blogs'));
    }

//    public function projectDetails($slug){
//        $project = Project::where('slug',$slug)->firstOrFail();
//
//        $wordCount = str_word_count(strip_tags($project->description));
//        $readingTime = ceil($wordCount / 200);
//        return view('frontEnd.project.project_details',compact('project','readingTime'));
//    }


    public function privacyPolicy(){
        $privacy = Page::find(1);
        return view('frontEnd.pages.privacy',compact('privacy'));
    }


    public function searchBlog(Request $request){
        $search = '%' . $request->input('search') . '%';

        $cleanedSearch = str_replace('%', '', $search);

        $blogs = Blog::where('name', 'like', $search)
            ->orWhere('description', 'like', $search)
            ->orWhere('main_content', 'like', $search)
            ->paginate(9);

        return view('website.blog.index', compact('blogs', 'cleanedSearch'));
    }

    public function siteMap(): Response // Update the type hint to Illuminate\Http\Response
    {
        $posts = Blog::latest()->whereStatus(1)->get();
        $categories = Category::latest()->whereStatus(1)->get();
        $pages = NewPages::latest()->whereStatus(1)->get();

        return response()->view('sitemap', [
            'posts' => $posts,
            'categories' => $categories,
            'pages' => $pages
        ])->header('Content-Type', 'text/xml');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads'), $imageName);

        return response()->json(['url' => asset('uploads/' . $imageName)]);
    }



}
