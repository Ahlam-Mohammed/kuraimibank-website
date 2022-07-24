@extends('frontend.layout.master')

@section('title')
    {{ $story['title'] }}
@stop

@section('landing')
    <!-- Start Landing Section  -->
    <section class="landing story" style="background-image: url({{ asset(\App\Enum\SettingEnum::PATH_STORY_IMAGE.'/'.$story['image']) }});">

        <!-- Start Header Section  -->
        @include('frontend.layout.header')
        <!-- End Header Section  -->

        <!-- Start Navigation Section  -->
        @include('frontend.layout.navigation')
        <!-- End Navigation Section  -->

    </section>

    {{--Content --}}
    @include('frontend.pages.successStory.content')

@stop

@section('content')
    <img class="bg-right" src="http://127.0.0.1:8000/images/bg-service-page.png" alt="background">
{{--    <img class="layer-7" src="http://127.0.0.1:8000/images/layer-7.png" alt="background">--}}
    @include('frontend.pages.home.news')

@endsection