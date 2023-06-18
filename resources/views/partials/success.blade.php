@if (session()->has("status"))
    <div class="alert alert-success">
        <p class="text-center">
            {{ session()->get("status") }}
        </p>
    </div>
@endif
