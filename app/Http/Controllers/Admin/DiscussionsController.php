<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discussion;
use Illuminate\Http\Request;

class DiscussionsController extends Controller
{
    
    public function index()
    {
        return view('admin.discussions.index')->with(['discussions' => Discussion::paginate(10)]);
    }

    
    public function destroy($id)
    {
        Discussion::destroy($id);

        return redirect(route('admin.discussions.index'));
    }
}
