{{-- Table Countries --}}
<x-table>

    {{-- Table Title --}}
    <x-slot:title>
        <h5 class="card-header">@lang('index.country.countries')</h5>
        <button type="button" data-bs-toggle="modal" data-bs-target="#addCountry" class="btn rounded-pill btn-icon btn-label-primary">
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

    {{-- Table Body --}}
    <x-slot:tbody>
        <tr>
            <td><strong>1</strong></td>
            <td>اليمن</td>
            <td><span class="badge bg-label-primary me-1">@lang('general.active')</span></td>
            <td>
                <x-dropdown-table>
                    <a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#editCountry" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                        @lang('general.edit')
                    </a>
                    <a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#deleteCountry" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                        @lang('general.delete')
                    </a>
                </x-dropdown-table>
            </td>
        </tr>
    </x-slot:tbody>

</x-table>

{{--  Add country Modal --}}
<x-modal id="addCountry" :route="'teste'" :title="'Add Country'">

    {{-- Model Body --}}
    <x-slot:body>
        <div class="row">
            <div class="col mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.country.name')</label>
                <input type="text" id="nameWithTitle" class="form-control" placeholder="Enter Name">
            </div>
        </div>
    </x-slot:body>

    {{-- Model Footer --}}
    <x-slot:footer>
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">@lang('general.cancel')</button>
        <button type="submit" class="btn btn-primary">@lang('general.save')</button>
    </x-slot:footer>

</x-modal>

{{--  Edit country Modal --}}
<x-modal id="editCountry" :route="'teste'" :title="'Edit Country'">

    {{-- Model Body --}}
    <x-slot:body>
        <div class="row">
            <div class="col mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.country.name')</label>
                <input type="text" id="nameWithTitle" class="form-control" placeholder="Enter Name">
            </div>
        </div>
    </x-slot:body>

    {{-- Model Footer --}}
    <x-slot:footer>
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">@lang('general.cancel')</button>
        <button type="submit" class="btn btn-primary">@lang('general.save')</button>
    </x-slot:footer>

</x-modal>

{{--  Delete country Modal --}}
<x-modal id="deleteCountry" :route="'teste'" :title="'Delete Country'">
    {{-- Model Body --}}
    <x-slot:body>
        <div class="row">
            <div class="col mb-3">
                <h3>@lang('index.messages.delete_message')</h3>
            </div>
        </div>
    </x-slot:body>

    {{-- Model Footer --}}
    <x-slot:footer>
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">@lang('general.cancel')</button>
        <button type="submit" class="btn btn-danger">@lang('general.yes')</button>
    </x-slot:footer>

</x-modal>
