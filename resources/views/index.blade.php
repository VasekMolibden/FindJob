@extends('layout')

@section('title')Главная@endsection

@section('main')
<main>
    <style>
        .top {
            background-repeat: no-repeat;
            background-attachment: fixed;
            text-align: center;
            width: 100%;
            height: auto;
            background-size: cover;
            background-position: center center;
            position: relative;
            overflow: hidden;
            border-radius: 0 0 85% 85% / 20%;
        }
        .top .overlay{
            width: 100%;
            height: 100%;
            padding-top: 120px;
            padding-bottom: 40px;
            color: #FFF;
            text-shadow: 1px 1px 1px #333;
            background-image: linear-gradient( 135deg, rgba(18, 120, 208, 0.4) 10%, rgba(49, 49, 49, 0.7) 100%);
            backdrop-filter: blur(4px) brightness(70%);
        }
        .top .overlay h1 {
            font-family: Comfortaa, serif;
            font-weight: normal;
            font-size: 80px;
            margin-bottom: 30px;
        }
        .top .overlay h3, .top .overlay p {
            margin-bottom: 30px;
            font-size: 17px;
        }
        .top .search {
            width: 550px;
        }
        .top input{
            background: rgba(197, 197, 197, 0.9);
        }
        .top i{
            color: white;
            font-size: 25px;
        }
    </style>
    <div class="top">
        <div class="overlay">
            <h1>FindJob</h1>
            <h3><b>Бесплатный сервис, предоставляющий услуги по подбору персонала и поиску работы</b></h3>
            <form action="{{ route('search') }}" method="get" name="search">
                <div class="search input-group mx-auto">
                    <input type="text" class="form-control" id="text" name="text" placeholder="Введите должность или профессию" maxlength="50" aria-label="Поиск" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary" title="Поиск">Искать</button>
                    </div>
                </div>
            </form>
            <br>
            <a href="#main"><i class="fa-solid fa-chevron-down mt-5"></i></a>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {

            var bgArray = ['1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg'];
            var bg = bgArray[Math.floor(Math.random() * bgArray.length)];

            $('.top').css('background', bg);

            // If you have defined a path for the images
            var path = 'public/img/';

            // then you can put it right before the variable 'bg'
            $('.top').css('background-image', 'url('+path+bg+')');
        });
    </script>

    <section class="main-content" id="main">
        <div class="container w-75">
            <style>
                .categories {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }

                .categories a:hover{
                    text-decoration: none;
                }

                .categories{
                    padding: 0 0 0 0;
                }

                .data-card {
                    display: flex;
                    flex-direction: column;
                    width: 20.75em;
                    min-height: 17.75em;
                    overflow: hidden;
                    border-radius: 0.5em;
                    text-decoration: none;
                    background: #f9f9f9;
                    margin: 1em;
                    padding: 2.75em 2.5em;
                    transition: transform 0.45s ease, background 0.45s ease;
                }
                .data-card h3 {
                    color: #2E3C40;
                    font-size: 3.5em;
                    font-weight: 600;
                    line-height: 1;
                    padding-bottom: 0.25em;
                    margin: 0 0 0.14em;
                    border-bottom: 2px solid #575757;
                    transition: color 0.45s ease, border 0.45s ease;
                }
                .data-card h4 {
                    color: #545454;
                    text-transform: uppercase;
                    font-size: 1.125em;
                    font-weight: 700;
                    line-height: 1;
                    margin: 0 0 1.7em;
                    transition: color 0.45s ease;
                }
                .data-card p {
                    opacity: 0;
                    color: #FFFFFF;
                    font-weight: 600;
                    line-height: 1.5;
                    margin: 0 0 1.25em;
                    transform: translateY(-1em);
                    transition: opacity 0.45s ease, transform 0.5s ease;
                }
                .data-card .link-text {
                    display: block;
                    color: #575757;
                    font-size: 1.125em;
                    font-weight: 600;
                    line-height: 1.2;
                    margin: auto 0 0;
                    transition: color 0.45s ease;
                }
                .data-card .link-text i {
                    margin-left: 0.5em;
                    transition: transform 0.6s ease;
                }

                .data-card:hover {
                    background: #575757;
                    transform: scale(1.02);
                }
                .data-card:hover h3 {
                    color: #FFFFFF;
                    border-bottom-color: #ffffff;
                }
                .data-card:hover h4 {
                    color: #FFFFFF;
                }
                .data-card:hover p {
                    opacity: 1;
                    transform: none;
                }
                .data-card:hover .link-text {
                    color: #FFFFFF;
                }
                .data-card:hover .link-text i {
                    -webkit-animation: point 1.25s infinite alternate;
                    animation: point 1.25s infinite alternate;
                }

                @-webkit-keyframes point {
                    0% {
                        transform: translateX(0);
                    }
                    100% {
                        transform: translateX(0.125em);
                    }
                }

                @keyframes point {
                    0% {
                        transform: translateX(0);
                    }
                    100% {
                        transform: translateX(0.125em);
                    }
                }

                .carousel {
                    width: 100%;
                }
            </style>
            @include('messages')
            @if(count($posts))
            <section class="categories mb-4 mt-3">
                <div class="carousel" data-flickity='{ "contain": true, "draggable": true, "pageDots": false, "autoPlay": true, "initialIndex": 1 }'>
                @foreach($categories as $category)
                    @if($all_posts->where('category_id', $category->id)->count() > 0)
                    <a href="/search?city_id[]={{ session('city.id') }}&category_id[]={{ $category->id }}" class="data-card carousel-cell shadow border">
                        <h3>{{ $all_posts->where('category_id', $category->id)->count() }}</h3>
                        <h4>{{ $category->category}}</h4>
                        {{--<p>Aenean lacinia bibendum nulla sed consectetur.</p>--}}
                        <span class="link-text">
                            Посмотреть все
                            <i class="fa-solid fa-arrow-right-long"></i>
                        </span>
                    </a>
                    @endif
                @endforeach
                </div>
            </section>

            <h3>Последние публикации @if(session()->has('city')) ({{ session('city.city') }}) @endif</h3>

            @foreach($posts as $post)

            <div class="card h-100 shadow my-3">
                <a href="{{ route('post', $post->id) }}" title="{{ $post->name }}">
                    <img src="{{ asset($post->image) }}" class="img-post mx-auto my-auto rounded p-2" alt="post">
                    <div class="card-desc p-2">
                        <p><b><i class="fas fa-city opacity-25 me-1"></i>Город:</b> {{ $post->city->city }}</p>
                        <p><b><i class="fas fa-check-double opacity-25 me-2"></i>Тип:</b> {{ $post->post_type->post_type }}</p>
                        <p><b><i class="fas fa-list opacity-25 me-2"></i>Категория:</b> {{ $post->category->category }}</p>
                        <p><b><i class="fas fa-graduation-cap opacity-25 me-1"></i>Образование:</b> {{ $post->education->education }}</p>
                        <p><b><i class="fa-solid fa-chart-line opacity-25 me-2"></i>Опыт:</b> {{ $post->work_experience->work_experience }}</p>
                        <p><b><i class="fas fa-briefcase opacity-25 me-2"></i>График:</b> {{ $post->work_schedule->work_schedule }}</p>
                    </div>
                </a>

                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col-8">
                            <a href="{{ route('post', $post->id) }}" title="{{ $post->name }}" class=""><h4>{{ $post->name }} </h4></a>
                        </div>
                        <div class="col-3 mx-2">
                            @if($post->salary == 0 || $post->salary == NULL)<h4 style="float: right;">Не указано</h4>
                                @else<h4 style="float: right;"><span class="salary">{{ $post->salary }}</span></h4>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-11 post-overflow">
                            <p class="text-left my-auto">{{ strip_tags($post->description) }}</p>
                        </div>
                    </div>

                    <div class="row justify-content-between align-items-center">
                        <div class="col-7">
                            <span class="date">{{ $post->created_at->format('d.m.Y H:i') }} &#8226; {{ $post->category->category }} &#8226; {{ $post->city->city }}</span>
                        </div>
                        <div class="col-4 mx-2">
                            <a href="{{ route('profile', $post->user->id) }}" title="{{ $post->user->name }}" class="" style="float: right;"><img src="{{ asset($post->user->image) }}" class="img-author mx-auto my-auto p-2" alt="profile">
                                <span class="author" style="float: right; margin-top:9px;">{{ $post->user->name }}</span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
            @endforeach
            @else
                <h3 class="text-muted text-center mt-5">Публикаций пока нет</h3>
            @endif
        </div>
    </section>

    {{ $posts->withQueryString()->links('vendor.pagination.bootstrap-4') }}

</main>
@endsection
