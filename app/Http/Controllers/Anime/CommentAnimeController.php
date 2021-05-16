<?php

namespace App\Http\Controllers\Anime;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\CommentReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class CommentAnimeController extends Controller
{
    public function store(Request $request, $anime)
    {
        $this->validate($request, ['comment' => 'required|max:1000']);
        $comment = new Comment();
        $comment->anime_id = $anime;
        $comment->user_id = Auth::id();
        $comment->comment = $request->comment;
        $comment->save();

        //success message
        Toastr::success('Comment has been posted', 'Success');
        return redirect()->back();
        
    }


    
    public function edit($id)
    {
        $row = DB::table('comments')->where('id', $id)->first();
        $data = [
            'comment' => $row,
        ];

        return view('anime.edit', $data);
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $updateData = $request->validate([
            'comment' => 'required|max:1000',
        ]);
        Comment::whereId($id)->update($updateData);

        Toastr::success('Comment has been edited', 'Success');
        return redirect()->action([AnimeController::class, 'index']);
    }

    //  * Remove the specified resource from storage.
    public function destroy($id){
        //find comment id - 404 error if not found
        $comment = Comment::findOrFail($id);
        if ($comment->user_id == Auth::id() ) {
            //delete replies when deleting the root comment
            $replies = CommentReply::where('comment_id', $id)->delete();
            //delete comment
            $comment->delete();
        }
        
        Toastr::success('Comment has been deleted', 'Success');
        return back();
    }
}
