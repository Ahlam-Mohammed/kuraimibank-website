<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

    <div class="app-brand demo ">
        <a href="" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bolder ms-2">KuraimiBank</span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    {{--  Navbar  --}}
    <ul class="menu-inner py-1">

        {{-- service_points --}}
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div>@lang('page.service_points')</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('dashboard.manage-regions') }}" class="menu-link">
                        <div>@lang('page.manage_regions')</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="" class="menu-link">
                        <div>@lang('page.service_points')</div>
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
