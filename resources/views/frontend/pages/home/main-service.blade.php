<!-- Start Main Services Section  -->
<section class="main-services">
    <header>
        <h1>خدمات تهتم بك</h1>
    </header>
    <div class="row">
        <nav class="col-lg-8 col-12 dots-js">
            @foreach($services as $service)
                <a class="nav__item" onclick="currentSlide({{ $loop->index+1 }})">
                   @if(isset($service->name)) {{ $service->name }} @endif
                </a>
            @endforeach
        </nav>
    </div>
    <section class="content row">
        <div class="col-lg-2 col-1 prev" onclick="plusSlides(-1)">
            <span>❮</span>
        </div>
        <div class="col-lg-8 col-10 slides-js">
            @foreach($services as $service)
                <article class="service row">
                    <div class="col-lg-8 col-md-8 col-12 right">
                        <h1 class="service__title"> {{ $service->name }} </h1>
                        <p class="service__desc"> {{ $service->desc }} </p>
                        <a href="{{ route('service', $service->id) }}" class="btn btn-outline-primary">المزيد</a>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <figure class="service__img">
                            <img src='{{ asset(\App\Enum\SettingEnum::PATH_SERVICE_IMAGE.'/'.$service->image) }}' alt="{{ $service->name }}">
                        </figure>
                    </div>
                </article>
            @endforeach
        </div>
        <div class="col-lg-2 col-1 next" onclick="plusSlides(1)">
            <span>❯</span>
        </div>
        <div class="main__service__bg" style="background-image: url({{ asset('images/bg-design.png') }});"></div>
    </section>
    <img class="layer-3" src="{{ asset('images/layer-3.png') }}" alt="image background">
</section>
<!-- End Main Services Section  -->
