@extends('dashboard.layout.master')

@section('title')
    @lang('page.jobs')
@stop

@section('content')

    <h4 class="fw-bold py-3 mb-4">
        <span class="fw-light">
            @lang('page.jobs')
        </span>
    </h4>

    <x-alert />

    <div class="row">
        <div class="col-lg">
            @include('dashboard.partial.job')
        </div>
    </div>

@stop
