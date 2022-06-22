{{-- Table our-partner --}}
<x-table class="table-partne">

    {{-- Table Title --}}
    <x-slot:title>
        <h5 class="card-header">@lang('index.partner.partner')</h5>
        <button type="button" data-bs-toggle="modal" data-bs-target="#ModalAddPartner" class="btn rounded-pill btn-icon btn-label-primary">
            <span class="tf-icons bx bx-plus"></span>
        </button>
    </x-slot:title>

    {{-- Table Header --}}
    <x-slot:thead>
        <th>@lang('index.news.id')</th>
        <th>@lang('index.partner.name')</th>
        <th>@lang('general.created_at')</th>
        <th>@lang('general.status')</th>
        <th></th>
    </x-slot:thead>

    <x-slot:tbody>
        @foreach($partners as $partner)
            <tr>
                <td><strong> {{ $partner->id }} </strong></td>
                <td> {{ $partner->name }} </td>
                <td> {{ $partner->created_at }} </td>
                <td>
                    @if($partner->is_active )
                        <span class="badge bg-label-primary me-1">@lang('general.activated')</span>
                    @else
                        <span class="badge bg-label-secondary me-1">@lang('general.not_activated')</span>
                    @endif
                </td>
                <td>
                    <x-dropdown-table>
                        <button class="dropdown-item"  type="button" data-bs-toggle="modal" data-bs-target="#ModalEditPartner-{{ $partner->id, $partner->name, $partner->desc, $partner->image }}">
                            <i class="bx bx-edit-alt me-1"></i>
                            @lang('general.edit')
                        </button>
                        <button class="dropdown-item" type="button"  data-bs-toggle="modal"  data-bs-target="#ModalDeletePartner-{{ $partner->id }}">
                            <i class="bx bx-trash me-1"></i>
                            @lang('general.delete')
                        </button>
                        <a class="dropdown-item" href="{{ route('dashboard.partner.partner.active', $partner->id) }}"><i class="bx bx-edit-alt me-1"></i>
                            @if($partner->is_active ) @lang('general.deactivation') @else @lang('general.active')@endif
                        </a>
                    </x-dropdown-table>
                </td>
            </tr>

            <form action="{{ route('dashboard.partner.partner.update', $partner->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                {{--  Edit Partner Modal --}}
                <x-modal id="ModalEditPartner-{{ $partner->id, $partner->name, $partner->desc, $partner->image  }}" :title="'edit'">

                    {{-- Model Body --}}
                    <x-slot:body>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="nameWithTitle" class="form-label">@lang('index.partner.name')  <span class="text-lowercase">\(Arabic)</span> </label>
                                <input name="name_ar" value="{{ $partner->getTranslation('name', 'ar') }}" id="name_ar" type="text" class="form-control @error('name_ar') is-invalid @enderror" placeholder="ادخل الاسم باللغة العربية">
                                @error('name_ar')
                                <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <label for="nameWithTitle" class="form-label">@lang('index.news.title') <span class="text-lowercase">\(English)</span> </label>
                                <input name="name_en" value="{{ $partner->getTranslation('name', 'en') }}" id="name_en" type="text" class="form-control @error('name_en') is-invalid @enderror" placeholder="ادخل الاسم باللغة الإنجليزية">
                                @error('name_en')
                                <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>
                        <hr class="my-4 mx-n4" />

                        {{--   Description     --}}
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label" for="desc_ar">@lang('index.partner.desc') <span class="text-lowercase">\(Arabic)</span></label>
                                <textarea name="desc_ar" class="form-control  @error('desc_ar') is-invalid @enderror" id="desc_ar" rows="3" placeholder="ادخل الوصف باللغة العربية"> {{ $partner->getTranslation('desc', 'ar') }} </textarea>
                                @error('desc_ar')
                                <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label" for="desc_en">@lang('index.partner.desc') <span class="text-lowercase">\(English)</span></label>
                                <textarea name="desc_en" class="form-control  @error('desc_en') is-invalid @enderror" id="desc_en" rows="3" placeholder="ادخل الوصف باللغة الإنجليزية"> {{ $partner->getTranslation('desc', 'en') }} </textarea>
                                @error('desc_en')
                                <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>
                        <hr class="my-4 mx-n4" />

                        {{--   Image     --}}
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label" for="desc_ar">@lang('index.partner.image')</label>
                                <input name="image" id="image" type="file" class="form-control @error('image') is-invalid @enderror">
                                @error('image')
                                <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>
                        <hr class="my-4 mx-n4" />
                    </x-slot:body>

                    {{-- Model Footer --}}
                    <x-slot:footer>
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">@lang('general.cancel')</button>
                        <button type="submit" class="btn btn-primary" id="update_news">@lang('general.save')</button>
                    </x-slot:footer>

                </x-modal>
            </form>

            {{--  Delete Partner Modal --}}
            <x-modal id="ModalDeletePartner-{{ $partner->id }}" :title="'delete'">

                {{-- Model Body --}}
                <x-slot:body>
                    <input type="hidden" id="news_id">
                    <div class="row">
                        <div class="col mb-3">
                            <h3>@lang('messages.confirm_delete_message')</h3>
                        </div>
                    </div>
                </x-slot:body>

                {{-- Model Footer --}}
                <x-slot:footer>
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">@lang('general.cancel')</button>
                    <a href="{{ route('dashboard.partner.partner.delete', $partner->id) }}" class="btn btn-danger" id="delete_news">@lang('general.yes')</a>
                </x-slot:footer>

            </x-modal>
        @endforeach
    </x-slot:tbody>

