@if(session()->has("error"))
    <div class="alert alert-danger">
        <p class="text-center">
            {{ session()->get("error") }}
        </p>
    </div>
@endif
