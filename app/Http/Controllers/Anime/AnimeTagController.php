<?php

namespace App\Http\Controllers\Anime;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class AnimeTagController extends Controller
{

    public function index(Tag $tag)
    {
        $animes = $tag->anime;

        return view('anime.index', compact('animes'))
                    ->with('tags', Tag::has('anime')->pluck('name', 'slug') );
                    // SQL format : SELECT * FROM animes 
                    // INNER JOIN anime_tag ON anime_tag.anime_id = animes.id 
                    // INNER JOIN tags ON tags.id = anime_tag.tag_id 
                    // WHERE tags.name = '?'
    }

}
