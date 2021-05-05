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

	<!--Header-->
	<div class="w-full m-0 p-0 bg-cover bg-bottom" style="background-image:url(); height: 60vh; max-height:460px;">
			<div class="container max-w-4xl mx-auto pt-16 md:pt-32 text-center break-normal">
				<!--Title-->
					<p class="text-black font-extrabold text-3xl md:text-5xl">
						 Favorites Mangas
					</p>			
			</div>
		</div>
		
		<!--Container-->
		<div class="container px-4 md:px-0 max-w-6xl mx-auto -mt-32">
			
			<div class="mx-0 sm:mx-6">
				
				@include('partial.header-user-list')

				<div class="bg-gray-200 w-full text-xl md:text-2xl text-gray-800 leading-normal rounded-t">
					
				<!--Lead Card-->
				<div class="flex h-full bg-white rounded overflow-hidden shadow-lg">
							
					<div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow-lg">
								                
                        <section class="overflow-hidden text-gray-700 body-font">
                            <div class="container px-5 py-2 mx-auto lg:pt-12 lg:px-32">
                                <div class="flex flex-wrap -m-1 md:-m-2">
                                    
                                    @foreach ($mangas as $manga)
                                        
                                        <div class="flex flex-wrap w-1/3">
                                            <div class="w-full p-1 md:p-2">
                                                <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                                                    src="{{ $manga->image }}">
                                            </div>
                                        </div>

                                    @endforeach
                        </section>
                                                                        
					</div>
	
				</div>
				
			</div>
						
		</div>
	
	</div>


	<script src="https://unpkg.com/popper.js@1/dist/umd/popper.min.js"></script>
	<script src="https://unpkg.com/tippy.js@4"></script>
	<script>
		//Init tooltips
		tippy('.avatar')
	</script>
</body>
</html>
@endsection
