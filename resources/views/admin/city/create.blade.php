@extends('admin.layout')

@section('title', 'Добавление города')

@section('main')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавление города</h1>
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
                        <form action="{{ route('city.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="city">Название</label>
                                    <input type="text" name="city" id="city" class="form-control"
                                           placeholder="Введите название города" required>
                                </div>

                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="region_id">Регион</label>
                                        <select name="region_id" id="region_id" class="form-control" required>
                                            @foreach ($regions as $region)
                                                <option value="{{ $region['id'] }}">
                                                    {{ $region['region'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
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
