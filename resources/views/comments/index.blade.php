@extends("layouts.app")
@section("content")
    <div class="card card-default">
        <div class="card-header">Comments</div>
        <div class="card-body">
            @if($comments->count() > 0)
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Content</th>
                        <th scope="col">Published</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($comments as $comment)
                        <tr>
                            <th scope="row">{{ $comment->name }}</th>
                            <td>
                                <p>{{ $comment->email }}</p>
                            </td>
                            <td colspan="1">
                                <p>{{ $comment->content }}</p>
                            </td>
                            <td>{{ $comment->isPublished ? "true" : "false" }}</td>
                            <td colspan="1">
                                @if($comment->isPublished)
                                    <form method="POST" action="{{ route('comments.unpublish', $comment->id) }}">
                                        @csrf
                                        @method("PUT")
                                        <button type="submit" class="btn btn-danger btn-sm">Unpublish</button>
                                    </form>
                                @else
                                    <form method="POST" action="{{ route('comments.publish', $comment->id) }}">
                                        @csrf
                                        @method("PUT")
                                        <button type="submit" class="btn btn-success">Publish</button>
                                    </form>
                                @endif
                            </td>
                            <td colspan="1">
                                <button onclick="handleDelete({{ $comment->id }})" type="button"
                                        class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="text-center">
                    <p class="lead">No comments</p>
                </div>
        @endif

        <!-- Button trigger modal -->
            <!-- Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete comment</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this post?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info" data-bs-dismiss="modal">No</button>
                            <form method="POST" id="formCommentId">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger">Yes Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("scripts")
    <script>
      function handleDelete (id) {
        let form = document.getElementById("formCommentId")
        form.action = "/comments/" + id
      }
    </script>
@endsection
