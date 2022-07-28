@extends("layouts.app")
@section("content")
    <div class="card card-default">
        <div class="card-header">
            {{ isset($category) ? "Edit Tag": "Create Tag" }}
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-group">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}"
                  method="POST">
                @csrf
                @if(isset($category))
                    @method("PUT")
                @endif
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ isset($category) ? $category->name : '' }}" name="name" type="text"
                           class="form-control" id="name" placeholder="Enter category name..">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">
                        {{ isset($category) ? 'Update' : 'Create' }} Tag
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
