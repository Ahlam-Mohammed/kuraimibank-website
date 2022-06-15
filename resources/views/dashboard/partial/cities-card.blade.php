{{-- Table Cities --}}
<x-table title="index.city.cities">

    {{-- Table Title --}}
    <x-slot:title>
        <h5 class="card-header">@lang('index.city.cities')</h5>
        <button type="button" data-bs-toggle="modal" data-bs-target="#addCity" class="btn rounded-pill btn-icon btn-label-primary">
            <span class="tf-icons bx bx-plus"></span>
        </button>
    </x-slot:title>

    {{-- Table Header --}}
    <x-slot:thead>
        <th>@lang('index.city.id')</th>
        <th>@lang('index.city.name')</th>
        <th>@lang('general.status')</th>
        <th></th>
    </x-slot:thead>

    {{-- Table Body --}}
    <x-slot:tbody>
        <tr>
            <td><strong>1</strong></td>
            <td>صنعاء</td>
            <td><span class="badge bg-label-primary me-1">@lang('general.active')</span></td>
            <td>
                <x-dropdown-table>
                    <a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#editCity" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                        @lang('general.edit')
                    </a>
                    <a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#deleteCity" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                        @lang('general.delete')
                    </a>
                </x-dropdown-table>
            </td>
        </tr>
    </x-slot:tbody>

</x-table>

{{--  Add City Modal --}}
<x-modal id="addCity" :route="'teste'" :title="'Add City'">

    {{-- Model Body --}}
    <x-slot:body>
        <div class="row">
            <div class="col-12 mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.city.name')</label>
                <input type="text" id="nameWithTitle" class="form-control" placeholder="Enter Name">
            </div>
            <!-- Basic -->
            <div class="col-12 mb-4">
                <label for="select2Basic" class="form-label">@lang('index.country.country')</label>
                <select id="select2Basic" class="select2 form-select form-select-lg" data-allow-clear="true">
                    <option value="AK">Alaska</option>
                    <option value="HI">Hawaii</option>
                </select>
            </div>
        </div>
    </x-slot:body>

    {{-- Model Footer --}}
    <x-slot:footer>
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">@lang('general.cancel')</button>
        <button type="submit" class="btn btn-primary">@lang('general.save')</button>
    </x-slot:footer>

</x-modal>

{{--  Edit City Modal --}}
<x-modal id="editCity" :route="'teste'" :title="'Edit City'">

    {{-- Model Body --}}
    <x-slot:body>
        <div class="row">
            <div class="col mb-3">
                <label for="nameWithTitle" class="form-label">@lang('index.city.name')</label>
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

{{--  Delete City Modal --}}
<x-modal id="deleteCity" :route="'teste'" :title="'Delete City'">
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
