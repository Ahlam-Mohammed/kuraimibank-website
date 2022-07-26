<section class="about__section">
    <div class="row content">

        <div class="col-lg-4 col-md-4 col-12 nav-box">
            <header>
                <h1>عن البنك</h1>
            </header>
            <nav class="dots-js">
                @if(isset($about))
                    <a class="" onclick="currentSlide(1)">من نحن</a>
                @endif
                @if(isset($vision))
                        <a class="" onclick="currentSlide(2)">الرؤية</a>
                @endif
                <a class="" onclick="currentSlide(3)">الرسالة</a>
                <a class="" onclick="currentSlide(4)">الوضوح و الشفافية</a>
                @if(isset($strategy))
                        <a class="" onclick="currentSlide(5)">الغايات</a>
                @endif
            </nav>
        </div>

        <div class="col-lg-8 col-md-8 col-12 content-box">
            <div class="box">
                <div class="slides-js">

                    {{-- About --}}
                   @if(isset($about))
                        <article class="slide">
                            <header>
                                <h1 class="box__title">من نحن</h1>
                            </header>
                            <p class="box__desc">{{ $about->value }}</p>
                            <p class="box__desc">{{ $about->value }}</p>

                        </article>
                   @endif

                    {{-- Vision --}}
                    @if(isset($vision))
                        <article class="slide">
                            <header>
                                <h1 class="box__title">الرؤية</h1>
                            </header>
                            <p class="box__desc">
                                هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا
                                النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا النص
                                هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا
                                النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد ت
                            </p>
                            <p class="box__desc">
                                هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا
                                النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا النص
                                هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا
                                النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد ت
                            </p>
                            <p class="box__desc">
                                هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا
                                النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا النص
                                هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا
                                النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد ت
                            </p>
                            <p class="box__desc">
                                هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا
                                النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا النص
                                هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا
                                النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد ت
                            </p>
                        </article>
                    @endif

                    {{-- The message. --}}
                    <article class="slide">
                        <header>
                            <h1 class="box__title">الرسالة</h1>
                        </header>
                        <p class="box__desc">
                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا
                            النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا النص
                            هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد ت
                        </p>
                        <p class="box__desc">
                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا
                            النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا النص
                            هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد ت
                        </p>
                        <p class="box__desc">
                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا
                            النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا النص
                            هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد ت
                        </p>
                        <p class="box__desc">
                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا
                            النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا النص
                            هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد ت
                        </p>
                    </article>

                    {{-- Clarity and transparency --}}
                    <article class="slide">
                        <header>
                            <h1 class="box__title">الوضوح و الشفافية</h1>
                        </header>
                        <p class="box__desc">
                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا
                            النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا النص
                            هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد ت
                        </p>
                        <p class="box__desc">
                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا
                            النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا النص
                            هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد ت
                        </p>
                        <p class="box__desc">
                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا
                            النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا النص
                            هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد ت
                        </p>
                        <p class="box__desc">
                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا
                            النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا النص
                            هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد ت
                        </p>
                    </article>

                    {{-- Goals --}}
                    @if(isset($strategy))
                        <article class="slide">
                            <header>
                                <h1 class="box__title">الغايات</h1>
                            </header>
                            <p class="box__desc">
                                هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا
                                النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا النص
                                هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا
                                النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد ت
                            </p>
                            <p class="box__desc">
                                هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا
                                النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا النص
                                هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا
                                النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد ت
                            </p>
                            <p class="box__desc">
                                هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا
                                النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا النص
                                هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا
                                النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد ت
                            </p>
                            <p class="box__desc">
                                هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا
                                النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا النص
                                هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا
                                النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد ت
                            </p>
                        </article>
                    @endif
                </div>
                <div class="box__link">
                    <a class="prev" onclick="plusSlides(-1)">السابق</a>
                    <a class="next" onclick="plusSlides(1)">التالي</a>
                </div>
                <img class="box__bg" src="{{ asset('images/6.png') }}" alt="background">
            </div>
        </div>
    </div>
    <img class="layer-7" src="{{ asset('images/layer-7.png') }}" alt="background">
    <img class="layer-5" src="{{ asset('images/layere-5.png') }}" alt="background">
</section>
