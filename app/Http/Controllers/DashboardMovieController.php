<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardMovieController extends Controller
{

    public function index(Request $request)
    {

        $movies = Movie::latest()->paginate(50);
        $allmovies = true;

        if ($request->has('movieGenre')) {
            if ($request->movieGenre !== "all") {
                $genre_id = Genre::firstWhere('id', $request->movieGenre)->name;
                $movies = Movie::all()->where('genres', $genre_id);
                $allmovies = false;
            }
        }

        if ($request->has('search')) {
            $search = $request->search;
            $movies = Movie::latest()->where('title', 'like', '%' . $search . '%')->paginate(40);
        }

        return view('dashboard.movies.movies', [
            'movies' => $movies,
            'genres' => Genre::all(),
            'allmovies' => $allmovies
        ]);
    }


    public function create(Request $request)
    {
        if ($request->has('login')) {
            return redirect('dashboard/home')->with('error', 'you are not authorized to edit movie');
        }
        return view('dashboard.movies.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'movie_id' => 'required|unique:movies'
        ]);

        $movie = Movie::firstOrCreate(['movie_id' => $request->movie_id], $request->all());
        if ($movie) {
            return redirect('/dashboard/home')->with('success', 'Movie added succesfully');
        }
        return redirect('/dashboard/home')->with('error', 'Movie already exist');
    }

    public function show(Movie $movie)
    {
        return view('dashboard.movies.show', [
            'result' => $movie,
            'genres' => Genre::all()
        ]);
    }


    public function edit(Movie $movie)
    {
        if (!Auth::user()) {
            return redirect('/auth/login')->with('error', 'you are not authorized to edits movie');
        }
        return view('dashboard.movies.edit', [
            'edit' => $movie,
            'genres' => Genre::all()
        ]);
    }


    public function update(Request $request, Movie $movie)
    {
        $movie->update([
            'genres' => $request->genres,
            'my_comment' => $request->my_comment,
            'tagline' => $request->tagline
        ]);
        return redirect('/dashboard/home')->with('success', "Movie successfully updated");
    }


    public function destroy(Movie $movie)
    {
        if (!Auth::user()) {
            return redirect('/auth/login')->with('error', 'you are not authorized to delete movie');
        }
        Movie::destroy($movie->id);
        return redirect('/dashboard/movies')->with('success', 'Movie successfully deleted');
    }
}
