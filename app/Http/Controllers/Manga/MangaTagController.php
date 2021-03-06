<?php

namespace App\Http\Controllers\Manga;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\Manga;

class MangaTagController extends Controller
{
    
    public function index(Tag $tag)
    {
        //I chose paginate 2 as a test to see if its working
        $mangas = $tag->manga()->paginate(2);
        $tags = Tag::has('manga')->pluck('name', 'slug');
        
        return view('manga.index', compact('mangas', 'tags'));
    }
}
