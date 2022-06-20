<script>
    const els = (element) => document.querySelectorAll(element);
    const el  = (element) => document.querySelector(element);

    //********* Render Table Content With Data *********//
    let renderTableContent = (response) => {
        el('.table-rates table tbody').innerHTML = '';

        response.data.forEach(item => {
            el('.table-rates table tbody')
                .insertRow().innerHTML =
                `<tr>
                    <td><strong> ${item.id} </strong></td>
                    <td> ${item.name} </td>
                    <td> ${item.sale} </td>
                    <td> ${item.buy} </td>
                    <td> ${item.created_at} </td>
                    <td> ${item.is_active ?
                    `<span class="badge bg-label-primary me-1">@lang('general.activated')</span>` :
                    `<span class="badge bg-label-secondary me-1">@lang('general.not_activated')</span>`}
                    </td>
                    <td>
                        <x-dropdown-table>
                            <button class="dropdown-item" onclick="edit_rate(${item.id})" type="button" data-bs-toggle="modal" data-bs-target="#ModalEditRate" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                                @lang('general.edit')
                </button>
                <button class="dropdown-item" onclick="delete_rate(${item.id})" type="button"  data-bs-toggle="modal"  data-bs-target="#ModalDeleteRate" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                                 @lang('general.delete')
                </button>
                <button class="dropdown-item" type="button" onclick="active_rate(${item.id})" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                                ${item.is_active ? `@lang('general.deactivation')` : `@lang('general.active')`}
                            </button>
                        </x-dropdown-table>
                    </td>
                </tr>`
        });
    }

    //********* Render Message Errors *********//
    let renderMsgError = (response) => {
        el('#errorMsg').innerHTML = '';
        el('#errorMsg').addClass('alert alert-danger');

        response.errors.forEach((element, index, err_value) => {
            el('#errorMsg').innerHTML = `<li> ${err_value} </li>`;
        });
    }

    //********* Render Alert  *********//
    let renderAlert = (response, type) => {
        // el('.alert div#span').innerHTML = '';

        el('.alert').style.display = 'block';
        el('.alert').classList.add(`alert-${type}`);
        el('.alert div#span').innerHTML = `<span> ${response.data.message} </span>`;
    }

    //********* Render Message Successful *********//
    let renderMsgSuccess = (response, modal, type) => {
        el('#errorMsg').innerText   = '';
        renderAlert(response, type);
        els(modal + ' input').forEach(e => {
            e.value = '';
        });
        el(modal + ' .btn-close').click();
        fetchRates();
    }

    fetchRates();

    //********* Fetch Data From API *********//
    function fetchRates() {
        axios.get('http://127.0.0.1:8000/api/dashboard/rates')
            .then(response => {
                renderTableContent(response);
                console.log(response)
            })
            .catch(error => console.error(error));
    }

    //********* Creat New Exchange Rate *********//
    el('.add_rate').addEventListener('click', async (e) => {
        e.preventDefault();

        const response = await axios
            .post('http://127.0.0.1:8000/api/dashboard/rates', {
                name_ar: el('#name_ar').value,
                name_en: el('#name_en').value,
                sale: el('#sale').value,
                buy: el('#buy').value
            }, {
                headers: { 'Content-type': 'application/json; charset=UTF-8' }
            });

        if(response.status === 400) {
            renderMsgError(response);
        }
        else {
            renderMsgSuccess(response, '#ModalAddRate', 'primary');
        }
    });

    //********* Edit Exchange Rate *********//
    async function edit_rate(id) {

        let rate_id = id;

        await axios
            .get(`http://127.0.0.1:8000/api/dashboard/rates/${rate_id}`, {
                name_ar: el('#name_ar').value,
                name_en: el('#name_en').value,
                sale: el('#sale').value,
                buy: el('#buy').value
            }, {
                headers: {'Content-type': 'application/json; charset=UTF-8'}
            })
            .then(response => {
                if (response.status === 404) {
                    renderMsgError(response);
                    el('#ModalEditRate .btn-close').click();
                } else {
                    el('#ModalEditRate #name_ar').value = response.data.rate.name;
                    el('#ModalEditRate #name_en').value = response.data.rate.name;
                    el('#ModalEditRate #sale').value    = response.data.rate.sale
                    el('#ModalEditRate #buy').value     = response.data.rate.buy
                    el('#ModalEditRate #rate_id').value = rate_id;
                }
            })
            .catch(error => console.error(error));
    }

    //********* Update Exchange Rate *********//
    el('#update_rate').addEventListener('click', async (e) => {
        e.preventDefault();
        let rate_id = el('#ModalEditRate #rate_id').value;

        await axios
            .put(`http://127.0.0.1:8000/api/dashboard/rates/${rate_id}`, {
                name_ar: el('#ModalEditRate #name_ar').value,
                name_en: el('#ModalEditRate #name_en').value,
                sale: el('#ModalEditRate #sale').value,
                buy: el('#ModalEditRate #buy').value,
                _method: 'PUT'
            }, {
                headers: {'Content-type': 'application/json; charset=UTF-8'}
            })
            .then(response => {
                if (response.status === 400) {
                    renderMsgError(response);
                } else {
                    renderMsgSuccess(response, '#ModalEditRate', 'primary');
                }
            })
            .catch(error => console.error(error));
    })

    //********* Delete Exchange Rate *********//
    async function delete_rate(id) {
        el('#ModalDeleteRate #rate_id').value = id;
    }

    //********* Delete Exchange Rate *********//
    el('#delete_rate').addEventListener('click', async (e) => {
        e.preventDefault();
        let rate_id = el('#ModalDeleteRate #rate_id').value;

        await axios
            .delete(`http://127.0.0.1:8000/api/dashboard/rates/${rate_id}`,{
                headers: {'Content-type': 'application/json; charset=UTF-8'}
            })
            .then(response => {
                if (response.status === 404) {
                    renderMsgSuccess(response, '#ModalDeleteRate', 'danger');
                } else {
                    renderMsgSuccess(response, '#ModalDeleteRate', 'primary');
                }
            })
            .catch(error => console.error(error));
    })


    //********* Activate Exchange Rate *********//
    async function active_rate(id) {

        await axios
            .get(`http://127.0.0.1:8000/api/dashboard/rates/activate/${id}`, {
                headers: {'Content-type': 'application/json; charset=UTF-8'}
            })
            .then(response => {
                if (response.status === 404) {
                    renderAlert(response, 'danger');
                    fetchRates();
                } else {
                    renderAlert(response, 'primary');
                    fetchRates();
                }
            })
            .catch(error => console.error(error));
    }

</script>
