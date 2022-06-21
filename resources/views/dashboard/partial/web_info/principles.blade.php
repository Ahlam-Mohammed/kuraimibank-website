{{-- Table Principle --}}
<x-table class="table-principles">

    {{-- Table Title --}}
    <x-slot:title>
        <h5 class="card-header">@lang('index.principle.principles')</h5>
        <button type="button" data-bs-toggle="modal" data-bs-target="#ModalAddPrinciple" class="btn rounded-pill btn-icon btn-label-primary">
            <span class="tf-icons bx bx-plus"></span>
        </button>
    </x-slot:title>

    {{-- Table Header --}}
    <x-slot:thead>
        <th>@lang('index.principle.id')</th>
        <th>@lang('index.principle.title')</th>
        <th>@lang('general.created_at')</th>
        <th>@lang('general.status')</th>
        <th></th>
    </x-slot:thead>



</x-table>

{{--  Add Principle Modal --}}
<x-modal id="ModalAddPrinciple" :title="'add'">

    {{-- Model Body --}}
    <x-slot:body>
        <ul id="errorMsg"></ul>
        <div class="row">
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.principle.title')  <span class="text-lowercase">\(Arabic)</span> </label>
                <input name="title_ar" value="" id="title_ar" type="text" class="form-control" placeholder="ادخل الاسم باللغة العربية">
            </div>
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.principle.title') <span class="text-lowercase">\(English)</span> </label>
                <input name="title_en" value="" id="title_en" type="text" class="form-control" placeholder="ادخل الاسم باللغة الإنجليزية">
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.principle.desc')  <span class="text-lowercase">\(Arabic)</span> </label>
                <textarea name="desc_ar" value="" id="desc_ar" type="text" class="form-control" placeholder="ادخل الوصف باللغة العربية"></textarea>
            </div>
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.principle.desc') <span class="text-lowercase">\(English)</span> </label>
                <textarea name="desc_en" value="" id="desc_en" type="text" class="form-control" placeholder="ادخل الوصف باللغة الإنجليزية"></textarea>
            </div>
        </div>
    </x-slot:body>

    {{-- Model Footer --}}
    <x-slot:footer>
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">@lang('general.cancel')</button>
        <button class="btn btn-primary add_principle">@lang('general.save')</button>
    </x-slot:footer>

</x-modal>


{{--  Edit Principle Modal --}}
<x-modal id="ModalEditPrinciple" :title="'edit'">

    {{-- Model Body --}}
    <x-slot:body>
        <ul id="update_msgList"></ul>
        <input hidden id="principle_id">
        <div class="row">
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.principle.title')  <span class="text-lowercase">\(Arabic)</span> </label>
                <input name="title_ar" value="" id="title_ar" type="text" class="form-control" placeholder="ادخل الاسم باللغة العربية">
            </div>
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.principle.title') <span class="text-lowercase">\(English)</span> </label>
                <input name="title_en" value="" id="title_en" type="text" class="form-control" placeholder="ادخل الاسم باللغة الإنجليزية">
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.principle.desc')  <span class="text-lowercase">\(Arabic)</span> </label>
                <textarea name="desc_ar" value="" id="desc_ar" type="text" class="form-control" placeholder="ادخل الوصف باللغة العربية"></textarea>
            </div>
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.principle.desc') <span class="text-lowercase">\(English)</span> </label>
                <textarea name="desc_en" value="" id="desc_en" type="text" class="form-control" placeholder="ادخل الوصف باللغة الإنجليزية"></textarea>
            </div>
        </div>
    </x-slot:body>

    {{-- Model Footer --}}
    <x-slot:footer>
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">@lang('general.cancel')</button>
        <button type="submit" class="btn btn-primary" id="update_principle">@lang('general.save')</button>
    </x-slot:footer>

</x-modal>

{{--  Delete Principle Modal --}}
<x-modal id="ModalDeletePrinciple" :title="'delete'">

    {{-- Model Body --}}
    <x-slot:body>
        <input type="hidden" id="principle_id">
        <div class="row">
            <div class="col mb-3">
                <h3>@lang('messages.confirm_delete_message')</h3>
            </div>
        </div>
    </x-slot:body>

    {{-- Model Footer --}}
    <x-slot:footer>
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">@lang('general.cancel')</button>
        <button type="submit" class="btn btn-danger" id="delete_principle">@lang('general.yes')</button>
    </x-slot:footer>

</x-modal>
