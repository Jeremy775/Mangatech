<?php

namespace App\Http\Controllers\Cour;

use App\Http\Controllers\Controller;
use App\Models\Cour;

class CourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cour.index')->with('cours', Cour::orderBy('title', 'DESC')->get());               
    }
    

     /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('cour.show')->with('cour', Cour::where('slug', $slug)->first());
    }
}
