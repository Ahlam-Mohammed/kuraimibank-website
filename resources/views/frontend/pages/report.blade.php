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
                @foreach($reports as $report)
                    <article class="col-lg-4 col-md-4 col-sm-6 col-12 ">
                        <div class="box" style="background-image: url({{ asset('images/pdf.png') }})">
                            <h1 class="box__year">{{ $report->year }}</h1>
                            <p class="box__title">{{ $report->name }}</p>
                            <a href="{{ asset('uploads/pdf/'.$report->file) }}" download target="_blank" class="box__link"><i class="bi bi-arrow-left"></i>استعراض</a>
                        </div>
                    </article>
                @endforeach
            </div>

            <x-share-section/>
        </div>

        <img class="layer-12" src="{{ asset('images/layer-7.png') }}" alt="background">


    </section>
    <!-- End Landing Section -->

@stop

