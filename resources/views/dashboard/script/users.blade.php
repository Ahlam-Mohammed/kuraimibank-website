<script>
    const els = (element) => document.querySelectorAll(element);
    const el  = (element) => document.querySelector(element);

    //********* Render Table Content With Data *********//
    let renderTableContent = (response) => {
        el('.table-users table tbody').innerHTML = '';

        response.data.forEach(item => {
            el('.table-users table tbody')
                .insertRow().innerHTML =
                `<tr>
                    <td><strong> ${item.id} </strong></td>
                    <td> ${item.name} </td>
                    <td> ${item.email} </td>
                    <td>  </td>
                    <td> ${item.created_at} </td>
                    <td> ${item.is_active ?
                    `<span class="badge bg-label-primary me-1">@lang('general.activated')</span>` :
                    `<span class="badge bg-label-secondary me-1">@lang('general.not_activated')</span>`}
                    </td>
                    <td>
                        <x-dropdown-table>
                            <button class="dropdown-item" onclick="edit_user(${item.id})" type="button" data-bs-toggle="modal" data-bs-target="#ModalEditUser" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                                @lang('general.edit')
                            </button>
                            <button class="dropdown-item" onclick="delete_user(${item.id})" type="button"  data-bs-toggle="modal"  data-bs-target="#ModalDeleteUser" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                                @lang('general.delete')
                            </button>
                            <button class="dropdown-item" type="button" onclick="active_user(${item.id})" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                                ${item.is_active ? `@lang('general.deactivation')` : `@lang('general.active')`}
                            </button>
                        </x-dropdown-table>
                    </td>
                </tr>`
        });
    }

    //********* Render Message Errors *********//
    let renderMsgError = (response, modal) => {
        Object.keys(response.errors)
            .forEach(key => {
                key === 'name' ?
                    el(modal + ' #name_error').innerHTML = `${response.errors[key]}` : '';
                key === 'email' ?
                    el(modal + ' #email_error').innerHTML = `${response.errors[key]}` : '';
                key === 'password' ?
                    el(modal + ' #password_error').innerHTML = `${response.errors[key]}` : '';
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

    fetchUsers();

    //********* Fetch Data From API *********//
    function fetchUsers() {
        axios.get('http://127.0.0.1:8000/api/dashboard/users')
            .then(response => {
                renderTableContent(response);
                console.log(response)
            })
            .catch(error => console.error(error));
    }

    //********* Creat New User *********//
    el('.add_user').addEventListener('click', async (e) => {
        e.preventDefault();

        const response = await axios
            .post('http://127.0.0.1:8000/api/dashboard/users', {
                name: el('#name').value,
                email: el('#email').value,
                password: el('#password').value,

            }, {
                headers: { 'Content-type': 'application/json; charset=UTF-8' }
            });

        if(response.data.status === 400) {
            renderMsgError(response.data, '#ModalAddRate');
        }
        else {
            renderMsgSuccess(response, '#ModalAddRate', 'primary');
        }
    });

    //********* Edit User *********//
    async function edit_user(id) {

        let user_id = id;

        await axios
            .get(`http://127.0.0.1:8000/api/dashboard/users/${user_id}`, {
                name: el('#name').value,
                email: el('#email').value,
                password: el('#password').value,
            }, {
                headers: {'Content-type': 'application/json; charset=UTF-8'}
            })
            .then(response => {
                if (response.status === 404) {
                    renderMsgError(response);
                    el('#ModalEditRate .btn-close').click();
                } else {
                    el('#ModalEditRate #name').value = response.data.user.name;
                    el('#ModalEditRate #email').value = response.data.user.email;
                    el('#ModalEditRate #user_id').value = user_id;
                }
            })
            .catch(error => console.error(error));
    }

    //********* Update User *********//
    el('#update_user').addEventListener('click', async (e) => {
        e.preventDefault();
        let user_id = el('#ModalEditUser #user_id').value;

        await axios
            .put(`http://127.0.0.1:8000/api/dashboard/users/${user_id}`, {
                name: el('#ModalEditUser #name').value,
                email: el('#ModalEditUser #email').value,
                _method: 'PUT'
            }, {
                headers: {'Content-type': 'application/json; charset=UTF-8'}
            })
            .then(response => {
                if (response.data.status === 400) {
                    renderMsgError(response.data, '#ModalEditUser');
                } else {
                    renderMsgSuccess(response, '#ModalEditUser', 'primary');
                }
            })
            .catch(error => console.error(error));
    })

    //********* Delete User *********//
    async function delete_user(id) {
        el('#ModalDeleteUser #user_id').value = id;
    }

    //********* Delete User *********//
    el('#delete').addEventListener('click', async (e) => {
        e.preventDefault();
        let user_id = el('#ModalDeleteUser #user_id').value;

        console.log(user_id)

        // await axios
        //     .delete(`http://127.0.0.1:8000/api/dashboard/users/${user_id}`,{
        //         headers: {'Content-type': 'application/json; charset=UTF-8'}
        //     })
        //     .then(response => {
        //         if (response.status === 404) {
        //             renderMsgSuccess(response, '#ModalDeleteUser', 'danger');
        //         } else {
        //             renderMsgSuccess(response, '#ModalDeleteUser', 'primary');
        //         }
        //     })
        //     .catch(error => console.error(error));
    })


    //********* Activate User *********//
    async function active_user(id) {

        await axios
            .get(`http://127.0.0.1:8000/api/dashboard/users/activate/${id}`, {
                headers: {'Content-type': 'application/json; charset=UTF-8'}
            })
            .then(response => {
                if (response.status === 404) {
                    renderAlert(response, 'danger');
                    fetchUsers();
                } else {
                    renderAlert(response, 'primary');
                    fetchUsers();
                }
            })
            .catch(error => console.error(error));
    }

</script>
