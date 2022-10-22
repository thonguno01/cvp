function edit(id) {
    var name = $('#name').val().trim();
    var gender = '';

    var radios = document.getElementsByName('gender');
    var flag = true;
    for (var i = 0, length = radios.length; i < length; i++) {
        if (radios[i].checked) {
            gender += radios[i].value;
            break;
        }
    }
    let data_json = {
        name: name,
        gender: gender,
        id: id,
    }
    let edit = callAjax('admin-edit-customer', 'post', data_json);
    if (edit.rs == true) {
        window.location = 'admin-list-customer';
    } else {
        window.location = window.location.pathname;
    }
}