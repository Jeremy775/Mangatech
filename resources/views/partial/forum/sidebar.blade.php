<aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
    
    <nav class="text-white text-base font-semibold pt-3">
        <div class="text-center pb-10">
            <a href="{{ route('discussions.create') }}" 
            class="uppercase bg-blue-500 text-white text-lg font-bold py-4 px-8 mt-6 rounded-3xl flex items-center justify-center hover:opacity-100 pl-6 nav-item">
            Add discussion
            </a>
        </div>
        @foreach ($channels as $channel )
            <a href="{{ route('discussions.index') }}?channel={{ $channel->slug }}" 
                class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                {{ $channel->name }}
            </a>
        @endforeach
                            
                           
    </nav>
</aside>