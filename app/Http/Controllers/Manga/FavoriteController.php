<?php

namespace App\Http\Controllers\Manga;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $mangas = Auth::user()->favorite_manga;
        return view('user.favorite', compact('mangas'))->with('favanimes', Auth::user()->favorite_anime);;
    }

    public function add($manga)
    {
        $user = Auth::user();
        $isFavorite = $user->favorite_manga()->where('manga_id',$manga)->count();
        

        if ($isFavorite == 0)
        {
            $user->favorite_manga()->attach($manga);
            Toastr::success('Manga successfully added to your favorite list :)','Success');
            return redirect()->back();
        } else {
            $user->favorite_manga()->detach($manga);
            Toastr::success('Manga successfully removed form your favorite list :)','Success');
            return redirect()->back();
        }
    }
}
