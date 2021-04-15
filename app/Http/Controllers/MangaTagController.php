<?php

namespace App\Http\Controllers;

use App\Models\Manga;
use App\Models\Tag;

class MangaTagController extends Controller
{
    
    public function index(Tag $tag)
    {
        $mangas = $tag->manga;

        return view('manga.index', compact('mangas'))->with('tags', Tag::has('manga')->pluck('name', 'slug') )
                                                     ->with('mangas', Manga::simplePaginate(1));
    }
}
