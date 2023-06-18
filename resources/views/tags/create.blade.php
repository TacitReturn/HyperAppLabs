@extends("layouts.app")
@section("content")
    <div class="card card-default">
        <div class="card-header">
            {{ isset($tag) ? "Edit Tag": "Create Tag" }}
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-group">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ isset($tag) ? route('tags.update', $tag->id) : route('tags.store') }}"
                  method="POST">
                @csrf
                @if (isset($tag))
                    @method("PUT")
                @endif
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ isset($tag) ? $tag->name : '' }}" name="name" type="text"
                           class="form-control" id="name" placeholder="Enter tag name..">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">
                        {{ isset($tag) ? 'Update' : 'Create' }} Tag
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
