<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class CommentMangaController extends Controller
{
    public function store(Request $request, $manga)
    {
        $this->validate($request, ['comment' => 'required|max:1000']);
        $comment = new Comment();
        $comment->manga_id = $manga;
        $comment->user_id = Auth::id();
        $comment->comment = $request->comment;
        $comment->save();

        //success message
        //  Toastr::success('Comment has been posted', 'Success');
         return redirect()->back();    
    }
}
