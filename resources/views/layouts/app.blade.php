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
    <nav class="navbar navbar-light bg-white shadow-sm">
        <div class="container">
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
                    @if (auth()->guard("web")->check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Student</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Student</a>
                        </li>

                    @endif

                    @if (auth()->guard("office")->check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('office.dashboard.home') }}">Office</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('office.login') }}">Office</a>
                        </li>

                    @endif

                    @if (auth()->guard("foyer")->check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('foyer.dashboard.home') }}">foyer</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('foyer.login') }}">foyer</a>
                        </li>

                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <main class="container-fluid" style="padding:0;margin:0;">
        @yield('content')
    </main>
</div>



@section('js')
    <script type="text/javascript" defer>
        $(function () {
            // Time wasted here: 3 hours

            // For card rotation
            $(".btn-rotate").click(function () {
                // Long explanation: The button that is clicked, will have its grand parent add a class to its child. The main reason I couldn't use .parent() was that it gets the closest positioned parent, either relative or absolute. The problem was that the card-front got the .rotate-container as its parent, but the card-back was being the closest positioned element as the parent of the button. In order to circumvent this I either needed to use 3 offsetparent() and have really messy code, or just use the .closest() which as its name suggests gets the closest named or unnamed element. So in the end, I get the grand parent of the button which is the .rotate container and I find its children which are the .card-front and .card-back and toggle the rotation classes on them. Also if I didn't specify which button's ancestor would assign the class, whenever any btn-rotate button is clicked, all three cards would rotate at once which makes for a funny yet unhelpful design.
                var $parent = $(this).closest(".rotate-container");

                // Probably easier to use an id, but I made it work
                $parent.children(".card-front").toggleClass(" rotate-card-front");
                $parent.children(".card-back").toggleClass(" rotate-card-back");
            });


        });
        $('#example').DataTable();

        </script>

@endsection



<script src="{{ asset('js/popper.js') }}" defer></script>
<script src="{{ asset('js/jquery.js') }}" defer></script>
<script src="{{ asset('js/bootstrap.js') }}" defer></script>

</body>
</html>
