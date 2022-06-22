<div {{ $attributes }} class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">

                {{-- Model Title --}}
                <h5 class="modal-title" id="modalCenterTitle">@lang('general.'.$title)</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form enctype="multipart/form-data">
                @csrf
                {{-- Model Body --}}
                <div class="modal-body"> {{ $body }} </div>

                {{-- Model Footer --}}
                <div class="modal-footer"> {{ $footer }} </div>

            </form>
        </div>
    </div>
</div>
