{{-- Table Services --}}
<x-table class="table-services">

    {{-- Table Title --}}
    <x-slot:title>
        <h5 class="card-header">@lang('index.service.services')</h5>
        <a href="{{ route('dashboard.service.create') }}" class="btn rounded-pill btn-icon btn-label-primary">
            <span class="tf-icons bx bx-plus"></span>
        </a>
    </x-slot:title>

    {{-- Table Header --}}
    <x-slot:thead>
        <th>@lang('index.service.id')</th>
        <th>@lang('index.service.name')</th>
        <th>@lang('index.service_category.category')</th>
        <th>@lang('index.sub_category.branch')</th>
        <th>@lang('general.created_at')</th>
        <th>@lang('general.status')</th>
        <th></th>
    </x-slot:thead>

    <x-slot:tbody></x-slot:tbody>

</x-table>

{{--  Delete Service Modal --}}
<x-modal id="ModalDeleteService" :title="'delete'">

    {{-- Model Body --}}
    <x-slot:body>
        <input type="hidden" id="service_id">
        <div class="row">
            <div class="col mb-3">
                <h3>@lang('messages.confirm_delete_message')</h3>
            </div>
        </div>
    </x-slot:body>

    {{-- Model Footer --}}
    <x-slot:footer>
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">@lang('general.cancel')</button>
        <button type="submit" class="btn btn-danger" id="delete_service">@lang('general.yes')</button>
    </x-slot:footer>

</x-modal>
