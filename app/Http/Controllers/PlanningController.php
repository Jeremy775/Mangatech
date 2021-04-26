<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class PlanningController extends Controller
{
    public function index()
    {
        $mangas = Auth::user()->planning_manga;
        return view('user.planning', compact('mangas'));
    }

    public function add($manga)
    {
        // dump($manga);
        $user = Auth::user();
        $isPlanned = $user->planning_manga()->where('manga_id',$manga)->count();
        

        if ($isPlanned == 0)
        {
            $user->planning_manga()->attach($manga);
            Toastr::success('Post successfully added to your planning list :)','Success');
            return redirect()->back();
        } else {
            $user->planning_manga()->detach($manga);
            Toastr::success('Post successfully removed from your planning list :)','Success');
            return redirect()->back();
        } 
    }
}
