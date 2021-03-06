<script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap"
        type="text/javascript"></script>
<script>
    $(document).ready( () => {

        const els = (element) => document.querySelectorAll(element);
        const el  = (element) => document.querySelector(element);

        // Add New Service Point
        $(document).on('click', '.add_service_point',function(e) {

            e.preventDefault();
            ajaxSetup();

            let data = {
                'name_ar': $('#name_ar').val(),
                'name_en': $('#name_en').val(),
                'address_ar': $('#address_ar').val(),
                'address_en': $('#address_en').val(),
                'working_hours_ar': $('#working_hours_ar').val(),
                'working_hours_en': $('#working_hours_en').val(),
                'phone': $('#phone').val(),
                'second_phone': $('#second_phone').val(),
                'category': $('#category').val(),
                'city_id': $('#city_id').val(),
                'lat': $('#lat').val(),
                'lng': $('#lng').val()
            }

            console.log(data)

            $.ajax({
                url: '{{ route('api.points.store') }}',
                type: 'POST',
                datatype: 'json',
                data,
                success (response) {
                    if (response.status === 400) {
                        renderMsgError(response, '#ModalAddServicePoint');
                    } else {
                        renderMsgSuccess(response, '#ModalAddServicePoint');
                    }
                }
            })
        })

        // Update Service Point
        $(document).on('click', '.edit_service_point', function(e) {

            e.preventDefault();
            let service_point_id = $(this).val();

            $('#ModalEditServicePoint').modal('show');

            $.ajax({
                url: 'http://127.0.0.1:8000/api/dashboard/service/points/' + service_point_id,
                type: "GET",
                success (response) {
                    if (response.status === 404) {
                        renderMsgError(response);
                        $('#ModalEditServicePoint').modal('hide');
                    } else {
                        $('#ModalEditServicePoint #name_ar').val(response.service_point.name);
                        $('#ModalEditServicePoint #name_en').val(response.service_point.name);
                        $('#ModalEditServicePoint #address_ar').val(response.service_point.address);
                        $('#ModalEditServicePoint #address_en').val(response.service_point.address);
                        $('#ModalEditServicePoint #working_hours_ar').val(response.service_point.working_hours);
                        $('#ModalEditServicePoint #working_hours_en').val(response.service_point.working_hours);
                        $('#ModalEditServicePoint #phone').val(response.service_point.phone);
                        $('#ModalEditServicePoint #second_phone').val(response.service_point.second_phone);
                        $('#ModalEditServicePoint #category').val(response.service_point.category);
                        $('#ModalEditServicePoint #lng').val(response.service_point.lng);
                        $('#ModalEditServicePoint #lat').val(response.service_point.lat);
                        $('#ModalEditServicePoint #city_id').val(response.service_point.city_id);
                        $('#ModalEditServicePoint #service_point_id').val(service_point_id);
                    }
                }
            });
            $('.btn-close').find('input').val('');
            initMapTow(response.service_point.lat, response.service_point.lng);

        });

        $(document).on('click', '.update_service_point', function (e) {

            e.preventDefault();
            ajaxSetup();

            let service_point_id = $('#service_point_id').val();

            let data = {
                'name_ar': $('#ModalEditServicePoint #name_ar').val(),
                'name_en': $('#ModalEditServicePoint #name_en').val(),
                'address_ar': $('#ModalEditServicePoint #address_ar').val(),
                'address_en': $('#ModalEditServicePoint #address_en').val(),
                'working_hours_ar': $('#ModalEditServicePoint #working_hours_ar').val(),
                'working_hours_en': $('#ModalEditServicePoint #working_hours_en').val(),
                'phone': $('#ModalEditServicePoint #phone').val(),
                'second_phone': $('#ModalEditServicePoint #second_phone').val(),
                'category': $('#ModalEditServicePoint #category').val(),
                'lat': $('#ModalEditServicePoint #lat').val(),
                'lng': $('#ModalEditServicePoint #lng').val(),
                'city_id': $('#ModalEditServicePoint #city_id').val(),
                '_method': 'PUT'
            }

            console.log(data.second_phone)

            $.ajax({
                type: "PUT",
                url: 'http://127.0.0.1:8000/api/dashboard/service/points/' + service_point_id,
                data,
                dataType: "json",
                success(response) {
                    if (response.status === 400) {
                        renderMsgError(response, '#ModalEditServicePoint');
                    } else {
                        renderMsgSuccess(response, '#ModalEditServicePoint');
                    }
                }
            });
        });

        // Delete Service Point
        $(document).on('click', '.delete_service_point', function () {
            let service_point_id = $(this).val();
            $('#ModalDeleteServicePoint').modal('show');
            $('#service_point_id').val(service_point_id);
        });

        $(document).on('click', '.delete', function (e) {

            e.preventDefault();
            ajaxSetup();

            let service_point_id = $('#service_point_id').val();

            $.ajax({
                url: 'http://127.0.0.1:8000/api/dashboard/service/points/' + service_point_id,
                type: "DELETE",
                dataType: "json",
                success(response) {
                    if (response.status === 404) {
                        $('.alert span').remove();
                        $('.alert').show().addClass('alert alert-danger').append(`<span> ${response.message} </span>`);
                    } else {
                       renderMsgSuccess(response, '#ModalDeleteServicePoint')
                    }
                }
            });
        });

        $(document).on('click', '.active_service_point', function (e) {

            e.preventDefault();
            ajaxSetup();

            let service_point_id = $(this).val();

            $.ajax({
                url: 'http://127.0.0.1:8000/api/dashboard/service/points/activate/' + service_point_id,
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
                url: '{{ route('api.points.index') }}',
                type: 'GET',
                datatype: 'json',
                success(response) {
                    $('.table-service-point table tbody').html('');
                    $.each(response, (key, item) => {
                        renderTableContent(key, item);
                    })
                }

            })
        }

        let renderTableContent = (key, item) => {
            $('.table-service-point table tbody')
                .append(`
                    <tr>
                        <td><strong> ${item.id} </strong></td>
                        <td> ${item.name} </td>
                        <td> ${item.category} </td>
                        <td> ${item.city.name} </td>
                        <td> ${item.city.country.name} </td>
                        <td> ${item.is_active ?
                            `<span class="badge bg-label-primary me-1">@lang('general.activated')</span>` :
                            `<span class="badge bg-label-secondary me-1">@lang('general.not_activated')</span>`}
                        </td>
                        <td>
                            <x-dropdown-table>
                                <button class="dropdown-item edit_service_point" value="${item.id}" type="button" data-bs-toggle="modal" data-bs-target="#ModalEditCity" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                                    @lang('general.edit')
                                </button>
                                <button class="dropdown-item delete_service_point" type="button" value="${item.id}" data-bs-toggle="modal"  data-bs-target="#ModalDeleteCity" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                                    @lang('general.delete')
                                </button>
                                <button class="dropdown-item active_service_point" type="button" value="${item.id}" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
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
                    key === 'address_ar' ?
                        el(modal + ' #address_error_ar').innerHTML = `${response.errors[key]}` : '';
                    key === 'address_en' ?
                        el(modal + ' #address_error_en').innerHTML = `${response.errors[key]}` : '';
                    key === 'working_hours_ar' ?
                        el(modal + ' #working_hours_error_ar').innerHTML = `${response.errors[key]}` : '';
                    key === 'working_hours_en' ?
                        el(modal + ' #working_hours_error_en').innerHTML = `${response.errors[key]}` : '';
                    key === 'phone' ?
                        el(modal + ' #phone_error').innerHTML = `${response.errors[key]}` : '';
                    key === 'second_phone' ?
                        el(modal + ' #second_phone_error').innerHTML = `${response.errors[key]}` : '';
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

<script>
    let map;
    let mapTow;

    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: 15.970322860037507, lng: 46.856072407079935 },
            zoom: 5,
            scrollwheel: true,
        })

        const uluru = { lat: -34.397, lng: 150.644 };
        let marker = new google.maps.Marker({
            position: uluru,
            map: map,
            draggable: true
        });

        google.maps.event.addListener(marker,'position_changed',
            function (){
                let lat = marker.position.lat()
                let lng = marker.position.lng()
                $('#lat').val(lat)
                $('#lng').val(lng)
            })

        google.maps.event.addListener(map,'click',
            function (event){
                pos = event.latLng
                marker.setPosition(pos)
            })
    }

    function initMapTow(lat, lng) {
        mapTow = new google.maps.Map(document.getElementById("mapTow"), {
            center: { lat: lat, lng: lng },
            zoom: 5,
            scrollwheel: true,
        })

        const uluru = { lat: -34.397, lng: 150.644 };
        let marker = new google.maps.Marker({
            position: uluru,
            map: mapTow,
            draggable: true
        });

        google.maps.event.addListener(marker,'position_changed',
            function (){
                let lat = marker.position.lat()
                let lng = marker.position.lng()
                $('#lat').val(lat)
                $('#lng').val(lng)
            })

        google.maps.event.addListener(map,'click',
            function (event){
                pos = event.latLng
                marker.setPosition(pos)
            })
    }

    initMap()
</script>
