@extends('dashboard.layout.master')

@section('title')
    @lang('page.categories')
@stop

@push('scripts_after')
    @include('dashboard.script.category')
@endpush

@section('content')

    <h4 class="fw-bold py-3 mb-4">
        <span class="fw-light">
           @lang('page.categories')
        </span>
    </h4>

    <x-alert/>

    <div class="row">
        <div class="col-lg">
            @include('dashboard.partial.categories')
        </div>
    </div>

@stop
