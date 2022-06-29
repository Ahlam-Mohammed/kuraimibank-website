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
{{--        <th>@lang('general.status')</th>--}}
        <th></th>
    </x-slot:thead>

    <x-slot:tbody>
        @foreach($users as $user)
            <tr>
                <td><strong> {{ $user->id }} </strong></td>
                <td> {{ $user->name }} </td>
                <td> {{ $user->email }} </td>
                <td>
                    @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames()->toArray() as $role)
                            <label class="badge bg-label-info">{{ $role }}</label>
                        @endforeach
                    @endif
                </td>
                <td> {{ $user->created_at }} </td>
{{--                <td>--}}
{{--                    @if($user->is_active)--}}
{{--                        <span class="badge bg-label-primary me-1">@lang('general.activated')</span>--}}
{{--                    @else--}}
{{--                        <span class="badge bg-label-secondary me-1">@lang('general.not_activated')</span>--}}
{{--                    @endif--}}
{{--                </td>--}}
                <td>
                    <x-dropdown-table>
                        <button class="dropdown-item" onclick="edit_user({{ $user->id }})" type="button" data-bs-toggle="modal" data-bs-target="#ModalEditUser-{{ $user->id, $user->name, $user->email }}" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                            @lang('general.edit')
                        </button>
                        <button class="dropdown-item" onclick="delete_user({{ $user->id }})" type="button"  data-bs-toggle="modal"  data-bs-target="#ModalDeleteUser-{{ $user->id }}" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                            @lang('general.delete')
                        </button>
{{--                        <button class="dropdown-item" type="button" onclick="active_user({{ $user->id }})" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>--}}
{{--                            @if($user->is_active)--}}
{{--                                @lang('general.deactivation')--}}
{{--                            @else--}}
{{--                                @lang('general.active')--}}
{{--                            @endif--}}
{{--                        </button>--}}
                    </x-dropdown-table>
                </td>
            </tr>

            {{--  Edit User Modal --}}
            <form action="{{ route('dashboard.users.update', $user) }}" method="post">
                @csrf @method('PUT')
                <x-modal id="ModalEditUser-{{ $user->id, $user->name, $user->email }}" :title="'edit'">

                    {{-- Model Body --}}
                    <x-slot:body>

                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="nameWithTitle" class="form-label">@lang('index.users.name')</label>
                                <input name="name" value="{{ $user->name }}" id="name" type="text" class="form-control  @error('name') is-invalid @enderror">
                                @error('name')
                                <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="nameWithTitle" class="form-label">@lang('index.users.email')</label>
                                <input name="email" value="{{ $user->email }}" id="email" type="email" class="form-control  @error('email') is-invalid @enderror">
                                @error('email')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="nameWithTitle" class="form-label">@lang('index.users.password')</label>
                                <input name="password" id="password" type="password" class="form-control  @error('password') is-invalid @enderror">
                                @error('password')
                                <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <label for="password-confirm" class="form-label">@lang('index.users.confirm')</label>
                                <input id="confirm" type="password" class="form-control"  name="confirm"  autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="role" class="form-label">@lang('index.users.roles')</label>
                                <select name="roles[]" id="role" class="selectpicker @error('roles') is-invalid @enderror w-100" data-style="btn-default" multiple data-icon-base="bx" data-tick-icon="bx-check text-primary">
                                    @if(isset($roles))
                                        @foreach($roles as $role)
                                            <option
                                                @foreach($user->getRoleNames() as $r)
                                                        @if($r === $role) selected @endif
                                                @endforeach >
                                                {{ $role }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('roles')
                                <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </x-slot:body>

                    {{-- Model Footer --}}
                    <x-slot:footer>
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">@lang('general.cancel')</button>
                        <button type="submit" class="btn btn-primary" id="update_rate">@lang('general.save')</button>
                    </x-slot:footer>

                </x-modal>
            </form>

            {{--  Delete User Modal --}}
            <form action="{{ route('dashboard.users.destroy', $user->id) }}" method="post">
                @csrf @method('DELETE')
                <x-modal id="ModalDeleteUser-{{ $user->id }}" :title="'delete'">

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
                        <button type="submit" class="btn btn-danger">@lang('general.yes')</button>
                    </x-slot:footer>

                </x-modal>
            </form>
        @endforeach
    </x-slot:tbody>

</x-table>

{{--  Add User Modal --}}
<form action="{{ route('dashboard.users.store') }}" method="post">
    @csrf
    <x-modal id="ModalAddUser" :title="'add'">

        {{-- Model Body --}}
        <x-slot:body>

            <div class="row">
                <div class="col-12 mb-3">
                    <label for="nameWithTitle" class="form-label">@lang('index.users.name')</label>
                    <input name="name" value="{{ old('name') }}" id="name" type="text" class="form-control  @error('name') is-invalid @enderror">
                    @error('name')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-3">
                    <label for="nameWithTitle" class="form-label">@lang('index.users.email')</label>
                    <input name="email" value="{{ old('email') }}" id="email" type="email" class="form-control  @error('email') is-invalid @enderror">
                    @error('email')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-3">
                    <label for="nameWithTitle" class="form-label">@lang('index.users.password')</label>
                    <input name="password" id="password" type="password" class="form-control  @error('password') is-invalid @enderror">
                    @error('password')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
                <div class="col-12 mb-3">
                    <label for="password-confirm" class="form-label">@lang('index.users.confirm')</label>
                    <input id="confirm" type="password" class="form-control"  name="confirm" required autocomplete="new-password">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-4">
                    <label for="role" class="form-label">@lang('index.users.roles')</label>
                    <select name="roles[]" id="role" class="selectpicker @error('roles') is-invalid @enderror w-100" data-style="btn-default" multiple data-icon-base="bx" data-tick-icon="bx-check text-primary">
                        @if(isset($roles))
                            @foreach($roles as $role)
                                <option>{{ $role }}</option>
                            @endforeach
                        @endif
                    </select>
                    @error('roles')
                        <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>

        </x-slot:body>

        {{-- Model Footer --}}
        <x-slot:footer>
            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">@lang('general.cancel')</button>
            <button type="submit" class="btn btn-primary">@lang('general.save')</button>
        </x-slot:footer>

    </x-modal>
</form>
