<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed " dir="ltr" data-theme="theme-semi-dark" data-assets-path="../../assets/" data-template="vertical-menu-template-semi-dark">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title')</title>

    <meta name="description" content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    @include('dashboard.layout.style')

</head>

<body>

<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar  ">
    <div class="layout-container">

        <!-- Menu -->
        @include('dashboard.layout.sidebar')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">

            <!-- Navbar -->
            @include('dashboard.layout.navbar')
            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper">

                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">
{{--                    @include('components.alert')--}}
                    @yield('content')
                </div>
                <!-- / Content -->




                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>



    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>


    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>

</div>
<!-- / Layout wrapper -->



@include('dashboard.layout.script')

</body>

</html>
