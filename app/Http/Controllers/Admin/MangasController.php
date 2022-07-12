<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Manga;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateMangaRequest;

class MangasController extends Controller
{
   
    public function index()
    {
        return view('admin.mangas.index')->with(['mangas' => Manga::paginate(10)]);
    }

   
    public function create()
    {
        return view('admin.mangas.create', ['tags' => Tag::all()]);
    }

    
    public function store(CreateMangaRequest $request)
    {
        $newImageName = time() . '-' . $request->title . '.' . $request->image->extension(); 
        $request->image->move(public_path('images'), $newImageName);

        $manga = Manga::create([
            'slug' => snake_case($request->title),
            'title' => $request->title,
            'description' => $request->description,
            'author' => $request->author,
            'image' => $newImageName,
        ]);

        
        $manga->tags()->sync($request->tags);
        $manga->save();

        return redirect(route('admin.mangas.index'));
    }

    
    public function edit($id)
    {
        return view('admin.mangas.edit', 
        [
            'tags' => Tag::all(),
            'manga' => Manga::find($id) // pour passer $manga->id a la route update 
        ]);
    }

    
    public function update(Request $request, $id)
    {
        // return 404 error if User not found
        $manga = Manga::findOrFail($id);

        $manga->update([
            'slug' => $request->slug,
            'title' => $request->title,
            'description' => $request->description,
            'author' => $request->author,
        ]);
        
        $manga->tags()->sync($request->tags);
        $manga->save();
        
        return redirect(route('admin.mangas.index'));
    }

    
    public function destroy($id)
    {
        Manga::destroy($id);

        return redirect(route('admin.mangas.index'));
    }
}
