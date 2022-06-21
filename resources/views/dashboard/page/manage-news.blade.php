@extends('dashboard.layout.master')

@section('title')
    @lang('page.news')
@stop

@push('scripts_after')
    @include('dashboard.script.news')
@endpush

@section('content')

    <h4 class="fw-bold py-3 mb-4">
        <span class="fw-light">
           @lang('page.news')
        </span>
    </h4>

    <x-alert/>

    <div class="row">
        <div class="col-lg">
            @include('dashboard.partial.news')
        </div>
    </div>

@stop
