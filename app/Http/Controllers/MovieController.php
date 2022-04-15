<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $movies = Movie::latest()->get();
        $moviesResult = $movies;
        $genres = Genre::all();
        $allmovies = true;
        if ($movies[0]->is_favorite) {
            $moviesResult =  $movies->slice(1);
        }
        if (($request->has('movieGenre'))) {
            $genreid = Genre::all()->firstWhere('id', $request['movieGenre'])->name;
            $moviesResult = Movie::all()->where('genres', $genreid);
            $allmovies = false;
        }
        return view('sudahnonton.movies', [
            'movies' => $moviesResult,
            'genres' => $genres,
            'allmovies' => $allmovies
        ]);
    }

    public function show(Movie $movie, Request $request)
    {
        $movie_id = ($request->movie_id);
        $key = config('services.apikey.key');
        $response = Http::get('https://api.themoviedb.org/3/movie/' . $movie_id . '?api_key=' . $key);
        $result = json_decode($response->body());

        return view('sudahnonton.detail', [
            'result' => $result,
            'is_movie' => true,
            'my_comment' => $movie->my_comment
        ]);
    }
}
