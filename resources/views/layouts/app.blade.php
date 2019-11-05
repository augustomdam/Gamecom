<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- bootstrap 3.7 --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> --}}
    {{-- bootstrap 4 --}}
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> --}}
    {{-- Font Awesome --}}
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body background="{{ asset('images/fundo-home.jpg') }}">

    <nav class="navbar navbar-expand-lg navbar-light bg-success">
        <a class="nav navbar-brand ml-5" href="{{url('/')}}">
            <img src="{{ asset('images/gamecom_logo.png') }}" width="30%">
        </a>
        <a class="nav-item text-black-50" href="{{url('/')}}">
            <i class="fa fa-home"></i> Home
        </a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
            aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav ml-auto">
                @guest
                </li>
                <li class="nav-item mr-3">
                    <a class="nav-link btn btn-outline-primary" href="{{ route('login') }}">
                        <i class="fas fa-sign-in-alt"></i> {{ __('Login') }}
                    </a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item ">
                    <a class="nav-link btn btn-outline-light" href="{{ route('register') }}">
                        <i class="fas fa-user-plus"></i> {{ __('Register') }}
                    </a>
                </li>
                @endif
                @else
                <li class="nav-item mr-3">
                    <a class="nav-link btn btn-outline-primary" href="{{ route('home') }}">
                        <i class="fas fa-chart-line"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle btn btn-outline-light" href="#"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user-circle"></i> {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>

        </div>
    </nav>
    <div class="content">
        @yield('content')
    </div>
    <footer class="footer">
        <div class="container">
            <span class="text-muted">
                Developed by <a href="" target="_blank">Augusto Santos <i class="fa fa-facebook"></i></a> &copy; 2019</span>
        </div>
    </footer>
</body>

</html>
