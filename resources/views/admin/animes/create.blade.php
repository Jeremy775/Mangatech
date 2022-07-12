@extends('layouts.app')
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mangatech - Admin dashboard - Create anime</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <!-- Tailwind -->
    <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
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
</head>
@section('content')

<div class="bg-gray-100 font-family-karla flex">

    @include('partial.admin.sidebar')

    <div class="w-full flex flex-col h-screen overflow-y-hidden">
        
        @include('partial.admin.header')
    
        <div class="w-full overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">

                
                    <h1 class="text-3xl text-black pb-6">Create anime</h1>
                    
                
                <div class="w-full mt-12">
                    
                    <div class="bg-white overflow-auto">
                        <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST" enctype="multipart/form-data"
                    action="{{ route('admin.animes.store') }}">
                    @csrf


                    <div class="flex flex-wrap">
                        <label for="title" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Title') }}:
                        </label>

                        <input id="title" type="text"
                            class="form-input w-full bg-cool-gray-100 @error('title') border-red-500 @enderror" name="title"
                            required autocomplete="title">

                        @error('title')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <label for="description" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Description') }}:
                        </label>

                        <textarea rows="5" 
                            name="description"  
                            class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none
                            focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 
                            dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" required></textarea>
                    </div>

                    <div class="flex flex-wrap">
                        <label for="author" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Author') }}:
                        </label>

                        <input id="author" type="text"
                            class="form-input w-full bg-cool-gray-100 @error('author') border-red-500 @enderror" name="author"
                            required autocomplete="author">

                        @error('author')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    @foreach ($tags as $tag)
                        <div>
                            <input name="tags[]" type="checkbox" value="{{ $tag->id }}" id="{{ $tag->name }}">
            
                            <label for="{{ $tag->name }}">{{ $tag->name }}</label>
                        </div>
                    @endforeach

                    <div class="flex flex-wrap">
                        <label for="image" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Image') }}:
                        </label>

                        <input type="file" name="image" id="image" class="form-input w-full">
                    </div>

                    <div class="flex flex-wrap">
                        <button type="submit"
                            class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>
                    </div>
                </div>
            </main>
    
            
        </div>
        
    </div>


</div>

@endsection

@include('partial.admin.footer')
