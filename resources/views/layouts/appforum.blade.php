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
            <div class="container mx-auto flex justify-between items-center px-6">
                <div>
                    <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline">
                        {{ config('app.name', 'Mangatech') }}
                    </a>
                </div>
                <nav class="space-x-4 text-gray-300 text-sm sm:text-base">
                        <a class="no-underline hover:underline" href="{{ route('manga.index') }}">{{ __('Mangas') }}</a>
                        <a class="no-underline hover:underline" href="{{ route('anime.index') }}">{{ __('Animes') }}</a>
                    @guest  
                        <a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="no-underline hover:underline" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <a href="{{ route('user.dashboard') }}">{{ Auth::user()->name }}</a>

                        <a href="{{ route('logout') }}"
                           class="no-underline hover:underline"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                </nav>
            </div>
        </header>
        <main class="py-4">
                <!-- Sidebar -->
                
                <div class="flex flex-row">
                    <div class="bg-blue-500 rounded">
                        <ul>
                            @foreach ($channels as $channel )
                            <li class="mr-3 flex-1">
                                <a href="#" 
                                class="block py-1 md:py-3 pl-1 align-middle border-b-2 border-gray-800 md:border-gray-900 hover:border-gray-300">
                                <span class="pb-1 text-lg md:pb-0 text-gray-100 block md:inline-block">
                                    {{ $channel->name }}
                                </span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    {{-- <!--Sidebar-->
                    <div class="w-full md:w-1/6 bg-gray-900 md:bg-gray-900 px-2 text-center fixed bottom-0 md:pt-8 md:top-0 md:left-0 h-16 md:h-screen md:border-r-4 md:border-gray-600">
                        <div class="md:relative mx-auto lg:float-right lg:px-6">
                        <ul class="list-reset flex flex-row md:flex-col text-center md:text-left">
                            @foreach ($channels as $channel )
                            <li class="mr-3 flex-1">
                                <a href="#" 
                                class="block py-1 md:py-3 pl-1 align-middle border-b-2 border-gray-800 md:border-gray-900 hover:border-pink-500">
                                <span class="pb-1 md:pb-0 text-lg md:text-base text-blue-400 md:text-blue-400 block md:inline-block">
                                    {{ $channel->name }}
                                </span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        </div>
                    </div> --}}
                  
                    <div class="w-full lg:my-10 lg:px-10">
                      <!-- Column Content --> 
                      @yield('content')
                    </div>
                  
                </div>
                
        </main>
    </div>
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
</body>
</html>
