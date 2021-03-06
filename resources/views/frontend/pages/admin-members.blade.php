@extends('frontend.layout.master')

@section('title')
    مجلس الإدارة
@stop

@push('scripts_after')
    <script src="{{ asset('js/admin-member.js') }}"></script>
@endpush

@section('landing')
    <!-- Start Landing Section  -->
    <section class="landing bg-linear-gradient member">

        <div class="bg">
            <div class="list__section">
                <div class="list">
                    <img class="item" src="{{ asset('images/bank-image-1.PNG') }}" alt="bg">
                    <img class="item" src="{{ asset('images/bank-image-7.PNG') }}" alt="bg">
                    <img class="item" src="{{ asset('images/bank-image-3.PNG') }}" alt="bg">
                    <img class="item" src="{{ asset('images/bank-image-2.PNG') }}" alt="bg">
                </div>
            </div>

            <div class="list__section">
                <div class="list">
                    <img class="item" src="{{ asset('images/bank-image-3.PNG') }}" alt="bg">
                    <img class="item" src="{{ asset('images/bank-image-2.PNG') }}" alt="bg">
                    <img class="item" src="{{ asset('images/bank-image-6.PNG') }}" alt="bg">
                    <img class="item" src="{{ asset('images/bank-image-4.PNG') }}" alt="bg">
                </div>
            </div>

            <div class="list__section">
                <div class="list">
                    <img class="item" src="{{ asset('images/bank-image-5.PNG') }}" alt="bg">
                    <img class="item" src="{{ asset('images/bank-image-4.PNG') }}" alt="bg">
                    <img class="item" src="{{ asset('images/bank-image-7.PNG') }}" alt="bg">
                    <img class="item" src="{{ asset('images/bank-image-6.PNG') }}" alt="bg">
                </div>
            </div>

            <div class="list__section">
                <div class="list">
                    <img class="item" src="{{ asset('images/bank-image-1.PNG') }}" alt="bg">
                    <img class="item" src="{{ asset('images/bank-image-2.PNG') }}" alt="bg">
                    <img class="item" src="{{ asset('images/bank-image-3.PNG') }}" alt="bg">
                    <img class="item" src="{{ asset('images/bank-image-4.PNG') }}" alt="bg">
                </div>
            </div>

            <div class="list__section">
                <div class="list">
                    <img class="item" src="{{ asset('images/bank-image-5.PNG') }}" alt="bg">
                    <img class="item" src="{{ asset('images/bank-image-6.PNG') }}" alt="bg">
                    <img class="item" src="{{ asset('images/bank-image-7.PNG') }}" alt="bg">
                    <img class="item" src="{{ asset('images/bank-image-3.PNG') }}" alt="bg">
                </div>
            </div>
        </div>
        <!-- Start Header Section  -->
        @include('frontend.layout.header')
        <!-- End Header Section  -->

        <!-- Start Navigation Section  -->
        @include('frontend.layout.navigation')
        <!-- End Navigation Section  -->

    </section>

    <!-- Start advantage Section  -->
    <section class="card__section">
        <img class="layer-9" src="{{ asset('images/bg-service-page.png') }}" alt="background">

        <div class="card__content row">

            <img class="bg-card-left" src="{{ asset('images/layer-7.png') }}" alt="background">

            <div class="card__title">
                <h1>مجلس الإدارة</h1>
            </div>

            <div class="card__desc">
                <p>يتشكل مجلس الإدارة من مجموعة من الأعضاء ذو
                    خبرات في مجالات مختلفة تساهم بشكل كبير من
                    قيادة البنك إلى التقدم بخط ً ثابتة نحو النجاح و تحقيق
                    أهدافه. وأعضاء مجلس الإدارة هم
                </p>
            </div>

            <div class="content row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <article class="card">
                        <div class="card__img">
                            <img src="{{ asset('images/bank-image-3.PNG') }}" alt="service image">
                        </div>
                        <div class="card_title">
                            <h1>ماجيد سند السماوي</h1>
                        </div>
                        <p class="card_desc">رئيس المجلس</p>
                    </article>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <article class="card">
                        <div class="card__img">
                            <img src="{{ asset('images/bank-image-2.PNG') }}" alt="service image">
                        </div>
                        <div class="card_title">
                            <h1>هشام محمود الحاج</h1>
                        </div>
                        <p class="card_desc">رئيس المجلس</p>
                    </article>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <article class="card">
                        <div class="card__img">
                            <img src="{{ asset('images/bank-image-1.PNG') }}" alt="service image">
                        </div>
                        <div class="card_title">
                            <h1>هشام محمود الحاج</h1>
                        </div>
                        <p class="card_desc">رئيس المجلس</p>
                    </article>
                </div>
            </div>

            <div class="content row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <article class="card">
                        <div class="card__img">
                            <img src="{{ asset('images/bank-image-5.PNG') }}" alt="service image">
                        </div>
                        <div class="card_title">
                            <h1>ماجيد سند السماوي</h1>
                        </div>
                        <p class="card_desc">رئيس المجلس</p>
                    </article>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <article class="card">
                        <div class="card__img">
                            <img src="{{ asset('images/bank-image-4.PNG') }}" alt="service image">
                        </div>
                        <div class="card_title">
                            <h1>هشام محمود الحاج</h1>
                        </div>
                        <p class="card_desc">رئيس المجلس</p>
                    </article>
                </div>


            </div>

            <div class="content row">
                <div class="col-12 card__title">
                    <h1>هيئة الرقابة الشرعية البنك</h1>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <article class="card">
                    <div class="card__img">
                        <img src="{{ asset('images/bank-image-2.PNG') }}" alt="service image">
                    </div>
                    <div class="card_title">
                        <h1>ماجيد سند السماوي</h1>
                    </div>
                    <p class="card_desc">رئيس المجلس</p>
                </article>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <article class="card">
                    <div class="card__img">
                        <img src="{{ asset('images/bank-image-6.PNG') }}" alt="service image">
                    </div>
                    <div class="card_title">
                        <h1>هشام محمود الحاج</h1>
                    </div>
                    <p class="card_desc">رئيس المجلس</p>
                </article>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <article class="card">
                    <div class="card__img">
                        <img src="{{ asset('images/bank-image-1.PNG') }}" alt="service image">
                    </div>
                    <div class="card_title">
                        <h1>هشام محمود الحاج</h1>
                    </div>
                    <p class="card_desc">رئيس المجلس</p>
                </article>
                </div>
            </div>

            <div class="content row">
                <div class="col-12 card__title">
                    <h1>المحاسبون القانونيون</h1>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <article class="card">
                    <div class="card__img">
                        <img src="{{ asset('images/bank-image-7.PNG') }}" alt="service image">
                    </div>
                    <div class="card_title">
                        <h1>ماجيد سند السماوي</h1>
                    </div>
                    <p class="card_desc">رئيس المجلس</p>
                </article>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <article class="card">
                    <div class="card__img">
                        <img src="{{ asset('images/bank-image-4.PNG') }}" alt="service image">
                    </div>
                    <div class="card_title">
                        <h1>هشام محمود الحاج</h1>
                    </div>
                    <p class="card_desc">رئيس المجلس</p>
                </article>
                </div>

            </div>
            <x-share-section/>
        </div>

        <img class="layer-10" src="{{ asset('images/layer-7.png') }}" alt="background">
        <img class="layer-11" src="{{ asset('images/layer-11.png') }}" alt="background">
        <img class="layer-12" src="{{ asset('images/layer-7.png') }}" alt="background">


    </section>
    <!-- End Landing Section -->

@stop

