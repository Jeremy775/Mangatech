<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateDiscussionRequest;
use App\Models\Discussion;
use Brian2694\Toastr\Facades\Toastr;


class DiscussionController extends Controller
{
    public function __construct()
    {
        //Si user auth ?  il peut utiliser les routes create et store : affiche la login page
        $this->middleware('auth')->only(['create', 'store']);
    }

    public function index()
    {
        return view('forum.index');
    }

   
    public function create()
    {
        return view('forum.discussion.create');
    }

    
    public function store(CreateDiscussionRequest $request)
    {
        // On prend l'user connecté et appelle sa relation hasMany, discussions(), pr lui en créer une nouvelle 
        $post = auth()->user()->discussions()->create([
            'title' => $request->title,
            'content' => $request->content,
                //le slug va correspondre a la valeur du title transformé en snake_case
            'slug' => snake_case($request->title),
            'channel_id' => $request->channel,
        ]);
        $post->save();
        
        Toastr::success('Comment has been posted', 'Success');
        return redirect()->route('forum.index');
    }

    
    public function show(Discussion $discussion)
    {
        return view('forum.discussion.show', [
            'discussion' => $discussion
        ]);
    }

}
