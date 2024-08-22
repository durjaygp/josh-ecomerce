<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Service;
use Illuminate\Http\Request;

class AdminFaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = Faq::latest()->get();
        return view('backEnd.faq.index',compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backEnd.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'question'=>'required',
            'answer'=>'required',
        ]);
        $data = $request->all();
        Faq::create($data);
        return redirect()->route('admin-faq.index')->with('success','FAQ Created Successfully');
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
        $faq = Faq::find($id);
        return view('backEnd.faq.edit',compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'question'=>'required',
            'answer'=>'required',
        ]);
        $data = $request->all();
        $faq = Faq::find($id);
        $faq->update($data);
        return redirect()->route('admin-faq.index')->with('success','FAQ Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Faq::find($id);
        $service->delete();
        return redirect()->back()->with('success','Faq Deleted Successfully');
    }
}
