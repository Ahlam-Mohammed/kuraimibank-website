@extends('dashboard.layout.master')

@section('title')
    @lang('page.user')
@stop

@push('scripts_after')
    @include('dashboard.script.roles')
@endpush

@section('content')

    <h4 class="fw-bold py-3 mb-4">
        <span class="fw-light">
           @lang('page.user')
        </span>
    </h4>

    <x-alert/>

    <div class="row">
        <div class="col-lg">
            @include('dashboard.partial.user.roles')
        </div>
    </div>

@stop
