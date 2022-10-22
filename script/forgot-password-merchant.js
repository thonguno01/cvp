function form_validate() {
    let email = document.getElementById('email').value;
    let flag = true;
    var emailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (email == '') {
        document.getElementById('error_message_email').innerHTML = `<span class="error_message">Không được bỏ trống Email</span>`;
        document.getElementById('email_error').classList.add("color_error");
        document.getElementById('icon_error_email').innerHTML = ` <img src="../img/icon_error.svg" class="icon_error" alt="Lỗi thông tin nhập vào">`;
        document.getElementById('email').style.border = "1px solid #F24236";
        flag = false; 
    } else {
        if (!email.match(emailformat)) {
            document.getElementById('error_message_email').innerHTML = `<span class="error_message">Email Không đúng định dạng</span>`;
            document.getElementById('email_error').classList.add("color_error");
            document.getElementById('icon_error_email').innerHTML = ` <img src="../img/icon_error.svg" class="icon_error" alt="Lỗi thông tin nhập vào">`;
            document.getElementById('email').style.border = "1px solid #F24236";
            flag = false;
        } else {
            document.getElementById('error_message_email').innerHTML = ``;
            document.getElementById('email_error').classList.remove('color_error');
            document.getElementById('icon_error_email').innerHTML = ``;
            document.getElementById('email').style.border = "1px solid #C4C4C4";
        }
    }
    if (flag == true) {
        $('.btn-forgot-pass').attr('disabled', 'disabled');
        let data_json = {
            email: email,
        }
        let redirect = callAjax('merchant-forgot-password/sendOtp', 'post', data_json);
        if (redirect.message == '') {
            window.location = redirect.redirect;
            alert("Kiểm tra Email của bạn và nhập mã OTP");
            console.log(redirect);
        } else {
            alert(redirect.message)
        }
    }
}
$('#email').blur(() => {
    let email = $('#email').val();
    let data_json = {
        email: email,
    }
    let message = callAjax('/merchant-forgot-password/checkMail', 'post', data_json);

    if (message == '') {
        document.getElementById('error_message_email').innerHTML = `<span class="error_message">Không tồn tại trên hệ thống!</span>`;
        document.getElementById('email_error').classList.add("color_error");
        document.getElementById('icon_error_email').innerHTML = ` <img src="../img/icon_error.svg" class="icon_error" alt="Lỗi thông tin nhập vào">`;
        document.getElementById('email').style.border = "1px solid #F24236";
    } else {
        document.getElementById('error_message_email').innerHTML = ``;
        document.getElementById('email_error').classList.remove('color_error');
        document.getElementById('icon_error_email').innerHTML = ``;
        document.getElementById('email').style.border = "1px solid #C4C4C4";
    }
})