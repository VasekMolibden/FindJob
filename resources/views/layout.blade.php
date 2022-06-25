<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script src="{{ asset('/admin/admin.js') }}"></script>

    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

    <script src="{{ asset('scripts.js') }}"></script>

    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" />

    <title>@yield('title') - FindJob</title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg fixed-top shadow-sm border-bottom border-2">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('index') }}" title="Главная страница"><img src="{{ asset('img/logo.png') }}" width="40px" height="40px" alt="logo">
                FindJob
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <form method="post" name="setCity" action="{{ route('setCity') }}">
                                @csrf
                                <a class="nav-link dropdown-toggle text-primary" href="" data-bs-toggle="dropdown">@if(session()->has('city')) {{ session('city.city') }}@else Город @endif</a>
                                <ul class="dropdown-menu m-2" aria-labelledby="navbarDropdown">
                                    <li>
                                        <select name="city_id" id="city_id" class="form-select" aria-label="city">
                                            @foreach($regions as $region)
                                                <optgroup label="{{ $region->region }}">
                                                    @foreach($cities as $city)
                                                        @if($city->region_id == $region->id)
                                                            <option value="{{ $city->id }}" @if(session('city.id') == $city->id) selected @endif>
                                                                {{ $city->city }}
                                                            </option>@endif
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        </select>
                                    </li>
                                    <div class="text-center text-end mt-2">
                                        <button type="submit" name="submit" class="btn btn-outline-primary btn-sm">Сохранить</button>
                                    </div>
                                </ul>
                            </form>
                        </li>
                    </ul>
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="{{ url('/search?post_type_id=1') }}">Вакансии</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="{{ url('/search?post_type_id=2') }}">Резюме</a>
                    </li>
                    @role('admin')
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="{{ route('indexAdmin') }}">Админ-панель</a>
                    </li>
                    @endrole
                </ul>

                <form action="{{ route('search') }}" method="get" name="search" class="mx-auto">
                    <div class="search input-group">
                        <input type="text" class="form-control" id="text" name="text" placeholder="Поиск" maxlength="50" aria-label="Поиск" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary" title="Поиск"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>

                @auth
                    {{--<a class="nav-link" href="{{ route('favourites') }}" title="Избранное"><i class="far fa-heart"></i></a>--}}
                    @if (auth()->user()->can('create', 'App\Models\Post'))
                        <a class="btn btn-outline-primary mx-auto" title="Создать публикацию" href="{{ route('create') }}" role="button">Создать публикацию</a>
                    @endif

                    {{-- <div class="col-md-3 text-end">
                        <a class="btn btn-outline-primary mx-2" title="Профиль" href="{{ route('profile', auth()->id()) }}" role="button">Профиль</a>
                        <a  class="btn btn-primary mx-2" title="Выйти" href="{{ route('exit') }}" role="button">Выход</a>
                    </div>--}}

                    <div class="dropdown mx-5">
                        <a href="#" data-bs-toggle="dropdown" class="dropdown-toggle user text-primary" id="dropdownMenuButton1" aria-expanded="false"><img src="{{ asset(auth()->user()->image) }}" class="avatar mx-auto my-auto rounded p-2" alt="avatar"> {{ auth()->user()->name }} </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                            <li><a href="{{ route('profile', auth()->id()) }}" class="dropdown-item"><i class="fas fa-user"></i> Мой профиль</a></li>
                            <li><a href="{{ route('favourites') }}" class="dropdown-item"><i class="fa fa-heart"></i> Избранное</a></li>
                            <li><a href="{{ route('editUser', auth()->user()) }}" class="dropdown-item"><i class="fa-solid fa-pencil"></i> Редактирование</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a href="{{ route('exit') }}" class="dropdown-item"><i class="fa-solid fa-arrow-right-from-bracket"></i> Выход</a></li>
                        </ul>
                    </div>

                    <style>
                        .dropdown .avatar{
                            height: 45px;
                            width: 45px;
                            border-radius: 50%!important;
                            object-fit: cover;
                        }

                        header .user{

                        }

                        ul li i {
                            font-size: 18px;
                        }
                        .dropdown-menu i {
                            font-size: 16px;
                            min-width: 22px;
                        }
                        .dropdown.open > a {
                            background: none !important;
                        }
                        .dropdown-menu {
                            border-radius: 1px;
                            border-color: #e5e5e5;
                            box-shadow: 0 2px 8px rgba(0,0,0,.05);
                        }
                        .dropdown-menu li a {
                            color: #777;
                            padding: 8px 20px;
                            line-height: normal;
                        }
                        .dropdown-menu li a:hover{
                            color: #333;
                        }
                        .navbar .dropdown-menu li a:active {
                            background: #d5d5d5;
                        }
                        .dropdown-menu .material-icons {
                            font-size: 21px;
                            line-height: 16px;
                            vertical-align: middle;
                            margin-top: -2px;
                        }
                    </style>
                @endauth

                @guest
                <div class="col-md-3 text-end">
                    <a class="btn btn-outline-primary mx-2" title="Войти" href="{{ route('login') }}" role="button">Вход</a>
                    <a  class="btn btn-primary mx-2" title="Регистрация" href="{{ route('register') }}" role="button">Регистрация</a>
                </div>
                @endguest
            </div>
        </div>

    </nav>
</header>

@yield('main')

<footer class="footer border-top border-2">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <a href="#"><img src="{{ asset('img/logo.png') }}" class="logo mt-3 mb-3" alt="logo"></a>
                <p class="menu">
                    <a href="{{ route('index') }}" title="Главная страница">Главная</a>
                    <a href="{{ route('user_agreement') }}" title="Пользовательское соглашение">Пользовательское соглашение</a>
                    <a href="{{ route('about') }}" title="О сайте">О сайте</a>
                    <a href="{{ route('help') }}">Помощь</a>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p class="copyright">
                    FindJob, Inc. &copy; {{ date('Y') }}
                </p>
            </div>
        </div>
    </div>
</footer>

</body>
</html>

