<?php

namespace App\Http\Controllers;

use App\Models\CurrencyLogo;
use App\Models\Social;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socials = Social::latest()->get();
        return view('backEnd.socials.index',compact('socials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backEnd.socials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'icon' => 'required',
            'link' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $currencyLogo = new Social();
        $currencyLogo->name = $request->name;
        $currencyLogo->icon = $request->icon;
        $currencyLogo->link = $request->link;
//        $currencyLogo->status = $request->status;
        $currencyLogo->save();
        return redirect()->back()->with('success', 'Social created successfully');


    }

    /**
     * Display the specified resource.
     */
    public function show(Social $social)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $social = Social::find($id);
        //  return $social;
        return view('backEnd.socials.edit',compact('social'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Social $social)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'icon' => 'required',
            'link' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $currencyLogo = Social::find($request->id);
        $currencyLogo->name = $request->name;
        $currencyLogo->icon = $request->icon;
        $currencyLogo->link = $request->link;
//        $currencyLogo->status = $request->status;
        $currencyLogo->save();
        return redirect()->route('socials.index')->with('success', 'Social Updated successfully');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $currencyLogo = Social::find($id);
        $currencyLogo->delete();

        // Redirect with success message
        return redirect()->back()->with('success', 'Deleted successfully');
    }
}
