@extends("layouts.hyperapp")
@section("content")
    <section class="header text-white h-fullscreen py-0" style="background-image: url({{ asset('img/1.jpg') }})" data-overlay="7">
        <div class="container text-center">

            <div class="row h-100 align-items-center">
                <div class="col-lg-8 mx-auto">

                    <h1 class="display-1 text-uppercase ls-3 fw-500">Coming soon</h1>
                    <br><br>
                    <p class="lead">
                        We are currently working on this page.
                    <br><br>

                    <h5><strong>We'll be ready in</strong></h5>
                    <br>
                    <div class="countdown countdown-sm countdown-outline countdown-light countdown-uppercase" data-countdown="2023/09/17"></div>

                </div>
            </div>

        </div>
    </section>
@endsection
