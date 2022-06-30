<script>
    const els = (element) => document.querySelectorAll(element);
    const el  = (element) => document.querySelector(element);

    fetchPrinciples();

    //********* Fetch Data From API *********//
    function fetchPrinciples() {
        axios.get('http://127.0.0.1:8000/api/dashboard/principles')
            .then(response => {
                renderTableContent(response);
                // console.log(response)
            })
            .catch(error => console.error(error));
    }

    //********* Creat New principle *********//
    el('.add_principle').addEventListener('click', async (e) => {
        e.preventDefault();

        const response = await axios
            .post('http://127.0.0.1:8000/api/dashboard/principles', {
                title_ar: el('#title_ar').value,
                title_en: el('#title_en').value,
                desc_ar: el('#desc_ar').value,
                desc_en: el('#desc_en').value,
            }, {
                headers: { 'Content-type': 'application/json; charset=UTF-8' }
            });

        if(response.status === 400) {
            renderMsgError(response);
        }
        else {
            renderMsgSuccess(response, '#ModalAddPrinciple', 'primary');
        }
    });

    //********* Edit Principle *********//
    async function edit_principle(id) {

        let principle_id = id;

        await axios
            .get(`http://127.0.0.1:8000/api/dashboard/principles/${principle_id}`, {
                title_ar: el('#title_ar').value,
                title_en: el('#title_en').value,
                desc_ar: el('#desc_ar').value,
                desc_en: el('#desc_en').value,
            }, {
                headers: {'Content-type': 'application/json; charset=UTF-8'}
            })
            .then(response => {
                if (response.status === 404) {
                    renderMsgError(response);
                    el('#ModalEditPrinciple .btn-close').click();
                } else {
                    el('#ModalEditPrinciple #title_ar').value = response.data.principle.title;
                    el('#ModalEditPrinciple #title_en').value = response.data.principle.title;
                    el('#ModalEditPrinciple #desc_ar').value = response.data.principle.desc;
                    el('#ModalEditPrinciple #desc_en').value = response.data.principle.desc;
                    el('#ModalEditPrinciple #principle_id').value = principle_id;
                }
            })
            .catch(error => console.error(error));
    }

    //********* Update principle *********//
    el('#update_principle').addEventListener('click', async (e) => {
        e.preventDefault();
        let principle_id = el('#ModalEditPrinciple #principle_id').value;

        await axios
            .put(`http://127.0.0.1:8000/api/dashboard/principles/${principle_id}`, {
                title_ar: el('#ModalEditPrinciple #title_ar').value,
                title_en: el('#ModalEditPrinciple #title_en').value,
                desc_ar: el('#ModalEditPrinciple #desc_ar').value,
                desc_en: el('#ModalEditPrinciple #desc_en').value,
                _method: 'PUT'
            }, {
                headers: {'Content-type': 'application/json; charset=UTF-8'}
            })
            .then(response => {
                if (response.status === 400) {
                    renderMsgError(response);
                } else {
                    renderMsgSuccess(response, '#ModalEditPrinciple', 'primary');
                }
            })
            .catch(error => console.error(error));
    })

    //********* Delete principle *********//
    async function delete_principle(id) {
        el('#ModalDeletePrinciple #principle_id').value = id;
    }

    //********* Delete principle *********//
    el('#delete_principle').addEventListener('click', async (e) => {
        e.preventDefault();
        let principle_id = el('#ModalDeletePrinciple #principle_id').value;

        await axios
            .delete(`http://127.0.0.1:8000/api/dashboard/principles/${principle_id}`,{
                headers: {'Content-type': 'application/json; charset=UTF-8'}
            })
            .then(response => {
                if (response.status === 404) {
                    renderMsgSuccess(response, '#ModalDeletePrinciple', 'danger');
                } else {
                    renderMsgSuccess(response, '#ModalDeletePrinciple', 'primary');
                }
            })
            .catch(error => console.error(error));
    })


    //********* Activate principle *********//
    async function active_principle(id) {

        await axios
            .get(`http://127.0.0.1:8000/api/dashboard/principles/activate/${id}`, {
                headers: {'Content-type': 'application/json; charset=UTF-8'}
            })
            .then(response => {
                if (response.status === 404) {
                    renderAlert(response, 'danger');
                    fetchPrinciples();
                } else {
                    renderAlert(response, 'primary');
                    fetchPrinciples();
                }
            })
            .catch(error => console.error(error));
    }

    //********* Render Table Content With Data *********//
    let renderTableContent = (response) => {
        el('.table-principles table tbody').innerHTML = '';

        response.data.forEach(item => {
            el('.table-principles table tbody')
                .insertRow().innerHTML =
                `<tr>
                    <td><strong> ${item.id} </strong></td>
                    <td> ${item.title} </td>
                    <td> ${item.created_at} </td>
                    <td> ${item.is_active ?
                        `<span class="badge bg-label-primary me-1">@lang('general.activated')</span>` :
                        `<span class="badge bg-label-secondary me-1">@lang('general.not_activated')</span>`}
                    </td>
                    <td>
                        <x-dropdown-table>
                        @can('principle-edit')
                            <button class="dropdown-item" onclick="edit_principle(${item.id})" type="button" data-bs-toggle="modal" data-bs-target="#ModalEditPrinciple" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                                @lang('general.edit')
                            </button>
                        @endcan
                        @can('principle-delete')
                            <button class="dropdown-item" onclick="delete_principle(${item.id})" type="button"  data-bs-toggle="modal"  data-bs-target="#ModalDeletePrinciple" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                                 @lang('general.delete')
                            </button>
                            <button class="dropdown-item" type="button" onclick="active_principle(${item.id})" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                                ${item.is_active ? `@lang('general.deactivation')` : `@lang('general.active')`}
                            </button>
                        @endcan
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

    //********* Render Message Successful *********//
    let renderMsgSuccess = (response, modal, type) => {
        el('#errorMsg').innerText   = '';
        renderAlert(response, type);
        els(modal + ' input').forEach(e => {
            e.value = '';
        });
        el(modal + ' .btn-close').click();
        fetchPrinciples();
    }

    //********* Render Alert  *********//
    let renderAlert = (response, type) => {
        // el('.alert div#span').innerHTML = '';

        el('.alert').style.display = 'block';
        el('.alert').classList.add(`alert-${type}`);
        el('.alert div#span').innerHTML = `<span> ${response.data.message} </span>`;
    }

</script>
