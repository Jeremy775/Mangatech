<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCourRequest;
use App\Models\Cour;
use App\Models\Tag;
use Illuminate\Http\Request;

class CoursController extends Controller
{
    /**
     * Display a listing of the cours and paginate them.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.cours.index')->with(['cours' => Cour::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     * and calling the tags for the check input
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cours.create', ['tags' => Tag::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCourRequest $request)
    {
        //Setting a new name for the image with the time , cour title and image extension
        $newImageName = time() . '-' . $request->title . '.' . $request->image->extension(); 
        //Moving the image to images folder 
        $request->image->move(public_path('images'), $newImageName);

        $cour = Cour::create([
            'slug' => snake_case($request->title),
            'title' => $request->title,
            'description' => $request->description,
            'author' => $request->author,
            'image' => $newImageName,
        ]);

        //Attach the tags to the new cour
        $cour->tags()->sync($request->tags);
        $cour->save();

        return redirect(route('admin.cours.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.cours.edit', 
        [
            'tags' => Tag::all(), //For the check input
            'cour' => Cour::find($id) // pour passer $user->id a la route update 
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
        $cour = Cour::findOrFail($id);

        $cour->update([
            'slug' => $request->slug,
            'title' => $request->title,
            'description' => $request->description,
            'author' => $request->author,
        ]);
        
        $cour->tags()->sync($request->tags);
        $cour->save();
        
        return redirect(route('admin.cours.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cour::destroy($id);

        return redirect(route('admin.cours.index'));
    }
}
