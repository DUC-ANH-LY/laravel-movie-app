<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class MoviesViewModel extends ViewModel
{
    public $movies,$now_playings,$genres;
    public function __construct($movies,$now_playings,$genres)
    {
        //
        $this->movies= $movies;
        $this->now_playings= $now_playings;
        $this->genres= $genres;
    }



    public function movies(){
        return $this->formatMovies($this->movies);
    }

    public function now_playings(){
        return $this->formatMovies($this->now_playings);
    }

    public function genres(){
        return  collect($this->genres)->mapWithKeys(function ($genre){
            return [$genre['id']=>$genre['name']];
        });
    }

    public function formatMovies($movies){
        
        return collect($movies)->map(function($movie) {
            $genresFormatted = collect($movie['genre_ids'])->mapWithKeys(function($value) {
                return [$value => $this->genres()->get($value)];
            })->implode(', ');
            return collect($movie)->merge([
                'poster_path'=>'https://image.tmdb.org/t/p/w500/'.$movie['poster_path'],
                'vote_average' =>$movie['vote_average'],
                'release_date' => Carbon::parse($movie['release_date'])->format('M d, Y'),
                'genres' =>$genresFormatted 
            ])->only([
                'poster_path', 'id', 'genre_ids', 'title', 'vote_average', 'overview', 'release_date', 'genres',
            ]);
        });
    }

}
