@extends('layout')

@section('title')Изменение пароля@endsection

@section('main')
    <main>
        <section class="main-content pt-5 my-5">
            <div class="container">
                @include('messages')
                <form class="border border-1 mx-auto w-50 p-5 rounded shadow-sm" action="{{ route('password.change') }}" method="post" name="change">
                    @csrf
                    <h4 class="mb-4 text-center"><b>Изменение пароля</b></h4>

                    <div class="form-floating mb-5">
                        <input type="password" name="old_password" id="old_password" class="form-control" placeholder="Пароль" maxlength="40" pattern="^[a-zA-Z0-9]{5,}$" autocomplete="off" required>
                        <label for="old_password">Текущий пароль</label>
                        <div class="invalid_password text-danger small"></div>
                    </div>

                    <div class="form-floating mb-4">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Пароль" maxlength="40" pattern="^[a-zA-Z0-9]{5,}$" autocomplete="off" required onblur="matching_passwords()">
                        <label for="password">Новый пароль</label>
                        <div class="invalid_password text-danger small"></div>
                    </div>

                    <div class="form-floating mb-4">
                        <input type="password" name="password_confirmation" id="password-confirm" class="form-control" placeholder="Пароль" maxlength="40" pattern="^[a-zA-Z0-9]{5,}$" autocomplete="off" required onblur="matching_passwords()">
                        <label for="password-confirm">Подтвердите пароль</label>
                        <div class="password_mismatch text-danger small"></div>
                    </div>

                    <div class="text-center text-end my-4">
                        <button type="submit" name="submit" class="btn btn-outline-primary valid">Сохранить</button><br>
                        <a type="btn" href="{{ route('editUser', auth()->user()) }}" class="btn btn-secondary mt-3">Назад</a>
                    </div>
                </form>
            </div>
        </section>
    </main>
@endsection
