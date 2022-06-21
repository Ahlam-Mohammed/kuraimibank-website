<div class="card mb-4">
    <div class="card-body">
        <form action="{{ route('dashboard.web-info.vision.update') }}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">
                    @lang('page.vision')
                    <span class="text-lowercase">\(Arabic)</span>
                </label>
                <textarea name="vision_ar" class="form-control  @error('vision_ar') is-invalid @enderror" id="vision_ar" rows="3">@if(isset($vision)){{ $vision->getTranslation('value', 'ar') }}@endif</textarea>
                @error('vision_ar')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">
                    @lang('page.vision')
                    <span class="text-lowercase">\(English)</span>
                </label>
                <textarea name="vision_en" class="form-control  @error('vision_en') is-invalid @enderror" id="vision_en" rows="3">@if(isset($vision)){{ $vision->getTranslation('value', 'en') }}@endif</textarea>
                @error('vision_en')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">@lang('general.update')</button>
        </form>
    </div>
</div>
