@extends("layouts.hyperapp")
@section("content")
<main class="main-content">
    <div class="bg-white rounded shadow-7 w-400 mw-100 p-6 mx-auto mt-10">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">
                    <p class="text-center">
                        {{ $error }}
                    </p>
                </div>
            @endforeach
        @enderror
        <h5 class="mb-7">Sign into your account</h5>

        <form action="/members/login" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" name="email" placeholder="email">
            </div>

            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="password">
            </div>

            <div class="form-group flexbox py-3">
                <div class="custom-control custom-checkbox">
                    <input name="remember" type="checkbox" class="custom-control-input" checked>
                    <label class="custom-control-label">Remember me</label>
                </div>

{{--                <a class="text-muted small-2" href="user-recover.html">Forgot password?</a>--}}
            </div>

            <div class="form-group">
                <button class="btn btn-block btn-primary" type="submit">Login</button>
            </div>
        </form>

        <div class="divider">Or Login With</div>
        <div class="text-center">
            <a href="#">
                <img width="30px" src="/img/logos/GitHub.png">
            </a>
        </div>

        <hr class="w-30">

        <p class="text-center text-muted small-2">Don't have an account? <a href={{ route("members.register") }}>Register here</a></p>
    </div>
</main>

</body>
</html>

@endsection()
