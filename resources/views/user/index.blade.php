@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tailwind Starter Template - Ghostwind CSS : Tailwind Toolbox</title>
		<meta name="author" content="name">
    <meta name="description" content="description here">
		<meta name="keywords" content="keywords,here">
		<link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet"> <!--Replace with your tailwind.css once created-->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" rel="stylesheet">
		
</head>
<body class="bg-gray-200 font-sans leading-normal tracking-normal">

	
	<!--Title-->
	<h1 class="text-black font-extrabold text-3xl text-center pt-10 md:text-5xl py-15 border-b border-gray-300">
		{{ Auth::user()->name }}'s profile
    </h1>			

		
    <section class="text-gray-700 ">
        <div class="container px-8 pt-28 pb-10 mx-auto lg:px-4">
            <div class="flex flex-wrap text-left">
                            
                <a class="text-center px-8 py-6 lg:w-1/3 md:w-full" href="{{ route('planning.index') }}">
                    <div
                        class="inline-flex items-center justify-center flex-shrink-0 w-24 h-24 mb-5 text-blue-800 bg-gray-200 rounded-full">
                        <i class="fas fa-book text-6xl"></i>
                    </div>
                    <h2 class="mb-3 text-lg font-medium text-gray-700 title-font">My Mangas</h2>
                                
                </a>

                <a class="text-center px-8 py-6 lg:w-1/3 md:w-full" href="{{ route('planning.index') }}">
                    <div
                        class="inline-flex items-center justify-center flex-shrink-0 w-24 h-24 mb-5 text-blue-800 bg-gray-200 rounded-full">
                        <i class="fab fa-buysellads text-6xl"></i>
                    </div>
                    <h2 class="mb-3 text-lg font-medium text-gray-700 title-font">My Animes</h2>
                </a>

                <a class="text-center px-8 py-6 lg:w-1/3 md:w-full" href="{{ route('favorite.index') }}">
                    <div
                        class="inline-flex items-center justify-center flex-shrink-0 w-24 h-24 mb-5 text-blue-800 bg-gray-200 rounded-full">
                        <i class="fas fa-heart text-6xl"></i>
                    </div>
                    <h2 class="mb-3 text-lg font-medium text-gray-700 title-font">Favorites</h2>  
                </a>

            </div>
        </div>
    </section>
                        
	


	<script src="https://unpkg.com/popper.js@1/dist/umd/popper.min.js"></script>
	<script src="https://unpkg.com/tippy.js@4"></script>
	<script>
		//Init tooltips
		tippy('.avatar')
	</script>
</body>
</html>
@endsection
