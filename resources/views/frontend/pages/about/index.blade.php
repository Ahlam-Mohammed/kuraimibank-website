@extends('frontend.layout.master')

@section('title')
    @lang('page.about')
@stop

@push('scripts_after')
    <script>showSlides(slideIndex);</script>
@endpush

@section('landing')
    <!-- Start Landing Section  -->
    <section class="landing about bg-linear-gradient" style="background-image: url({{ asset('images/bg-about.png') }});">

        <!-- Start Header Section  -->
        @include('frontend.layout.header')
        <!-- End Header Section  -->

        <!-- Start Navigation Section  -->
        @include('frontend.layout.navigation')
        <!-- End Navigation Section  -->

        <!-- Start Landing Introduction Section  -->
        <article class="landing__intro">
            <h1>حساب في كل بيت يمني</h1>
            <p>يسهم في التنمية الاقتصادية والاجتماعية وفي تحسين معيشة الفرد والمجتمع عن طريق خدمات مالية متنوعة ، وبخبرات متراكمة تزيد عن أربعين عاما أسس هذا الصرح الاقتصادي ليقدم خدماته للمواطنين بجميع المحافظات والمدن والمديريات فوصلت خدماتنا من سقطرى إلى صعدة ومن المهرة إلى باب المندب</p>
        </article>
        <!-- End Landing Introduction Section  -->

    </section>

@stop

@section('content')

    {{--  About content section  --}}
    @include('frontend.pages.about.section-about')

    {{-- Values and principles section --}}
    @if(isset($principles))
        <section class="principle__section">
            <header>
                <h1>القيم والمبادئ</h1>
            </header>
            <div class="row">

                @foreach($principles as $principle)
                    <section class="col-12 section @if($loop->index  % 2 != 0) reverse @endif">
                        <header class="section__title">
                            <h1>{{ $principle->title }}</h1>
                        </header>
                        <div class="section__desc">
                            <p>{{ $principle->desc }}</p>
                        </div>
                        <div class="section__img">
                            <img src="{{ asset('images/principle-1.png') }}">
                        </div>
                    </section>
                @endforeach

                {{--            <section class="col-12 section">--}}
                {{--                <header class="section__title">--}}
                {{--                    <h1>الالتزام</h1>--}}
                {{--                </header>--}}
                {{--                <div class="section__desc">--}}
                {{--                    <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد--}}
                {{--                        النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا--}}
                {{--                        النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم--}}
                {{--                        توليد هذا النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في نفس--}}
                {{--                        المساحة، لقد تم النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في نفس--}}
                {{--                    </p>--}}
                {{--                </div>--}}
                {{--                <div class="section__img">--}}
                {{--                    <img src="{{ asset('images/principle-1.png') }}">--}}
                {{--                </div>--}}
                {{--            </section>--}}

                {{--            <section class="col-12 section reverse">--}}
                {{--                <header class="section__title">--}}
                {{--                    <h1>الالتزام</h1>--}}
                {{--                </header>--}}
                {{--                <div class="section__desc">--}}
                {{--                    <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد--}}
                {{--                        النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا--}}
                {{--                        النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم--}}
                {{--                        توليد هذا النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في نفس--}}
                {{--                        المساحة، لقد تم النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في نفس--}}
                {{--                    </p>--}}
                {{--                </div>--}}
                {{--                <div class="section__img">--}}
                {{--                    <img src="{{ asset('images/principle-2.png') }}">--}}
                {{--                </div>--}}
                {{--            </section>--}}

                {{--            <section class="col-12 section">--}}
                {{--                <header class="section__title">--}}
                {{--                    <h1>الالتزام</h1>--}}
                {{--                </header>--}}
                {{--                <div class="section__desc">--}}
                {{--                    <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد--}}
                {{--                        النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا--}}
                {{--                        النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم--}}
                {{--                        توليد هذا النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في نفس--}}
                {{--                        المساحة، لقد تم النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في نفس--}}
                {{--                    </p>--}}
                {{--                </div>--}}
                {{--                <div class="section__img">--}}
                {{--                    <img src="{{ asset('images/principle-3.png') }}">--}}
                {{--                </div>--}}
                {{--            </section>--}}

                {{--            <section class="col-12 section reverse">--}}
                {{--                <header class="section__title">--}}
                {{--                    <h1>الالتزام</h1>--}}
                {{--                </header>--}}
                {{--                <div class="section__desc">--}}
                {{--                    <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد--}}
                {{--                        النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا--}}
                {{--                        النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم--}}
                {{--                        توليد هذا النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في نفس--}}
                {{--                        المساحة، لقد تم النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في نفس--}}
                {{--                    </p>--}}
                {{--                </div>--}}
                {{--                <div class="section__img">--}}
                {{--                    <img src="{{ asset('images/principle-4.png') }}">--}}
                {{--                </div>--}}
                {{--            </section>--}}

                {{--            <section class="col-12 section">--}}
                {{--                <header class="section__title">--}}
                {{--                    <h1>الالتزام</h1>--}}
                {{--                </header>--}}
                {{--                <div class="section__desc">--}}
                {{--                    <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد--}}
                {{--                        النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا--}}
                {{--                        النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم--}}
                {{--                        توليد هذا النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في نفس--}}
                {{--                        المساحة، لقد تم النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في نفس--}}
                {{--                    </p>--}}
                {{--                </div>--}}
                {{--                <div class="section__img">--}}
                {{--                    <img src="{{ asset('images/principle-5.png') }}">--}}
                {{--                </div>--}}
                {{--            </section>--}}


            </div>
        </section>
    @endif

@endsection
