<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>{{ config("app.name", "HyperAppLabs") }}</title>

    <!-- Styles -->
    <link href="{{ url("css/page.min.css") }}" rel="stylesheet">
    <link href="{{ url("css/style.css") }}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="icon" href="{{ asset("img/favicon.png") }}">
    <link href="https://vjs.zencdn.net/8.3.0/video-js.css" rel="stylesheet" />
</head>

<style type="text/css">
    :root{--formito-accent-color: #7854f7;--formito-modal-width: 480px;--formito-modal-height: 840px}.formito-app[data-button-shape='square'] .formito-fab,.formito-app[data-button-shape='square'] .formito-fab-close{border-radius:0}.formito-app[data-button-shape='round'] .formito-fab,.formito-app[data-button-shape='round'] .formito-fab-close{border-radius:8px}.formito-app[data-position='bottomLeft'] .formito-modal{left:0;right:auto;transform-origin:30px bottom}.formito-app[data-position='bottomLeft'] .formito-launcher{left:0;right:auto;align-items:flex-start}.formito-app[data-position='bottomLeft'] .formito-message{transform-origin:30px bottom}.formito-app[data-position='bottomLeft'] .formito-message::before,.formito-app[data-position='bottomLeft'] .formito-message::after{left:22px;right:auto}.formito-app[data-position='bottomLeft'] .formito-message span{left:0;right:auto}.formito-app[data-position='bottomLeft'] .formito-radial{transform-origin:left bottom;background:radial-gradient(at left bottom, rgba(29,39,54,0.08) 0%, rgba(29,39,54,0) 72%)}.formito-app.formito-trigger-click.open .formito-modal,.formito-app.formito-trigger-click.open .formito-modal-overlay{visibility:visible;opacity:1}.formito-app.formito-trigger-fab.open .formito-modal{opacity:1;visibility:visible;transform:scale(1, 1)}.formito-modal{all:initial;position:fixed;overflow:hidden;height:calc(100vh - 120px);max-height:var(--formito-modal-height, 840px);width:calc(100vw - 40px);max-width:var(--formito-modal-width, 480px);background:white;border-radius:8px;box-shadow:0px 3px 30px rgba(0,0,0,0.12);transition:0.4s cubic-bezier(0.04, 0.27, 0.26, 1.05);transition-property:opacity, transform;z-index:1200}.formito-modal iframe{background:#f2f3f5}.formito-trigger-fab .formito-modal{bottom:80px;right:0;margin:20px;transform:scale(0, 0) translateY(50px);transform-origin:calc(100% - 30px) bottom;opacity:0}.formito-trigger-click .formito-modal{visibility:hidden;opacity:0;top:50%;left:50%;height:calc(100vh - 40px);transform:translate(-50%, -50%)}.formito-modal-overlay{position:fixed;top:0;left:0;right:0;bottom:0;pointer-events:auto;background-color:rgba(0,0,0,0.35);backdrop-filter:blur(2px);z-index:1110;transition:0.3s ease-out;visibility:hidden;opacity:0}.formito-launcher{position:fixed;right:0;bottom:0;display:flex;flex-direction:column-reverse;align-items:flex-end;pointer-events:none}.formito-radial{position:absolute;width:500px;height:500px;bottom:0px;pointer-events:none;background:radial-gradient(at right bottom, rgba(29,39,54,0.08) 0%, rgba(29,39,54,0) 72%);transition:0.3s ease-out;transform:scale(0, 0);opacity:0;transform-origin:bottom right}.formito-app.open .formito-radial{opacity:1;transform:scale(1, 1)}.formito-fab{all:initial;position:relative;z-index:10000;outline:none;border:none;margin:20px;width:60px;height:60px;border-radius:50%;display:flex;align-items:center;justify-content:center;cursor:pointer;box-shadow:none;background:var(--formito-accent-color, "#7854f7") url("https://s.formito.com/img/icon-fab/3.png") no-repeat center center;box-shadow:rgba(0,0,0,0.06) 0px 1px 6px 0px,rgba(0,0,0,0.16) 0px 2px 32px 0px;background-size:cover;overflow:hidden;opacity:0;transform:scale(0, 0);transition:all 0.3s ease-out}.formito-fab .formito-fab-close{display:flex;align-items:center;justify-content:center;position:absolute;top:0;left:0;right:0;bottom:0;border-radius:50%;background-color:var(--formito-accent-color, "#7854f7");transform:scale(0, 0);transition:all 0.3s ease-out;font-size:32px;color:#fff}.formito-launcher.reveal .formito-fab{opacity:1;transform:scale(1, 1)}.formito-fab:hover{transform:scale(1.06, 1.06) !important}.formito-fab:focus{outline:none}.formito-app.open .formito-fab-close{transform:scale(1, 1)}.formito-message{font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";margin:20px;margin-bottom:0;padding:16px;max-width:280px;background:#fff;border-radius:8px;box-shadow:0 0 25px 0 rgba(0,0,64,0.1);line-height:1.5;border:1px solid #f2f3f4;cursor:pointer;pointer-events:auto;opacity:0;transform:scale(0, 0) translateY(20px);transform-origin:calc(100% - 30px) bottom;transition:0.3s ease-out 1s}.formito-message::before{position:absolute;bottom:-10px;right:22px;content:'';width:0;height:0;border-left:8px solid transparent;border-right:8px solid transparent;border-top:10px solid #f2f3f4}.formito-message::after{position:absolute;bottom:-9px;right:24px;content:'';width:0;height:0;border-left:6px solid transparent;border-right:6px solid transparent;border-top:9px solid #fff}.formito-message span{position:absolute;top:-28px;right:0;font-weight:300;display:inline-flex;align-items:center;justify-content:center;width:28px;height:28px;border-radius:10rem;background-color:rgba(0,0,0,0.25);opacity:0;text-decoration:none;cursor:pointer;user-select:none;transition:0.3s ease-out}.formito-message span:hover{background-color:rgba(0,0,0,0.5)}.formito-message span::before{content:'\00d7';margin-top:-6px;font-size:22px;color:rgba(255,255,255,0.9)}.formito-message span::after{content:'';position:absolute;bottom:-10px;display:block;width:100%;height:40px;z-index:-1}.formito-message h5{font-family:Roboto, 'Open Sans', Arial, sans-serif;font-size:15px;margin:0;font-weight:600;color:#464646;letter-spacing:0;line-height:1.5}.formito-message p{margin:0;font-size:15px;color:#646464}.formito-message h5+p{margin-top:8px}.formito-app.open .formito-message{opacity:0;visibility:hidden;transform:scale(0, 0);transition:0.3s ease-out}.formito-launcher.reveal .formito-message{opacity:1;transform:scale(1, 1) translateY(0)}.formito-message:hover span{top:-38px;opacity:1}
</style>
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
                    <a class="nav-link" href="{{ route('page.service') }}">Our Services<span class="arrow"></span></a>
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('page.service') }}">Laravel App Development</a>
                            {{-- <nav class="nav">
                                <a class="nav-link" href="">Laravel App</a>
                            </nav> --}}
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

{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route('contact.create') }}" class="nav-link">Contact Us</a>--}}
{{--                </li>--}}
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
{{--                    <a class="nav-link" href="{{ route('contact.create') }}">--}}
{{--                        Contact--}}
{{--                    </a>--}}
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
