@php
    $countries = \App\Models\Country::all();
@endphp
{{-- Table Cities --}}
<x-table class="table-cities">

    {{-- Table Title --}}
    <x-slot:title>
        <h5 class="card-header">@lang('index.city.cities')</h5>
        <button type="button" data-bs-toggle="modal" data-bs-target="#ModalAddCity" class="btn rounded-pill btn-icon btn-label-primary">
            <span class="tf-icons bx bx-plus"></span>
        </button>
    </x-slot:title>

    {{-- Table Header --}}
    <x-slot:thead>
        <th>@lang('index.city.id')</th>
        <th>@lang('index.city.name')</th>
        <th>@lang('index.country.country')</th>
        <th>@lang('general.status')</th>
        <th></th>
    </x-slot:thead>

    <x-slot:tbody>
        @foreach($cities as $city)
            <tr>
                <td><strong> {{ $city->id }} </strong></td>
                <td> {{ $city->name }} </td>
                <td> {{ $city->country->name }} </td>
                <td>
                    @if($city->is_active)
                        <span class="badge bg-label-primary me-1">@lang('general.activated')</span>
                    @else
                        <span class="badge bg-label-secondary me-1">@lang('general.not_activated')</span>
                    @endif
                </td>
                <td>
                    <x-dropdown-table>
                        <button class="dropdown-item edit_city" value="{{ $city->id }}" type="button" data-bs-toggle="modal" data-bs-target="#ModalEditCountry" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                            @lang('general.edit')
                        </button>
                        <button class="dropdown-item delete_city" type="button" value="{{ $city->id }}" data-bs-toggle="modal"  data-bs-target="#ModalDeleteCountry" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                            @lang('general.delete')
                        </button>
                        <button class="dropdown-item active_city" type="button" value="{{ $city->id }}" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                            @if($city->is_active) @lang('general.deactivation') @else @lang('general.active') @endif
                        </button>
                    </x-dropdown-table>
                </td>
            </tr>
        @endforeach
    </x-slot:tbody>

</x-table>

{{--  Add City Modal --}}
<x-modal id="ModalAddCity" :title="'add'">

    {{-- Model Body --}}
    <x-slot:body>
        <ul id="errorMsg"></ul>
        <div class="row">
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.city.name')  <span class="text-lowercase">\(Arabic)</span> </label>
                <input name="city_name_ar" id="city_name_ar" type="text" class="form-control" placeholder="ادخل الاسم باللغة العربية">
                <div id="name_error_ar" class="invalid-feedback" style="display: block"></div>
            </div>
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.city.name') <span class="text-lowercase">\(English)</span> </label>
                <input name="city_name_en" id="city_name_en" type="text" class="form-control" placeholder="ادخل الاسم باللغة الإنجليزية">
                <div id="name_error_en" class="invalid-feedback" style="display: block"></div>
            </div>
        </div>
        <hr class="my-0">
        <div class="row">
            <div class="col-12 mb-4">
                <label for="select2Basic" class="form-label">@lang('index.country.country')</label>
                <select name="city_country_id" id="city_country_id"  class="select2 form-select form-select-lg" data-allow-clear="true">
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
                <div id="country_id_error" class="invalid-feedback" style="display: block"></div>
            </div>
        </div>
    </x-slot:body>

    {{-- Model Footer --}}
    <x-slot:footer>
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">@lang('general.cancel')</button>
        <button class="btn btn-primary add_city">@lang('general.save')</button>
    </x-slot:footer>

</x-modal>

{{--  Edit City Modal --}}
<x-modal id="ModalEditCity" :title="'edit'">

    {{-- Model Body --}}
    <x-slot:body>
        <ul id="errorMsg"></ul>
        <input hidden id="city_id">
        <div class="row">
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.city.name')  <span class="text-lowercase">\(Arabic)</span> </label>
                <input name="city_name_ar" id="city_name_ar" type="text" class="form-control" placeholder="ادخل الاسم باللغة العربية">
                <div id="name_error_ar" class="invalid-feedback" style="display: block"></div>
            </div>
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.city.name') <span class="text-lowercase">\(English)</span> </label>
                <input name="city_name_en" id="city_name_en" type="text" class="form-control" placeholder="ادخل الاسم باللغة الإنجليزية">
                <div id="name_error_en" class="invalid-feedback" style="display: block"></div>
            </div>
        </div>
        <hr class="my-0">
        <div class="row">
            <div class="col-12 mb-4">
                <label for="select2Basic" class="form-label">@lang('index.country.country')</label>
                <select name="city_country_id" id="city_country_id"  class="select2 form-select form-select-lg" data-allow-clear="true">
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </x-slot:body>

    {{-- Model Footer --}}
    <x-slot:footer>
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">@lang('general.cancel')</button>
        <button class="btn btn-primary update_city">@lang('general.save')</button>
    </x-slot:footer>

</x-modal>

{{--  Delete City Modal --}}
<x-modal id="ModalDeleteCity" :title="'delete'">
    {{-- Model Body --}}
    <x-slot:body>
        <input hidden id="city_id">
        <div class="row">
            <div class="col mb-3">
                <h3>@lang('messages.confirm_delete_message')</h3>
            </div>
        </div>
    </x-slot:body>

    {{-- Model Footer --}}
    <x-slot:footer>
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">@lang('general.cancel')</button>
        <button type="submit" class="btn btn-danger delete">@lang('general.yes')</button>
    </x-slot:footer>

</x-modal>
