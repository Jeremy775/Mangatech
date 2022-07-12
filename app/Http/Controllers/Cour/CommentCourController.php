<?php

namespace App\Http\Controllers\Cour;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class CommentCourController extends Controller
{
    public function store(Request $request, $cour)
    {
        $this->validate($request, ['comment' => 'required|max:1000']);
        $comment = new Comment();
        $comment->cour_id = $cour;
        $comment->user_id = Auth::id();
        $comment->comment = $request->comment;
        $comment->save();

        //success message
        Toastr::success('Le commentaire a été posté', 'Success');
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
        $row = DB::table('comments')->where('id', $id)->first();
        $data = [
            'comment' => $row,
        ];

        return view('cour.edit', $data);
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $updateData = $request->validate([
            'comment' => 'required|max:1000',
        ]);
        Comment::whereId($id)->update($updateData);

        Toastr::success('Comment has been edited', 'Success');
        return redirect()->action([CourController::class, 'index']);
    }

    //  * Remove the specified resource from storage.
    public function destroy(comment $comment){
        if (auth()->user()->is($comment->user)) {
            $comment->delete();
        }
        
        Toastr::success('Le commentaire a été supprimé', 'Success');
        return back();
    }
}