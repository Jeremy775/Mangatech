<?php

namespace App\Http\Controllers\Cour;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    
    public function add($cour)
    {
        $user = Auth::user();
        $isFavorite = $user->favorite_cour()->where('cour_id',$cour)->count();
        

        if ($isFavorite == 0)
        {
            $user->favorite_cour()->attach($cour);
            Toastr::success('Le cours a été ajouté à votre liste :)','Success');
            return redirect()->back();
        } else {
            $user->favorite_cour()->detach($cour);
            Toastr::success('Le cours a été enlevé de votre liste :)','Success');
            return redirect()->back();
        }
    }
}
