@extends('layout')

@section('title')Регистрация@endsection

@section('main')
<!--<script src="scripts.js"></script>-->
<main class="py-4 mt-5">
    <div class="container">

        @include('messages')

        <form class="border border-1 mx-auto p-5 rounded shadow-sm" action="{{ route('registration') }}" method="post" enctype="multipart/form-data" name="register" style="width: 60%">
            @csrf
            <h4 class="mb-4 text-center"><b>Регистрация</b></h4>

            <div class="form-floating mb-3">
                <input type="text" name="name" id="name" class="form-control" maxlength="20" placeholder="Имя" pattern="^[a-zA-Z0-9]{3,20}$" required value="{{ old('name') }}">
                <label for="name">Имя</label>
                <div class="invalid_name text-danger small"></div>
            </div>

            <div class="form-floating mb-3">
                <input type="email" name="email" id="email" class="form-control" maxlength="60" placeholder="Почта" required value="{{ old('email') }}">
                <label for="email">Почта</label>
                <div class="invalid_email text-danger small"></div>
            </div>

            <!--<div class="form-floating mb-3">
                <input type="text" name="phone" id="phone" class="form-control" placeholder="Телефон" maxlength="11" pattern="^[0-9]{11}$" required value="{{ old('phone') }}">
                <label for="phone">Телефон</label>
                <div class="invalid_phone text-danger small"></div>
            </div>-->

            <label for="description">О себе</label>
            <div class="form-floating mb-4">
                <textarea class="form-control" name="description" id="description" placeholder="(необязательно)" maxlength="512" style="height: 80px;">
                    {{ old('description') }}
                </textarea>

                {{-- <div id="descriptionHelpBlock" class="form-text">
                  Необязательно для заполнения
                </div>--}}
            </div>

            <div class="mb-4">
                <label for="image" class="form-label">Изображение</label>
                <input class="form-control form-control-sm" name="image" id="image" type="file">
            </div>

            <div class="form-floating mb-4">
                <input type="password" name="password" id="password" class="form-control" placeholder="Пароль" maxlength="40" pattern="^[a-zA-Z0-9]{5,}$" autocomplete="off" required onblur="matching_passwords()">
                <label for="password">Пароль</label>
                <div class="invalid_password text-danger small"></div>
            </div>

            <div class="form-floating mb-4">
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Пароль" maxlength="40" pattern="^[a-zA-Z0-9]{5,}$" autocomplete="off" required onblur="matching_passwords()">
                <label for="password_confirmation">Подтвердите пароль</label>
                <div class="password_mismatch text-danger small"></div>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="" id="user_agreement" required>
                <label class="form-check-label" for="user_agreement">
                    Я принимаю условия <a href="{{ route('user_agreement') }}"><i>пользовательского соглашения</i></a>
                </label>
            </div>

            <div class="text-center text-end my-4">
                <button type="submit" name="submit" class="btn btn-outline-primary btn-lg valid">Готово</button>
            </div>
            <div class="text-center">
                <p class="small mb-0">Уже зарегистрированы? <a class="link-primary" href="{{ route('login') }}">Войти</a></p>
            </div>
        </form>
    </div>
</main>
@endsection
