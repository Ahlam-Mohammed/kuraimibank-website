<div class="card mb-4">
    <div class="card-body">
        <form action="{{ route('dashboard.web-info.about.update') }}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">
                    @lang('page.about')
                    <span class="text-lowercase">\(Arabic)</span>
                </label>
                <textarea name="about_ar" class="form-control  @error('about_ar') is-invalid @enderror" id="about_ar" rows="3">@if(isset($about)){{ $about->getTranslation('value', 'ar') }}@endif</textarea>
                @error('about_ar')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">
                    @lang('page.about')
                    <span class="text-lowercase">\(English)</span>
                </label>
                <textarea name="about_en" class="form-control  @error('about_en') is-invalid @enderror" id="about_en" rows="3">@if(isset($about)){{ $about->getTranslation('value', 'en') }}@endif</textarea>
                @error('about_en')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">@lang('general.update')</button>
            </div>
        </form>
    </div>
</div>
