<div class="cvp">
    <img src="../img/cơm_văn_phòng.png" alt="">
</div>
<div class="banner">
    <div class="ban_text">
        <div class="ban_text_1">
            <div class="header_ban_text-1">
                <p class="name">Đăng nhập </p>
                <p class="sub_name">Chào mừng bạn trở lại !!!</p>
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
                        <p>hoặc Đặng nhập với Email</p>
                    </span>
                </div>
            </div>
            <form action="">
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
                    <label for="password" id="password_error"> Mật khẩu<span class="star_red">*</span>
                    </label>
                    <div class="input">
                        <div class="relative">
                            <input type="password" id="password" placeholder="Nhập Mật khẩu">
                            <img src="../img/Show-password.svg" onclick="return showPass();" id="img_eyes" class="show-verify" alt="Ấn để xem Mật khẩu ">
                        </div>
                        <div id="icon_error_password"></div>
                    </div>
                    <span id="error_message_password"></span>
                </div>
                <div class="form-group">
                    <label for="code-capch" id="error_code_capcha">Mã captcha<span class="star_red">*</span>
                    </label>
                    <div class="input-form-group ">
                        <input type="text" id="code-capch" placeholder="Nhập mã captcha">
                        <div id="icon_error_capcha">
                            <!-- <img src="../img/icon_error.svg" class="icon_error" alt="Lỗi thông tin nhập vào"> -->
                        </div>
                        <div class="img-capcha">
                            <div class="cap-cha">
                                <span class="text-capcha1">cap</span>
                                <!-- <span class="text-capcha2">cha</span> -->
                            </div>
                            <button type="button" id="refresh-capcha"> <img src="../img/reload-capcha.svg" alt="Lấy lại mã capcha"></button>
                        </div>
                    </div>
                    <span id="error_message_capcha"></span>
                </div>
                <div class="note-login">
                    <div class="miss-password">
                        <input type="checkbox" id="miss_pass">
                        <label for="miss_pass">Nhớ mật khẩu </label>
                    </div>
                    <div class="forgot-password">
                        <a href="customer-forgot-password">Quên mật khẩu ?</a>
                    </div>

                </div>
                <button type="button" onclick="return form_validate();" class="button" id="login">Đăng nhập</button>
            </form>
            <div class="__register">
                <p>Bạn đã có tài khoản ? </p>
                <a href="/customer-register"> Đăng kí </a>
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
<div class="load">

</div>