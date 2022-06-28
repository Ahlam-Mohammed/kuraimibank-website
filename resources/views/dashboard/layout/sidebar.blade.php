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

        {{--   Dashboard     --}}
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
            Route::currentRouteName() === 'dashboard.service.create' ||
            Route::currentRouteName() === 'dashboard.categories') active @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div>@lang('page.services')</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('dashboard.services.index') }}" class="menu-link">
                        <div>@lang('page.services')</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('dashboard.categories') }}" class="menu-link">
                        <div>@lang('page.categories')</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('dashboard.services-create') }}" class="menu-link">
                        <div>@lang('page.add_service')</div>
                    </a>
                </li>

            </ul>
        </li>

        {{-- web info --}}
        <li class="menu-item
        @if(str_contains(Route::currentRouteName(), 'dashboard.web-info') === true ||
            str_contains(Route::currentRouteName(), 'dashboard.contact') === true) active @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div>@lang('page.web_info')</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('dashboard.web-info.about.index') }}" class="menu-link">
                        <div>@lang('page.about')</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('dashboard.web-info.vision.index') }}" class="menu-link">
                        <div>@lang('page.vision')</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('dashboard.web-info.strategy.index') }}" class="menu-link">
                        <div>@lang('page.strategy')</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('dashboard.web-info.policy.index') }}" class="menu-link">
                        <div>@lang('page.privacy-policy')</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('dashboard.web-info.principle.index') }}" class="menu-link">
                        <div>@lang('page.principle')</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('dashboard.contact.social.index') }}" class="menu-link">
                        <div>@lang('page.social')</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('dashboard.contact.contact.index') }}" class="menu-link">
                        <div>@lang('page.contact')</div>
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

        {{-- Partner --}}
        <li class="menu-item">
            <a href="{{ route('dashboard.partners.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-chart"></i>
                <div>@lang('page.partner')</div>
            </a>
        </li>

        {{-- financial_reports --}}
        <li class="menu-item">
            <a href="{{ route('dashboard.reports.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-chart"></i>
                <div>@lang('page.financial_reports')</div>
            </a>
        </li>

        {{-- News --}}
        <li class="menu-item">
            <a href="{{ route('dashboard.news') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-window-open"></i>
                <div>@lang('page.news')</div>
            </a>
        </li>

        {{-- Job --}}
        <li class="menu-item">
            <a href="{{route('dashboard.jobs.index')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div>@lang('page.job')</div>
            </a>
        </li>

        {{-- User --}}
        <li class="menu-item">
            <a href="{{route('dashboard.users')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div>@lang('page.users')</div>
            </a>
        </li>

        {{-- roles --}}
        <li class="menu-item">
            <a href="{{route('dashboard.roles.index')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div>@lang('page.roles')</div>
            </a>
        </li>

    </ul>
</aside>
