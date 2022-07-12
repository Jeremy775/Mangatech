<?php

namespace App\Http\Controllers;

use App\Models\CommentReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Anime\AnimeController;

class CommentReplyController extends Controller
{
    public function store(Request $request, $comment)
    {
        $this->validate($request, ['message' => 'required|max:1000']);
        $commentReply = new CommentReply();
        $commentReply->comment_id = $comment;
        $commentReply->user_id = Auth::id();
        $commentReply->message = $request->message;
        $commentReply->save();

        //success message
        Toastr::success('Comment reply has been posted', 'Success');
        return redirect()->back();
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = DB::table('comment_replies')->where('id', $id)->first();
        $data = [
            'reply' => $row,
        ];

        return view('reply-edit', $data);
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $updateData = $request->validate([
            'message' => 'required|max:1000',
        ]);
        CommentReply::whereId($id)->update($updateData);

        Toastr::success('Reply has been edited', 'Success');
        return redirect()->action([AnimeController::class, 'index']);
    }

    //  * Remove the specified resource from storage.
    public function destroy($id){
        $commentReply = CommentReply::findOrFail($id);
        if ($commentReply->user_id == Auth::id() ) {
            $commentReply->delete();
        }

        Toastr::success('Reply has been deleted', 'Success');
        return back();
    }
}
