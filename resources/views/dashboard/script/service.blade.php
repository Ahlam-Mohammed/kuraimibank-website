<script>
    const els = (element) => document.querySelectorAll(element);
    const el  = (element) => document.querySelector(element);

    fetchServices();

    //********* Fetch Data From API *********//
    function fetchServices() {
        axios.get('http://127.0.0.1:8000/api/dashboard/services')
            .then(response => {
                console.log(response.data)
                renderTableContent(response);
            })
            .catch(error => console.error(error));
    }

    //********* Creat New Category *********//
    // el('.add_category').addEventListener('click', async (e) => {
    //     e.preventDefault();
    //
    //     const response = await axios
    //         .post('http://127.0.0.1:8000/api/dashboard/categories', {
    //             name_ar: el('#name_ar').value,
    //             name_en: el('#name_en').value,
    //         }, {
    //             headers: { 'Content-type': 'application/json; charset=UTF-8' }
    //         });
    //
    //     if(response.status === 400) {
    //         renderMsgError(response);
    //     }
    //     else {
    //         renderMsgSuccess(response, '#ModalAddCategory', 'primary');
    //     }
    // });

    //********* Edit Category *********//
    // async function edit_category(id) {
    //
    //     let category_id = id;
    //
    //     await axios
    //         .get(`http://127.0.0.1:8000/api/dashboard/categories/${category_id}`, {
    //             name_ar: el('#name_ar').value,
    //             name_en: el('#name_en').value,
    //         }, {
    //             headers: {'Content-type': 'application/json; charset=UTF-8'}
    //         })
    //         .then(response => {
    //             if (response.status === 404) {
    //                 renderMsgError(response);
    //                 el('#ModalEditCategory .btn-close').click();
    //             } else {
    //                 el('#ModalEditCategory #name_ar').value = response.data.category.name;
    //                 el('#ModalEditCategory #name_en').value = response.data.category.name;
    //                 el('#ModalEditCategory #category_id').value = category_id;
    //             }
    //         })
    //         .catch(error => console.error(error));
    // }

    //********* Update Category *********//
    // el('#update_category').addEventListener('click', async (e) => {
    //     e.preventDefault();
    //     let category_id = el('#ModalEditCategory #category_id').value;
    //
    //     await axios
    //         .put(`http://127.0.0.1:8000/api/dashboard/categories/${category_id}`, {
    //             name_ar: el('#ModalEditCategory #name_ar').value,
    //             name_en: el('#ModalEditCategory #name_en').value,
    //             _method: 'PUT'
    //         }, {
    //             headers: {'Content-type': 'application/json; charset=UTF-8'}
    //         })
    //         .then(response => {
    //             if (response.status === 400) {
    //                 renderMsgError(response);
    //             } else {
    //                 renderMsgSuccess(response, '#ModalEditCategory', 'primary');
    //             }
    //         })
    //         .catch(error => console.error(error));
    // })

    //********* Delete Service *********//
    async function delete_service(id) {
        el('#ModalDeleteService #service_id').value = id;
    }

    //********* Delete Service *********//
    el('#delete_service').addEventListener('click', async (e) => {
        e.preventDefault();
        let service_id = el('#ModalDeleteService #service_id').value;

        await axios
            .delete(`http://127.0.0.1:8000/api/dashboard/services/${service_id}`,{
                headers: {'Content-type': 'application/json; charset=UTF-8'}
            })
            .then(response => {
                if (response.status === 404) {
                    renderMsgSuccess(response, '#ModalDeleteService', 'danger');
                } else {
                    renderMsgSuccess(response, '#ModalDeleteService', 'primary');
                }
            })
            .catch(error => console.error(error));
    })


    //********* Activate Service *********//
    async function active_service(id) {

        await axios
            .get(`http://127.0.0.1:8000/api/dashboard/services/activate/${id}`, {
                headers: {'Content-type': 'application/json; charset=UTF-8'}
            })
            .then(response => {
                if (response.status === 404) {
                    renderAlert(response, 'danger');
                    fetchServices();
                } else {
                    renderAlert(response, 'primary');
                    fetchServices();
                }
            })
            .catch(error => console.error(error));
    }


    //********* Render Table Content With Data *********//
    let renderTableContent = (response) => {
        el('.table-services table tbody').innerHTML = '';

        response.data.forEach(item => {
            el('.table-services table tbody')
                .insertRow().innerHTML =
                `<tr>
                    <td><strong> ${item.id} </strong></td>
                    <td> ${item.name} </td>
                    <td> ${item.category ? item.category.name : `___`} </td>
                    <td> ${item.subCategory ? item.subCategory.name : `___`} </td>
                    <td> ${item.created_at} </td>
                    <td> ${item.is_active ?
                        `<span class="badge bg-label-primary me-1">@lang('general.activated')</span>` :
                        `<span class="badge bg-label-secondary me-1">@lang('general.not_activated')</span>`}
                    </td>
                    <td>
                        <x-dropdown-table>
                            <a class="dropdown-item edit_category" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                                @lang('general.edit')
                            </a>
                            <button class="dropdown-item delete_category" onclick="delete_service(${item.id})" type="button"  data-bs-toggle="modal"  data-bs-target="#ModalDeleteService" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                                 @lang('general.delete')
                            </button>
                            <button class="dropdown-item" type="button" onclick="active_service(${item.id})" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
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

    //********* Render Message Successful *********//
    let renderMsgSuccess = (response, modal, type) => {
        let errorMsg = el('#errorMsg');
        errorMsg ? errorMsg.innerText   = '' : errorMsg;
        renderAlert(response, type);
        els(modal + ' input').forEach(e => {
            e.value = '';
        });
        el(modal + ' .btn-close').click();
        fetchServices();
    }

    //********* Render Alert  *********//
    let renderAlert = (response, type) => {
        // el('.alert div#span').innerHTML = '';

        el('.alert').style.display = 'block';
        el('.alert').classList.add(`alert-${type}`);
        el('.alert div#span').innerHTML = `<span> ${response.data.message} </span>`;
    }

</script>
