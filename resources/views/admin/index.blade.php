@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                

                <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                    <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                        {{ __('Dashboard') }}
                    </header>
        
                    <div class="w-full p-6">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <p class="text-gray-700">
                            Bonjour monsieur l'admin {{ Auth::user()->name }}
                        </p>
                    </div>
                </section>
                
            </div>
        </div>
    </div>
</div>
@endsection
