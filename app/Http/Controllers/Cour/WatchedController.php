<?php

namespace App\Http\Controllers\Cour;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class WatchedController extends Controller
{
    public function add($cour)
    {
        $user = Auth::user();
        $isReaded = $user->watched_cour()->where('cour_id',$cour)->count();
        

        if ($isReaded == 0)
        {
            $user->watched_cour()->attach($cour);
            Toastr::success('Le cours a été ajouté à votre liste :)','Success');
            return redirect()->back();
        } else {
            $user->watched_cour()->detach($cour);
            Toastr::success('Le cours a été enlevé de votre liste :)','Success');
            return redirect()->back();
        } 
    }
}
