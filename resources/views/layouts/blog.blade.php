<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config("app.name", "HyperAppLabs") }}</title>

    <!-- Styles -->
    <link href="{{ url("css/page.min.css") }}" rel="stylesheet">
    <link href="{{ url("css/style.css") }}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200;300;400;500;600;800&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="icon" href="{{ asset("img/favicon.png") }}">
    <link href="https://vjs.zencdn.net/8.3.0/video-js.css" rel="stylesheet" />
</head>
<body class="m-0">


<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
    <div class="container">

        {{--        <div class="navbar-left">--}}
        {{--            <button class="navbar-toggler" type="button">&#9776;</button>--}}
        {{--            <a class="navbar-brand" href="../index.html">--}}
        {{--                <img class="logo-dark" src="../assets/img/logo-dark.png" alt="logo">--}}
        {{--                <img class="logo-light" src="../assets/img/logo-light.png" alt="logo">--}}
        {{--            </a>--}}
        {{--        </div>--}}

        <section class="navbar-mobile">
            <span class="navbar-divider d-mobile-none"></span>

            <ul class="nav nav-navbar">
                <li class="nav-item">
                    <a style="font-weight: lighter;" class="nav-link" href="/">HyperAppLab</a>
{{--                    <ul class="nav">--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="#">Marketing <span class="arrow"></span></a>--}}
{{--                            <nav class="nav">--}}
{{--                                <a class="nav-link" href="../demo/marketing-1.html">Marketing 1</a>--}}
{{--                                <a class="nav-link" href="../demo/marketing-2.html">Marketing 2</a>--}}
{{--                            </nav>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
                </li>
                <li class="nav-item">
                    <a style="font-weight: lighter;"  class="nav-link" href="{{ route('page.service') }}">About Us</a>
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('page.service') }}">Laravel App Development</a>
                        </li>
                        <li class="nav-item">
                            {{-- <a class="nav-link" href="#">
                                DevOps
                            </a>
                            <nav class="nav">
                                <a class="nav-link" href="">
                                    AWS Cloud Architect
                                </a>
                                <a class="nav-link" href="">
                                    CI/CD
                                </a>
                            </nav> --}}
                        </li>
                    </ul>
                </li>

               <li class="nav-item">
                   <a href="" class="nav-link">Contact Us</a>
               </li>
            </ul>
        </section>
        @auth
            <a class="btn btn-xs btn-round btn-success"
               href="{{ route('admin.index') }}">
                Dashboard
            </a>
        @endauth
    </div>
</nav><!-- /.navbar -->

@yield("header")

@yield("content")
<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row gap-y align-items-center">

            {{--            <div class="col-6 col-lg-3">--}}
            {{--                <a href="../index.html"><img src="../assets/img/logo-dark.png" alt="logo"></a>--}}
            {{--            </div>--}}

            <div class="col-6 col-lg-3 text-right order-lg-last">
                {{--                <div class="social">--}}
                {{--                    <a class="social-facebook" href="https://www.facebook.com/thethemeio"><i class="fa fa-facebook"></i></a>--}}
                {{--                    <a class="social-twitter" href="https://twitter.com/thethemeio"><i class="fa fa-twitter"></i></a>--}}
                {{--                    <a class="social-instagram" href="https://www.instagram.com/thethemeio/"><i--}}
                {{--                                class="fa fa-instagram"></i></a>--}}
                {{--                    <a class="social-dribbble" href="https://dribbble.com/thethemeio"><i class="fa fa-dribbble"></i></a>--}}
                {{--                </div>--}}
            </div>

            <div class="col-lg-6">
                <div class="nav nav-bold nav-uppercase nav-trim justify-content-lg-center">
                    <a target="_blank" class="nav-link" href="https://www.linkedin.com/in/glenn-rudge/">
                        LinkedIn
                    </a>
                    <a target="_blank" class="nav-link" href="https://www.glenn-dev.com">
                        Portfolio
                    </a>
                    <a target="_blank" class="nav-link" href="https://github.com/TacitReturn">
                        <img width="50px" src="{{ asset("img/GitHub_Logo.png") }}" alt="bio">
                    </a>
                </div>
            </div>

        </div>
    </div>
</footer><!-- /.footer -->


<!-- Scripts -->
<script src="{{ asset('js/page.min.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>

<!-- React -->
<script crossorigin src="https://unpkg.com/react@18/umd/react.production.min.js"></script>
<script crossorigin src="https://unpkg.com/react-dom@18/umd/react-dom.production.min.js"></script>
<script src='https://unpkg.com/babel-standalone@6.26.0/babel.js'></script>
<script src="{{ url('js/index.js') }}" type="text/jsx"></script>

</body>
</html>
