@extends('layouts.appforum')

@section('content')


    <!--Original post-->
    <div class="rounded w-full overflow-hidden border border-blue-500 shadow-lg text-center">
      <div class="px-6 py-4">
        <div class="font-bold text-xl mb-2 text-left">{{ $discussion->user->name }}</div>
        <div class="font-bold text-xl mb-2 py-5">{{ $discussion->title }}</div>
        <hr>
        <p class="text-gray-700 text-base py-6">
          {{ $discussion->content }}
        </p>
      </div>
    </div>
    <!--Original post-->


    <!-- Replies -->

    @foreach ($discussion->replies()->paginate(12) as $reply)

      <div class="rounded w-full overflow-hidden border border-gray-900 shadow-lg text-center mt-10">
        <div class="px-6 py-4">
          <div class="font-bold text-xl mb-2 text-left">{{ $reply->owner->name }}</div>
          <hr>
          <p class="text-gray-700 text-base py-5">
            {{ $reply->content }}
          </p>
        </div>
      </div>

    @endforeach

    {{ $discussion->replies()->paginate(12)->links() }}
    <!-- Replies -->


    <!-- Reply form -->
    <div class="rounded w-full overflow-hidden shadow-lg text-center mt-10">
      <div class="px-6 py-4">
        
        @auth
          <form action="{{ route('replies.store', $discussion->slug) }}" method="POST">
            @csrf

            <div class="mb-6">
              <textarea rows="5" 
                        name="content" 
                        placeholder="Your reply" 
                        class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none
                        focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 
                        dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" required></textarea>
          </div>

            <button type="submit" class="bg-blue-500 text-gray-100 font-bold py-4 px-8 rounded-3xl">Add reply</button>
            
          </form>
        @else

          <div class="font-bold text-xl mb-2 text-center">sign in to add a reply</div>

        @endauth
        
      </div>
  
    </div>
    <!-- Reply form -->
  
@endsection