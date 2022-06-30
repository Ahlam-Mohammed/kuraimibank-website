{{-- Table Users --}}
<x-table class="table-users">

    {{-- Table Title --}}
    <x-slot:title>
        <h5 class="card-header">@lang('index.roles.roles')</h5>
        @can('role-create')
            <button type="button" data-bs-toggle="modal" data-bs-target="#addRoleModal" class="btn rounded-pill btn-icon btn-label-primary">
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

<div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-dialog-centered modal-add-new-role">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                    <h3 class="role-title">Add New Role</h3>
                    <p>Set role permissions</p>
                </div>
                <!-- Add role form -->
                <form action="{{ route('dashboard.roles.store') }}" method="post" class="row g-3">
                    @csrf
                    <div class="col-12 mb-4">
                        <label class="form-label" for="modalRoleName">Role Name</label>
                        <input name="name" value="" id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="ادخل اسم الدور" tabindex="-1" />
                        @error('name')
                        <div class="invalid-feedback"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <!-- Permission table -->
                        <div class="table-responsive">
                            <table class="table table-flush-spacing">
                                <tbody>
                                <tr>
                                    <td class="text-nowrap fw-semibold">Role Access <i class="bx bx-info-circle bx-xs" data-bs-toggle="tooltip" data-bs-placement="top" title="Allows a full access to the system"></i></td>
                                    <td>
                                        <div class="form-check">
                                            <input onClick="selectAll(this)" class="form-check-input" type="checkbox" id="defaultCheck2">
                                            <label class="form-check-label" for="defaultCheck2">
                                                @lang('general.select-all')
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                @php
                                    $permissions = [
                                        'role', 'user', 'service', 'category',
                                        'exchange-rate', 'report', 'news', 'job',
                                        'principle'];

                                    $webPermissions = ['about', 'vision', 'strategy', 'policy', 'social', 'contact'];
                                @endphp

                                @foreach($permissions as $permission)
                                    <tr>
                                        <td class="text-nowrap fw-semibold">@lang('page.'.$permission)</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="form-check me-3 me-lg-5">
                                                    <input name="permissions[]" value="{{$permission.'-list'}}" class="form-check-input" type="checkbox" id="userManagementRead" />
                                                    <label class="form-check-label" for="userManagementRead">
                                                        @lang('general.read')
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input name="permissions[]" value='{{$permission.'-create'}}' class="form-check-input" type="checkbox" id="userManagementWrite" />
                                                    <label class="form-check-label" for="userManagementWrite">
                                                        @lang('general.add')
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input name="permissions[]" value={{$permission.'-edit'}} class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                    <label class="form-check-label" for="userManagementCreate">
                                                        @lang('general.edit')
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input name="permissions[]" value={{$permission.'-delete'}} class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                    <label class="form-check-label" for="userManagementCreate">
                                                        @lang('general.delete')
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                @foreach($webPermissions as $permission)
                                    <tr>
                                        <td class="text-nowrap fw-semibold">@lang('page.'.$permission)</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="form-check me-3 me-lg-5">
                                                    <input name="permissions[]" value="{{$permission.'-list'}}" class="form-check-input" type="checkbox" id="userManagementRead" />
                                                    <label class="form-check-label" for="userManagementRead">
                                                        @lang('general.read')
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input name="permissions[]" value="{{$permission.'-edit'}}"class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                    <label class="form-check-label" for="userManagementCreate">
                                                        @lang('general.edit')
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Permission table -->
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1">@lang('general.save')</button>
                        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">@lang('general.cancel')</button>
                    </div>
                </form>
                <!--/ Add role form -->
            </div>
        </div>
    </div>
</div>
