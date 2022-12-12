<?php

namespace App\Http\Controllers;

use App\Models\Fav;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return response()->json([
            'data' => $users
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // show single user for the profile page

        $currentUser = User::find($id);
        $userFav = $currentUser->favourites;
        $userPosts = $currentUser->posts;

        return response()->json([
            'user' => $currentUser,
            'fav' => $userFav,
            'posts' => $userPosts

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $id = $request->id;
        $user = User::find($id);
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        // $image = base64_encode(file_get_contents($request->file('profile_image')));
        $user->name = $request->name;
        $user->email = $request->email;
        // $user->avatar = $image;

        //hash password
        //create user
        $user->save();

        // $user->update($request->all());
        return response()->json([
            'user' => $user,

        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}