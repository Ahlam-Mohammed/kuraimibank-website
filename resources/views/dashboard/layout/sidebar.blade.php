<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" style="background-color: #342a4a !important;">

    <div class="app-brand demo ">
        <a href="{{ route('dashboard.index') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('images/logo.svg') }}">
            </span>
            <span class="app-brand-text demo fs-4 menu-text fw-bold ms-2">بنك الـكـريـمـي</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    {{--  Navbar  --}}
    <ul class="menu-inner py-1">
        <li class="menu-item
        @if(Route::currentRouteName() === 'dashboard.index') active @endif">
            <a href="{{ route('dashboard.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-dashboard"></i>
                <div>@lang('page.index')</div>
            </a>
        </li>


        {{-- service_points --}}
        <li class="menu-item
        @if(Route::currentRouteName() === 'dashboard.service.point' ||
            Route::currentRouteName() === 'dashboard.region') active @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-location-plus"></i>
                <div>@lang('page.service_points')</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('dashboard.region') }}" class="menu-link">
                        <div>@lang('page.manage_regions')</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('dashboard.service.point') }}" class="menu-link">
                        <div>@lang('page.service_points')</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- services --}}
        <li class="menu-item
        @if(Route::currentRouteName() === 'dashboard.services' ||
            Route::currentRouteName() === 'dashboard.service.create') active @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div>@lang('page.services')</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('dashboard.services') }}" class="menu-link">
                        <div>@lang('page.services')</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('dashboard.service.create') }}" class="menu-link">
                        <div>@lang('page.add_service')</div>
                    </a>
                </li>

            </ul>
        </li>

        {{-- services --}}
        <li class="menu-item
        @if(Route::currentRouteName() === 'dashboard.categories' ||
            Route::currentRouteName() === 'dashboard.subs.category') active @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div>@lang('page.categories')</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('dashboard.categories') }}" class="menu-link">
                        <div>@lang('page.categories')</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('dashboard.subs.category') }}" class="menu-link">
                        <div>@lang('page.sub_categories')</div>
                    </a>
                </li>

            </ul>
        </li>

        {{-- web info --}}
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div>@lang('page.web_info')</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="" class="menu-link">
                        <div>@lang('page.web_info')</div>
                    </a>
                </li>

            </ul>
        </li>

        {{-- exchange_rate --}}
        <li class="menu-item">
            <a href="{{ route('dashboard.rates') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-chart"></i>
                <div>@lang('page.exchange_rate')</div>
            </a>
        </li>

        {{-- News --}}
        <li class="menu-item">
            <a href="{{ route('dashboard.news') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-window-open"></i>
                <div>@lang('page.news')</div>
            </a>
        </li>

        {{-- users --}}
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div>@lang('page.users')</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="" class="menu-link">
                        <div>@lang('page.users')</div>
                    </a>
                </li>

            </ul>
        </li>

        <!-- Apps & Pages -->
{{--        <li class="menu-header small text-uppercase">--}}
{{--            <span class="menu-header-text">Apps &amp; Pages</span>--}}
{{--        </li>--}}


    </ul>
</aside>
