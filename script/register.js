function form_validate() {
    let fullname = document.getElementById('fullname').value;
    let email = document.getElementById('email').value;
    let phone = document.getElementById('phone').value;
    let password = document.getElementById('password').value;
    let re_password = document.getElementById('re-password').value;
    let acept = document.getElementById('acept').checked;
    let flag = true; 

    var phoneformat = /^\d+/;
    var emailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    if (fullname == '') {
        document.getElementById('error_message_fullname').innerHTML = `<span class="error_message">Không được bỏ trống Họ và tên</span>`;
        document.getElementById('name_error').classList.add("color_error");
        document.getElementById('icon_error_fullname').innerHTML = ` <img src="../img/icon_error.svg" alt="Lỗi thông tin nhập vào">`;
        document.getElementById('fullname').style.border = "1px solid #F24236";;
        flag = false;
    }
    if (email == '') {
        document.getElementById('error_message_email').innerHTML = `<span class="error_message">Không được bỏ trống Email</span>`;
        document.getElementById('email_error').classList.add("color_error");
        document.getElementById('icon_error_email').innerHTML = ` <img src="../img/icon_error.svg" class="icon_error" alt="Lỗi thông tin nhập vào">`;
        document.getElementById('email').style.border = "1px solid #F24236";;
        flag = false;
    } else {
        if (!email.match(emailformat)) {
            document.getElementById('error_message_email').innerHTML = `<span class="error_message">Email Không đúng định dạng</span>`;
            document.getElementById('email_error').classList.add("color_error");
            document.getElementById('icon_error_email').innerHTML = ` <img src="../img/icon_error.svg" class="icon_error" alt="Lỗi thông tin nhập vào">`;
            document.getElementById('email').style.border = "1px solid #F24236";;
            flag = false;
        }
    }
    if (phone == '') {
        document.getElementById('error_message_phone').innerHTML = `<span class="error_message">Không được bỏ trống phone</span>`;
        document.getElementById('phone_error').classList.add("color_error");
        document.getElementById('icon_error_phone').innerHTML = ` <img src="../img/icon_error.svg" class="icon_error" alt="Lỗi thông tin nhập vào">`;
        document.getElementById('phone').style.border = "1px solid #F24236";;
        flag = false;
    } else {
        if (!phone.match(phoneformat)) {
            document.getElementById('error_message_phone').innerHTML = `<span class="error_message">Số điện thoại không đúng định dạng </span>`;
            document.getElementById('phone_error').classList.add("color_error");
            document.getElementById('icon_error_phone').innerHTML = ` <img src="../img/icon_error.svg" class="icon_error" alt="Lỗi thông tin nhập vào">`;
            document.getElementById('phone').style.border = "1px solid #F24236";;
            flag = false;
        }
    }
    if (password == '') {
        document.getElementById('error_message_password').innerHTML = `<span class="error_message">Không được bỏ trống mật khẩu</span>`;
        document.getElementById('password_error').classList.add("color_error");
        document.getElementById('icon_error_password').innerHTML = ` <img src="../img/icon_error.svg" class="icon_error" alt="Lỗi thông tin nhập vào">`;
        document.getElementById('password').style.border = "1px solid #F24236";;
        flag = false;
    } else {
        if (password.length < 6) {
            document.getElementById('error_message_password').innerHTML = `<span class="error_message">Mật khẩu dài từ 6 kí tự trở lên </span>`;
            document.getElementById('password_error').classList.add("color_error");
            document.getElementById('icon_error_password').innerHTML = ` <img src="../img/icon_error.svg" class="icon_error" alt="Lỗi thông tin nhập vào">`;
            document.getElementById('password').style.border = "1px solid #F24236";
            flag = false;
        }
    }
    if (re_password == '') {
        document.getElementById('error_message_re_password').innerHTML = `<span class="error_message">Không được bỏ trống Nhập lại mật khẩu </span>`;
        document.getElementById('re_password_error').classList.add("color_error");
        document.getElementById('icon_error_re_password').innerHTML = ` <img src="../img/icon_error.svg" class="icon_error" alt="Lỗi thông tin nhập vào">`;
        document.getElementById('re-password').style.border = "1px solid #F24236";;
        flag = false;
    } else {
        if (password != re_password) {
            document.getElementById('error_message_re_password').innerHTML = `<span class="error_message">Mật khẩu không giống mật khẩu trên!  </span>`;
            document.getElementById('re_password_error').classList.add("color_error");
            document.getElementById('icon_error_re_password').innerHTML = ` <img src="../img/icon_error.svg" class="icon_error" alt="Lỗi thông tin nhập vào">`;
            document.getElementById('re-password').style.border = "1px solid #F24236";;
            flag = false;
        }
    }
    if (flag == true) {
        if (acept == false) {
            alert('Bạn phải đồng ý với điều khoản của Vieclam123 để đưuọc đăng ký');
        } else {
            let data_json = { 
                name: fullname,
                email: email,
                password: password, 
                phone: phone,
            }
            $('#register').attr('disabled', 'disabled');
            let out = callAjax('/customer-register/save-customer', 'post', data_json);
            if (out.message == '') {
                window.location = out.result;
            } else {
                alert(out.message);
            }
        }
    }
}

