@extends('dashboard.layout.master')

@section('title')
    Manage Regions
@stop

@section('content')

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">@lang('page.service_points') / @lang('page.manage_regions')</span></h4>

    {{-- Start Country Table --}}
    <div class="row">
        <div class="col-lg">
            @include('dashboard.partial.countries-card')
        </div>
        <div class="col-lg">
            @include('dashboard.partial.cities-card')
        </div>
    </div>
    {{-- End Country Table --}}

@stop
