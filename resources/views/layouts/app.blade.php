<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'HyperApp Lab') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- Font Awesome -->
    <link
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
            rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
            href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
            rel="stylesheet"
    />
    <!-- MDB -->
    <link
            href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css"
            rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield("styles")
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'HyperApp Labs') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                        <li class="nav-item dropdown">
                            @auth
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name ?? "" }}
                                </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route("users.profile", auth()->user()->id) }}">
                                    {{ __('My Profile') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <div class="container">
            @auth
                @include("partials.success")
                @include("partials.errors")
                <div class="row">
                    <div class="col-md-3">
                        <ul class="list-group text-center">
                            <li class="list-group-item">
                                <a href="{{ route('admin.index') }}">Admin</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('products.index') }}">Products</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('posts.index') }}">Posts</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('comments.index') }}">Comments</a>
                            </li>
                            @if (auth()->user()->isAdmin())
                                <li class="list-group-item">
                                    <a href="{{ route("users.index") }}">Users</a>
                                </li>
                            @endif
                            <li class="list-group-item">
                                <a href="{{ route('tags.index') }}">Tags</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('categories.index') }}">Categories</a>
                            </li>
                        </ul>

                        <ul class="list-group text-center my-3">
                            <li class="list-group-item">
                                <a href="{{ route("messages.index") }}">Messages</a>
                            </li>
                        </ul>

                        <ul class="list-group text-center my-3">
                            <li class="list-group-item">
                                <a href="{{ route("trashed-posts.index") }}">Trashed Post</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-8">
                        @yield('content')
                    </div>
                </div>
        @else
            @yield('content')
        @endauth
        </div>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy"
        crossorigin="anonymous"></script>
<!-- MDB -->
<script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"
></script>

@yield("scripts")

</body>
</html>
