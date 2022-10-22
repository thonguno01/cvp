<?php
// $this->session->unset_userdata('cart');

?>
<div class="content">
    <input type="hidden" value=" <?= $idMerchanrt ?>" id="id_merchant">

    <div class="box-1">
        <?php
        foreach ($merchants as $key => $merchant) {
        ?>
            <div class="box-left">
                <div class="image">
                    <div class="size">
                        <img src="<?= '/upload/merchant/infor/' . $merchant['img_avatar'] ?>" alt="Ảnh đại diện quán ">
                    </div>
                </div>
                <div class="information">
                    <div class="info-head">
                        <?php
                        foreach ($fav_mer as $fav) {
                            if ($fav['merchant_id'] == $merchant['id'] && $fav['customer_id'] == $cus) {
                                echo '<button class="like"><img src="../img/like.png" alt="yêu thích"><span>Được yêu thích</span></button>';
                            }
                        }
                        ?><span><?= $merchant['type_merchant'] ?></span>
                    </div>
                    <input type="hidden" id="idMerchant" name="idMerchant" value="<?= $merchant['id'] ?>">
                    <div class="infor-name">
                        <p><?= $merchant['name_merchant'] ?> </p>
                    </div>
                    <div class="location">
                        <div class="icon-location">
                            <img src="../img/location.svg" alt="Địa chỉ quán">
                        </div>
                        <div class="name-location">
                            <span><?= $merchant['address'] . ',' .  $merchant['id_district'] . ',' . $merchant['id_city'] ?></span>
                        </div>
                    </div>
                    <div class="feed-back">
                        <div class="star-fback">
                            <img src="../img/star_feedback.svg" alt="Đánh giáo theo sao">
                            <img src="../img/star_feedback.svg" alt="Đánh giáo theo sao">
                            <img src="../img/star_feedback.svg" alt="Đánh giáo theo sao">
                            <img src="../img/star_feedback.svg" alt="Đánh giáo theo sao">
                            <img src="../img/star_feedback_rong.png" alt="Đánh giáo theo sao">
                        </div>
                        <div class="number_feedback">
                            <span>9999+</span>
                        </div>
                        <span class="name-feedback"> Đánh giá trên CVP - Vieclam123</span>
                    </div>
                    <div class="contact">
                        <p>Liên hệ: <span class="phone"><?= $merchant['phone'] ?></span></p>
                    </div>
                    <div class="info_status">
                        <div class="status">
                            <img src="../img/on.svg" alt="Mở cửa">
                            <span> Mở cửa</span>
                        </div>
                        <div class="time-on">
                            <img src="../img/clock.svg" alt="Thời gian mở cửa ">
                            <span><?= $merchant['time_start'] . '-' . $merchant['time_end'] ?></span>
                        </div>
                    </div>
                    <div class="wrap-money-feeship">

                        <div class="money">
                            <img src="../img/dollar-circle.svg" alt="Thu nhập ">
                            <p><?= $merchant['time_start'] . '- ' . $merchant['time_end'] ?></p>
                        </div>
                        <div class="fee-ship">
                            <?php $ship = $merchant['fee_ship']; ?>
                            <p>Phí ship: <span><?= number_format($merchant['fee_ship']) . 'đ' ?>/ 1km</span></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-right">
                <div class="address-store">
                    <img src="../img/address_store.png" alt="Địa chỉ của quán ">
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <div class="hr">
        <hr>
    </div>
    <div class="box-2">
        <div class="sidebar-left">
            <div class="block-1">
                <div class="title-1">
                    <a href="/customer-post-p<?= $idMerchanrt ?>">Bài viết </a>
                </div>
                <div class="menu">
                    <div class="name-menu">
                        <a href="/detail-merchant-m<?= $idMerchanrt ?>">Thực đơn</a>
                    </div>
                    <div class="menu-firm no_active">
                        <a href="#dish_co_dinh">Món ăn cố định</a>
                    </div>
                    <div class="menu-day">
                        <div class="menu-day-name ">
                            <div class="tl-menu-day-name no_active">
                                <p>Món ăn theo ngày</p>
                            </div>
                            <div class="day">
                                <div class="form-group-day">
                                    <input type="checkbox" name="day_open_merchant" id="t2" value="0">
                                    <label for="t2">Thứ 2</label>
                                </div>
                                <div class="form-group-day">
                                    <input type="checkbox" name="day_open_merchant" id="t3" value="1">
                                    <label for="t3">Thứ 3</label>
                                </div>
                                <div class="form-group-day">
                                    <input type="checkbox" name="day_open_merchant" id="t4" value="2">
                                    <label for="t4">Thứ 4</label>
                                </div>
                                <div class="form-group-day">
                                    <input type="checkbox" name="day_open_merchant" id="t5" value="3">
                                    <label for="t5">Thứ 5</label>
                                </div>
                                <div class="form-group-day">
                                    <input type="checkbox" name="day_open_merchant" id="t6" value="4">
                                    <label for="t6">Thứ 6</label>
                                </div>
                                <div class="form-group-day">
                                    <input type="checkbox" name="day_open_merchant" id="t7" value="5">
                                    <label for="t7">Thứ 7</label>
                                </div>
                                <div class="form-group-day">
                                    <input type="checkbox" name="day_open_merchant" id="cn" value="6">
                                    <label for="cn">Chủ Nhật</label>
                                </div>
                                <div class="form-group-day">
                                    <input type="checkbox" name="day" id="allday" value="7">
                                    <label for="allday">Cả tuần </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="combo no_active">
                        <a href="#dish_combo">Combo</a>
                    </div>
                    <div class="all-food no_active">
                        <a href="#dish_group">Nhóm món ăn của quán</a>
                    </div>
                </div>
                <div class="block-2">
                    <div class="title-2">
                        <a href="/customer-feedback-f<?= $idMerchanrt ?>">Đánh giá</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="order">
            <div class="search">

                <div class="name-sr">
                    <p>Tìm kiếm: </p>
                </div>
                <div class="option-order">
                    <div class="name-click">
                        <span>Chọn món</span>
                        <div class="icon-dropdown"></div>
                    </div>
                    <div class="select-mon-an">
                        <span>Món ăn cố định </span>
                        <span>Món ăn cố định </span>
                        <span>Món ăn cố định </span>
                        <span>Món ăn cố định </span>
                    </div>
                </div>
                <div class="bar-search">
                    <img src="../img/search.svg" alt="Tìm kiếm">
                    <input type="text" name="" id="" placeholder="Tìm kiếm ">
                </div>
            </div>
            <div class="food-permanent">
                <p class="fp-title-1" id="dish_co_dinh">Món ăn cố định</p>
                <?php foreach ($foods as $key => $food) {
                    if ($food['day_open'] == '7') {
                ?>
                        <div class="wrap-fb-title-1">
                            <div class="img-fp">
                                <div class="size-img">
                                    <img src="<?= '/upload/merchant/food/' . $food['img_food'] ?>" alt="COMBO FAMILY - PLUS">
                                </div>
                                <div class="info-food">
                                    <div class="name-food">
                                        <p id="permanent-<?= $food['id'] ?>"><?= $food['name_food'] ?></p>
                                    </div>
                                    <div class="content-food">
                                        <p><?= $food['description'] ?></p>
                                    </div>
                                    <div class="bought">
                                        <!-- <p>Đã được đặt <span> 999+</span> lần -->
                                        <p>Đã được đặt 9999+ lần
                                        </p>
                                        <div class="like-fp">
                                            <img src="../img/like-food.svg" alt="lượt thích">
                                            <span>1000+</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="price">
                                    <?php $saleDay = $food['price_food'] *    ($food['sale_code'] / 100);

                                    ?>
                                    <span class="no_sale"><?= number_format($food['price_food']) . 'đ' ?></span>
                                    <div>
                                        <span class=" sale sale-permanent-<?= $food['id'] ?>"><?= number_format($food['price_food'] - $saleDay) ?></span>
                                        <!-- <span>đ</span> -->
                                    </div>
                                </div>
                                <button class="btn_add_item" onclick="orderPermanent(<?= $food['id'] ?>)"><img src="../img/add_item.svg" alt=""></button>
                            </div>
                            <div class="detail-img-fb">
                                <div class="detail-img-fb-title">
                                    <p>Chi tiết món ăn</p>
                                </div>
                                <div class="detail-img-fb-content">
                                    <div class="dish">
                                        <span><?= $food['description'] ?></span>
                                    </div>
                                </div>
                                <div class="number-order-ok">
                                    <div class="num-order">
                                        <button type="button" onclick="sub(this )">
                                            <div class="img-sub"></div>
                                        </button>
                                        <span class="numOr" id="num-permanent-<?= $food['id'] ?>">1</span>
                                        <button type="button" onclick="add(this )">
                                            <div class="img-add"></div>
                                        </button>
                                    </div>
                                    <button onclick="orderManyPermanent(this,<?= $food['id'] ?>)" class="btn_ok">
                                        <?= "OK + " . number_format($food['price_food'] - $saleDay) . 'đ' ?>
                                    </button>
                                </div>

                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>

                <p class="fp-title-1">Món ăn theo ngày</p>
                <?php foreach ($foods as $key => $food) {
                    if ($food['day_open'] != '7') {
                ?>
                        <div class="wrap-fb-title-1">
                            <div class="img-fp">
                                <div class="size-img">
                                    <img src="<?= '/upload/merchant/food/' . $food['img_food'] ?>" alt="COMBO FAMILY - PLUS">
                                </div>
                                <div class="info-food">
                                    <div class="name-food">
                                        <p id="day-<?= $food['id'] ?>"><?= $food['name_food'] ?></p>
                                    </div>
                                    <div class="content-food">
                                        <p><?= $food['description'] ?></p>
                                    </div>
                                    <div class="bought">
                                        <!-- <p>Đã được đặt <span> 999+</span> lần -->
                                        <p>Đã được đặt 9999+ lần
                                        </p>
                                        <div class="like-fp">
                                            <img src="../img/like-food.svg" alt="lượt thích">
                                            <span>1000+</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="price">
                                    <?php $saleTheoNgay =  $food['price_food'] *    ($food['sale_code'] / 100);

                                    if ($food['sale_code'] != 0) {
                                    ?>
                                        <span class="no_sale"><?= number_format($food['price_food']) . 'đ' ?></span>
                                    <?php }
                                    ?>
                                    <span class="sale " id="sale-day-<?= $food['id'] ?>"><?= number_format($food['price_food'] - $saleTheoNgay)  ?></span>
                                </div>
                                <button class="btn_add_item" onclick="return orderBuyDay(<?= $food['id'] ?>);"><img src="../img/add_item.svg" alt=""></button>
                            </div>
                            <div class="detail-img-fb">
                                <div class="detail-img-fb-title">
                                    <p>Chi tiết món ăn</p>
                                </div>
                                <div class="detail-img-fb-content">
                                    <div class="dish">
                                        <span><?= $food['description'] ?></span>
                                    </div>
                                </div>
                                <div class="number-order-ok">
                                    <div class="num-order">
                                        <button type="button" onclick="sub(this )">
                                            <div class="img-sub"></div>
                                        </button>
                                        <span class="numOr" id="number-day-<?= $food['id'] ?>">1</span>
                                        <button type="button" onclick="add(this )">
                                            <div class="img-add"></div>
                                        </button>
                                    </div>
                                    <button onclick="return orderManyBuyDay(this,<?= $food['id'] ?>);" class="btn_ok">
                                        <?= 'OK + ' . number_format($food['price_food'] - $saleTheoNgay) . 'đ' ?>
                                    </button>
                                </div>

                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
                <p class="fp-title-1" id="dish_combo">COMBO</p>
                <?php foreach ($combos as $key => $combo) {
                ?>
                    <div class="wrap-fb-title-1">
                        <div class="img-fp">
                            <div class="size-img">
                                <img src="<?= '/upload/merchant/food/' . $combo['img_combo'] ?>" alt="COMBO FAMILY - PLUS">
                            </div>
                            <div class="info-food">
                                <div class="name-food">
                                    <p><?= $combo['name_combo'] ?></p>
                                </div>
                                <div class="content-food">
                                    <p>Chưa có</p>
                                </div>
                                <div class="bought">
                                    <!-- <p>Đã được đặt <span> 999+</span> lần -->
                                    <p>Đã được đặt 9999+ lần
                                    </p>
                                    <div class="like-fp">
                                        <img src="../img/like-food.svg" alt="lượt thích">
                                        <span>1000+</span>
                                    </div>
                                </div>

                            </div>
                            <div class="price">
                                <span class="sale"><?= number_format($combo['price_combo']) . 'đ' ?></span>
                            </div>
                            <button class="btn_add_item" onclick="return orderBuyCombo(<?= $combo['id'] ?>);"><img src="../img/add_item.svg" alt=""></button>
                        </div>
                        <div class="detail-img-fb">
                            <div class="detail-img-fb-title">
                                <p>Chi tiết món ăn</p>
                            </div>
                            <div class="detail-img-fb-content">
                                <div class="dish">
                                    <span>Là combo Family 3 thêm mì Spaghetti Bò Viên, tiết kiệm tới 30%.</span>
                                </div>
                                <div class="combo">
                                    <div class="title-ul">
                                        <span> Combo bao gồm</span>
                                    </div>
                                    <ul>
                                        <?php foreach ($comboDetails as $key => $cbDetail) {
                                            foreach ($cbDetail[$combo['id']] as  $items) {
                                                foreach ($items as $k => $item) {
                                        ?>
                                                    <li><span> <?= $item['name_food'] ?></span></li>
                                        <?php
                                                }
                                            }
                                        }

                                        ?>
                                    </ul>
                                    <div class="fit-person">
                                        <span>Phù hợp cho gia đình/nhóm 3 - 4 người.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="number-order-ok">
                                <div class="num-order">
                                    <button type="button" onclick="sub(this )">
                                        <div class="img-sub"></div>
                                    </button>
                                    <span class="numOr" id="num-combo-<?= $combo['id'] ?>">1</span>
                                    <button type="button" onclick="add(this )">
                                        <div class="img-add"></div>
                                    </button>
                                </div>
                                <button class="btn_ok" onclick="orderManyBuyCombo(this , <?= $combo['id'] ?>)">
                                    <?= 'OK + ' . number_format($combo['price_combo']) . 'đ' ?>
                                </button>
                            </div>

                        </div>
                    </div>
                <?php } ?>

                <p class="fp-title-1" id="dish_group">Nhóm món ăn của quán</p>
                <?php foreach ($groups as $key => $group) {
                ?>
                    <p><?= $group['name_group'] ?></p>
                    <?php foreach ($groupDetails as $key => $grDetail) {
                        foreach ($grDetail[$group['id']] as  $items) {
                            foreach ($items as $k => $item) {
                    ?>
                                <div class="wrap-fb-title-1">
                                    <div class="img-fp">
                                        <div class="size-img">
                                            <img src="<?= '/upload/merchant/food/' . $item['img_food'] ?>" alt="COMBO FAMILY - PLUS">
                                        </div>
                                        <div class="info-food">
                                            <div class="name-food">
                                                <p><?= $item['name_food'] ?></p>
                                            </div>
                                            <div class="content-food">
                                                <p><?= $item['description'] ?></p>
                                            </div>
                                            <div class="bought">
                                                <!-- <p>Đã được đặt <span> 999+</span> lần -->
                                                <p>Đã được đặt 9999+ lần
                                                </p>
                                                <div class="like-fp">
                                                    <img src="../img/like-food.svg" alt="lượt thích">
                                                    <span>1000+</span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="price">
                                            <?php $saleGroup = $item['price_food'] *    ($item['sale_code'] / 100);

                                            if ($item['sale_code'] != 0) {
                                            ?>
                                                <span class="no_sale"><?= number_format($item['price_food']) ?></span>
                                            <?php }
                                            ?>
                                            <span class="sale"><?= number_format($item['price_food'] - $saleGroup) ?></span>
                                        </div>
                                        <button class="btn_add_item" onclick="return orderBuyGroup(<?= $item['id'] ?>);"><img src="../img/add_item.svg" alt=""></button>
                                    </div>
                                    <div class="detail-img-fb">
                                        <div class="detail-img-fb-title">
                                            <p>Chi tiết món ăn</p>
                                        </div>
                                        <div class="detail-img-fb-content">
                                            <div class="dish">
                                                <span><?= $item['description'] ?></span>
                                            </div>
                                            <div class="combo">
                                                <div class="title-ul">
                                                    <span> Combo bao gồm</span>
                                                </div>
                                                <ul>
                                                    <li><span> 01 Sườn nướng size L</span></li>
                                                    <li><span> 01 Sườn nướng size L</span></li>
                                                    <li><span> 01 Sườn nướng size L</span></li>
                                                    <li><span> 01 Sườn nướng size L</span></li>
                                                    <li><span> 01 Sườn nướng size L</span></li>
                                                </ul>
                                                <div class="fit-person">
                                                    <span>Phù hợp cho gia đình/nhóm 3 - 4 người.</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="number-order-ok">
                                            <div class="num-order">
                                                <button type="button" onclick="sub(this )">
                                                    <div class="img-sub"></div>
                                                </button>
                                                <span class="numOr" id="num-group-<?= $item['id'] ?>">1</span>
                                                <button type="button" onclick="add(this )">
                                                    <div class="img-add"></div>
                                                </button>
                                            </div>
                                            <button class="btn_ok" onclick="orderManyBuyGroup(this, <?= $item['id'] ?>)">
                                                <?= 'OK + ' . number_format($item['price_food'] - $saleGroup) . 'đ' ?>
                                            </button>
                                        </div>

                                    </div>
                                </div>


                <?php
                            }
                        }
                    }
                }
                ?>
            </div>
        </div>

        <div class="sidebar-right">
            <div class="cart">
                <div class="wrap_cart">
                    <p class="title_cart">Giỏ hàng </p>
                    <div class="mon_an_da_dat" id="mon_an_da_dat">
                        <?php if (isset($_SESSION['cart']['buy'])) {
                            $totalALL = 0;
                            foreach ($_SESSION['cart']['buy'] as $value) {
                                $totalALL += $value['total'];
                        ?>
                                <div>
                                    <div class="wrap-mon-an-da-dat">
                                        <div class="mon_an_da_dat_top">
                                            <div class="ten_mon_an_da_dat">
                                                <p><?= $value['name'] ?>
                                                </p>
                                            </div>
                                            <div class="num-order">
                                                <button onclick="return subTowOne(this,<?= $value['id'] ?>,<?= $value['combo'] ?>) ;">
                                                    <div class="img-sub"></div>
                                                </button>
                                                <span class="qtyOrder <?= 'qtyOrder-permanent-' . create_slug(trim($value['name'])) . trim($value['id']) . trim($value['combo']); ?>"><?= $value['qty'] ?></span>
                                                <button type="button" onclick="return addTowOne(this ,<?= $value['id'] ?>,<?= $value['combo'] ?>) ;">
                                                    <div class="img-add"></div>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="ghi_chu_them">
                                            <input type="text" name="" id="" placeholder="Thêm ghi chú ......">
                                            <span class="tien_mon_an_da_dat <?= 'tien_mon_an_da_dat' . create_slug($value['name']) . $value['id'] . $value['combo']; ?>"> <?= number_format($value['total']) . 'đ' ?></span>
                                        </div>
                                    </div>
                                </div>

                        <?php    }
                        }
                        ?>

                    </div>
                    <div class="cart-info">
                        <div class="money">
                            <span>Thành tiền:</span>
                            <span id="money"><?php if (isset($totalALL)) echo number_format($totalALL) . 'đ'; ?></span>
                        </div>
                        <div class="fee-ship">
                            <span>Phí ship:</span>
                            <div>
                                <span id="fee-ship"><?= number_format($ship) ?> </span>
                                <span>đ/1km</span>
                            </div>
                        </div>
                        <hr>
                        <div class="total">
                            <div class="dv">
                                <div class="img-my-cart"></div>
                                <span class="total-none">Tổng:</span>
                            </div>
                            <span id="total-all"> <?php if (isset($_SESSION['cart']['paypal'])) {
                                                        // foreach ($_SESSION['cart']['paypal'] as $value) {
                                                        echo  number_format($_SESSION['cart']['paypal']['total']) . 'đ';
                                                        // }
                                                    } ?></span>
                        </div>
                    </div>
                    <div class="btn_buy">
                        <button class="btn_dat_hang">
                            <img src="../img/shopping-cart.svg" alt="Giỏ hàng">
                            <span>Đặt hàng</span>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="cart-375" hidden>
    <?php if (isset($_SESSION['cart']['buy'])) {
        $totalALL = 0;
        foreach ($_SESSION['cart']['buy'] as $value) {
            $totalALL += $value['total'];
    ?>
            <div class="wrap-mon-an-da-dat mon-an-da-dat-768">
                <div class="mon_an_da_dat_top">
                    <div class="ten_mon_an_da_dat">
                        <p><?= $value['name'] ?>
                        </p>
                    </div>
                    <div class="num-order">
                        <button onclick="return subTowOne(this,<?= $value['id'] ?>,<?= $value['combo'] ?>) ;">
                            <div class="img-sub"></div>
                        </button>
                        <span class="qtyOrder <?= 'qtyOrder-permanent-' . create_slug($value['name']) . $value['id'] . $value['combo']; ?>"><?= $value['qty'] ?></span>
                        <button type="button" onclick="return addTowOne(this ,<?= $value['id'] ?>,<?= $value['combo'] ?>) ;">
                            <div class="img-add"></div>
                        </button>
                    </div>
                </div>
                <div class="ghi_chu_them">
                    <input type="text" name="" id="" placeholder="Thêm ghi chú ......">
                    <span class="tien_mon_an_da_dat <?= 'tien_mon_an_da_dat' . create_slug($value['name']) . $value['id'] . $value['combo']; ?>"> <?= number_format($value['total']) . 'đ' ?></span>
                </div>
            </div>

    <?php    }
    }
    ?>
    <div class="cart-info">

        <div class="fee-ship">
            <span>Phí ship:</span>
            <div>
                <span id="fee-ship"><?= number_format($ship) ?> </span>
                <span>đ/1km</span>
            </div>
        </div>

    </div>

</div>
<div class="popup-detail" hidden>
    <div class="wrap-popup-detail">
        <div class="popup-quan-an-order">
            <div class="ten-quan-an">

                <p>Sườn mười -</p>
                <p> Hoàng Văn Thái</p>
                <span class="pp-time-order">08 tháng 12, 2021 12:50</span>

            </div>
        </div>
        <div class="pp-detail-title">
            <p>Xác nhận đơn hàng</p>
            <div class="icon-close-popup "></div>
        </div>
        <div class="pp-detail-body">
            <div class="address-order">
                <div>

                    <div class="gg-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7838.684254869503!2d106.70676642475235!3d10.785086936675276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1547181657956" width="100%" height="100%" frameborder="0" style="border:0; border-radius: 20px;" allowfullscreen></iframe>

                    </div>
                </div>
                <div class="add-store-order">
                    <?php
                    foreach ($merchants as $key => $merchant) {
                    ?>
                        <div class="add-store">
                            <div class="name_store">
                                <div class="img-status-done">
                                </div>
                                <span class="name_mechart"><?= $merchant['name_merchant'] ?></span>
                            </div>
                            <div class="add-store-detail">
                                <div class="icon-add"> </div>
                                <div class="store-detail"><?= $merchant['address'] . ',' .  $merchant['id_district'] . ',' . $merchant['id_city'] ?></div>
                            </div>
                        </div>
                    <?php }  ?>
                    <div class="add-order">
                        <div class="name_order">
                            <div class="wrap-add-order">
                                <div class="img-status-warning"></div>
                                <span class="order"><?= $this->session->userdata('name') ?></span>
                            </div>
                            <div class="wrap-address-order">
                                <div class="icon-add"> </div>
                                <div class="wrap-add-order-change">
                                    <span id="dia-chi-nhan-han"></span>
                                    <span class="change-add">Thêm địa chỉ mới</span>
                                </div>
                                <input type="hidden" id="idAddress" value="">
                            </div>
                        </div>
                    </div>
                </div>
                <div id="address-error"> </div>
                <div class="distance">
                    <p>
                        Khoảng cách: <span id="distance">1.5</span><span>km</span>
                    </p>
                </div>
            </div>
            <div class="detail-order">
                <div class="title">
                    <p>Chi tiết đơn hàng</p>

                </div>
                <div class="detail">
                    <ul class="list-order">
                        <?php $count = 0;
                        if (isset($_SESSION['cart']['buy'])) {

                            foreach ($_SESSION['cart']['buy'] as $value) {
                                $count++;

                        ?>
                                <li>
                                    <div class="left">
                                        <span class="num-od <?= 'num-od' . $value['id'] . $value['combo']; ?> <?= 'num-od' . create_slug($value['name']) . $value['id'] . $value['combo']; ?>"><?= $value['qty'] ?></span>
                                        <span class="name-od"><?= $value['name'] ?></span>
                                    </div>
                                    <div class="right">
                                        <span class="money <?= 'money' . $value['id'] . $value['combo']; ?>  <?= 'money' . create_slug($value['name']) . $value['id']  . $value['combo']; ?>"><?= number_format($value['total']) . 'đ'; ?></span>
                                    </div>
                                </li>
                        <?php }
                        } ?>
                    </ul>

                    <div class="total">

                        <div class="name-total">
                            <p>Tổng <span class="num-od-total"><?= $count; ?></span> món</p>
                            <div class="total-all">
                                <p> <?php if (isset($_SESSION['cart']['paypal'])) {
                                        echo  number_format($_SESSION['cart']['paypal']['total']) . 'đ';
                                    } ?></p>
                            </div>
                        </div>

                        <div class="fee-ship">
                            <span>Phí ship</span>

                            <span class="money-ship-popup"> <?php if (isset($_SESSION['cart']['paypal'])) {
                                                                echo  number_format($_SESSION['cart']['paypal']['feeShip']) . 'đ';
                                                            } ?></span>

                        </div>
                        <div class="sale-percent">
                            <span>Khuyến mại</span>
                            <div>
                                <span id="sale-percent"> <?php if (isset($_SESSION['cart']['paypal'])) {
                                                                echo  number_format($_SESSION['cart']['paypal']['sale']);
                                                            } ?></span>
                                <span>đ</span>
                            </div>
                        </div>
                        <div class="sale">
                            <span>Giảm thêm</span>

                            <span class="sale-orther"><?php if (isset($_SESSION['cart']['paypal'])) {
                                                            echo  $_SESSION['cart']['paypal']['saleOther'] . 'đ';
                                                        } ?></span>

                        </div>
                    </div>
                    <div class="total-all-order">
                        <span>Tổng tiền:</span>

                        <span class="money-total-all"><?php if (isset($_SESSION['cart']['paypal'])) {
                                                            echo  number_format($_SESSION['cart']['paypal']['totalAll']) . 'đ';
                                                        } ?></span>
                    </div>

                </div>

                <div class="note-popup">
                    <p>Lưu ý: <span id="note-popup"> Không dùng đồ nhựa/Xin thêm thìa đũa</span></p>
                </div>
                <div class="note-status">
                    <textarea name="" id="noteStatus" cols="30" rows="2" placeholder="Thêm lưu ý cho người bán ( Ví dụ không dùng đồ nhựa,...)"></textarea>
                    <!-- <p>Thêm lưu ý cho người bán ( Ví dụ không dùng đồ nhựa,...)</p> -->
                </div>
                <div class="contect-mechart">
                    <p>Liên hệ người bán nếu bạn muốn được giảm giá thêm nữa nhé !!!</p>
                </div>
                <div class="why-destroy">
                    <p class="name-why-destroy">Lý do hủy đơn:</p>
                    <div class="because-destroy">
                        <p>
                            Đơn hủy do nhà hàng hay đơn hủy do khách hàng
                        </p>
                    </div>
                </div>
                <div class="btn_submit">
                    <button class="pp_cancle">Hủy</button>
                    <button class="btn_verify">Xác nhận </button>
                    <button class="btn_saveOrder">Xác nhận </button>
                    <button class="btn_saveOrder2">Xác nhận </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="popup-chage-address" hidden>
    <div class="wrap-popup-chage-address">
        <div class="pp-change-add-title">
            <p>Thay đổi địa chỉ nhận hàng </p>
            <div class="close-pp-chage-address"></div>
        </div>
        <div class="pp-detail-body">
            <div class="table-reciever">
                <table>
                    <tr>
                        <td></td>
                        <th>HỌ VÀ TÊN</th>
                        <th>SỐ ĐIỆN THOẠI</th>
                        <th>ĐỊA CHỈ </th>
                    </tr>
                    <?php foreach ($addressOrder as $adres) { ?>
                        <tr>
                            <td><input type="radio" name="choose" id="" onclick="return chooseAddress(this ,<?= $adres['id'] ?>);"></td>
                            <td><span class="nameOrdered"><?= $adres['name'] ?></span></td>
                            <td><span class="phoneOrdered"><?= $adres['phone'] ?></span></td>
                            <!-- thay 1 bằng id -->
                            <td class="get_address_<?= $adres['id'] ?>"><?= $adres['address'] ?></td>
                        </tr>
                    <?php } ?>
                </table>
                <div class="pp-add-address">
                    <span>Thêm địa chỉ mới</span>
                </div>
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
                    <button class="cancle">Quay lại</button>
                    <button class="save-address">Lưu </button>
                </div>
            </div>
            <div class="content-right">
                <div class="search_map">
                    <p>Tìm kiếm trên bản đồ</p>
                </div>
                <div class="ggmap">
                    <img src="/img/address_store.png" alt="Địa chỉ quán">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="popup_succes" id="popup_succes" hidden>

</div>