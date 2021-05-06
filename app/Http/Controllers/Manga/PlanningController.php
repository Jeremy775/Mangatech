<?php

namespace App\Http\Controllers\Manga;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class PlanningController extends Controller
{
    public function index()
    {
        $mangas = Auth::user()->planning_manga;
        return view('user.planning', compact('mangas'))->with('readed', Auth::user()->readed_manga);
    }

    public function add($manga)
    {
        $user = Auth::user();
        $isPlanned = $user->planning_manga()->where('manga_id',$manga)->count();
        

        if ($isPlanned == 0)
        {
            $user->planning_manga()->attach($manga);
            Toastr::success('Manga successfully added to your planning list :)','Success');
            return redirect()->back();
        } else {
            $user->planning_manga()->detach($manga);
            Toastr::success('Manga successfully removed from your planning list :)','Success');
            return redirect()->back();
        } 
    }
}
