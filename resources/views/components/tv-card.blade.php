<div>
    <div class="mt-8">
            <a href="{{ route('tv.show',$tvshow['id'])}}"><img class="hover:opacity-75 transition ease-in-out duration-150 "src="{{'https://image.tmdb.org/t/p/w500/'. $tvshow['poster_path']}}" alt="poster"></a>
            <div class="mt-2">
                <a href="{{ route('tv.show',$tvshow['id'])}}" class="text-lg mt-2 hover:text-gray-300">{{$tvshow['name']}}</a>
                <div class="text-gray-400 text-sm">
                    <div class="mt-1">
                        <i class="fa-solid fa-star text-yellow-300"></i> {{$tvshow['vote_average']}}  |  {{\Carbon\Carbon::parse($tvshow['first_air_date'])->format('M d,Y')}}
                    </div>
                    <div>
                      {{$tvshow['genres']}}
                    </div> 
                </div>
            </div>
        </div>
</div>