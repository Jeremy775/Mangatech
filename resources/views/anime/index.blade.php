@extends('layouts.app')

@section('content')

<div class="w-4/5 m-auto text-center">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-6xl">
            Animes
        </h1>
    </div>
</div>


@foreach ($animes as $anime)
    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
        <div class="flex justify-end">
            <img class="h-80" src="{{ $anime->image }}">
        </div>
        <div>
            <h2 class="text-gray-700 font-bold text-5xl pb-4">
                {{ $anime->title }}
            </h2>

            <span class="text-gray-500">
               Le {{ date('jS M Y', strtotime($anime->updated_at)) }}.
            </span>

            <p class="text-xl text-gray-500 pt-8 pb-10 leading-8 font-light">
                {{ $anime->description }}
            </p>

            <a href="{{ route('anime.show', $anime->slug) }}" class="uppercase bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">Lire la suite</a>
        </div>
    </div>
@endforeach


@endsection