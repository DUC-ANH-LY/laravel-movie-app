<div>
    <div class="mt-8">
            <a href="{{ route('movies.show',$movie['id'])}}"><img class="hover:opacity-75 transition ease-in-out duration-150 "src="{{'https://image.tmdb.org/t/p/w500/'. $movie['poster_path']}}" alt="poster"></a>
            <div class="mt-2">
                <a href="{{ route('movies.show',$movie['id'])}}" class="text-lg mt-2 hover:text-gray-300">{{$movie['title']}}</a>
                <div class="text-gray-400 text-sm">
                    <div class="mt-1">
                        <i class="fa-solid fa-star text-yellow-300"></i> {{$movie['vote_average']}}  |  {{\Carbon\Carbon::parse($movie['release_date'])->format('M d,Y')}}
                    </div>
                    <div>
                      {{$movie['genres']}}
                    </div> 
                </div>
            </div>
        </div>
</div>