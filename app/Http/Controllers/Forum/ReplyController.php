<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateReplyRequest;
use App\Models\Discussion;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    
    public function store(CreateReplyRequest $request, Discussion $discussion)
    {
        auth()->user()->replies()->create([
            'discussion_id' => $discussion->id,
            'content' => $request->content
        ]);

        return redirect()->back();
    }

}
