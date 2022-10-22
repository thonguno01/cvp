<?php
// var_dump($saveMerchant);
// die();
?>
<div class="body ">
    <div class="box-left ">
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
            <div class="update-address ">
                <div class="wrap">
                    <img src="../img/location.svg" alt="Cập nhật địa chỉ ">
                    <a href="/address-receive">Cập nhật Địa chỉ</a>
                </div>
            </div>
            <div class="store-save active">
                <div class="wrap">
                    <img src="../img/heart-add.svg" alt="Quán ăn đã lưu">
                    <a href="/save-merchant">Quán ăn đã lưu</a>
                </div>
            </div>
        </div>
    </div>

    <div class="box-right ">
        <div class="title ">
            <p class="main-title ">Quán ăn đã lưu</p>
            <p class="sub-title ">Lorem Ipsum is simply dummy text of the printing</p>
        </div>
        <div class="table-reciever ">
            <?php
            foreach ($saveMerchant as $k => $mechant) {
            ?>
                <div class="box_pro">
                    <div class="img_pro">
                        <img src="../img/suon_muoi.png" alt="">
                    </div>
                    <div class="box_pro_right">
                        <div class="title_pro">
                            <h2><?= $mechant['name_merchant'] ?></h2>
                            <div class="action_pro">
                                <button>
                                    <div class="icon_like_pro">
                                    </div>
                                    <div class="text_like_pro">
                                        Được yêu thích
                                    </div>
                                </button>
                            </div>
                        </div>
                        <div class="address">
                            <div class="address">
                                <div class="icon_add"></div>
                                <div class="text_add"><span><?= $mechant['address'] . ',' .  $mechant['id_district'] . ',' . $mechant['id_city'] ?></span></div>
                            </div>
                        </div>
                        <div class="star">
                            <div class="ac_star">
                                <div class="one"></div>
                                <div class="one"></div>
                                <div class="one"></div>
                                <div class="one"></div>
                                <div class="one"></div>
                            </div>
                            <div class="count_star">999+</div>
                            <div class="note"><span>Đánh giá trên CVP - Vieclam123</span></div>

                        </div>
                        <div class="open">
                            <div class="status">
                                <div class="icon_st"></div><span>Mở cửa</span>
                            </div>
                            <div class="time">
                                <div class="icon_time"></div><span>08:00 - 23:59</span>
                            </div>
                            <div class="voucher">
                                <div class="icon_vc"></div><span>Giảm 99k trên các món</span>
                            </div>

                        </div>
                        <div class="map"><span>Khoảng cách: </span><span class="color_map">2,4km</span></div>
                        <div class="coutiniu">
                            <button type="submit" class=""></button>

                        </div>
                        <div class="like_store">
                            <button type="submit" class="" onclick="return like(<?= $mechant['merchant_id'] ?>);"></button>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="pagination">
            <div class="size">
                <?= $link ?>
            </div>
        </div>
    </div>
</div>