@extends('layout')

@section('title')Редактирование профиля@endsection

@section('main')
    <main class="pt-4 mb-5">
        <div class="container mb-5 mt-5">

            @include('messages')

            <form class="border border-1 mx-auto p-5" action="{{ route('updateUser', $user) }}" method="post"
                  enctype="multipart/form-data" name="create" style="width: 60%">
                @csrf
                @method('PUT')
                <h4 class="mb-4 text-center"><b>Редактирование</b></h4>

                <div class="form-floating mb-3">
                    <input type="text" name="name" id="name" class="form-control" maxlength="20" placeholder="Имя" pattern="^[a-zA-Z0-9]{3,20}$"
                           required value="{{ $user->name }}">
                    <label for="name">Имя</label>
                </div>

                <!--<div class="form-floating mb-3">
                    <input type="text" name="phone" id="phone" class="form-control" maxlength="11" pattern="^[0-9]{11}$" placeholder="Телефон"
                           required value="{{ $user->phone }}">
                    <label for="phone">Телефон</label>
                </div>-->

                <div class="form-floating mb-3">
                    <input type="text" name="email" id="email" class="form-control" maxlength="60" placeholder="Почта" disabled
                           required value="{{ $user->email }}">
                    <label for="email">Почта</label>
                </div>

                <label for="description">Описание</label>
                <div class="form-floating mb-4">
                    <textarea class="form-control" name="description" id="description" placeholder="(необязательно)" maxlength="512"
                              style="height: 80px">{{ $user->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Изображение</label>
                    <input type="file" class="form-control form-control-sm" id="image" name="image">
                </div>

                @if(!$user->hasRole('admin') && auth()->user()->id != $user->id)
                    <div class="mb-3" title="Роль">
                        <label for="role_id" class="form-label">Роль</label>
                        <select name="role_id" id="role_id" class="form-select" aria-label="role">
                            @foreach($roles as $role)
                                @if($role->name != 'admin')
                                    <option value="{{ $role->id }}" @if($user->hasRole($role['name'])) selected @endif>{{ $role->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                @endif

                <div class="text-center text-end mb-5">
                    @if(auth()->user()->id == $user->id)
                        <a type="btn" href="{{ route('password.edit') }}" class="btn btn-outline-primary">Сменить пароль</a>
                    @endif
                </div>

                <div class="text-center text-end mb-3">
                    <button type="submit" name="submit" class="btn btn-outline-primary btn-lg">Сохранить</button><br>
                    <a type="btn" href="{{ route('profile', $user->id) }}" class="btn btn-secondary mt-3">Назад</a>
                </div>
            </form>
        </div>
    </main>

@endsection
