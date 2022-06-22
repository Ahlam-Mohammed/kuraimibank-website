@php
    $categories = \App\Models\Category::all();
@endphp

{{-- Table Sub Category --}}
<x-table class="table-sub-categories">

    {{-- Table Title --}}
    <x-slot:title>
        <h5 class="card-header">@lang('index.sub_category.branches')</h5>
        <button type="button" data-bs-toggle="modal" data-bs-target="#ModalAddSubCategory" class="btn rounded-pill btn-icon btn-label-primary">
            <span class="tf-icons bx bx-plus"></span>
        </button>
    </x-slot:title>

    {{-- Table Header --}}
    <x-slot:thead>
        <th>@lang('index.sub_category.id')</th>
        <th>@lang('index.sub_category.name')</th>
        <th>@lang('index.service_category.name')</th>
        <th>@lang('general.created_at')</th>
        <th>@lang('general.status')</th>
        <th></th>
    </x-slot:thead>

    <x-slot:tbody></x-slot:tbody>

</x-table>

{{--  Add Sub Category Modal --}}
<x-modal id="ModalAddSubCategory" :title="'add'">

    {{-- Model Body --}}
    <x-slot:body>
        <ul id="errorMsg"></ul>
        <div class="row">
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.sub_category.name')  <span class="text-lowercase">\(Arabic)</span> </label>
                <input name="name_ar" value="" id="name_ar" type="text" class="form-control" placeholder="ادخل الاسم باللغة العربية">
            </div>
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.sub_category.name') <span class="text-lowercase">\(English)</span> </label>
                <input name="name_en" value="" id="name_en" type="text" class="form-control" placeholder="ادخل الاسم باللغة الإنجليزية">
            </div>
        </div>

        <hr class="my-0">
        <div class="row">
            <div class="col-12 mb-4">
                <label for="select2Basic" class="form-label">@lang('index.service_category.name')</label>
                <select name="category_id" id="category_id"  class="select2 form-select form-select-lg" data-allow-clear="true">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

    </x-slot:body>

    {{-- Model Footer --}}
    <x-slot:footer>
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">@lang('general.cancel')</button>
        <button class="btn btn-primary add_sub_category">@lang('general.save')</button>
    </x-slot:footer>

</x-modal>

{{--  Edit Sub Category Modal --}}
<x-modal id="ModalEditSubCategory" :title="'edit'">

    {{-- Model Body --}}
    <x-slot:body>
        <ul id="update_msgList"></ul>
        <div class="row">
            <input type="hidden" id="branch_id">
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.sub_category.name')</label>
                <input name="name_ar" id="name_ar" type="text" class="form-control" placeholder="ادخل الاسم باللغة العربية">
            </div>
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.sub_category.name')</label>
                <input name="name_en" id="name_en" type="text" class="form-control" placeholder="ادخل الاسم باللغة الإنجليزية">
            </div>
        </div>

        <hr class="my-0">
        <div class="row">
            <div class="col-12 mb-4">
                <label for="select2Basic" class="form-label">@lang('index.service_category.name')</label>
                <select name="category_id" id="category_id"  class="select2 form-select form-select-lg" data-allow-clear="true">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

    </x-slot:body>

    {{-- Model Footer --}}
    <x-slot:footer>
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">@lang('general.cancel')</button>
        <button type="submit" class="btn btn-primary" id="update_sub_category">@lang('general.save')</button>
    </x-slot:footer>

</x-modal>

{{--  Delete Sub Category Modal --}}
<x-modal id="ModalDeleteSubCategory" :title="'delete'">

    {{-- Model Body --}}
    <x-slot:body>
        <input type="hidden" id="branch_id">
        <div class="row">
            <div class="col mb-3">
                <h3>@lang('messages.confirm_delete_message')</h3>
            </div>
        </div>
    </x-slot:body>

    {{-- Model Footer --}}
    <x-slot:footer>
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">@lang('general.cancel')</button>
        <button type="submit" class="btn btn-danger" id="delete_sub_category">@lang('general.yes')</button>
    </x-slot:footer>

</x-modal>
