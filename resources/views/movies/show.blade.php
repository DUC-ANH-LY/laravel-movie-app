@extends('layouts/main')
@section('content')
<div class="movie-info border-b border-gray-800">
<div class="flex container mx-auto px-4 py-16  flex-col md:flex-row">
    <img src="{{ $movie['poster_path']}}" class="md:w-96" alt="">
    <div class="md:ml-24">
        <h2 class="text-4xl font-semibold">{{ $movie['title'] }}</h2>
        <div class="text-gray-400 text-sm flex items-center mt-1 flex-wrap">
            <div>
                <i class="fa-solid fa-star text-yellow-300"></i> {{$movie['vote_average']}} | {{\Carbon\Carbon::parse($movie['release_date'])->format('M d,Y')}}
            </div>
            <div class="ml-3">
              {{$movie['genres']}}
            </div> 
        </div>

        <p class="text-gray-300 mt-8">
            {{ $movie['overview']}}
        </p>
        <div class="mt-12">
            <h4 class="text-white font-semibold">Featured Crew</h4>
            <div class="flex mt-4">
                @foreach ($movie['crew'] as $crew)
                    <div class="mr-8">
                        <div>{{ $crew['name'] }} </div>
                        <div class="text-sm text-gray-400">{{ $crew['job'] }}</div>
                    </div>
                @endforeach
            </div>
        </div>
        <div x-data="{isOpen:false}">

            @if ( count($movie['videos']['results']) > 0)
            
            <div class="mt-12">
                    <button  @click="isOpen=true" href="https://youtube.com//watch?v={{ $movie['videos']['results'][0]['key'] }}" class="flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150">
                        <i class="fa-solid fa-play"></i>
                        <div class="ml-2">Play Trailer</div>
                    </button>

            </div>
            @endif
            <div
            x-show="isOpen"
                            style="background-color: rgba(0, 0, 0, .5);"
                            class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
            >
                            <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                                <div class="bg-gray-900 rounded">
                                    <div class="flex justify-end pr-4 pt-2">
                                        <button
                                            @click="isOpen = false"
                                            @keydown.escape.window="isOpen = false"
                                            class="text-3xl leading-none hover:text-gray-300">&times;
                                        </button>
                                    </div>
                                    <div class="modal-body px-8 py-8">
                                        <div class="responsive-container overflow-hidden relative" style="padding-top: 45.25%">
                                            <iframe class="responsive-iframe  absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/{{ $movie['videos']['results'][0]['key'] }}" style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div>
        </div>
    </div>
</div>

</div>
{{-- end movie info --}}
<div class="movie-cast border-b border-gray-800">
<div class="container mx-auto px-4 py-16">
    <h2 class="text-4xl font-semibold">Cast</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 sm:grid-cols-2 lg:grid-cols-5 gap-16">
        @foreach ($movie['cast'] as $cast)

            
        <div class="mt-8">
            <a href="{{ route('actors.show',$cast['id'])}}">
                <img class="hover:opacity-75 transition ease-in-out duration-150" src="{{ 'https://image.tmdb.org/t/p/w500/'. $cast['profile_path'] }}" alt="img">
            <div class="mt-2">
                <a href="{{ route('actors.show',$cast['id'])}}" class="text-lg mt-2 hover:text-gray-300">{{ $cast['name']}}</a>
                <div class="text-gray-400 text-sm">
                    <div>
                        {{ $cast['character']}}
                    </div> 
                </div>
            </div>
        </a>
        </div>
        
        @endforeach
        
        
        
</div>

</div>
{{-- end cast --}}
<div class="movie-cast border-b border-gray-800" x-data="{isOpen:false,image:''}">
<div class="container mx-auto px-4 py-16">
    <h2 class="text-4xl font-semibold">Image</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 sm:grid-cols-2 lg:grid-cols-5 gap-16">
        @foreach ($movie['images'] as $image)

            <div class="mt-8">
                <a href="#" @click.prevent="isOpen=true
                    image='{{ 'https://image.tmdb.org/t/p/original/'. $image['file_path']  }}'
                ">

                    <img src="{{ 'https://image.tmdb.org/t/p/w500/'. $image['file_path'] }}" alt="">
                </a>
            </div>

        @endforeach
        <div
            x-show="isOpen"
                            style="background-color: rgba(0, 0, 0, .5);"
                            class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
            >
                            <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto w-3/4 h-3/4">
                                <div class="bg-gray-900 rounded">
                                    <div class="flex justify-end pr-4 pt-2">
                                        <button
                                            @click="isOpen = false"
                                            @keydown.escape.window="isOpen = false"
                                            class="text-3xl leading-none hover:text-gray-300">&times;
                                        </button>
                                    </div>
                                    <div class="modal-body px-8 py-4">
                                        <img :src="image" alt="poster">
                                    </div>
                                </div>
                            </div>
                </div>
</div>

</div>
@endsection