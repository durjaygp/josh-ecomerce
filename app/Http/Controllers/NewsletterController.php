<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = Newsletter::latest()->get();
        return view('backEnd.news.index',compact('news'));
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
        $request->validate([
            'email'=>'required'
        ]);
        $a = new Newsletter();
        $a->email = $request->email;
        $a->save();
        return redirect()->back()->with('success','Thanks You');
    }

    /**
     * Display the specified resource.
     */
    public function show(Newsletter $newsletter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Newsletter $newsletter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Newsletter $newsletter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Newsletter $newsletter, $id)
    {
        // Use the destroy method on the model
        $newsletter->destroy($id);

        return redirect()->back()->with('success', 'Deleted Successfully');
    }
    public function del($id){
        $newsletter = Newsletter::find($id);
        $newsletter->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
}
