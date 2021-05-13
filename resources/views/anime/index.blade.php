@extends('layouts.app')

@section('content')

    <div class="w-4/5 m-auto text-center">
        <div class="pt-10">
            <h1 class="text-6xl">
                Animes
            </h1>
        </div>

        {{-- tag list --}}
        <div class="py-15 border-b border-gray-200 flex items-center justify-center">
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-2 lg:grid-cols-5 2xl:grid-cols-7">
                <a href="{{ route('anime.index') }}"
                    class="uppercase border border-blue-500 text-blue-700 font-bold py-1 px-8 rounded-3xl ml-2">
                        All
                </a>
                    
                @foreach ($tags as $tag )
                    <a href="/anime/tags/{{ $tag}}"
                    class="uppercase border border-blue-500 text-blue-700 font-bold py-1 px-8 rounded-3xl ml-2">
                        {{ $tag }}
                    </a>
                @endforeach
            </div>
        </div>
        {{-- end tag list --}}
        <div class="p-8">
            <form class="bg-white flex items-center rounded-full shadow-xl" action="{{ route('anime.index') }}" method="GET">
                
                <input class="rounded-l-full w-full py-4 px-6 text-gray-700 leading-tight focus:outline-none"
                 id="search" type="text" placeholder="Search" name="search" value="{{ request()->query('search') }}">
                
                <div class="p-4">
                    <button class="bg-blue-500 text-white rounded-full p-5 hover:bg-blue-400 focus:outline-none w-23 h-12 flex items-center justify-center">
                        <i class="fas fa-search text-xl"></i>
                    </button>
                    </div>
                </div>
            </form>
        </div>

    </div>

@forelse ($animes as $anime)

    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
        <div class="flex justify-center md:justify-end">
            <img class="h-80" src="{{ $anime->image }}">
        </div>
        <div class="text-center md:text-left">
            <h2 class="text-gray-700 font-bold text-5xl pb-4">
                {{ $anime->title }}
            </h2>

            <span class="text-gray-500">
               Le {{ date('jS M Y', strtotime($anime->updated_at)) }}.
            </span>

            <p class="text-xl text-gray-500 pt-8 pb-10 leading-8 font-light">
                {{ $anime->description }}
            </p>

            <a href="{{ route('anime.show', $anime->slug) }}" 
                class="uppercase bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
                Lire la suite
            </a>

            <div class="wishlist py-15">

                @guest

                    <a class="hover:text-blue-500"
                    href="javascript:void(0);" 
                    onclick="toastr.info('Login to add to favs !', 'Info', 
                    {closeButton: true, progressBar: true,})">
                    <i class="fas fa-heart text-3xl"></i>{{ $anime->favorite_to_user->count() }}
                    </a>

                @else
                    <style>.favorite_anime{color:blue;}.planning_anime{color:blue;}.watched_anime{color:blue;}</style>
                    
                    {{-- Anime fav button with count --}}

                    <a class="hover:text-blue-500 
                    {{ !Auth::user()->favorite_anime->where('pivot.anime_id',$anime->id)->count()  == 0 ? 'favorite_anime' : ''}}"
                    href="javascript:void(0);" 
                    onclick="document.getElementById('favorite-anime-form-{{ $anime->id }}').submit();">
                    <i class="fas fa-heart text-3xl"></i> {{ $anime->favorite_to_user->count() }}
                    </a>

                    <form id="favorite-anime-form-{{ $anime->id }}" method="POST" 
                    action="{{ route('anime.fav', $anime->id) }}" style="display: none;">
                    @csrf
                    </form>

                    
                    {{-- Anime planning button --}}

                    <a class="hover:text-blue-500
                    {{ !Auth::user()->planning_anime->where('pivot.anime_id',$anime->id)->count()  == 0 ? 'planning_anime' : ''}}"
                    href="javascript:void(0);" 
                    onclick="document.getElementById('planning-anime-form-{{ $anime->id }}').submit();">
                    <i class="far fa-clock text-3xl pl-3"></i> 
                    </a>

                    <form id="planning-anime-form-{{ $anime->id }}" method="POST" 
                    action="{{ route('anime.planning', $anime->id) }}" style="display: none;">
                     @csrf
                    </form>


                    {{-- Anime watched button --}}
                    
                    <a class="hover:text-blue-500
                    {{ !Auth::user()->watched_anime->where('pivot.anime_id',$anime->id)->count()  == 0 ? 'watched_anime' : ''}}"
                    href="javascript:void(0);" 
                    onclick="document.getElementById('watched-anime-form-{{ $anime->id }}').submit();">
                    <i class="fas fa-check text-3xl pl-3"></i> 
                    </a>

                    <form id="watched-form-{{ $anime->id }}" method="POST" 
                    action="{{ route('anime.watched', $anime->id) }}" style="display: none;">
                     @csrf
                    </form>

                @endguest
                
            </div>
        </div>
    </div>
@empty
<p class="text-center pt-5 text-3xl">
    No result for <strong>{{ request()->query('search') }}</strong>
</p>
@endforelse
{{-- append -> search value effective in every pages of the pagination --}}
{{ $animes->appends(['search' => request()->query('search')])->links() }}

@endsection