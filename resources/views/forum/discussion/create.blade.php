@extends('layouts.appforum')

@section('content')

<div class="p-10">  

    <!--Card 1-->
    <div class="rounded overflow-hidden shadow-lg text-center">
      <div class="px-6 py-4">
        <div class="uppercase font-bold py-15 border-b border-gray-200 text-3xl">Add discussion</div>
        <section class="py-10">
            <div class="w-2/5 m-auto text-center">
                <div>
                    <form action="{{ route('discussion.store') }}" method="POST">
                        @csrf
                        <div class="m-7">
                            <div class="mb-6">
                                <input type="text" 
                                placeholder="Title" 
                                name="title"  
                                class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none
                                focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 
                                dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" required>
                            </div>


                            <div class="mb-6">
                                <textarea rows="5" 
                                          name="content" 
                                          placeholder="Your Message" 
                                          class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none
                                          focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 
                                          dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" required></textarea>
                            </div>

                            <div class="mb-6">
                                <select name="channel" id="channel" class="w-full px-3 py-4 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none
                                focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 
                                dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500">
                                    @foreach ($channels as $channel)
                                        <option value="{{ $channel->id }}">{{ $channel->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            
                            <div class="mb-6">
                                <button type="submit" class="w-full px-3 py-4 text-white bg-indigo-500 rounded-md focus:bg-indigo-600 focus:outline-none">
                                    Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
      </div>
    </div>
  </div>

@endsection