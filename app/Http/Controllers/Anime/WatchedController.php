<?php

namespace App\Http\Controllers\Anime;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class WatchedController extends Controller
{
    public function add($anime)
    {
        $user = Auth::user();
        $isReaded = $user->watched_anime()->where('anime_id',$anime)->count();
        

        if ($isReaded == 0)
        {
            $user->watched_anime()->attach($anime);
            Toastr::success('anime successfully added to your Readed list :)','Success');
            return redirect()->back();
        } else {
            $user->watched_anime()->detach($anime);
            Toastr::success('anime successfully removed from your Readed list :)','Success');
            return redirect()->back();
        } 
    }
}
