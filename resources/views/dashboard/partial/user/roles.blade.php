{{-- Table Users --}}
<x-table class="table-users">

    {{-- Table Title --}}
    <x-slot:title>
        <h5 class="card-header">@lang('index.users.users')</h5>
        <button type="button" data-bs-toggle="modal" data-bs-target="#ModalAddRole" class="btn rounded-pill btn-icon btn-label-primary">
            <span class="tf-icons bx bx-plus"></span>
        </button>
    </x-slot:title>

    {{-- Table Header --}}
    <x-slot:thead>
        <th>@lang('index.roles.id')</th>
        <th>@lang('index.roles.name')</th>
        <th>@lang('general.created_at')</th>
        <th></th>
    </x-slot:thead>

    <x-slot:tbody></x-slot:tbody>

</x-table>

{{--  Add Role Modal --}}
<form action="{{ route('dashboard.roles.store') }}" method="post">
    @csrf
    <x-modal id="ModalAddRole" :title="'add'">

        {{-- Model Body --}}
        <x-slot:body>

            <div class="row">
                <div class="col-12 mb-3">
                    <label for="nameWithTitle" class="form-label">@lang('index.roles.name')</label>
                    <input name="name" value="" id="name" type="text" class="form-control">
                    <div id="name_error" class="invalid-feedback" style="display: block"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-3">
                    <label for="nameWithTitle" class="form-label">@lang('index.roles.display-name')</label>
                    <input name="display_name" value="" id="display_name" type="text" class="form-control">
                    <div id="display_name_error" class="invalid-feedback" style="display: block"></div>
                </div>
            </div>

            <div class="row">
                @foreach($permissions as $permission)
                    <div class="col-6 mb-3">
                        <div class="form-check">
                            <input name="permission[{{ $permission->id }}]" class="form-check-input" type="checkbox" id="defaultCheck2" checked="">
                            <label class="form-check-label" for="defaultCheck2">
                                {{ $permission->name }}
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>

        </x-slot:body>

        {{-- Model Footer --}}
        <x-slot:footer>
            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">@lang('general.cancel')</button>
            <button class="btn btn-primary add_role">@lang('general.save')</button>
        </x-slot:footer>

    </x-modal>
</form>

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

{{--  Delete User Modal --}}
<x-modal id="ModalDeleteUser" :title="'delete'">

    {{-- Model Body --}}
    <x-slot:body>
        <input type="hidden" id="user_id">
        <div class="row">
            <div class="col mb-3">
                <h3>@lang('messages.confirm_delete_message')</h3>
            </div>
        </div>
    </x-slot:body>

    {{-- Model Footer --}}
    <x-slot:footer>
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">@lang('general.cancel')</button>
        <button type="submit" class="btn btn-danger" id="delete">@lang('general.yes')</button>
    </x-slot:footer>

</x-modal>
