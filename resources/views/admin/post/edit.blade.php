@extends('admin.layout')

@section('title', 'Редактирование публикации')

@section('main')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать публикацию: {{ $post['name'] }}</h1>
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
                        <form action="{{ route('post.update', $post['id']) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Название</label>
                                    <input type="text" value="{{ $post['name'] }}" name="name" class="form-control"
                                           id="name" placeholder="Название" required>
                                </div>

                                @foreach($post_types as $post_type)
                                    <div class="form-check form-check-inline mb-3 me-5">
                                        <input class="form-check-input" type="radio" name="post_type_id" id="post_type_id"
                                               value="{{ $post_type->id }}" required @if ($post['post_type_id'] == $post_type['id']) checked @endif>
                                        <label class="form-check-label" for="post_type_id">{{ $post_type->post_type }}</label>
                                    </div>
                                @endforeach

                                <div class="mb-3" title="Город">
                                    <label for="city_id" class="form-label">Город</label>
                                    <select name="city_id" id="city_id" class="form-select" aria-label="city">
                                        @foreach($regions as $region)
                                            <optgroup label="{{ $region->region }}">
                                                @foreach($cities as $city)
                                                    @if($city->region_id == $region->id)
                                                        <option value="{{ $city->id }}" @if ($post['city_id'] == $city['id']) selected @endif>{{ $city->city }}</option>@endif
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Категория</label>
                                        <select name="category_id" class="form-control" required>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category['id'] }}"
                                                        @if ($post['category_id'] == $category['id']) selected @endif>{{ $category['category'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3" title="Образование">
                                    <label for="education_id" class="form-label">Образование</label>
                                    <select name="education_id" id="education_id" class="form-select" aria-label="education">
                                        @foreach($educations as $education)
                                            <option value="{{ $education->id }}" @if ($post['education_id'] == $education['id']) selected @endif>{{ $education->education }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="number" step="1" min="0" max="9999999" name="salary" id="salary"
                                           class="form-control" placeholder="Зарплата" value="{{ $post['salary'] }}">
                                    <label for="salary">Зарплата</label>
                                </div>

                                <div class="mb-3" title="Опыт работы">
                                    <label for="work_experience_id" class="form-label">Опыт работы</label>
                                    <select name="work_experience_id" id="work_experience_id" class="form-select" aria-label="schedule">
                                        @foreach($work_experiences as $work_experience)
                                            <option value="{{ $work_experience->id }}" @if ($post['work_experience_id'] == $work_experience['id']) selected @endif>{{ $work_experience->work_experience }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <label for="description">Описание</label>
                                <div class="form-floating mb-4">
                                    <textarea class="form-control" name="description" required id="description" maxlength="1500"
                              style="height: 80px">{{ $post['description'] }}</textarea>
                                </div>

                                <div class="mb-3" title="График работы">
                                    <label for="work_schedule_id" class="form-label">График работы</label>
                                    <select name="work_schedule_id" id="work_schedule_id" class="form-select" aria-label="schedule">
                                        @foreach($work_schedules as $work_schedule)
                                            <option value="{{ $work_schedule->id }}" @if ($post['work_schedule_id'] == $work_schedule['id']) selected @endif>{{ $work_schedule->work_schedule }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-floating mb-4">
                                    <input type="text" name="contacts" id="contacts" class="form-control" required maxlength="100"
                                           placeholder="Контакты" value="{{ $post['contacts'] }}">
                                    <label for="contacts">Контакты</label>
                                    <span class="error_phone text-danger small"></span>
                                </div>


                                <div class="mb-3">
                                    <label for="image" class="form-label">Изображение</label>
                                    <input type="file" class="form-control form-control-sm" id="image" name="image">
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
