<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id')->paginate(12);

        return view('admin.user.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::orderBy('name')->get();

        return view('admin.user.create', [
            'roles' => $roles,
        ]);
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
            'role_id' => 'required|integer|exists:roles,id',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->description = $request->description;
        if(isset($request->image)){
            $user->image = $request->image->store('public/img/user_img');
        }
        $user->password = Hash::make($request["password"]);

        $role = Role::findOrFail($request->role_id);
        $user->assignRole($role);

        $user->save();

        return redirect()->route('user.index')->withSuccess('Пользователь успешно добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::orderBy('name')->get();

        return view('admin.user.edit', [
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'role_id' => 'required|integer|exists:roles,id',
        ]);

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        if(isset($request->image)){
            $user->image = $request->image->store('public/img/user_img');
        }
        $user->description = $request->description;

        $role = Role::findOrFail($request->role_id);
        $user->syncRoles([$role->name]);

        $user->save();

        return redirect()->route('user.index')->withSuccess('Пользователь успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(!$user->hasRole('admin')) {
            if(!str_contains($user->image, 'img/user_img/placeholder.jpg') && isset($user->image)){
                unlink(base_path().'/'.$user->image);
            }
            $user->delete();
        }
        return redirect()->back()->withSuccess('Пользователь успешно удален');
    }
}
