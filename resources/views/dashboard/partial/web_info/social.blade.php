<div class="card mb-4">
    <div class="card-body">
        <form action="{{ route('dashboard.contact.social.update') }}" method="post">
            @csrf

            {{--  facebook   --}}
            <div class="mb-3">
                <label class="form-label" for="facebook">
                    Facebook
                </label>
                <div class="input-group input-group-merge">
                    <span id="facebook" class="input-group-text"><i class="bx bxl-facebook"></i></span>
                    <input name="facebook" value="{{ isset($facebook->value) ? $facebook['value'] : '' }}" type="url" class="form-control @error('facebook') is-invalid @enderror" id="facebook" placeholder="Facebook URL">
                </div>
                @error('facebook')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>

            {{--  twitter   --}}
            <div class="mb-3">
                <label class="form-label" for="twitter">
                    Twitter
                </label>
                <div class="input-group input-group-merge">
                    <span id="twitter" class="input-group-text"><i class="bx bxl-twitter"></i></span>
                    <input name="twitter" value="{{ isset($twitter->value) ? $twitter['value'] : '' }}" type="url" class="form-control @error('twitter') is-invalid @enderror" id="twitter" placeholder="Twitter URL">
                </div>
                @error('twitter')
                <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>

            {{--  whatsapp   --}}
            <div class="mb-3">
                <label class="form-label" for="whatsapp">
                    Whatsapp
                </label>
                <div class="input-group input-group-merge">
                    <span id="whatsapp" class="input-group-text"><i class="bx bxl-whatsapp"></i></span>
                    <input name="whatsapp" value="{{ isset($whatsapp->value ) ? $whatsapp['value'] : ''  }}" type="url" class="form-control @error('whatsapp') is-invalid @enderror" id="twitter" placeholder="Whatsapp URL">
                </div>
                @error('whatsapp')
                <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>

            {{--  google   --}}
            <div class="mb-3">
                <label class="form-label" for="google">
                    Google
                </label>
                <div class="input-group input-group-merge">
                    <span id="google" class="input-group-text"><i class="bx bxl-google"></i></span>
                    <input name="google" value="{{ isset($google->value) ? $google['value'] : '' }}" type="url" class="form-control @error('google') is-invalid @enderror" id="google" placeholder="Google URL">
                </div>
                @error('google')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>

            {{--  instagram   --}}
            <div class="mb-3">
                <label class="form-label" for="instagram">
                    Instagram
                </label>
                <div class="input-group input-group-merge">
                    <span id="instagram" class="input-group-text"><i class="bx bxl-instagram"></i></span>
                    <input name="instagram" value="{{ isset($instagram->value) ? $instagram['value'] : '' }}" type="url" class="form-control @error('instagram') is-invalid @enderror" id="instagram" placeholder="Instagram URL">
                </div>
                @error('instagram')
                <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">@lang('general.update')</button>
        </form>
    </div>
</div>
