@extends('dashboard.layout.master')

@section('title')
    @lang('page.sub_categories')
@stop

@push('scripts_after')
    @include('dashboard.script.sub-category')
@endpush

@section('content')

    <h4 class="fw-bold py-3 mb-4">
        <span class="fw-light">
            @lang('page.categories') / @lang('page.sub_categories')
        </span>
    </h4>

    <x-alert/>

    <div class="row">
        <div class="col-lg">
            @include('dashboard.partial.sub-categories')
        </div>
    </div>

@stop
