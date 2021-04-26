@extends('layouts.appforum')

@section('content')

 

  <div class="text-center pb-10">
      <a href="{{ route('discussion.create') }}" 
      class="uppercase bg-blue-500 text-gray-100 text-lg font-bold py-4 px-8 rounded-3xl">
      Add discussion
      </a>
  </div>

  @foreach ($discussions as $discussion)
      
    <!--Card-->
    <div class="rounded w-full overflow-hidden shadow-lg text-center">
      <div class="px-6 py-4">
        <div class="font-bold text-xl mb-2 text-left">{{ auth()->user()->name }}</div>
        <div class="font-bold text-xl mb-2"><a href="{{ route('discussion.show', $discussion->slug) }}">{{ $discussion->title }}</a></div>
        <p class="text-gray-700 text-base">
          {{ $discussion->content }}
        </p>
      </div>
      <div class="px-6 pt-4 pb-2">
        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
      </div>
    </div>
  

  @endforeach


@endsection