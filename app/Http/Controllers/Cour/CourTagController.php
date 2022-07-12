<?php

namespace App\Http\Controllers\Cour;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class CourTagController extends Controller
{

    public function index(Tag $tag)
    {
        $cours = $tag->cour;

        return view('cour.index', compact('cours'))
                    ->with('tags', Tag::has('cour')->pluck('name', 'slug') );
    }
}
