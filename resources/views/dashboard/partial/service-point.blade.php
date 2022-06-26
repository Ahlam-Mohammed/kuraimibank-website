@php
    use App\Enum\ServicePointEnum;
    $cities = \App\Models\City::all();
@endphp

{{-- Table Countries --}}
<x-table class="table-service-point">

    {{-- Table Title --}}
    <x-slot:title>
        <h5 class="card-header">@lang('index.service_point.service_point')</h5>
        <button type="button" data-bs-toggle="modal" data-bs-target="#ModalAddServicePoint" class="btn rounded-pill btn-icon btn-label-primary">
            <span class="tf-icons bx bx-plus"></span>
        </button>
    </x-slot:title>

    {{-- Table Header --}}
    <x-slot:thead>
        <th>@lang('index.service_point.id')</th>
        <th>@lang('index.service_point.name')</th>
        <th>@lang('index.service_point.category')</th>
        <th>@lang('index.country.country')</th>
        <th>@lang('index.city.city')</th>
        <th>@lang('general.status')</th>
        <th></th>
    </x-slot:thead>

    <x-slot:tbody></x-slot:tbody>

</x-table>

{{--  Add Servive Point Modal --}}
<x-modal id="ModalAddServicePoint" :title="'add'">

    {{-- Model Body --}}
    <x-slot:body>
        <ul id="errorMsg"></ul>
        <div class="row">
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.service_point.name')  <span class="text-lowercase">\(Arabic)</span> </label>
                <input name="name_ar" id="name_ar" type="text" class="form-control" placeholder="ادخل الاسم باللغة العربية">
                <div id="name_error_ar" class="invalid-feedback" style="display: block"></div>
            </div>
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.service_point.name') <span class="text-lowercase">\(English)</span> </label>
                <input name="name_en" id="name_en" type="text" class="form-control" placeholder="ادخل الاسم باللغة الإنجليزية">
                <div id="name_error_en" class="invalid-feedback" style="display: block"></div>
            </div>
        </div>
        <hr class="my-0">

        <div class="row">
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.service_point.address')  <span class="text-lowercase">\(Arabic)</span> </label>
                <input name="address_ar" id="address_ar" type="text" class="form-control" placeholder="ادخل العنوان باللغة العربية">
                <div id="address_error_ar" class="invalid-feedback" style="display: block"></div>
            </div>
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.service_point.address') <span class="text-lowercase">\(English)</span> </label>
                <input name="address_en" id="address_en" type="text" class="form-control" placeholder="ادخل العنوان باللغة الإنجليزية">
                <div id="address_error_en" class="invalid-feedback" style="display: block"></div>
            </div>
        </div>
        <hr class="my-0">

        <div class="row">
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.service_point.working_hours')  <span class="text-lowercase">\(Arabic)</span> </label>
                <input name="working_hours_ar" id="working_hours_ar" type="text" class="form-control" placeholder="ادخل اوقات العمل باللغة العربية">
                <div id="working_hours_error_ar" class="invalid-feedback" style="display: block"></div>
            </div>
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.service_point.working_hours') <span class="text-lowercase">\(English)</span> </label>
                <input name="working_hours_en" id="working_hours_en" type="text" class="form-control" placeholder="ادخل اوقات العمل باللغة الإنجليزية">
                <div id="working_hours_error_en" class="invalid-feedback" style="display: block"></div>
            </div>
        </div>
        <hr class="my-0">

        <div class="row">
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.service_point.phone') </label>
                <input name="phone" id="phone" type="text" class="form-control" placeholder="ادخل رقم الهاتف">
                <div id="phone_error" class="invalid-feedback" style="display: block"></div>
            </div>
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.service_point.second_phone') </label>
                <input name="second_phone" id="second_phone" type="text" class="form-control" placeholder="ادخل رقم الهاتف">
                <div id="second_phone_error" class="invalid-feedback" style="display: block"></div>
            </div>
        </div>
        <hr class="my-0">

        <div class="row">
            <div class="col-12 mb-4">
                <label for="select2Basic" class="form-label">@lang('index.service_point.category')</label>
                <select name="category" id="category"  class="select2 form-select form-select-lg" data-allow-clear="true">
                    <option value="{{ ServicePointEnum::ATM }}"> @lang('index.category.ATM') </option>
                    <option value="{{ ServicePointEnum::CENTER }}"> @lang('index.category.center') </option>
                    <option value="{{ ServicePointEnum::BRANCH }}"> @lang('index.category.branch') </option>
                    <option value="{{ ServicePointEnum::OFFICE }}"> @lang('index.category.office') </option>
                </select>
            </div>
        </div>
        <hr class="my-0">

        <div class="row">
            <div class="col-12 mb-4">
                <label for="select2Basic" class="form-label">@lang('index.city.city')</label>
                <select name="city_id" id="city_id"  class="select2 form-select form-select-lg" data-allow-clear="true">
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="row">
                <div class="col-5">
                    <input type="text" class="form-control" placeholder="lat" name="lat" id="lat">
                </div>
                <div class="col-5">
                    <input type="text" class="form-control" placeholder="lng" name="lng" id="lng">
                </div>
            </div>
            <div id="map" style="height:400px; width: 800px;" class="my-3 map"></div>
        </div>

    </x-slot:body>

    {{-- Model Footer --}}
    <x-slot:footer>
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">@lang('general.cancel')</button>
        <button class="btn btn-primary add_service_point">@lang('general.save')</button>
    </x-slot:footer>

