@extends('dashboard.layout.master')

@section('title')
    @lang('page.add_service')
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
        CKEDITOR.replace('service_condition_ar', {
            uiColor: '#FFFFFF',
            language: 'ar',
            removeButtons: 'PasteFromWord'
        });
        CKEDITOR.replace('service_condition_en', {
            uiColor: '#FFFFFF',
            removeButtons: 'PasteFromWord'
        });

        function getId(id)
        {
            alert(id)
        }
    </script>

@endpush

@section('content')

    <h4 class="fw-bold py-3 mb-4">
        <span class="fw-light">
           @lang('page.services') / @lang('page.add_service')
        </span>
    </h4>

    <x-alert/>

    <div class="row">
        <div class="col-lg">
            @include('dashboard.partial.add-service')
        </div>
    </div>

@stop
