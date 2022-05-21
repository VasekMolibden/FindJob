<?php

namespace App\Http\Controllers;

use App\Http\Requests\FavouriteAddRequest;
use App\Http\Resources\FavouriteResource;
use App\Models\Favourite;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Promise\all;

class FavouriteController extends Controller
{
    public function index()
    {
        $favourites = Favourite::where('user_id', Auth::id())->orderBy('id', 'desc')->paginate(7);

        return view('favourites', ['favourites' => $favourites]);
    }

    public function create()
    {
        //
    }

    public function store($post_id)
    {
        $favourite = new Favourite();
        $favourite->user_id = Auth::id();
        $favourite->post_id = $post_id;
        $favourite->save();

        return redirect()->back()->withSuccess('Успешно добавлено в избранное');
    }

    public function show($id)
    {
        return new FavouriteResource(Favourite::findOrFail($id));
    }

    public function edit(Favourite $favourite)
    {
        //
    }

    public function update(Request $request, Favourite $favourite)
    {
        //
    }

    public function destroy($post_id)
    {
        $favourite = Favourite::where('user_id', Auth::id())->where('post_id', $post_id)->firstOrFail();
        $favourite->delete();
        return redirect()->back()->withSuccess('Успешно удалено из избранного');
    }
}
