@extends('layouts.app')
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Greatapp - Admin - Edit channel</title>
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

    @include('partial.admin-sidebar')

    <div class="w-full flex flex-col h-screen overflow-y-hidden">
        
        @include('partial.admin-header')
    
        <div class="w-full overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">

                
                    <h1 class="text-3xl text-black pb-6">Edit channel</h1>
                    
                
                <div class="w-full mt-12">
                    
                    <div class="bg-white overflow-auto">
                        <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST"
                    action="{{ route('admin.channels.update', $channel->id) }}">
                    @csrf
                    @method('PATCH')

                

                    <div class="flex flex-wrap">
                        <label for="slug" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Slug') }}:
                        </label>

                        <input id="slug" type="text" class="form-input w-full bg-cool-gray-100 @error('slug')  border-red-500 @enderror"
                            name="slug" value="{{ old('slug') }} @isset($channel) {{ $channel->slug }} @endisset" 
                            required autocomplete="slug" autofocus>

                        @error('slug')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Name') }}:
                        </label>

                        <input id="name" type="text"
                            class="form-input w-full bg-cool-gray-100 @error('name') border-red-500 @enderror" name="name"
                            value="{{ old('name') }} @isset($channel) {{ $channel->name }} @endisset" required autocomplete="name">

                        @error('name')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                                                  

                    <div class="flex flex-wrap">
                        <button type="submit"
                            class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                            {{ __('Update') }}
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

@include('partial.admin-footer')
