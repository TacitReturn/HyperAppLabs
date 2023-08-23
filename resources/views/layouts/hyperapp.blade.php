<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config("app.name", "HyperApp Labs") }}</title>

    <!-- Styles -->
    <link href="{{ url("css/page.min.css") }}" rel="stylesheet">
    <link href="{{ url("css/style.css") }}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200;300;400;500;600;800&display=swap" rel="stylesheet">


    <link rel="preconnect" href="{{ asset('fonts/themify.eot') }}">
    <link rel="preconnect" href="{{ asset('fonts/themify.svg') }}">
    <link rel="preconnect" href="{{ asset('fonts/themify.woff') }}">

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}" />
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="icon" href="{{ asset("img/favicon.png") }}">
    <link href="https://vjs.zencdn.net/8.3.0/video-js.css" rel="stylesheet" />
</head>
<body class="m-0">
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <section class="navbar-mobile">
            <nav class="nav nav-navbar mr-auto">
                <a class="nav-link active" href="{{ route('courses.index') }}">Home</a>
                <a class="nav-link active" href="/">Blog</a>
                <a class="nav-link" href="{{ route('pages.features') }}">Features</a>
                <a class="nav-link" href="{{ route('members.index') }}">Pricing</a>
                <a class="nav-link" href="{{ route('pages.contact') }}">Contact</a>
            </nav>
            @auth
                <div class="dropdown ml-lg-5">
                  <span class="dropdown-toggle no-caret" data-toggle="dropdown">
                    <span class="ti-user"></span> <a class="mx-2">Account</a>
                  </span>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('members.profile', auth()->user()) }}">
                            <span class="ti-user mx-2"></span> Profile
                        </a>
                        <a class="dropdown-item" href="{{ route('courses.index') }}"><span class="ti-video-clapper pt-2 mx-2"></span>Courses</a>
                        <a class="dropdown-item" href="#"><span class="ti-email pt-2 mx-2"></span>Inbox</a>
                        <a class="dropdown-item" href="#"><span class="ti-menu-alt mt-2 mx-2"></span>Settings</a>
                        <div class="dropdown-divider"></div>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item" href="#">Logout</button>
                        </form>
                    </div>
                </div>
            @endauth
        </section>
    </div>
</nav>
@yield("content")

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
