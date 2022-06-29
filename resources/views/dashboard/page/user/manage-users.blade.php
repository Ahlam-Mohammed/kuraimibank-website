@extends('dashboard.layout.master')

@section('title')
    @lang('page.users')
@stop

@section('content')

    <h4 class="fw-bold py-3 mb-4">
        <span class="fw-light">
           @lang('page.users')
        </span>
    </h4>

    <x-alert/>

    <div class="row">
        <div class="col-lg">
            @include('dashboard.partial.user.users')
        </div>
    </div>

@stop
