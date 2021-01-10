<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class MoviesController extends Controller
{
    public function index()
    {
        $popularMovies = Http::get("https://api.themoviedb.org/3/movie/popular?api_key=".config('services.tmdb.token'))
        ->json()['results'];

        $nowPlayingMovies =  Http::get("https://api.themoviedb.org/3/movie/now_playing?api_key=".config('services.tmdb.token'))
        ->json()['results'];

        $genresArray = Http::get("https://api.themoviedb.org/3/genre/movie/list?api_key=".config('services.tmdb.token'))
        ->json()['genres'];

        $genres = collect($genresArray)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });

        return view("index",
        ['popularMovies'=>$popularMovies,
        'genres' => $genres,
        'nowPlayingMovies' => $nowPlayingMovies
            ]);
    }

    public function show($id)
    {
        $movie = Http::get("https://api.themoviedb.org/3/movie/".$id."?api_key=".config('services.tmdb.token')."&append_to_response=credits,videos,images")
        ->json();

        $genresArray = Http::get("https://api.themoviedb.org/3/genre/movie/list?api_key=".config('services.tmdb.token'))
        ->json()['genres'];

        $genres = collect($genresArray)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });

        return view("show", ['movie'=>$movie, 'genres'=>$genres]);
    }
}