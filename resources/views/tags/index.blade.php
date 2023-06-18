@extends("layouts.app")
@section("content")
    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('tags.create') }}" class="btn btn-success">Create Tag</a>
    </div>
    <div class="card card-default">
        <div class="card-header">Categories</div>
        <div class="card-body">
            @if ($tags->count() > 0)
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Post Count</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <th scope="row">{{ $tag->name }}</th>
                            <td>
                                <p>{{ $tag->posts->count() }}</p>
                            </td>
                            <td colspan="1">
                                <a href="{{ route('tags.edit', $tag) }}" class="btn btn-info">Edit</a>
                            </td>
                            <td colspan="1">
                                <button onclick="handleDelete({{ $tag->id }})" type="button"
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
                    <p class="lead">No Tags</p>
                </div>
        @endif

        <!-- Button trigger modal -->
            <!-- Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this tag?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info" data-bs-dismiss="modal">No</button>
                            <form method="POST" id="formCategoryId">
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
        let form = document.getElementById("formCategoryId")
        form.action = "/tags/" + id
      }
    </script>
@endsection
