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
            <div class="update-user  ">
                <div class="wrap">
                    <img src="../img/user-edit.svg" alt="Cập nhật tài khoản ">
                    <a href="/customer-information">Cập nhật tài khoản</a>
                </div>
            </div>
            <div class="update-address active">
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
        <div class="title">
            <p class="main-title">Địa chỉ nhận hàng</p>
            <p class="sub-title">Lorem Ipsum is simply dummy text of the printing</p>
        </div>
        <div class="table-reciever">
            <table>
                <tr>
                    <th>HỌ VÀ TÊN</th>
                    <th>SỐ ĐIỆN THOẠI</th>
                    <th>ĐỊA CHỈ </th>
                    <th> </th>
                </tr>
                <?php
                foreach ($list as $k => $v) {
                ?>
                    <tr>
                        <td><?= $v['name']; ?></td>
                        <td><?= $v['phone']; ?></td>
                        <td><?= $v['address']; ?></td>
                        <td class="option">
                            <button type="button" onclick="editAddress(<?= $v['id']; ?>)"><img src="../img/edit.png" alt="Chỉnh sửa"></button>
                            <button type="button" onclick="deleteAddress(<?= $v['id']; ?>)"><img src="../img/trash.svg" alt="Xóa"></button>
                        </td>
                    </tr>

                <?php } ?>

            </table>
        </div>
        <div class="add-address">
            <span>Thêm địa chỉ mới</span>
        </div>
        <!-- <div class="btn_submit">
            <button class="complete ">Hoàn thành </button>
            <button class="save active">Lưu Thay đổi </button>
        </div> -->
        <div class="pagination">
            <div class="size">
                <?= $link ?>
            </div>
        </div>
    </div>
</div>
<div id="add-address" hidden>
    <div id="wrap-add-address">
        <div class="title-add-address">
            <p>Tạo địa chỉ nhận hàng mới </p>
            <div class="icon-close-popup"></div>
        </div>
        <div class="sub-title-add-address">
            <p>Vui lòng nhập đủ các trường thông tin !</p>
        </div>
        <div class="content-add-address">
            <div class="content-left">
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
                        <label for="phone" id="phone_error"> Số điện thoại <span class="star_red">*</span>
                        </label>
                        <div class="input">
                            <input type="number" id="phone" placeholder="Nhập Số điện thoại">
                            <div id="icon_error_phone"></div>
                        </div>
                        <span id="error_message_phone"></span>
                    </div>
                    <div class="form-group">
                        <label for="address" id="address_error"> Địa chỉ <span class="star_red">*</span>
                        </label>
                        <div class="input">
                            <input type="address" id="address" placeholder="Nhập địa chỉ ">
                            <div id="icon_error_address">
                            </div>
                        </div>
                        <span id="error_message_address"></span>
                    </div>
                </form>
                <div class="btn_submit_popup">
                    <button type="button" class="cancle">Quay lại</button>
                    <button type="button" class="save-address" id="save-address">Lưu </button>
                    <button type="button" class="editAddress">Chỉnh sửa </button>
                </div>
            </div>
            <div class="content-right">
                <div class="search_map">
                    <p>Tìm kiếm trên bản đồ</p>
                </div>
                <div class="ggmap">
                    <img src="../img/address_store.png" alt="Địa chỉ quán">
                </div>
            </div>
        </div>
    </div>
</div>