@extends('admin.layout')

@section('title', 'Избранные публикации')

@section('main')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-1">
                <div class="col-sm-6">
                    <h1 class="m-0">Список избранного</h1>
                    <a type="btn" href="{{ route('favourite.create') }}" class="btn btn-outline-success btn-sm mt-2">
                        Добавить в избранное
                    </a>
                </div><!-- /.col -->
            </div><!-- /.row -->
            @include('messages')
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-hover projects">
                        <thead>
                        <tr>
                            <th style="width: 5%">
                                id
                            </th>
                            <th>
                                Пользователь
                            </th>
                            <th>
                                Публикация
                            </th>
                            <th>
                                ДатаСоздания
                            </th>
                            <th>
                                ДатаИзменения
                            </th>
                            <th style="width: 30%">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($favourites as $favourite)
                            <tr>
                                <td>
                                    {{ $favourite['id'] }}
                                </td>
                                <td>
                                    <a href="{{route('profile', $favourite['user_id'])}}">{{ $favourite['user_id'] }} | {{ $favourite->user->name }}</a>
                                </td>
                                <td>
                                    <a href="{{route('post', $favourite['post_id'])}}">{{ $favourite['post_id'] }} | {{ $favourite->post->name }}</a>
                                </td>
                                <td>
                                    {{ $favourite['created_at']->format('d.m.Y H:i') }}
                                </td>
                                <td>
                                    {{ $favourite['updated_at']->format('d.m.Y H:i') }}
                                </td>

                                <td class="project-actions text-right">
                                    <a class="btn btn-outline-primary btn-sm" href="{{ route('favourite.edit', $favourite['id']) }}" title="Редактировать">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                    <form action="{{ route('favourite.destroy', $favourite['id']) }}" method="POST" style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm delete-btn" title="Удалить">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    {{ $favourites->links('vendor.pagination.bootstrap-4') }}
@endsection
