@extends("layouts.blog")
@section("title")
    Hyper App Labs
@endsection
@section("header")
    <!-- Header -->
    <header class="header text-center text-white"
            style="background-image: linear-gradient(to right top, #051937, #14203b, #1f273f, #292e44, #333648);">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <p class="lead-5">Welcome to Hyper App Labs</p>
                    <p class="lead-2 opacity-90 mt-6">
                        Learn web development,  CI/CD and more..
                    </p>
                </div>
                <div class="col-md-8 mx-auto">
                    <p class="lead-2 opacity-90 mt-6">
                        Join our email list to get updated when we create new material.
                    </p>
                    @if (session("message"))
                        <p class="text-muted">
                            {{ session("message") }}
                        </p>
                    @endif
                    @if ($errors->any())
                        <div>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <p class="text-muted">
                                        {{ $error }}
                                    </p>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('emails.store') }}" class="input-group" method="POST">
                        @csrf
                        <input type="text"
                               class="form-control"
                               name="email"
                               placeholder="email address"
                        >
                        <button type="submit" class="btn btn-success btn-sm">
                            Join
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header><!-- /.header -->
@endsection

@section("content")
    <!-- Main Content -->
    <main class="main-content">
        @include("partials.success")
        @include("partials.errors")
        <div class="section bg-gray">
            <div class="container">
                <div class="m-3">
                    <h6 class="sidebar-title">Search</h6>
                    <form class="input-group" target="#" method="GET">
                        <input type="text"
                               class="form-control"
                               name="client-search"
                               placeholder="Enter a blog title here.."
                               value="{{ request("client-search") }}"
                        >
                    </form>
                </div>
                <div class="row">
                    <div class="col-md-8 col-xl-9">
                        <div class="row gap-y">
                            @if ($posts->count() > 0)
                                @foreach ($posts as $post)
                                    <div class="col-md-6">
                                        <div class="card border hover-shadow-6 mb-6 d-block">
                                            @if ($post->is_premium)
                                                <div class="m-3">
                                                   <a
                                                   href="{{ route("blog-post.show", $post->id) }}"
                                                   class="m-2 float-right badge badge-pill badge-success">
                                                        Premium
                                                   </a>
                                                </div>
                                            @endif
                                            <img class="card-img-top" src="{{ url("storage/{$post->image}") }}"
                                                 alt="post image cap">
                                            <div class="p-6 text-center">
                                                <p>
                                                    <a class="small-5 text-lighter text-uppercase ls-2 fw-400"
                                                       href="">
                                                        {{ $post->category->name }}
                                                    </a>
                                                </p>
                                                <p class="mb-0 lead-3">
                                                    <a class="text-dark"
                                                       href="{{ route("blog-post.show", $post->id) }}">
                                                        {{ \Illuminate\Support\Str::limit($post->title, 35) }}
                                                    </a>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p class="lead">
                                    No Posts
                                </p>
                            @endif
                        </div>
                        <div class="d-flex justify-content-center">
                            <div>
                                {{ $posts->links() }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xl-3">
                        <div class="sidebar px-4 py-md-0">
                            <hr/>
                            <h6 class="sidebar-title">About</h6>
                            <p class="small-3">
                                <img src="{{ asset("img/bio-min.jpg") }}" alt="bio">
                                {{ $bio->bio }}
                            </p>
                            <hr/>
                            <h6 class="sidebar-title">Categories</h6>
                            <div class="row link-color-default fs-14 lh-24">
                                @foreach ($categories as $category)
                                    <div class="col-6"><a href="{{ route('blog.index') }}">
                                            {{ $category->name }}
                                        </a></div>
                                @endforeach
                            </div>
                            <hr>
                            <h6 class="sidebar-title">Tags</h6>
                            <div class="row link-color-default fs-14 lh-24">
                                @foreach ($tags as $tag)
                                    <div class="col-12">
                                        <a href="{{ route('blog.index') }}">
                                            {{ $tag->name }}
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
