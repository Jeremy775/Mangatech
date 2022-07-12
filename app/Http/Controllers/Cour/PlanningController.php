<?php

namespace App\Http\Controllers\Cour;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class PlanningController extends Controller
{
    public function index()
    {
        $cours = Auth::user()->planning_cour;
        return view('user.cour_planning_watched', compact('cours'))->with('watched', Auth::user()->watched_cour);
    }

    public function add($cour)
    {
        $user = Auth::user();
        $isPlanned = $user->planning_cour()->where('cour_id',$cour)->count();
        

        if ($isPlanned == 0)
        {
            $user->planning_cour()->attach($cour);
            Toastr::success('Le cours a été ajouté à votre liste :)','Success');
            return redirect()->back();
        } else {
            $user->planning_cour()->detach($cour);
            Toastr::success('Le cours a été enlevé de votre liste :)','Success');
            return redirect()->back();
        } 
    }
}
