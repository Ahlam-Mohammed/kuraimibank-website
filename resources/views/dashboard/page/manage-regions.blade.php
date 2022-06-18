@extends('dashboard.layout.master')

@section('title')
    @lang('page.manage_regions')
@stop

@push('scripts_after')
    @include('dashboard.script.county')
    @include('dashboard.script.city')
@endpush

@section('content')

    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">
            @lang('page.service_points') / @lang('page.manage_regions')
        </span>
    </h4>

    <x-alert />

    <div class="row">
        <div class="col-lg">
            @include('dashboard.partial.countries')
        </div>
        <div class="col-lg">
            @include('dashboard.partial.cities')
        </div>
    </div>

@stop
