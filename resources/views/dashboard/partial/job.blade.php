{{-- Table job --}}
<x-table class="table-job">

    {{-- Table Title --}}
    <x-slot:title>
        <h5 class="card-header">@lang('index.job.job')</h5>
        <button type="button" data-bs-toggle="modal" data-bs-target="#ModalAddJob" class="btn rounded-pill btn-icon btn-label-primary">
            <span class="tf-icons bx bx-plus"></span>
        </button>
    </x-slot:title>

    {{-- Table Header --}}
    <x-slot:thead>
        <th>@lang('index.job.id')</th>
        <th>@lang('index.job.name')</th>
        <th>@lang('general.created_at')</th>
        <th>@lang('general.status')</th>
        <th></th>
    </x-slot:thead>

    <x-slot:tbody>
        @foreach($jobs as $job)
            <tr>
                <td><strong> {{ $job->id }} </strong></td>
                <td> {{ $job->name }} </td>
                <td> {{ $job->created_at }} </td>
                <td>
                    @if($job->is_active )
                        <span class="badge bg-label-primary me-1">@lang('general.activated')</span>
                    @else
                        <span class="badge bg-label-secondary me-1">@lang('general.not_activated')</span>
                    @endif
                </td>
                <td>
                    <x-dropdown-table>
                        <button class="dropdown-item"  type="button" data-bs-toggle="modal" data-bs-target="#ModalEditJob-{{ $job->id, $job->name, $job->desc}}">
                            <i class="bx bx-edit-alt me-1"></i>
                            @lang('general.edit')
                        </button>
                        <button class="dropdown-item" type="button"  data-bs-toggle="modal"  data-bs-target="#ModalDeleteJob-{{ $job->id }}">
                            <i class="bx bx-trash me-1"></i>
                            @lang('general.delete')
                        </button>
                        <a class="dropdown-item" href="{{ route('dashboard.jobs.active', $job->id) }}"><i class="bx bx-edit-alt me-1"></i>
                            @if($job->is_active ) @lang('general.deactivation') @else @lang('general.active')@endif
                        </a>
                    </x-dropdown-table>
                </td>
            </tr>

            {{--  Edit Job Modal --}}
            <form action="{{ route('dashboard.jobs.update', $job->id) }}" method="post" enctype="multipart/form-data">
                @csrf @method('PUT')

                <x-modal id="ModalEditJob-{{ $job->id, $job->name, $job->desc  }}" :title="'edit'">

                    {{-- Model Body --}}
                    <x-slot:body>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="nameWithTitle" class="form-label">@lang('index.job.name')  <span class="text-lowercase">\(Arabic)</span> </label>
                                <input name="name_ar" value="{{ $job->getTranslation('name', 'ar') }}" id="name_ar" type="text" class="form-control @error('name_ar') is-invalid @enderror" placeholder="ادخل الاسم باللغة العربية">
                                @error('name_ar')
                                <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <label for="nameWithTitle" class="form-label">@lang('index.job.name') <span class="text-lowercase">\(English)</span> </label>
                                <input name="name_en" value="{{ $job->getTranslation('name', 'en') }}" id="name_en" type="text" class="form-control @error('name_en') is-invalid @enderror" placeholder="ادخل الاسم باللغة الإنجليزية">
                                @error('name_en')
                                <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>
                        <hr class="my-4 mx-n4" />

                        {{--   Description     --}}
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label" for="desc_ar">@lang('index.job.desc') <span class="text-lowercase">\(Arabic)</span></label>
                                <textarea name="desc_ar" class="form-control  @error('desc_ar') is-invalid @enderror" id="desc_ar" rows="3" placeholder="ادخل الوصف باللغة العربية"> {{ $job->getTranslation('desc', 'ar') }} </textarea>
                                @error('desc_ar')
                                <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label" for="desc_en">@lang('index.job.desc') <span class="text-lowercase">\(English)</span></label>
                                <textarea name="desc_en" class="form-control  @error('desc_en') is-invalid @enderror" id="desc_en" rows="3" placeholder="ادخل الوصف باللغة الإنجليزية"> {{ $job->getTranslation('desc', 'en') }} </textarea>
                                @error('desc_en')
                                <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>
                    </x-slot:body>

                    {{-- Model Footer --}}
                    <x-slot:footer>
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">@lang('general.cancel')</button>
                        <button type="submit" class="btn btn-primary" id="update_news">@lang('general.save')</button>
                    </x-slot:footer>

                </x-modal>
            </form>

            {{--  Delete Job Modal --}}
            <form action="{{ route('dashboard.jobs.destroy', $job->id) }}" method="post">
                @csrf @method('DELETE')
                <x-modal id="ModalDeleteJob-{{ $job->id }}" :title="'delete'">

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

{{--  Add Job Modal --}}
<form action="{{ route('dashboard.jobs.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <x-modal id="ModalAddJob" :title="'add'">
        {{-- Model Body --}}
        <x-slot:body>
            <div class="row">
                <div class="col-12 mb-3">
                    <label for="nameWithTitle" class="form-label">@lang('index.job.name')  <span class="text-lowercase">\(Arabic)</span> </label>
                    <input name="name_ar" value="{{ old('name_ar') }}" id="name_ar" type="text" class="form-control @error('name_ar') is-invalid @enderror" placeholder="ادخل الاسم باللغة العربية">
                    @error('name_ar')
                    <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>

                <div class="col-12 mb-3">
                    <label for="nameWithTitle" class="form-label">@lang('index.job.name') <span class="text-lowercase">\(English)</span> </label>
                    <input name="name_en" value="{{ old('name_en') }}" id="name_en" type="text" class="form-control @error('name_en') is-invalid @enderror" placeholder="ادخل الاسم باللغة الإنجليزية">
                    @error('name_en')
                    <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>
            <hr class="my-4 mx-n4" />

            {{--   Description     --}}
            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label" for="desc_ar">@lang('index.job.desc') <span class="text-lowercase">\(Arabic)</span></label>
                    <textarea name="desc_ar" class="form-control  @error('desc_ar') is-invalid @enderror" id="desc_ar" rows="3" placeholder="ادخل الوصف باللغة العربية">{{ old('desc_ar') }}</textarea>
                    @error('desc_ar')
                    <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>

                <div class="col-12">
                    <label class="form-label" for="desc_en">@lang('index.job.desc') <span class="text-lowercase">\(English)</span></label>
                    <textarea name="desc_en" class="form-control  @error('desc_en') is-invalid @enderror" id="desc_en" rows="3" placeholder="ادخل الوصف باللغة الإنجليزية">{{ old('desc_en') }}</textarea>
                    @error('desc_en')
                    <div class="invalid-feedback"> {{ $message }} </div>
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
