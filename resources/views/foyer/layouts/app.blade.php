<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item">
                        <a class="nav-link btn"  href="{{route('foyer.dashboard.home')}}">Rooms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn"  href="{{route('foyer.dashboard.students')}}">Requets</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn"  href="{{route('foyer.dashboard.residents')}}">Residents</a>
                    </li>


                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link btn " href="#" data-toggle="dropdown"
                           style="position:relative; padding-left:50px;">
                            <img class="rounded-circle" src="/uploads/avatars/{{Auth::guard('foyer')->user()->avatar}}"
                                 style="width:60px;"
                            >
                            <br>
                        <!--{{ Auth::guard('foyer')->user()->name }} <span class="caret"></span>-->
                        </a>
                        <a id="navbarDropdown" class="nav-link btn dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::guard('foyer')->user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('foyer.dashboard.profile') }}"><i
                                    class="fa fa-btn fa-user"></i>{{ __('Profile') }}</a>
                            <a class="dropdown-item" href="{{ route('foyer.logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('foyer.logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4 container">
        @yield('content')
    </main>
</div>
<script src="https://getbootstrap.com/docs/4.1/assets/js/vendor/popper.min.js" ></script>
<script src="{{ asset('js/jquery.js') }}" ></script>
<script src="{{ asset('js/bootstrap.js') }}" ></script>
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" ></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


@yield("js")


</body>
</html>
