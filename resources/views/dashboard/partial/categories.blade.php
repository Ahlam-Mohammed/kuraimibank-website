{{-- Table Category --}}
<x-table class="table-categories">

    {{-- Table Title --}}
    <x-slot:title>
        <h5 class="card-header">@lang('index.service_category.categories')</h5>
        <button type="button" data-bs-toggle="modal" data-bs-target="#ModalAddCategory" class="btn rounded-pill btn-icon btn-label-primary">
            <span class="tf-icons bx bx-plus"></span>
        </button>
    </x-slot:title>

    {{-- Table Header --}}
    <x-slot:thead>
        <th>@lang('index.service_category.id')</th>
        <th>@lang('index.service_category.name')</th>
        <th>@lang('general.created_at')</th>
        <th>@lang('general.status')</th>
        <th></th>
    </x-slot:thead>



</x-table>

{{--  Add Category Modal --}}
<x-modal id="ModalAddCategory" :title="'add'">

    {{-- Model Body --}}
    <x-slot:body>
        <ul id="errorMsg"></ul>
        <div class="row">
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.service_category.name')  <span class="text-lowercase">\(Arabic)</span> </label>
                <input name="name_ar" value="" id="name_ar" type="text" class="form-control" placeholder="ادخل الاسم باللغة العربية">
            </div>
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.service_category.name') <span class="text-lowercase">\(English)</span> </label>
                <input name="name_en" value="" id="name_en" type="text" class="form-control" placeholder="ادخل الاسم باللغة الإنجليزية">
            </div>
        </div>
    </x-slot:body>

    {{-- Model Footer --}}
    <x-slot:footer>
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">@lang('general.cancel')</button>
        <button class="btn btn-primary add_category">@lang('general.save')</button>
    </x-slot:footer>

</x-modal>

{{--  Add Branch Modal --}}
<x-modal id="ModalAddBranch" :title="'add'">

    {{-- Model Body --}}
    <x-slot:body>
        <ul id="errorMsg"></ul>
        <div class="row">
            <input hidden id="category_id">
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.service_category.name')  <span class="text-lowercase">\(Arabic)</span> </label>
                <input name="name_ar" value="" id="name_ar" type="text" class="form-control" placeholder="ادخل الاسم باللغة العربية">
            </div>
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.service_category.name') <span class="text-lowercase">\(English)</span> </label>
                <input name="name_en" value="" id="name_en" type="text" class="form-control" placeholder="ادخل الاسم باللغة الإنجليزية">
            </div>
        </div>
    </x-slot:body>

    {{-- Model Footer --}}
    <x-slot:footer>
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">@lang('general.cancel')</button>
        <button class="btn btn-primary add_branch">@lang('general.save')</button>
    </x-slot:footer>

</x-modal>

{{--  Edit Category Modal --}}
<x-modal id="ModalEditCategory" :title="'edit'">

    {{-- Model Body --}}
    <x-slot:body>
        <ul id="update_msgList"></ul>
        <div class="row">
            <input type="hidden" id="category_id" />
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.service_category.name')</label>
                <input name="name_ar" id="name_ar" type="text" class="form-control" placeholder="ادخل الاسم باللغة العربية">
            </div>
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.service_category.name')</label>
                <input name="name_en" id="name_en" type="text" class="form-control" placeholder="ادخل الاسم باللغة الإنجليزية">
            </div>
        </div>
    </x-slot:body>

    {{-- Model Footer --}}
    <x-slot:footer>
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">@lang('general.cancel')</button>
        <button type="submit" class="btn btn-primary" id="update_category">@lang('general.save')</button>
    </x-slot:footer>

</x-modal>

{{--  Delete Category Modal --}}
<x-modal id="ModalDeleteCategory" :title="'delete'">

    {{-- Model Body --}}
    <x-slot:body>
        <input type="hidden" id="category_id">
        <div class="row">
            <div class="col mb-3">
                <h3>@lang('messages.confirm_delete_message')</h3>
            </div>
        </div>
    </x-slot:body>

    {{-- Model Footer --}}
    <x-slot:footer>
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">@lang('general.cancel')</button>
        <button type="submit" class="btn btn-danger" id="delete_category">@lang('general.yes')</button>
    </x-slot:footer>

</x-modal>
