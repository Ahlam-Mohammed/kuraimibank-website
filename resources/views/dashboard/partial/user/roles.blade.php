{{-- Table Users --}}
<x-table class="table-users">

    {{-- Table Title --}}
    <x-slot:title>
        <h5 class="card-header">@lang('index.roles.roles')</h5>
        @can('role-create')
            <button type="button" data-bs-toggle="modal" data-bs-target="#ModalAddRole" class="btn rounded-pill btn-icon btn-label-primary">
                <span class="tf-icons bx bx-plus"></span>
            </button>
        @endcan
    </x-slot:title>

    {{-- Table Header --}}
    <x-slot:thead>
        <th>@lang('index.roles.id')</th>
        <th>@lang('index.roles.name')</th>
        <th>@lang('general.created_at')</th>
        <th></th>
    </x-slot:thead>

    <x-slot:tbody>
        @foreach($roles as $role)
            <tr>
                <td><strong> {{ $role->id }} </strong></td>
                <td> {{ $role->name }} </td>
                <td> {{ $role->created_at }} </td>
                <td>
                    <x-dropdown-table>
                        @can('role-edit')
                            <button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#ModalEditRole-{{ $role->id, $role->name, $role->display_name }}" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                                @lang('general.edit')
                            </button>
                        @endcan
                        @can('role-delete')
                            <button class="dropdown-item" type="button"  data-bs-toggle="modal"  data-bs-target="#ModalDeleteRole-{{ $role->id }}" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                                @lang('general.delete')
                            </button>
                        @endcan
                    </x-dropdown-table>
                </td>
            </tr>
            {{--  Edit Role Modal --}}
            <form action="{{ route('dashboard.roles.update', $role) }}" method="post">
                @csrf @method('PUT')
                <x-modal id="ModalEditRole-{{ $role->id, $role->name, $role->display_name }}" :title="'edit'">

                    {{-- Model Body --}}
                    <x-slot:body>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="nameWithTitle" class="form-label">@lang('index.roles.name')</label>
                                <input name="name" value="{{ $role->name }}" id="name" type="text" class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="nameWithTitle" class="form-label">@lang('index.roles.display-name')</label>
                                <input name="display_name" value="{{ $role->display_name }}" id="display_name" type="text" class="form-control  @error('display_name') is-invalid @enderror">
                                @error('display_name')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <label for="nameWithTitle" class="form-label">@lang('index.roles.permission')</label>
                            <div class="col-12 my-3">
                                <div class="form-check">
                                    <input onClick="selectAll(this)" class="form-check-input" type="checkbox" id="defaultCheck2">
                                    <label class="form-check-label" for="defaultCheck2">
                                        @lang('general.select-all')
                                    </label>
                                </div>
                            </div>
                            @foreach($permissions as $permission)
                                <div class="col-6 mb-3">
                                    <div class="form-check">
                                        <input @if(in_array($role->name, $permission->getRoleNames()->toArray() )) checked @endif name="permissions[]" value="{{ $permission->name }}" class="form-check-input" type="checkbox" id="defaultCheck2">
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
                        <button type="submit" class="btn btn-primary">@lang('general.save')</button>
                    </x-slot:footer>

                </x-modal>
            </form>

            {{--  Delete User Modal --}}
            <form action="{{ route('dashboard.roles.destroy', $role->id) }}" method="post">
                @csrf @method('DELETE')
                <x-modal id="ModalDeleteRole-{{ $role->id }}" :title="'delete'">

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
            </form>
        @endforeach
    </x-slot:tbody>

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
                    <input name="name" value="" id="name" type="text" class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-3">
                    <label for="nameWithTitle" class="form-label">@lang('index.roles.display-name')</label>
                    <input name="display_name" value="" id="display_name" type="text" class="form-control  @error('display_name') is-invalid @enderror">
                    @error('display_name')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <label for="nameWithTitle" class="form-label">@lang('index.roles.permission')</label>
                <div class="col-12 my-3">
                    <div class="form-check">
                        <input onClick="selectAll(this)" class="form-check-input" type="checkbox" id="defaultCheck2">
                        <label class="form-check-label" for="defaultCheck2">
                            @lang('general.select-all')
                        </label>
                    </div>
                </div>
                @foreach($permissions as $permission)
                    <div class="col-6 mb-3">
                        <div class="form-check">
                            <input name="permissions[]" value="{{ $permission->name }}" class="form-check-input" type="checkbox" id="defaultCheck2">
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
