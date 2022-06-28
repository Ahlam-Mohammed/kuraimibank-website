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
        <th>@lang('index.service_category.parent')</th>
        <th>@lang('general.created_at')</th>
        <th>@lang('general.status')</th>
        <th></th>
    </x-slot:thead>

    <x-slot:tbody>
        @foreach($categories as  $category)
            <tr>
                <td><strong> {{ $category->id }} </strong></td>
                <td> {{ $category->name }} -
                    <span class="text-primary">
                        @if($category->is_branch)
                            ( @lang('index.service_category.type_branch') )
                        @else
                            ( @lang('index.service_category.type_category') )
                        @endif
                    </span>
                </td>
                <td>
                    @if($category->is_branch)
                        {{ $category->parent->name }}
                    @else
                        ----
                    @endif
                </td>
                <td> {{ $category->created_at }} </td>
                <td>
                    @if($category->is_category)
                        <span class="badge bg-label-primary me-1">@lang('general.activated')</span>
                    @else
                        <span class="badge bg-label-secondary me-1">@lang('general.not_activated')</span>
                    @endif
                </td>
                <td>
                    <x-dropdown-table>
                        @if(! $category->is_branch)
                            <button class="dropdown-item active_category" type="button" onclick="add_branch({{ $category->id }})" type="button"  data-bs-toggle="modal"  data-bs-target="#ModalAddBranch" href="javascript:void(0);"><i class="tf-icons bx bx-plus"></i>
                                @lang('index.service_category.add_branch')
                            </button>
                        @endif
                        <button class="dropdown-item edit_category" onclick="edit_category({{ $category->id }})" type="button" data-bs-toggle="modal" data-bs-target="#ModalEditCategory" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                            @lang('general.edit')
                        </button>
                        <button class="dropdown-item delete_category" onclick="delete_category({{ $category->id }})" type="button"  data-bs-toggle="modal"  data-bs-target="#ModalDeleteCategory" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                            @lang('general.delete')
                        </button>
                        <button class="dropdown-item active_category" type="button" onclick="active_category({{ $category->id }})" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                            @if($category->is_active)
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

{{--  Add Category Modal --}}
<x-modal id="ModalAddCategory" :title="'add'">

    {{-- Model Body --}}
    <x-slot:body>
        <ul id="errorMsg"></ul>
        <div class="row">
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.service_category.name')  <span class="text-lowercase">\(Arabic)</span> </label>
                <input name="name_ar" value="" id="name_ar" type="text" class="form-control" placeholder="ادخل الاسم باللغة العربية">
                <div id="name_error_ar" class="invalid-feedback" style="display: block"></div>
            </div>
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.service_category.name') <span class="text-lowercase">\(English)</span> </label>
                <input name="name_en" value="" id="name_en" type="text" class="form-control" placeholder="ادخل الاسم باللغة الإنجليزية">
                <div id="name_error_en" class="invalid-feedback" style="display: block"></div>
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
                <div id="name_error_ar" class="invalid-feedback" style="display: block"></div>
            </div>
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.service_category.name') <span class="text-lowercase">\(English)</span> </label>
                <input name="name_en" value="" id="name_en" type="text" class="form-control" placeholder="ادخل الاسم باللغة الإنجليزية">
                <div id="name_error_en" class="invalid-feedback" style="display: block"></div>
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
                <div id="name_error_ar" class="invalid-feedback" style="display: block"></div>
            </div>
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.service_category.name')</label>
                <input name="name_en" id="name_en" type="text" class="form-control" placeholder="ادخل الاسم باللغة الإنجليزية">
                <div id="name_error_en" class="invalid-feedback" style="display: block"></div>
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
