<?php
$alert = '';
if ($this->session->userdata('changePass')) {
    $alert = $this->session->flashdata('changePass');
}
?>

<div class="body">
    <div class="box-left">
        <div class="wrap-box-left">
            <div class="home">
                <div class="wrap">
                    <img src="../img/home-2.svg" alt="Trang chủ">
                    <a href="/customer-home">Trang chủ</a>
                </div>
            </div>
            <hr>
            <div class="update-user active ">
                <div class="wrap">
                    <img src="../img/user-edit.svg" alt="Cập nhật tài khoản ">
                    <a href="/customer-information">Cập nhật tài khoản</a>
                </div>
            </div>
            <div class="update-address ">
                <div class="wrap">
                    <img src="../img/location.svg" alt="Cập nhật địa chỉ ">
                    <a href="/address-receive">Cập nhật Địa chỉ</a>
                </div>
            </div>
            <div class="store-save">
                <div class="wrap">
                    <img src="../img/heart-add.svg" alt="Quán ăn đã lưu">
                    <a href="/save-merchant">Quán ăn đã lưu</a>
                </div>
            </div>
        </div>
    </div>

    <div class="box-right">
        <div class="wrap-box-right">
            <div class="info-detail">
                <div class="img-me">
                    <form action="customer-information-update" name="helool" method="POST" enctype="multipart/form-data">
                        <div class="box01">
                            <div class="wp-left-box1">
                                <div class="title">
                                    <p class="name-title">Thông tin cá nhân</p>
                                    <p class="sub-title">Lorem Ipsum is simply dummy text of the printing</p>
                                </div>
                                <p class="name">Ảnh đại diện</p>
                                <div class="image-change">
                                    <div class="camera">
                                        <div class="border-camera">
                                            <img src="<?php echo '/upload/information/' . $info->img_avata; ?>" id="avata_info">
                                        </div>
                                    </div>
                                    <div class="btn-img">
                                        <div class="btn">
                                            <button class="change-image active">Thay ảnh đại diện <input type="file" id="file_img_avata" name="file_img_avata" onchange="chooseFile(this)" accept=".jpg,.jpeg,.png,.gif"></button>
                                            <button type="button" class="delete-image ">
                                                <img src="../img/trash.svg" alt="Thùng rác">
                                                <span>Xóa ảnh</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="alert">
                                    <?php
                                    if ($this->session->userdata('alertSizeImg') == true) {
                                        echo " <p style='color : red'>" . $this->session->userdata('alertSizeImg') . ".</p>";
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="bg-info ">
                                <img src="../img/bb724b863d7bc19ed4e8428de8742eff.gif " alt="Ảnh nền thông tin cá nhân ">
                            </div>
                        </div>
                        <div class="box-02">

                            <div class="form-control">
                                <div class="form-group fg-1">
                                    <label for="fullname">Họ và tên <span class="color_red">*</span></label>
                                    <input type="text" name="name" id="fullname" value="<?php echo $info->name; ?>">
                                </div>
                                <div class="form-group fg-2 ">
                                    <label for="gender ">Giới tính <span class="color_red ">*</span></label>
                                    <select name="gender" id="gender">
                                        <option value="1" <?php if ($info->gender ==  1) {
                                                                echo 'selected';
                                                            } else {
                                                                echo '';
                                                            } ?>>Nam</option>
                                        <option value="0" <?php if ($info->gender ==  0) {
                                                                echo 'selected';
                                                            } else {
                                                                echo '';
                                                            } ?>>Nữ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="email">Email <span class="color_red ">*</span></label>
                                <input type="email" name="email" id="email" value="<?php echo $info->email; ?>" readonly>
                            </div>
                            <div class="form-group ">
                                <label for="phone">Số Điện Thoại <span class="color_red ">*</span></label>
                                <input type="number" name="phone" id="phone" value="<?php echo $info->phone; ?>" readonly>
                            </div>
                            <div class="form-group ">
                                <label for="password">Mật Khẩu <span class="color_red ">*</span></label>
                                <div class="input">
                                    <input type="password" name="password" id="password" value="" onblur="blurPassword()">
                                    <img src="../img/Show-password.svg" onclick="return showPass();" id="img_eyes_pass" class="show-password" alt="Ấn để xem mã xác thực ">
                                    <button type="button" class="change-pass" onclick="changePass();">
                                        <div id="refresh_pass">
                                            <img src="../img/refresh.svg" alt="Refresh mật khẩu">
                                        </div>
                                        <span>Thay đổi</span>
                                    </button>
                                </div>
                            </div>
                            <div class="change-pass-new" onclick="changePass()">
                                <span>đổi mật khẩu</span>
                            </div>
                            <div class="change-password">

                            </div>
                            <p style="color:red"><?= $alert ?></p>
                            <div class="btn_submit">
                                <button type="button" class="complete ">Hoàn thành </button>
                                <button type="submit" name="btn_save" class="save active">Lưu Thay đổi </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- </form> -->
            </div>
            <!-- <div class="bg-info ">
                        <img src="../img/bg-infomation.png " alt="Ảnh nền thông tin cá nhân ">
                    </div> -->
        </div>

    </div>
</div>