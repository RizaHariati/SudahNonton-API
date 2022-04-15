<?php

namespace App\Http\Controllers;

use App\Models\TvShow;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TvShowController extends Controller
{
    public function index(Request $request)
    {
        $allresult = true;
        $tvshows = TvShow::latest()->get();
        $tvResult = $tvshows;
        $genres = Genre::all();
        if ($tvshows[0]->is_favorite) {
            $tvResult = $tvshows->slice(1);
        }
        if (($request->has('tvGenre'))) {
            $genreid = Genre::all()->firstWhere('id', $request['tvGenre'])->name;
            $tvResult = TvShow::all()->where('genres', $genreid);
            $allresult = false;
        }
        return view('sudahnonton.tvshows', [
            'tvshows' => $tvResult,
            'genres' => $genres,
            'allresult' => $allresult
        ]);
    }


    public function show(TvShow $tvshow, Request $request)
    {

        $tv_id = ($request->tv_id);
        $key = config('services.apikey.key');
        if ($tv_id) {
            $response = Http::get('https://api.themoviedb.org/3/tv/' . $tv_id . '?api_key=' . $key);
            $result = json_decode($response->body());
        }


        return view('sudahnonton.detail', [
            'result' => $result,
            'is_movie' => false,
            'my_comment' => $tvshow->my_comment
        ]);
    }
}
