@extends('layout')

@section('title')Сброс пароля@endsection

@section('main')
    <main>
        <section class="main-content pt-5 my-5">
            <div class="container">
                @include('messages')
                <form class="border border-1 mx-auto w-50 p-5 mt-5 rounded shadow-sm" action="{{ route('password.email') }}" method="post" name="forgot_password">
                    @csrf
                    <h4 class="mb-4 text-center"><b>Сброс пароля</b></h4>
                    <div class="form-floating mb-3">
                        <input type="email" name="email" id="email" class="form-control email" maxlength="60" placeholder="Почта" required value="{{ old('email') }}">
                        <label for="email">Почта</label>
                        <div class="invalid_email text-danger small"></div>
                    </div>
                    <div class="text-center text-end mb-4">
                        <button type="submit" name="submit" class="btn btn-outline-primary">Отправить ссылку для сброса пароля</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
@endsection
