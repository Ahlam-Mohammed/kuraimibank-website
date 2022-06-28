@extends('dashboard.layout.master')

@section('title')
    @lang('page.vision')
@stop

@section('content')

    <h4 class="fw-bold py-3 mb-4">
        <span class="fw-light">
           @lang('page.web_info') / @lang('page.vision')
        </span>
    </h4>

    <x-alert/>

    <div class="row">
        <div class="col-lg">
            @include('dashboard.partial.web_info.vision')
        </div>
    </div>

@stop
