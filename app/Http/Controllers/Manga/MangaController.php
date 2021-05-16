<?php

namespace App\Http\Controllers\Manga;

use App\Http\Controllers\Controller;
use App\Models\Manga;

class MangaController extends Controller
{
    
    public function index()
    {

        $search = request()->query('search');
        //Show mangas with the same letters as the search value
        if ($search) {
            $mangas = Manga::where('title', 'LIKE', "%{$search}%")->simplePaginate(10);
        } else {
            //I chose paginate 3 as a test to see if its working
            $mangas = Manga::paginate(3);
        }

        return view('manga.index', ['mangas' => $mangas ]);
    }

    
    public function show($slug)
    {
        return view('manga.show')->with('manga', Manga::where('slug', $slug)->first());
    }
}
