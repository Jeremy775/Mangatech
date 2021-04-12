@extends('layouts.app')

@section('content')

    <div class="background-image grid grid-cols-1 m-auto">
        <div class="flex text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-center">
                <h1 class="sm:text-white text-5xl uppercase font-bold text-shadow-md pb-14">Découvez les meilleurs...</h1>
                <div>
                    <a href="{{ route('manga.index') }}"
                   class=" btn-mangas text-center bg-transparent border-4 border-gray-100 text-gray-100
                    py-4 px-10 font-bold text-xl uppercase hover:text-blue-300">Mangas</a>
                   <a href="{{ route('anime.index') }}"
                   class="text-center bg-gray-50 text-gray-700 py-4 px-10 font-bold text-xl uppercase">Animes</a>
                </div>
            </div>
        </div>
    </div>

    <div class="sm:grid grid-cols-2 w-4/5 m-auto pt-10">
        <div class="flex bg-blue-900 text-gray-100 pt-10 border-4 border-blue-900">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block">
                <ul class="text-xl font-bold py-10">
                    <li class="pb-6">Remplissez votre propre bibliothèque virtuelle avec des centaines de mangas et animes.</li>
                    <li class="pb-6">Ne perdez plus le fil de vos lectures et visionnages et suivez votre progression !</li>
                    <li class="pb-6">Participer à la communauté en notant les oeuvres pour les hisser dans le top !</li>
                </ul>
            </div>
        </div>
        <div class="flex text-gray-100 pt-10 border-4 border-blue-900">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-center">
                    <a href="/register"
                    class="text-center bg-blue-800 text-gray-100 py-4 px-5 font-bold text-xl uppercase">
                    Commencer ma bibliothèque !</a>
            </div>
        </div>
    </div>

@endsection