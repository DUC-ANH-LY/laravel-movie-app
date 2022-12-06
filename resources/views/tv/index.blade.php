@extends('layouts.main')
@section('content')
<div class="container px-4 pt-16 mx-auto">
    <div class="popular-tv">
        <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Popular Shows</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 sm:grid-cols-2 lg:grid-cols-5 gap-16">
        @foreach ($popularTv as $tvshow)
        
        <x-tv-card  :tvshow="$tvshow" />
        @endforeach
        
        
    </div>


    {{-- end popular movies --}}

    {{-- Now playing section --}}
    <div class="now-playing-movies py-24 ">
        <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Top Rated Show</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 sm:grid-cols-2 lg:grid-cols-5 gap-16">
        @foreach ($topRatedTv as $tvshow)
        
        <x-tv-card   :tvshow="$tvshow"/>
        @endforeach
    </div>

</div>
@endsection