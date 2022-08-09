@extends("layouts.app")

@section("content")
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __("Dashboard") }}</div>

                <div class="card-body d-flex justify-content-between">
                    <a href="{{ route("admin.migrate-database") }}" class="btn btn-success">Migrate Database</a>
                    <form action="admin/deploy-code" method="GET">
                        <button type="submit" class="btn btn-success">Deploy Code</button>
                    </form>
                    <a href="{{ route("admin.create-user") }}" class="btn btn-success">Create User</a>
                </div>
            </div>
        </div>
    </div>
@endsection
