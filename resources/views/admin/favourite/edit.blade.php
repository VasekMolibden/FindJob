@extends('admin.layout')

@section('title', 'Редактирование избранного')

@section('main')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование избранного</h1>
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
                        <form action="{{ route('favourite.update', $favourite['id']) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="user_id">Пользователь</label>
                                        <select name="user_id" id="user_id" class="form-control" required>
                                            @foreach ($users as $user)
                                                <option value="{{ $user['id'] }}" @if ($favourite['user_id'] == $user['id']) selected @endif>
                                                    {{ $user['id'] }} | {{ $user->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="post_id">Публикация</label>
                                        <select name="post_id" id="post_id" class="form-control" required>
                                            @foreach ($posts as $post)
                                                <option value="{{ $post['id'] }}" @if ($favourite['post_id'] == $post['id']) selected @endif>
                                                    {{ $post['id'] }} | {{ $post->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
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
