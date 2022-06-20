@extends('dashboard.layout.master')

@section('title')
    @lang('page.exchange_rate')
@stop

@push('scripts_after')
    @include('dashboard.script.exchange-rate')
@endpush

@section('content')

    <h4 class="fw-bold py-3 mb-4">
        <span class="fw-light">
           @lang('page.exchange_rate')
        </span>
    </h4>

    <x-alert/>

    <div class="row">
        <div class="col-lg">
            @include('dashboard.partial.exchange_rates')
        </div>
    </div>

@stop
