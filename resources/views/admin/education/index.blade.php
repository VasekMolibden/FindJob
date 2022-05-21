@extends('admin.layout')

@section('title', 'Образования')

@section('main')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-1">
                <div class="col-sm-6">
                    <h1 class="m-0">Список образований</h1>
                    <a type="btn" href="{{ route('education.create') }}" class="btn btn-outline-success btn-sm mt-2">
                        Добавить образование
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
                                Образование
                            </th>
                            <th style="width: 30%">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($educations as $education)
                            <tr>
                                <td>
                                    {{ $education['id'] }}
                                </td>
                                <td>
                                    {{ $education['education'] }}
                                </td>

                                <td class="project-actions text-right">
                                    <a class="btn btn-outline-primary btn-sm" href="{{ route('education.edit', $education['id']) }}" title="Редактировать">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                    <form action="{{ route('education.destroy', $education['id']) }}" method="POST" style="display: inline-block">
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
    {{ $educations->links('vendor.pagination.bootstrap-4') }}
@endsection
