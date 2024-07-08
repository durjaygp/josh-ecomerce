<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::latest()->get();
        return view('backEnd.game.index',compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backEnd.game.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // return $request;
        $request->validate([
            'name'=>'required',
            'image'=>'required'
        ]);
        $game = new Game();
        $game->name = $request->name;
        $game->slug = Str::slug($request->name,'-');
        $game->link = $request->link;
        $game->description = $request->description;
        $game->status = $request->status;
        $game->user_id = auth()->user()->id;
        if ($request->file('image')) {
            $game->image = $this->saveImage($request);
        }
        $game->save();
        return redirect()->back()->with('success','Game Created Successfully');
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
       $game = Game::find($id);
       return view('backEnd.game.edit',compact('game'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $game = Game::find($id);
        $game->delete();
        return redirect()->back()->with('success','Deleted Successful');
    }
}
