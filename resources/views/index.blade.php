@extends('layouts.app')

@section('content')

    <div class="background-image grid grid-cols-1 m-auto">
        <div class="flex text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-center">
                <h1 class="sm:text-white text-5xl uppercase font-bold text-shadow-md pb-14">GRETA</h1>
                <div>
                    <a href="{{ route('forum.index') }}"
                   class=" btn-forum text-center bg-transparent border-4 border-gray-100 text-gray-100
                    py-4 px-10 font-bold text-xl uppercase hover:text-blue-300">Forum</a>
               
                   <a href="{{ route('cour.index') }}"
                   class="text-center bg-gray-50 text-gray-700 py-4 px-10 font-bold text-xl uppercase">Cours</a>
                </div>

            </div>
        </div>
    </div>

    <div class="sm:grid grid-cols-2 w-4/5 m-auto pt-10">
        <div class="flex bg-blue-900 text-gray-100 pt-10 border-4 border-blue-900">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block">
                <ul class="text-xl font-bold py-10">
                    <li class="wesh pb-6">Ne perdez plus le fil de vos cours !</li>
                    <li class="pb-6">Créez vous un réseau en communiquant avec les autres stagiaires !</li>
                </ul>
            </div>
        </div>
        <div class="flex text-gray-100 pt-10 border-4 border-blue-900">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-center">
                    <a href="/register"
                    class="text-center bg-blue-800 text-gray-100 py-4 px-5 font-bold text-xl uppercase">
                    Inscrivez vous !</a>
            </div>
        </div>
    </div>

@endsection