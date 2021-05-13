<div>
    <div class="pb-5 py-5 border-b border-gray-200">
        <h3 class="text-2xl font-bold">{{ $comment->user->name }}</h3>
        <small>Le {{ $comment->created_at }}</small>
        <blockquote class="pt-3">
            <em>{{ $comment->comment }}</em>
        </blockquote>

        @if (isset(Auth::user()->id) && Auth::user()->id == $comment->user_id)

            <span class="float-right">
                <a href="{{ route('comment.edit', $comment->id) }}"
                class="text-gray-700 italic hover:text-blue-500">Edit</a>
            </span>

            <span class="float-right">
                <form action="{{ route('comment.destroy', $comment->id) }}"
                    method="POST">
                    @csrf
                    @method('DELETE')
                    
                    <button class="text-red-500 pr-3 hover:text-red-900" type="submit">
                        Delete
                    </button>
                </form>
            </span>
        
        @endif

        <span class="float-right">
            <button class="btn-reply px-3 italic" id="reply-btn"
                  onclick="showReplyForm('{{$comment->id}}','{{$comment->user->name}}')">reply
            </button>
        </span>
    </div>


    {{-- COMMENT REPLIES  --}}
    @if($comment->replies->count() > 0)
        @foreach ($comment->replies as $reply)

        <div class="pb-5 py-5 px-6 border-b border-gray-200">
            <h3 class="text-2xl font-bold">{{ $reply->user->name }}</h3>
            <small>Le {{ $reply->created_at }}</small>
            <blockquote class="pt-3">
                <em>{{ $reply->message }}</em>
            </blockquote>


            @if (isset(Auth::user()->id) && Auth::user()->id == $reply->user_id)

                <span class="float-right">
                    <a href="{{ route('comment-reply.edit', $reply->id) }}"
                    class="text-gray-700 italic hover:text-blue-500">Edit</a>
                </span>

                <span class="float-right">
                    <form action="{{ route('comment-reply.destroy', $reply->id) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        
                        <button class="text-red-500 pr-3 hover:text-red-900" type="submit">
                            Delete
                        </button>
                    </form>
                </span>
            
            @endif

            <span class="float-right">
                <a class="text-gray-700 px-3 italic hover:text-blue-500 cursor-pointer" id="reply-btn"
                onclick="showReplyForm('{{ $comment->id }}', '{{ $reply->user->name }}')">
                    Reply
                </a>
            </span>
        </div>

        @endforeach
    @else
    @endif
    

    {{-- When user login show reply fourm --}}
    @guest
    {{-- Show none --}}
    @else
    <div class="comment-list px-6" id="reply-form-{{$comment->id}}" style="display: none">
      <div class="single-comment justify-between flex">
        <div class="user justify-between flex">
          <div class="desc">
        
            <div class="row flex-row flex">
            <form action="{{route('comment-reply.store', $comment->id)}}" method="POST">
            @csrf
              <div class="col-lg-12">
                <textarea
                  id="reply-form-{{$comment->id}}-text"
                  cols="60"
                  rows="2"
                  class="form-control mb-2 w-full px-3 py-4 text-gray-700 focus:outline-none"
                  name="message"
                  placeholder="Messege"
                  onfocus="this.placeholder = ''"
                  onblur="this.placeholder = 'Message'"
                  required="">
                </textarea>
              </div>
                <button type="submit" class="btn-reply px-3 py-2 text-white bg-indigo-500 rounded-md focus:bg-indigo-600 focus:outline-none">
                  Reply
                </button>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endguest
</div>