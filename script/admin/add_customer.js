function submit() {
    var name = $('#name').val().trim();
    var email = $('#email').val().trim();
    var password = $('#password').val().trim();
    var phone = $('#phone').val().trim();
    var address = $('#address').val().trim();
    let regex = new RegExp("^.*(?=.{6,})(?=.*[a-z])(?=.*[a-z])(?=.*[0-9])[a-zA-Z0-9@#$%^&+=]*$");
    var gender = '';

    var radios = document.getElementsByName('gender');
    var flag = true;
    for (var i = 0, length = radios.length; i < length; i++) {
        if (radios[i].checked) {
            gender += radios[i].value;
            break;
        }
    }
    if (password == '') {
        $('#errorPass').html(`<div class="alert alert-danger"  role="alert">Bạn không được bỏ trống mật khẩu </div>`);
        flag = false
    } else {
        if (!password.match(regex)) {
            $('#errorPass').html(`<div class="alert alert-danger"  role="alert">Mật khẩu tối thiểu 6 ký tự bao gồm chữ và số .`)
            flag = false

        } else {
            $('#errorPass').html('')
        }
    }
    if (email == '') {
        $('#errorEmail').html(`<div class="alert alert-danger"  role="alert">Bạn không được bỏ trống email</div>`);
    } else {
        let alert = callAjax('customer-register/checkMail', 'post', { email: email });
        if (alert.message != '') {
            $('#errorEmail').html(`<div class="alert alert-danger"  role="alert">` + alert.message + `</div>`);
            flag = false

        } else {
            $('#errorEmail').html('');
        }
    }
    if (flag == true) {
        let data_json = {
            name: name,
            email: email,
            phone: phone,
            address: address,
            gender: gender,
            password: password,
        }
        let insert = callAjax('admin-new-customer', 'post', data_json);
        if (insert.rs == true) {
            window.location = insert.message;
        } else {
            alert('Thêm không thành công ');
        }
    }
}