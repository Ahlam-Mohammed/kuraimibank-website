{{-- Table Exchange Rate --}}
<x-table class="table-rates">

    {{-- Table Title --}}
    <x-slot:title>
        <h5 class="card-header">@lang('index.rates.exchange_rates')</h5>
        <button type="button" data-bs-toggle="modal" data-bs-target="#ModalAddRate" class="btn rounded-pill btn-icon btn-label-primary">
            <span class="tf-icons bx bx-plus"></span>
        </button>
    </x-slot:title>

    {{-- Table Header --}}
    <x-slot:thead>
        <th>@lang('index.rates.id')</th>
        <th>@lang('index.rates.name')</th>
        <th>@lang('index.rates.sale')</th>
        <th>@lang('index.rates.buy')</th>
        <th>@lang('general.created_at')</th>
        <th>@lang('general.status')</th>
        <th></th>
    </x-slot:thead>

    <x-slot:tbody>
        @foreach($rates as $rate)
            <tr>
                <td><strong> {{ $rate->id }} </strong></td>
                <td> {{ $rate->name }} </td>
                <td> {{ $rate->sale }} </td>
                <td> {{ $rate->buy }} </td>
                <td> {{ $rate->created_at }} </td>
                <td>
                    @if($rate->is_active)
                        <span class="badge bg-label-primary me-1">@lang('general.activated')</span>
                    @else
                        <span class="badge bg-label-secondary me-1">@lang('general.not_activated')</span>
                    @endif
                </td>
                <td>
                    <x-dropdown-table>
                        <button class="dropdown-item" onclick="edit_rate({{ $rate->id }})" type="button" data-bs-toggle="modal" data-bs-target="#ModalEditRate" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                            @lang('general.edit')
                        </button>
                        <button class="dropdown-item" onclick="delete_rate({{ $rate->id }})" type="button"  data-bs-toggle="modal"  data-bs-target="#ModalDeleteRate" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                            @lang('general.delete')
                        </button>
                        <button class="dropdown-item" type="button" onclick="active_rate({{ $rate->id }})" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                           @if($rate->is_active)
                                @lang('general.deactivation')
                            @else
                                @lang('general.active')
                            @endif
                        </button>
                    </x-dropdown-table>
                </td>
            </tr>
        @endforeach
    </x-slot:tbody>

</x-table>

{{--  Add Exchange Rate Modal --}}
<x-modal id="ModalAddRate" :title="'add'">

    {{-- Model Body --}}
    <x-slot:body>
        <ul id="errorMsg"></ul>
        <div class="row">
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.rates.name')  <span class="text-lowercase">\(Arabic)</span> </label>
                <input name="name_ar" value="" id="name_ar" type="text" class="form-control" placeholder="ادخل الاسم باللغة العربية">
                <div id="name_error_ar" class="invalid-feedback" style="display: block"></div>
            </div>
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.rates.name') <span class="text-lowercase">\(English)</span> </label>
                <input name="name_en" value="" id="name_en" type="text" class="form-control" placeholder="ادخل الاسم باللغة الإنجليزية">
                <div id="name_error_en" class="invalid-feedback" style="display: block"></div>
            </div>
        </div>
        <hr class="my-4 mx-n4" />

        <div class="row">
            <div class="col-6 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.rates.sale')</label>
                <input name="sale" value="" id="sale" type="text" class="form-control">
                <div id="sale_error" class="invalid-feedback" style="display: block"></div>
            </div>
            <div class="col-6 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.rates.buy')</label>
                <input name="buy" value="" id="buy" type="text" class="form-control">
                <div id="buy_error" class="invalid-feedback" style="display: block"></div>
            </div>
        </div>
    </x-slot:body>

    {{-- Model Footer --}}
    <x-slot:footer>
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">@lang('general.cancel')</button>
        <button class="btn btn-primary add_rate">@lang('general.save')</button>
    </x-slot:footer>

</x-modal>

{{--  Edit Exchange Rate Modal --}}
<x-modal id="ModalEditRate" :title="'edit'">

    {{-- Model Body --}}
    <x-slot:body>
        <ul id="update_msgList"></ul>
        <input hidden id="rate_id">
        <div class="row">
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.rates.name')  <span class="text-lowercase">\(Arabic)</span> </label>
                <input name="name_ar" value="" id="name_ar" type="text" class="form-control" placeholder="ادخل الاسم باللغة العربية">
                <div id="name_error_ar" class="invalid-feedback" style="display: block"></div>
            </div>
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.rates.name') <span class="text-lowercase">\(English)</span> </label>
                <input name="name_en" value="" id="name_en" type="text" class="form-control" placeholder="ادخل الاسم باللغة الإنجليزية">
                <div id="name_error_en" class="invalid-feedback" style="display: block"></div>
            </div>
        </div>
        <hr class="my-4 mx-n4" />

        <div class="row">
            <div class="col-6 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.rates.sale')</label>
                <input name="sale" value="" id="sale" type="text" class="form-control">
                <div id="sale_error" class="invalid-feedback" style="display: block"></div>
            </div>
            <div class="col-6 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.rates.buy')</label>
                <input name="buy" value="" id="buy" type="text" class="form-control">
                <div id="buy_error" class="invalid-feedback" style="display: block"></div>
            </div>
        </div>
    </x-slot:body>

    {{-- Model Footer --}}
    <x-slot:footer>
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">@lang('general.cancel')</button>
        <button type="submit" class="btn btn-primary" id="update_rate">@lang('general.save')</button>
    </x-slot:footer>

</x-modal>

{{--  Delete Exchange Rate Modal --}}
<x-modal id="ModalDeleteRate" :title="'delete'">

    {{-- Model Body --}}
    <x-slot:body>
        <input type="hidden" id="rate_id">
        <div class="row">
            <div class="col mb-3">
                <h3>@lang('messages.confirm_delete_message')</h3>
            </div>
        </div>
    </x-slot:body>

    {{-- Model Footer --}}
    <x-slot:footer>
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">@lang('general.cancel')</button>
        <button type="submit" class="btn btn-danger" id="delete_rate">@lang('general.yes')</button>
    </x-slot:footer>

</x-modal>
