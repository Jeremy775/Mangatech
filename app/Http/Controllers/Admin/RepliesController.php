<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reply;

class RepliesController extends Controller
{
    
    public function index()
    {
        return view('admin.replies.index')->with(['replies' => Reply::paginate(10)]);
    }


    
    public function destroy($id)
    {
        Reply::destroy($id);

        return redirect(route('admin.replies.index'));
    }
}
