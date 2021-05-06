<?php

namespace App\Http\Controllers\Anime;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    
    public function add($anime)
    {
        $user = Auth::user();
        $isFavorite = $user->favorite_anime()->where('anime_id',$anime)->count();
        

        if ($isFavorite == 0)
        {
            $user->favorite_anime()->attach($anime);
            Toastr::success('Anime successfully added to your favorite list :)','Success');
            return redirect()->back();
        } else {
            $user->favorite_anime()->detach($anime);
            Toastr::success('Anime successfully removed form your favorite list :)','Success');
            return redirect()->back();
        }
    }
}
