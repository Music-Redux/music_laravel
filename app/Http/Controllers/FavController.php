<?php

namespace App\Http\Controllers;

use App\Models\Fav;
use Illuminate\Http\Request;

class FavController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $favorite = Fav::all();
        return response()->json([
            'data' => $favorite
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'song_id' => 'required',
            'user_id' => 'required',
        ]);

        $favorite = Fav::create([
            'user_id' => $request->user_id,
            'song_id' => $request->song_id

        ]);

        $favorite->save();
        return response()->json([
            'data' => $favorite
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fav  $fav
     * @return \Illuminate\Http\Response
     */
    public function show(Fav $fav)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fav  $fav
     * @return \Illuminate\Http\Response
     */
    public function edit(Fav $fav)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fav  $fav
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fav $fav)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fav  $fav
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user_id = $request->user_id;
        $song_id = $request->song_id;

        $fav = Fav::where('user_id', $user_id)->where('song_id', $song_id)->delete();
        return response()->json(
            $fav
        );
    }

    public function getFavByUserId(Request $request)
    {
        $user_id = $request->user_id;
        $fav = Fav::where('user_id', $user_id)->get();
        return response()->json($fav);
    }
}
