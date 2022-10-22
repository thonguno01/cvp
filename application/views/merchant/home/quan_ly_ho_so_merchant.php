<?php
// var_dump($data_food_group);
?>
<div class="container">
    <div class="body">
        <div class="box-left">
            <div class="wrap-box-left">
                <div class="home">
                    <div class="wrap">
                        <img src="../img/home-2.svg" alt="Trang chủ">
                        <a href="/merchant-home">Trang chủ</a>
                    </div>
                </div>
                <hr>
                <div class="update-user active ">
                    <div class="wrap">
                        <img src="../img/user-edit.svg" alt="Cập nhật tài khoản ">
                        <a href="/thong-ke">Thống kê</a>
                    </div>
                </div>
                <div class="update-address ">
                    <div class="wrap">
                        <img src="../img/status-up.svg" alt="Cập nhật địa chỉ ">
                        <a href="/don-hang-hom-nay">Đơn hàng hôm nay</a>
                    </div>
                </div>
                <div class="store-save">
                    <div class="wrap">
                        <img src="../img/bag-tick_list.svg" alt="Quán ăn đã lưu">
                        <a href="lich-su-don-hang">Lịch sử đơn hàng</a>
                    </div>
                </div>
                <div class="admin_profile">
                    <div class="wrap">
                        <img src="../img/edit.svg" alt="Quán ăn đã lưu">
                        <a href="">Quản lý hồ sơ</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-right">
            <div class="row_1">
                <h2>Quản lý hồ sơ</h2>
            </div>
            <?php
            foreach ($list as $key => $data_mer) {
            ?>
                <div class="row_2">
                    <div class="avatar"><img src="upload/merchant/infor/<?= $data_mer["img_cover"] ?>" alt=""></div>
                    <div class="infor">
                        <div class="liked">
                            <button><span></span>Được yêu thích</button>
                            <a><?= $typeMerchant[$data_mer["type_merchant"]] ?></a>
                        </div>
                        <div class="name_mer">
                            <h2><?= $data_mer["name_merchant"] ?></h2>
                        </div>
                        <?php
                        $city = $this->Generals_model->get_where('city2', ['cit_id' => $data_mer["id_city"]]);
                        $district = $this->Generals_model->get_where('city2', ['cit_id' => $data_mer["id_district"]]);
                        ?>
                        <div class="add"><span><?= $data_mer["address"]?>,
                        <?php
                         foreach($district as $key => $districtdt){
                            echo $districtdt["cit_name"];
                         }
                         ?>, 
                         <?php
                         foreach($city as $key => $citydt){
                            echo $citydt["cit_name"];
                         }
                         ?>
                         </span></div>
                        <div class="rating">
                            <span>Đánh giá chung:</span>
                            <div class="star"></div>
                            <div class="star"></div>
                            <div class="star"></div>
                            <div class="star"></div>
                            <div class="star"></div>
                            <a>999+</a>
                        </div>
                        <div class="contact">
                            <span>Liên hệ: <a><?= $data_mer["phone"] ?></a></span>
                        </div>
                        <div class="status_open">
                            <div class="status">
                                <?php
                                $gettime2 = strtotime($gettime2);
                                $open = strtotime($hour[$data_mer["time_start"]]);
                                $close = strtotime($hour[$data_mer["time_end"]]);
                                if ($open <= $gettime2 and $close >= $gettime2) {
                                ?>
                                    <a></a><span style="color: #88E877;">Mở cửa</span>
                                <?php
                                } else {
                                ?>
                                    <a style="background: url(../img/status_close.png) no-repeat; background-position: center"></a><span style="color: #FF7675;">Đóng cửa</span>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="open">
                                <a></a><span><?= $hour[$data_mer["time_start"]] ?> - <?= $hour[$data_mer["time_end"]] ?></span>
                            </div>
                        </div>
                        <div class="khung_gia">
                            <a></a><span>
                                <?php
                                foreach ($get_min as $key => $min) {
                                ?>
                                    <?= $min["price_food"] ?>
                                <?php
                                }
                                ?>
                                -
                                <?php
                                foreach ($get_max as $key => $max) {
                                ?>
                                    <?= $max["price_food"] ?>
                                <?php
                                }
                                ?>
                            </span>

                        </div>
                        <div class="fee">
                            <span>Phí ship: <a><?= $data_mer["fee_ship"] ?>đ</a>/1km</span>
                        </div>
                    </div>
                    <div class="action">
                        <div class="but_1">
                            <button onclick="lam_moi_ho_so()"><span></span>Làm mới hồ sơ</button>
                        </div>
                        <div class="but_2">
                            <button onclick="chinh_sua_thong_tin()"><span></span>Chỉnh sửa thông tin</button>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
            <div class="form_01" id="form_01">
                <div class="row_3">
                    <div class="post">
                        <button type="button" id="btn1">Bài viết</button>
                    </div>
                    <div class="menu">
                        <button type="button" id="btn2">Thực đơn</button>
                    </div>
                    <div class="rating">
                        <button type="button" id="btn3">Đánh giá</button>
                    </div>
                </div>
                <?php
                foreach ($list as $key => $data_mer) {
                ?>
                    <div class="row_4">
                        <div class="anh_bia">
                            <img src="upload/merchant/infor/<?= $data_mer["img_cover"] ?>" alt="">
                        </div>
                        <div class="post">
                            <div class="emotion">
                                <div class="avt"><img src="upload/merchant/infor/<?= $data_mer["img_avatar"] ?>" alt=""></div>
                                <div class="popup_emo" id="popup_post_show"><input type="text" readonly placeholder="Chủ quán ơi, bạn đang nghĩ gì thế ?" name="" id=""></div>
                            </div>
                            <div class="vehicle">
                                <button class="video" id="video">
                                    <div class="img"></div>
                                    <span>Video</span>
                                </button>
                                <button class="hinh_anh" id="hinh_anh">
                                    <div class="img"></div>
                                    <span>Hình ảnh</span>
                                </button>
                                <button class="cam_xuc" id="cam_xuc">
                                    <div class="img"></div>
                                    <span>Cảm xúc/hoạt động</span>
                                </button>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
                <?php
                foreach ($post_data as $key => $post) {
                ?>
                    <div class="row_5">
                        <div class="task_infor">
                            <?php
                            foreach ($list as $key => $data_mer) {
                            ?>
                                <div class="avt_task"><img class="post_img_data" src="upload/merchant/infor/<?= $data_mer["img_avatar"] ?>" alt=""></div>
                                <div class="title_task">
                                    <div class="title">
                                        <h2 class="post_name_data"><?= $data_mer["name_merchant"] ?></h2>
                                    <?php
                                }
                                    ?>
                                    <span>Đã thêm <?php
                                                    $tach_img_vid = explode(",", $post["img_video"]);
                                                    $soluong = count($tach_img_vid);
                                                    echo $soluong;
                                                    if($post["video"] != ''){
                                                        $echo = "và 1 video";
                                                    }
                                                    else{
                                                        $echo = "";
                                                    }
                                                    ?> ảnh <?php echo $echo?> mới</span>
                                    </div>
                                    <div class="time_task">
                                        <span><?= $post["created_at"] ?></span>
                                        <!-- <span>22 tháng 11 </span><span> lúc </span><span> 15:31</span> -->
                                    </div>
                                </div>
                                <div class="action">
                                    <button class="but_action"></button>
                                    <div class="action_down">
                                        <?php
                                        if($post["merchant_id"] == $check_ath->id){
                                        ?>
                                        
                                        <button class="edit_post" onclick="edit_post(this,<?= $post['id']?>)">Chỉnh sửa bài viết</button>
                                        
                                        <?php
                                        }
                                        else{
                                        ?>
                                        <button onclick="report_btn(<?= $post['id']?>)">Báo cáo bài viết</button>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                        </div>
                        <div class="anh_post">
                            <?php
                            $anh_them = $soluong - 2;
                            $video_them = $soluong - 1;
                            if($post["video"] == ''){
                                if($soluong > 2){
                            ?>
                            <img class="css_them" src="upload/merchant/food/<?= $tach_img_vid[0] ?>" alt="">
                            <div class="uurrrr">
                                <div class="zin">+<?= $anh_them?></div>
                            <img src="upload/merchant/food/<?= $tach_img_vid[1] ?>" alt="">
                            </div>
                            <?php
                                }
                                if($soluong < 2){
                            ?>
                            <img src="upload/merchant/food/<?= $tach_img_vid[0] ?>" alt="">
                            <?php
                                }
                                if($soluong == 2){
                            ?>
                                <img class="css_them" src="upload/merchant/food/<?= $tach_img_vid[0] ?>" alt="">
                                <img class="css_them" src="upload/merchant/food/<?= $tach_img_vid[1] ?>" alt="">
                            <?php
                                }
                            }
                            else{
                                if($soluong > 1){
                            ?>
                                <video controls src="upload/merchant/food/<?= $post["video"] ?>"></video>
                                <div class="uurrrr">
                                <div class="zin">+<?= $video_them?></div>
                                <img src="upload/merchant/food/<?= $tach_img_vid[0] ?>" alt="">
                                </div>
                            <?php
                                }
                                else{
                            ?>
                                <video controls src="upload/merchant/food/<?= $post["video"] ?>"></video>
                                <img src="upload/merchant/food/<?= $tach_img_vid[0] ?>" alt="">
                            <?php
                                }
                            }
                            ?>
                            
                            
                        </div>
                        <div class="content_post">
                            <span class="post_content_data">
                                <?= $post["content"] ?>
                            </span>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>

            <div class="form_02" id="form_02">
                <div class="row_3_f2">
                    <div class="post">
                        <button type="button" id="btn1a">Bài viết</button>
                    </div>
                    <div class="menu">
                        <button type="button" id="btn2a">Thực đơn</button>
                    </div>
                    <div class="rating">
                        <button type="button" id="btn3a">Đánh giá</button>
                    </div>
                </div>
                <div class="content_menu">
                    <div class="option_menu">
                        <a href="#data_01">Món ăn cố định</a>
                        <a href="#data_02">Món ăn theo ngày</a>
                        <a href="#data_03">Combo</a>
                        <a href="#data_04">Nhóm món ăn của quán</a>
                    </div>
                    <div class="data_list">
                        <div class="data_01" id="data_01">
                            <div class="tit_data">
                                <h2>Món ăn cố định</h2>
                                <div class="sl_all">
                                    <button></button>
                                </div>
                            </div>
                            <div class="list_mon">
                                <?php
                                foreach ($data_food_detail as $key => $v_food_detail) {
                                ?>
                                    <div class="mon_ct" id="detail_dom_<?= $v_food_detail['id'] ?>">
                                        <div class="img"><img src="upload/merchant/food/<?= $v_food_detail["img_food"] ?>" alt=""></div>
                                        <div class="note_mon">
                                            <h2><?= $v_food_detail["name_food"] ?></h2>
                                            <span><?= $v_food_detail["description"] ?>.</span>
                                        </div>
                                        <div class="money_sale">
                                            <span><?= $v_food_detail["price_food"] ?><span>đ</span></span>
                                            <h2><?= $v_food_detail["price_food"] ?><h2>đ</h2>
                                            </h2>
                                        </div>
                                        <div class="action_edit edit_mon_an" onclick="editMon(<?= $v_food_detail['id'] ?>)"></div>
                                        <input type="hidden" value="<?= $v_food_detail["name_food"] ?>" id="name_detail_<?= $v_food_detail['id'] ?>">
                                        <div class="action_delete" onclick="delete_detail(<?= $v_food_detail['id'] ?>)"></div>
                                        <div class="action_sl_all">
                                            <input type="checkbox">
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="delete_choose">
                                <button>Xóa các món đã chọn</button>
                            </div>
                        </div>
                        <div class="data_02" id="data_02">
                            <div class="tit_data">
                                <h2>Món ăn theo ngày</h2>
                                <select>
                                    <option value="">Thứ 2</option>
                                </select>
                                <div class="sl_all">
                                    <button></button>
                                </div>
                            </div>
                            <div class="list_mon">
                                <?php
                                foreach ($data_food_detail_day as $key => $detail_day) {
                                ?>
                                    <div class="mon_ct" id="day_dom_<?= $detail_day["id"] ?>">
                                        <div class="img"><img src="upload/merchant/food/<?= $detail_day["img_food"] ?>" alt=""></div>
                                        <div class="note_mon">
                                            <h2><?= $detail_day["name_food"] ?></h2>
                                            <span><?= $detail_day["description"] ?>.</span>
                                        </div>
                                        <div class="money_sale">
                                            <span><?= $detail_day["price_food"] ?><span>đ</span></span>
                                            <h2><?= $detail_day["price_food"] ?><h2>đ</h2>
                                            </h2>
                                        </div>
                                        <div class="action_edit" onclick="editMon(<?= $detail_day['id'] ?>)"></div>
                                        <input type="hidden" id="name_day_<?= $detail_day["id"] ?>" value="<?= $detail_day["name_food"] ?>">
                                        <div class="action_delete" onclick="delete_day(<?= $detail_day['id'] ?>)"></div>
                                        <div class="action_sl_all">
                                            <input type="checkbox">
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="delete_choose">
                                <button>Xóa các món đã chọn</button>
                            </div>
                        </div>
                        <div class="data_03" id="data_03">
                            <div class="tit_data">
                                <h2>Combo</h2>
                                <div class="sl_all">
                                    <button></button>
                                </div>
                            </div>
                            <div class="list_mon"> 
                                <?php
                                foreach ($data_food_combo as $key => $combo) {
                                ?>
                                    <div class="mon_ct" id="combo_dom_<?= $combo["id"] ?>">
                                        <div class="img"><img src="upload/merchant/food/<?= $combo["img_combo"] ?>" alt=""></div>
                                        <div class="note_mon">
                                            <h2><?= $combo["name_combo"] ?></h2>
                                            <?php
                                            $tach_id_food = explode(",", $combo["detail_menu_combo_id"]);
                                            foreach ($tach_id_food as $key => $id_food) {
                                            ?>
                                                <span>
                                                    <?php
                                                    $name_foods = $this->Generals_model->get_list2('detail_menu', ['id' => $id_food]);
                                                    // var_dump($name_foods);
                                                    foreach ($name_foods as $key => $name_food) {
                                                    ?>
                                                        <?= $name_food["name_food"] ?><br>
                                                    <?php
                                                    }
                                                    ?>
                                                </span>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="money_sale">
                                            <?php 
                                            if($combo["sale"] == 0){
                                            ?>
                                            <h2 style="padding-top: 40%;"><?= number_format($combo["price_combo"]) ?>đ</h2>
                                            <?php 
                                            }
                                            else{
                                                $after_sale = ($combo["price_combo"] * $combo["sale"]) / 100
                                            ?>
                                            <span><?= number_format($combo["price_combo"]) ?>đ</span>
                                            <h2 style="padding-top: 8%;"><?= number_format($after_sale) ?>đ</h2>
                                            <?php 
                                            }
                                            ?>
                                            </h2>
                                        </div>
                                        
                                        <input type="hidden" id="name_combo_<?= $combo["id"]?>" value="<?= $combo["name_combo"]?>">
                                        <input type="hidden" id="detail_menu_combo_id_<?= $combo["id"]?>" value="<?= $combo["detail_menu_combo_id"]?>">
                                        <input type="hidden" id="price_combo_<?= $combo["id"]?>" value="<?= $combo["price_combo"]?>">
                                        <input type="hidden" id="img_combo_<?= $combo["id"]?>" value="<?= $combo["img_combo"]?>">
                                        <input type="hidden" id="day_service_<?= $combo["id"]?>" value="<?= $combo["day_service"]?>">
                                        <div class="action_edit" onclick="edit_combo(<?= $combo['id'] ?>)"></div>
                                        
                                        <div class="action_delete" onclick="delete_combo(<?= $combo['id'] ?>)"></div>
                                        <div class="action_sl_all">
                                            <input type="checkbox">
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="delete_choose">
                                <button>Xóa các món đã chọn</button>
                            </div>
                        </div>
                        <div class="data_04" id="data_04">
                            <div class="tit_data">
                                <h2>Nhóm</h2>
                                <div class="sl_all">
                                    <button></button>
                                </div>
                            </div>
                            <div class="list_mon">
                                <?php
                                foreach ($data_food_group as $group) {
                                ?>
                                    <div id="group_dom_<?= $group['id'] ?>">
                                        <div class="tit_action">
                                            <div class="tit">
                                                <h2><?= $group["name_group"] ?></h2>
                                            </div>
                                            <div class="action">
                                                <button class="dele_gr" onclick="delete_group(<?= $group['id'] ?>)">Xóa nhóm</button>
                                                
                                                <input type="hidden" id="name_group_<?= $group["id"] ?>" value="<?= $group["name_group"]?>">
                                                <input type="hidden" id="detail_menu_group_id_<?= $group["id"]?>" value="<?= $group["detail_menu_group_id"] ?>">
                                                <button class="edit_gr"  onclick="edit_group(<?= $group['id'] ?>)"></button>
                                            </div>
                                        </div>
                                        <?php
                                        $tach_group = explode(",", $group["detail_menu_group_id"]);
                                        foreach ($tach_group as $id_food) {
                                            $data_food = $this->Generals_model->get_list2('detail_menu', ['id' => $id_food]);
                                        ?>
                                            <?php
                                            foreach ($data_food as $inf_food) {
                                            ?>
                                                <div class="mon_ct">
                                                    <div class="img"><img src="upload/merchant/food/<?= $inf_food["img_food"] ?>" alt=""></div>
                                                    <div class="note_mon">
                                                        <h2><?= $inf_food["name_food"] ?></h2>
                                                        <span><?= $inf_food["description"] ?>.</span>
                                                    </div>
                                                    <div class="money_sale">
                                                        <span><?= $inf_food["price_food"] ?><span>đ</span></span>
                                                        <h2><?= $inf_food["price_food"] ?><h2>đ</h2>
                                                        </h2>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form_03" id="form_03">
                <div class="row_3_f3">
                    <div class="post">
                        <button type="button" id="btn1b">Bài viết</button>
                    </div>
                    <div class="menu">
                        <button type="button" id="btn2b">Thực đơn</button>
                    </div>
                    <div class="rating">
                        <button type="button" id="btn3b">Đánh giá</button>
                    </div>
                </div>
                <div class="box-2">
                    <div class="sidebar-left">
                        <div class="block-1">

                        </div>
                        <div class="block-02">
                            <div class="wrap-block-02">
                                <div class="feed-back">
                                    <p class="title">Tổng số đánh giá đã được đăng</p>
                                    <hr>
                                    <div class="see-feedback">
                                        <div class="img_fback">
                                            <img src="../img/star_feedback.svg" alt="Đánh giá">
                                            <img src="../img/star_feedback_rong.png" alt="Đánh giá">
                                            <img src="../img/star_feedback_rong.png" alt="Đánh giá">
                                            <img src="../img/star_feedback_rong.png" alt="Đánh giá">
                                            <img src="../img/star_feedback_rong.png" alt="Đánh giá">
                                        </div>
                                        <span> <?= $countStar['star1'] . ' ' ?>lượt đánh giá </span>
                                    </div>
                                    <div class="see-feedback">
                                        <div class="img_fback">
                                            <img src="../img/star_feedback.svg" alt="Đánh giá">
                                            <img src="../img/star_feedback.svg" alt="Đánh giá">
                                            <img src="../img/star_feedback_rong.png" alt="Đánh giá">
                                            <img src="../img/star_feedback_rong.png" alt="Đánh giá">
                                            <img src="../img/star_feedback_rong.png" alt="Đánh giá">
                                        </div>
                                        <span> <?= $countStar['star2']  ?> lượt đánh giá </span>
                                    </div>
                                    <div class="see-feedback">
                                        <div class="img_fback">
                                            <img src="../img/star_feedback.svg" alt="Đánh giá">
                                            <img src="../img/star_feedback.svg" alt="Đánh giá">
                                            <img src="../img/star_feedback.svg" alt="Đánh giá">
                                            <img src="../img/star_feedback_rong.png" alt="Đánh giá">
                                            <img src="../img/star_feedback_rong.png" alt="Đánh giá">
                                        </div>
                                        <span> <?= $countStar['star3']  ?> lượt đánh giá </span>
                                    </div>
                                    <div class="see-feedback">
                                        <div class="img_fback">
                                            <img src="../img/star_feedback.svg" alt="Đánh giá">
                                            <img src="../img/star_feedback.svg" alt="Đánh giá">
                                            <img src="../img/star_feedback.svg" alt="Đánh giá">
                                            <img src="../img/star_feedback.svg" alt="Đánh giá">
                                            <img src="../img/star_feedback_rong.png" alt="Đánh giá">
                                        </div>
                                        <span> <?= $countStar['star4']  ?> lượt đánh giá </span>
                                    </div>
                                    <div class="see-feedback">
                                        <div class="img_fback">
                                            <img src="../img/star_feedback.svg" alt="Đánh giá">
                                            <img src="../img/star_feedback.svg" alt="Đánh giá">
                                            <img src="../img/star_feedback.svg" alt="Đánh giá">
                                            <img src="../img/star_feedback.svg" alt="Đánh giá">
                                            <img src="../img/star_feedback.svg" alt="Đánh giá">
                                        </div>
                                        <span> <?= $countStar['star5']  ?> lượt đánh giá </span>
                                    </div>
                                    <div class="total">
                                        <span><?php echo  array_sum($countStar); ?> lượt đánh giá</span>
                                    </div>
                                </div>
                                <hr>
                                <div class="criteria-feedback">
                                    <div class="title-criteria">
                                        <p>Tiêu chí đánh giá</p>
                                    </div>
                                    <div class="wrap-criteria-feedback">
                                        <div class="see-feedback">
                                            <span> Chất lượng </span>
                                            <div class="img_fback">
                                                <img src="../img/star_feedback.svg" alt="Đánh giá">
                                                <img src="../img/star_feedback.svg" alt="Đánh giá">
                                                <img src="../img/star_feedback.svg" alt="Đánh giá">
                                                <img src="../img/star_feedback_rong.png" alt="Đánh giá">
                                                <img src="../img/star_feedback_rong.png" alt="Đánh giá">
                                            </div>
                                        </div>
                                        <div class="see-feedback">
                                            <span>Phục vụ </span>
                                            <div class="img_fback">
                                                <img src="../img/star_feedback.svg" alt="Đánh giá">
                                                <img src="../img/star_feedback.svg" alt="Đánh giá">
                                                <img src="../img/star_feedback.svg" alt="Đánh giá">
                                                <img src="../img/star_feedback.svg" alt="Đánh giá">
                                                <img src="../img/star_feedback_rong.png" alt="Đánh giá">
                                            </div>
                                        </div>
                                        <div class="see-feedback">
                                            <span> Giá cả</span>
                                            <div class="img_fback">
                                                <img src="../img/star_feedback.svg" alt="Đánh giá">
                                                <img src="../img/star_feedback.svg" alt="Đánh giá">
                                                <img src="../img/star_feedback.svg" alt="Đánh giá">
                                                <img src="../img/star_feedback.svg" alt="Đánh giá">
                                                <img src="../img/star_feedback.svg" alt="Đánh giá">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="feedback-average">
                                    <div class="title">
                                        <p>Đánh giá trung bình</p>
                                    </div>

                                    <div class="average">
                                        <div class="see-feedback">
                                            <?php
                                            $average =   (int)$countStar['star1'] + 2 * (int)$countStar['star2'] + 3 * (int)$countStar['star3'] +  4 * (int)$countStar['star4'] + 5 * (int)$countStar['star5']
                                            ?>
                                            <span class="point"> <?php if ($average != 0) {
                                                                        echo $average / array_sum($countStar);
                                                                    } else {
                                                                        echo array_sum($countStar);
                                                                    } ?> <span class="all">/5</span></span>
                                            <div class="img_fback">
                                                <img src="../img/star_feedback.svg" alt="Đánh giá">
                                                <img src="../img/star_feedback.svg" alt="Đánh giá">
                                                <img src="../img/star_feedback.svg" alt="Đánh giá">
                                                <img src="../img/star_feedback.svg" alt="Đánh giá">
                                                <img src="../img/star_feedback.svg" alt="Đánh giá">
                                            </div>
                                            <div class="percent_feedback">
                                                <div class="wrap-percent-5-star">
                                                    <div class="wrap-five-star">
                                                        <img src="../img/star_feedback.svg" alt="Đánh giá">
                                                        <img src="../img/star_feedback.svg" alt="Đánh giá">
                                                        <img src="../img/star_feedback.svg" alt="Đánh giá">
                                                        <img src="../img/star_feedback.svg" alt="Đánh giá">
                                                        <img src="../img/star_feedback.svg" alt="Đánh giá">
                                                    </div>
                                                    <div class="line-five-star">
                                                        <input type="range" min="0" value="<?= $countStar['star5']  ?>" max="<?= array_sum($countStar) ?>">
                                                    </div>
                                                </div>

                                                <div class="wrap-percent-4-star">
                                                    <div class="wrap-four-star">
                                                        <img src="../img/star_feedback.svg" alt="Đánh giá">
                                                        <img src="../img/star_feedback.svg" alt="Đánh giá">
                                                        <img src="../img/star_feedback.svg" alt="Đánh giá">
                                                        <img src="../img/star_feedback.svg" alt="Đánh giá">
                                                    </div>
                                                    <div class="line-four-star">
                                                        <input type="range" min="0" value="<?= $countStar['star4']  ?>" max="<?= array_sum($countStar) ?>">
                                                    </div>
                                                </div>
                                                <div class="wrap-percent-3-star">
                                                    <div class="wrap-three-star">
                                                        <img src="../img/star_feedback.svg" alt="Đánh giá">
                                                        <img src="../img/star_feedback.svg" alt="Đánh giá">
                                                        <img src="../img/star_feedback.svg" alt="Đánh giá">
                                                    </div>
                                                    <div class="line-three-star">
                                                        <input type="range" min="0" value="<?= $countStar['star3']  ?>" max="<?= array_sum($countStar) ?>">
                                                    </div>
                                                </div>
                                                <div class="wrap-percent-2-star">
                                                    <div class="wrap-tow-star">
                                                        <img src="../img/star_feedback.svg" alt="Đánh giá">
                                                        <img src="../img/star_feedback.svg" alt="Đánh giá">
                                                    </div>
                                                    <div class="line-four-star">
                                                        <input type="range" min="0" value="<?= $countStar['star2']  ?>" max="<?= array_sum($countStar) ?>">
                                                    </div>
                                                </div>
                                                <div class="wrap-percent-1-star">
                                                    <div class="wrap-one-star">
                                                        <img src="../img/star_feedback.svg" alt="Đánh giá">
                                                    </div>
                                                    <div class="line-one-star">
                                                        <input type="range" min="0" value="<?= $countStar['star1']  ?>" max="<?= array_sum($countStar) ?>">
                                                    </div>
                                                </div>
                                                <div class="num-feedback">
                                                    <span><?= array_sum($countStar) ?> lượt đánh giá </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <button class="btn_like_store">
                                    <img src="../img/like.svg" alt="Yêu Thích">
                                    <span><?= count($merYeuThich) ?> lượt yêu thích</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="box02-right">
                        <div class="menu">
                            <div class="menu-left">
                                <p>Tất cả hình ảnh</p>
                            </div>
                            <div class="menu-right">
                                <span class="menu-img" onclick="getImgAll(this,'video' , 'menu_active' , <?= $check_ath->id ?> )">Video
                                    <hr>
                                </span>
                                <span class="menu-img" onclick="getImgAll(this,'1' , 'menu_active' , <?= $check_ath->id ?> )">không gian
                                    <hr>
                                </span>
                                <span class="menu-img " onclick="getImgAll(this,'2' , 'menu_active' , <?= $check_ath->id ?> )">món ăn
                                    <hr>
                                </span>
                                <span class="menu-img" onclick="getImgAll(this,'3' , 'menu_active' , <?= $check_ath->id ?> )">thực đơn
                                    <hr>
                                </span>
                            </div>
                        </div>
                        <hr>
                        <div class="menu-image">
                            <div class="image" id="image">
                                <?php
                                foreach ($imgAlls as $img) {
                                    if ($img != null) {
                                        foreach ($img as $item) {
                                            echo '<img src="/upload/feed-back/' . $item . '" alt="Tất cả ảnh ">';
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="bar-menu-feedback">
                            <div class="menu-feedback">
                                <div class="menu-fback-left">
                                    <a href="../home/feed-back-stored-customer-after-lohin.html">Đánh giá</a>
                                </div>
                                <div class="menu-fback-right">
                                    <span onclick="getFeedBack(this, '0', 'mnfbr-active',<?= $check_ath->id ?>)" class="mnfbr">Đánh giá không hình ảnh
                                        <hr>
                                    </span>
                                    <span onclick="getFeedBack(this, '1','mnfbr-active' ,<?= $check_ath->id ?>)" class="mnfbr ">Đánh giá Có hình ảnh
                                        <hr>
                                    </span>
                                    <span onclick="getFeedBack(this, 'vi','mnfbr-active' ,<?= $check_ath->id ?>)" class="mnfbr">Đánh giá Có video
                                        <hr>
                                    </span>
                                </div>
                                <div class="wrap-buton">
                                    <button class="arrow-left"></button>
                                    <button class="arrow-right"></button>
                                </div>
                            </div>
                        </div>
                        <hr class="hr2">
                        <div class="wrap-comment">

                            <?php
                            if (!empty($feedbacks)) {
                                foreach ($feedbacks as $feedback) {
                            ?>
                                    <div class="comment">
                                        <div class="avat-comment">
                                            <img src="upload/information/<?= $feedback['infoCus']['img_avata'] ?>" alt="ảnh đại diện người comment ">
                                        </div>
                                        <div class="info-commenter">
                                            <div class="name-commenter">
                                                <span class="name_cmter"><?= $feedback['infoCus']['name'] ?></span>
                                                <div class="num-img">
                                                    <img src="../img/more.svg" alt="Tùy chọn">
                                                </div>
                                            </div>
                                            <div class="cmt-start">
                                                <?php
                                                // for($i = 0 ; $i < )
                                                ?>
                                                <img src="../img/star_feedback.svg" alt="comment sao">
                                                <img src="../img/star_feedback.svg" alt="comment sao">
                                                <img src="../img/star_feedback.svg" alt="comment sao">
                                                <img src="../img/star_feedback.svg" alt="comment sao">
                                                <img src="../img/star_feedback.svg" alt="comment sao">
                                            </div>
                                            <div class="cmt-contnet">
                                                <p><?= $feedback['comment'] ?></p>
                                            </div>
                                            <div class="toppic-cmt">
                                                <span><?= $feedback['label'] ?></span>
                                            </div>
                                            <div class="detail-order">
                                                <div class="thea">
                                                    <a href=""> Chi tiết đơn hàng </a>
                                                </div>
                                                <div class="img-detail-order">
                                                    <?php
                                                    if ($feedback['img_order'] != null) {
                                                        $imgFeed = explode(',', $feedback['img_order']);
                                                        foreach ($imgFeed as $v) {
                                                            echo  '<img src="/upload/feed-back/' . $v . '" alt="">';
                                                        }
                                                    }
                                                    if ($feedback['video_order'] != null) {
                                                        $imgFeed = explode(',', $feedback['video_order']);
                                                        foreach ($imgFeed as $v) {
                                                            echo ' <video controls><source src="' . $v . '" type=""></video>';
                                                        }
                                                    }
                                                    ?>
                                                    <video controls>
                                                        <source src="" type="">
                                                    </video>
                                                </div>
                                            </div>
                                            <!-- <div class="button-like-cmt">
                                    <button class="button-like">
                                        <img src="../img/like-food.svg" alt="Lượt thích">
                                        <span class="num-like">10</span>
                                    </button>
                                    <button class="button-cmt">
                                        <img src="../img/cmt-post.svg" alt="Lượt comment">
                                        <span class="num-cmt">10</span>
                                    </button>
                                </div> -->
                                            <div class="reply-store">
                                                <div class="store">
                                                    <a href="">Phản hồi của quán </a>
                                                </div>
                                                <div class="cmt-store">
                                                    <p>Dạ, cảm ơn bạn đã tin tưởng và ủng hộ SƯỜN MƯỜI. Hẹn gặp bặn vào những đặt đồ ăn tiếp theo tại SƯỜN MƯỜI nhé !!!</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                            <?php }
                            } ?>
                        </div>
                        <div class="pagination">
                            <div class="size">
                                <img src="../img/pre.svg" alt="Lùi về 1 trang">
                                <a class="pagnate-avtive" href="">1</a>
                                <a class="pagnate-no-avtive" href="">2</a>
                                <a class="pagnate-no-avtive" href="">3</a>
                                <a class="pagnate-no-avtive" href="">4</a>
                                <a class="pagnate-no-avtive" href="">5</a>
                                <a class="pagnate-no-avtive" href="">6</a>
                                <a class="pagnate-no-avtive" href="">7</a>
                                <img src="../img/next.svg" alt="Tiến lên 1 trang">

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php
    foreach ($list as $key => $data_mer) {
    ?>
        <div class="popup_profile_new" id="popup_profile_new">
            <div class="popup_profile_body">
                <div class="r1">
                    <div class="tit">
                        <h2>Chỉnh sửa thông tin cơ bản</h2>
                        <span>Cập nhật các trường thông tin</span>
                    </div>
                    <div class="close"><span class="close-btn" id="close-btn-new">×</span></div>
                </div>
                <div class="r2">
                    <div class="input_if">
                        <div class="name_mer">
                            <span>Tên quán<span style="color: red;">*</span></span><span id="error_message_name"></span>
                            <input type="text" name="" id="name_merchant" placeholder="Nhập tên quán" value="<?= $data_mer["name_merchant"] ?>">
                        </div>
                        <div class="do_an">
                            <span>Loại đồ ăn đặc trưng<span style="color: red;">*</span></span><span id="error_message_typical_food"></span>
                            <input type="text" name="" id="typical_food" placeholder="Nhập món ăn" value="<?= $data_mer["typical_food"] ?>">
                        </div>
                        <div class="phone_mer">
                            <span>Số điện thoại<span style="color: red;">*</span></span><span id="error_message_phone"></span>
                            <input type="text" name="" id="phone_merchant" placeholder="Nhập số điện thoại liên lạc" value="<?= $data_mer["phone"] ?>">
                        </div>
                        <div class="city_mer">
                            <span>Thành phố<span style="color: red;">*</span></span><span id="error_message_city"></span>
                            <select class="form-select" name="" id="id_city">
                                <?php
                                $district = $this->Generals_model->get_one_where('city2', ['cit_id' => $data_mer["id_city"]]);
                                ?>
                                <option value="<?= $data_mer["id_city"] ?>" selected><?= $district->cit_name ?></option>
                                <?php
                                $city = $this->Generals_model->get_city('city2');
                                foreach ($city as $key => $value) {
                                ?>
                                    <option value="<?= $value['cit_id'] ?>"><?= $value['cit_name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="district_mer">
                            <span>Quận/Huyện<span style="color: red;">*</span></span><span id="error_message_district"></span>
                            <select class="form-select" name="" id="id_district">
                                <?php
                                $district = $this->Generals_model->get_one_where('city2', ['cit_id' => $data_mer["id_district"]]);
                                ?>
                                <option value="<?= $data_mer["id_district"] ?>" selected><?= $district->cit_name ?></option>
                            </select>
                        </div>
                        <div class="street_mer">
                            <span>Số nhà và đường/phố<span style="color: red;">*</span></span><span id="error_message_add"></span>
                            <input type="text" name="" id="add_merchant" placeholder="Nhập địa chỉ cụ thể" value="<?= $data_mer["address"] ?>">
                        </div>
                        <div class="action">
                            <button class="huy" id="huy">Hủy</button>
                            <button class="luu" type="button" id="save_detail_info" onclick="return form_validate_info();">Lưu</button>
                        </div>
                    </div>
                    <div class="map_if">
                        <h2>Định vị trên Map</h2>
                        <div class="map"> <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7838.684254869503!2d106.70676642475235!3d10.785086936675276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1547181657956" width="100%" height="100%" frameborder="0" style="border:0; border-radius: 20px;" allowfullscreen></iframe></div>
                        <button>Xác nhận vị trí</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="popup_profile_chitiet" id="popup_profile_chitiet">
            <div class="popup_chitiet_body">
                <div class="r1">
                    <div class="tit">
                        <h2>Chỉnh sửa thông tin quán chi tiết</h2>
                        <span>Cập nhật các trường thông tin</span>
                    </div>
                    <div class="close"><span class="close-btn" id="close-btn-chitiet">×</span></div>
                </div>
                <div class="r2">
                    <form action="">
                        <div class="input_info">
                            <div class="time_open">
                                <div class="open_1">
                                    <h2>Thời gian mở cửa:</h2>
                                    <select name="" id="day_open">
                                        <option selected value="<?= $data_mer["day_open"] ?>"><?= $day[$data_mer["day_open"]] ?></option>
                                        <?php
                                        for ($i = 0; $i < 8; $i++) {
                                        ?>
                                            <option value="<?= $i ?>"><?= $day[$i] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="open_2">
                                    <h2>Khung giờ:</h2>
                                    <select name="" id="time_start">
                                        <option selected value="<?= $data_mer["time_start"] ?>"><?= $hour[$data_mer["time_start"]] ?></option>
                                        <?php
                                        for ($i = 0; $i < 48; $i++) {
                                        ?>
                                            <option value="<?= $i ?>"><?= $hour[$i] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select> -
                                    <select name="" id="time_end">
                                        <option selected value="<?= $data_mer["time_end"] ?>"><?= $hour[$data_mer["time_end"]] ?></option>
                                        <?php
                                        for ($i = 0; $i < 48; $i++) {
                                        ?>
                                            <option value="<?= $i ?>"><?= $hour[$i] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="type">
                                <h2>Loại hình quán<span>*</span></h2>
                                <select name="" id="type_merchant">
                                    <option selected value="<?= $data_mer["type_merchant"] ?>"><?= $typeMerchant[$data_mer["type_merchant"]] ?></option>
                                    <?php
                                    for ($i = 0; $i < 7; $i++) {
                                    ?>
                                        <option value="<?= $i ?>"><?= $typeMerchant[$i] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="culinary">
                                <h2>Ẩm thực<span>*</span></h2>
                                <select name="" id="culinary">
                                    <option selected value="1">Món Việt</option>
                                </select>
                            </div>
                            <div class="search">
                                <h2>Từ khóa tìm kiếm</h2>
                                <input type="text" id="key_search" value="<?= $data_mer["search_key"] ?>" placeholder="Ví dụ: Cơm sườn bì, Cơm chiên, Phở bò, Mỳ Quảng, Phở trộn,.....">
                            </div>
                            <div class="ship_fee">
                                <h2>Phí ship<span>*</span><span id="error_message_fee"></span></h2>
                                <div class="in_fee">
                                    <input type="number" id="fee" placeholder="0đ" value="<?= $data_mer["fee_ship"] ?>">
                                    <select name="" id="">
                                        <option value="">1km</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mota">
                                <h2>Mô tả về quán<span>*</span><span id="error_message_mota"></span></h2>
                                <input type="text" id="mo_ta" placeholder="Nhập mô tả..." value="<?= $data_mer["description"] ?>">
                            </div>
                            <div class="next_st2">
                                <button type="button" id="huy_chitiet" class="back">Hủy</button>
                                <button type="button" onclick="return form_validate_chitiet()">Lưu</button>
                            </div>
                        </div>
                        <div class="anh">
                            <div class="avatar_anh">
                                <h2>Ảnh đại diện</h2>
                                <div class="img"><img src="upload/merchant/infor/<?= $data_mer["img_avatar"] ?>" alt="" id="image"></div>
                                <button>Tải ảnh lên<input type="file" id="img_avatar" value="<?= $data_mer["img_avatar"] ?>" onchange="chooseFile(this)" accept=".jpg,.jpeg,.png,.gif"></button>
                                <span>Dung lượng hình ảnh không được lớn hơn 8MB.</span>
                                <p class="message_error_anh_dai_dien"></p>
                            </div>
                            <div class="anh_bia">
                                <h2>Ảnh bìa</h2>
                                <div class="img_bia"><img src="upload/merchant/infor/<?= $data_mer["img_cover"] ?>" alt="" id="image_bia"></div>
                                <div class="ip_bia">
                                    <button>Tải ảnh lên <input type="file" value="<?= $data_mer["img_cover"] ?>" name="" id="img_cover" onchange="chooseFile_bia(this)" accept=".jpg,.jpeg,.png,.gif"></button><br>
                                    <span>Dung lượng hình ảnh không được lớn hơn 8MB.</span>
                                    <p class="message_error_anh_bia"></p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

    <div class="popup_profile_mon" id="popup_profile_mon">
        <!-- <div class="popup_mon_body">
            <div class="r1">
                <div class="tit">
                    <h2>Chỉnh sửa chi tiết món ăn</h2>
                </div>
                <div class="close"><span class="close-btn" id="close-btn-mon">×</span></div>
            </div>
            <div class="r2">
                <form action="">
                    <div class="them_mon">
                        <div class="anh_chitiet">
                            <div class="img_chitiet"><img src="" alt="" id="image_chitiet1"></div>
                            <div class="ip_chitiet">
                                <button>Tải ảnh lên <input type="file" name="" id="" onchange="chooseFile_chitiet1(this)"></button><br>
                                <span>Dung lượng hình ảnh không được lớn hơn 8MB.</span>
                            </div>
                        </div>
                        <div class="info_mon">
                            <div class="name_mon">
                                <span>Tên món ăn<a>*</a></span><span id="error_message_name_mon"></span>
                                <div class="input_mon">
                                    <input type="text" value="<?= $data_mer_2["name_food"] ?>" placeholder="Nhập tên món" id="name_mon">
                                    <select name="" id="">
                                        <option value="">Loại món ăn</option>
                                    </select>
                                </div>
                                <div class="lable_mon">
                                    <h2>Nhãn:</h2>
                                    <div class="list">
                                        <span>Cơm tấm</span>
                                    </div>
                                </div>
                                <div class="descrip">
                                    <span>Chi tiết món ăn<a>*</a></span><span id="error_message_chitiet_mon"></span>
                                    <input type="text" placeholder="Nhập mô tả..." id="chitiet_mon">
                                </div>
                                <div class="gia_tien">
                                    <span>Giá tiền<a>*</a></span><span id="error_message_gia"></span>
                                    <div class="input_gia">
                                        <input type="number" placeholder="0đ" id="gia_tien">
                                        <select name="" id="">
                                            <option value="">1 Suất</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="serve">
                                    <div class="ngay_serve">
                                        <span>Ngày phục vụ:</span>
                                        <select name="" id="">
                                            <option value="">Cả tuần</option>
                                        </select>
                                    </div>
                                    <div class="featured">
                                        <span>Món đặc trưng</span>
                                        <input type="checkbox">
                                        <button></button>
                                    </div>
                                </div>
                                <div class="sale">
                                    <input type="checkbox">
                                    <span class="km">Khuyến mãi</span>
                                    <span class="voucher">20%</span>
                                </div>
                                <div class="next_st2">
                                    <button id="huy_mon" class="back">Hủy</button>
                                    <button type="button" onclick="return form_validate_chitiet_mon()">Lưu</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div> -->
    </div>
    <div class="popup_profile_combo" id="popup_profile_combo">
        <!-- <div class="popup_combo_body">
            <div class="r1">
                <div class="tit">
                    <h2>Chỉnh sửa chi tiết Combo</h2>
                </div>
                <div class="close"><span class="close-btn" id="close-btn-combo">×</span></div>
            </div>
            <div class="r2">
                <form action="">
                    <div class="them_combo">
                        <div class="anh_chitiet">
                            <div class="img_chitiet"><img src="" alt="" id="image_combo"></div>
                            <div class="ip_chitiet">
                                <button>Tải ảnh lên <input type="file" name="" id="" onchange="chooseFile_combo(this)"></button>
                                <span>Dung lượng hình ảnh không được lớn hơn 1MB.</span>
                            </div>
                        </div>
                        <div class="info_combo">
                            <div class="name_combo">
                                <span>Tên Combo<a>*</a></span><span id="error_message_name_combo"></span>
                                <div class="combo">
                                    <input type="text" placeholder="Nhập tên món" id="name_combo">
                                </div>
                                <div class="descrip_combo">
                                    <span>Chọn món ăn<a>*</a></span><span id="error_message_chon_combo"></span>
                                    <div class="choose_combo">
                                        <input type="text" placeholder="Chọn món ăn nhà hàng đã lưu" id="chon_mon">
                                        <select name="" id="">
                                            <option value="">Món đã lưu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="gia_combo">
                                    <span>Giá tiền<a>*</a></span><span id="error_message_gia_combo"></span>
                                    <div class="input_combo">
                                        <input type="number" placeholder="0đ" id="gia_combo">
                                        <select name="" id="">
                                            <option value="">1 Suất</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="serve">
                                    <div class="ngay_serve">
                                        <span>Ngày phục vụ:</span>
                                        <select name="" id="">
                                            <option value="">Cả tuần</option>
                                        </select>
                                    </div>
                                    <div class="featured_combo">
                                        <button></button>
                                    </div>
                                </div>
                                <div class="next_st2">
                                    <button class="back">Hủy</button>
                                    <button type="button" onclick="return form_validate_combo()">Lưu</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div> -->
    </div>
    <div class="popup_profile_nhom" id="popup_profile_nhom">
        <!-- <div class="popup_nhom_body">
            <div class="r1">
                <div class="tit">
                    <h2>Chỉnh sửa chi tiết Nhóm</h2>
                </div>
                <div class="close"><span class="close-btn" id="close-btn-nhom">×</span></div>
            </div>
            <div class="r2">
                <form action="">
                    <div class="info_group">
                        <div class="name_gr">
                            <span>Tên nhóm<a>*</a></span><span id="error_message_name_nhom"></span>
                            <input type="text" name="" id="name_nhom" placeholder="Nhập tên món">
                        </div>
                        <div class="gr_choose">
                            <span>Chọn món ăn<a>*</a></span><span id="error_message_chon_nhom"></span>
                            <div class="choose">
                                <input type="text" placeholder="Chọn món ăn nhà hàng đã lưu" id="chon_nhom">
                                <select name="" id="">
                                    <option value="">Món đã lưu</option>
                                </select>
                            </div>
                        </div>
                        <div class="delete">
                            <button></button>
                        </div>
                    </div>
                    <div class="next_st2">
                        <button class="back">Hủy</button>
                        <button type="button" onclick="return form_validate_nhom()">Lưu</button>
                    </div>
                </form>
            </div>
        </div> -->
    </div>
    <div class="popup_post_mer" id="popup_post_mer">
        <div class="popup_body_post">
            <div class="p1">
                <h2>Tạo bài viết</h2>
                <div class="close"><span class="close-btn" id="close-btn-post">×</span></div>
            </div>
            <form action="ho-so-quan-an/post" method="POST" id="uploadForm" enctype="multipart/form-data">
                <div class="p2">
                    <div class="name_avt">
                        <div class="avt_post"><img src="upload/merchant/infor/<?= $check_ath->img_avatar?>" alt=""></div>
                        <h2><?= $check_ath->name_merchant?></h2>
                    </div>
                    <textarea name="content_post" id="content_post" placeholder="Chủ quán ơi, bạn đang nghĩ gì thế ? "></textarea>
                </div>
                <div class="p3">
                    <div class="icon_feel"><button></button></div>
                    <div class="img_vd">
                        <span>Thêm vào bài viết</span>
                        <div class="img_post"><input type="file" id="imageFile" name="imageFile[]" multiple accept=".jpg,.jpeg,.png,.gif"></div>
                        <div class="vd_post"><input type="file" id="imageFileVD" name="imageFileVD" accept=".mp4"></div>
                    </div>
                    <div class="chua_img" id="img_vd"></div>
                    <div class="post">
                        <?php
                        foreach ($list as $key => $data_mer) {
                        ?>
                            <input type="hidden" value="<?= $data_mer["id"] ?>" id="merchant_id" name="merchant_id">
                        <?php
                        }
                        ?>
                        <button type="submit" name="submit" onclick="return form_post()">Đăng tin</button>
                        <!-- <button type="button" onclick="return form_post()">Đăng bài</button> -->
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="popup_post_mer" id="edit_popup_post_mer">
    </div>
    <div class="report_post" id="report_post">
        <!-- <div class="report_body_post">
            <div id="wrap-report">
                <div class="title-report">
                    <div class="icon-report">

                    </div>
                    <p>
                        Báo cáo bài viết
                    </p>
                </div>
                <div class="content-report">
                    <div class="choose-why-report">
                        <label for="">Chọn lý do báo cáo:</label>
                        <select name="" id="">
                            <option value="" selected>Chọn</option>
                            <option value="">Bài viết có nội dung không liên quan</option>
                            <option value="">Bài viết có nội dung không đúng đắn
                            </option>
                            <option value="">Bài viết có nội dung phản động
                            </option>
                        </select>
                        <div class="ic-drop-down"></div>
                    </div>
                    <div class="text-why">
                        <div class="name-text-why">
                            <p>Lý do khác:</p>
                        </div>
                        <div class="textarea-why">
                            <textarea name=""></textarea>
                        </div>
                    </div>
                </div>
                <div class="bot-system ">
                    <p>Hệ thống sẽ ghi nhận báo cáo của bạn!
                    </p>
                </div>
                <div class="btn_cancle_saveReport">
                    <button class="cancle" id="huy_report">Hủy</button>
                    <button class="saveReport">Lưu Báo Cáo</button>
                </div>
            </div>
        </div> -->
    </div>
    <div class="popup_post_mer popup_post_mer_edit">
        <div class="popup_body_post">
            <div class="p1">
                <h2>Tạo bài viết</h2>
                <div class="close"><span class="close-btn close-btn-post-edit">×</span></div>
            </div>
            <div class="p2">
                <div class="name_avt">
                    <div class="avt_post"><img src="../img/Logo_CVP.png" alt=""></div>
                    <h2>Sườn Mười</h2>
                </div>
                <textarea name="" id="content_pop" placeholder="Chủ quán ơi, bạn đang nghĩ gì thế ? "></textarea>
            </div>
            <div class="p3">
                <div class="icon_feel"><button></button></div>
                <div class="img_vd">
                    <span>Thêm vào bài viết</span>
                    <div class="img_post"><input type="file" id="imageFile" multiple accept=".jpg,.jpeg,.png,.gif"></div>
                    <div class="vd_post"><input type="file" id="imageFileVD" multiple accept=".mp4"></div>
                </div>
                <div class="chua_img" id="img_vd"></div>
                <div class="post">
                    <?php
                    foreach ($list as $key => $data_mer) {
                    ?>
                        <input type="hidden" value="<?= $data_mer["id"] ?>" id="merchant_id">
                    <?php
                    }
                    ?>
                    <button type="button" onclick="return form_post()">Đăng tin</button>
                    <!-- <button type="button" onclick="return form_post()">Đăng bài</button> -->
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.form-select').select2();
    });
</script>