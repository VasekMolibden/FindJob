<?php

namespace App\Http\Controllers;

use App\Exceptions\APIException;
use App\Http\Requests\UserAddRequest;
use App\Http\Requests\UserLoginRequest;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function login(UserLoginRequest $request)
    {
        $user = User::where([
            'email' => $request->email,
            'password' => $request->password,
        ])->first();
        if (!$user) {
            throw new APIException(401, 'Authentication failed');
        }

        return response()->json([
            'data' => [
                'user_token' => $user->generateToken(),
            ]
        ])->with('success', 'yspeshno');
    }

    public function logout()
    {
        Auth::user()->logoutToken();
        return [
            'message' => 'logout',
        ];
    }

    public function index()
    {
        return UserResource::collection(User::with('posts')->get());
    }

    public function create()
    {
        //
    }

    public function store(UserAddRequest $request)
    {
        $user = User::create($request->validated());

        return view('/authorization')->with('success', 'yspeshno');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $posts = $user->posts()->paginate(7);

        return view('profile', ['user' => $user, 'posts' => $posts]);
    }

    public function edit(User $user)
    {
        return view('profile_edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->phone = $request->phone;
        //$user->email = $request->email;
        $user->description = $request->description;
        if(isset($request->image)){
            $user->image = $request->image->store('public/img/user_img');
        }
        $user->save();

        return redirect()->route('profile', $user->id)->withSuccess('Профиль успешно обновлен');
    }

    public function destroy(User $user)
    {
        if(!$user->hasRole('admin')) {
            if(!str_contains($user->image, 'img/user_img/placeholder.jpg') && isset($user->image)){
                unlink(base_path().'/'.$user->image);
            }
            $user->delete();
        }

        return redirect(RouteServiceProvider::HOME)->with('success', 'Пользователь удален.');
    }
}
