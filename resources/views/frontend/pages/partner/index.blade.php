@extends('frontend.layout.master')

@section('title')
    @lang('page.partner')
@stop

@push('scripts_after')
    <script src="{{ asset('js/success-story.js') }}"></script>
@endpush

@section('landing')
    <!-- Start Landing Section  -->
    <section class="landing bg-linear-gradient partner" style="background-image: url({{ asset('images/news1.png') }});">

        <!-- Start Header Section  -->
        @include('frontend.layout.header')
        <!-- End Header Section  -->

        <!-- Start Navigation Section  -->
        @include('frontend.layout.navigation')
        <!-- End Navigation Section  -->

    </section>

    <!-- Start advantage Section  -->
    <section class="card__section">
        <img class="layer-9" src="{{ asset('images/bg-service-page.png') }}" alt="background" style="right: @if(app()->getLocale() == 'en') 0 @endif;">
        <div class="card__content row">

            <img class="bg-card-left" src="{{ asset('images/layer-7.png') }}" alt="background">

            <div class="card__title">
                <h1> @lang('content.partner')</h1>
            </div>

            @foreach($partners as $partner)
                <div class="section-box row">
                    <span class="section__number">{{ $loop->index + 1 }}</span>
                    <div class="col-lg-3 col-md-4 col-sm-4 col-12">
                        <div class="section__box">
                            <img src="{{ asset(\App\Enum\SettingEnum::PATH_PARTNER_IMAGE.'/'.$partner->image) }}" alt="master card img">
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-8 col-12 section__details">
                        <h1 class="title">{{ $partner->name }}</h1>
                        <p class="desc">{{ $partner->desc }}</p>
                    </div>
                </div>
            @endforeach

            {{-- section 3  --}}
            <div class="section-box row">
                <span class="section__number">3</span>
                <div class="col-lg-3 col-12">
                    <h1 class="section__title">البنوك المرسلة</h1>
                </div>
                <div class="col-lg-9 col-12 section__details">
                    <h1 class="title">المملكة العربية السعودية</h1>
                    <div class="section__boxes">
                        <div class="section__box">
                            <img src="{{ asset('uploads/partners/b1.png') }}" alt="master card img">
                        </div>
                        <div class="section__box">
                            <img src="{{ asset('uploads/partners/b2.png') }}" alt="master card img">
                        </div>
                        <div class="section__box">
                            <img src="{{ asset('uploads/partners/b3.png') }}" alt="master card img">
                        </div>
                    </div>

                    <h1 class="title">مملكة البحرين</h1>
                    <div class="section__boxes">
                        <div class="section__box">
                            <img src="{{ asset('uploads/partners/b4.png') }}" alt="master card img">
                        </div>
                        <div class="section__box">
                            <img src="{{ asset('uploads/partners/mony.png') }}" alt="master card img">
                        </div>
                        <div class="section__box">
                            <img src="{{ asset('uploads/partners/mony.png') }}" alt="master card img">
                        </div>
                    </div>

                    <h1 class="title">تركيا</h1>
                    <div class="section__boxes">
                        <div class="section__box">
                            <img src="{{ asset('uploads/partners/b1.png') }}" alt="master card img">
                        </div>
                        <div class="section__box">
                            <img src="{{ asset('uploads/partners/b3.png') }}" alt="master card img">
                        </div>
                    </div>

                    <h1 class="title">الامارات العربية المتحدة</h1>
                    <div class="section__boxes">
                        <div class="section__box">
                            <img src="{{ asset('uploads/partners/b5.png') }}" alt="master card img">
                        </div>
                    </div>

                </div>
            </div>

            <x-share-section/>

        </div>

        <img class="layer-7" src="http://127.0.0.1:8000/images/layer-7.png" alt="background">

    </section>
    <!-- End Landing Section -->


@stop

