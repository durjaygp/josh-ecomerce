<?php

namespace App\Http\Controllers;

use App\Models\SocialMediaLinks;
use Illuminate\Http\Request;

class SocialMediaLinksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $social = SocialMediaLinks::find(1);
        return view('backEnd.socials.update',compact('social'));
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
        // Validate the request data
        $validated = $request->validate([
            'facebook' => 'nullable',
            'whatsapp' => 'nullable',
            'youtube' => 'nullable',
            'instagram' => 'nullable',
            'tiktok' => 'nullable',
            'telegram' => 'nullable',
            'snapchat' => 'nullable',
            'twitter' => 'nullable',
            'pinterest' => 'nullable',
        ]);

        // Find the social media links record by ID (assuming ID is 1)
        $social = SocialMediaLinks::find(1);

        // Update the record with the validated data
        if ($social) {
            $social->update($validated);
        } else {
            // Optionally handle the case where the record does not exist
            // For example, you might create a new record if one does not exist
            $social = SocialMediaLinks::create($validated);
        }

        // Redirect or respond as necessary
        return redirect()->back()->with('success', 'Social media links updated successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(SocialMediaLinks $socialMediaLinks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SocialMediaLinks $socialMediaLinks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SocialMediaLinks $socialMediaLinks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SocialMediaLinks $socialMediaLinks)
    {
        //
    }
}
