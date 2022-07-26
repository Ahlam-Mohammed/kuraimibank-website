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
        @include('frontend.pages.about.principle')
    @endif

@endsection
