@extends('layouts/main')
@section('content')
<div class="movie-info border-b border-gray-800">
<div class="flex container mx-auto px-4 py-16  flex-col md:flex-row">
    <div class="flex-none">
        <img src="{{'https://image.tmdb.org/t/p/w500/'.$actor['profile_path']}}" alt="profile image" class="w-72">
        <ul class="flex space-x-4 justify-start">
            <li>
                <a href="{{ $hi['facebook'] }}" title="Facebook">
                    <i class="fa-brands fa-facebook"></i>
                </a>
            </li>
            <li>
                <a href="{{ $hi['instagram'] }}" title="Instagram">
                    <i class="fa-brands fa-instagram"></i>
                </a>
            </li>
            <li>
                <a href="{{ $hi['twitter'] }}" title="Twitter">
                    <i class="fa-brands fa-twitter"></i>
                </a>
            </li>
            <li>
                <a href="#" title="Website">
                    <i class="fa-solid fa-house"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="md:ml-24">
        <h2 class="text-4xl mt-4 md:mt-0 font-semibold">{{ $actor['name'] }}</h2>
        <div class="flex flex-wrap items-center text-gray-400 text-sm">
            <i class="fa-solid fa-cake-candles"></i>
            <span class="ml-1">{{ $actor['birthday'] }} ({{  $actor['age'] }} years old) in {{ $actor['place_of_birth']}}</span>
        </div>

        <p class="text-gray-300 mt-8">{{$actor['biography']}}</p>


        <h4 class="font-semibold mt-12">Known For</h4>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-8">
            @foreach ($title as $movie)
                
            <div class="mt-4">
                <a href="#">
                    <img src="{{ $movie['poster_path'] }}" alt="poster">
                    <a href="#" class="text-sm leading-normal block text-gray-400 hover:text-white mt-1">{{ $movie['title']}}</a>
                </a>
            </div>
            @endforeach
           
        </div>
</div>
</div>
</div>

    <div class="credits border-b border-gray-800 ">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Credits</h2>
            <ul>
                @foreach ($credits as $credit)
                    
                <li>{{ $credit['release_year']}} &middot; <strong>{{ $credit['title']}}</strong> {{ $credit['character']}}</li>
                @endforeach
                
            </ul>
        </div>
    </div>
    

   
@endsection