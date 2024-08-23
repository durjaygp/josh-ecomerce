<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about(){
        return view('frontEnd.pages.about');
    }
    public function faq(){
        $faqs = Faq::whereStatus(1)->get();
        return view('frontEnd.pages.faq',compact('faqs'));
    }

    public function contact(){
        $faqs = Faq::whereStatus(1)->get();
        return view('frontEnd.pages.contact',compact('faqs'));
    }

}
