@extends('frontend.layout.master')

@section('title')
    @lang('page.home')
@stop

@section('landing')
    <!-- Start Landing Section  -->
    <section class="landing" style="background-image: url({{ asset('images/bg-service-header.png') }});">

        {{-- Service Image --}}
        <img class="service--image" src="{{ asset('images/service-3.png') }}" alt="service image">

        <!-- Start Header Section  -->
        @include('frontend.layout.header')
        <!-- End Header Section  -->

        <!-- Start Navigation Section  -->
        @include('frontend.layout.navigation')
        <!-- End Navigation Section  -->

        <!-- Start Landing Introduction Section  -->
        <article class="landing__intro intro--service">
            <h1>مشروعي</h1>
            <p class="desc">بتمويلات تصل إلى  <span>50</span>  مليون ريال يمني، تخيل ماذا يمكنك أن تفعل لتطوير مشروعك؟
                بنك الكريمي للتمويل الأصغر الإسلامي يساعدك لتجيب عن هذا التساؤل
            </p>
            <button class="btn btn-orange">طلب خدمة</button>
        </article>
        <!-- End Landing Introduction Section  -->
    </section>

    {{-- Service advantages --}}
    @include('frontend.pages.service.advantage')

@stop

@section('content')



@endsection
