<aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
    <div class="p-6">
        <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
    </div>
    <nav class="text-white text-base font-semibold pt-3">
        
        <a href="{{ route('admin.users.index') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-user mr-3"></i>
           Users
        </a>
        <a href="{{ route('admin.mangas.index') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-book mr-3"></i>
            Mangas
        </a>
        <a href="{{ route('admin.animes.index') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fab fa-buysellads mr-3"></i>
            Animes
        </a>
        <a href="{{ route('admin.tags.index') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-tags mr-3"></i>
            Tags
        </a>
        <a href="{{ route('admin.comments.index') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-comments mr-3"></i>
            Comments
        </a>
        <a href="{{ route('admin.channels.index') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
            <i class="far fa-list-alt mr-3"></i>
            Channels
        </a>
        <a href="{{ route('admin.discussions.index') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fab fa-wpforms mr-3"></i>
            Discussions
        </a>
        <a href="{{ route('admin.replies.index') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-reply mr-3"></i>
            Replies
        </a>
    </nav>
</aside>