@extends('dashboard.layout.master')

@section('title')
    @lang('page.service_points')
@stop

@push('scripts_after')
    @include('dashboard.script.service-point')
@endpush

@section('content')

    <h4 class="fw-bold py-3 mb-4">
        <span class="fw-light">
            @lang('page.service_points')
        </span>
    </h4>

    <x-alert />

    <div class="row">
        <div class="col-lg">
            @include('dashboard.partial.service-point')
        </div>
    </div>

@stop
