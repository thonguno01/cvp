<?php
$this->load->helper('General_helper');

$name =  $this->session->userdata('name');
$avata =  $this->session->userdata('avata');
if ($this->session->userdata('idCustomer') == true) {
    $check_ath =  $this->Generals_model->get_one_where('customer', ['id' => $this->session->userdata('idCustomer')]);
} else {
    $check_ath =  $this->Generals_model->get_one_where('customer', ['email' => $this->session->userdata('emailRegis')]);
}
$show_all_status = $this->Generals_model->get_one_where_select_ar('notification', 'status', ['customer_id' => $check_ath->id, 'status' => 1]);
$data_header = $this->Generals_model->get_list2_ORDER_BY('notification', ['customer_id' => $check_ath->id], 'update_at');
$data_notify = [];
if (!empty($data_header)) {
    foreach ($data_header as $key => $value) {
        $merchant = $this->Generals_model->get_one_where_array_row('merchant', ['id' => $value['merchant_id']]);
        foreach (notification_cus() as $k => $noti) {
            if ($value['content_cus'] == $k) {
                $value['content_cus'] = $noti;
            }
        }
        $value['name_merchant'] = $merchant['name_merchant'];
        $value['img_merchant'] = $merchant['img_cover'];
        $data_notify[] = $value;
    }
}
// show($check_ath);
// die();
?>


<div class="header">
    <button class="icon-menu-header"></button>
    <div class="menu-option">
        <div class="line-1">
            <a href="customer-home">Trang chủ </a>
        </div>
        <hr>
        <div class="line-2">
            <a href="">Hướng dẫn</a>
            <a href="">Tin tức</a>
        </div>
        <hr>
        <div class="info-custom-menu">
            <div class="image-menu">
                <img src="../img/avta-poster.png" alt="Ảnh đại diện">
            </div>
            <div class="text-menu">
                <a href="/customer-information"><?php echo $name; ?></a>

            </div>

        </div>
        <div class="notice">
            <a href="/customer-notify"><img src="../img/notification.svg" alt="Thông báo  "> Thông báo</a>
        </div>
        <div class="saved color-menu-option">
            <img src="../img/heart-add.svg" alt="Quán đã lưu">
            <a href="/save-merchant">Đã lưu</a>
        </div>
        <div class="history-buy color-menu-option">
            <img src="../img/bag-timer.svg" alt="Lịch sử mua hàng">
            <a href="/history-order">Lịch sử mua hàng </a>
        </div>
        <div class="up-user color-menu-option">
            <img src="../img/user-edit.svg" alt="Cập nhật thông tin">
            <a href="/customer-information">Cập nhật thông tin</a>
        </div>
        <hr>
        <div class="logout color-menu-option">
            <img src="../img/logout.svg" alt="Đăng xuất">
            <a href="">Đăng xuất</a>
        </div>
    </div>
    <div class="head-left">
        <div class="logo">
            <a href="/"><img src="../img/Logo_CVP.png" alt="Trang chủ"></a>
        </div>
        <div class="select_district">
            <select class="form-select" name="select_district" id="" onchange="search_merchant_city(this)">
                <?php
                foreach (list_city() as $key => $value) {
                ?>
                    <option value="<?= $value['cit_id'] ?>"><?= $value['cit_name'] ?></option>'
                <? }
                ?>
            </select>
        </div>
    </div>
    <div class="head-right">
        <div class="huong_dan"><a href="">Hướng dẫn</a></div>
        <div class="tin_tuc"><a href="">Tin tức</a></div>

        <div class="notifi">
            <?php

            if (empty($show_all_status)) {
            ?>
                <div class="cham_noti" style="background: none;"></div>
            <?php
            } else {
            ?>
                <div class="cham_noti" id="load_status"></div>
            <?php
            }
            ?>
            <div class="notifi_drop">
                <div class="title_noti">
                    <h2>Thông báo</h2>
                    <a>
                        <div onclick="seenAllHeader()" class="read"><span>Đánh dấu tất cả đã đọc</span></div>
                    </a>
                </div>
                <div class="viu_all"><a href="/customer-notify">Xem tất cả</a></div>
                <?php
                foreach ($data_notify as $value) {
                ?>
                    <div class="content_noti">
                        <div class="ct_01">
                            <?php
                            if ($value['status'] == 1) {
                                echo '<span></span>';
                            }
                            ?>
                            <img src="<?= 'upload/merchant/infor/' . $value['img_merchant'] ?>" alt="">
                        </div>
                        <div class="ct_02">
                            <h2><?= $value['name_merchant'] ?></h2>
                            <div class="wrap_ct02">
                                <span>MĐH: <?= $value['code'] ?></span>
                                <a><?= $value['created_at'] ?></a>
                            </div>
                        </div>
                        <div class="ct_03"><?= $value['content_cus']; ?></div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="info-custom">

            <div class="image">
                <img src="<?php echo 'upload/information/' . $check_ath->img_avata ?>" alt="">
            </div>
            <div class="text">
                <a href=""><?php echo $name; ?></a>
                <button class="btn_drop_down"><img src="../img/drop-down.svg" alt=""></button>
            </div>

        </div>
    </div>
    <div class="drop-down">
        <div class="saved">
            <img src="../img/heart-add.svg" alt="Quán đã lưu">
            <a href="/save-merchant">Đã lưu</a>
        </div>
        <div class="history-buy">
            <img src="../img/bag-timer.svg" alt="Lịch sử mua hàng">
            <a href="/history-order">Lịch sử mua hàng </a>
        </div>
        <div class="up-user">
            <img src="../img/user-edit.svg" alt="Cập nhật thông tin">
            <a href="/customer-information">Cập nhật thông tin</a>
        </div>
        <hr>
        <div class="logout">
            <img src="../img/logout.svg" alt="Đăng xuất">
            <a href="/customer-logout">Đăng xuất</a>
        </div>
    </div>
</div>