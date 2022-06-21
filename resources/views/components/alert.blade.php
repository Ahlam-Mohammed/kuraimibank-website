<div class="alert alert-dismissible" role="alert" style="display:none">
    <div id="span">

    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@if(session()->has('success'))
    <div class="alert alert-dismissible alert-primary" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
