@extends('layout')

@section('title')Поиск@endsection

@section('main')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/i18n/ru.js"></script>

    <main class="search_view">
        <div class="container">
            <div class="form mt-5">
                <form class="border border-1 mx-auto mt-4 p-5 bg-light" action="{{ route('search') }}" method="get" name="search">
                    <h4 class="mb-4 text-center">Расширенный поиск</h4>

                    <div class="form-floating mb-4">
                        <input type="text" name="text" id="text" class="form-control" maxlength="40" placeholder="Поиск"
                               value="{{request()->text}}">
                        <label for="text">Поиск</label>
                    </div>

                    @foreach($post_types as $post_type)
                        <div class="form-check form-check-inline mb-1 me-4">
                            <input class="form-check-input" type="radio" name="post_type_id" id="post_type_id"
                                   value="{{ $post_type->id }}" @if(request()->post_type_id == $post_type->id))
                                   checked @endif>
                            <label class="form-check-label" for="post_type_id">{{ $post_type->post_type }}</label>
                        </div>
                    @endforeach

                    <div class="my-3">
                        <label for="salary_from">Зарплата</label>
                        <input type="number" step="1" min="0" max="9999999" name="salary_from" id="salary_from"
                               class="form-control" placeholder="от" value="{{ request()->salary_from }}">

                        <label for="salary_to"></label>
                        <input type="number" step="1" min="0" max="9999999" name="salary_to" id="salary_to"
                               class="form-control" placeholder="до" value="{{ request()->salary_to }}">
                    </div>

                    <div class="mb-3" title="Город">
                        <label for="city_id[]" class="form-label">Город</label>
                        <select name="city_id[]" id="city_id[]" class="form-select form-control select2 select2-hidden-accessible" multiple="multiple" data-placeholder="Выберите город" style="width: 100%;" aria-hidden="true" aria-label="city">
                            @foreach($regions as $region)
                                <optgroup label="{{ $region->region }}">
                                    @foreach($cities as $city)
                                        @if($city->region_id == $region->id)
                                            <option value="{{ $city->id }}"
                                                @if(request()->city_id)
                                                    @if(in_array($city->id, request()->city_id)) selected @endif
                                                @endif>
                                                {{ $city->city }}
                                            </option>
                                        @endif
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3" title="Категория">
                        <label for="category_id[]" class="form-label">Категория</label>
                        <select name="category_id[]" id="category_id[]" class="form-select form-control select2 select2-hidden-accessible" multiple="multiple" data-placeholder="Выберите категорию" style="width: 100%;" aria-hidden="true" aria-label="category">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    @if(request()->category_id)
                                        @if(in_array($category->id, request()->category_id)) selected @endif
                                    @endif>
                                    {{ $category->category }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3" title="Образование">
                        <label for="education_id[]" class="form-label">Образование</label>
                        <select name="education_id[]" id="education_id[]" class="form-select form-control select2 select2-hidden-accessible" multiple="multiple" data-placeholder="Выберите образование" style="width: 100%;" aria-hidden="true" aria-label="education">
                            @foreach($educations as $education)
                                <option value="{{ $education->id }}"
                                    @if(request()->education_id)
                                        @if(in_array($education->id, request()->education_id)) selected @endif
                                    @endif>
                                    {{ $education->education }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3" title="Опыт работы">
                        <label for="work_experience_id[]" class="form-label">Опыт работы</label>
                        <select name="work_experience_id[]" id="work_experience_id[]" class="form-select form-control select2 select2-hidden-accessible" multiple="multiple" data-placeholder="Выберите опыт" style="width: 100%;" aria-hidden="true" aria-label="experience">
                            @foreach($work_experiences as $work_experience)
                                <option value="{{ $work_experience->id }}"
                                        @if(request()->work_experience_id)
                                        @if(in_array($work_experience->id, request()->work_experience_id)) selected @endif
                                    @endif>
                                    {{ $work_experience->work_experience }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3" title="График работы">
                        <label for="work_schedule_id[]" class="form-label">График работы</label>
                        <select name="work_schedule_id[]" id="work_schedule_id[]" class="form-select form-control select2 select2-hidden-accessible" multiple="multiple" data-placeholder="Выберите график" style="width: 100%;" aria-hidden="true" aria-label="schedule">
                            @foreach($work_schedules as $work_schedule)
                                <option value="{{ $work_schedule->id }}"
                                    @if(request()->work_schedule_id)
                                        @if(in_array($work_schedule->id, request()->work_schedule_id)) selected @endif
                                    @endif>
                                    {{ $work_schedule->work_schedule }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="text-center text-end">
                        <button type="submit" class="btn btn-outline-primary btn-lg mb-4" title="Поиск">Найти</button>
                        <br>
                        <a href="{{ route('search') }}" type="button" class="btn btn-secondary"
                           title="Сброс полей">Сбросить</a>
                    </div>
                </form>
            </div>
            <div class="posts mx-5">
                <section class="main-content pt-5 mt-3">
                    <div class="">
                        @include('messages')

                        @if(count($posts))
                            <h3>Найденные публикации <span class="badge bg-secondary">{{ $posts->total() }}</span></h3>

                            @foreach($posts as $post)
                                <div class="card shadow my-3" >
                                    <a href="{{ route('post', $post->id) }}" title="{{ $post->name }}" class="">
                                        <img src="{{ asset($post->image) }}"
                                             class="img-post mx-auto my-auto rounded p-2" alt="post">
                                    </a>
                                    <div class="card-body">
                                        <div class="row justify-content-between">
                                            <div class="col-8">
                                                <a href="{{ route('post', $post->id) }}" title="{{ $post->name }}"
                                                   class=""><h4>{{ $post->name }} </h4></a>
                                            </div>
                                            <div class="col-3 mx-2">
                                                @if($post->salary == 0 || $post->salary == NULL)<h4
                                                    style="float: right;">Не указано</h4>
                                                @else<h4 style="float: right;"><span
                                                        class="salary">{{ $post->salary }}</span></h4>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-11 post-overflow">
                                                <p class="text-left my-auto" style="width: 45em">{{ strip_tags($post->description) }}</p>
                                            </div>
                                        </div>

                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-7">
                                                <span class="date">{{ $post->created_at->format('d.m.Y H:i') }} &#8226; {{ $post->category->category }} &#8226; {{ $post->city->city }}</span>
                                            </div>
                                            <div class="col-4 mx-2">
                                                <a href="{{ route('profile', $post->user->id) }}"
                                                   title="{{ $post->user->name }}" class="" style="float: right;"><img
                                                        src="{{ asset($post->user->image) }}"
                                                        class="img-author mx-auto my-auto p-2" alt="profile">
                                                    <span class="author"
                                                          style="float: right; margin-top:9px;">{{ $post->user->name }}</span>
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach

                        @else
                            <h2 class="text-muted text-center">Ничего не найдено</h2>
                        @endif
                    </div>
                </section>
                {{ $posts->withQueryString()->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </main>

    <script>
        $(document).ready(function() {
            $('.select2').select2({
                maximumSelectionLength: 5,
                language: "ru"
            });
        });
    </script>
@endsection
