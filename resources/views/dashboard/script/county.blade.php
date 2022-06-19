<script>
    $(document).ready( () => {

        fetchCountries();

        // Add New Country
        $(document).on('click', '.add_country',function(e) {

            e.preventDefault();
            ajaxSetup();

            let data = {
                'name_ar': $('#name_ar').val(),
                'name_en': $('#name_en').val(),
            }

            $.ajax({
                url: '{{ route('api.countries.store') }}',
                type: 'POST',
                datatype: 'json',
                data,
                success (response) {
                    if (response.status === 400) {
                        renderMsgError(response);
                    } else {
                        renderMsgSuccess(response, '#ModalAddCountry');
                    }
                }
            })
        })

        // Update Country
        $(document).on('click', '.edit_country', function(e) {

            e.preventDefault();
            let country_id = $(this).val();

            $('#ModalEditCountry').modal('show');

            $.ajax({
                url: 'http://127.0.0.1:8000/api/dashboard/countries/' + country_id,
                type: "GET",
                success (response) {
                    if (response.status === 404) {
                        renderMsgError(response);
                        $('#ModalEditCountry').modal('hide');
                    } else {
                        $('#ModalEditCountry #name_ar').val(response.country.name);
                        $('#ModalEditCountry #name_en').val(response.country.name);
                        $('#ModalEditCountry #country_id').val(country_id);
                    }
                }
            });
            $('.btn-close').find('input').val('');

        });

        $(document).on('click', '.update_country', function (e) {

            e.preventDefault();
            ajaxSetup();

            let country_id = $('#country_id').val();

            let data = {
                'name_ar': $('#ModalEditCountry #name_ar').val(),
                'name_en': $('#ModalEditCountry #name_en').val(),
                '_method': 'PUT'
            }

            $.ajax({
                type: "PUT",
                url: 'http://127.0.0.1:8000/api/dashboard/countries/' + country_id,
                data,
                dataType: "json",
                success(response) {
                    if (response.status === 400) {
                        renderMsgError(response);
                    } else {
                        renderMsgSuccess(response, '#ModalEditCountry');
                    }
                }
            });

        });

        // Delete Country
        $(document).on('click', '.delete_country', function () {
            let country_id = $(this).val();
            $('#ModalDeleteCountry').modal('show');
            $('#country_id').val(country_id);
        });

        $(document).on('click', '.delete', function (e) {

            e.preventDefault();
            ajaxSetup();

            let country_id = $('#country_id').val();

            $.ajax({
                url: 'http://127.0.0.1:8000/api/dashboard/countries/' + country_id,
                type: "DELETE",
                dataType: "json",
                success(response) {
                    if (response.status === 404) {
                        $('.alert span').remove();
                        $('.alert').show().addClass('alert alert-danger').append(`<span> ${response.message} </span>`);
                    } else {
                       renderMsgSuccess(response, '#ModalDeleteCountry')
                    }
                }
            });
        });

        $(document).on('click', '.active_country', function (e) {

            e.preventDefault();
            ajaxSetup();

            let country_id = $(this).val();
            console.log(country_id)

            $.ajax({
                url: 'http://127.0.0.1:8000/api/dashboard/countries/activate/' + country_id,
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
                url: '{{ route('api.countries.index') }}',
                type: 'GET',
                datatype: 'json',
                success(response) {
                    $('.table-countries table tbody').html('');
                    $.each(response, (key, item) => {
                        renderTableContent(key, item);
                    })
                }

            })
        }

        let renderTableContent = (key, item) => {
            $('.table-countries table tbody')
                .append(`
                    <tr>
                        <td><strong> ${item.id} </strong></td>
                        <td> ${item.name} </td>
                        <td> ${item.is_active ?
                            `<span class="badge bg-label-primary me-1">@lang('general.activated')</span>` :
                            `<span class="badge bg-label-secondary me-1">@lang('general.not_activated')</span>`}
                        </td>
                        <td>
                            <x-dropdown-table>
                                <button class="dropdown-item edit_country" value="${item.id}" type="button" data-bs-toggle="modal" data-bs-target="#ModalEditCountry" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                                    @lang('general.edit')
                                </button>
                                <button class="dropdown-item delete_country" type="button" value="${item.id}" data-bs-toggle="modal"  data-bs-target="#ModalDeleteCountry" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                                    @lang('general.delete')
                                </button>
                                <button class="dropdown-item active_country" type="button" value="${item.id}" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
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

        let renderMsgError = (response) => {
            $('#errorMsg').html('').addClass('alert alert-danger');

            $.each(response.errors, (key, err_value) => {
                $('#errorMsg').append(`<li> ${err_value} </li>`);
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
