<nav class="nav">
    <a class="nav__item active" href="#">الرئيسية</a>
    <a class="nav__item" href="{{ route('about-us') }}">عن البنك</a>
    <a class="nav__item" href="#">خدمات الأفراد</a>
    <a class="nav__item" href="#">خدمات الشركات</a>
    <a class="nav__item" href="#">كريمي اكسبرس</a>
    <a class="nav__item" href="#">ام فلوس</a>
    <a class="nav__item" href="#">التمويل</a>
    <a class="nav__item" href="#">تطبيقات البنك</a>
</nav>

<nav id="nav--mobile" class="overlay">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="overlay-content">
        <a class="nav__item active" href="#">الرئيسية</a>
        <a class="nav__item" href="{{ route('about-us') }}">عن البنك</a>
        <a class="nav__item" href="#">خدمات الأفراد</a>
        <a class="nav__item" href="#">خدمات الشركات</a>
        <a class="nav__item" href="#">كريمي اكسبرس</a>
        <a class="nav__item" href="#">ام فلوس</a>
        <a class="nav__item" href="#">التمويل</a>
        <a class="nav__item" href="#">تطبيقات البنك</a>
    </div>
</nav>


<!-- Start Menu Section  -->
<section class="menu" style="background-image: url({{ asset('images/bg.png') }});">

    <!-- Menu Title -->
    <div class="menu__title">
        <h1>عن البنك</h1>
    </div>

    <!-- Menu Content -->
    <div class="menu__item">
        <h3 class="menu__item_title">من نحن</h3>
        <ul>
            <li>
                <a href="">من نحن</a>
            </li>
            <li>
                <a href="">القيم والمبادئ</a>
            </li>
            <li>
                <a href="">بيان الإستراتيجية</a>
            </li>
        </ul>
    </div>
    <div class="menu__item">
        <h3 class="menu__item_title">هيكل البنك</h3>
        <ul>
            <li>
                <a href="">الهيكل التنظيمي</a>
            </li>
            <li>
                <a href="">مجلس الإدارة</a>
            </li>
        </ul>
    </div>

</section>
<!-- End Menu Section  -->
