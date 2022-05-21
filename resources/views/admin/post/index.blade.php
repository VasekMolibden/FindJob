@extends('admin.layout')

@section('title', 'Публикации')

@section('main')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-1">
                <div class="col-sm-6">
                    <h1 class="m-0">Список публикаций</h1>
                    <a type="btn" href="{{ route('post.create') }}" class="btn btn-outline-success btn-sm mt-2">Добавить публикацию</a>
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
                <div class="card-body p-0 table-responsive">
                    <table class="table table-hover projects table-sm">
                        <thead>
                        <tr>
                            <th style="width: 5%">
                                id
                            </th>
                            <th>
                                Название
                            </th>
                            <th>
                                Описание
                            </th>
                            <th>
                                Тип
                            </th>
                            <th>
                                Категория
                            </th>
                            <th>
                                Образование
                            </th>
                            <th>
                                Зарплата
                            </th>
                            <th>
                                ОпытРаботы
                            </th>
                            <th>
                                ГрафикРаботы
                            </th>
                            <th>
                                Контакты
                            </th>
                            <th>
                                Город
                            </th>
                            <th>
                                Создатель
                            </th>
                            <th>
                                ДатаСоздания
                            </th>
                            <th>
                                ДатаИзменения
                            </th>
                            <th>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>
                                    {{ $post['id'] }}
                                </td>
                                <td>
                                    <div style="width:15vw;word-wrap: break-word;height:20px;overflow:hidden;"> <a href="{{route('post', $post['id'])}}"> {{ $post['name'] }}</a></div>
                                </td>
                                <td>
                                    <div style="width:15vw;word-wrap:break-word;height:20px;overflow:hidden;text-overflow: ellipsis;">{{ strip_tags($post['description']) }}</div>
                                </td>
                                <td>
                                    {{ $post->post_type['post_type'] }}
                                </td>
                                <td>
                                    <div style="height:20px;overflow:hidden;">{{ $post->category['category'] }}</div>
                                </td>
                                <td>
                                    {{ $post->education['education'] }}
                                </td>
                                <td>
                                    {{ $post['salary'] }}
                                </td>
                                <td>
                                    <div style="height:20px;overflow:hidden;">{{ $post->work_experience['work_experience'] }}</div>
                                </td>
                                <td>
                                    {{ $post->work_schedule['work_schedule'] }}
                                </td>
                                <td>
                                    <div style="height:20px;overflow:hidden;">{{ $post['contacts'] }}</div>
                                </td>
                                <td>
                                    <div style="height:20px;overflow:hidden;">{{ $post->city->city }} ({{ $post->city->region->region }})</div>
                                </td>
                                <td>
                                    <a href="{{route('profile', $post->user['id'])}}">{{ $post->user['name'] }}</a>
                                </td>
                                <td>
                                    {{ $post['created_at']->format('d.m.Y H:i') }}
                                </td>
                                <td>
                                    {{ $post['updated_at']->format('d.m.Y H:i') }}
                                </td>

                                <td class="project-actions text-right" style="width: 170%; display: inline-block;">
                                    <a class="btn btn-outline-primary btn-sm" href="{{ route('post.edit', $post['id']) }}" title="Редактировать">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                    <form action="{{ route('post.destroy', $post['id']) }}" method="POST"
                                          style="display: inline-block">
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
    {{ $posts->links('vendor.pagination.bootstrap-4') }}
@endsection
