@extends('layout')

@section('title')Сброс пароля@endsection

@section('main')
    <main>
        <section class="main-content pt-5 my-5">
            <div class="container">
                @include('messages')
                <form class="border border-1 mx-auto w-50 p-5 rounded shadow-sm" action="{{ route('password.update') }}" method="post" name="reset">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <h4 class="mb-4 text-center"><b>Сброс пароля</b></h4>

                    <div class="form-floating mb-3">
                        <input type="email" name="email" id="email" class="form-control" maxlength="60" placeholder="Почта" required value="{{ $email ?? request('email') }}">
                        <label for="email">Почта</label>
                        <div class="invalid_email text-danger small"></div>
                    </div>

                    <div class="form-floating mb-4">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Пароль" maxlength="40" pattern="^[a-zA-Z0-9]{5,}$" autocomplete="off" required onblur="matching_passwords()">
                        <label for="password">Пароль</label>
                        <div class="invalid_password text-danger small"></div>
                    </div>

                    <div class="form-floating mb-4">
                        <input type="password" name="password_confirmation" id="password-confirm" class="form-control" placeholder="Пароль" maxlength="40" pattern="^[a-zA-Z0-9]{5,}$" autocomplete="off" required onblur="matching_passwords()">
                        <label for="password-confirm">Подтвердите пароль</label>
                        <div class="password_mismatch text-danger small"></div>
                    </div>

                    <div class="text-center text-end my-4">
                        <button type="submit" name="submit" class="btn btn-outline-primary valid">Готово</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
@endsection
