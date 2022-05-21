<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Favourite;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $favourites = Favourite::orderBy('id')->paginate(12);

        return view('admin.favourite.index', [
            'favourites' => $favourites
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = Post::all();
        $users = User::all();
        return view('admin.favourite.create', compact('posts', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $favourite = new Favourite();
        $favourite->user_id = $request->user_id;
        $favourite->post_id = $request->post_id;
        $favourite->save();

        return redirect()->route('favourite.index')->withSuccess('Успешно добавлено в избранное');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Favourite  $favourite
     * @return \Illuminate\Http\Response
     */
    public function show(Favourite $favourite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Favourite  $favourite
     * @return \Illuminate\Http\Response
     */
    public function edit(Favourite $favourite)
    {
        $posts = Post::all();
        $users = User::all();
        return view('admin.favourite.edit', compact('favourite', 'posts', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Favourite  $favourite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Favourite $favourite)
    {
        $favourite->user_id = $request->user_id;
        $favourite->post_id = $request->post_id;
        $favourite->save();

        return redirect()->route('favourite.index')->withSuccess('Избранное успешно обновлено');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Favourite  $favourite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Favourite $favourite)
    {
        $favourite->delete();
        return redirect()->back()->withSuccess('Успешно удалено из избранного');
    }
}
