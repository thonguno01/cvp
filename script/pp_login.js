// var capch1 = $('.text-capcha1').text();

var capchaRandom = randomString(6);
$('.text-capcha1').text(capchaRandom);
$('#refresh-capcha').click(() => {
    var capchaRandom1 = randomString(6);
    $('.text-capcha1').text(capchaRandom1);
})

function showPass() {
    let password = document.getElementById('password');
    let check = password.getAttribute('type').toString();
    let img_eye = document.getElementById('img_eyes');

    if (check == 'password') {
        img_eye.setAttribute('src', '../img/eye-slash.svg');
        password.setAttribute("type", "text");
    } else {
        img_eye.setAttribute('src', '../img/Show-password.svg');
        password.setAttribute("type", "password");
    }
}

function form_validate() {
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    let capcha = document.getElementById('code-capch').value;
    let miss_pass = $('#miss_pass').checked;
    var emailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    let flag = true;
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
        } else {
            document.getElementById('error_message_email').innerHTML = ``;
            $('#email_error').removeClass("color_error");
            document.getElementById('icon_error_email').innerHTML = ``;
            document.getElementById('email').style.border = "1px solid #C4C4C4";;
        }
    }
    if (password == '') {
        document.getElementById('error_message_password').innerHTML = `<span class="error_message">Không được bỏ trống mật khẩu</span>`;
        document.getElementById('password_error').classList.add("color_error");
        document.getElementById('icon_error_password').innerHTML = ` <img src="../img/icon_error.svg" class="icon_error" alt="Lỗi thông tin nhập vào">`;
        document.getElementById('password').style.border = "1px solid #F24236";;
        flag = false;
    } else {
        document.getElementById('error_message_password').innerHTML = ``;
        $('#password_error').removeClass("color_error");
        document.getElementById('icon_error_password').innerHTML = ``;
        document.getElementById('password').style.border = "1px solid #C4C4C4";;
    }
    if (capcha == '') {
        document.getElementById('error_message_capcha').innerHTML = `<span class="error_message">Không được bỏ trống mật khẩu</span>`;
        document.getElementById('error_code_capcha').classList.add("color_error");
        document.getElementById('icon_error_capcha').innerHTML = ` <img src="../img/icon_error.svg" class="icon_error" alt="Lỗi thông tin nhập vào">`;
        document.getElementById('code-capch').style.border = "1px solid #F24236";;
        flag = false;
    } else {
        let input_capcha = $('#code-capch').val().toString();
        let rand_capcha = $('.text-capcha1').text().toString();
        if (input_capcha != rand_capcha) {
            document.getElementById('error_message_capcha').innerHTML = `<span class="error_message">Nhập mã capcha không đúng</span>`;
            document.getElementById('error_code_capcha').classList.add("color_error");
            document.getElementById('icon_error_capcha').innerHTML = ` <img src="../img/icon_error.svg" class="icon_error" alt="Lỗi thông tin nhập vào">`;
            document.getElementById('code-capch').style.border = "1px solid #F24236";
            flag = false;
        } else {
            document.getElementById('error_message_capcha').innerHTML = ``;
            $('#error_code_capcha').removeClass("color_error");
            document.getElementById('icon_error_capcha').style.display = 'none';
            document.getElementById('code-capch').style.border = "1px solid #C4C4C4";
        }
    }
    if (flag == true) {
        let data_json = {
            email: email,
            password: password,
            miss_pass: miss_pass,
        }
        let checkLogin = callAjax('/customer-login-success', 'post', data_json);
        if (checkLogin.mes == 'customer-home') {
            // $(".load").html("<div style='display: flex;justify-content: center;position: fixed;align-items: center;width: 100%;height: 100%;top: 0;background: linear-gradient(0deg, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url(image.png);overflow: auto;'><div style='width: 250px;height: 250px;background: url(../img/e03680a71b8bfff4ce0163077d30b5cf.gif) no-repeat;background-position: center;background-size: 100%;border-radius: 30px;'></div></div>");
            // setTimeout(function() {
            window.location.reload();
            // }, 3000);
        } else {
            if (checkLogin.redirect != null) {
                window.location = checkLogin.redirect;
            } else {
                alert(checkLogin.mes);
            }
        }
    }
}
$('#code-capch').blur(() => {
    let input_capcha = $('#code-capch').val().toString();
    let rand_capcha = $('.text-capcha1').text().toString();
    if (input_capcha != rand_capcha) {
        document.getElementById('error_message_capcha').innerHTML = `<span class="error_message">Nhập mã capcha không đúng</span>`;
        document.getElementById('error_code_capcha').classList.add("color_error");
        document.getElementById('icon_error_capcha').innerHTML = ` <img src="../img/icon_error.svg" class="icon_error" alt="Lỗi thông tin nhập vào">`;
        document.getElementById('code-capch').style.border = "1px solid #F24236";
    } else {
        document.getElementById('error_message_capcha').innerHTML = ``;
        $('#error_code_capcha').removeClass("color_error");
        document.getElementById('icon_error_capcha').style.display = 'none';
        document.getElementById('code-capch').style.border = "1px solid #C4C4C4";
    }
});

$('.cancle_popup').click(() => {
    $('.popup_login').removeClass('d-block')
});