<div class="cvp">
    <img src="../img/cơm_văn_phòng.png" alt="">
</div>
<div class="banner">
    <div class="ban_text">
        <div class="ban_text_1">
            <div class="header_ban_text-1">
                <p class="name">Đăng Kí </p>
                <p class="sub_name">Nhập các trường thông tin để đăng ký !</p>
            </div>
            <div class="gg_or_facebook">
                <button class="google">
                    <img src="../img/icon-gg.svg" alt="google">
                    <span class="title_google">Đăng ký với Google</span>
                </button>
                <button class="facebook">
                    <img src="../img/icon_facebook.svg" alt="facebook">
                    <span class="title_facebook">Đăng ký với Faceook</span>
                </button>

                <div class="email">
                    <span class="title_email">
                        <p>hoặc Đặng ký với Email</p>
                    </span>
                </div>
            </div>
            <form action="">
                <div class="form-group">
                    <label for="fullname " id="name_error"> Họ và tên <span class="star_red">*</span>
                    </label>
                    <div class="input">
                        <input type="text" id="fullname" placeholder="Nhập họ và tên">
                        <div id="icon_error_fullname"></div>
                    </div>
                    <span id="error_message_fullname"></span>
                </div>
                <div class="form-group">
                    <label for="email" id="email_error"> Địa chỉ email <span class="star_red">*</span>
                    </label>
                    <div class="input">
                        <input type="email" id="email" placeholder="Nhập địa chỉ email">
                        <div id="icon_error_email">
                        </div>
                    </div>
                    <span id="error_message_email"></span>
                </div>
                <div class="form-group">
                    <label for="phone" id="phone_error"> Số điện thoại <span class="star_red">*</span>
                    </label>
                    <div class="input">
                        <input type="number" id="phone" placeholder="Nhập Số điện thoại">
                        <div id="icon_error_phone"></div>
                    </div>
                    <span id="error_message_phone"></span>
                </div>
                <div class="form-group">
                    <label for="password" id="password_error"> Mật khẩu<span class="star_red">*</span>
                    </label>
                    <div class="input">
                        <div class="relative">
                            <input type="password" id="password" placeholder="Nhập Mật khẩu">
                            <img src="../img/Show-password.svg" onclick="return showPass();" id="img_eyes" class="show-verify" alt="Ấn để xem mã xác thực ">
                        </div>
                        <div id="icon_error_password"></div>
                    </div>
                    <span id="error_message_password"></span>
                </div>
                <div class="form-group">
                    <label for="re-password" id="re_password_error">Xác nhận lại mật khẩu<span class="star_red">*</span>
                    </label>
                    <div class="input">
                        <div class="relative">

                            <input type="password" id="re-password" placeholder="Xác nhận lại mật khẩu">
                            <img src="../img/Show-password.svg" onclick="return showRePass();" id="img_eyes_repass" class="show-verify" alt="Ấn để xem mã xác thực ">
                        </div>
                        <div id="icon_error_re_password">

                        </div>
                    </div>
                    <span id="error_message_re_password"></span>
                </div>

                <div class="form-chexbox">
                    <input type="checkbox" class="input" id="acept" placeholder="Xác nhận lại mật khẩu">
                    <label for="acept">Đồng ý với điều khoản của Vieclam123<span class="star_red">*</span>
                    </label>

                </div>
                <button type="button" onclick="return form_validate();" class="button" id="register"> Đăng Kí</button>
            </form>
            <div class="__login">
                <p>Bạn đã có tài khoản ? </p>
                <a href="/customer-login"> Đăng nhập</a>
            </div>
            <div class="license">
                <span>©Com Van Phong - Vieclam123</span>
            </div>
        </div>
    </div>
    <div class="bg-register">
        <div class="img_box_right">
            <img src="../img/bg-register.png" alt="Hình nền đăng kí">
        </div>
        <div class="title_bg">
            <p class="red">Cơm văn phòng</p>
            <p class="red">-</p>
            <p class="orange"> vieclam132</p>
        </div>
        <div class="sub-title">
            <p>Tinh hoa ẩm thực – con người Việt Nam</p>
        </div>
    </div>
</div>
<div class="content">
</div>