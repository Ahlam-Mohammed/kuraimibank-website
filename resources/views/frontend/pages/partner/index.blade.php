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
        <img class="layer-9" src="{{ asset('images/bg-service-page.png') }}" alt="background">
        <div class="card__content row">

            <img class="bg-card-left" src="{{ asset('images/layer-7.png') }}" alt="background">

            <div class="card__title">
                <h1> شركائنا</h1>
            </div>

            {{-- section 1  --}}
            <div class="section-box row">
                <span class="section__number">1</span>
                <div class="col-lg-3 col-md-4 col-sm-4 col-12">
                    <div class="section__box" style="padding: 2.1rem;">
                        <img src="{{ asset('images/master.png') }}" alt="master card img">
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-8 col-12 section__details">
                    <h1 class="title">هذا النص هو مثال</h1>
                    <p class="desc">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد
                        .مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق
                        إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء
                        لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة</p>
                </div>
            </div>

            {{-- section 2  --}}
            <div class="section-box row">
                <span class="section__number">2</span>
                <div class="col-lg-3 col-md-4 col-sm-4 col-12">
                    <div class="section__box">
                        <img src="{{ asset('images/mony.png') }}" alt="master card img">
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-8 col-12 section__details">
                    <h1 class="title">هذا النص هو مثال</h1>
                    <p class="desc">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد
                        .مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق
                        إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء
                        لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة</p>
                </div>
            </div>

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
                            <img src="{{ asset('images/b1.png') }}" alt="master card img">
                        </div>
                        <div class="section__box">
                            <img src="{{ asset('images/b2.png') }}" alt="master card img">
                        </div>
                        <div class="section__box">
                            <img src="{{ asset('images/b3.png') }}" alt="master card img">
                        </div>
                    </div>

                    <h1 class="title">مملكة البحرين</h1>
                    <div class="section__boxes">
                        <div class="section__box">
                            <img src="{{ asset('images/b4.png') }}" alt="master card img">
                        </div>
                        <div class="section__box">
                            <img src="{{ asset('images/mony.png') }}" alt="master card img">
                        </div>
                        <div class="section__box">
                            <img src="{{ asset('images/mony.png') }}" alt="master card img">
                        </div>
                    </div>

                    <h1 class="title">تركيا</h1>
                    <div class="section__boxes">
                        <div class="section__box">
                            <img src="{{ asset('images/b1.png') }}" alt="master card img">
                        </div>
                        <div class="section__box">
                            <img src="{{ asset('images/b3.png') }}" alt="master card img">
                        </div>
                    </div>

                    <h1 class="title">الامارات العربية المتحدة</h1>
                    <div class="section__boxes">
                        <div class="section__box">
                            <img src="{{ asset('images/b5.png') }}" alt="master card img">
                        </div>
                    </div>

                </div>
            </div>

            {{-- section 4  --}}
            <div class="section-box row">
                <span class="section__number">4</span>
                <div class="col-lg-3 col-md-4 col-sm-4 col-12">
                    <div class="section__box">
                        <img src="{{ asset('images/b3.png') }}" alt="master card img">
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-8 col-12 section__details">
                    <h1 class="title">هذا النص هو مثال</h1>
                    <p class="desc">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد
                        .مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق
                        إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء
                        لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أنق
                        إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء
                        لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة</p>
                </div>
            </div>

            {{-- section 5  --}}
            <div class="section-box row">
                <span class="section__number">5</span>
                <div class="col-lg-3 col-md-4 col-sm-4 col-12">
                    <div class="section__box">
                        <img src="{{ asset('images/b5.png') }}" alt="master card img">
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-8 col-12 section__details">
                    <h1 class="title">هذا النص هو مثال</h1>
                    <p class="desc">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد
                        .مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق
                        إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء
                        لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أنق
                        إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء
                        لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة</p>
                </div>
            </div>

            <x-share-section/>

        </div>

        <img class="layer-7" src="http://127.0.0.1:8000/images/layer-7.png" alt="background">

    </section>
    <!-- End Landing Section -->


@stop

