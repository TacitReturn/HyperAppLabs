@extends("layouts.blog")
@section("title")
    {{ $post->title }}
@endsection

@section("header")
    <!-- Header -->
    <header class="header text-white h-fullscreen pb-80"
            style="background-image: url({{ secure_asset('storage/'.$post->image) }});"
            data-overlay="9">
        <div class="container text-center">

            <div class="row h-100">
                <div class="col-lg-8 mx-auto align-self-center">

                    <p class="opacity-70 text-uppercase small ls-1">
                        {{ $post->category->name }}
                    </p>
                    <h1 class="display-4 mt-7 mb-8 text-secondary">
                        {{ $post->title }}
                    </h1>
                    <p>
                        <span class="opacity-70 mr-1">By</span>
                        <a class="text-white" href="#">{{ $post->user->name }}</a>
                    </p>
                    <p class="opacity-70 text-uppercase small ls-1">
                        {{ $post->user->about }}
                    </p>

{{--                    <p>--}}
{{--                        TODO:// Insert user profile image here--}}
{{--                    <p>--}}
{{--                        <img class="avatar avatar-sm" src="{{ asset('storage/'.$post->user->avatar) }}" alt="post image">--}}
{{--                    </p>--}}
                </div>
                <div class="col-12 align-self-end text-center">
                    <a class="scroll-down-1 scroll-down-white" href="#section-content"><span></span></a>
                </div>
            </div>

        </div>
    </header><!-- /.header -->
    <div>
        @if ($viewsCount > 1)
            <div class="m-5 text-light text-center">This post has been viewed {{ $viewsCount }} times .</div>
        @else
            <div class="m-5 text-light text-center">You're the first reader of this post :)</div>
        @endif
    </div>
@endsection

@section("content")
    <!-- Main Content -->
    <main class="main-content">
        <!--
        |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
        | Blog content
        |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
        !-->
        <div class="section" id="section-content">
            <div class="container">
                <div class="gap-xy-2 mt-6 mb-6 col-lg-8 mx-auto">
                    @if ($post->video !== null)
                        <div>
                            <video
                                    id="video"
                                    class="video-js"
                                    controls
                                    preload="auto"
                                    width="740"
                                    height="264"
                                    poster="{{ url(secure_asset('storage/' . $post->image)) }}"
                            >
                                <source src="{{ url(secure_asset('storage/'.$post->video)) }}" type="video/mp4" />
                                <source src="{{ url(secure_asset('storage/'.$post->video)) }}" type="video/webm" />
                                <p class="vjs-no-js">
                                    To view this video please enable JavaScript, and consider upgrading to a
                                    web browser that
                                    <a href="https://videojs.com/html5-video-support/" target="_blank"
                                    >supports HTML5 video</a
                                    >
                                </p>
                            </video>
                        </div>
                    @endif
                    @foreach ($post->tags as $tag)
                        <a href="" class="badge badge-pill badge-secondary">
                            {{ $tag->name }}
                        </a>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-lg-12 mx-auto">
                        <p class="display-3 text-default">
                            {{ $post->description }}
                        </p>

                        <hr class="w-100px">

                        <p>
                            {!! $post->content !!}
                        </p>
                    </div>
                </div>
            </div>
            <!--
            |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
            | Comments
            |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
            !-->
            <div class="section bg-gray">
                <div class="container">

                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <div class="media-list">
                                @foreach ($post->comments as $comment)
                                    @if ($comment->isPublished)
                                        <div class="media">
                                            {{--<img class="avatar avatar-sm mr-4" src="../assets/img/avatar/1.jpg" alt="...">--}}
                                            <div class="media-body">
                                                <div class="small-1">
                                                    <strong>{{ $comment->name }}</strong>
                                                    <time class="ml-4 opacity-70 small-3" datetime="2018-07-14 20:00">
                                                        {{ $comment->created_at->diffForHumans() }}
                                                    </time>
                                                </div>
                                                <p class="small-2 mb-0 text-default">
                                                    {{ $comment->content }}
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <hr>
                            @if ($errors->any())
                                @foreach ($errors as $error)
                                    {{ $error }}
                                @endforeach
                            @endif
                            <form action="{{ route('comments.store', $post->id) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12 col-md-6">
                                        <input name="name" class="form-control" type="text" placeholder="Name">
                                    </div>

                                    <div class="form-group col-12 col-md-6">
                                        <input name="email" class="form-control" type="text" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea name="content" class="form-control" placeholder="Comment"
                                              rows="4"></textarea>
                                </div>
                                <button class="btn btn-primary btn-block" type="submit">Submit your comment</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection
