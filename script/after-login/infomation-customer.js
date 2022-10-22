var width = screen.width;
$(".change-pass").hover(function() {
    this.querySelector('#refresh_pass').innerHTML = ` <img src="../img/refresh-white.svg"  alt="Refresh mật khẩu">`;

}, function() {
    this.querySelector('#refresh_pass').innerHTML = ` <img src="../img/refresh.svg"  alt="Refresh mật khẩu">`;

});

function showPass() {
    let pass = document.getElementById('password');
    let check = pass.getAttribute('type').toString();
    let img_eye = document.getElementById('img_eyes_pass');
    if (check == 'password') {
        img_eye.setAttribute('src', '../img/eye-slash.svg');
        pass.setAttribute("type", "text");
    } else {
        img_eye.setAttribute('src', '../img/Show-password.svg');
        pass.setAttribute("type", "password");
    }
};

function changePass() {
    $('.change-pass-new').css('display', 'none');
    $('.change-pass').css('display', 'none');
    var render = `  <div class="form-group">
   <label for="password" id="password_error"> Nhập mật khẩu mới<span class="star_red">*</span>
   </label>

   <div class="input">
       <div class="relative">
           <input type="password" name="    passnew" id="passwordNew" placeholder="Nhập mật khẩu mới">
           <img src="../img/Show-password.svg" onclick="return showPass1();" id="img_eyes_password" class="show-verify" alt="Ấn để xem mã xác thực ">
       </div>

       <div id="icon_error_password">
           <!-- <img src="../img/icon_error.svg" alt=""> -->
       </div>
   </div>
   <span class="color_red" id="error_message_password">
       <!-- <span class="error_message">Không được bỏ trống Mật Khẩu </span> -->
   </span>
</div>
<div class="form-group">
   <label for="re-password" id="re_password_error"> Nhập lại mật khẩu mới<span class="star_red">*</span>
   </label>
   <div class="input">
       <div class="relative">
           <input type="password" name="repassnew" id="re-password" placeholder="Nhập lại mật khẩu mới">
           <img src="../img/Show-password.svg" onclick="return showPass2();" id="img_eyes_repassword" class="show-verify" alt="Ấn để xem mã xác thực ">
       </div>
       <div id="icon_error_re_password">
           <!-- <img src="../img/icon_error.svg" alt=""> -->
       </div>
   </div>
   <span class="color_red" id="error_message_re_password">
       <!-- <span class="error_message">Không được bỏ trống Nhập lại mật khẩu</span> -->
   </span>
</div>`
    if (width <= 480) {
        $('.change-pass-new').css('display', 'none');
    }
    $('.change-password').append(render);
    // $('.save').click(() => {
    //     let name = $('#fullname').val();
    //     let password = document.getElementById('passwordNew').value;
    //     let re_password = document.getElementById('re-password').value;
    //     let flag = true;
    //     // if(password == )
    //     if (password == '') {
    //         document.getElementById('error_message_password').innerHTML = `<span class="error_message">Không được bỏ trống mật khẩu</span>`;
    //         document.getElementById('password_error').classList.add("color_error");
    //         document.getElementById('icon_error_password').innerHTML = ` <img src="../img/icon_error.svg" class="icon_error" alt="Lỗi thông tin nhập vào">`;
    //         document.getElementById('passwordNew').style.border = "1px solid #F24236";;
    //         flag = false;
    //     } else {
    //         if (password.length < 6) {
    //             document.getElementById('error_message_password').innerHTML = `<span class="error_message">Mật khẩu dài từ 6 kí tự trở lên </span>`;
    //             document.getElementById('password_error').classList.add("color_error");
    //             document.getElementById('icon_error_password').innerHTML = ` <img src="../img/icon_error.svg" class="icon_error" alt="Lỗi thông tin nhập vào">`;
    //             document.getElementById('password').style.border = "1px solid #F24236";
    //             flag = false;
    //         }
    //     }
    //     if (re_password == '') {
    //         document.getElementById('error_message_re_password').innerHTML = `<span class="error_message">Không được bỏ trống Nhập lại mật khẩu </span>`;
    //         document.getElementById('re_password_error').classList.add("color_error");
    //         document.getElementById('icon_error_re_password').innerHTML = ` <img src="../img/icon_error.svg" class="icon_error" alt="Lỗi thông tin nhập vào">`;
    //         document.getElementById('re-password').style.border = "1px solid #F24236";;
    //         flag = false;
    //     } else {
    //         if (password != re_password) {
    //             document.getElementById('error_message_re_password').innerHTML = `<span class="error_message">Mật khẩu không giống mật khẩu trên!  </span>`;
    //             document.getElementById('re_password_error').classList.add("color_error");
    //             document.getElementById('icon_error_re_password').innerHTML = ` <img src="../img/icon_error.svg" class="icon_error" alt="Lỗi thông tin nhập vào">`;
    //             document.getElementById('re-password').style.border = "1px solid #F24236";;
    //             flag = false;
    //         }
    //     }
    //     if (flag == true) {

    //     }
    // })
}

function showPass1() {
    let verify_code = document.getElementById('passwordNew');
    let check = verify_code.getAttribute('type').toString();
    let img_eye = document.getElementById('img_eyes_password');

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
    let img_eye = document.getElementById('img_eyes_repassword');

    if (check == 'password') {
        img_eye.setAttribute('src', '../img/eye-slash.svg');
        verify_code.setAttribute("type", "text");
    } else {
        img_eye.setAttribute('src', '../img/Show-password.svg');
        verify_code.setAttribute("type", "password");
    }
}

function chooseFile(fileInput) {
    if (fileInput.files && fileInput.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#avata_info').attr('src', e.target.result);
        }
        reader.readAsDataURL(fileInput.files[0]);
    }
}
$('.delete-image').click(() => {
    $('#avata_info').attr('src', '');
    let deleteimg = callAjax('delete-image-information', 'post', '');
});