<?php

namespace App\Http\Controllers\Anime;

use App\Http\Controllers\Controller;
use App\Models\Anime;

class AnimeController extends Controller
{
    
    public function index()
    {
        $search = request()->query('search');

        if ($search) {
            $animes = Anime::where('title', 'LIKE', "%{$search}%")->simplePaginate(10);
        } else {
            $animes = Anime::paginate(3);
        }

        return view('anime.index', ['animes' => $animes ]);               
    }
    

     
    public function show($slug)
    {
        return view('anime.show')->with('anime', Anime::where('slug', $slug)->first());
    }
}
