<!-- Start Main Services Section  -->
<section class="main-services">
    <header>
        <h1>خدمات تهتم بك</h1>
    </header>
    <div class="row">
        <nav class="col-8 dots-js">
            <a class="nav__item" onclick="currentSlide(1)">البطاقات الإئتمانية</a>
            <a class="nav__item" onclick="currentSlide(2)">تمويل الملكة</a>
            <a class="nav__item" onclick="currentSlide(3)">حساب الأفراد</a>
            <a class="nav__item" onclick="currentSlide(4)">ماكينات الصراف الآلي</a>
            <a class="nav__item" onclick="currentSlide(5)">التمويل</a>
        </nav>
    </div>
    <section class="content row">
        <div class="col-2 prev">
            <a onclick="plusSlides(-1)">❮</a>
        </div>
        <div class="col-8 slides-js">
            <article class="service row">
                <div class="col-8 right">
                    <h1 class="service__title">
                        البطاقات الإئتمانية
                    </h1>
                    <p class="service__desc">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من
                        مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التي يولدها التطبيق.</p>
                    <button class="btn btn-outline-primary">المزيد</button>
                </div>
                <div class="col-4">
                    <figure class="service__img">
                        <img src="{{ asset('images/service.png') }}" alt="">
                    </figure>
                </div>
            </article>
            <article class="service row">
                <div class="col-8 right">
                    <h1 class="service__title">
                        تمويل الملكة
                    </h1>
                    <p class="service__desc">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من
                        مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.</p>
                    <button class="btn btn-outline-primary">المزيد</button>
                </div>
                <div class="col-4">
                    <figure class="service__img">
                        <img src="{{ asset('images/service2.png') }}" alt="">
                    </figure>
                </div>
            </article>
            <article class="service row">
                <div class="col-8 right">
                    <h1 class="service__title">
                        حساب الأفراد
                    </h1>
                    <p class="service__desc">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من
                        مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.</p>
                    <button class="btn btn-outline-primary">المزيد</button>
                </div>
                <div class="col-4">
                    <figure class="service__img">
                        <img src="{{ asset('images/service.png') }}" alt="">
                    </figure>
                </div>
            </article>
            <article class="service row">
                <div class="col-8 right">
                    <h1 class="service__title">
                        ماكينات الصراف الآلي
                    </h1>
                    <p class="service__desc">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من
                        مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التي يولدها التطبيق.</p>
                    <button class="btn btn-outline-primary">المزيد</button>
                </div>
                <div class="col-4">
                    <figure class="service__img">
                        <img src="{{ asset('images/service.png') }}" alt="">
                    </figure>
                </div>
            </article>
            <article class="service row">
                <div class="col-8 right">
                    <h1 class="service__title">
                        التمويل
                    </h1>
                    <p class="service__desc">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من
                        مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.</p>
                    <button class="btn btn-outline-primary">المزيد</button>
                </div>
                <div class="col-4">
                    <figure class="service__img">
                        <img src="{{ asset('images/service2.png') }}" alt="">
                    </figure>
                </div>
            </article>
        </div>
        <div class="col-2 next">
            <a onclick="plusSlides(1)">❯</a>
        </div>
        <div class="main__service__bg" style="background-image: url({{ asset('images/bg-design.png') }});"></div>
    </section>
</section>
<!-- End Main Services Section  -->
