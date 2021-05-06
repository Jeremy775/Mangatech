<?php

namespace App\Http\Controllers\Anime;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class PlanningController extends Controller
{
    public function index()
    {
        $animes = Auth::user()->planning_anime;
        return view('user.anime_planning_watched', compact('animes'))->with('watched', Auth::user()->watched_anime);
    }

    public function add($anime)
    {
        $user = Auth::user();
        $isPlanned = $user->planning_anime()->where('anime_id',$anime)->count();
        

        if ($isPlanned == 0)
        {
            $user->planning_anime()->attach($anime);
            Toastr::success('Anime successfully added to your planning list :)','Success');
            return redirect()->back();
        } else {
            $user->planning_anime()->detach($anime);
            Toastr::success('Anime successfully removed from your planning list :)','Success');
            return redirect()->back();
        } 
    }
}
