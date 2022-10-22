function showPass() {
    let verify_code = document.getElementById('veryfi-code');
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

function showPass1() {
    let verify_code = document.getElementById('password');
    let check = verify_code.getAttribute('type').toString();
    let img_eye = document.getElementById('img_eyes_pass');

    if (check == 'password') {
        img_eye.setAttribute('src', '../img/eye-slash.svg');
        verify_code.setAttribute("type", "text");
    } else {
        img_eye.setAttribute('src', '../img/Show-password.svg');
        verify_code.setAttribute("type", "password");
    }
}

function showPass2() {
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

function form_validate() {
    let password = document.getElementById('password').value;
    let re_password = document.getElementById('re-password').value;
    let verify_code = document.getElementById('veryfi-code').value;
    let flag = true;
    if (verify_code == '') {
        document.getElementById('error_message_veryfi_code').innerHTML = `<span class="error_message">Không được bỏ trống mật khẩu</span>`;
        document.getElementById('verify_code_error').classList.add("color_error");
        document.getElementById('icon_error_veryfi_code').innerHTML = ` <img src="../img/icon_error.svg" class="icon_error" alt="Lỗi thông tin nhập vào">`;
        document.getElementById('veryfi-code').style.border = "1px solid #F24236";;
        flag = false;
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
        let data_json = {
            password: password,
        }
        let message = callAjax('merchant-change-password-success', 'post', data_json);
        if (message.link != '') {
            window.location = message.link;
            alert('Đổi mật khẩu thành công! ');
        } else {
            alert('Đổi mật khẩu không thành công! ');
        }
    }
}
// check nhập otp
$('#veryfi-code').blur(() => {
    let otp = $('#veryfi-code').val();
    let data_json = {
        otp: otp,
    }
    let checkOTP = callAjax('/merchant-change-password/checkOtp', 'post', data_json);
    if (checkOTP.message != '') {
        document.getElementById('error_message_veryfi_code').innerHTML = `<span class="error_message">` + checkOTP.message + `</span>`;
        document.getElementById('verify_code_error').classList.add("color_error");
        document.getElementById('icon_error_veryfi_code').innerHTML = ` <img src="../img/icon_error.svg" class="icon_error" alt="Lỗi thông tin nhập vào">`;
        document.getElementById('veryfi-code').style.border = "1px solid #F24236";;
    } else {
        document.getElementById('error_message_veryfi_code').innerHTML = ``;
        document.getElementById('verify_code_error').classList.remove('color_error');
        document.getElementById('icon_error_veryfi_code').innerHTML = ``;
        document.getElementById('veryfi-code').style.border = "1px solid #C4C4C4";
    }
});
// Gửi lại mã xác thực 
$('#new-otp').click(() => {
    let reSendOtp = callAjax('merchant-change-password/resendOtp', 'post', '');
    $('#new-otp').attr('disabled', 'disabled');
    // if (reSendOtp.result == 'TRUE') {
        alert('Quý khách vui lòng vào mail để lấy mã otp');
    // };
});