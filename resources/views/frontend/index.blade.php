@extends('frontend.layout.master')

    @section('title')
        @lang('الصفحة الرئيسيه')
    @stop

    @push('scripts_after')
        <script src="{{ asset('js/home.js') }}"></script>
    @endpush

    @section('landing')
        <!-- Start Landing Section  -->
        <section class="landing home" style="background-image: url({{ asset('images/2.jpg') }});">

            <!-- Start Header Section  -->
            @include('frontend.layout.header')
            <!-- End Header Section  -->

            <!-- Start Navigation Section  -->
            @include('frontend.layout.navigation')
            <!-- End Navigation Section  -->

            <!-- Start Landing Introduction Section  -->
            <article class="landing__intro">
                <h1>حساب في كل بيت يمني</h1>
                <p>يسهم في التنمية الإقتصادية والإجتماعية</p>
            </article>
            <!-- End Landing Introduction Section  -->

        </section>

        {{--  Currency Section    --}}
        @if(isset($rates))
            @include('frontend.pages.home.currency')
        @endif
    @stop

    @section('content')

        {{--  Main services Section    --}}
        @if(isset($services))
            @include('frontend.pages.home.main-service')
        @endif

        {{--  Kuraimi App Section    --}}
        @include('frontend.pages.home.app')

        {{--  News Section    --}}
        @if(isset($news))
            @include('frontend.pages.home.news')
        @endif

        {{--  Kuraimi Successfully Section    --}}
        @include('frontend.pages.home.successfully')

        {{--  Service Points Section    --}}
        @include('frontend.pages.home.service-points')

    @endsection
