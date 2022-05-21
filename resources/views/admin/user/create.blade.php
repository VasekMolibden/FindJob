@extends('admin.layout')

@section('title', 'Добавление пользователя')

@section('main')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавление пользователя</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            @include('messages')
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <!-- form start -->
                        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Имя</label>
                                    <input type="text" name="name" class="form-control"
                                           id="name" placeholder="Введите имя пользователя" maxlength="20" required>
                                </div>

                                <div class="form-group">
                                    <label for="phone">Телефон</label>
                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Введите телефон" maxlength="11" pattern="^[0-9]{11}$" required>
                                </div>

                                <div class="form-group">
                                    <label for="email">Почта</label>
                                    <input type="email" name="email" id="email" class="form-control" maxlength="60" placeholder="Введите почту" required>
                                </div>

                                <label for="description">О себе</label>
                                <div class="form-floating mb-4">
                                    <textarea class="form-control" name="description" id="description" maxlength="1024"
                                              style="height: 80px"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label">Изображение</label>
                                    <input type="file" class="form-control form-control-sm" id="image" name="image">
                                </div>

                                <div class="mb-3" title="Роль">
                                    <label for="role_id" class="form-label">Роль</label>
                                    <select name="role_id" id="role_id" class="form-select" aria-label="role">
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}" @if($role->id == 1) selected @endif>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="password">Пароль</label>
                                    <input type="password" name="password" id="password" class="form-control" maxlength="40" placeholder="Введите пароль" pattern="^[a-zA-Z0-9]{5,}$" required>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Добавить</button>
                                <a type="btn" href="{{ URL::previous() }}" class="btn btn-secondary">Назад</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
