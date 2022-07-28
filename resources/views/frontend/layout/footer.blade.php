<footer>
    <div class="logo">
        <img src="{{ asset('images/logok.svg') }}" alt="logo">
    </div>
    <div class="content row">
        <article class="col-lg-2 col-md-4 col-6">
            <nav class="footer__nav">
                <h4 class="nav__title">البنك</h4>
                <a href="{{ route('about-us', '#about') }}" class="nav__item"> عن البنك</a>
                <a href="{{ route('about-us', '#vision') }}" class="nav__item">الرؤية</a>
                <a href="{{ route('about-us', '#message') }}" class="nav__item"> الرسالة</a>
                <a href="{{ route('about-us', '#goal') }}" class="nav__item">الأهداف</a>
                <a href="{{ route('about-us', '#principle') }}" class="nav__item">القيم والمبادئ</a>
                <a class="nav__item">بيان سياسة</a>
                <a class="nav__item">مكافحة غسل</a>
                <a href="{{ route('partner') }}" class="nav__item">شركائنا</a>
            </nav>
        </article>

        <article class="col-lg-2 col-md-4 col-6">
            <nav class="footer__nav">
                <h4 class="nav__title">شركائنا</h4>
                <a href="{{ route('partner') }}" class="nav__item">موني جرام</a>
                <a href="{{ route('partner') }}" class="nav__item">ماستر كارد</a>
                <a href="{{ route('partner') }}" class="nav__item"> البنوك المراسلة</a>
                <a href="{{ route('partner') }}" class="nav__item">منظمة التمويل الدولية</a>
                <a href="{{ route('partner') }}" class="nav__item">تيمينوس</a>
            </nav>
        </article>

        <article class="col-lg-2 col-md-4 col-6">
            <nav class="footer__nav">
                <h4 class="nav__title">الخدمات</h4>
                <a class="nav__item">خدمات الأفراد</a>
                <a class="nav__item">خدمات الشركات</a>
                <a class="nav__item">كريمي اكسبرس</a>
                <a class="nav__item">ام فلوس</a>
                <a class="nav__item">التمويل</a>
            </nav>
        </article>

        <article class="col-lg-2 col-md-4 col-6">
            <nav class="footer__nav">
                <h4 class="nav__title">التقارير</h4>
                <a href="{{ route('report') }}" class="nav__item">التقارير المالية</a>
                <a href="{{ route('report') }}" class="nav__item">التقارير المالية</a>
            </nav>
        </article>

        <article class="col-lg-2 col-md-4 col-6">
            <nav class="footer__nav">
                <h4 class="nav__title">نقاط الخدمة</h4>
                <a href="{{ route('service-point') }}" class="nav__item">الفروع وماكينات الصرافة</a>
            </nav>
        </article>

        <article class="col-lg-2 col-md-4 col-6">
            <nav class="footer__nav">
                <h4 class="nav__title">تواصل معنا</h4>
                <a class="nav__item"> تلفون : 967 1 503888 </a>
                <a class="nav__item"> فاكس : 967 1 435400</a>
                <a class="nav__item"> الرقم المجاني : 8008800</a>
                <a class="nav__item">صندوق بريد : 19357</a>
            </nav>
        </article>

        <article class="col-12">
            <div class="footer__social">
                <div class="social">
                    <i class="bi bi-facebook"></i>
                    <i class="bi bi-twitter"></i>
                    <i class="bi bi-instagram"></i>
                </div>
                <div class="app">
                    <button class="btn btn-app">
                        <p>
                            <span>android app on</span>
                            <span>google play</span>
                        </p>
                        <i class="bi bi-apple"></i>
                    </button>
                    <button class="btn btn-app">
                        <p>
                            <span>android app on</span>
                            <span>google play</span>
                        </p>
                        <i class="bi bi-apple"></i>
                    </button>
                </div>
            </div>
        </article>

        <article class="col-12 footer__last">
            <span>kuraimibank 2022 ©</span>
        </article>
    </div>
    <img class="bg-right" src="{{ asset('images/footer.png') }}" alt="background image">
    <img class="bg-left" src="{{ asset('images/footer.png') }}" alt="background image">
</footer>
