<script>
    const els = (element) => document.querySelectorAll(element);
    const el  = (element) => document.querySelector(element);

    $(document).ready( () => {

        // Add New City
        $(document).on('click', '.add_city',function(e) {

            e.preventDefault();
            ajaxSetup();

            let data = {
                'name_ar': $('#city_name_ar').val(),
                'name_en': $('#city_name_en').val(),
                'country_id': $('#city_country_id').val()
            }

            $.ajax({
                url: '{{ route('api.cities.store') }}',
                type: 'POST',
                datatype: 'json',
                data,
                success (response) {
                    if (response.status === 400) {
                        renderMsgError(response, '#ModalAddCity');
                    } else {
                        renderMsgSuccess(response, '#ModalAddCity');
                    }
                }
            })
        })

        // Update City
        $(document).on('click', '.edit_city', function(e) {

            e.preventDefault();
            let city_id = $(this).val();

            $('#ModalEditCity').modal('show');

            $.ajax({
                url: 'http://127.0.0.1:8000/api/dashboard/cities/' + city_id,
                type: "GET",
                success (response) {
                    if (response.status === 404) {
                        renderMsgError(response);
                        $('#ModalEditCity').modal('hide');
                    } else {
                        console.log(city_id)
                        $('#ModalEditCity #city_name_ar').val(response.city.name);
                        $('#ModalEditCity #city_name_en').val(response.city.name);
                        $('#ModalEditCity #city_country_id').val(response.city.country_id);
                        $('#ModalEditCity #city_id').val(city_id);
                    }
                }
            });
            $('.btn-close').find('input').val('');

        });

        $(document).on('click', '.update_city', function (e) {

            e.preventDefault();
            ajaxSetup();

            let city_id = $('#city_id').val();

            let data = {
                'name_ar': $('#ModalEditCity #city_name_ar').val(),
                'name_en': $('#ModalEditCity #city_name_en').val(),
                'country_id': $('#ModalEditCity #city_country_id').val(),
                '_method': 'PUT'
            }

            $.ajax({
                type: "PUT",
                url: 'http://127.0.0.1:8000/api/dashboard/cities/' + city_id,
                data,
                dataType: "json",
                success(response) {
                    if (response.status === 400) {
                        renderMsgError(response, '#ModalEditCity');
                    } else {
                        renderMsgSuccess(response, '#ModalEditCity');
                    }
                }
            });

        });

        // Delete City
        $(document).on('click', '.delete_city', function () {
            let city_id = $(this).val();
            $('#ModalDeleteCity').modal('show');
            $('#city_id').val(city_id);
        });

        $(document).on('click', '.delete', function (e) {

            e.preventDefault();
            ajaxSetup();

            let city_id = $('#city_id').val();

            $.ajax({
                url: 'http://127.0.0.1:8000/api/dashboard/cities/' + city_id,
                type: "DELETE",
                dataType: "json",
                success(response) {
                    if (response.status === 404) {
                        $('.alert span').remove();
                        $('.alert').show().addClass('alert alert-danger').append(`<span> ${response.message} </span>`);
                    } else {
                       renderMsgSuccess(response, '#ModalDeleteCity')
                    }
                }
            });
        });

        $(document).on('click', '.active_city', function (e) {

            e.preventDefault();
            ajaxSetup();

            let city_id = $(this).val();

            $.ajax({
                url: 'http://127.0.0.1:8000/api/dashboard/cities/activate/' + city_id,
                type: "GET",
                dataType: "json",
                success(response) {
                    if (response.status === 404) {
                        $('.alert span').remove();
                        $('.alert').show().addClass('alert alert-danger').append(`<span> ${response.message} </span>`);
                    } else {
                        renderMsgSuccess(response, '')
                    }
                }
            });
        });

        function fetchCountries()
        {
            $.ajax({
                url: '{{ route('api.cities.index') }}',
                type: 'GET',
                datatype: 'json',
                success(response) {
                    $('.table-cities table tbody').html('');
                    $.each(response, (key, item) => {
                        renderTableContent(key, item);
                    })
                }

            })
        }

        let renderTableContent = (key, item) => {
            $('.table-cities table tbody')
                .append(`
                    <tr>
                        <td><strong> ${item.id} </strong></td>
                        <td> ${item.name} </td>
                        <td> ${item.country.name} </td>
                        <td> ${item.is_active ?
                            `<span class="badge bg-label-primary me-1">@lang('general.activated')</span>` :
                            `<span class="badge bg-label-secondary me-1">@lang('general.not_activated')</span>`}
                        </td>
                        <td>
                            <x-dropdown-table>
                                <button class="dropdown-item edit_city" value="${item.id}" type="button" data-bs-toggle="modal" data-bs-target="#ModalEditCity" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                                    @lang('general.edit')
                                </button>
                                <button class="dropdown-item delete_city" type="button" value="${item.id}" data-bs-toggle="modal"  data-bs-target="#ModalDeleteCity" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                                    @lang('general.delete')
                                </button>
                                <button class="dropdown-item active_city" type="button" value="${item.id}" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                                    ${item.is_active ? `@lang('general.deactivation')` : `@lang('general.active')`}
                                </button>
                            </x-dropdown-table>
                        </td>
                    </tr>
                `)
        }

        let ajaxSetup = () => {
             $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }

        let renderMsgError = (response, modal) => {
            Object.keys(response.errors)
                .forEach(key => {
                    key === 'name_ar' ?
                        el(modal + ' #name_error_ar').innerHTML = `${response.errors[key]}` : '';
                    key === 'name_en' ?
                        el(modal + ' #name_error_en').innerHTML = `${response.errors[key]}` : '';
                    key === 'country_id' ?
                        el(modal + ' #country_id_error').innerHTML = `${response.errors[key]}` : '';
                });
        }

        let renderMsgSuccess = (response, modal) => {
            $('#errorMsg').html("");
            $('.alert span').remove();
            $('.alert').show().addClass('alert alert-primary').append(`<span> ${response.message} </span>`);

            $(modal).find('input').val('');
            $(modal).modal('hide');
            fetchCountries();
        }

    })

</script>
