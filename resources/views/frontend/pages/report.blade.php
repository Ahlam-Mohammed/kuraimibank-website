@extends('frontend.layout.master')

@section('title')
    التقارير المالية
@stop

@push('scripts_after')
    <script src="{{ asset('js/home.js') }}"></script>
@endpush

@section('landing')
    <!-- Start Landing Section  -->
    <section class="landing bg-linear-gradient report" style="background-image: url({{ asset('images/news1.png') }});">

        <!-- Start Header Section  -->
        @include('frontend.layout.header')
        <!-- End Header Section  -->

        <!-- Start Navigation Section  -->
        @include('frontend.layout.navigation')
        <!-- End Navigation Section  -->

    </section>

    <!-- Start advantage Section  -->
    <section class="card__section report">
        <img class="layer-9" src="{{ asset('images/bg-service-page.png') }}" alt="background">

        <div class="card__content row">

            <img class="bg-card-left" src="{{ asset('images/layer-7.png') }}" alt="background">

            <div class="card__title">
                <h1>التقارير المالية</h1>
            </div>

            <div class="row report">
                <article class="col-3 box">
                    <h1 class="box__year">2018</h1>
                    <p class="box__title">التقارير المالية 2018</p>
                    <a class="box__link">استعراض</a>
                </article>
                <article class="col-3 box">
                    <h1 class="box__year">2018</h1>
                    <p class="box__title">التقارير المالية 2018</p>
                    <a class="box__link">استعراض</a>
                </article>
                <article class="col-3 box">
                    <h1 class="box__year">2018</h1>
                    <p class="box__title">التقارير المالية 2018</p>
                    <a class="box__link">استعراض</a>
                </article>
            </div>

            <div class="row report">
                <article class="col-3 box">
                    <h1 class="box__year">2018</h1>
                    <p class="box__title">التقارير المالية 2018</p>
                    <a class="box__link">استعراض</a>
                </article>
                <article class="col-3 box">
                    <h1 class="box__year">2018</h1>
                    <p class="box__title">التقارير المالية 2018</p>
                    <a class="box__link">استعراض</a>
                </article>
                <article class="col-3 box">
                    <h1 class="box__year">2018</h1>
                    <p class="box__title">التقارير المالية 2018</p>
                    <a class="box__link">استعراض</a>
                </article>
            </div>

            <x-share-section/>
        </div>

        <img class="layer-12" src="{{ asset('images/layer-7.png') }}" alt="background">


    </section>
    <!-- End Landing Section -->

@stop

