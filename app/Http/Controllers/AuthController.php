<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAddRequest;
use App\Http\Requests\UserLoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(UserLoginRequest $request)
    {
        $data = $request->validated();

        if(auth("web")->attempt($data)){
            return redirect()->intended(RouteServiceProvider::HOME);
        }
        return redirect(route('login'))->withErrors(["error" => "Проверьте правильность введенных данных."]);
    }

    public function logout()
    {
        auth("web")->logout();
        return redirect(RouteServiceProvider::HOME);
    }

    public function register(UserAddRequest $request)
    {
        $data = $request->validated();
        $data["password"] = Hash::make($request["password"]);
        $data["image"] = $request->image? $request->image->store('public/img/user_img'):'img/user_img/placeholder.jpg';
        $user = User::create($data);
        if($user){
            $user->assignRole('user');
            event(new Registered($user));
            //auth('web')->login($user);
            return redirect(route('login'))->with('success', 'Для завершения регистрации перейдите по ссылке в письме, отправленном на Вашу почту.');
        }
        return redirect(route('register'))->withErrors(["error" => "Ошибка при регистрации."]);
    }
}
