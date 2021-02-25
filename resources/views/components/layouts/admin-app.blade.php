<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Blank Page</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">


    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('adminlte/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('adminlte/dist/css/adminlte.min.css')}}">

    <link rel="stylesheet" href="{{asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">

    <!-- Toastr -->
{{--    <link rel="stylesheet" href="{{asset('adminlte/{{asset('adminlte/plugins/toastr/toastr.min.css')}}">--}}
<!-- Custom Styles -->
    @stack('styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="index3.html" class="nav-link">Home</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <img src="{{asset('adminlte/dist/img/avatar.png')}}"
                         class="user-image img-circle elevation-2" alt="User Image">
                    <span class="d-none d-md-inline">{{Auth::user()->name}}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <!-- User image -->
                    <li class="user-header bg-primary">
                        <img src="{{ asset('adminlte/dist/img/avatar.png')}}" class="img-circle elevation-2"
                             alt="User Image">

                        <p>
                            {{Auth::user()->name}}
                            {{--                            <small>{{ Carbon\Carbon::parse(Auth::user()->created_at)->format('d M Y') }} Tarihi'nden Beri Üye </small>--}}
                        </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        {{--                        <a href="#" class="btn btn-default btn-flat">Profile</a>--}}

                        <a href="{{route('logout')}}" class="btn btn-block btn-flat "
                           onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">Çıkış Yap</a>
                        <form id="logout-form" method="POST" action="{{ route('logout') }}">
                            @csrf

                        </form>
                    </li>
                </ul>
            </li>

        </ul>

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <x-layouts.admin-sidebar></x-layouts.admin-sidebar>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
{{--        <section class="content-header">--}}
{{--            <div class="container-fluid">--}}
{{--                <div class="row mb-2">--}}
{{--                    <div class="col-sm-12">--}}
{{--                        <h1>{{ $title }}</h1>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div><!-- /.container-fluid -->--}}
{{--        </section>--}}

        <!-- Content Wrapper. Contains page content -->
        {{ $slot }}
    </div>
            <!-- /.content-wrapper -->
            <x-layouts.admin-footer></x-layouts.admin-footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- jQuery -->
        <script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>

        <!-- Bootstrap 4 -->
        <script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

        <!-- Select2 -->
        <script src="{{asset('adminlte/plugins/select2/js/select2.full.min.js')}}"></script>

        <!-- AdminLTE App -->
        <script src="{{asset('adminlte/dist/js/adminlte.js')}}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{asset('adminlte/dist/js/demo.js')}}"></script>


        <script src="{{asset('js/app.js')}}"></script>

        <script>
            $('.select2').select2()

        </script>
</body>
</html>
