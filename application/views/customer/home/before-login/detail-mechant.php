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
                        ?>
                        <!-- <button class="like"><img src="../img/like.png" alt="yêu thích"><span>Được yêu thích</span></button> -->
                        <span><?= $merchant['type_merchant'] ?></span>
                    </div>
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
                    <a href="customer-post-p<?= $idMerchanrt ?>">Bài viết </a>
                </div>
                <div class="menu">
                    <div class="name-menu">
                        <a href="">thực đơn</a>
                    </div>
                    <div class="menu-firm active">
                        <p>Món ăn cố định</p>
                    </div>
                    <div class="menu-day">
                        <div class="menu-day-name ">
                            <div class="tl-menu-day-name no_active">
                                <p>Món ăn theo ngày</p>
                            </div>
                            <div class="day">
                                <div class="form-group">
                                    <input type="checkbox" name="day_open_merchant" value="0" id="t2">
                                    <label for="t2">Thứ 2</label>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="day_open_merchant" value="1" id="t3">
                                    <label for="t3">Thứ 3</label>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="day_open_merchant" value="2" id="t4">
                                    <label for="t4">Thứ 4</label>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="day_open_merchant" value="3" id="t5">
                                    <label for="t5">Thứ 5</label>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="day_open_merchant" value="4" id="t6">
                                    <label for="t6">Thứ 6</label>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="day_open_merchant" value="5" id="t7">
                                    <label for="t7">Thứ 7</label>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="day_open_merchant" value="6" id="cn">
                                    <label for="cn">Chủ Nhật</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="combo no_active">
                        <a href="">Combo</a>
                    </div>
                    <div class="all-food no_active">
                        <a href="">Nhóm món ăn của quán</a>
                    </div>
                </div>
                <div class="block-2">
                    <div class="title-2">
                        <a href="customer-feedback-f<?= $idMerchanrt ?>">Đánh giá</a>
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
                <p class="fp-titxle-1">Món ăn cố định</p>
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
                                    <span class="no_sale"><?= number_format($food['price_food']) . 'đ' ?></span>
                                    <span class=" sale sale-permanent-<?= $food['id'] ?>"><?= number_format($food['price_food'])  ?></span>
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
                                        <button>
                                            <div class="img-sub"></div>
                                        </button>
                                        <span id="num-permanent-<?= $food['id'] ?>">01</span>
                                        <button>
                                            <div class="img-add"></div>
                                        </button>
                                    </div>
                                    <button class="btn_ok">
                                        <?= number_format($food['price_food']) . 'đ' ?>
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
                                    <span class="no_sale"><?= number_format($food['price_food']) . 'đ' ?></span>
                                    <span class="sale " id="sale-day-<?= $food['id'] ?>"><?= number_format($food['price_food'])  ?></span>
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
                                    <!-- <div class="combo">
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
                                    </div> -->
                                </div>
                                <div class="number-order-ok">
                                    <div class="num-order">
                                        <button>
                                            <div class="img-sub"></div>
                                        </button>
                                        <span id="number-day-<?= $food['id'] ?>">01</span>
                                        <button>
                                            <div class="img-add"></div>
                                        </button>
                                    </div>
                                    <button class="btn_ok">
                                        OK + 495.000đ
                                    </button>
                                </div>

                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
                <p class="fp-title-1">COMBO</p>
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
                                <span class="no_sale"><?= number_format($combo['price_combo']) . 'đ' ?></span>
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
                                    <button>
                                        <div class="img-sub"></div>
                                    </button>
                                    <span>01</span>
                                    <button>
                                        <div class="img-add"></div>
                                    </button>
                                </div>
                                <button class="btn_ok">
                                    <?= 'OK + ' . number_format($combo['price_combo']) . 'đ' ?>
                                </button>
                            </div>

                        </div>
                    </div>
                <?php } ?>




                <p class="fp-title-1">Nhóm món ăn của quán</p>
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
                                            <span class="no_sale"><?= number_format($item['price_food']) ?></span>
                                            <span class="sale"><?= number_format($item['price_food']) ?></span>
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
                                            <!-- <div class="combo">
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
                                    </div> -->
                                        </div>
                                        <div class="number-order-ok">
                                            <div class="num-order">
                                                <button>
                                                    <div class="img-sub"></div>
                                                </button>
                                                <span>01</span>
                                                <button>
                                                    <div class="img-add"></div>
                                                </button>
                                            </div>
                                            <button class="btn_ok">
                                                <?= 'OK + ' . number_format($item['price_food']) . 'đ' ?>
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
                    <div class="cart-info">
                        <div class="money">
                            <span>Thành tiền:</span>
                            <span>0đ</span>
                        </div>
                        <div class="fee-ship">
                            <span>Phí ship:</span>
                            <span>0đ</span>
                        </div>
                        <hr>
                        <div class="total">
                            <span>Tổng:</span>
                            <span>0đ</span>
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
    <div class="cart-768">
        <div class="my-cart">
            <div class="total-money">
                <div class="img-my-cart"></div>
                <span class="total-money-768">0Đ</span>
            </div>
            <div class="button-order-768">
                <button>
                    <img src="../img/shopping-cart.svg" alt="Giỏ hàng">
                    <span>Đặt hàng</span>
                </button>
            </div>
        </div>
    </div>
</div>