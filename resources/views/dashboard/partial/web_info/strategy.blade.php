<div class="card mb-4">
    <div class="card-body">
        <form action="{{ route('dashboard.web-info.strategy.update') }}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">
                    @lang('page.strategy')
                    <span class="text-lowercase">\(Arabic)</span>
                </label>
                <textarea name="strategy_ar" class="form-control  @error('strategy_ar') is-invalid @enderror" id="strategy_ar" rows="3">@if(isset($strategy)){{ $strategy->getTranslation('value', 'ar') }}@endif</textarea>
                @error('strategy_ar')
                <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">
                    @lang('page.strategy')
                    <span class="text-lowercase">\(English)</span>
                </label>
                <textarea name="strategy_en" class="form-control  @error('strategy_en') is-invalid @enderror" id="strategy_en" rows="3">@if(isset($strategy)){{ $strategy->getTranslation('value', 'en') }}@endif</textarea>
                @error('strategy_en')
                <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">@lang('general.update')</button>
        </form>
    </div>
</div>
