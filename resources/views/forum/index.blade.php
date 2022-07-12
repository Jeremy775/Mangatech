@extends('layouts.appforum')

@section('content')

 

  <div class="text-center pb-10">
      <a href="{{ route('discussions.create') }}" 
      class="uppercase bg-blue-500 text-gray-100 text-lg font-bold py-4 px-8 rounded-3xl">
      Créer une discussion
      </a>
  </div>

  @foreach ($discussions as $discussion)
      
    <!--Card-->
    <div class="rounded w-full overflow-hidden shadow-lg text-center">
      <div class="px-6 py-4">
        <div class="font-bold text-xl mb-2 text-left">{{ $discussion->user->name }}</div>
        <span class="block text-right">{{ $discussion->created_at }}</span>
        <div class="font-bold text-xl mb-2"><a href="{{ route('discussions.show', $discussion->id) }}">{{ $discussion->title }}</a></div>
        <p class="text-gray-700 text-base">
          {{ $discussion->content }}
        </p>
      </div>
      <div class="px-6 pt-4 pb-2 flex justify-end">
        <span class="inline-block bg-blue-500 text-gray-100 rounded-full px-3
         py-1 text-sm font-semibold mr-2 mb-2">{{ $discussion->channel->name }}</span>
      </div>
    </div>
  

  @endforeach


@endsection