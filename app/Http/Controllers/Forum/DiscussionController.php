<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateDiscussionRequest;
use App\Models\Discussion;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;


class DiscussionController extends Controller
{
    public function __construct()
    {
        //if user is auth he can create and store data if not : show login page
        $this->middleware('auth')->only(['create', 'store']);
    }

   //called by forum link on layouts.app nav
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
        $post = auth()->user()->discussions()->create([
            'title' => $request->title,
            'content' => $request->content,
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
