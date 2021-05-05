<?php

namespace App\Http\Controllers\Manga;

use App\Http\Controllers\Controller;
use App\Models\Manga;

class MangaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = request()->query('search');

        if ($search) {
            $mangas = Manga::where('title', 'LIKE', "%{$search}%")->simplePaginate(10);
        } else {
            $mangas = Manga::paginate(3);
        }

        return view('manga.index', ['mangas' => $mangas ]);
    }

     /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('manga.show')->with('manga', Manga::where('slug', $slug)->first());
    }
}
