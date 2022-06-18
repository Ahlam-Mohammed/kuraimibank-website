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
            </div>
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.city.name') <span class="text-lowercase">\(English)</span> </label>
                <input name="city_name_en" id="city_name_en" type="text" class="form-control" placeholder="ادخل الاسم باللغة الإنجليزية">
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
            </div>
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.city.name') <span class="text-lowercase">\(English)</span> </label>
                <input name="city_name_en" id="city_name_en" type="text" class="form-control" placeholder="ادخل الاسم باللغة الإنجليزية">
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
                <h3>@lang('index.messages.delete_message')</h3>
            </div>
        </div>
    </x-slot:body>

    {{-- Model Footer --}}
    <x-slot:footer>
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">@lang('general.cancel')</button>
        <button type="submit" class="btn btn-danger delete">@lang('general.yes')</button>
    </x-slot:footer>

</x-modal>
