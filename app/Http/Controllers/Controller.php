<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\TvShow;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function searchMovie(Request $request)
    {

        $search = request('searchmovie');
        $cleansearch = preg_replace('/[^A-Za-z0-9\-]/', ' ', $search);
        $key = config('services.apikey.key');
        if ($cleansearch) {
            $response = Http::get('https://api.themoviedb.org/3/search/movie?api_key=' . $key . '&query=' . $cleansearch);
            $results = collect(json_decode(($response->body()))->results);

            return back()->with('results', $results);
        }
        return back()->with('error', 'Empty field');
    }

    public function selectMovie(Request $request)
    {
        $genres = Genre::all();
        $key = config('services.apikey.key');
        $movie_id = $request->movie_id;
        if (Movie::all()->firstWhere('movie_id', $movie_id)) {
            return redirect('/dashboard/home')->with('error', 'You already put ' . Movie::all()->firstWhere('movie_id', $movie_id)->title . ' on Movie List');
        }
        $response = Http::get('https://api.themoviedb.org/3/movie/' . $movie_id . '?api_key=' . $key);
        $result = json_decode($response->body());


        foreach ($result->genres as $genre) {
            if ($genres->contains($genre->id) == false) {
                Genre::create([
                    'id' => $genre->id,
                    'name' => $genre->name,
                ]);
            }
        }

        return back()->with('selectedMovie', $result)
            ->with('genres', $genres)
            ->with('success', 'successful fetching data, start editing');
    }

    public function searchTvShows()
    {
        $search = request('searchtvshow');
        $cleansearch = preg_replace('/[^A-Za-z0-9\-]/', ' ', $search);
        $key = config('services.apikey.key');
        if ($cleansearch) {
            $response = Http::get('https://api.themoviedb.org/3/search/tv?api_key=' . $key . '&query=' . $cleansearch);
            $results = collect(json_decode(($response->body()))->results);

            if ($results->count() >= 20) {
                return back()->with('results', $results)
                    ->with('error', 'too many result, need more specific keyword');
            }
            return back()->with('results', $results);
        }
        return back()->with('error', 'Empty field');
    }

    public function selectTvShows(Request $request)
    {
        $tv_id = $request->tv_id;
        $key = config('services.apikey.key');
        if (TvShow::all()->firstWhere('tv_id', $tv_id)) {
            return redirect('/dashboard/home')->with('error', 'You already put ' . TvShow::all()->firstWhere('tv_id', $tv_id)->name . ' on Tv List');
        }

        $genres = Genre::all();
        $response = Http::get('https://api.themoviedb.org/3/tv/' . $tv_id . '?api_key=' . $key);
        $result = json_decode($response->body());

        foreach ($result->genres as $genre) {
            if ($genres->contains($genre->id) == false) {
                Genre::create([
                    'id' => $genre->id,
                    'name' => $genre->name,
                ]);
            }
        }

        return back()->with('selectedTvShow', $result)
            ->with('genres', Genre::all())
            ->with('success', 'successful fetching data, start editing');
    }

    public function dashboard()
    {

        return view('dashboard.dashboard', [
            'movies' => Movie::all(),
            'tvshows' => TvShow::all(),
            'image' => Movie::latest()->firstWhere('genres', 'horror')->image,
            'genres' => Genre::all()
        ]);
    }
}
