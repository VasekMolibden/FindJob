@extends('layout')

@section('title')Авторизация@endsection

@section('main')
<main class="py-4">
    <div class="container">

        @include('messages')

        <form class="border border-1 mx-auto w-50 p-5 mt-5 rounded shadow-sm" action="{{ route('authorization') }}" method="post" name="form_auth">
            @csrf
            <h4 class="mb-4 text-center"><b>Вход</b></h4>
            <div class="form-floating mb-3">
                <input type="email" name="email" id="email" class="form-control email" maxlength="60" placeholder="Почта" required>
                <label for="email">Почта</label>
                <div class="invalid_email text-danger small"></div>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="password" id="password" class="form-control password" maxlength="40" placeholder="Пароль" required>
                <label for="password">Пароль</label>
                <div class="invalid_password text-danger small"></div>
            </div>
            <div class="row mb-4">
                <div class="text-center">
                    <a class="link-dark forgot_password" href="/password">Забыли пароль?</a>
                </div>
            </div>
            <div class="text-center text-end mb-4">
                <button type="submit" name="submit" class="btn btn-outline-primary btn-lg">Войти</button>
            </div>

            <div class="text-center">
                <p class="small mb-0"><a class="link-primary" href="{{ route('register') }}">Зарегистрироваться</a></p>
            </div>
        </form>
    </div>
</main>

@endsection
