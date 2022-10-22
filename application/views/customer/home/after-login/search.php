<div class="banner">
    <div class="ban_text">
        <div class="ban_text_1">
            <div class="cvp"></div>
            <div class="cvp_title">
                <span class="title_black">Tìm Kiếm Dễ Dàng Đặt Mua </span>
                <span class="title_red">Đơn Giản</span>
                <span class="title_black">,</span>
                <span class="title_yellow">Nhanh Chóng</span>
            </div>
            <div class="select_district_2"><select name="" id="">
                    <option value="">Hà nội</option>
                </select>
            </div>
        </div>

        <div class="ban_text_2">
            <div class="reative">
                <form>
                    <div class="ban_text_2">
                        <div>
                            <span class="sp_2">Nhập vị trí của bạn:</span><br>
                            <input type="text" id="addressMe" placeholder="Nhập địa chỉ">
                        </div>
                        <div>
                            <span class="sp_2">Tìm kiếm:</span><br>
                            <input type="text" id="nameDish" placeholder="Nhập món ăn, tên quán ăn,...">
                        </div>
                        <button type="button" onclick="search()">
                            <div class="search_bt" id="search_mechants">TÌM KIẾM</div>
                            <img src="../img/search-normal.png" alt="">
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="ban_img"></div>
</div>
<div class="content">
    <div class="loc_product">
        <div class="loc_1">
            <div class="key">
                <span class="key_tit">Từ khóa: </span>
                <span class="key_tran">Sườn nướng BBQ</span>
            </div>
            <div class="area">
                <select name="" id="">
                    <option value="">Khu vực</option>
                </select>
            </div>
            <div class="title_tran">Danh sách sườn nướng tại Hà Đông</div>
        </div>
        <div class="loc_2">
            <div class="filter"><span>Lọc kết quả</span></div>
            <div class="filter_sl">
                <select name="" id="">
                    <option value="">Đúng nhất</option>
                    <option value="">Khuyến mại</option>
                    <option value="">Gần tôi</option>
                    <option value="">Bán chạy</option>
                    <option value="">Đánh giá</option>
                </select>
            </div>
        </div>
    </div>
    <div class="promotion">
        <div class="pro_title">
            <h2>Đúng nhất</h2>
        </div>
        <div class="link_all">
            <a href="">Xem tất cả</a>
        </div>
        <div class="data_show_pro">
            <?php
            foreach ($mechants as $k => $mechant) {

            ?>
                <div class="box_pro">
                    <div class="img_coverpro">
                        <img src="/upload/merchant/infor/<?= $mechant['img_cover'] ?>" alt="">
                    </div>
                    <div class="boxpro_item">


                        <div class="action_pro">
                            <h2><a href="detail-merchant-m<?= $mechant['id'] ?>"> <?= $mechant['name_merchant'] ?></a> </h2>
                            <button <?php
                                    foreach ($fav_mer as $fav) {
                                        if ($fav['merchant_id'] == $mechant['id'] && $fav['customer_id'] == $cus) {
                                            echo 'style="background: #EC5569"';
                                        }
                                    }
                                    ?> onclick="<?php if ($isLogin == 1) {
                                                    echo ' like( ' . $mechant['id'] . ' )';
                                                } else {
                                                    echo 'popupLogin()';
                                                }  ?>">
                                <img src="../img/like.png" alt="">
                                <span class="text_like_pro">Yêu thích</span>
                            </button>
                        </div>
                        <div class="address_pro">
                            <div class="icon_add_pro"></div>
                            <div class="text_add_pro"><span><?= $mechant['address'] . ',' . $mechant['id_district'] . ',' . $mechant['id_city'] ?></span></div>
                        </div>
                        <div class="star_pro">
                            <div class="ac_star_pro">
                                <div class="one_pro"></div>
                                <div class="one_pro"></div>
                                <div class="one_pro"></div>
                                <div class="one_pro"></div>
                                <div class="one_pro"></div>
                            </div>
                            <div class="count_star_pro">999+</div>
                        </div>
                        <div class="note_pro"><span>Đánh giá trên CVP - Vieclam123</span></div>
                        <div class="open_pro">
                            <div class="status_pro">
                                <div class="icon_st_pro"></div><span>Mở cửa</span>
                            </div>
                            <div class="time_pro">
                                <div class="icon_time_pro"></div><span><?= $mechant['time_start'] ?> - <?= $mechant['time_end'] ?></span>
                            </div>
                            <div class="voucher_pro">
                                <div class="icon_vc_pro"></div><span>Giảm 99k trên các món</span>
                            </div>
                        </div>
                        <div class="map_pro"><span>Khoảng cách: </span><span class="color_map_pro">2,4km</span></div>
                        <div class="button_pro"><a href="detail-merchant-m<?= $mechant['id'] ?>"><img src="../img/icon_buttom.png" alt=""></a></div>
                        <div class="button_like_pro <?php if (isset($mechant['like'])) {
                                                        echo 'like-active';
                                                    }  ?> " id="like-pro-<?= $mechant['id'] ?>"><button type=" submit" onclick="<?php if ($isLogin == 1) {
                                                                                                                                    echo ' like( ' . $mechant['id'] . ' )';
                                                                                                                                } else {
                                                                                                                                    echo 'popupLogin()';
                                                                                                                                }  ?>"></button></div>
                    </div>
                </div>
            <?php
            }
            ?>
            <div class="pagination">
                <div class="size">
                    <?= $link; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="tutorial">
        <div class="tu_title">
            <h2>Hướng dẫn</h2>
        </div>
        <div class="tu_content">
            <div class="video"></div>
            <div class="question">
                <div class="chtg">
                    <button>Câu hỏi thường gặp ?</button>
                </div>
                <div class="title">Đặt câu hỏi cho Cơm Văn Phòng - Vieclam123</div>
                <input class="input" type="text" placeholder="Họ và tên">
                <input class="input" type="text" placeholder="Email">
                <textarea class="input_2" type="text" placeholder="Viết câu hỏi của bạn"></textarea>
                <input class="input_cap" type="text" placeholder="Nhập mã captcha">
                <div class="captcha"><span>CaptCha</span></div>
                <div class="load"><button></button></div>
                <div class="send_mail_div"><button class="send_mail">
                        <div class="text">GỬI EMAIL</div>
                        <div class="icon"></div>
                    </button></div>
            </div>
        </div>
    </div>
    <div class="dish_host">
        <div class="title_dish">
            <h2>Món được tìm nhiều nhất</h2>
        </div>
        <div class="column_all">
            <div class="column1">
                <div class="banner_dish">
                    <div class="banner_b"></div>
                    <div class="chu_thich"><span>Thịt gà xá xíu là món ăn đem lại rất nhiều dưỡng chất
                        </span></div>
                </div>
                <div class="content_dish">
                    <span>
                        Thịt gà là nguyên liệu chính trong món ăn này, và chắc hẳn bạn cũng đã biết thịt gà là một loại thực phẩm giàu protein, vitamin A, vitamin C và các loại khoáng chất như sắt, canxi… Chính vì thế, thịt gà có khả năng chống ung thư, bảo vệ tim mạch và giúp sáng mắt…
                        Bên cạnh thịt gà, món ăn này còn sử dụng rất nhiều loại nguyên liệu dưỡng chất khác như bột mì, gừng, hành tây… Với sự kết hợp hài hoà của các loại nguyên liệu đã tạo nên món thịt gà xá xíu vô cùng bổ dưỡng và tốt cho sức khỏe.
                        Thịt gà là nguyên liệu chính trong món ăn này, và chắc hẳn bạn cũng đã biết thịt gà là một loại thực phẩm giàu protein, vitamin A, vitamin C và các loại khoáng chất như sắt, canxi… Chính vì thế, thịt gà có khả năng chống ung thư, bảo vệ tim mạch và giúp sáng mắt…
                        Bên cạnh thịt gà, món ăn này còn sử dụng rất nhiều loại nguyên liệu dưỡng chất khác như bột mì, gừng, hành tây… Với sự kết hợp hài hoà của các loại nguyên liệu đã tạo nên món thịt gà xá xíu vô cùng bổ dưỡng và tốt cho sức khỏe.
                        Thịt gà là nguyên liệu chính trong món ăn này, và chắc hẳn bạn cũng đã biết thịt gà là một loại thực phẩm giàu protein, vitamin A, vitamin C và các loại khoáng chất như sắt, canxi… Chính vì thế, thịt gà có khả năng chống ung thư, bảo vệ tim mạch và giúp sáng mắt…
                        Bên cạnh thịt gà, món ăn này còn sử dụng rất nhiều loại nguyên liệu dưỡng chất khác như bột mì, gừng, hành tây… Với sự kết hợp hài hoà của các loại nguyên liệu đã tạo nên món thịt gà xá xíu vô cùng bổ dưỡng và tốt cho sức khỏe.
                        Thịt gà là nguyên liệu chính trong món ăn này, và chắc hẳn bạn cũng đã biết thịt gà là một loại thực phẩm giàu protein, vitamin A, vitamin C và các loại khoáng chất như sắt, canxi… Chính vì thế, thịt gà có khả năng chống ung thư, bảo vệ tim mạch và giúp sáng mắt…
                        Bên cạnh thịt gà, món ăn này còn sử dụng rất nhiều loại nguyên liệu dưỡng chất khác như bột mì, gừng, hành tây… Với sự kết hợp hài hoà của các loại nguyên liệu đã tạo nên món thịt gà xá xíu vô cùng bổ dưỡng và tốt cho sức khỏe.
                        Thịt gà là nguyên liệu chính trong món ăn này, và chắc hẳn bạn cũng đã biết thịt gà là một loại thực phẩm giàu protein, vitamin A, vitamin C và các loại khoáng chất như sắt, canxi… Chính vì thế, thịt gà có khả năng chống ung thư, bảo vệ tim mạch và giúp sáng mắt…
                        Bên cạnh thịt gà, món ăn này còn sử dụng rất nhiều loại nguyên liệu dưỡng chất khác như bột mì, gừng, hành tây… Với sự kết hợp hài hoà của các loại nguyên liệu đã tạo nên món thịt gà xá xíu vô cùng bổ dưỡng và tốt cho sức khỏe.
                        Thịt gà là nguyên liệu chính trong món ăn này, và chắc hẳn bạn cũng đã biết thịt gà là một loại thực phẩm giàu protein, vitamin A, vitamin C và các loại khoáng chất như sắt, canxi… Chính vì thế, thịt gà có khả năng chống ung thư, bảo vệ tim mạch và giúp sáng mắt…
                        Bên cạnh thịt gà, món ăn này còn sử dụng rất nhiều loại nguyên liệu dưỡng chất khác như bột mì, gừng, hành tây… Với sự kết hợp hài hoà của các loại nguyên liệu đã tạo nên món thịt gà xá xíu vô cùng bổ dưỡng và tốt cho sức khỏe.

                    </span>
                </div>
            </div>
            <div class="column2">
                <div class="category">
                    <div class="title_cate">
                        <h2>Danh Mục</h2>
                    </div>
                    <div class="content_cate">
                        <div class="cate_1">
                            <div class="icon_cate"></div>
                            <div class="text_cate"><span>Gà xá xíu lạ miệng mà ngon Mê</span></div>
                        </div>
                        <div class="cate_1">
                            <div class="icon_cate"></div>
                            <div class="text_cate"><span>Gà xá xíu lạ miệng mà ngon Mê</span></div>
                        </div>
                        <div class="cate_1">
                            <div class="icon_cate"></div>
                            <div class="text_cate"><span>Gà xá xíu lạ miệng mà ngon Mê</span></div>
                        </div>
                        <div class="cate_1">
                            <div class="icon_cate"></div>
                            <div class="text_cate"><span>Gà xá xíu lạ miệng mà ngon Mê</span></div>
                        </div>
                        <div class="cate_1">
                            <div class="icon_cate"></div>
                            <div class="text_cate"><span>Gà xá xíu lạ miệng mà ngon Mê</span></div>
                        </div>
                        <div class="cate_1">
                            <div class="icon_cate"></div>
                            <div class="text_cate"><span>Gà xá xíu lạ miệng mà ngon Mê</span></div>
                        </div>
                        <div class="cate_1">
                            <div class="icon_cate"></div>
                            <div class="text_cate"><span>Gà xá xíu lạ miệng mà ngon Mê</span></div>
                        </div>
                        <div class="cate_1">
                            <div class="icon_cate"></div>
                            <div class="text_cate"><span>Gà xá xíu lạ miệng mà ngon Mê</span></div>
                        </div>
                        <div class="cate_1">
                            <div class="icon_cate"></div>
                            <div class="text_cate"><span>Gà xá xíu lạ miệng mà ngon Mê</span></div>
                        </div>
                        <div class="cate_1">
                            <div class="icon_cate"></div>
                            <div class="text_cate"><span>Gà xá xíu lạ miệng mà ngon Mê</span></div>
                        </div>
                        <div class="cate_1">
                            <div class="icon_cate"></div>
                            <div class="text_cate"><span>Gà xá xíu lạ miệng mà ngon Mê</span></div>
                        </div>
                        <div class="cate_1">
                            <div class="icon_cate"></div>
                            <div class="text_cate"><span>Gà xá xíu lạ miệng mà ngon Mê</span></div>
                        </div>
                        <div class="cate_1">
                            <div class="icon_cate"></div>
                            <div class="text_cate"><span>Gà xá xíu lạ miệng mà ngon Mê</span></div>
                        </div>
                        <div class="cate_1">
                            <div class="icon_cate"></div>
                            <div class="text_cate"><span>Gà xá xíu lạ miệng mà ngon Mê</span></div>
                        </div>
                        <div class="cate_1">
                            <div class="icon_cate"></div>
                            <div class="text_cate"><span>Gà xá xíu lạ miệng mà ngon Mê</span></div>
                        </div>
                        <div class="cate_1">
                            <div class="icon_cate"></div>
                            <div class="text_cate"><span>Gà xá xíu lạ miệng mà ngon Mê</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="popup_login" hidden>
    <div class="wrap_popup_login">
        <h1>Đăng nhập dưới tài khoản Khách hàng</h1>
        <span class="cancle_popup">X</span>
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
                            <span class="text-capcha1">SlP6Xe</span>
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
            <button type="button" onclick="return form_validate();" class="button1" id="login">Đăng nhập</button>
        </form>
    </div>
</div>