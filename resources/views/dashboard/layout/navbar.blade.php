<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">

    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0   d-xl-none ">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

        <ul class="navbar-nav flex-row align-items-center ms-auto">

            <!-- User -->
{{--            <li class="nav-item navbar-dropdown dropdown-user dropdown">--}}
{{--                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">--}}
{{--                    <div class="avatar avatar-online">--}}
{{--                        <img src="@if (Auth::user()->avatar) {{ asset(UserEnum::USER_AVATAR_PATH.Auth::user()->avatar) }} @else {{ asset(UserEnum::USER_AVATAR_DEFAULT) }} @endif" alt class="w-px-40 h-auto rounded-circle">--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--                <ul class="dropdown-menu dropdown-menu-end">--}}
{{--                    <li>--}}
{{--                        <a class="dropdown-item" href="{{ route('dashboard.profile', Auth::id()) }}">--}}
{{--                            <div class="d-flex">--}}
{{--                                <div class="flex-shrink-0 me-3">--}}
{{--                                    <div class="avatar avatar-online">--}}
{{--                                        <img src="@if (Auth::user()->avatar) {{ asset(UserEnum::USER_AVATAR_PATH.Auth::user()->avatar) }} @else {{ asset(UserEnum::USER_AVATAR_DEFAULT) }} @endif" alt class="w-px-40 h-auto rounded-circle">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="flex-grow-1">--}}
{{--                                    <span class="fw-semibold d-block">{{ Auth::user()->name }}</span>--}}
{{--                                    <small class="text-muted">{{ Auth::user()->getRoleNames()[0] }}</small>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <div class="dropdown-divider"></div>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a class="dropdown-item" href="{{ route('dashboard.profile',Auth::id()) }}">--}}
{{--                            <i class="bx bx-user me-2"></i>--}}
{{--                            <span class="align-middle">الملف الشخصي</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a class="dropdown-item" href="{{ route('dashboard.setting') }}">--}}
{{--                            <i class="bx bx-cog me-2"></i>--}}
{{--                            <span class="align-middle">إعدادات الحساب</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <div class="dropdown-divider"></div>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a class="dropdown-item" href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" target="_blank">--}}
{{--                            <i class="bx bx-power-off me-2"></i>--}}
{{--                            <span class="align-middle">تسجيل الخروج</span>--}}
{{--                        </a>--}}
{{--                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--                            @csrf--}}
{{--                        </form>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
            <!--/ User -->


        </ul>
    </div>


    <!-- Search Small Screens -->
    <div class="navbar-search-wrapper search-input-wrapper  d-none">
        <input type="text" class="form-control search-input container-xxl border-0" placeholder="Search..." aria-label="Search...">
        <i class="bx bx-x bx-sm search-toggler cursor-pointer"></i>
    </div>


</nav>