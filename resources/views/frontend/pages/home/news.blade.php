<!-- Start News Section  -->
<section class="news-section" style="background-image: url({{ asset('images/vector/news-bg.svg') }})">
    <header>
        <h1>ابق على إطلاع على آخر أخبار البنك </h1>
    </header>

    <div class="content row">
        <!-- prev News -->
        <div class="prev buttons">
            <a>❮</a>
        </div>

        <div class="news__slide" style="overflow: hidden;">
            <div class=" slides_wrapper">

                @foreach($news as $n)
                    <!-- Single News -->
                    <div class="slide-js">
                        <article class="news">
                            <!-- News Image -->
                            <div class="news__img" style="background-image: url({{ asset(\App\Enum\SettingEnum::PATH_NEWS_IMAGE.'/'.$n->image) }})"></div>
                            <div class="news__footer">
                                <!-- News Title -->
                                <h3 class="news__title">{{ $n->title }}</h3>
                                <a class="news__more">المزيد</a>
                                <!-- News Details -->
                                <article class="news__details">
                                    <div class="details__top">
                                        <h3 class="news__title">{{ $n->title }}</h3>
                                        <p class="news__desc">{{ $n->desc }}</p>
                                    </div>
                                    <div class="details__bottom">
                                        <a class="news__more">المزيد</a>
                                    </div>
                                </article>
                            </div>
                        </article>
                    </div>
                @endforeach

            </div>
        </div>

        <!-- next News -->
        <div class="next buttons">
            <a>❯</a>
        </div>
    </div>

    <div class="news-section-footer">
        <button class="btn btn-outline-primary">المزيد</button>
    </div>
    <img class="layer-3" src="{{ asset('images/vector/layer-3.svg') }}">
</section>
<!-- End News Section  -->
