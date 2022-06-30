{{-- Table financial_reports --}}
<x-table class="table-partne">

    {{-- Table Title --}}
    <x-slot:title>
        <h5 class="card-header">@lang('page.financial_reports')</h5>
        @can('report.create')
            <button type="button" data-bs-toggle="modal" data-bs-target="#ModalAddReport" class="btn rounded-pill btn-icon btn-label-primary">
                <span class="tf-icons bx bx-plus"></span>
            </button>
        @endcan
    </x-slot:title>

    {{-- Table Header --}}
    <x-slot:thead>
        <th>ID</th>
        <th>@lang('index.report.name')</th>
        <th>@lang('general.created_at')</th>
        <th>@lang('general.status')</th>
        <th></th>
    </x-slot:thead>

    <x-slot:tbody>
        @foreach($reports as $report)
            <tr>
                <td><strong> {{ $report->id }} </strong></td>
                <td> {{ $report->name }} </td>
                <td> {{ $report->created_at }} </td>
                <td>
                    @if($report->is_active )
                        <span class="badge bg-label-primary me-1">@lang('general.activated')</span>
                    @else
                        <span class="badge bg-label-secondary me-1">@lang('general.not_activated')</span>
                    @endif
                </td>
                <td>
                    <x-dropdown-table>
                       @can('report-edit')
                            <button class="dropdown-item"  type="button" data-bs-toggle="modal" data-bs-target="#ModalEditReport-{{ $report->id, $report->name, $report->file }}">
                                <i class="bx bx-edit-alt me-1"></i>
                                @lang('general.edit')
                            </button>
                       @endcan
                       @can('report-delete')
                           <button class="dropdown-item" type="button"  data-bs-toggle="modal"  data-bs-target="#ModalDeleteReport-{{ $report->id }}">
                               <i class="bx bx-trash me-1"></i>
                               @lang('general.delete')
                           </button>
                           <a class="dropdown-item" href="{{ route('dashboard.reports.active', $report->id) }}"><i class="bx bx-edit-alt me-1"></i>
                               @if($report->is_active ) @lang('general.deactivation') @else @lang('general.active')@endif
                           </a>
                       @endcan
                    </x-dropdown-table>
                </td>
            </tr>

            {{--  Edit Report Modal --}}
            <form action="{{ route('dashboard.reports.update', $report->id) }}" method="post" enctype="multipart/form-data">
                @csrf @method('PUT')
                <x-modal id="ModalEditReport-{{ $report->id, $report->name, $report->file  }}" :title="'edit'">

                    {{-- Model Body --}}
                    <x-slot:body>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="nameWithTitle" class="form-label">@lang('index.report.name')  <span class="text-lowercase">\(Arabic)</span> </label>
                                <input name="name_ar" value="{{ $report->getTranslation('name', 'ar') }}" id="name_ar" type="text" class="form-control @error('name_ar') is-invalid @enderror" placeholder="ادخل الاسم باللغة العربية">
                                @error('name_ar')
                                <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <label for="nameWithTitle" class="form-label">@lang('index.report.name') <span class="text-lowercase">\(English)</span> </label>
                                <input name="name_en" value="{{ $report->getTranslation('name', 'en') }}" id="name_en" type="text" class="form-control @error('name_en') is-invalid @enderror" placeholder="ادخل الاسم باللغة الإنجليزية">
                                @error('name_en')
                                <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>

                        {{--   file     --}}
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label" for="desc_ar">@lang('index.report.file')</label>
                                <input name="file" id="file" type="file" class="form-control @error('file') is-invalid @enderror">
                                @error('file')
                                <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>
                        <hr class="my-4 mx-n4" />
                    </x-slot:body>

                    {{-- Model Footer --}}
                    <x-slot:footer>
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">@lang('general.cancel')</button>
                        <button type="submit" class="btn btn-primary">@lang('general.save')</button>
                    </x-slot:footer>

                </x-modal>
            </form>

            {{--  Delete Report Modal --}}
            <form action="{{ route('dashboard.reports.destroy', $report->id) }}" method="post">
                @csrf @method('DELETE')
                <x-modal id="ModalDeleteReport-{{ $report->id }}" :title="'delete'">

                    {{-- Model Body --}}
                    <x-slot:body>
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

{{--  Add Report Modal --}}
<form action="{{ route('dashboard.reports.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <x-modal id="ModalAddReport" :title="'add'">
        {{-- Model Body --}}
        <x-slot:body>
            <div class="row">
                <div class="col-12 mb-3">
                    <label for="nameWithTitle" class="form-label">@lang('index.report.name')  <span class="text-lowercase">\(Arabic)</span> </label>
                    <input name="name_ar" value="{{ old('name_ar') }}" id="name_ar" type="text" class="form-control @error('name_ar') is-invalid @enderror" placeholder="ادخل الاسم باللغة العربية">
                    @error('name_ar')
                    <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>

                <div class="col-12 mb-3">
                    <label for="nameWithTitle" class="form-label">@lang('index.report.name') <span class="text-lowercase">\(English)</span> </label>
                    <input name="name_en" value="{{ old('name_en') }}" id="name_en" type="text" class="form-control @error('name_en') is-invalid @enderror" placeholder="ادخل الاسم باللغة الإنجليزية">
                    @error('name_en')
                    <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>

            {{--   file     --}}
            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label" for="desc_ar">@lang('index.report.file')</label>
                    <input name="file" id="file" type="file" class="form-control @error('file') is-invalid @enderror">
                    @error('file')
                    <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>
            <hr class="my-4 mx-n4" />

        </x-slot:body>

        {{-- Model Footer --}}
        <x-slot:footer>
            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">@lang('general.cancel')</button>
            <button type="submit" class="btn btn-primary">@lang('general.save')</button>
        </x-slot:footer>
    </x-modal>
</form>