</x-table>

{{--  Add Partner Modal --}}
<form action="{{ route('dashboard.partner.partner.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <x-modal id="ModalAddPartner" :title="'add'">
        {{-- Model Body --}}
        <x-slot:body>
            <div class="row">
                <div class="col-12 mb-3">
                    <label for="nameWithTitle" class="form-label">@lang('index.partner.name')  <span class="text-lowercase">\(Arabic)</span> </label>
                    <input name="name_ar" value="{{ old('name_ar') }}" id="name_ar" type="text" class="form-control @error('name_ar') is-invalid @enderror" placeholder="ادخل الاسم باللغة العربية">
                    @error('name_ar')
                    <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>

                <div class="col-12 mb-3">
                    <label for="nameWithTitle" class="form-label">@lang('index.news.title') <span class="text-lowercase">\(English)</span> </label>
                    <input name="name_en" value="{{ old('name_en') }}" id="name_en" type="text" class="form-control @error('name_en') is-invalid @enderror" placeholder="ادخل الاسم باللغة الإنجليزية">
                    @error('name_en')
                    <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>
            <hr class="my-4 mx-n4" />

            {{--   Description     --}}
            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label" for="desc_ar">@lang('index.partner.desc') <span class="text-lowercase">\(Arabic)</span></label>
                    <textarea name="desc_ar" class="form-control  @error('desc_ar') is-invalid @enderror" id="desc_ar" rows="3" placeholder="ادخل الوصف باللغة العربية">{{ old('desc_ar') }}</textarea>
                    @error('desc_ar')
                    <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>

                <div class="col-12">
                    <label class="form-label" for="desc_en">@lang('index.partner.desc') <span class="text-lowercase">\(English)</span></label>
                    <textarea name="desc_en" class="form-control  @error('desc_en') is-invalid @enderror" id="desc_en" rows="3" placeholder="ادخل الوصف باللغة الإنجليزية">{{ old('desc_en') }}</textarea>
                    @error('desc_en')
                    <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>
            <hr class="my-4 mx-n4" />

            {{--   Image     --}}
            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label" for="desc_ar">@lang('index.partner.image')</label>
                    <input name="image" id="image" type="file" class="form-control @error('image') is-invalid @enderror">
                    @error('image')
                    <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>
            <hr class="my-4 mx-n4" />

        </x-slot:body>

        {{-- Model Footer --}}
        <x-slot:footer>
            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">@lang('general.cancel')</button>
            <button type="submit" class="btn btn-primary">@lang('general.save')</button>
        </x-slot:footer>
    </x-modal>
</form>
