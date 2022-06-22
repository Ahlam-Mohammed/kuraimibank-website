{{-- Table Countries --}}
<x-table class="table-countries">

    {{-- Table Title --}}
    <x-slot:title>
        <h5 class="card-header">@lang('index.country.countries')</h5>
        <button type="button" data-bs-toggle="modal" data-bs-target="#ModalAddCountry" class="btn rounded-pill btn-icon btn-label-primary">
            <span class="tf-icons bx bx-plus"></span>
        </button>
    </x-slot:title>

    {{-- Table Header --}}
    <x-slot:thead>
        <th>@lang('index.country.id')</th>
        <th>@lang('index.country.name')</th>
        <th>@lang('general.status')</th>
        <th></th>
    </x-slot:thead>

    <x-slot:tbody></x-slot:tbody>

</x-table>

{{--  Add country Modal --}}
<x-modal id="ModalAddCountry" :title="'add'">

    {{-- Model Body --}}
    <x-slot:body>
        <ul id="errorMsg"></ul>
        <div class="row">
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.country.name')  <span class="text-lowercase">\(Arabic)</span> </label>
                <input name="name_ar" id="name_ar" type="text" class="form-control" placeholder="ادخل الاسم باللغة العربية">
            </div>
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.country.name') <span class="text-lowercase">\(English)</span> </label>
                <input name="name_en" id="name_en" type="text" class="form-control" placeholder="ادخل الاسم باللغة الإنجليزية">
            </div>
        </div>
    </x-slot:body>

    {{-- Model Footer --}}
    <x-slot:footer>
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">@lang('general.cancel')</button>
        <button class="btn btn-primary add_country">@lang('general.save')</button>
    </x-slot:footer>

</x-modal>

{{--  Edit country Modal --}}
<x-modal id="ModalEditCountry" :title="'edit'">

    {{-- Model Body --}}
    <x-slot:body>
        <ul id="update_msgList"></ul>
        <div class="row">
            <input type="hidden" id="country_id" />
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.country.name')</label>
                <input name="name_ar" id="name_ar" type="text" class="form-control" placeholder="ادخل الاسم باللغة العربية">
            </div>
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.country.name')</label>
                <input name="name_en" id="name_en" type="text" class="form-control" placeholder="ادخل الاسم باللغة الإنجليزية">
            </div>
        </div>
    </x-slot:body>

    {{-- Model Footer --}}
    <x-slot:footer>
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">@lang('general.cancel')</button>
        <button type="submit" class="btn btn-primary update_country">@lang('general.save')</button>
    </x-slot:footer>

</x-modal>

{{--  Delete country Modal --}}
<x-modal id="ModalDeleteCountry" :title="'delete'">

    {{-- Model Body --}}
    <x-slot:body>
        <input type="hidden" id="country_id">
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
