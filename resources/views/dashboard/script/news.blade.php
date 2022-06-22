<script>
    const els = (element) => document.querySelectorAll(element);
    const el  = (element) => document.querySelector(element);

    //********* Render Table Content With Data *********//
    let renderTableContent = (response) => {
        el('.table-news table tbody').innerHTML = '';

        response.data.forEach(item => {
            el('.table-news table tbody')
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
                            <button class="dropdown-item" onclick="edit_news(${item.id})" type="button" data-bs-toggle="modal" data-bs-target="#ModalEditNews" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                                @lang('general.edit')
                            </button>
                            <button class="dropdown-item" onclick="delete_news(${item.id})" type="button"  data-bs-toggle="modal"  data-bs-target="#ModalDeleteNews" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                                 @lang('general.delete')
                            </button>
                            <button class="dropdown-item" type="button" onclick="active_news(${item.id})" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                                ${item.is_active ? `@lang('general.deactivation')` : `@lang('general.active')`}
                            </button>
                        </x-dropdown-table>
                    </td>
                </tr>`
        });
    }

    //********* Render Message Errors *********//
    let renderMsgError = (response) => {
        Object.keys(response.errors)
        .forEach(key => {
            key === 'title_ar' ?
                el('#title_error_ar').innerHTML = `${response.errors[key]}` : '';
            key === 'title_en' ?
                el('#title_error_en').innerHTML = `${response.errors[key]}` : '';
            key === 'desc_ar' ?
                el('#desc_error_ar').innerHTML = `${response.errors[key]}` : '';
            key === 'desc_en' ?
                el('#desc_error_en').innerHTML = `${response.errors[key]}` : '';
            key === 'background' ?
                el('#background_error').innerHTML = `${response.errors[key]}` : '';
            key === 'image' ?
                el('#image_error').innerHTML = `${response.errors[key]}` : '';
        });
    }

    //********* Render Alert  *********//
    let renderAlert = (response, type) => {
        // el('.alert div#span').innerHTML = '';

        el('.alert').style.display = 'block';
        el('.alert').classList.add(`alert-${type}`);
        el('.alert div#span').innerHTML = `<span> ${response.message} </span>`;
    }

    //********* Render Message Successful *********//
    let renderMsgSuccess = (response, modal, type) => {
        el('#errorMsg').innerText   = '';
        renderAlert(response, type);
        els(modal + ' input').forEach(e => {
            e.value = '';
        });
        el(modal + ' .btn-close').click();
        fetchNews();
    }

    fetchNews();

    //********* Fetch Data From API *********//
    function fetchNews() {
        axios.get('http://127.0.0.1:8000/api/dashboard/news')
            .then(response => {
                renderTableContent(response);
                // console.log(response)
            })
            .catch(error => console.error(error));
    }

    //********* Creat New news *********//
    el('.add_news').addEventListener('click', async (e) => {

        e.preventDefault();

        let formData = new FormData();

        formData.append('title_ar', el('#title_ar').value);
        formData.append('title_en', el('#title_en').value);
        formData.append('desc_ar', el('#desc_ar').value);
        formData.append('desc_en', el('#desc_en').value);
        formData.append('background', el('#background').files[0]);
        formData.append('image', el('#image').files[0]);


        console.log(formData)

        const response = await axios
            .post('http://127.0.0.1:8000/api/dashboard/news', formData, {
                headers: { "Content-Type": "multipart/form-data; charset=UTF-8"} });

        if(response.data.status === 400) {
            console.log(response.data.errors)
            renderMsgError(response.data);
        }
        else {
            console.log(response.data)
            renderMsgSuccess(response.data, '#ModalAddNews', 'primary');
        }
    });

    //********* Edit News *********//
    async function edit_news(id) {

        let news_id = id;
        console.log(news_id)

        await axios
            .get(`http://127.0.0.1:8000/api/dashboard/news/${news_id}`, {
                title_ar: el('#title_ar').value,
                title_en: el('#title_en').value,
                desc_ar: el('#desc_ar').value,
                desc_en: el('#desc_en').value,
                background: el('#background').value,
                image: el('#image').value
            }, {
                headers: {'Content-type': 'application/json; charset=UTF-8'}
            })
            .then(response => {
                if (response.status === 404) {
                    renderMsgError(response);
                    el('#ModalEditNews .btn-close').click();
                } else {
                    el('#ModalEditNews #title_ar').value = response.data.news.title;
                    el('#ModalEditNews #title_en').value = response.data.news.title;
                    el('#ModalEditNews #desc_ar').value = response.data.news.desc;
                    el('#ModalEditNews #desc_en').value = response.data.news.desc;
                    el('#ModalEditNews #background').value = response.data.news.background;
                    el('#ModalEditNews #image').value = response.data.news.image;

                    el('#ModalEditNews #news_id').value = news_id;
                }
            })
            .catch(error => console.error(error));
    }

    //********* Update News *********//
    el('#update_news').addEventListener('click', async (e) => {
        e.preventDefault();
        let news_id = el('#ModalEditNews #news_id').value;

        console.log(news_id)

        await axios
            .put(`http://127.0.0.1:8000/api/dashboard/news/${news_id}`, {
                title_ar: el('#ModalEditNews #title_ar').value,
                title_en: el('#ModalEditNews #title_en').value,
                desc_ar: el('#ModalEditNews #desc_ar').value,
                desc_en: el('#ModalEditNews #desc_en').value,
                background: el('#ModalEditNews #background').value,
                image: el('#ModalEditNews #image').value,
                _method: 'PUT'
            }, {
                headers: {'Content-type': 'application/json; charset=UTF-8'}
            })
            .then(response => {
                if (response.status === 400) {
                    renderMsgError(response);
                } else {
                    renderMsgSuccess(response, '#ModalEditNews', 'primary');
                }
            })
            .catch(error => console.error(error));
    })

    //********* Delete News *********//
    async function delete_news(id) {
        el('#ModalDeleteNews #news_id').value = id;
    }

    //********* Delete news *********//
    el('#delete_news').addEventListener('click', async (e) => {
        e.preventDefault();
        let news_id = el('#ModalDeleteNews #news_id').value;

        await axios
            .delete(`http://127.0.0.1:8000/api/dashboard/news/${news_id}`,{
                headers: {'Content-type': 'application/json; charset=UTF-8'}
            })
            .then(response => {
                if (response.status === 404) {
                    renderMsgSuccess(response, '#ModalDeleteNews', 'danger');
                } else {
                    renderMsgSuccess(response, '#ModalDeleteNews', 'primary');
                }
            })
            .catch(error => console.error(error));
    })


    //********* Activate news *********//
    async function active_news(id) {

        await axios
            .get(`http://127.0.0.1:8000/api/dashboard/news/activate/${id}`, {
                headers: {'Content-type': 'application/json; charset=UTF-8'}
            })
            .then(response => {
                if (response.status === 404) {
                    renderAlert(response, 'danger');
                    fetchNews();
                } else {
                    renderAlert(response, 'primary');
                    fetchNews();
                }
            })
            .catch(error => console.error(error));
    }

</script>
