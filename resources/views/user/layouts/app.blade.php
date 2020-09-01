<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>WELCOME</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/login.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/bootstrap.css') }}"/>
    <!--     Fonts and icons     -->
    <link href='https://fonts.googleapis.com/css?family=Cambo|Poppins:400,600' rel='stylesheet' type='text/css'>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="/assets/css/fonts/pe-icon-7-stroke.css" rel="stylesheet">
</head>

<body>

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
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @auth

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link btn " href="#" data-toggle="dropdown"
                           style="position:relative; padding-left:50px;">
                            <img class="rounded-circle"
                                 src="/uploads/avatars/{{Auth::guard('web')->user()->avatar}}"
                                 style="width:60px;"
                            >
                            <br>
                        <!--{{ Auth::guard('web')->user()->name }} <span class="caret"></span>-->
                        </a>

                        <a id="navbarDropdown" class="nav-link btn dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::guard("web")->user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('profile') }}"><i
                                    class="fa fa-btn fa-user"></i>{{ __('Profile') }}</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>


                @endauth
                @guest
                    @if (auth()->guard("web")->check())
                        <li class="nav-item">
                            <a class="nav-link btn" href="{{ route('home') }}">Student</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link btn" href="{{ route('login') }}">Student</a>
                        </li>

                    @endif

                    @if (auth()->guard("office")->check())
                        <li class="nav-item">
                            <a class="nav-link btn" href="{{ route('office.dashboard.home') }}">Office</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link btn" href="{{ route('office.login') }}">Office</a>
                        </li>

                    @endif

                    @if (auth()->guard("foyer")->check())
                        <li class="nav-item">
                            <a class="nav-link btn" href="{{ route('foyer.dashboard.home') }}">foyer</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link btn" href="{{ route('foyer.login') }}">foyer</a>
                        </li>

                    @endif
                @endguest

            </ul>
        </div>
    </div>
</nav>




<div class="section section-our-team-freebie" style="    padding: 0px;">

   @yield('content')
    <div class="section section-small section-get-started">
        <div class="parallax filter">
            <div class="image"
                 style="background-image: url('https://images.unsplash.com/photo-1423666639041-f56000c27a9a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=753&q=80')">
            </div>
            <div class="container">
                <div class="title-area">
                    <h2 class="text-white">Vous Voulez plus d'informations ? </h2>
                    <div class="separator line-separator">♦</div>
                    <p class="description"> On attend vos questions et Feedback</p>
                </div>

                <div class="button-get-started">
                    <a href="#" class="btn btn-danger btn-fill btn-lg">Contactez Nous</a>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer footer-big footer-color-black" data-color="black">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-3">
                    <div class="info">
                        <h5 class="title" style="margin-left: 70px;">Liens</h5>
                        <nav>
                            <ul>
                                <li>
                                    <a href="#">Acceuil</a></li>
                                <li>
                                    <a href="#">S'inscrire</a>
                                </li>
                                <li>
                                    <a href="login.html">Se connecter</a>
                                </li>


                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-md-3 col-md-offset-1 col-sm-3">
                    <div class="info">
                        <h5 class="title" style="margin-left:20px">Support</h5>
                        <nav>
                            <ul>
                                <li>
                                    <a href="#" style="margin-right:160px">Contact</a>
                                </li>
                                <li>
                                    <a href="#" style="margin-right:160px">FAQ</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="info">
                        <h5 class="title" style="margin-left: 10px;">S'inscrire à notre Newsletter</h5>
                        <nav>
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-google-plus-square"></i> <b>Cliquez</b> Pour
                                        joindre votre email
                                        <hr class="hr-small">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class=""></i>
                                        Avoir accès à toute actualité concernant le site
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-md-2 col-md-offset-1 col-sm-3">
                    <div class="info">
                        <h5 class="title">
                            Suivez nous</h5>
                        <nav>
                            <ul>
                                <li>
                                    <a href="#" class="btn btn-social btn-facebook btn-simple"
                                       style="margin-right: 60px;">
                                        <i class="fa fa-facebook-square"></i> Facebook
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="btn btn-social btn-twitter btn-simple"
                                       style="margin-right: 70px;">
                                        <i class="fa fa-twitter"></i> Twitter
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="btn btn-social btn-reddit btn-simple"
                                       style="margin-right: 60px;">
                                        <i class="fa fa-google-plus-square"></i> Google+
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <hr>

        </div>
    </footer>

</div>

</body>
<script src="https://getbootstrap.com/docs/4.1/assets/js/vendor/popper.min.js" ></script>
<script src="{{ asset('js/jquery.js') }}" ></script>
<script src="{{ asset('js/bootstrap.js') }}" ></script>
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" ></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

</html>

