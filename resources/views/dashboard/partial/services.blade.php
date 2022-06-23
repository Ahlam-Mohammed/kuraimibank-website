{{-- Table Services --}}
<x-table class="table-services">

    {{-- Table Title --}}
    <x-slot:title>
        <h5 class="card-header">@lang('index.service.services')</h5>
        <a href="{{ route('dashboard.services-create') }}" class="btn rounded-pill btn-icon btn-label-primary">
            <span class="tf-icons bx bx-plus"></span>
        </a>
    </x-slot:title>

    {{-- Table Header --}}
    <x-slot:thead>
        <th>@lang('index.service.id')</th>
        <th>@lang('index.service.name')</th>
        <th>@lang('index.service_category.category')</th>
        <th>@lang('general.created_at')</th>
        <th>@lang('general.status')</th>
        <th></th>
    </x-slot:thead>

    <x-slot:tbody>
        @foreach($services as $service)
            <tr>
                <td><strong> {{ $service->id }} </strong></td>
                <td> {{ $service->name }} </td>
                <td> {{ $service->category->name  }}</td>
                <td> {{ $service->created_at }} </td>
                <td>
                    @if($service->is_active )
                        <span class="badge bg-label-primary me-1">@lang('general.activated')</span>
                    @else
                        <span class="badge bg-label-secondary me-1">@lang('general.not_activated')</span>
                    @endif
                </td>
                <td>
                    <x-dropdown-table>
                        <form action="{{ route('dashboard.services-edit') }}" method="post">
                            @csrf
                            <input hidden name="id" value="{{ $service->id }}">
                            <button type="submit" class="dropdown-item edit_category"><i class="bx bx-edit-alt me-1"></i>
                                @lang('general.edit')
                            </button>
                        </form>
                        <button class="dropdown-item delete_category" type="button"  data-bs-toggle="modal"  data-bs-target="#ModalDeleteService" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                            @lang('general.delete')
                        </button>
                        <a href="{{ route('dashboard.services.active', $service->id) }}" class="dropdown-item" ><i class="bx bx-edit-alt me-1"></i>
                            @if($service->is_active ) @lang('general.deactivation') @else @lang('general.active')@endif
                        </a>
                    </x-dropdown-table>
                </td>
            </tr>

            {{--  Delete Service Modal --}}
            <form action="{{ route('dashboard.services.destroy', $service->id) }}" method="post">
                @csrf
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
                        <button type="submit" class="btn btn-danger">@lang('general.yes')</button>
                    </x-slot:footer>

                </x-modal>
            </form>
        @endforeach
    </x-slot:tbody>

</x-table>

