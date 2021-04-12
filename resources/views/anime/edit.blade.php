@extends('layouts.app')

@section('content')

<div class="w-4/5 m-auto text-left">
    <div class="py-15">
        <h1 class="text-6xl">
            Update comment
        </h1>
    </div>
</div>

@if ($errors->any())
    <div class="w-4/5 m-auto">
        <ul>
            @foreach ($errors->all() as $error )
                <li class="w-3/5 mb-4 bg-red-200 text-red-600 px-10 py-4">
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif

<div class="w-4/5 m-auto pt-10">
    <form action="{{ route('comment.update', $comment->id) }}"
          method="POST"
          enctype="multipart/form-data">
          @csrf
          @method('PUT')
          {{-- <input type="hidden" name="cid" value="{{ $comment->id }}"> --}}

            <textarea name="comment"
                      class="py-20 bg-transparent block border-b-2 w-full h-60 text-xl outline-none">
                      {{ $comment->comment }}
            </textarea>

            <button type="submit"
                    class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
                    Submit Post
            </button>
        </form>
</div>

@endsection