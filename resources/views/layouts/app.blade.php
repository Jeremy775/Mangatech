<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mangatech') }}</title>

    <script src="https://kit.fontawesome.com/efbe1e177e.js" crossorigin="anonymous"></script>
    
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="bg-blue-900 py-6">
            <div class="container mx-auto flex justify-between items-center px-6 flex-wrap">
                
                <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline inline-flex">
                    {{ config('app.name', 'Mangatech') }}
                </a>
                
                <button class="text-white inline-flex p-3 hover:bg-gray-900 rounded lg:hidden ml-auto hover:text-white outline-none nav-toggler" 
                        data-target="#navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <nav class="space-x-4 text-gray-300 text-sm sm:text-base hidden top-navbar w-full lg:inline-flex lg:flex-grow lg:w-auto"
                        id="navigation">
                    <div class="lg:inline-flex lg:flex-row lg:ml-auto lg:w-auto w-full lg:items-center items-start flex flex-col lg:h-auto">
                            <a class="no-underline hover:underline lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white" 
                                href="{{ route('manga.index') }}">{{ __('Mangas') }}
                            </a>

                            <a class="no-underline hover:underline lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white" 
                                href="{{ route('anime.index') }}">{{ __('Animes') }}
                            </a>

                            <a class="no-underline hover:underline lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white" 
                                href="{{ route('discussions.index') }}">{{ __('Forum') }}
                            </a>

                        @guest  
                            <a class="no-underline hover:underline lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white" 
                                href="{{ route('login') }}">{{ __('Login') }}
                            </a>

                            @if (Route::has('register'))
                                <a class="no-underline hover:underline lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white" 
                                    href="{{ route('register') }}">{{ __('Register') }}
                                </a>
                            @endif

                            @else

                            <a href="{{ route('user.dashboard') }}">{{ Auth::user()->name }}</a>

                            <a href="{{ route('logout') }}"
                            class="no-underline hover:underline lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white"
                            onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">{{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                {{ csrf_field() }}
                            </form>
                        @endguest
                    </div>    
                </nav>
            </div>
        </header>
        <main>
            @yield('content')
        </main>
        
        <footer>
            @include('layouts.footer')
        </footer>
    </div>
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
</body>
</html>
