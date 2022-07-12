@extends('layouts.app')

<style>
  @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
  .font-family-karla { font-family: karla; }
  .bg-sidebar { background: #3d68ff; }
  .cta-btn { color: #3d68ff; }
  .upgrade-btn { background: #1947ee; }
  .upgrade-btn:hover { background: #0038fd; }
  .active-nav-link { background: #1947ee; }
  .nav-item:hover { background: #1947ee; }
  .account-link:hover { background: #3d68ff; }
</style>

@section('content')

<div class="flex">
  @include('partial.forum.sidebar')

  <div class="w-full flex flex-col h-screen overflow-y-hidden">

    @include('partial.forum.header')
    
    <div class="w-full flex-grow p-6 overflow-auto">

      @foreach ($discussions as $discussion)
          
        <!--Card-->
        <div class="rounded w-full overflow-hidden shadow-lg text-center">
          <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2 text-left">{{ $discussion->user->name }}</div>
            <span class="block text-right">{{ $discussion->created_at }}</span>
            <div class="font-bold text-xl mb-2"><a href="{{ route('discussions.show', $discussion->slug) }}">{{ $discussion->title }}</a></div>
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

    </div>
  </div>
</div>
@endsection

@include('partial.admin.footer')