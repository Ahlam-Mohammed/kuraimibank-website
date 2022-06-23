<!DOCTYPE html>
<html lang="en"  class="light-style layout-navbar-fixed layout-menu-fixed " dir="ltr" data-theme="theme-semi-dark" data-assets-path="../../assets/" data-template="vertical-menu-template-semi-dark">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{ __('Login') }}</title>
    <meta name="_token" content="{{csrf_token()}}" />

    <meta name="description" content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    @include('dashboard.layout.style')

</head>

<body>

<!-- Layout wrapper -->
<div class="authentication-wrapper authentication-cover">
    <div class="authentication-inner row m-0">
        <!-- /Left Text -->
        <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center p-5">
            <div class="w-100 d-flex justify-content-center">
                <img src="{{ asset('images/kuraimi-logo.svg') }}" class="img-fluid" alt="Login image" width="700">
            </div>
        </div>
        <!-- /Left Text -->

        <!-- Login -->
        <div class="d-flex col-12 col-lg-5 col-xl-4 p-5 align-items-center bg-white vh-100 p-sm-5 p-4">
            <div class="w-px-400 mx-auto">
                <h4 class="card-header px-0">إعادة تعين كلمة السر</h4>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form id="formAuthentication" class="mb-3"  action="{{ route('password.email') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">@lang('general.email')</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your email or username" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <button class="btn btn-primary d-grid w-100">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </form>
            </div>
        </div>
        <!-- /Login -->
    </div>
</div>
<!-- / Layout wrapper -->

@include('dashboard.layout.script')

</body>

</html>
