@extends('frontend.layout.master')

@section('title')
    @lang('page.service_points')
@stop

@push('scripts_after')
    <script src="{{ asset('js/service.js') }}"></script>
@endpush

@section('landing')
    <!-- Start Landing Section  -->
    <section class="landing point">

        {{-- Service Image --}}
        <img class="service--image" src="{{ asset('images/service.png') }}" alt="service image">

        <!-- Start Header Section  -->
        @include('frontend.layout.header')
        <!-- End Header Section  -->

        <!-- Start Navigation Section  -->
        @include('frontend.layout.navigation')
        <!-- End Navigation Section  -->

        <!-- Start Landing Introduction Section  -->
        <article class="landing__intro intro--service">
            <h1>الفروع وماكينات الصرافة</h1>
            <p class="desc">خدماتنا قريبة منك ومتاحة في أكثر من
                ٦٠٠ نقطة حول الجمهورية اليمنية</p>
        </article>
        <!-- End Landing Introduction Section  -->
    </section>

    {{-- card --}}
    <section class="card__section point" style="background-image: url({{ asset('images/mapping.png') }})">
        <img class="layer-9" src="{{ asset('images/bg-service-page.png') }}" alt="background">

        <div class="card__content row">

            <img class="bg-card-left" src="{{ asset('images/layer-7.png') }}" alt="background">


            <article class="point-section row">
                <div class="item col-lg-3 col-md-6 col-sm-6 col-12">
                    <label>الدولة</label>
                    <select>
                        @foreach($countries as $country)
                            <option>{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="item col-lg-3 col-md-6 col-sm-6 col-12">
                    <label>المدينة</label>
                    <select>
                        @foreach($cities as $city)
                            <option>{{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="item col-lg-3 col-md-6 col-sm-6 col-12">
                    <label>نوع الموقع</label>
                    <select>
                        <option value="{{ \App\Enum\ServicePointEnum::BRANCH }}">فرع</option>
                        <option value="{{ \App\Enum\ServicePointEnum::OFFICE }}">مكتب</option>
                        <option value="{{ \App\Enum\ServicePointEnum::CENTER }}">مركز</option>
                        <option value="{{ \App\Enum\ServicePointEnum::ATM }}">صراف آلي</option>
                    </select>
                </div>
                <div class="item col-lg-3 col-md-6 col-sm-6 col-12">
                    <button class="btn btn-primary">تنفيذ الطلب</button>
                </div>
            </article>

            <div class="card__title">
                <h1>الفروع وصراف الي في اليمن - صنعاء</h1>
            </div>

        </div>

        <div class="row main">
            <article class="col-lg-5 col-12">
                <div class="card">
                    <div class="top">
                        <h1>شارع الاصبحي</h1>
                        <ul class="list">
                            <li>
                                <img src="{{ asset('images/icon-a.png') }}">
                                <span>صراف الي</span>
                            </li>
                        </ul>
                    </div>
                    <div class="botton">
                        <p>شارع الاصبحي _ جوار معهد البريطاني</p>
                        <p>اليمن صنعاء</p>
                        <p>777 777 777</p>
                    </div>
                </div>
                <div class="card">
                    <div class="top">
                        <h1>شارع الاصبحي</h1>
                        <ul class="list">
                            <li>
                                <img src="{{ asset('images/icon-a.png') }}">
                                <span>صراف الي</span>
                            </li>
                        </ul>
                    </div>
                    <div class="botton">
                        <p>شارع الاصبحي _ جوار معهد البريطاني</p>
                        <p>اليمن صنعاء</p>
                        <p>777 777 777</p>
                    </div>
                </div>
                <div class="card">
                    <div class="top">
                        <h1>شارع الاصبحي</h1>
                        <ul class="list">
                            <li>
                                <img src="{{ asset('images/icon-a.png') }}">
                                <span>صراف الي</span>
                            </li>
                        </ul>
                    </div>
                    <div class="botton">
                        <p>شارع الاصبحي _ جوار معهد البريطاني</p>
                        <p>اليمن صنعاء</p>
                        <p>777 777 777</p>
                    </div>
                </div>
                <div class="card">
                    <div class="top">
                        <h1>شارع الاصبحي</h1>
                        <ul class="list">
                            <li>
                                <img src="{{ asset('images/icon-a.png') }}">
                                <span>صراف الي</span>
                            </li>
                        </ul>
                    </div>
                    <div class="botton">
                        <p>شارع الاصبحي _ جوار معهد البريطاني</p>
                        <p>اليمن صنعاء</p>
                        <p>777 777 777</p>
                    </div>
                </div>
                <div class="card">
                    <div class="top">
                        <h1>شارع الاصبحي</h1>
                        <ul class="list">
                            <li>
                                <img src="{{ asset('images/icon-a.png') }}">
                                <span>صراف الي</span>
                            </li>
                        </ul>
                    </div>
                    <div class="botton">
                        <p>شارع الاصبحي _ جوار معهد البريطاني</p>
                        <p>اليمن صنعاء</p>
                        <p>777 777 777</p>
                    </div>
                </div>
            </article>
        </div>

{{--        <img class="layer-10" src="{{ asset('images/layer-7.png') }}" alt="background">--}}
{{--        <img class="layer-11" src="{{ asset('images/layer-11.png') }}" alt="background">--}}
{{--        <img class="layer-12" src="{{ asset('images/layer-7.png') }}" alt="background">--}}


    </section>

@stop
