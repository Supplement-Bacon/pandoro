<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pandoro - A fresh vision of web</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url('assets/media/image/favicon.png') }}"/>

    <!-- Plugin styles -->
    <link rel="stylesheet" href="{{ url('vendors/bundle.css') }}" type="text/css">

    @yield('head')

    <!-- App styles -->
    <link rel="stylesheet" href="{{ url('assets/css/app.min.css') }}" type="text/css">

    <!-- Font awesome Kit -->
    <script src="https://kit.fontawesome.com/{{ config('services.fontawesome.kit_id') }}.js" crossorigin="anonymous"></script>

</head>
<body @if (trim($__env->yieldContent('bodyClass'))) class="@yield('bodyClass')" @endif>

<!-- begin::preloader-->
<div class="preloader">
    <div class="preloader-icon"></div>
</div>
<!-- end::preloader -->

<!-- BEGIN: Sidebar Group -->
<div class="sidebar-group">

    <!-- BEGIN: User Menu -->
    <div class="sidebar" id="user-menu">
        <div class="py-4 text-center" data-backround-image="{{ url('assets/media/image/image1.jpg') }}">
            <x-user.round :user="Auth::user()" size="'lg'" />
            <h5 class="d-flex align-items-center text-white justify-content-center">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</h5>
            <div class="text-white">
                {{ Auth::user()->email }}
            </div>
        </div>
        <div class="card mb-0 card-body shadow-none">
            <div class="mb-4">
                <div class="list-group list-group-flush">
                    <a href="{{ route('profile') }}" class="list-group-item p-l-r-0">Profile</a>
                    <a href="{{ route('logout') }}" class="list-group-item p-l-r-0 text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END: User Menu -->

</div>
<!-- END: Sidebar Group -->

<!-- begin::main -->
<div class="layout-wrapper">

    <!-- begin::header -->
    <div class="header d-print-none">

        <div class="header-left">
            <div class="navigation-toggler">
                <a href="#" data-action="navigation-toggler">
                    <i data-feather="menu"></i>
                </a>
            </div>
            <div class="header-logo">
                <a href="{{ route('home') }}">
                    <img class="logo" src="{{ url('assets/media/image/logo-small.png') }}" alt="logo">
                    <img class="logo-light" src="{{ url('assets/media/image/logo-small-light.png') }}" alt="light logo">
                </a>
            </div>
        </div>

        <div class="header-body">
            <div class="header-body-left">
                <div class="page-title">
                    <h4>@yield('pageTitle')</h4>
                </div>
            </div>
            <div class="header-body-right">
                <ul class="navbar-nav">

                    <!-- begin::header fullscreen -->
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" title="Fullscreen" data-toggle="fullscreen">
                            <i class="maximize" data-feather="maximize"></i>
                            <i class="minimize" data-feather="minimize"></i>
                        </a>
                    </li>
                    <!-- end::header fullscreen -->

                    <!-- begin::user menu -->
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" title="User menu" data-sidebar-target="#user-menu">
                            <span class="mr-2 d-sm-inline d-none">{{ Auth::user()->fullName }}</span>
                            <x-user.round :user="Auth::user()" :size="'sm'" :link="false" />
                        </a>
                    </li>
                    <!-- end::user menu -->

                </ul>

                <!-- begin::mobile header toggler -->
                <ul class="navbar-nav d-flex align-items-center">
                    <li class="nav-item header-toggler">
                        <a href="#" class="nav-link">
                            <i data-feather="arrow-down"></i>
                        </a>
                    </li>
                </ul>
                <!-- end::mobile header toggler -->
            </div>
        </div>

    </div>
    <!-- end::header -->

    <div class="content-wrapper">

        <!-- begin::navigation -->
        <div class="navigation">
            <div class="navigation-menu-tab">
                <ul>
                    <li>
                        <a href="#" data-toggle="tooltip" data-placement="right" title="Home" data-nav-target="#homeNavTarget">
                           <i class="fas fa-house"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="navigation-menu-body">
                <div class="navigation-menu-group">
                    <div id="homeNavTarget">
                        <ul>
                            <li class="navigation-divider d-flex align-items-center">
                                <i class="fas fa-pizza-slice"></i> Home
                            </li>
                            <li>
                                <a @if(!request()->segment(1)) class="active" @endif href="{{ route('home') }}">Overview</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- end::navigation -->

        <div class="content-body">

            <div class="content">

                @if (\Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            <li>{!! \Session::get('error') !!}</li>
                        </ul>
                    </div>
                @endif

                @if (\Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        <ul>
                            <li>{!! \Session::get('success') !!}</li>
                        </ul>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')

            </div>

            <!-- begin::footer -->
            <footer class="content-footer">
                <div>v{{ config('services.pandoro')['app-version'] }} © {{ date('Y') }} Pandoro  - <a href="http://supplement-bacon.com" target="_blank">Baked with ❤️ by Supplément Bacon</a></div>
                <div>
                    <nav class="nav">
                        <a href="{{ route('licenses') }}" target="_blank" class="nav-link">Licenses</a>
                        <a href="{{ route('changelog') }}" target="_blank" class="nav-link">Change Log</a>
                    </nav>
                </div>
            </footer>
            <!-- end::footer -->

        </div>

    </div>

</div>
<!-- end::main -->

<!-- Plugin scripts -->
<script src="{{ url('vendors/bundle.js') }}"></script>

@yield('script')

<!-- App scripts -->
<script src="{{ url('assets/js/app.min.js') }}"></script>

</body>
</html>
