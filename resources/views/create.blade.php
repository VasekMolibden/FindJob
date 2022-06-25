@extends('layout')

@section('title')Создание@endsection

@section('main')
    <main class="pt-4">
        <div class="container mb-5 mt-5">

            @include('messages')

            <form class="border border-1 mx-auto p-5" action="{{ route('addPost') }}" method="post"
                  enctype="multipart/form-data" name="create" style="width: 60%">
                @csrf
                <h4 class="mb-4 text-center"><b>Создание</b></h4>

                @foreach($post_types as $post_type)
                    <div class="form-check form-check-inline mb-3 me-5">
                        <input class="form-check-input" type="radio" name="post_type_id" id="post_type_id"
                               value="{{ $post_type->id }}" required @if(old('post_type_id') == $post_type->id)
                               checked @endif>
                        <label class="form-check-label" for="post_type_id">{{ $post_type->post_type }}</label>
                    </div>
                @endforeach

                <div class="form-floating mb-3">
                    <input type="text" name="name" id="name" class="form-control" maxlength="40" placeholder="Название"
                           required value="{{ old('name') }}">
                    <label for="name">Название</label>
                </div>

                <div class="mb-3" title="Город">
                    <label for="city_id" class="form-label">Город</label>
                    <select name="city_id" id="city_id" class="form-select" aria-label="city">
                        @foreach($regions as $region)
                            <optgroup label="{{ $region->region }}">
                                @foreach($cities as $city)
                                    @if($city->region_id == $region->id)
                                        <option value="{{ $city->id }}" @if(old('city_id') == $city->id) selected @elseif(session('city.id') == $city->id) selected @endif>
                                            {{ $city->city }}
                                        </option>@endif
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3" title="Категория">
                    <label for="category_id" class="form-label">Категория</label>
                    <select name="category_id" id="category_id" class="form-select" aria-label="category">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" @if(old('category_id') == $category->id) selected @endif>{{ $category->category }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3" title="Образование">
                    <label for="education_id" class="form-label">Образование</label>
                    <select name="education_id" id="education_id" class="form-select" aria-label="education">
                        @foreach($educations as $education)
                            <option value="{{ $education->id }}" @if(old('education_id') == $education->id) selected @endif>
                                {{ $education->education }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-floating mb-3">
                    <input type="number" step="1" min="0" max="9999999" name="salary" id="salary"
                           class="form-control" placeholder="Зарплата" value="{{ old('salary') }}">
                    <label for="salary">Зарплата</label>
                </div>

                <div class="mb-3" title="Опыт работы">
                    <label for="work_experience_id" class="form-label">Опыт работы</label>
                    <select name="work_experience_id" id="work_experience_id" class="form-select" aria-label="experience">
                        @foreach($work_experiences as $work_experience)
                            <option value="{{ $work_experience->id }}" @if(old('work_experience_id') == $work_experience->id) selected @endif>
                                {{ $work_experience->work_experience }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <label for="description">Описание</label>
                <div class="form-floating mb-4">
                    <textarea class="form-control" name="description" id="description" maxlength="1500"
                              style="height: 80px">{{ old('description') }}</textarea>
                </div>

                <div class="mb-3" title="График работы">
                    <label for="work_schedule_id" class="form-label">График работы</label>
                    <select name="work_schedule_id" id="work_schedule_id" class="form-select" aria-label="schedule">
                        @foreach($work_schedules as $work_schedule)
                            <option value="{{ $work_schedule->id }}" @if(old('work_schedule_id') == $work_schedule->id) selected @endif>
                                {{ $work_schedule->work_schedule }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-floating mb-4">
                    <input type="text" name="contacts" id="contacts" class="form-control" required maxlength="100"
                           placeholder="Контакты" value="@if(old('contacts')) {{ old('contacts') }} @else Почта: {{ \Illuminate\Support\Facades\Auth::user()->email }} @endif">
                    <label for="contacts">Контакты</label>
                    <span class="error_phone text-danger small"></span>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Изображение</label>
                    <input type="file" class="form-control form-control-sm" id="image" name="image">
                </div>

                <div class="text-center text-end mb-5">
                    <button type="submit" name="submit" class="btn btn-outline-primary btn-lg">Готово</button>
                </div>
            </form>
        </div>
    </main>

@endsection
