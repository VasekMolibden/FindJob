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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

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

        return view('authorization')->with('success', 'yspeshno');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $posts = $user->posts()->paginate(7);

        return view('profile', ['user' => $user, 'posts' => $posts]);
    }

    public function edit(User $user)
    {
        $roles = Role::orderBy('name')->get();

        return view('profile_edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        if(\auth()->user()->can('edit all profiles')) {
            $request->validate([
                'role_id' => 'required|integer|exists:roles,id',
            ]);
        }

        $user->name = $request->name;
        //$user->phone = $request->phone;
        //$user->email = $request->email;
        $user->description = $request->description;
        if (isset($request->image)) {
            $user->image = $request->image->store('public/img/user_img');
        }
        if (!$user->hasRole('admin') && auth()->user()->id != $user->id){
            $role = Role::findOrFail($request->role_id);
            $user->syncRoles([$role->name]);
        }

        $user->save();

        return redirect()->route('profile', $user->id)->withSuccess('Профиль успешно обновлен');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required|min:5',
            'password' => 'required|min:5|confirmed',
        ]);

        $user = User::findOrFail(\auth()->user()->id);

        if(Hash::check(request('old_password'), $user->password)){
            $user->password = Hash::make($request["password"]);
            $user->save();
            return redirect()->route('editUser', $user)->withSuccess('Пароль успешно изменен');
        };

        return back()->withErrors('Неверный пароль');
    }

    public function destroy(User $user)
    {
        if(!$user->hasRole('admin')) {
            if(!str_contains($user->image, 'img/user_img/placeholder.jpg') && isset($user->image)){
                unlink(base_path().'/'.$user->image);
            }
            $user->delete();
            return redirect(RouteServiceProvider::HOME)->with('success', 'Пользователь успешно удален');
        }
        return redirect()->back();
    }
}
