<?php

namespace App\Http\Controllers\Manga;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class ReadedController extends Controller
{
    
    public function add($manga)
    {
        // dump($manga);
        $user = Auth::user();
        $isReaded = $user->readed_manga()->where('manga_id',$manga)->count();
        

        if ($isReaded == 0)
        {
            $user->readed_manga()->attach($manga);
            Toastr::success('This manga has been successfully added to your Readed list :)','Success');
            return redirect()->back();
        } else {
            $user->readed_manga()->detach($manga);
            Toastr::success('This manga has been successfully removed from your Readed list :)','Success');
            return redirect()->back();
        } 
    }
}
