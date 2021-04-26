@extends('layouts.app')

@section('content')

<div class="w-4/5 m-auto text-center">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-6xl">
            Mangas
        </h1>
    </div>

    <div class="py-15 border-b border-gray-200">
        <a href="{{ route('manga.index') }}"
            class="uppercase border border-blue-500 text-blue-700 font-bold py-1 px-8 rounded-3xl ml-2">
                All
            </a>
            
        @foreach ($tags as $tag )
            <a href="/manga/tags/{{ $tag }}"
            class="uppercase border border-blue-500 text-blue-700 font-bold py-1 px-8 rounded-3xl ml-2">
                {{ $tag }}
            </a>
        @endforeach

        <div class="p-8">
            <form class="bg-white flex items-center rounded-full shadow-xl" action="{{ route('manga.index') }}" method="GET">
                
                <input class="rounded-l-full w-full py-4 px-6 text-gray-700 leading-tight focus:outline-none"
                 id="search" type="text" placeholder="Search" name="search" value="{{ request()->query('search') }}">
                
                <div class="p-4">
                    <button class="bg-blue-500 text-white rounded-full p-2 hover:bg-blue-400 focus:outline-none w-23 h-12 flex items-center justify-center">
                    search
                    </button>
                    </div>
                </div>
            </form>
          </div>
    </div>
</div>


@forelse ($mangas as $manga)
    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
        <div class="flex justify-end">
            <img class="h-80" src="{{ $manga->image }}">
        </div>
        <div>
            <h2 class="text-gray-700 font-bold text-5xl pb-4">
                {{ $manga->title }}
            </h2>

            <span class="text-gray-500">
               Le {{ date('jS M Y', strtotime($manga->updated_at)) }}.
            </span>

            <p class="text-xl text-gray-500 pt-8 pb-10 leading-8 font-light">
                {{ $manga->description }}
            </p>

            <a href="{{ route('manga.show', $manga->slug) }}" class="uppercase bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">Lire la suite</a>
            <div class="wishlist py-15">

                @guest

                    <a class="hover:text-blue-500"
                    href="javascript:void(0);" 
                    onclick="toastr.info('Login to add to favs !', 'Info', 
                    {closeButton: true, progressBar: true,})">
                    <i class="fas fa-heart text-3xl"></i>{{ $manga->favorite_to_user->count() }}
                    </a>

                @else
                    <style>.favorite_manga{color:blue;}.planning_manga{color:blue;}</style>

                    <a class="hover:text-blue-500 
                    {{ !Auth::user()->favorite_manga->where('pivot.manga_id',$manga->id)->count()  == 0 ? 'favorite_manga' : ''}}"
                    href="javascript:void(0);" 
                    onclick="document.getElementById('favorite-form-{{ $manga->id }}').submit();">
                    <i class="fas fa-heart text-3xl"></i> {{ $manga->favorite_to_user->count() }}
                    </a>

                    <form id="favorite-form-{{ $manga->id }}" method="POST" 
                    action="{{ route('manga.fav', $manga->id) }}" style="display: none;">
                    @csrf
                    </form>

                    

                    <a class="hover:text-blue-500
                    {{ !Auth::user()->planning_manga->where('pivot.manga_id',$manga->id)->count()  == 0 ? 'planning_manga' : ''}}"
                    href="javascript:void(0);" 
                    onclick="document.getElementById('planning-form-{{ $manga->id }}').submit();">
                    <i class="far fa-clock text-3xl pl-3"></i> {{ $manga->planning_to_user }}
                    </a>

                    <form id="planning-form-{{ $manga->id }}" method="POST" 
                    action="{{ route('manga.planning', $manga->id) }}" style="display: none;">
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
{{ $mangas->appends(['search' => request()->query('search')])->links() }}


@endsection