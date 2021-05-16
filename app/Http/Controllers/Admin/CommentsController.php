<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;

class CommentsController extends Controller
{
    //Return view called by resource route named('admin.comments.index') in the admin nav
    public function index()
    {
        return view('admin.comments.index')->with(['comments' => Comment::paginate(10)]);
    }

    //called when delete button in view admin->comments->index is clicked on
    public function destroy($id)
    {
        Comment::destroy($id);

        return redirect(route('admin.comments.index'));
    }
}
