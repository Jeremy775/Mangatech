<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Manga;

class MangaTagController extends Controller
{
    
    public function index(Tag $tag)
    {
        $mangas = $tag->manga()->paginate(2);
        $tags = Tag::has('manga')->pluck('name', 'slug');
        
        return view('manga.index', compact('mangas', 'tags'));
    }
}
