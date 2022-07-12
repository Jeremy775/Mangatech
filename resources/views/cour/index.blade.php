@extends('layouts.app')

@section('content')

    <div class="w-4/5 m-auto text-center">
        <div class="pt-10">
            <h1 class="text-6xl">
                Cours
            </h1>
        </div>

        <div class="py-15 border-b border-gray-200">
            <a href="{{ route('cour.index') }}"
                class="uppercase border border-blue-500 text-blue-700 font-bold py-1 px-8 rounded-3xl ml-2">
                    Tout
                </a>
                
            @foreach ($tags as $tag )
                <a href="/cour/tags/{{ $tag}}"
                class="uppercase border border-blue-500 text-blue-700 font-bold py-1 px-8 rounded-3xl ml-2">
                    {{ $tag }}
                </a>
            @endforeach
        </div>
    </div>

@foreach ($cours as $cour)

    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
        <div class="flex justify-end">
            <img class="h-80" src="{{ $cour->image }}">
        </div>
        <div>
            <h2 class="text-gray-700 font-bold text-5xl pb-4">
                {{ $cour->title }}
            </h2>

            <span class="text-gray-500">
               Le {{ date('jS M Y', strtotime($cour->updated_at)) }}.
            </span>

            <p class="text-xl text-gray-500 pt-8 pb-10 leading-8 font-light">
                {{ $cour->description }}
            </p>

            <a href="{{ route('cour.show', $cour->slug) }}" 
                class="uppercase bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
                Lire la suite
            </a>

            <div class="wishlist py-15">

                @guest

                    <a class="hover:text-blue-500"
                    href="javascript:void(0);" 
                    onclick="toastr.info('Login to add to favs !', 'Info', 
                    {closeButton: true, progressBar: true,})">
                    <i class="fas fa-heart text-3xl"></i>{{ $cour->favorite_to_user->count() }}
                    </a>

                @else
                    <style>.favorite_cour{color:blue;}.planning_cour{color:blue;}.watched_cour{color:blue;}</style>
                    
                    {{-- Cour fav button with count --}}

                    <a class="hover:text-blue-500 
                    {{ !Auth::user()->favorite_cour->where('pivot.cour_id',$cour->id)->count()  == 0 ? 'favorite_cour' : ''}}"
                    href="javascript:void(0);" 
                    onclick="document.getElementById('favorite-cour-form-{{ $cour->id }}').submit();">
                    <i class="fas fa-heart text-3xl"></i> {{ $cour->favorite_to_user->count() }}
                    </a>

                    <form id="favorite-cour-form-{{ $cour->id }}" method="POST" 
                    action="{{ route('cour.fav', $cour->id) }}" style="display: none;">
                    @csrf
                    </form>

                    
                    {{-- Cour planning button --}}

                    <a class="hover:text-blue-500
                    {{ !Auth::user()->planning_cour->where('pivot.cour_id',$cour->id)->count()  == 0 ? 'planning_cour' : ''}}"
                    href="javascript:void(0);" 
                    onclick="document.getElementById('planning-cour-form-{{ $cour->id }}').submit();">
                    <i class="far fa-clock text-3xl pl-3"></i> 
                    </a>

                    <form id="planning-cour-form-{{ $cour->id }}" method="POST" 
                    action="{{ route('cour.planning', $cour->id) }}" style="display: none;">
                     @csrf
                    </form>


                    {{-- Cour watched button --}}
                    
                    <a class="hover:text-blue-500
                    {{ !Auth::user()->watched_cour->where('pivot.cour_id',$cour->id)->count()  == 0 ? 'watched_cour' : ''}}"
                    href="javascript:void(0);" 
                    onclick="document.getElementById('watched-cour-form-{{ $cour->id }}').submit();">
                    <i class="fas fa-check text-3xl pl-3"></i> 
                    </a>

                    <form id="watched-form-{{ $cour->id }}" method="POST" 
                    action="{{ route('cour.watched', $cour->id) }}" style="display: none;">
                     @csrf
                    </form>

                @endguest
                
            </div>
        </div>
    </div>

@endforeach


@endsection