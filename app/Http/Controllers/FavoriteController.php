<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\TvShow;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index(Request $request)
    {
        $movies = Movie::latest()->get();
        $genres = Genre::all();
        $tvshows = TvShow::latest()->get();


        $update_tv = TvShow::latest('updated_at')->first()->updated_at;
        $update_movies = Movie::latest('updated_at')->first()->updated_at;

        $moviesFiltered = ($movies->where('is_favorite', true));
        $tvshowsFiltered = ($tvshows->where('is_favorite', true));

        $favorite = $moviesFiltered->concat($tvshowsFiltered);
        if ($update_tv > $update_movies) {
            $favorite = $tvshowsFiltered->concat($moviesFiltered);
        }
        if ($request->has('faveGenre')) {
            $genreid = $genres->firstWhere('id', $request['faveGenre'])->name;

            $filtered = $favorite->where('genres', $genreid);
            return view('sudahnonton.favourite', [
                'favorites' => $filtered,
                'genres' => $genres,
                'allfavorites' => false
            ]);
        }
        return view('sudahnonton.favourite', [
            'favorites' => $favorite,
            'genres' => $genres,
            'allfavorites' => true
        ]);
    }

    public function search()
    {
        if (!request('search')) {

            return back()->with('error', 'empty value');
        }
        if (request('search')) {

            $search = strtolower(request('search'));
            $result1 = (Movie::where(('title'), 'like', '%' . $search . '%')->get());
            $result2 = (TvShow::where(('name'), 'like', '%' . $search . '%')->get());
            $results = $result1->merge($result2);

            return redirect('/result')->with('results', $results);
        }
    }
    public function result()
    {

        return view('sudahnonton.result');
    }
}
