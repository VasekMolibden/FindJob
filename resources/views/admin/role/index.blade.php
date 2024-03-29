@extends('admin.layout')

@section('title', 'Роли')

@section('main')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-1">
                <div class="col-sm-6">
                    <h1 class="m-0">Список ролей</h1>
                    <a type="btn" href="{{ route('role.create') }}" class="btn btn-outline-success btn-sm mt-2">
                        Добавить роль
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
                                Название
                            </th>
                            <th style="width: 30%">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>
                                    {{ $role['id'] }}
                                </td>
                                <td>
                                    {{ $role['name'] }}
                                </td>

                                <td class="project-actions text-right">
                                    @if($role['name'] != 'admin')
                                        <a class="btn btn-outline-primary btn-sm" href="{{ route('role.edit', $role['id']) }}" title="Редактировать">
                                            <i class="fa-solid fa-pencil"></i>
                                        </a>
                                    @endif

                                    @if($role['name'] != 'admin' && $role['name'] != 'user')
                                        <form action="{{ route('role.destroy', $role['id']) }}" method="POST" style="display: inline-block">
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
    {{ $roles->links('vendor.pagination.bootstrap-4') }}
@endsection
