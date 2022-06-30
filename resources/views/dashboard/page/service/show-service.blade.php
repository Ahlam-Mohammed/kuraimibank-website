@extends('dashboard.layout.master')

@section('title')
    @lang('page.edit_service')
@stop

@section('content')

    <h4 class="fw-bold py-3 mb-4">
        <span class="fw-light">
           @lang('page.services')
        </span>
    </h4>

    <div class="row">
        <div class="w-75">
            {{--   Service Bacground     --}}
            <div class="card mb-3" style="height: 200px; background-image: url({{ asset('storage/services/'. $service->background) }})">
            </div>

            {{--   Service Name     --}}
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4 d-flex align-items-center">
                        <img class="card-img" src="{{ asset('storage/services/'. $service->image) }}" alt="Card image">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <div class="col-md-6">
                                <label class="form-label text-primary" for="name_ar">@lang('index.service.name') <span class="text-lowercase">\(Arabic)</span></label>
                                <p>{{ $service->getTranslation('name', 'ar') }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-primary" for="name_en">@lang('index.service.name') <span class="text-lowercase">\(English)</span></label>
                                <p>{{ $service->getTranslation('name', 'en') }}</p>
                            </div>
                            {{-- Service Category --}}
                            <div class="col-md-6">
                                <label for="selectpickerBasic" class="form-label text-primary">@lang('index.service.category')</label>
                                <p>{{ $service->category->name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--   Service Description     --}}
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label text-primary" for="desc_ar">@lang('index.service.desc') <span class="text-lowercase">\(Arabic)</span></label>
                            <p>{{ $service->getTranslation('desc', 'ar') }}</p>
                        </div>
                        <hr class="my-4 mx-n4" />
                        <div class="col-12">
                            <label class="form-label text-primary" for="desc_en">@lang('index.service.desc') <span class="text-lowercase">\(English)</span></label>
                            <p>{{ $service->getTranslation('desc', 'en') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- service_condition  --}}
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="form-group">
                            <label class="form-label" for="service_condition_ar">@lang('index.service.service_condition') <span class="text-lowercase">\(Arabic)</span></label>
                            <p>{{$service->getTranslation('service_condition', 'ar')}}    </p>
                        </div>
                        <hr class="my-4 mx-n4" />
                        <div class="form-group">
                            <label class="form-label" for="service_condition_en">@lang('index.service.service_condition') <span class="text-lowercase">\(English)</span></label>
                            <p>{{$service->getTranslation('service_condition', 'en')}}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- other_advantage  --}}
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="form-group">
                            <label class="form-label" for="other_advantage_ar">@lang('index.service.other_advantage') <span class="text-lowercase">\(Arabic)</span></label>
                            {!!$service->getTranslation('other_advantage', 'ar')!!}
                        </div>
                        <hr class="my-4 mx-n4" />
                        <div class="form-group">
                            <label class="form-label" for="other_advantage_en">@lang('index.service.other_advantage') <span class="text-lowercase">\(English)</span></label>
                            {!! $service->getTranslation('other_advantage', 'ar') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-25">
            @can('service-edit')
                <form action="{{ route('dashboard.services-edit') }}" method="post">
                    @csrf
                    <input hidden name="id" value="{{ $service->id }}">
                    <button type="submit" class="dropdown-item edit_category"><i class="bx bx-edit-alt me-1"></i>
                        @lang('general.edit')
                    </button>
                </form>
            @endcan
            @can('service-delete')
                <button class="dropdown-item delete_category" type="button"  data-bs-toggle="modal"  data-bs-target="#ModalDeleteService" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                    @lang('general.delete')
                </button>
            @endcan
        </div>
    </div>

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
@stop
