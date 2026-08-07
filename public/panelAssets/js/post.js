var save_btn = $('#m_login_signin_submit');
window.is_all_images_uploaded = true;

function getErrors(jqXhr, path) {
    switch (jqXhr.status) {
        case 401:
            $(location).prop('pathname', path);
            break;
        case 400:
            Toast.fire({ icon: 'error', title: jqXhr.responseJSON.message });
            break;
        case 422:
            var res = jqXhr.responseJSON;
            var error = res.msg || res.message || 'Validation Error';
            if (res.errors) {
                var list = [];
                for (var key in res.errors) {
                    if (res.errors.hasOwnProperty(key)) {
                        list.push(res.errors[key][0]);
                        $('[name="' + key + '"]').addClass('is-invalid');
                    }
                }
                if (list.length) error = list.join('<br>');
            }
            Toast.fire({ icon: 'error', title: error });
            break;
    }
    return false;
}
