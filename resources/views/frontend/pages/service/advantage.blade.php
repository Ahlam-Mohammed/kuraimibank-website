<!-- Start advantage Section  -->
<section class="advantage" style="background-image: url({{ asset('images/header-bg.png') }});">
    <div class="advantage_content row">

       @if(isset($service->advantages))
            @foreach($service->advantages as $advantage)
                {{-- Single Advantage --}}
                <article class="box col-lg-3 col-md-3 col-12">
                    <div class="box__number" style="background-image: url({{ asset('images/bg-number.png') }})">
                        <span>{{ $loop->index+1 }}</span>
                    </div>
                    <div class="box__title">
                        <h4>{{ $advantage->title }}</h4>
                    </div>
                    <div class="box__desc">
                        <p>{{ $advantage->desc }}</p>
                    </div>
                </article>
            @endforeach
        @endif
{{--        <img class="bg-advantage-left" src="{{ asset('images/bg-service-page.png') }}" alt="background">--}}
        <img class="bg-advantage-right" src="{{ asset('images/layer-7.png') }}" alt="background">

    </div>

</section>
<!-- End Landing Section -->
