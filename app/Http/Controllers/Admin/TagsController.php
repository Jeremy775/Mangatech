<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    
    public function index()
    {
        return view('admin.tags.index')->with(['tags' => Tag::paginate(10)]);
    }

    
    public function create()
    {
        return view('admin.tags.create');
    }

    
    public function store(CreateTagRequest $request)
    {
        $tag = Tag::create([
            'slug' => snake_case($request->name),
            'name' => $request->name
        ]);

        $tag->save();

        return redirect(route('admin.tags.index'));
    }

   
    public function edit($id)
    {
        return view('admin.tags.edit', 
        [
            'tag' => Tag::find($id) // pour passer $tag->id a la route update 
        ]);
    }

    
    public function update(Request $request, $id)
    {
        // return 404 error if User not found
        $tag = Tag::findOrFail($id);

        $tag->update([
            'name' => $request->name,
            'slug' => $request->slug
        ]);
        
        $tag->save();
        
        return redirect(route('admin.tags.index'));
    }

    
    public function destroy($id)
    {
        Tag::destroy($id);

        return redirect(route('admin.tags.index'));
    }
}
