@extends('dashboard.layout.master')

@section('title')
    @lang('page.settings')
@stop

@section('content')

    <h4 class="fw-bold py-3 mb-4">
        <span class="fw-light">
           @lang('page.settings')
        </span>
    </h4>

    <x-alert/>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <!-- Account -->
                <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img src="{{ asset('storage/users/'. Auth::user()->avatar) }}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                        <div class="button-wrapper">
                            <label type="button"  data-bs-toggle="modal" data-bs-target="#ModalUpdate" for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                <span class="d-none d-sm-block">@lang('general.upload')</span>
                                <i class="bx bx-upload d-block d-sm-none"></i>
                            </label>
                        </div>
                    </div>
                </div>
                <hr class="my-0">
                <div class="card-body">
                    <form action="{{ route('dashboard.update.account') }}" id="formAccountSettings" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nameWithTitle" class="form-label">@lang('index.users.name')</label>
                                <input name="name" value="{{ Auth::user()->name }}" id="name" type="text" class="form-control  @error('name') is-invalid @enderror">
                                @error('name')
                                <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="nameWithTitle" class="form-label">@lang('index.users.email')</label>
                                <input name="email" value="{{ Auth::user()->email }}" id="email" type="email" class="form-control  @error('email') is-invalid @enderror">
                                @error('email')
                                <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-2 text-end">
                            <button type="submit" class="btn btn-primary me-2">@lang('general.save')</button>
                        </div>
                    </form>
                </div>
                <!-- /Account -->
            </div>
            <div class="card mb-4">
                <h5 class="card-header">تغير كلمة السر</h5>
                <div class="card-body">
                    <form action="{{ route('dashboard.update.password') }}" id="formAccountSettings" method="POST" >
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6 form-password-toggle">
                                <label class="form-label" for="currentPassword">كلمة السر الحالية</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control" type="password" name="current_password" id="currentPassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6 form-password-toggle">
                                <label class="form-label" for="newPassword">كلمة السر الجديدة</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control @error('new_password') is-invalid @enderror" type="password" id="newPassword" name="new_password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    @error('new_password')
                                        <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 col-md-6 form-password-toggle">
                                <label class="form-label" for="confirmPassword">تأكيد كلمة السر الجديدة</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control" type="password" name="confirm_password" id="confirmPassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <div class="col-12 mb-4">
                                <p class="fw-semibold mt-2">متطلبات كلمة المرور:</p>
                                <ul class="ps-3 mb-0">
                                    <li class="mb-1">
                                        لا يقل طولها عن 8 أحرف - كلما كان ذلك أكبر ، كان ذلك أفضل
                                    </li>
                                    <li class="mb-1">تتطلب رقمًا واحدًا على الأقل.</li>
                                    <li class="mb-1">تتطلب رمزًا واحدًا على الأقل.</li>
                                    <li class="mb-1">تتطلب حرفًا كبيرًا واحدًا وحرفًا صغيرًا واحدًا على الأقل.</li>
                                </ul>
                            </div>
                            <div class="col-12 mt-1 text-end">
                                <button type="submit" class="btn btn-primary me-2">@lang('general.save')</button>
                                <button type="reset" class="btn btn-label-secondary">@lang('general.cancel')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <h5 class="card-header">حذف الحساب</h5>
                <div class="card-body">
                    <div class="mb-3 col-12 mb-0">
                        <div class="alert alert-warning">
                            <h6 class="alert-heading fw-bold mb-1">هل انت متأكد انك تريد حذف حسابك؟</h6>
                            <p class="mb-0">بمجرد حذف حسابك ، لن يكون هناك عودة. من فضلك كن متأكدا.</p>
                        </div>
                    </div>
                    <form action="{{ route('dashboard.delete.account') }}" method="get" class=" text-end" id="formAccountDeactivation" >
                        <button type="submit"  class="btn btn-danger deactivate-account">تعطيل الحساب</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{--  Add User Modal --}}
    <form action="{{ route('dashboard.update.avatar') }}" method="post" enctype="multipart/form-data">
        @csrf
        <x-modal id="ModalUpdate" :title="'edit'">

            {{-- Model Body --}}
            <x-slot:body>

                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="nameWithTitle" class="form-label">@lang('index.users.avatar')</label>
                        <input name="avatar" id="name" type="file" class="form-control  @error('avatar') is-invalid @enderror" >
                        @error('avatar')
                            <div class="invalid-feedback"> {{ $message }} </div>
                        @enderror
                    </div>
                </div>

            </x-slot:body>

            {{-- Model Footer --}}
            <x-slot:footer>
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">@lang('general.cancel')</button>
                <button type="submit" class="btn btn-primary">@lang('general.save')</button>
            </x-slot:footer>

        </x-modal>
    </form>

@stop
