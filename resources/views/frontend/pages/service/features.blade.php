<nav class="service_nav taps-js">
    <a class="active" onclick="currentTap(1)">@lang('content.features')</a>
    <a class="" onclick="currentTap(2)">@lang('content.conditions')</a>
    <a class="" onclick="currentTap(3)">@lang('content.subscription')</a>
    <a class="" onclick="currentTap(4)">@lang('content.FAQs')</a>
</nav>

<div class="sections-js">
    <section class="feature__section active">
        <div class="content row">
            <article class="col-lg-5 col-md-6 col-sm-12 col-12 feature__img">
                <img src="{{ asset('images/advanteg.png') }}" alt="advanteg">
            </article>
            <article class="col-lg-7 col-md-6 col-sm-12 col-12 feature__details">
                <h1 class="title" id="feature"> @lang('content.features') {{ $service->name }}</h1>
                <p class="desc">
                    {{ $service->desc }}
                </p>
            </article>

            <img class="bg-service-left" src="{{ asset('images/bg-service-page.png') }}" alt="background">
            <img class="bg-service-right" src="{{ asset('images/bg-service-page.png') }}" alt="background">
        </div>
    </section>
    <section class="feature__section">
        <div class="content row">
            <article class="col-lg-5 col-md-6 col-sm-12 col-12 feature__img">
                <img src="{{ asset('images/advanteg.png') }}" alt="advanteg">
            </article>
            <article class="col-lg-7 col-md-6 col-sm-12 col-12 feature__details">
                <h1 class="title" id="feature"> @lang('content.conditions')</h1>
                <p class="desc">
                    {{ $service->service_condition }}
                </p>
            </article>

            <img class="bg-service-left" src="{{ asset('images/bg-service-page.png') }}" alt="background">
            <img class="bg-service-right" src="{{ asset('images/bg-service-page.png') }}" alt="background">
        </div>
    </section>
    <section class="feature__section">
        <div class="content row">
            <article class="col-lg-5 col-md-6 col-sm-12 col-12 feature__img">
                <img src="{{ asset('images/advanteg.png') }}" alt="advanteg">
            </article>
            <article class="col-lg-7 col-md-6 col-sm-12 col-12 feature__details">
                <h1 class="title" id="feature">@lang('content.subscription')</h1>
                <p class="desc">
                    {{ $service->desc }}
                </p>
            </article>

            <img class="bg-service-left" src="{{ asset('images/bg-service-page.png') }}" alt="background">
            <img class="bg-service-right" src="{{ asset('images/bg-service-page.png') }}" alt="background">
        </div>
    </section>
    <section class="feature__section">
        <div class="content row">
            <article class="col-lg-5 col-md-6 col-sm-12 col-12 feature__img">
                <img src="{{ asset('images/advanteg.png') }}" alt="advanteg">
            </article>
            <article class="col-lg-7 col-md-6 col-sm-12 col-12 feature__details">
                <h1 class="title" id="feature">@lang('content.FAQs')</h1>
                <p class="desc">
                    {{ $service->desc }}
                </p>
            </article>

            <img class="bg-service-left" src="{{ asset('images/bg-service-page.png') }}" alt="background">
            <img class="bg-service-right" src="{{ asset('images/bg-service-page.png') }}" alt="background">
        </div>
    </section>
</div>
