@extends('admin.layout')

@section('title', 'Редактирование города')

@section('main')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование города: {{ $city['city'] }}</h1>
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
                        <form action="{{ route('city.update', $city['id']) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="city">Название</label>
                                    <input type="text" value="{{ $city['city'] }}" name="city" class="form-control"
                                        id="city" placeholder="Введите название города" required>
                                </div>

                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Регион</label>
                                        <select name="region_id" class="form-control" required>
                                            @foreach ($regions as $region)
                                                <option value="{{ $region['id'] }}" @if ($city['region_id'] == $region['id']) selected @endif>
                                                    {{ $region['region'] }}
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
