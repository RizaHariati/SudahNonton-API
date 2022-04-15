<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\MovieResource;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MovieAPIController extends Controller
{
    public function index()
    {

        $movies = Movie::latest()->get();

        return response([
            'movies' => MovieResource::collection($movies),
            'message' => "Data successfully fetched"
        ], 200);
    }



    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'movie_id' => 'required|unique:movies'
        ]);
        if ($validator->fails()) {
            response([
                'error', $validator->errors(),
                'message' => 'validation data failed'
            ], 400);
        }
        $movie = Movie::firstOrCreate(['movie_id' => $request->movie_id], $data);
        return response([
            'movie' => new MovieResource($movie),
            'message' => 'new data successfully added'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        return response([
            'movie' => new MovieResource($movie),
            'message' => 'data successfully fetched'
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        $movie->update($request->all());
        return response([
            'movie' => new MovieResource($movie),
            'message' => 'movie successfully updated'
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return response([
            'message' => 'data successfuly deleted'
        ], 200);
    }
}
