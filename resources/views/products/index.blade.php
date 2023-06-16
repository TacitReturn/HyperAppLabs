@extends("layouts.app")
<link rel="stylesheet" type="text/css" href="trix.css">
<style>
    table {
        table-layout: fixed;
        over-flow: break-word;
        width: 100%;
    }
</style>
@section("content")
    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('products.create') }}" class="btn btn-success">Create Product</a>
    </div>
    <div class="card card-default">
        <div class="card-header">Products</div>
        <div class="card-body">
            @if($products->count() > 0)
                <table class="table w-full">
                    <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Published Date</th>
                        <th scope="col">Image</th>
                        <th scope="col">Category</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <th scope="row">{{ $product->title }}</th>
                            <td colspan="1">
                                {{ $product->published_at }}
                            </td>
                            <td colspan="1">
                                <img
                                        src="{{ secure_asset('storage/'.$product->image) }}"
                                        alt="post image"
                                        height="60" width="60">
                            </td>
                            <td class="text-sm" colspan="1">
                                <a class="btn btn-success btn-sm" href="#">{{ $product->title}}</a>
                            </td>
{{--                            @if(!$product->trashed())--}}
{{--                                <td colspan="1">--}}
{{--                                    <a href="{{ route('posts.edit', $product->id) }}" class="btn btn-sm btn-info">Edit</a>--}}
{{--                                </td>--}}
{{--                            @endif--}}
{{--                            @if($product->trashed())--}}
{{--                                <td colspan="1">--}}
{{--                                    <form action="{{ route("restore-posts", $product->id) }}" method="POST">--}}
{{--                                        @csrf--}}
{{--                                        @method("PUT")--}}
{{--                                        <button class="btn btn-sm btn-success">Restore</button>--}}
{{--                                    </form>--}}
{{--                                </td>--}}
{{--                            @endif--}}
                            <td colspan="">
                                <button onclick="handleDelete({{ $product->id }})" type="button"
                                        class="btn btn-danger btn-sm"
                                        data-bs-toggle="modal" data-bs-target="#deleteModal">
{{--                                    {{ $product->trashed() ? "Delete" : "Trash" }}--}}
                                </button>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete post</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this post?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-info" data-bs-dismiss="modal">No</button>
                                        <form method="POST" id="formProductId">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-danger">
{{--                                                {{ $product->trashed() ? "delete" : "trash" }}--}}
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="text-center">
                    <p class="lead">No Posts</p>
                </div>
        @endif
        <!-- Button trigger modal -->
        </div>
    </div>
@endsection

@section("scripts")
    <script>
      function handleDelete (id) {
        let form = document.getElementById("formProductId")
        form.action = "/products/" + id
      }
    </script>
    <script type="text/javascript" src="trix.js" defer></script>
@endsection
