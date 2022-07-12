@extends('layouts.app')

@section('content')



<div class="sm:grid grid-cols-2 mx-auto py-15 border-b border-gray-200 bg-blue-100"
     id="show_bg">
    <div class="flex justify-center md:justify-end">
        <img class="h-80" src="{{ $manga->image }}">
    </div>
    <div class="w-4/5 m-auto text-center md:text-left">
        <div class="py-8">
            <h1 class="text-6xl pb-6">
                {{ $manga->title }}
            </h1>
            <span class="text-gray-500 pl-2">
                on {{ date('jS M Y', strtotime($manga->updated_at)) }}.
            </span>
        </div>
        
        <div>
            @if (count($manga->tags))
                <span>
                    @foreach ($manga->tags as $tag)
                        <a href="/manga/tags/{{ $tag->name }}"
                        class="border border-blue-500 text-blue-700 font-bold py-1 px-2 rounded-3xl ml-2">
                        {{ $tag->name }}
                        </a>
                    @endforeach
                </span>
            @endif
        </div>
    </div>
</div>

<div class="w-4/5 m-auto pt-10">
    

    <p class="text-xl text-gray-700 pt-8 pb-10 font-light">
        {{ $manga->description }}
    </p>
</div>






@guest
    <h4 class="w-2/5 m-auto text-center uppercase font-bold pt-20 text-3xl">
        <a href="/login" class="text-blue-600">Login</a> or <a href="/register" class="text-blue-600">Register</a> to comment !</h4>
@else

<section class=" pt-50 mb-100 py-15 border-b border-gray-400">
    <div class="w-2/5 m-auto text-center">
        <h5 class="uppercase font-bold py-15 border-b border-gray-200 text-3xl">Laissez un commentaire</h5>
        <div>
            <form action="{{ route('manga.comment.store', $manga->id) }}" method="POST">
                @csrf
                <div class="m-7">
                    <div class="mb-6">
                        <textarea rows="5" 
                                  name="comment" 
                                  placeholder="Your Message" 
                                  class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none
                                  focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 
                                  dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" required></textarea>
                    </div>
                    <div class="mb-6">
                        <button type="submit" class="w-full px-3 py-4 text-white bg-indigo-500 rounded-md focus:bg-indigo-600 focus:outline-none">
                            Send Message
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

@endguest

<section class="pt-10 mb-100">
    <div>
        <div class="m-5">
            @foreach ($manga->comments as $comment )

            @include('partial.comment-section')

            @endforeach
        </div>
    </div>
</section>



@endsection