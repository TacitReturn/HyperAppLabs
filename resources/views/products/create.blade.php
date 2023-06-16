@extends("layouts.app")
@section("styles")
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section("content")
    <div class="card card-default">
        <div class="card-header lead text-center pb-5">
            <p>{{ isset($product) ? "Edit post": "Create post" }}</p>
        </div>
        {{--        <div class="card-body">--}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="list-group">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="m-1" class="mt-5"
              action="{{ isset($product) ? route('posts.update', $product->id) : route('posts.store') }}"
              method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($product))
                @method("PUT")
            @endif
            <div class="mb-3">
                <label for="category">Category</label>
                <select name="category" id="category" class="form-control">
{{--                    @foreach($categories as $category)--}}
{{--                        <option value="{{ $category->id }}"--}}
{{--                                @if(isset($product) && $category->id === $product->category_id)--}}
{{--                                selected--}}
{{--                                @endif--}}
{{--                        >--}}
{{--                            {{ $category->name }}--}}
{{--                        </option>--}}
{{--                    @endforeach--}}
                </select>
            </div>
{{--            @if($tags->count() > 0)--}}
{{--                <div class="mb-3">--}}
{{--                    <label for="tags">Tags</label>--}}
{{--                    <select id="tags" class="tags-selector form-control" name="tags[]" multiple>--}}
{{--                        @foreach($tags as $tag)--}}
{{--                            <option value="{{ $tag->id }}"--}}
{{--                                    @if(isset($product) && $product->hasTag($tag->id))--}}
{{--                                    selected--}}
{{--                                    @endif--}}
{{--                                    {{ $tag->name }}--}}
{{--                            >--}}
{{--                                {{ $tag->name }}--}}
{{--                            </option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--            @endif--}}
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input value="{{ isset($product) ? $product->title : '' }}" name="title" type="text"
                       class="form-control" id="title">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" type="text" class="form-control"
                          id="description">{{ isset($product) ? $product->description : '' }}</textarea>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <input value="{{ isset($product) ? $product->content : "" }}" id="content" class="form-control trix-content"
                       type="hidden" name="content">
                <trix-editor class="trix-editor" input="content"></trix-editor>
            </div>
            <div class="mb-3">
                <label for="published_at" class="form-label">Published At</label>
                <input value="{{ isset($product) ? $product->published_at : "" }}" class="form-control" id="published_at"
                       name="published_at" type="text">
            </div>
            <div class="mb-3">
                @if(isset($product->image))
                    <img src="{{ asset('storage/'.$product->image) }}" style="width: 100%" alt="post image">
                    <label for="image" class="form-label">Image</label>
                    <input name="image" type="file" class="form-control" id="image">
                @else
                    <label for="image" class="form-label">Image</label>
                    <input name="image" type="file" class="form-control" id="image">
                @endif
            </div>
            <div>
                <button type="submit" class="btn btn-success btn-block">
                    {{ isset($product) ? 'Update' : 'Create' }} Post
                </button>
            </div>
        </form>
    </div>
    {{--    </div>--}}
@endsection

@section("scripts")
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
      flatpickr("#published_at", {
        enableTime: true,
        enableSeconds: true,
      })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>

    <script>
      $(document).ready(function() {
        $('.tags-selector').select2();
      });
    </script>
@endsection

{{--Apply this class name to your <trix-editor> element, and to a containing element when you render stored Trix content for display in your application.--}}

