@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('My Profile') }}</div>
                <div class="card-body">
                    <form action="{{ route('users.update-profile') }}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="form-group mb-3">
                            <label for="avatar" class="form-label">Avatar</label>
                            @if ($user->avatar)
                                <img width="150" class="img-thumbnail" src="{{ asset('storage/' . $user->avatar) }}" alt="user avatar">
                            @else
                                <img src="" alt="">
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input class="form-control" type="text" name="name" id="name"
                                   value="{{ auth()->user()->name }}"/>
                        </div>
                        <div class="form-group mb-3">
                            <label for="about">About</label>
                            <textarea class="form-control" name="about" id="about" cols="5"
                                      rows="5">{{ $user->about }}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
