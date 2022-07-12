@extends('layouts.app')

@section('content')



<div class="sm:grid grid-cols-2 mx-auto py-15 border-b border-gray-200">
    <div class="flex justify-center">
        <img class="h-80" src="{{ $cour->image }}">
    </div>
    <div class="w-4/5 m-auto text-left">

        <div class="py-8">
            <h1 class="text-6xl pb-6">
                {{ $cour->title }}
            </h1>

            <span class="text-gray-500 pl-2">
                on {{ date('jS M Y', strtotime($cour->updated_at)) }}.
            </span>
        </div>

        <div>
            @if (count($cour->tags))
                <span>
                    @foreach ($cour->tags as $tag)
                        <a href="/cour/tags/{{ $tag->name }}"
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
        {{ $cour->description }}
    </p>
</div>




@guest
    <h4 class="w-2/5 m-auto text-center uppercase font-bold pt-20 text-3xl">
        <a href="/login" class="text-blue-600">Se connecter</a> ou <a href="/register" class="text-blue-600">S'inscrire</a> pour commenter !</h4>
@else

<section class=" pt-50 mb-100 py-15 border-b border-gray-400">
    <div class="w-2/5 m-auto text-center">
        <h5 class="uppercase font-bold py-15 border-b border-gray-200 text-3xl">Laissez un commentaire</h5>
        <div>
            <form action="{{ route('cour.comment.store', $cour->id) }}" method="POST">
                @csrf
                <div class="m-7">
                    <div class="mb-6">
                        <textarea rows="5" 
                                  name="comment" 
                                  placeholder="Votre commentaire" 
                                  class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none
                                  focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 
                                  dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" required></textarea>
                    </div>
                    <div class="mb-6">
                        <button type="submit" class="w-full px-3 py-4 text-white bg-indigo-500 rounded-md focus:bg-indigo-600 focus:outline-none">
                            Envoyer
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
            @foreach ($cour->comments as $comment )

                <div class="pb-5 py-5 border-b border-gray-200">
                    <h3 class="text-2xl font-bold">{{ $comment->user->name }}</h3>
                    <small>Le {{ $comment->created_at }}</small>
                    <blockquote class="pt-3">
                        <em>{{ $comment->comment }}</em>
                    </blockquote>

                    @if (isset(Auth::user()->id) && Auth::user()->id == $comment->user_id)

                        <span class="float-right">
                            <a href="{{ route('comment.edit', $comment->id) }}"
                            class="text-gray-700 italic hover:text-blue-500">Edit</a>
                        </span>

                        <span class="float-right">
                            <form action="{{ route('comment.destroy', $comment->id) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                
                                <button class="text-red-500 pr-3 hover:text-red-900" type="submit">
                                    Delete
                                </button>
                            </form>
                        </span>
                    
                    @endif
                </div>

            @endforeach
        </div>
    </div>
</section>



@endsection