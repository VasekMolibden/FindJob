@extends('layout')

@section('title')Завершение регистрации@endsection

@section('main')
    <main>
        @include('messages')
        <section class="main-content pt-5 my-5">
            <div class="container w-75 my-5 mx-auto">
                <h3 class="mb-5">Завершение регистрации</h3>
                <p>Для завершения регистрации перейдите по ссылке в письме, отправленном на указанную Вами электронную почту.</p>
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-primary"><i>Отправить ещё раз?</i></button>
                </form>
            </div>
        </section>
    </main>
@endsection
