@extends('dashboard.layout.master')

@section('title')
    @lang('page.principle')
@stop

@push('scripts_after')
    @include('dashboard.script.principle')
@endpush

@section('content')

    <h4 class="fw-bold py-3 mb-4">
        <span class="fw-light">
           @lang('page.web_info') / @lang('page.principle')
        </span>
    </h4>

    <x-alert/>

    <div class="row">
        <div class="col-lg">
            @include('dashboard.partial.web_info.principles')
        </div>
    </div>

@stop
