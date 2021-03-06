<header class="header">
    <!-- right section  -->
    <div class="header__box">
        <a class="header__item" href="">
            <i class="bi bi-person"></i>
            <span>@lang('content.jobs')</span>
        </a>
        <a class="header__item" href="{{ route('contact-us') }}">
            <i class="bi bi-telephone"></i>
            <span>@lang('content.contact_us')</span>
        </a>
    </div>
    <!-- Logo  -->
    <a href="{{ route('home') }}">
        <img src="{{ asset('images/logok.svg') }}" alt="">
    </a>
    <!-- left section  -->
    <div class="header__box">
        <a class="header__item" href="">
            <i class="bi bi-geo-alt"></i>
            <span>@lang('content.point_services')</span>
        </a>
        <a class="header__item" href="">
            <i class="bi bi-search"></i>
            @foreach (config('locales.languages') as $key => $val)
                @if ($key != app()->getLocale())
                    <a class="lang" href="{{route('change-language', $key)}}">
                        @if ($key == 'en')
                            EN
                        @else
                            AR
                        @endif
                    </a>
                @endif
            @endforeach
        </a>
    </div>
</header>

<!-- Start Header Mobile  -->
<header class="header__mobile row">
    <!-- right section  -->
    <div class="header__box col-2">
        <a class="header__item">
            <span class="hamburger" onclick="openNav()">&#9776;</span>
        </a>
    </div>

    <!-- Logo  -->
    <div class="col-8 logo">
        <img src="{{ asset('images/logok.svg') }}" alt="logo image">
    </div>
    <!-- left section  -->
    <div class="header__box col-2">
        <a class="header__item" href="">
            @foreach (config('locales.languages') as $key => $val)
                @if ($key != app()->getLocale())
                    <a class="lang" href="{{route('change-language', $key)}}">
                        @if ($key == 'en')
                            EN
                        @else
                            AR
                        @endif
                    </a>
                @endif
            @endforeach
        </a>
    </div>
</header>
<!-- End Header Mobile  -->
