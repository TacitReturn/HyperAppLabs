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
        @if(Illuminate\Support\Facades\Route::is("trashed-posts.index"))
            <form action="{{ route('posts.deleteAllDestroyed') }}" method="POST">
                @method("DELETE")
                @csrf
                <button class="btn btn-danger btn-sm" type="submit">Delete All</button>
            </form>
        @else
            <a href="{{ route('posts.create') }}" class="btn btn-success btn-sm">Create Post</a>
        @endif
    </div>
    <div class="card card-default">
        <div class="card-header">Posts</div>
        <div class="card-body">
            @if ($posts->count() > 0)
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
                    @foreach ($posts as $post)
                        <tr>
                            <th scope="row">{{ $post->title }}</th>
                            <td colspan="1">
                                {{ $post->published_at }}
                            </td>
                            <td colspan="1">
                                <img
                                        src="{{ secure_asset('storage/'.$post->image) }}"
                                        alt="post image"
                                        height="60" width="60">
                            </td>
                            <td class="text-sm" colspan="1">
                                <a class="btn btn-success btn-sm" href="{{ route("categories.edit", $post->category->id) }}">{{ $post->category->name }}</a>
                            </td>
                            @if (!$post->trashed())
                                <td colspan="1">
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-info">Edit</a>
                                </td>
                            @endif
                            @if ($post->trashed())
                                <td colspan="1">
                                    <form action="{{ route("restore-posts", $post->id) }}" method="POST">
                                        @csrf
                                        @method("PUT")
                                        <button class="btn btn-sm btn-success">Restore</button>
                                    </form>
                                </td>
                            @endif
                            <td colspan="">
                                <button onclick="handleDelete({{ $post->id }})" type="button"
                                        class="btn btn-danger btn-sm"
                                        data-bs-toggle="modal" data-bs-target="#deleteModal">
                                    {{ $post->trashed() ? "Delete" : "Trash" }}
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
                                        <form method="POST" id="formPostId">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-danger">
                                                {{ $post->trashed() ? "delete" : "trash" }}
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
        let form = document.getElementById("formPostId")
        form.action = "/posts/" + id
      }
    </script>
    <script type="text/javascript" src="trix.js" defer></script>
@endsection
