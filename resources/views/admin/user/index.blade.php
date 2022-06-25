@extends('admin.layout')

@section('title', 'Пользователи')

@section('main')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-1">
                <div class="col-sm-6">
                    <h1 class="m-0">Список пользователей</h1>
                    <a type="btn" href="{{ route('user.create') }}" class="btn btn-outline-success btn-sm mt-2">Добавить пользователя</a>
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
                                Имя
                            </th>
                            <!--<th>
                                Телефон
                            </th>-->
                            <th>
                                Почта
                            </th>
                            <th>
                                Описание
                            </th>
                            <th>
                                Роль
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
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    {{ $user['id'] }}
                                </td>
                                <td>
                                    <div style="height:20px;overflow:hidden;"> <a href="{{route('profile', $user['id'])}}"> {{ $user['name'] }}</a></div>
                                </td>
                                <!--<td>
                                    <div style="height:20px;overflow:hidden;"> {{ $user['phone'] }}</div>
                                </td>-->
                                <td>
                                    {{ $user['email'] }}
                                </td>
                                <td>
                                    <div style="width:15vw;word-wrap: break-word;height:20px;overflow:hidden;text-overflow: ellipsis;">{{ strip_tags($user['description']) }}</div>
                                </td>
                                <td>
                                    @foreach($user->roles as $role)
                                        {{ $role['name'] }}
                                    @endforeach
                                </td>
                                <td>
                                    {{ $user['created_at']->format('d.m.Y H:i') }}
                                </td>
                                <td>
                                    {{ $user['updated_at']->format('d.m.Y H:i') }}
                                </td>

                                <td class="project-actions text-right" style="width: 100%; display: inline-block;">
                                    <a class="btn btn-outline-primary btn-sm" href="{{ route('user.edit', $user['id']) }}" title="Редактировать">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                    @if(!$user->hasRole('admin'))
                                        <form action="{{ route('user.destroy', $user['id']) }}" method="POST"
                                              style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm delete-btn" title="Удалить">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form>
                                    @endif
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
    {{ $users->links('vendor.pagination.bootstrap-4') }}
@endsection
