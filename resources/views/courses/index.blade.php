@extends("layouts.hyperapp")
@section("content")
    <!-- Main Content -->
    <main class="main-content">
        <div class="section">
            <section class="section text-white" style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);">
                    <div class="container text-center">
                        <h2>Ready to start learning?</h2>
                        <div class="row mt-7">
                            <form class="col-md-8 col-xl-5 input-glass mx-auto" method="GET" target="_blank">
                                <div class="d-flex">
                                    <div class="col">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                                            </div>
                                            <input type="text" name="search" class="form-control" placeholder="Search for a course...">
                                            <span class="input-group-append"><button class="btn btn-light">Find Course</button></span>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="input-group">
                                                <select class="form-control form-control-sm">
                                                    <option>Laravel</option>
                                                    <option>Vue</option>
                                                    <option>React</option>
                                                    <option>TDD</option>
                                                    <option>PHP</option>
                                                    <option>JavaScript</option>
                                                    <option>Python</option>
                                                </select>
                                        </div>
                                    </div>
{{--                                    <div class="col">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label>Category</label>--}}
{{--                                            <select class="form-control form-control-sm">--}}
{{--                                                <option>Personal</option>--}}
{{--                                                <option>Startup</option>--}}
{{--                                                <option>Business</option>--}}
{{--                                                <option>Enterprise</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>
                            </form>
                        </div>
            </section>
        <section class="section bg-gray">
            <div class="container">
                <div class="row gap-y">
                    @for($i = 0; $i < 10; $i++)
                        <div class="col-md-6 col-xl-4">
                            <div class="product-3 mb-3">
                                <a class="product-media" href="item.html">
                                    <span class="badge badge-pill badge-primary badge-pos-left">New</span>
                                    <img src="/img/PHP-Course.png" alt="product">
                                </a>

                                <div class="product-detail">
                                    <h6><a href="#">Apple EarPods</a></h6>
                                    <div class="product-price">$160</div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>


                <nav class="mt-7">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#">
                                <span class="fa fa-angle-left"></span>
                            </a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <span class="fa fa-angle-right"></span>
                            </a>
                        </li>
                    </ul>
                </nav>


            </div>
        </section>

    </main>
@endsection
