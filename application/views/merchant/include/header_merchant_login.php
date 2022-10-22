<?php
// var_dump($check_ath->id)
?>
<div class="taskbar">
    <div class="dropdown">
        <div class="body_drop">
            <!-- <div class="drop_off"><button class="drop_offf"></button></div> -->
            <div class="content_drop">
                <div class="login_drop"><a href="">Trang chủ</a></div>
                <div class="danh_muc_drop">
                    <div class="tit_dm_dr"> <a>Danh mục</a></div>
                    <div class="icon_drop_dm"></div>
                    <div class="drop_danhmuc2">
                        <a href="">
                            <div class="news_dr all_dr">
                                <div class="text_news_dr">Tin tức - sự kiện</div>
                            </div>
                        </a>
                        <a href="">
                            <div class="cn_dr all_dr">
                                <div class="text_cn_dr">Cẩm nang mùa dịch</div>
                            </div>
                        </a>
                        <a href="">
                            <div class="ques_dr all_dr">
                                <div class="text_ques_dr">Cẩm nang mùa dịch</div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="thac_mac"><a href="">Thắc mắc</a></div>
                <div class="lien_he"><a href="">Liên hệ</a></div>
                <div class="lien_he tk"><a href="">Thống kê</a></div>
                <div class="lien_he today"><a href="">Đơn hàng hôm nay</a></div>
                <div class="lien_he str"><a href="">Lịch sử đơn hàng</a></div>
                <div class="lien_he prof"><a href="">Quản lý hồ sơ</a></div>
                <div class="lien_he logout"><a href="">Đăng xuất</a></div>
            </div>
        </div>
    </div>
    <div class="logo"></div>
    <div class="merchant1" onclick="customer_home()">
        <div class="icon_merchant1"></div>
        <div class="text"><a>Merchant</a></div>
    </div>
    <div class="huong_dan"><a href="">Hướng dẫn</a></div>
    <div class="notifi">
        <?php
        $show_all_status = $this->Generals_model->get_one_where_select_ar('notification', 'status', ['merchant_id' => $check_ath->id, 'status' => 1]);
        //  var_dump($show_all_status);
        if ($show_all_status == NULL) {
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
                    <div class="read" onclick="seen(<?= $check_ath->id ?>)"><span>Đánh dấu tất cả đã đọc</span></div>
                </a>
            </div>
            <?php
            foreach ($data_header as $key => $header) {
                $data_customer = $this->Generals_model->get_where('customer', ['id' => $header["customer_id"]]);
                if ($header == '') {
            ?>
                    <h2>Chưa có thông báo mới</h2>
                <?php
                } else {
                ?>
                    <div class="content_noti" onclick="don_hang_hom_nay(<?= $header['id'] ?>)">
                        <?php
                        foreach ($data_customer as $key => $customer) {
                            $data_customer = $this->Generals_model->get_where('customer', ['id' => $header["customer_id"]]);
                        ?>
                            <div class="ct_01">
                                <?php
                                if ($header["status"] == 1) {
                                ?>
                                    <span class="load_seen"></span>
                                <?php
                                }
                                ?>
                                <img src="/upload/information/<?= $customer["img_avata"] ?>" alt="">
                            </div>
                            <div class="ct_02">
                                <div class="tit_time">
                                    <h2><?= $customer["name"] ?></h2>
                                <?php
                            }
                                ?>
                                <a>
                                    <?php
                                    $date = getdate();
                                    $dem = '';
                                    $dem .= $date['year'] . '-' . $date['mon'] . '-' . $date['mday'] . ' ' . $date['hours'] . ':' . $date['minutes'] . ':' . $date['seconds'];

                                    $date1 = $dem;
                                    $date2 = $header['created_at'];
                                    $diff = abs(strtotime($date1)) - $date2;
                                    $years = floor($diff / (365 * 60 * 60 * 24));
                                    $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
                                    $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
                                    $hours = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24) / (60 * 60));
                                    $minutes = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24 - $hours * 60 * 60) / 60);
                                    $seconds = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24 - $hours * 60 * 60 - $minutes * 60));

                                    if ($years = $months = $days = $hours == 0) {
                                        $time = $minutes . " phút trước";
                                    } elseif ($years = $months = $days == 0) {
                                        $time = $hours . " giờ trước";
                                    } elseif ($years = $months == 0) {
                                        $time = $days . " ngày trước";
                                    } elseif ($years == 0) {
                                        $time = $months . " tháng trước";
                                    } else {
                                        $time = $years . " năm trước";
                                    }
                                    echo $time;

                                    ?>
                                </a>
                                </div>
                                <span>MĐH: <?= $header["code"] ?></span>
                            </div>
                            <div class="ct_03"><?= $notifi_mer[$header["content_mer"]] ?></div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
    <?php
    foreach ($list as $key => $v) {
    ?>
        <div class="profile">
            <div class="avatar"><img src="upload/merchant/infor/<?= $v["img_avatar"] ?>" alt=""></div>
            <div class="name"><span><?= $v["name"] ?></span>
                <a>
                    <div class="menu_pro">
                        <div class="b1">
                            <span onclick="lich_su_don_hang();">Lịch sử mua hàng</span>
                        </div>
                        <div class="b2">
                            <span onclick="ho_so_quan_an();">Cập nhật thông tin</span>
                        </div>
                        <div class="b3">
                            <span onclick="logout();">Đăng xuất</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    <?php } ?>
</div>