function showPass() {
    let verify_code = document.getElementById('password');
    let check = verify_code.getAttribute('type').toString();
    let img_eye = document.getElementById('img_eyes');

    if (check == 'password') {
        img_eye.setAttribute('src', '../img/eye-slash.svg');
        verify_code.setAttribute("type", "text");
    } else {
        img_eye.setAttribute('src', '../img/Show-password.svg');
        verify_code.setAttribute("type", "password");
    }
}

function showRePass() {
    let verify_code = document.getElementById('re-password');
    let check = verify_code.getAttribute('type').toString();
    let img_eye = document.getElementById('img_eyes_repass');

    if (check == 'password') {
        img_eye.setAttribute('src', '../img/eye-slash.svg');
        verify_code.setAttribute("type", "text");
    } else {
        img_eye.setAttribute('src', '../img/Show-password.svg');
        verify_code.setAttribute("type", "password");
    }
}
$('#email').blur(() => {
    let email = $('#email').val();
    let phone = $('#phone').val();
    let name = $('#fullname').val();
    let data_json = {
        email: email,
        name: name,
        phone: phone,
    }
    let alert = callAjax('/customer-register/checkMail', 'post', data_json);
    if (alert.message != '') {
        document.getElementById('error_message_email').innerHTML = `<span class="error_message">` + alert.message + `</span>`;
        document.getElementById('icon_error_email').style.display = 'block';

        document.getElementById('email_error').classList.add("color_error");
        document.getElementById('icon_error_email').innerHTML = ` <img src="../img/icon_error.svg" class="icon_error" alt="Lỗi thông tin nhập vào">`;
        document.getElementById('email').style.border = "1px solid #F24236";
    } else {
        document.getElementById('error_message_email').innerHTML = ``;
        $('#email_error').removeClass("color_error");
        document.getElementById('icon_error_email').style.display = 'none';
        document.getElementById('email').style.border = "1px solid #C4C4C4";
    }
})
$('#phone').blur(() => {
    let email = $('#email').val();
    let phone = $('#phone').val();
    let name = $('#fullname').val();
    let data_json = {
        email: email,
        name: name,
        phone: phone,
    }
    let alert = callAjax('customer-register-error', 'post', data_json);
    console.log(alert);
    // if (alert.message != '') {
    //     document.getElementById('error_message_email').innerHTML = `<span class="error_message">` + alert.message + `</span>`;
    //     document.getElementById('icon_error_email').style.display = 'block';

    //     document.getElementById('email_error').classList.add("color_error");
    //     document.getElementById('icon_error_email').innerHTML = ` <img src="../img/icon_error.svg" class="icon_error" alt="Lỗi thông tin nhập vào">`;
    //     document.getElementById('email').style.border = "1px solid #F24236";
    // } else {
    //     document.getElementById('error_message_email').innerHTML = ``;
    //     $('#email_error').removeClass("color_error");
    //     document.getElementById('icon_error_email').style.display = 'none';
    //     document.getElementById('email').style.border = "1px solid #C4C4C4";
    // }
})