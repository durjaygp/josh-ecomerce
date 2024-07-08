<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Auth;

class CommentController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'comment'=>'required|max:220',
        ]);
        $com = new Comment();
        $com->blog_id = $request->blog_id;
        $com->user_id = auth()->user()->id;
        $com->comment = $request->comment;
        $com->save();
        return redirect()->back()->with('success','Thanks for the Comment');
    }
    public function delete($id){
        $com = Comment::find($id);
        $com->delete();
        return redirect()->back()->with('success','Deleted Successfully');
    }
    public function destroy($id){
        $comment = Comment::find($id);
        if(!$comment) {
            return redirect()->back()->with('error', 'Comment not found');
        }
        if(auth()->user()->id !== $comment->user_id) {
            return redirect()->back()->with('error', 'Unauthorized');
        }
        $comment->delete();
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Comment Deleted');
    }

}
