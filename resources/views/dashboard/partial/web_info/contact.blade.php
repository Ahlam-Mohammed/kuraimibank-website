<div class="card mb-4">
    <div class="card-body">
        <form action="{{ route('dashboard.contact.contact.update') }}" method="post">
            @csrf

            <div class="row g-3 mb-3">
                {{--  Tell   --}}
                <div class="col-md-6">
                    <label class="form-label" for="facebook">
                        @lang('index.contact.tel')
                    </label>
                    <div class="input-group input-group-merge">
                        <input name="tel" value="{{ isset($tel->value) ? $tel['value'] : '' }}" type="text" class="form-control @error('tel') is-invalid @enderror" id="tel" placeholder="Telphone">
                    </div>
                    @error('tel')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>

                {{--  tollFree   --}}
                <div class="col-md-6">
                    <label class="form-label" for="twitter">
                        @lang('index.contact.tollFree')
                    </label>
                    <div class="input-group input-group-merge">
                        <input name="tollFree" value="{{ isset($tollFree->value) ? $tollFree['value'] : '' }}" type="text" class="form-control @error('tollFree') is-invalid @enderror" id="tollFree" placeholder="tollFree">
                    </div>
                    @error('tollFree')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>

            {{--  fax   --}}
            <div class="mb-3">
                <label class="form-label" for="fax">
                    @lang('index.contact.fax')
                </label>
                <div class="input-group input-group-merge">
                    <input name="fax" value="{{ isset($fax->value ) ? $fax['value'] : ''  }}" type="text" class="form-control @error('fax') is-invalid @enderror" id="fax" placeholder="Fax">
                </div>
                @error('fax')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>

            {{--  box   --}}
            <div class="mb-3">
                <label class="form-label" for="box">
                    @lang('index.contact.box')
                </label>
                <div class="input-group input-group-merge">
                    <input name="box" value="{{ isset($box->value) ? $box['value'] : '' }}" type="text" class="form-control @error('box') is-invalid @enderror" id="box" placeholder="box">
                </div>
                @error('box')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>

            {{--  email   --}}
            <div class="mb-3">
                <label class="form-label" for="email">
                    @lang('index.contact.email')
                </label>
                <div class="input-group input-group-merge">
                    <input name="email" value="{{ isset($email->value) ? $email['value'] : '' }}" type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="email@email.com">
                </div>
                @error('email')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">@lang('general.update')</button>
            </div>
        </form>
    </div>
</div>
