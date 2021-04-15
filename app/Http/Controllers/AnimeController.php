<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Tag;
use Illuminate\Http\Request;

class AnimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('anime.index')->with('animes', Anime::orderBy('title', 'DESC')->get());               
    }
    

     /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('anime.show')->with('anime', Anime::where('slug', $slug)->first());
    }
}
