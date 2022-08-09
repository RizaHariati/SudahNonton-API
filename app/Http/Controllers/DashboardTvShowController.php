<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\TvShow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardTvShowController extends Controller
{

    public function index(Request $request)
    {


        $tvshows = TvShow::latest()->paginate(50);
        $alltvshows = true;
        if ($request->has('tvGenre')) {
            if ($request->tvGenre !== "all") {
                $genre_id = Genre::firstWhere('id', $request->tvGenre)->name;
                $tvshows = TvShow::all()->where('genres', $genre_id);
                $alltvshows = false;
            }
        }
        if ($request->has('search')) {
            $search = $request->search;
            $tvshows = TvShow::latest()->where('name', 'like', '%' . $search . '%')->paginate(40);
        }
        return view('dashboard.tvshows.tvshows', [
            'tvshows' => $tvshows,
            'genres' => Genre::all(),
            'alltvshows' => $alltvshows
        ]);
    }

    public function create(Request $request)
    {
        if ($request->has('login')) {
            return redirect('dashboard/home')->with('error', 'you are not authorized to edit tv show');
        }
        return view('dashboard.tvshows.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tv_id' => 'required|unique:tv_shows'
        ]);

        $tvshow = TvShow::firstOrCreate(['tv_id' => $request->tv_id], $request->all());
        if ($tvshow) {
            return redirect('/dashboard/home')->with('success', 'Tv Show added succesfully');
        }
        return redirect('/dashboard/home')->with('error', 'Tv Show already exist');
    }

    public function show(TvShow $tvshow)
    {
        return view('dashboard.tvshows.show', [
            'result' => $tvshow
        ]);
    }

    public function edit(TvShow $tvshow)
    {
        if (!Auth::user()) {
            return redirect('/auth/login')->with('error', 'you are not authorized to edit tv show');
        }
        return view('dashboard.tvshows.edit', [
            'edit' => $tvshow,
            'genres' => Genre::all()
        ]);
    }


    public function update(Request $request, TvShow $tvshow)
    {

        $tvshow->update([
            'genres' => $request->genres,
            'my_comment' => $request->my_comment,
            'tagline' => $request->tagline
        ]);
        return redirect('/dashboard/home')->with('success', "Show successfully updated");
    }

    public function destroy(TvShow $tvshow)
    {
        if (!Auth::user()) {
            return redirect('/auth/login')->with('error', 'you are not authorized to delete tv show');
        }
        TvShow::destroy($tvshow->id);
        return redirect('/dashboard/tvshows')->with('success', 'Show successfully deleted');
    }
}
