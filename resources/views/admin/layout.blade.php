<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@500&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/admin/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/admin/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/admin/plugins/daterangepicker/daterangepicker.css">
    <link href="/admin/dist/css/colorbox.css" rel="stylesheet">

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

    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}"/>

    <title>@yield('title') - FindJob</title>
</head>

<body class="hold-transition sidebar-mini layout-fixed" style="font-family: Montserrat,serif;">
<div class="wrapper">


    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ route('index') }}" class="brand-link" style="text-decoration: none;">
            <img src="{{ asset('img/logo.png') }}" alt="logo"
                 class="brand-image" style="opacity: .8; filter: invert(100%);">
            <span class="brand-text font-weight-light" style="font-family: Comfortaa,serif;">FindJob</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset(Auth::user()->image) }}" class="img-circle" alt="user_img">
                </div>
                <div class="info">
                    <a href="{{route('profile', Auth::user()->id)}}" class="d-block" style="text-decoration: none;">{{ Auth::user()->name }}</a>
                </div>
            </div>


            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->

                    <li class="nav-item">
                        <a href="{{ route('indexAdmin') }}" class="nav-link">
                            <p>
                                Главная
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <p>
                                Категории
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview ml-3">
                            <li class="nav-item">
                                <a href="{{ route('category.index') }}" class="nav-link">
                                    <p>Все категории</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('category.create') }}" class="nav-link">
                                    <p>Добавить категорию</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <p>
                                Города
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview ml-3">
                            <li class="nav-item">
                                <a href="{{ route('city.index') }}" class="nav-link">
                                    <p>Все города</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('city.create') }}" class="nav-link">
                                    <p>Добавить город</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <p>
                                Образования
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview ml-3">
                            <li class="nav-item">
                                <a href="{{ route('education.index') }}" class="nav-link">
                                    <p>Все образования</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('education.create') }}" class="nav-link">
                                    <p>Добавить образование</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <p>
                                Избранное
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview ml-3">
                            <li class="nav-item">
                                <a href="{{ route('favourite.index') }}" class="nav-link">
                                    <p>Всё избранное</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('favourite.create') }}" class="nav-link">
                                    <p>Добавить в избранное</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <p>
                                Публикации
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview ml-3">
                            <li class="nav-item">
                                <a href="{{ route('post.index') }}" class="nav-link">
                                    <p>Все публикации</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('post.create') }}" class="nav-link">
                                    <p>Добавить публикацию</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <p>
                                Типы публикаций
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview ml-3">
                            <li class="nav-item">
                                <a href="{{ route('post_type.index') }}" class="nav-link">
                                    <p>Все типы</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('post_type.create') }}" class="nav-link">
                                    <p>Добавить тип</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <p>
                                Регионы
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview ml-3">
                            <li class="nav-item">
                                <a href="{{ route('region.index') }}" class="nav-link">
                                    <p>Все регионы</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('region.create') }}" class="nav-link">
                                    <p>Добавить регион</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <p>
                                Роли
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview ml-3">
                            <li class="nav-item">
                                <a href="{{ route('role.index') }}" class="nav-link">
                                    <p>Все роли</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('role.create') }}" class="nav-link">
                                    <p>Добавить роль</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <p>
                                Пользователи
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview ml-3">
                            <li class="nav-item">
                                <a href="{{ route('user.index') }}" class="nav-link">
                                    <p>Все пользователи</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('user.create') }}" class="nav-link">
                                    <p>Добавить пользователя</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <p>
                                Опыты работы
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview ml-3">
                            <li class="nav-item">
                                <a href="{{ route('work_experience.index') }}" class="nav-link">
                                    <p>Все опыты</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('work_experience.create') }}" class="nav-link">
                                    <p>Добавить опыт</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <p>
                                Графики работы
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview ml-3">
                            <li class="nav-item">
                                <a href="{{ route('work_schedule.index') }}" class="nav-link">
                                    <p>Все графики</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('work_schedule.create') }}" class="nav-link">
                                    <p>Добавить график</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('main')
    </div>
    <!-- /.content-wrapper -->


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)

</script>
<!-- Bootstrap 4 -->
<script src="/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/admin/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/admin/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="/admin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/admin/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/admin/plugins/moment/moment.min.js"></script>
<script src="/admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/admin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/admin/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/admin/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/admin/dist/js/pages/dashboard.js"></script>
<script type="text/javascript" src="/admin/dist/js/jquery.colorbox-min.js"></script>
<script src="https://cdn.tiny.cloud/1/14stg90qs04ggumtrl3qdykdty6hvdb9p9bryig39coflae5/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script type="text/javascript" src="/packages/barryvdh/elfinder/js/standalonepopup.js"></script>
<script src="/admin/admin.js"></script>
</body>

</html>
