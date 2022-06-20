@extends('dashboard.layout.master')

@section('title')
    @lang('page.services')
@stop

@push('scripts_after')
    @include('dashboard.script.service')
@endpush

@section('content')

    <h4 class="fw-bold py-3 mb-4">
        <span class="fw-light">
            @lang('page.services')
        </span>
    </h4>

    <x-alert/>

    <div class="row">
        <div class="col-lg">
            @include('dashboard.partial.services')
        </div>
    </div>

@stop
