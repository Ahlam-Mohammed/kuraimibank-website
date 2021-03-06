@extends('dashboard.layout.master')

@section('title')
    @lang('page.edit_service')
@stop

@push('scripts_after')
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('other_advantage_ar', {
            uiColor: '#FFFFFF',
            language: 'ar',
            removeButtons: 'PasteFromWord'
        });
        CKEDITOR.replace('other_advantage_en', {
            uiColor: '#FFFFFF',
            removeButtons: 'PasteFromWord'
        });
    </script>

@endpush

@section('content')

    <h4 class="fw-bold py-3 mb-4">
        <span class="fw-light">
           @lang('page.services') / @lang('page.edit_service')
        </span>
    </h4>

    <x-alert/>

    <div class="row">
        <div class="col-lg">
            <div class="card mb-4">
                <h5 class="card-header">@lang('page.edit_service')</h5>
                <form action="{{ route('dashboard.services-update', $service->id) }}" class="card-body" method="post" enctype="multipart/form-data" novalidat>
                    @csrf
                    {{--   Service Name     --}}
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label" for="name_ar">@lang('index.service.name') <span class="text-lowercase">\(Arabic)</span></label>
                            <input name="name_ar" value="{{ $service->getTranslation('name', 'ar') }}" type="text" id="name_ar" class="form-control @error('name_ar') is-invalid @enderror" placeholder="ادخل اسم الخدمة باللغة العربية" />
                            @error('name_ar')
                            <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="name_en">@lang('index.service.name') <span class="text-lowercase">\(English)</span></label>
                            <input name="name_en"value="{{ $service->getTranslation('name', 'en') }}" type="text" id="name_en" class="form-control  @error('name_en') is-invalid @enderror" placeholder="ادخل اسم الخدمة باللغة الإنجليزية" />
                            @error('name_en')
                            <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>
                    <hr class="my-4 mx-n4" />

                    {{--   Service Description     --}}
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label" for="desc_ar">@lang('index.service.desc') <span class="text-lowercase">\(Arabic)</span></label>
                            <textarea name="desc_ar" class="form-control  @error('desc_ar') is-invalid @enderror" id="desc_ar" rows="3" placeholder="ادخل وصف الخدمة باللغة العربية">{{ $service->getTranslation('desc', 'ar') }}</textarea>
                            @error('desc_ar')
                            <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="desc_en">@lang('index.service.desc') <span class="text-lowercase">\(English)</span></label>
                            <textarea name="desc_en" class="form-control  @error('desc_en') is-invalid @enderror" id="desc_en" rows="3" placeholder="ادخل وصف الخدمة باللغة الإنجليزية">{{ $service->getTranslation('desc', 'en') }}</textarea>
                            @error('desc_en')
                            {{--                    <div class="invalid-feedback"> {{ $message }} </div>--}}
                            @enderror
                        </div>
                    </div>
                    <hr class="my-4 mx-n4" />

                    <div class="row g-3">
                        {{--    Service Image    --}}
                        <div class="col-6">
                            <label class="form-label" for="image">@lang('index.service.image')</label>
                            <input name="image" class="form-control  @error('image') is-invalid @enderror" type="file" id="image"
                                   oninput="preViewImage.src=window.URL.createObjectURL(this.files[0])">
                            <div class="text-center p-2">
                                <img id="preViewImage" src="{{ asset('storage/services/'. $service->image) }}" style="max-height: 100px">
                            </div>
                            @error('image')
                            <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>

                        {{--    Service background    --}}
                        <div class="col-6">
                            <label class="form-label" for="background">@lang('index.service.background')</label>
                            <input name="background" class="form-control  @error('background') is-invalid @enderror" type="file" id="background"
                                   oninput="preViewBackground.src=window.URL.createObjectURL(this.files[0])">
                            <div class="text-center p-2">
                                <img id="preViewBackground" src="{{ asset('storage/services/'. $service->background) }}" style="max-height: 100px">
                            </div>
                            @error('background')
                            <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>

                    </div>
                    <hr class="my-4 mx-n4" />

                    {{-- Service Category --}}
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="selectpickerBasic" class="form-label">@lang('index.service.category')</label>
                            <select name="category_id" value="{{ $service->category_id }}" id="selectpickerBasic" class="selectpicker w-100  @error('category_id') is-invalid @enderror" data-style="btn-default">
                                <option selected disabled>@lang('index.service_category.category')</option>
                                @foreach($categories as $category)
                                    <option @if($service->category_id === $category->id) selected @endif value="{{ $category->id }}">{{ $category->is_branch ? ($category->parent->name  ." / ".  $category->name) : $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="selectpickerBasic" class="form-label">Position</label>
                            <select name="position" value="{{ $service->position }}" id="position" class="selectpicker w-100  @error('position') is-invalid @enderror" data-style="btn-default">
                                <option value="{{ \App\Enum\SettingEnum::POSITION_HOME_MAIN }}"
                                        @if($service->position === \App\Enum\SettingEnum::POSITION_HOME_MAIN) selected @endif>
                                    {{ \App\Enum\SettingEnum::POSITION_HOME_MAIN }}
                                </option>
                                <option value="{{ \App\Enum\SettingEnum::POSITION_OTHER }}"
                                        @if($service->position === \App\Enum\SettingEnum::POSITION_OTHER) selected @endif>
                                    {{ \App\Enum\SettingEnum::POSITION_OTHER }}
                                </option>
                            </select>
                            @error('position')
                            <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>
                    <hr class="my-4 mx-n4" />

                    {{-- other_advantage  --}}
                    <div class="row g-3">
                        <div class="form-group">
                            <label class="form-label" for="service_condition_ar">@lang('index.service.service_condition') <span class="text-lowercase">\(Arabic)</span></label>
                            <textarea id="service_condition_ar"  class="form-control @error('service_condition_ar') is-invalid @enderror" name="service_condition_ar">{{$service->getTranslation('service_condition', 'ar')}}</textarea>
                            @error('service_condition_ar')
                            <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="service_condition_en">@lang('index.service.service_condition') <span class="text-lowercase">\(English)</span></label>
                            <textarea id="service_condition_en" class=" form-control @error('service_condition_en') is-invalid @enderror" name="service_condition_en">{{$service->getTranslation('service_condition', 'en')}}</textarea>
                            @error('service_condition_en')
                            <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>
                    <hr class="my-4 mx-n4" />

                    {{-- other_advantage  --}}
                    <div class="row g-3">
                        <div class="form-group">
                            <label class="form-label" for="other_advantage_ar">@lang('index.service.other_advantage') <span class="text-lowercase">\(Arabic)</span></label>
                            <textarea id="other_advantage_ar" value="{{ old('other_advantage_ar') }}" class="ckeditor form-control @error('other_advantage_ar') is-invalid @enderror" name="other_advantage_ar">{{$service->getTranslation('other_advantage', 'ar')}}</textarea>
                            @error('other_advantage_ar')
                            <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="other_advantage_en">@lang('index.service.other_advantage') <span class="text-lowercase">\(English)</span></label>
                            <textarea id="other_advantage_en" value="{{ old('other_advantage_en') }}" class="ckeditor form-control @error('other_advantage_en') is-invalid @enderror" name="other_advantage_en">{{$service->getTranslation('other_advantage', 'ar')}}</textarea>
                            @error('other_advantage_en')
                            <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>

                    <div class="pt-4 text-end">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1">@lang('general.save')</button>
                        <button type="reset" class="btn btn-label-secondary">@lang('general.cancel')</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

@stop
