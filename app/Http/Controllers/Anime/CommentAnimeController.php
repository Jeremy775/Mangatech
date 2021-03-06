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

    public function update(Request $request, $id)
    {
        // on stocke la requete validée dans une variable
        $updateData = $request->validate([
            'comment' => 'required|max:1000',
        ]);
        //on valide si le commentaire correspond à l'id et on update la requete de la variable
        Comment::whereId($id)->update($updateData);

        Toastr::success('Comment has been edited', 'Success');
        return redirect()->action([AnimeController::class, 'index']);
    }

    public function destroy($id){
        //on cherche l'id de comment - 404 error si introuvable
        $comment = Comment::findOrFail($id);
        if ($comment->user_id == Auth::id() ) {
            //on supprime les reply qd le root comment est supprimé
            $replies = CommentReply::where('comment_id', $id)->delete(); 
            // SQL format : DELETE * FROM comment_replies                                                                          
                            //INNER JOIN comments ON comments.id = comment_replies.comment_id                                                                            
                            //WHERE comments.id = :id
            //on supprime le commentaire
            $comment->delete();
        }
        
        Toastr::success('Comment has been deleted', 'Success');
        return back();
    }
}
