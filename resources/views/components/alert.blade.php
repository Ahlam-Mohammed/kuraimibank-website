<div {{ $attributes->merge(['class' => 'alert alert-dismissible alert-'.$type]) }} role="alert">
    {{ $message }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
