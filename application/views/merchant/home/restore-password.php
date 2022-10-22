<div class="cvp">
    <img src="../img/cơm_văn_phòng.png" alt="">
</div>
<div class="content">
    <div class="content-left">
        <img src="../img/bg-restore-password.png" alt="khôi phục lại mật khẩu ">
    </div>
    <div class="content-right">
        <div class="back-home">
            <a href="">Về trang chủ</a>
            <img src="../img/icon-back-home.svg" alt="Quay về trang chủ">
        </div>
        <div class="ctr-title">
            <p class="title">Khôi phục mật khẩu ?</p>
            <p class="sub-title">Vui lòng nhập mã gồm 6 chữ sỗ đã được gửi về email của ban !</p>
        </div>
        <form action="">
            <div class="form-group">

                <label for="veryfi-code" id="verify_code_error">Nhập mã xác thực <span class="star_red">*</span></label>
                <div class="input">
                    <div class="relative">
                        <input type="password" id="veryfi-code" placeholder="G-">
                        <img src="../img/Show-password.svg" onclick="return showPass();" id="img_eyes" class="show-verify" alt="Ấn để xem mã xác thực ">
                    </div>
                    <div id="icon_error_veryfi_code">
                        <!-- <img src="../img/icon_error.svg" alt="Nhập mã xác thực "> -->
                    </div>
                </div>
                <span id="error_message_veryfi_code">
                    <!-- <span class="error_message">Không được bỏ trống nhập mã xác thực </span> -->
                </span>
            </div>
            <div class="get-verify-code">
                <button type="button" id="new-otp">Lấy mã xác thực mới</button>
            </div>
            <div class="form-group">
                <label for="password" id="password_error"> Nhập mật khẩu mới<span class="star_red">*</span>
                </label>

                <div class="input">
                    <div class="relative">
                        <input type="password" id="password" placeholder="Nhập mật khẩu mới">
                        <img src="../img/Show-password.svg" onclick="return showPass1();" id="img_eyes_pass" class="show-verify" alt="Ấn để xem mã xác thực ">
                    </div>

                    <div id="icon_error_password">
                        <!-- <img src="../img/icon_error.svg" alt=""> -->
                    </div>
                </div>
                <span id="error_message_password">
                    <!-- <span class="error_message">Không được bỏ trống Mật Khẩu </span> -->
                </span>
            </div>
            <div class="form-group">
                <label for="re-password" id="re_password_error"> Nhập lại mật khẩu mới<span class="star_red">*</span>
                </label>
                <div class="input">
                    <div class="relative">
                        <input type="password" id="re-password" placeholder="Nhập lại mật khẩu mới">
                        <img src="../img/Show-password.svg" onclick="return showPass2();" id="img_eyes_repass" class="show-verify" alt="Ấn để xem mã xác thực ">
                    </div>
                    <div id="icon_error_re_password">
                        <!-- <img src="../img/icon_error.svg" alt=""> -->
                    </div>
                </div>
                <span id="error_message_re_password">
                    <!-- <span class="error_message">Không được bỏ trống Nhập lại mật khẩu</span> -->
                </span>
            </div>
            <button type="button" onclick="return form_validate();" class="btn-restore-pass"> Khôi phục mật khẩu</button>
        </form>
        <div class="license">
            <span>©Com Van Phong - Vieclam123</span>
        </div>
    </div>
</div>