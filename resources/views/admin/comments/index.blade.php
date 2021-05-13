@extends('layouts.app')
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mangatech - Admin - Comments</title>
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

                <div class="flex">
                    <h1 class="text-3xl text-black pb-6 flex-1">Comments</h1>
                </div>
                <div class="w-full mt-12">
                    
                    <div class="bg-white overflow-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="text-left py-3 px-4 uppercase font-bold text-sm">#id</td>
                                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">anime_id</th>
                                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">manga_id</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">User</td>
                                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">comment</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">CRUD</td>
                                </tr>
                            </thead>

                            <tbody class="text-gray-700">

                                @foreach ($comments as $comment)
                                    
                                <tr>
                                    <td class="w-1/6 text-left font-bold py-3 px-4">{{ $comment->id }}</td>
                                    <td class="w-1/6 text-left py-3 px-4">
                                        {{ $comment->anime_id }}
                                    </td>
                                    <td class="w-1/6 text-left py-3 px-4">{{ $comment->manga_id }}</td>
                                    <td class="w-1/6 text-left py-3 px-4">{{ $comment->user->name }}</td>
                                    <td class="w-1/6 text-left py-3 px-4">{{ $comment->comment }}</td>
                                
                                   
                                    <td class="w-1/6 text-left py-3 px-4">

                                        {{-- Delete button --}}
                                        <form action="{{ route('admin.comments.destroy', $comment->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            
                                            <button class="text-red-500 pr-3 hover:text-red-900" type="submit">
                                                Delete
                                            </button>
                                        </form>

                                    </td>
                                </tr>

                                @endforeach
            
                            </tbody>
                        </table>
                        {{ $comments->links() }}
                    </div>
                </div>
            </main>
    
        </div>
        
    </div>


</div>

@endsection

@include('partial.admin.footer')
