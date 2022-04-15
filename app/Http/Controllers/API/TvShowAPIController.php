<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\TvShowResource;
use App\Models\TvShow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TvShowAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $tvshows = TvShow::latest()->get();

        return response([
            'tvshows' => TvShowResource::collection($tvshows),
            'message' => "Data successfully fetched"
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'tv_id' => 'required|unique:tv_shows'
        ]);
        if ($validator->fails()) {
            response([
                'error', $validator->errors(),
                'message' => 'validation data failed'
            ], 400);
        }
        $tvshow = TvShow::firstOrCreate(['tv_id' => $request->tv_id], $data);
        return response([
            'tvshow' => new TvShowResource($tvshow),
            'message' => 'new data successfully added'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TvShow  $tvShow
     * @return \Illuminate\Http\Response
     */
    public function show(TvShow $tvshow)
    {
        return response([
            'tvshow' => new TvShowResource($tvshow),
            'message' => 'data successfully fetched'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TvShow  $tvShow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TvShow $tvshow)
    {
        $tvshow->update($request->all());
        return response([
            'tvshow' => new TvShowResource($tvshow),
            'message' => 'tv show successfully updated'
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TvShow  $tvShow
     * @return \Illuminate\Http\Response
     */
    public function destroy(TvShow $tvshow)
    {
        $tvshow->delete();
        return response([
            'message' => 'data successfuly deleted'
        ], 200);
    }
}
