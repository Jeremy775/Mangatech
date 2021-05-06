<!--Nav-->
				<nav class="mt-0 w-full">
					<div class="container mx-auto flex items-center">
						
						<div class="flex w-1/2 pl-4 text-sm">
							<ul class="list-reset flex justify-between flex-1 md:flex-none items-center">
								
								<li class="mr-2">
								<a class="inline-block py-2 px-2 text-gray-600 no-underline hover:underline" href="{{ route('favorite.index') }}">Favorites</a>
								</li>
								<li class="mr-2">
								<a class="inline-block text-gray-600 no-underline hover:underline py-2 px-2" href="{{ route('planning.anime.index') }}">Anime list</a>
								</li>
								<li class="mr-2">
								<a class="inline-block text-gray-600 no-underline hover:underline py-2 px-2" href="{{ route('planning.manga.index') }}">Manga list</a>
								</li>
								
							</ul>
						</div>


					</div>
				</nav>