<div class="card mb-4">
    <div class="card-body">
        <form action="{{ route('dashboard.web-info.policy.update') }}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">
                    @lang('page.privacy-policy')
                    <span class="text-lowercase">\(Arabic)</span>
                </label>
                <textarea name="policy_ar" class="form-control  @error('policy_ar') is-invalid @enderror" id="policy_ar" rows="3">@if(isset($policy)){{ $policy->getTranslation('value', 'ar') }}@endif</textarea>
                @error('policy_ar')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">
                    @lang('page.privacy-policy')
                    <span class="text-lowercase">\(English)</span>
                </label>
                <textarea name="policy_en" class="form-control  @error('policy_en') is-invalid @enderror" id="policy_en" rows="3">@if(isset($policy)){{ $policy->getTranslation('value', 'en') }}@endif</textarea>
                @error('policy_en')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">@lang('general.update')</button>
            </div>
        </form>
    </div>
</div>
