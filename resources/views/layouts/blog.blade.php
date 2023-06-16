<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>{{ config("app.name", "HyperAppLabs") }}</title>

    <!-- Styles -->
    <link href="{{ asset("css/page.min.css") }}" rel="stylesheet">
    <link href="{{ asset("css/style.css") }}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="icon" href="{{ asset("img/favicon.png") }}">
</head>

<body>


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
                    <a class="nav-link" href="/">HyperAppLab</a>
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
                    <a class="nav-link" href="#">Our Services <span class="arrow"></span></a>
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Software<span class="arrow"></span></a>
                            <nav class="nav">
                                <a class="nav-link" href="">Web Application</a>
                                <a class="nav-link" href="">Android Mobile</a>
                                <a class="nav-link" href="">Desktop</a>
                            </nav>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('contact.create') }}" class="nav-link">Contact Us</a>
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
                    <a class="nav-link" href="{{ route('contact.create') }}">
                        Contact
                    </a>
                </div>
            </div>

        </div>
    </div>
</footer><!-- /.footer -->


<!-- Scripts -->
<script src="{{ asset('js/page.min.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>

</body>
</html>
