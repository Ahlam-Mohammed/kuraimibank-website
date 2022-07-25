@extends('frontend.layout.master')

@section('title')
    @lang('page.contact')
@stop

@push('scripts_after')
    <script src="{{ asset('js/home.js') }}"></script>
@endpush

@section('landing')
    <!-- Start Landing Section  -->
    <section class="landing bg-linear-gradient contact" style="background-image: url({{ asset('images/bg-contact.png') }});">

        <!-- Start Header Section  -->
        @include('frontend.layout.header')
        <!-- End Header Section  -->

        <!-- Start Navigation Section  -->
        @include('frontend.layout.navigation')
        <!-- End Navigation Section  -->


    </section>

    <!-- Start advantage Section  -->
    <section class="advantage" style="background-image: url({{ asset('images/header-bg.png') }});height: initial">
        <div class="advantage_content contact row">
            <img class="bg-card-left" src="{{ asset('images/layer-7.png') }}" alt="background">

            <div class="card__title col-12">
                <h1>اتصل بنا</h1>
                <p>تواصل معنا بالطريقة التي تناسبك، نحن هنا لخدمتك</p>
            </div>

            {{-- Single Advantage --}}
            <article class="box col-lg-3 col-md-3 col-12">
                <div class="box__top">
                    <div class="box__number" style="background-image: url({{ asset('images/bg-number.png') }})">
                        <i class="bi bi-telephone"></i>
                    </div>
                    <div class="box__content">
                        <h4 class="box__title">تواصل معنا</h4>
                        <div class="box__bottom" style="margin-top: 1rem">
                            <a class="item"> تلفون : 967 1 503888 </a>
                            <a class="item"> فاكس : 967 1 435400</a>
                            <a class="item"> الرقم المجاني : 8008800</a>
                            <a class="item">صندوق بريد : 19357</a>
                        </div>
                    </div>
                </div>
            </article>

            {{-- Single Advantage --}}
            <article class="box col-lg-3 col-md-3 col-12">
                <div class="box__top">
                    <div class="box__number" style="background-image: url({{ asset('images/bg-number.png') }})">
                        <i class="bi bi-envelope"></i>
                    </div>
                    <div class="box__content">
                        <h4 class="box__title">راسلنا على البريد الالكتروني</h4>
                        <div class="box__bottom" style="margin-top: 1rem">
                            <a class="item"> تلفون : 967 1 503888 </a>
                        </div>
                    </div>
                </div>
            </article>

            {{-- Single Advantage --}}
            <article class="box col-lg-3 col-md-3 col-12">
                <div class="box__top">
                    <div class="box__number" style="background-image: url({{ asset('images/bg-number.png') }})">
                        <i class="bi bi-geo-alt"></i>
                    </div>
                    <div class="box__content">
                        <h4 class="box__title">نقاط تواجدنا</h4>
                    </div>
                </div>
            </article>


            <article class="col-12 contact_us">
                <header>
                    <h1>كيف يمكننا مساعدك؟</h1>
                </header>
                <form>
                    <div class="dyn-label material">
                        <input type="text" placeholder="الاسم" id="input1"/>
                        <label for="input1">الاسم</label>
                    </div>
                    <div class="dyn-label material">
                        <input type="text" placeholder="التلفون" id="input1"/>
                        <label for="input1">التلفون</label>
                    </div>
                    <div class="dyn-label material">
                        <input type="email" placeholder="البريد الالكتروني" id="input1"/>
                        <label for="input1">البريد الالكتروني</label>
                    </div>
                    <button class="btn btn-primary">إرسال</button>
                </form>
            </article>

            <img class="bg-advantage-right" src="{{ asset('images/layer-7.png') }}" alt="background">


        </div>

        <img class="layer-8" src="{{ asset('images/layer-7.png') }}" alt="background">
        <img class="layer-9" src="{{ asset('images/bg-service-page.png') }}" alt="background">
    </section>
    <!-- End Landing Section -->

@stop

