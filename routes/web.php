<?php

use Illuminate\Support\Facades\Route;

Route::get("/","MoviesController@index")->name("movies.index");
Route::get("/movies/{movies}","MoviesController@show")->name("movies.show");