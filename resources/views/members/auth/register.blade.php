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
        <h5 class="mb-7">Create an account</h5>

        <form action="/members/register" method="POST">
            @csrf
            <div class="form-group">
                <input value="{{ old('name') }}" type="text" class="form-control" name="name" placeholder="Your Name">
            </div>

            <div class="form-group">
                <input value="{{ old('email') }}"  type="email" class="form-control" name="email" placeholder="Email Address">
            </div>

            <div class="form-group">
                <input value="{{ old('password') }}"  type="password" class="form-control" name="password" placeholder="Password">
            </div>

            <div class="form-group">
                <input value="{{ old('password_confirm') }}"  type="password" class="form-control" name="password_confirm" placeholder="Password (confirm)">
            </div>

            <div class="form-group">
                <button class="btn btn-block btn-primary" type="submit">Register</button>
            </div>
        </form>

        <hr class="w-30">

        <p class="text-center text-muted small-2">Already a member? <a href="{{ route('members.login') }}">Login here</a></p>
    </div>

</main>
</body>
</html>

@endsection()
