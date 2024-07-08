<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Validator;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::latest()->get();
        return view('backEnd.project.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('backEnd.project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
//    public function store(Request $request)
//    {
//        $request->validate([
//            'name' => 'required|unique:projects,name',
//        ]);
//
//        $project = new Project();
//        $project->name = $request->name;
//        $project->slug = Str::slug($request->name, '-'); // Set the slug on the project object
//        $project->image = $this->saveImage($request);
//        $project->user_id = auth()->user()->id;
//        $project->sub_heading = $request->sub_heading;
//        $project->description = $request->description;
//        $project->seo_description = $request->seo_description;
//        $project->seo_tags = $request->seo_tags;
//        $project->seo_keywords = $request->seo_keywords;
//        $project->status = $request->status;
//        $project->position = $request->position;
//
//        if ($request->file('image')) {
//            $project->image = $this->saveImage($request);
//        }
//
//        $project->save();
//
//        return redirect()->back()->with('success', 'Project Created Successfully');
//    }


    public function store(Request $request){

        $rules = [
            'name' => [
                'required',
                Rule::unique('projects', 'name'),
            ],
            'image' => 'required',
            'status' => 'required',
            'description' => 'required',
        ];

        // Validation messages (customize these as needed)
        $messages = [
            'name.required' => 'Blog name is required.',
            'name.unique' => 'This Blog is already available.',
            'description.required' => 'Description is required.',
            'image.required' => 'Image is required.',
            'status.required' => 'Status is required.',
        ];

        // Validate the request
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $project = new Project();
        $project->name = $request->name;
        $project->slug = Str::slug($request->name, '-');
        if ($request->file('image')) {
            $project->image = $this->saveImage($request);
        }

        $project->user_id = auth()->user()->id;
        $project->sub_heading = $request->sub_heading;
        $project->description = $request->description;
        $project->small_title = $request->small_title;
        $project->seo_description = $request->seo_description;
        $project->seo_tags = $request->seo_tags;
        $project->seo_keywords = $request->seo_keywords;
        $project->status = $request->status;
        $project->position = $request->position;

       // return $request->image;
        $project->save();

        return redirect()->back()->with('success','Project Created Successfully');
    }


    public function saveImage($request)
    {
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $directory = 'uploads/projects/';
            $imageUrl = $directory . $imageName;

            // Move the uploaded file to the specified directory
            $image->move($directory, $imageName);

            return $imageUrl;
        } else {
            // Handle case where no valid image file was uploaded
            return null;
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $project = Project::find($project->id);
        return view('backEnd.project.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $rules = [
            'name' => [
                'required',
                Rule::unique('projects', 'name')->ignore($project->id),
            ],
            'status' => 'required',
            'description' => 'required',
        ];

        // Validation messages (customize these as needed)
        $messages = [
            'name.required' => 'Blog name is required.',
            'name.unique' => 'This Blog is already available.',
            'description.required' => 'Description is required.',
            'status.required' => 'Status is required.',
        ];

        // Validate the request
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $project =  Project::find($project->id);
        $project->name = $request->name;
        $project->slug = Str::slug($request->name, '-');
        if ($request->file('image')) {
            $project->image = $this->saveImage($request);
        }

        $project->user_id = auth()->user()->id;
        $project->sub_heading = $request->sub_heading;
        $project->description = $request->description;
        $project->small_title = $request->small_title;
        $project->seo_description = $request->seo_description;
        $project->seo_tags = $request->seo_tags;
        $project->seo_keywords = $request->seo_keywords;
        $project->status = $request->status;
        $project->position = $request->position;

        // return $request->image;
        $project->save();

        return redirect()->back()->with('success','Project Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if (!$project) {
            return redirect()->back()->with('error', 'Project not found');
        }

        if (file_exists($project->image)) {
            unlink($project->image);
        }

        $project->delete();

        return redirect()->back()->with('success', 'Deleted successfully');
    }

}
