{{-- Table News --}}
<x-table class="table-news">

    {{-- Table Title --}}
    <x-slot:title>
        <h5 class="card-header">@lang('index.news.news')</h5>
        @can('news-create')
            <button type="button" data-bs-toggle="modal" data-bs-target="#ModalAddNews" class="btn rounded-pill btn-icon btn-label-primary">
                <span class="tf-icons bx bx-plus"></span>
            </button>
        @endcan
    </x-slot:title>

    {{-- Table Header --}}
    <x-slot:thead>
        <th>@lang('index.news.id')</th>
        <th>@lang('index.news.title')</th>
        <th>@lang('general.created_at')</th>
        <th>@lang('general.status')</th>
        <th></th>
    </x-slot:thead>

    <x-slot:tbody>
        @foreach($news as $new)
            <tr>
                <td><strong> {{ $new->id }} </strong></td>
                <td> {{ $new->title }} </td>
                <td> {{ $new->created_at }} </td>
                <td>
                    @if($new->is_active)
                        <span class="badge bg-label-primary me-1">@lang('general.activated')</span>
                    @else
                        <span class="badge bg-label-secondary me-1">@lang('general.not_activated')</span>
                    @endif
                </td>
                <td>
                    <x-dropdown-table>
                        @can('news-edit')
                            <button class="dropdown-item" onclick="edit_news({{ $new->id }})" type="button" data-bs-toggle="modal" data-bs-target="#ModalEditNews" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                                @lang('general.edit')
                            </button>
                        @endcan
                        @can('news-delete')
                            <button class="dropdown-item" onclick="delete_news({{ $new->id }})" type="button"  data-bs-toggle="modal"  data-bs-target="#ModalDeleteNews" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                                @lang('general.delete')
                            </button>
                            <button class="dropdown-item" type="button" onclick="active_news({{ $new->id }})" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                                @if($new->is_active)
                                    @lang('general.deactivation')
                                @else
                                    @lang('general.active')
                                @endif
                            </button>
                        @endcan
                    </x-dropdown-table>
                </td>
            </tr>
        @endforeach
    </x-slot:tbody>

</x-table>

{{--  Add News Modal --}}
<x-modal id="ModalAddNews" :title="'add'">

    {{-- Model Body --}}
    <x-slot:body>
        <div class="row">
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.news.title')  <span class="text-lowercase">\(Arabic)</span> </label>
                <input name="title_ar" value="" id="title_ar" type="text" class="form-control" placeholder="???????? ?????????????? ???????????? ??????????????">
                <div id="title_error_ar" class="invalid-feedback" style="display: block"></div>
            </div>

            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.news.title') <span class="text-lowercase">\(English)</span> </label>
                <input name="title_en" value="" id="title_en" type="text" class="form-control" placeholder="???????? ?????????????? ???????????? ????????????????????">
                <div id="title_error_en" class="invalid-feedback" style="display: block"></div>
            </div>

        </div>
        <hr class="my-4 mx-n4" />

        {{--   News Description     --}}
        <div class="row g-3">
            <div class="col-12">
                <label class="form-label" for="desc_ar">@lang('index.news.desc') <span class="text-lowercase">\(Arabic)</span></label>
                <textarea name="desc_ar" class="form-control  @error('desc_ar') is-invalid @enderror" id="desc_ar" rows="3" placeholder="???????? ?????????? ???????????? ??????????????"></textarea>
                <div id="desc_error_ar" class="invalid-feedback" style="display: block"></div>
            </div>

            <div class="col-12">
                <label class="form-label" for="desc_en">@lang('index.news.desc') <span class="text-lowercase">\(English)</span></label>
                <textarea name="desc_en" class="form-control  @error('desc_en') is-invalid @enderror" id="desc_en" rows="3" placeholder="???????? ?????????? ???????????? ????????????????????"></textarea>
                <div id="desc_error_en" class="invalid-feedback" style="display: block"></div>
            </div>
        </div>
        <hr class="my-4 mx-n4" />

        {{--   News Description     --}}
        <div class="row g-3">
            <div class="col-12">
                <label class="form-label" for="desc_ar">@lang('index.news.background')</label>
                <input name="background" id="background" type="file" class="form-control @error('background') is-invalid @enderror">
                <div id="background_error" class="invalid-feedback" style="display: block"></div>
            </div>

            <div class="col-12">
                <label class="form-label" for="desc_ar">@lang('index.news.image')</label>
                <input name="image" id="image" type="file" class="form-control @error('image') is-invalid @enderror">
                <div id="image_error" class="invalid-feedback" style="display: block"></div>
            </div>

        </div>
        <hr class="my-4 mx-n4" />

    </x-slot:body>

    {{-- Model Footer --}}
    <x-slot:footer>
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">@lang('general.cancel')</button>
        <button class="btn btn-primary add_news">@lang('general.save')</button>
    </x-slot:footer>

</x-modal>

{{--  Edit News Modal --}}
<x-modal id="ModalEditNews" :title="'edit'">

    {{-- Model Body --}}
    <x-slot:body>
        <ul id="errorMsg"></ul>
        <input hidden id="news_id">
        <div class="row">
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.news.title')  <span class="text-lowercase">\(Arabic)</span> </label>
                <input name="title_ar" value="" id="title_ar" type="text" class="form-control" placeholder="???????? ?????????????? ???????????? ??????????????">
            </div>
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.news.title') <span class="text-lowercase">\(English)</span> </label>
                <input name="title_en" value="" id="title_en" type="text" class="form-control" placeholder="???????? ?????????????? ???????????? ????????????????????">
            </div>
        </div>
        <hr class="my-4 mx-n4" />

        {{--   News Description     --}}
        <div class="row g-3">
            <div class="col-12">
                <label class="form-label" for="desc_ar">@lang('index.news.desc') <span class="text-lowercase">\(Arabic)</span></label>
                <textarea name="desc_ar" class="form-control  @error('desc_ar') is-invalid @enderror" id="desc_ar" rows="3" placeholder="???????? ?????????? ???????????? ??????????????"></textarea>
                @error('desc_ar')
                <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>
            <div class="col-12">
                <label class="form-label" for="desc_en">@lang('index.news.desc') <span class="text-lowercase">\(English)</span></label>
                <textarea name="desc_en" class="form-control  @error('desc_en') is-invalid @enderror" id="desc_en" rows="3" placeholder="???????? ?????????? ???????????? ????????????????????"></textarea>
                @error('desc_en')
                <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>
        </div>
        <hr class="my-4 mx-n4" />

        {{--   News Description     --}}
        <div class="row g-3">
            <div class="col-12">
                <label class="form-label" for="desc_ar">@lang('index.news.background')</label>
                <input name="background" id="background" type="file" class="form-control @error('background') is-invalid @enderror">
                @error('background')
                <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>
            <div class="col-12">
                <label class="form-label" for="desc_ar">@lang('index.news.image')</label>
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

{{--  Delete News Modal --}}
<x-modal id="ModalDeleteNews" :title="'delete'">

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
        <button type="submit" class="btn btn-danger" id="delete_news">@lang('general.yes')</button>
    </x-slot:footer>

</x-modal>
