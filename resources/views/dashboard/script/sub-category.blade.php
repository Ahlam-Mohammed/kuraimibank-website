<script>
    const els = (element) => document.querySelectorAll(element);
    const el  = (element) => document.querySelector(element);

    fetchSubCategories();

    //********* Fetch Data From API *********//
    function fetchSubCategories() {
        axios.get('http://127.0.0.1:8000/api/dashboard/sub/category')
            .then(response => {
                renderTableContent(response);
                console.log(response)
            })
            .catch(error => console.error(error));
    }

    //********* Creat New Sub Category *********//
    el('.add_sub_category').addEventListener('click', async (e) => {
        e.preventDefault();

        const response = await axios
            .post('http://127.0.0.1:8000/api/dashboard/sub/category', {
                name_ar: el('#ModalAddSubCategory #name_ar').value,
                name_en: el('#ModalAddSubCategory #name_en').value,
                category_id: el('#ModalAddSubCategory #category_id').value
            }, {
                headers: { 'Content-type': 'application/json; charset=UTF-8' }
            });

        if(response.status === 400) {
            renderMsgError(response);
        }
        else {
            renderMsgSuccess(response, '#ModalAddSubCategory', 'primary');
        }
        
    });

    //********* Edit Sub Category *********//
    async function edit_sub_category(id) {

        let branch_id = id;

        await axios
            .get(`http://127.0.0.1:8000/api/dashboard/sub/category/${branch_id}`, {
                name_ar: el('#ModalEditSubCategory #name_ar').value,
                name_en: el('#ModalEditSubCategory #name_en').value,
                category_id: el('#ModalEditSubCategory #category_id')
            }, {
                headers: {'Content-type': 'application/json; charset=UTF-8'}
            })
            .then(response => {
                if (response.status === 404) {
                    renderMsgError(response);
                    el('#ModalEditSubCategory .btn-close').click();
                } else {
                    el('#ModalEditSubCategory #name_ar').value = response.data.branch.name;
                    el('#ModalEditSubCategory #name_en').value = response.data.branch.name;
                    el('#ModalEditSubCategory #category_id').value = response.data.branch.category_id;
                    el('#ModalEditSubCategory #branch_id').value = branch_id;
                }
            })
            .catch(error => console.error(error));
    }

    //********* Update Sub Category *********//
    el('#update_sub_category').addEventListener('click', async (e) => {
        e.preventDefault();
        let branch_id = el('#ModalEditSubCategory #branch_id').value;

        await axios
            .put(`http://127.0.0.1:8000/api/dashboard/sub/category/${branch_id}`, {
                name_ar: el('#ModalEditSubCategory #name_ar').value,
                name_en: el('#ModalEditSubCategory #name_en').value,
                category_id: el('#ModalEditSubCategory #category_id').value,
                _method: 'PUT'
            }, {
                headers: {'Content-type': 'application/json; charset=UTF-8'}
            })
            .then(response => {
                if (response.status === 400) {
                    renderMsgError(response);
                } else {
                    renderMsgSuccess(response, '#ModalEditSubCategory', 'primary');
                }
            })
            .catch(error => console.error(error));
    })

    //********* Delete Sub Category *********//
    async function delete_sub_category(id) {
        el('#ModalDeleteSubCategory #branch_id').value = id;
    }

    //********* Delete Sub Category *********//
    el('#delete_sub_category').addEventListener('click', async (e) => {
        e.preventDefault();
        let branch_id = el('#ModalDeleteSubCategory #branch_id').value;

        await axios
            .delete(`http://127.0.0.1:8000/api/dashboard/sub/category/${branch_id}`,{
                headers: {'Content-type': 'application/json; charset=UTF-8'}
            })
            .then(response => {
                if (response.status === 404) {
                    renderMsgSuccess(response, '#ModalDeleteSubCategory', 'danger');
                } else {
                    renderMsgSuccess(response, '#ModalDeleteSubCategory', 'primary');
                }
            })
            .catch(error => console.error(error));
    })


    //********* Activate Sub Category *********//
    async function active_sub_category(id) {

        await axios
            .get(`http://127.0.0.1:8000/api/dashboard/sub/category/activate/${id}`, {
                headers: {'Content-type': 'application/json; charset=UTF-8'}
            })
            .then(response => {
                if (response.status === 404) {
                    renderAlert(response, 'danger');
                    fetchSubCategories();
                } else {
                    renderAlert(response, 'primary');
                    fetchSubCategories();
                }
            })
            .catch(error => console.error(error));
    }

    //********* Render Table Content With Data *********//
    let renderTableContent = (response) => {
        el('.table-sub-categories table tbody').innerHTML = '';

        response.data.forEach(item => {
            el('.table-sub-categories table tbody')
                .insertRow().innerHTML =
                `<tr>
                    <td><strong> ${item.id} </strong></td>
                    <td> ${item.name} </td>
                    <td> ${item.category.name} </td>
                    <td> ${item.created_at} </td>
                    <td> ${item.is_active ?
                        `<span class="badge bg-label-primary me-1">@lang('general.activated')</span>` :
                        `<span class="badge bg-label-secondary me-1">@lang('general.not_activated')</span>`}
                    </td>
                    <td>
                        <x-dropdown-table>
                            <button class="dropdown-item edit_category" onclick="edit_sub_category(${item.id})" type="button" data-bs-toggle="modal" data-bs-target="#ModalEditSubCategory" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                                @lang('general.edit')
                            </button>
                            <button class="dropdown-item delete_category" onclick="delete_sub_category(${item.id})" type="button"  data-bs-toggle="modal"  data-bs-target="#ModalDeleteSubCategory" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                                 @lang('general.delete')
                            </button>
                            <button class="dropdown-item active_sub_category" type="button" onclick="active_sub_category(${item.id})" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
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
        el('#errorMsg').innerText   = '';
        renderAlert(response, type);
        els(modal + ' input').forEach(e => {
            e.value = '';
        });
        el(modal + ' .btn-close').click();
        fetchSubCategories();
    }

    //********* Render Alert  *********//
    let renderAlert = (response, type) => {
        // el('.alert div#span').innerHTML = '';

        el('.alert').style.display = 'block';
        el('.alert').classList.add(`alert-${type}`);
        el('.alert div#span').innerHTML = `<span> ${response.data.message} </span>`;
    }

</script>
