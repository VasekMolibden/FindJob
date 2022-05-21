@extends('admin.layout')

@section('title', 'Города')

@section('main')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-1">
                <div class="col-sm-6">
                    <h1 class="m-0">Список городов</h1>
                    <a type="btn" href="{{ route('city.create') }}" class="btn btn-outline-success btn-sm mt-2">
                        Добавить город
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
                                Город
                            </th>
                            <th>
                                Регион
                            </th>
                            <th style="width: 30%">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($cities as $city)
                            <tr>
                                <td>
                                    {{ $city['id'] }}
                                </td>
                                <td>
                                    {{ $city['city'] }}
                                </td>
                                <td>
                                    {{ $city->region->region }}
                                </td>

                                <td class="project-actions text-right">
                                    <a class="btn btn-outline-primary btn-sm" href="{{ route('city.edit', $city['id']) }}" title="Редактировать">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                    <form action="{{ route('city.destroy', $city['id']) }}" method="POST" style="display: inline-block">
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
    {{ $cities->links('vendor.pagination.bootstrap-4') }}
@endsection
