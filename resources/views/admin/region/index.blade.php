@extends('admin.layout')

@section('title', 'Регионы')

@section('main')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-1">
                <div class="col-sm-6">
                    <h1 class="m-0">Список регионов</h1>
                    <a type="btn" href="{{ route('region.create') }}" class="btn btn-outline-success btn-sm mt-2">
                        Добавить регион
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
                                Регион
                            </th>
                            <th style="width: 30%">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($regions as $region)
                            <tr>
                                <td>
                                    {{ $region['id'] }}
                                </td>
                                <td>
                                    {{ $region['region'] }}
                                </td>

                                <td class="project-actions text-right">
                                    <a class="btn btn-outline-primary btn-sm" href="{{ route('region.edit', $region['id']) }}" title="Редактировать">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                    <form action="{{ route('region.destroy', $region['id']) }}" method="POST" style="display: inline-block">
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
    {{ $regions->links('vendor.pagination.bootstrap-4') }}
@endsection
