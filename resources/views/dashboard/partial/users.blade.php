{{-- Table Users --}}
<x-table class="table-users">

    {{-- Table Title --}}
    <x-slot:title>
        <h5 class="card-header">@lang('index.users.users')</h5>
        <button type="button" data-bs-toggle="modal" data-bs-target="#ModalAddUser" class="btn rounded-pill btn-icon btn-label-primary">
            <span class="tf-icons bx bx-plus"></span>
        </button>
    </x-slot:title>

    {{-- Table Header --}}
    <x-slot:thead>
        <th>@lang('index.users.id')</th>
        <th>@lang('index.users.name')</th>
        <th>@lang('index.users.email')</th>
        <th>@lang('index.users.role')</th>
        <th>@lang('general.created_at')</th>
        <th>@lang('general.status')</th>
        <th></th>
    </x-slot:thead>

    <x-slot:tbody></x-slot:tbody>

</x-table>

{{--  Add User Modal --}}
<x-modal id="ModalAddUser" :title="'add'">

    {{-- Model Body --}}
    <x-slot:body>

        <div class="row">
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.users.name')</label>
                <input name="name" value="" id="name" type="text" class="form-control">
                <div id="name_error" class="invalid-feedback" style="display: block"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.users.email')</label>
                <input name="email" value="" id="email" type="email" class="form-control">
                <div id="email_error" class="invalid-feedback" style="display: block"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.users.password')</label>
                <input name="password" value="" id="password" type="password" class="form-control">
                <div id="password_error" class="invalid-feedback" style="display: block"></div>
            </div>
        </div>

        <div class="row mb-3">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">@lang('index.users.confirm')</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>

        <div class="row">
            <div class="col-12 mb-4">
                <label for="select2Multiple" class="form-label">@lang('index.users.role')</label>
                <select name="roles[]" id="select2Multiple" class="select2 form-select" multiple>
{{--                    @if(isset($roles))--}}
{{--                        @foreach($roles as $role)--}}
{{--                            <option>{{ $role }}</option>--}}
{{--                        @endforeach--}}
{{--                    @endif--}}
                </select>
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
