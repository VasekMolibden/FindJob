@extends('admin.layout')

@section('title', 'Графики работы')

@section('main')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-1">
                <div class="col-sm-6">
                    <h1 class="m-0">Список графиков работы</h1>
                    <a type="btn" href="{{ route('work_schedule.create') }}" class="btn btn-outline-success btn-sm mt-2">
                        Добавить график
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
                                График
                            </th>
                            <th style="width: 30%">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($work_schedules as $work_schedule)
                            <tr>
                                <td>
                                    {{ $work_schedule['id'] }}
                                </td>
                                <td>
                                    {{ $work_schedule['work_schedule'] }}
                                </td>

                                <td class="project-actions text-right">
                                    <a class="btn btn-outline-primary btn-sm" href="{{ route('work_schedule.edit', $work_schedule['id']) }}" title="Редактировать">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                    <form action="{{ route('work_schedule.destroy', $work_schedule['id']) }}" method="POST" style="display: inline-block">
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
    {{ $work_schedules->links('vendor.pagination.bootstrap-4') }}
@endsection
