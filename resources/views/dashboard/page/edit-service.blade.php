@extends('dashboard.layout.master')

@section('title')
    @lang('page.edit_service')
@stop

@push('scripts_after')
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('other_advantage_ar', {
            uiColor: '#FFFFFF',
            language: 'ar',
            removeButtons: 'PasteFromWord'
        });
        CKEDITOR.replace('other_advantage_en', {
            uiColor: '#FFFFFF',
            removeButtons: 'PasteFromWord'
        });
    </script>

@endpush

@section('content')

    <h4 class="fw-bold py-3 mb-4">
        <span class="fw-light">
           @lang('page.services') / @lang('page.edit_service')
        </span>
    </h4>

    <x-alert/>

    <div class="row">
        <div class="col-lg">
            @include('dashboard.partial.edit-service')
        </div>
    </div>

@stop