</x-modal>

{{--  Edit Servive Point Modal --}}
<x-modal id="ModalEditServicePoint" :title="'edit'">

    {{-- Model Body --}}
    <x-slot:body>
        <ul id="errorMsg"></ul>
        <input id="service_point_id" hidden>
        <div class="row">
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.service_point.name')  <span class="text-lowercase">\(Arabic)</span> </label>
                <input name="name_ar" id="name_ar" type="text" class="form-control" placeholder="ادخل الاسم باللغة العربية">
                <div id="name_error_ar" class="invalid-feedback" style="display: block"></div>
            </div>
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.service_point.name') <span class="text-lowercase">\(English)</span> </label>
                <input name="name_en" id="name_en" type="text" class="form-control" placeholder="ادخل الاسم باللغة الإنجليزية">
                <div id="name_error_en" class="invalid-feedback" style="display: block"></div>
            </div>
        </div>
        <hr class="my-0">

        <div class="row">
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.service_point.address')  <span class="text-lowercase">\(Arabic)</span> </label>
                <input name="address_ar" id="address_ar" type="text" class="form-control" placeholder="ادخل العنوان باللغة العربية">
                <div id="address_error_ar" class="invalid-feedback" style="display: block"></div>
            </div>
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.service_point.address') <span class="text-lowercase">\(English)</span> </label>
                <input name="address_en" id="address_en" type="text" class="form-control" placeholder="ادخل العنوان باللغة الإنجليزية">
                <div id="address_error_en" class="invalid-feedback" style="display: block"></div>
            </div>
        </div>
        <hr class="my-0">

        <div class="row">
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.service_point.working_hours')  <span class="text-lowercase">\(Arabic)</span> </label>
                <input name="working_hours_ar" id="working_hours_ar" type="text" class="form-control" placeholder="ادخل اوقات العمل باللغة العربية">
                <div id="working_hours_error_ar" class="invalid-feedback" style="display: block"></div>
            </div>
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.service_point.working_hours') <span class="text-lowercase">\(English)</span> </label>
                <input name="working_hours_en" id="working_hours_en" type="text" class="form-control" placeholder="ادخل اوقات العمل باللغة الإنجليزية">
                <div id="working_hours_error_en" class="invalid-feedback" style="display: block"></div>
            </div>
        </div>
        <hr class="my-0">

        <div class="row">
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.service_point.phone') </label>
                <input name="phone" id="phone" type="text" class="form-control" placeholder="ادخل رقم الهاتف">
                <div id="phone_error" class="invalid-feedback" style="display: block"></div>
            </div>
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.service_point.second_phone') </label>
                <input name="second_phone" id="second_phone" type="text" class="form-control" placeholder="ادخل رقم الهاتف">
                <div id="second_phone_error" class="invalid-feedback" style="display: block"></div>
            </div>
        </div>
        <hr class="my-0">

        <div class="row">
            <div class="col-12 mb-4">
                <label for="select2Basic" class="form-label">@lang('index.service_point.category')</label>
                <select name="category" id="category"  class="select2 form-select form-select-lg" data-allow-clear="true">
                    <option value="{{ ServicePointEnum::ATM }}"> @lang('index.category.ATM') </option>
                    <option value="{{ ServicePointEnum::CENTER }}"> @lang('index.category.center') </option>
                    <option value="{{ ServicePointEnum::BRANCH }}"> @lang('index.category.branch') </option>
                    <option value="{{ ServicePointEnum::OFFICE }}"> @lang('index.category.office') </option>
                </select>
            </div>
        </div>
        <hr class="my-0">

        <div class="row">
            <div class="col-12 mb-4">
                <label for="select2Basic" class="form-label">@lang('index.city.city')</label>
                <select name="city_id" id="city_id"  class="select2 form-select form-select-lg" data-allow-clear="true">
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="row">
                <div class="col-5">
                    <input type="text" class="form-control" placeholder="lat" name="lat" id="lat">
                </div>
                <div class="col-5">
                    <input type="text" class="form-control" placeholder="lng" name="lng" id="lng">
                </div>
            </div>
            <div id="mapp" style="height:400px; width: 800px;" class="my-3 map"></div>
        </div>

    </x-slot:body>

    {{-- Model Footer --}}
    <x-slot:footer>
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">@lang('general.cancel')</button>
        <button type="submit" class="btn btn-primary update_service_point">@lang('general.save')</button>
    </x-slot:footer>

</x-modal>

{{--  Delete Servive Point Modal --}}
<x-modal id="ModalDeleteServicePoint" :title="'delete'">

    {{-- Model Body --}}
    <x-slot:body>
        <input type="hidden" id="service_point_id">
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
