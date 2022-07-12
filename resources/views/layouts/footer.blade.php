<footer class="bg-gray-800 pt-5 mt-20">
    <div class="sm:grid grid-cols-2 w-4/5 pb-3 m-auto border-b-2 border-gray-700 text-center">
        <div>
            <h3 class="text-l sm:front-bold text-gray-100">Pages</h3>
            <ul class="py-4 sm:text-s pt-4 text-gray-400">
                <li class="pb-1">
                    <a href="/">Home</a>
                </li>
                <li class="pb-2">
                    <a href="{{ route('manga.index') }}">Mangas</a>
                </li>
                <li class="pb-2">
                    <a href="{{ route('anime.index') }}">Animes</a>
                </li>
            </ul>
        </div>

        <div>
            <h3 class="text-l sm:front-bold text-gray-100">Rejoignez nous</h3>
            <ul class="py-4 sm:text-s pt-4 text-gray-400">
                <li class="pb-2">
                    <a href="/login">Login</a>
                </li>
                <li class="pb-2">
                    <a href="/register">Register</a>
                </li>
                <li class="pb-2">
                    <a href="{{ route('discussions.index') }}">Forum</a>
                </li>
            </ul>
        </div>
    </div>
    <p class="w-25 w-4/5 pb-3 m-auto text-xs text-gray-100 pt-6 text-center">Copyright JL©. All rights reserved</p>
    <p class="w-25 w-4/5 pb-3 m-auto text-xs text-gray-100 pt-6 text-center">Laravel</p>


</footer>