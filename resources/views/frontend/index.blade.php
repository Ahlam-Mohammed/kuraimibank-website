@extends('frontend.layout.master')

    @section('title')
        @lang('page.home')
    @stop

    @section('landing')
        <!-- Start Landing Section  -->
        <section class="landing" style="background-image: url({{ asset('images/2.jpg') }});">

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
        @include('frontend.pages.home.currency')
    @stop

    @section('content')

        {{--  Main services Section    --}}
        @include('frontend.pages.home.main-service')

        {{--  Kuraimi App Section    --}}
        @include('frontend.pages.home.app')

        {{--  News Section    --}}
        @include('frontend.pages.home.news')

        {{--  Kuraimi Successfully Section    --}}
        @include('frontend.pages.home.successfully')

        {{--  Service Points Section    --}}
        @include('frontend.pages.home.service-points')

    @endsection
