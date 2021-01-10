@extends('layouts.main')
@section('content')
<div class="container mx-auto px-4 pt-16">
    <div class="popular-movies">
        <h2 class="uppercase tracking-wider text-lg font-semibold text-yellow-500">
            Popular Movies
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
            @foreach($popularMovies as $movie)
            <x-movie-card :movie="$movie" :genres="$genres" />
            @endforeach
        </div>
    </div>
    <!-- end popular movies -->
    <div class="now-playing">
        <h2 class="uppercase tracking-wider text-lg font-semibold text-yellow-500 mt-24">
            Now Playing
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
            @foreach($nowPlayingMovies as $movie)
            <x-movie-card :movie="$movie" :genres="$genres" />
            @endforeach
        </div>
    </div>
    <!-- end now playing -->
</div>
@endsection