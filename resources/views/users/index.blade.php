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
        <a href="{{ route("posts.create") }}" class="btn btn-success">Create Post</a>
    </div>
    <div class="card card-default">
        <div class="card-header">Posts</div>
        <div class="card-body">
            @if ($users->count() > 0)
                <table class="table w-full">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Avatar</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $user->name }}</th>
                            <td colspan="1"></td>
                            <td colspan="1">
                                {{ $user->email }}
                            </td>
                            <td class="text-sm" colspan="1">
                                {{ $user->role }}
                            </td>
                            <td colspan="1">
                                @if (!$user->isAdmin())
                                    <form action="{{ route("users.make-admin", $user->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-danger btn-sm" type="submit">Make Admin</button>
                                    </form>
                                @else
                                    <form action="{{ route("users.make-writer", $user->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-success btn-sm" type="submit">Make Writer</button>
                                    </form>
                                @endif
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
                                        Are you sure you want to delete this user?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-info" data-bs-dismiss="modal">No</button>
                                        <form method="POST" id="formPostId">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-danger">
                                                {{--                                                {{ $user->trashed() ? "delete" : "trash" }}--}}
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
        console.log(id)
        let form = document.getElementById("formPostId")
        form.action = "/posts/" + id
      }
    </script>
@endsection
