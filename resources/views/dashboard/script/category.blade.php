<script>
    const els = (element) => document.querySelectorAll(element);
    const el  = (element) => document.querySelector(element);

    //********* Fetch Data From API *********//
    function fetchCategories() {
        axios.get('http://127.0.0.1:8000/api/dashboard/categories')
            .then(response => {
                renderTableContent(response);
            })
            .catch(error => console.error(error));
    }

    //********* Creat New Category *********//
    el('.add_category').addEventListener('click', async (e) => {
        e.preventDefault();

        const response = await axios
            .post('http://127.0.0.1:8000/api/dashboard/categories', {
                name_ar: el('#name_ar').value,
                name_en: el('#name_en').value,
            }, {
                headers: { 'Content-type': 'application/json; charset=UTF-8' }
            });

        if(response.data.status === 400) {
            renderMsgError(response.data, '#ModalAddCategory');
        }
        else {
            renderMsgSuccess(response.data, '#ModalAddCategory', 'primary');
        }
    });

    //********* Edit Category *********//
    async function edit_category(id) {

        let category_id = id;

        await axios
            .get(`http://127.0.0.1:8000/api/dashboard/categories/${category_id}`, {
                name_ar: el('#name_ar').value,
                name_en: el('#name_en').value,
            }, {
                headers: {'Content-type': 'application/json; charset=UTF-8'}
            })
            .then(response => {
                if (response.status === 404) {
                    renderMsgError(response.data);
                    el('#ModalEditCategory .btn-close').click();
                } else {
                    el('#ModalEditCategory #name_ar').value = response.data.category.name;
                    el('#ModalEditCategory #name_en').value = response.data.category.name;
                    el('#ModalEditCategory #category_id').value = category_id;
                }
            })
            .catch(error => console.error(error));
    }

    //********* Update Category *********//
    el('#update_category').addEventListener('click', async (e) => {
        e.preventDefault();
        let category_id = el('#ModalEditCategory #category_id').value;

        await axios
            .put(`http://127.0.0.1:8000/api/dashboard/categories/${category_id}`, {
                name_ar: el('#ModalEditCategory #name_ar').value,
                name_en: el('#ModalEditCategory #name_en').value,
                _method: 'PUT'
            }, {
                headers: {'Content-type': 'application/json; charset=UTF-8'}
            })
            .then(response => {
                if (response.data.status === 400) {
                    console.log(response.data)
                    renderMsgError(response.data, '#ModalEditCategory');
                } else {
                    console.log(response.data)
                    renderMsgSuccess(response.data, '#ModalEditCategory', 'primary');
                }
            })
            .catch(error => console.error(error));
    })

    //********* Delete Category *********//
    async function delete_category(id) {
        el('#ModalDeleteCategory #category_id').value = id;
    }

    //********* Delete Category *********//
    el('#delete_category').addEventListener('click', async (e) => {
        e.preventDefault();
        let category_id = el('#ModalDeleteCategory #category_id').value;

        await axios
            .delete(`http://127.0.0.1:8000/api/dashboard/categories/${category_id}`,{
                headers: {'Content-type': 'application/json; charset=UTF-8'}
            })
            .then(response => {
                if (response.status === 404) {
                    renderMsgSuccess(response, '#ModalDeleteCategory', 'danger');
                } else {
                    renderMsgSuccess(response, '#ModalDeleteCategory', 'primary');
                }
            })
            .catch(error => console.error(error));
    })


    //********* Activate Category *********//
    async function active_category(id) {

        await axios
            .get(`http://127.0.0.1:8000/api/dashboard/categories/activate/${id}`, {
                headers: {'Content-type': 'application/json; charset=UTF-8'}
            })
            .then(response => {
                if (response.status === 404) {
                    renderAlert(response, 'danger');
                    fetchCategories();
                } else {
                    renderAlert(response, 'primary');
                    fetchCategories();
                }
            })
            .catch(error => console.error(error));
    }

    //********* get id from add branch modal *********//
    function add_branch(id){
        el('#ModalAddBranch #category_id').value = id;
    }

    //********* Creat New Sub Category(Branch) *********//
    el('.add_branch').addEventListener('click', async (e) => {
        e.preventDefault();

        const response = await axios
            .post('http://127.0.0.1:8000/api/dashboard/categories', {
                name_ar: el('#ModalAddBranch #name_ar').value,
                name_en: el('#ModalAddBranch #name_en').value,
                category_id: el('#ModalAddBranch #category_id').value
            }, {
                headers: { 'Content-type': 'application/json; charset=UTF-8' }
            });

        if(response.data.status === 400) {
            renderMsgError(response.data, '#ModalAddBranch');
        }
        else {
            renderMsgSuccess(response.data, '#ModalAddBranch', 'primary');
        }
    });

    //********* Render Table Content With Data *********//
    let renderTableContent = (response) => {
        el('.table-categories table tbody').innerHTML = '';

        response.data.forEach(item => {
            el('.table-categories table tbody')
                .insertRow().innerHTML =
                `<tr>
                    <td><strong> ${item.id} </strong></td>
                    <td> ${item.name} -
                        <span class="text-primary"> (${item.is_branch ? `@lang('index.service_category.type_branch')` : `@lang('index.service_category.type_category')`}) </span>
                    </td>
                    <td> ${item.is_branch ? item.parent.name : `___`} </td>
                    <td> ${item.created_at} </td>
                    <td> ${item.is_active ?
                        `<span class="badge bg-label-primary me-1">@lang('general.activated')</span>` :
                        `<span class="badge bg-label-secondary me-1">@lang('general.not_activated')</span>`}
                    </td>
                    <td>
                        <x-dropdown-table>
                            @can('category-edit')
                                ${item.is_branch ? `` :
                                `<button class="dropdown-item active_category" type="button" onclick="add_branch(${item.id})" type="button"  data-bs-toggle="modal"  data-bs-target="#ModalAddBranch" href="javascript:void(0);"><i class="tf-icons bx bx-plus"></i>
                                        @lang('index.service_category.add_branch')
                                </button>`}
                                 <button class="dropdown-item edit_category" onclick="edit_category(${item.id})" type="button" data-bs-toggle="modal" data-bs-target="#ModalEditCategory" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                                       @lang('general.edit')
                                </button>
                            @endcan
                            @can('category-delete')
                                <button class="dropdown-item delete_category" onclick="delete_category(${item.id})" type="button"  data-bs-toggle="modal"  data-bs-target="#ModalDeleteCategory" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                                     @lang('general.delete')
                                </button>
                                <button class="dropdown-item active_category" type="button" onclick="active_category(${item.id})" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                                    ${item.is_active ? `@lang('general.deactivation')` : `@lang('general.active')`}
                                </button>
                            @endcan
                        </x-dropdown-table>
                    </td>
                </tr>`
        });
    }

    //********* Render Message Errors *********//
    let renderMsgError = (response, modal) => {
        Object.keys(response.errors)
            .forEach(key => {
                key === 'name_ar' ?
                    el(modal+' #name_error_ar').innerHTML = `${response.errors[key]}` : '';
                key === 'name_en' ?
                    el(modal+' #name_error_en').innerHTML = `${response.errors[key]}` : '';
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
        fetchCategories();
    }

    //********* Render Alert  *********//
    let renderAlert = (response, type) => {
        // el('.alert div#span').innerHTML = '';

        el('.alert').style.display = 'block';
        el('.alert').classList.add(`alert-${type}`);
        el('.alert div#span').innerHTML = `<span> ${response.message} </span>`;
    }

</script>
