@extends('admin.layout')

@section('title', 'Админ-панель')

@section('main')


    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Главная</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3>{{ $categories_count }}</h3>
                            <p>Категории</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-list"></i>
                        </div>
                        <a href="{{ route('category.index') }}" class="small-box-footer">Все категории</a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3>{{ $cities_count }}</h3>
                            <p>Города</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-city"></i>
                        </div>
                        <a href="{{ route('city.index') }}" class="small-box-footer">Все города</a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3>{{ $educations_count }}</h3>
                            <p>Образования</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <a href="{{ route('education.index') }}" class="small-box-footer">Все образования</a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3>{{ $favourites_count }}</h3>
                            <p>Избранное</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <a href="{{ route('favourite.index') }}" class="small-box-footer">Всё избранное</a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3>{{ $posts_count }}</h3>
                            <p>Публикации</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-newspaper"></i>
                        </div>
                        <a href="{{ route('post.index') }}" class="small-box-footer">Все публикации</a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3>{{ $post_types_count }}</h3>
                            <p>Типы публикаций</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-check-double"></i>
                        </div>
                        <a href="{{ route('post_type.index') }}" class="small-box-footer">Все типы</a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3>{{ $regions_count }}</h3>
                            <p>Регионы</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-map"></i>
                        </div>
                        <a href="{{ route('region.index') }}" class="small-box-footer">Все регионы</a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3>{{ $roles_count }}</h3>
                            <p>Роли</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-unlock"></i>
                        </div>
                        <a href="{{ route('role.index') }}" class="small-box-footer">Все роли</a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3>{{ $users_count }}</h3>
                            <p>Пользователи</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <a href="{{ route('user.index') }}" class="small-box-footer">Все пользователи</a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3>{{ $work_experiences_count }}</h3>
                            <p>Опыты работы</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-chart-line"></i>
                        </div>
                        <a href="{{ route('work_experience.index') }}" class="small-box-footer">Все опыты работы</a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3>{{ $work_schedules_count }}</h3>
                            <p>Графики работы</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <a href="{{ route('work_schedule.index') }}" class="small-box-footer">Все графики работы</a>
                    </div>
                </div>


            </div>

        </div>
        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
