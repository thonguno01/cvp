<div class="cvp">
    <img src="../img/cơm_văn_phòng.png" alt="">
</div>
<div class="content">
    <div class="content-left">
        <img src="../img/bg-forgot-password.png" alt="Lấy lại mật khẩu ">
    </div>
    <div class="content-right">
        <div class="back-home">
            <a href="../home/index.html">Về trang chủ</a>
            <img src="../img/icon-back-home.svg" alt="Quay về trang chủ">
        </div>
        <div class="ctr-title">
            <p class="title">Quên mật khẩu ?</p>
            <p class="sub-title">Đừng lo lắng. Bạn hãy nhập email và chúng tôi sẽ gửi mã xác nhận về email mà bạn đã đăng ký.</p>
        </div>
        <form action="">
            <div class="form-group">
                <label for="email" id="email_error"> Địa chỉ email <span class="star_red">*</span>
                </label>
                <div class="input">
                    <input type="email" id="email" placeholder="Nhập địa chỉ email">
                    <div id="icon_error_email">
                        <!-- <img src="../img/icon_error.svg" alt=""> -->
                    </div>
                </div>
                <span id="error_message_email">
                    <!-- <span class="error_message">Không được bỏ trống Họ và tên</span> -->
                </span>
            </div>
            <button type="button" onclick="return form_validate();" class="btn-forgot-pass"> Khôi phục mật khẩu</button>
        </form>
        <div class="license">
            <span>©Com Van Phong - Vieclam123</span>
        </div>
    </div>
</div>