<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAnimeRequest;
use App\Models\Anime;
use App\Models\Tag;
use Illuminate\Http\Request;

class AnimesController extends Controller
{
    /**
     * Display a listing of the animes and paginate them.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.animes.index')->with(['animes' => Anime::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     * and calling the tags for the check input
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.animes.create', ['tags' => Tag::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAnimeRequest $request)
    {
        //Setting a new name for the image with the time , anime title and image extension
        $newImageName = time() . '-' . $request->title . '.' . $request->image->extension(); 
        //Moving the image to images folder 
        $request->image->move(public_path('images'), $newImageName);

        $anime = Anime::create([
            'slug' => snake_case($request->title),
            'title' => $request->title,
            'description' => $request->description,
            'author' => $request->author,
            'image' => $newImageName,
        ]);

        //Attach the tags to the new anime
        $anime->tags()->sync($request->tags);
        $anime->save();

        return redirect(route('admin.animes.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.animes.edit', 
        [
            'tags' => Tag::all(), //For the check input
            'anime' => Anime::find($id) // pour passer $user->id a la route update 
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return 404 error if User not found
        $anime = Anime::findOrFail($id);

        $anime->update([
            'slug' => $request->slug,
            'title' => $request->title,
            'description' => $request->description,
            'author' => $request->author,
        ]);
        
        $anime->tags()->sync($request->tags);
        $anime->save();
        
        return redirect(route('admin.animes.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Anime::destroy($id);

        return redirect(route('admin.animes.index'));
    }
}
