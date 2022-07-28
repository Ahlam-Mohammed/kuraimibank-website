@php
    $categories = \App\Models\Category::all();
@endphp

<nav class="nav">
    <a class="nav__item active" href="#">@lang('content.home')</a>
    <a class="nav__item" href="{{ route('about-us') }}">@lang('content.about_us')</a>
    @foreach($categories as $category)
        <a class="nav__item" href="#">{{ $category->name }}</a>
    @endforeach
</nav>

<nav id="nav--mobile" class="overlay">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="overlay-content">
        <a class="nav__item active" href="#">الرئيسية</a>
        <a class="nav__item">عن البنك</a>
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
                <a href="{{ route('about-us') }}">من نحن</a>
            </li>
            <li>
                <a href="{{ route('about-us', '#principle') }}">القيم والمبادئ</a>
            </li>
            <li>
                <a href="{{ route('about-us') }}">بيان الإستراتيجية</a>
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
                <a href="{{ route('admin-members') }}">مجلس الإدارة</a>
            </li>
        </ul>
    </div>

</section>
<!-- End Menu Section  -->
