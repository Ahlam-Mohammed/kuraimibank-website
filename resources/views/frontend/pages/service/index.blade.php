@extends('frontend.layout.master')

@section('title')
    {{ $service->name }}
@stop

@push('scripts_after')
    <script src="{{ asset('js/service.js') }}"></script>
@endpush

@section('landing')
    <!-- Start Landing Section  -->
    <section class="landing service" style="background-image: url({{ asset('images/bg-service-header.png') }});">

        {{-- Service Image --}}
        @if(isset($service->image))
            <img class="service--image" src="{{ asset(\App\Enum\SettingEnum::PATH_SERVICE_IMAGE.'/'.$service->image) }}" alt="service image">
        @endif

        <!-- Start Header Section  -->
        @include('frontend.layout.header')
        <!-- End Header Section  -->

        <!-- Start Navigation Section  -->
        @include('frontend.layout.navigation')
        <!-- End Navigation Section  -->

        <!-- Start Landing Introduction Section  -->
        <article class="landing__intro intro--service">
            @if(isset($service->name, $service->desc))
                <h1>{{ $service->name }}</h1>
                <p class="desc">{{ $service->desc }}</p>
            @endif
            <button class="btn btn-orange">طلب خدمة</button>
        </article>
        <!-- End Landing Introduction Section  -->
    </section>

    {{-- Service advantages --}}
    @include('frontend.pages.service.advantage')

@stop

@section('content')

    {{--  Features Section  --}}
    @include('frontend.pages.service.features')

    {{--  Short Description Section  --}}
    <section class="short-desc__section">
        <h1>خدمة مشروعي تتيح لك الفرصة</h1>
        <h1>لتحسين مشروعك الخاص وتطويره</h1>
    </section>

    {{--  Success stories Section  --}}
    @include('frontend.pages.service.success-stories')

    {{--  Other Services Section  --}}
    @include('frontend.pages.service.other-services')

@endsection
