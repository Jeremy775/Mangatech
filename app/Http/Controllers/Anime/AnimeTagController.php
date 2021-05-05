<?php

namespace App\Http\Controllers\Anime;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class AnimeTagController extends Controller
{

    public function index(Tag $tag)
    {
        $animes = $tag->anime;

        return view('anime.index', compact('animes'))
                    ->with('tags', Tag::has('anime')->pluck('name', 'slug') );
    }
}
