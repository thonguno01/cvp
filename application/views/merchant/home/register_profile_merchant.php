<?php
// var_dump($hour);
?>
<div class="container">
        <div class="body">
            <div class="cvp">
                <img src="../img/cơm_văn_phòng.png" alt="">
            </div>
            <div class="content">
                <div class="form_01">
                    <div class="step1"></div>
                    <div class="info_basic">
                        <div class="head">
                            <h2>Thông tin quán cơ bản</h2>
                            <span>Nhập đầy đủ các trường thông tin để thiết lập hồ sơ nhé !</span>
                        </div>
                        <form action="">
                            <div class="input_info">
                                <div class="name_mer">
                                <h2>Tên quán<span>*</span><span class="message_error_name_mer"> </span></h2>
                                    <?php
                                   foreach($list as $key => $v){
                                        ?>
                                    <input type="text" value="<?= $v["name_merchant"]?>" placeholder="Nhập tên quán" name="name_merchant" id="name_merchant">
                                </div>
                                <div class="featured">
                                    <h2>Loại đồ ăn đặc trưng<span>*</span><span class="message_error_featured"> </span></h2>
                                    <input type="text" value="<?= $v["typical_food"]?>" placeholder="Nhập món ăn" name="type_food" id="type_food">
                                </div>
                                <div class="phone_mer">
                                    <h2>Số điện thoại<span>*</span><span class="message_error_phone_mer"> </span></h2>
                                    <input type="number" value="<?= $v["phone"]?>" placeholder="Nhập số điện thoại liên lạc">
                                </div> 
                                <div class="city">
                                    <h2>Thành phố<span>*</span><span class="message_error_city"> </span></h2>
                                    <select class="form-select" aria-label="Default select example" name="id_city" id="id_city">
                                        <?php
                                        if($v["id_city"] == ''){
                                        ?>
                                        <option value="-1" selected>Chọn thành phố</option>
                                        <?php
                                        }
                                        else{
                                            $data_city= $this->Generals_model->get_one_where('city2', ['cit_id' => $check_ath->id_city]);
                                        ?>
                                        <option value="<?= $check_ath->id_city?>" selected><?= $data_city->cit_name?></option>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        foreach ($city as $key => $value) {
                                        ?>
                                        <option value="<?=$value['cit_id']?>"><?=$value['cit_name']?></option>
                                        <?php 
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="district">
                                    <h2>Quận/Huyện<span>*</span><span class="message_error_district"> </span></h2>
                                    <select class="form-select" aria-label="Default select example" name="id_district" id="id_district">
                                    <?php
                                        if($v["id_district"] == ''){
                                        ?>
                                        <option value="-1" selected>Chọn quận / huyện</option>
                                        <?php
                                        }
                                        else{
                                            $data_district= $this->Generals_model->get_one_where('city2', ['cit_id' => $check_ath->id_district]);
                                        ?>
                                        <option value="<?= $check_ath->id_district?>" selected><?= $data_district->cit_name?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="home_num">
                                    <h2>Số nhà và đường/phố<span>*</span><span class="message_error_home_num"></span></h2>
                                    <input type="text" value="<?= $v["address"]?>" placeholder="Nhập địa chỉ cụ thể" name="address" id="address">
                                </div>
                            </div>
                            <div class="map">
                                <h2>Định vị trên Map</h2>
                                <div class="map_im">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7838.684254869503!2d106.70676642475235!3d10.785086936675276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1547181657956" width="100%" height="420" frameborder="0" style="border:0; border-radius: 20px;"
                                        allowfullscreen></iframe>
                                </div>
                                <button>Xác nhận vị trí</button>
                            </div>
                            <div class="next_st1">
                                <button type="button" class="form1">Tiếp theo</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="form_02">
                    <div class="step2"></div>
                    <div class="info_detail">
                        <div class="head">
                            <h2>Thông tin chi tiết quán</h2>
                            <span>Nhập đầy đủ các trường thông tin để thiết lập hồ sơ nhé !</span>
                        </div>
                        <form action="">
                            <div class="input_info">
                                <div class="time_open">
                                    <div class="open_1">
                                        <h2>Thời gian mở cửa:</h2>
                                        <select class="form-select" id="day_open" name="day_open">
                                        <?php
                                        if($v["day_open"] == ''){
                                        ?>

                                        <?php
                                        }
                                        else{
                                        ?>
                                        <option value="<?= $v["day_open"]?>" selected><?= $day[$v["day_open"]]?></option>
                                        <?php
                                        }
                                        ?>
                                        <?php 
                                            for($i = 0; $i < 8; $i++){
                                            ?>
                                            <option value="<?=$i?>"><?=$day[$i]?></option>
                                        <?php 
                                        }
                                        ?>
                                        </select>
                                        <p class="message_error_time_open1"> </p>
                                    </div>
                                    <div class="open_2">
                                        <h2>Khung giờ:</h2>
                                        <select class="form-select" id="time_start" name="time_start">
                                        <?php
                                    if($v["time_start"] == ''){
                                    ?>

                                    <?php
                                    }
                                    else{
                                    ?>
                                    <option value="<?= $v["time_start"]?>" selected><?= $hour[$v["time_start"]]?></option>
                                    <?php
                                    }
                                    ?>
                                           
                                            <?php 
                                                for($i = 0; $i < 49; $i++){
                                                ?>
                                                <option value="<?=$i?>"><?=$hour[$i]?></option>
                                            <?php 
                                            }
                                            ?>
                                        </select> -
                                        <select class="form-select" id="time_end" name="time_end">
                                        <?php
                                        if($v["time_end"] == ''){
                                        ?>

                                        <?php
                                        }
                                        else{
                                        ?>
                                        <option value="<?= $v["time_end"]?>" selected><?= $hour[$v["time_end"]]?></option>
                                        <?php
                                        }
                                        ?>
                                            
                                            <?php 
                                                for($i = 0; $i < 49; $i++){
                                                ?>
                                                <option value="<?=$i?>"><?=$hour[$i]?></option>
                                            <?php 
                                            }
                                            ?>
                                        </select> 
                                        <p class="message_error_time_open2"></p>
                                        <p class="message_error_time_open3"></p>
                                    </div>
                                </div>
                                <div class="type">
                                    <h2>Loại hình quán<span>*</span></h2>
                                    <select name="type_merchant" id="type_merchant">
                                    <?php
                                    if($v["culinary"] == ''){
                                    ?>
                                    <option value="" selected>Chọn loại hình</option>
                                    <?php
                                    }
                                    else{
                                    ?>
                                    <option value="<?= $v["type_merchant"]?>" selected><?= $typeMerchant[$v["type_merchant"]]?></option>
                                    <?php
                                    }
                                    ?>
                                        
                                        <?php 
                                        for($i = 0; $i < 7; $i++){
                                        ?>
                                            <option value="<?=$i?>"><?=$typeMerchant[$i]?></option>
                                        <?php 
                                        }
                                        ?>
                                    </select>
                                    <p class="message_error_type"></p>
                                </div>
                                <div class="culinary">
                                    <h2>Ẩm thực<span>*</span></h2>
                                    <select name="culinary" id="culinary">
                                    <?php
                                    if($v["culinary"] == ''){
                                    ?>
                                    <option value="" selected>Chọn ẩm thực</option>
                                    <?php
                                    }
                                    else{
                                    ?>
                                    <option value="<?= $v["culinary"]?>" selected><?= $culinary[$v["culinary"]]?></option>
                                    <?php
                                    }
                                    ?>
                                        <?php 
                                        for($i = 0; $i < 4; $i++){
                                        ?>
                                            <option value="<?=$i?>"><?=$culinary[$i]?></option>
                                        <?php 
                                        }
                                        ?>
                                    </select>
                                    <p class="message_error_culinary"></p>
                                </div>
                                <div class="search">
                                    <h2>Từ khóa tìm kiếm</h2>
                                    <input type="text" name="search_key" value="<?= $v["search_key"]?>" id="search_key" placeholder="Ví dụ: Cơm sườn bì, Cơm chiên, Phở bò, Mỳ Quảng, Phở trộn,.....">
                                    <p class="message_error_search"></p>
                                </div>
                                <div class="ship_fee">
                                    <h2>Phí ship<span>*</span></h2>
                                    <input type="number" id="fee_ship" value="<?= $v["fee_ship"]?>" name="fee_ship" placeholder="0đ">
                                    <select id="">
                                        <option value="">1km</option>
                                    </select>
                                    <p class="message_error_ship_fee"></p>
                                </div>
                                <div class="mota">
                                    <h2>Mô tả về quán<span>*</span></h2>
                                    <input type="text" name="description" value="<?= $v["description"]?>" id="description" placeholder="Nhập mô tả...">
                                    <p class="message_error_mota"></p>
                                </div>
                            </div>
                            <div class="anh">
                                <div class="avatar_anh">
                                    <h2>Ảnh đại diện</h2>
                                    <input type="hidden" value="<?= $v["img_avatar"]?>" id="value_img_avt">
                                    <div class="img"><img src="upload/merchant/infor/<?= $v["img_avatar"]?>" alt="" id="image" ></div>
                                    <button>Tải ảnh lên<input type="file" value="<?= $v["img_avatar"]?>" onchange="chooseFile(this)" id="img_avatar" name="img_avatar" accept=".jpg,.jpeg,.png,.gif"></button>
                                    <span>Dung lượng hình ảnh không được lớn hơn 8MB.</span><br>
                                </div>
                                <p class="message_error_anh_dai_dien"></p>
                                <div class="anh_bia">
                                    <h2>Ảnh bìa</h2>
                                    <input type="hidden" value="<?= $v["img_cover"]?>" id="value_img_cover">
                                    <div class="img_bia"><img src="upload/merchant/infor/<?= $v["img_cover"]?>" alt="" id="image_bia"></div>
                                    <div class="ip_bia">
                                        <button>Tải ảnh lên <input type="file" name="img_cover" id="img_cover" onchange="chooseFile_bia(this)" accept=".jpg,.jpeg,.png,.gif"></button>
                                        <span>Dung lượng hình ảnh không được lớn hơn 8MB.</span>
                                    </div>
                                    <p class="message_error_anh_bia"></p>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="next_st2">
                                <button type="button" class="back">Quay lại</button>
                                <button type="button" class="form2">Tiếp theo</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="form_03">
                    <div class="step3"></div>
                    <div class="info_menu">
                        <div class="head">
                            <h2>Thực đơn chi tiết</h2>
                        </div>
                        <form action="/register-food/register-detail" method="POST" id="uploadFormDetail">
                            <h2 class="chitiet_h2">Chi tiết món ăn</h2>
                            <div class="wrap-them-mon">
                                <div class="them_mon dish0">
                                    <div class="anh_chitiet">
                                        <!-- mặc định nó là 1  -->
                                        <div class="img_chitiet"><img src="" alt="" id="image_chitiet1"></div>
                                        <div class="ip_chitiet">
                                            <button>Tải ảnh lên <input type="file" name="img_detail_menu" id="anh_tai_le_chi_tiet_mon_an_1" onchange="chooseFile_chitiet1(this ,id = '1')" accept=".jpg,.jpeg,.png,.gif"></button>
                                            <span>Dung lượng hình ảnh không được lớn hơn 8MB.</span>
                                        </div>
                                        <p class="message_error_anh_chitiet_1 error"></p>
                                    </div>
                                    <div class="info_mon">
                                        <div class="name_mon">
                                            <span>Tên món ăn<a>*</a></span>
                                            <div class="input_mon">
                                                <input type="text" id="name_mon_an_1" name="name_mon_an_1" placeholder="Nhập tên món">
                                                <!-- <select name="" >
                                                    <option value="">Loại món ăn</option>
                                                </select> -->
                                                <div class="type_dish" onclick="type_dish(1)">
                                                    <p>Loại món ăn</p>
                                                </div>
                                            </div>
                                            <p class="massage_error_name_mon_an_1 error"></p>
                                            <div class="choose-loai-mon-an choose-loai-mon-an-1" id="type_dish" hidden>
                                                <div class="title-loai-mon-an">
                                                    <p>Loại món ăn</p>
                                                </div>
                                                <div class="can-choose-mon-an">
                                                    <p class="name-can-choose-mon-an">Bạn có thể chọn các loại món ăn bên dưới</p>
                                                    <div class="select-mon-an">
                                                        <div class="mon-an-1">
                                                            <div class="icon-dropdown-mon-an-1"></div>
                                                            <div class="wrap-mon-an-1">
                                                                <span class="name-mon-an-1" onclick="doAn1(1)">Đồ ăn</span>
                                                                <div class="sub-wrap-mon-an-1 sub-do-an-1">
                                                                    <div class="sub-mon-an-1">
                                                                        <input type="radio" name="an" id="type_detail_0" value="Đồ ăn vặt" onclick="dom_type_food_0(0)">
                                                                        <span class="name-mon-an-1">Đồ ăn vặt</span>
                                                                    </div>
                                                                    <div class="sub-mon-an-1">
                                                                        <input type="radio" name="an" id="type_detail_1" value="Cơm văn phòng" onclick="dom_type_food_1(1)">
                                                                        <span class="name-mon-an-1">Cơm văn phòng</span>
                                                                    </div>
                                                                    <div class="sub-mon-an-1">
                                                                        <input type="radio" name="an" id="type_detail_2" value="Tráng miệng" onclick="dom_type_food_2(2)">
                                                                        <span class="name-mon-an-1">Tráng miệng</span>
                                                                    </div>
                                                                    <div class="sub-mon-an-1">
                                                                        <input type="radio" name="an" id="type_detail_3" value="Đồ ăn giảm cân" onclick="dom_type_food_3(3)">
                                                                        <span class="name-mon-an-1">Đồ ăn giảm cân</span>
                                                                    </div>
                                                                    <div class="sub-mon-an-1">
                                                                        <input type="radio" name="an" id="type_detail_4" value="Món từ thịt" onclick="dom_type_food_4(4)">
                                                                        <span class="name-mon-an-1">Món từ thịt</span>
                                                                    </div>
                                                                    <div class="sub-mon-an-1">
                                                                        <input type="radio" name="an" id="type_detail_5" value="Đồ chay" onclick="dom_type_food_5(5)">
                                                                        <span class="name-mon-an-1">Đồ chay</span>
                                                                    </div>
                                                                    <div class="sub-mon-an-1">
                                                                        <input type="radio" name="an" id="type_detail_6" value="Handmade" onclick="dom_type_food_6(6)">
                                                                        <span class="name-mon-an-1">Handmade</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mon-an-2">
                                                            <div class="icon-dropdown-mon-an-2"></div>
                                                            <div class="wrap-mon-an-2">
                                                                <span class="name-mon-an-2" onclick="doAn2(1)">Đồ uống</span>
                                                                <div class="sub-wrap-mon-an-2 " id="sub-mon-an-1">
                                                                    <div class="sub-mon-an-2">
                                                                        <input type="radio" name="an" id="type_detail_7" value="Nước có ga" onclick="dom_type_food_7(7)">
                                                                        <span class="name-mon-an-2">Nước có ga</span>
                                                                    </div>
                                                                    <div class="sub-mon-an-1">
                                                                        <input type="radio" name="an" id="type_detail_8" value="Nước khoáng" onclick="dom_type_food_8(8)">
                                                                        <span class="name-mon-an-2">Nước khoáng</span>
                                                                    </div>
                                                                    <div class="sub-mon-an-1">
                                                                        <input type="radio" name="an" id="type_detail_9" value="Bia hơi" onclick="dom_type_food_9(9)">
                                                                        <span class="name-mon-an-2">Bia hơi</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p class="mon-an-duoc-chon">Loại được chọn: </p>
                                                        <div class="list" id="dom_type_food">
                                                            
                                                        </div>
                                                        <div class="btn_save_cancle">
                                                            <button type="button" class="cancle" onclick="cancle_type_detail(1)">Hủy</button>
                                                            <button type="button" class="save" onclick="save_type_detail(1)">Lưu</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="lable_mon">
                                                <h2>Nhãn:</h2>
                                                <div class="list" id="list_type_food_selected">
                                                    <!-- <span>Cơm tấm <b class="close_lable_mon">x</b></span> -->
                                                </div>
                                            </div>
                                            <div class="descrip">
                                                <span>Chi tiết món ăn<a>*</a></span>
                                                <input type="text" id="detail_mon_an_1" name="detail_mon_an_1" placeholder="Nhập mô tả...">
                                                <p class="message_error_descrip_1 error"></p>
                                            </div>
                                            <div class="gia_tien">
                                                <span>Giá tiền<a>*</a></span>
                                                <div class="input_gia">
                                                    <input type="number" id="money_mon_an_1" name="money_mon_an_1" placeholder="0đ">
                                                    <select name="" id="">
                                                            <option value="">1 Suất</option>
                                                        </select>
                                                </div>
                                                <p class="message_error_gia_tien_1 error"></p>
                                            </div>
                                            <div class="serve">
                                                <div class="ngay_serve">
                                                    <span>Ngày phục vụ:</span>
                                                    <select name="ngay_phuc_vu_1" id="ngay_phuc_vu_1">
                                                        <?php
                                                        for($i = 0; $i <8; $i++){
                                                        ?>
                                                        <option value="<?= $i?>"><?= $day[$i]?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                    <p class="message_error_ngay_phuc_vu_1 error"></p>
                                                </div>
                                                <div class="featured">
                                                    <span>Món đặc trưng</span>
                                                    <input type="checkbox" id="features_checkbox" name="features_checkbox" value="1">
                                                    <button type="button" onclick="return delMonAn(0)"></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="next_st2">
                                <button type="button" class="back">Quay lại</button>
                                <button type="submit" class="form3">Tiếp theo</button>
                                <div class="bt_them">
                                    <button type="button" id="bt_them" onclick="return addMonAn(idThemMon)"><div class="icon_add"></div><div>Thêm món</div></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="form_04">
                    <div class="step4"></div>
                    <div class="info_menu">
                        <div class="head">
                            <h2>Thực đơn chi tiết</h2>
                        </div>
                        <?php 
                        $data_detail = $this->Generals_model->get_where('detail_menu', ['merchant_id' => $check_ath->id]);
                        ?>
                        <form action="register-food/combo" id="uploadFormCombo" method="POST"> 
                            <h2 class="chitiet_h2">COMBO</h2>
                            <div class="wrap-combo">
                                <div class="them_combo combo1">
                                    <div class="anh_chitiet">
                                        <div class="img_chitiet"><img src="" alt="" id="image_combo1"></div>
                                        <div class="ip_chitiet">
                                            <button>Tải ảnh lên <input type="file" name="img_combo" id="img_combo_1" onchange="chooseFile_chitiet2(this , id = '1')"></button>
                                            <span>Dung lượng hình ảnh không được lớn hơn 8MB.</span>
                                        </div>
                                        <p class="error message_error_img_combo_1"></p>
                                    </div>
                                    <div class="info_combo">
                                        <div class="name_combo">
                                            <span>Tên Combo<a>*</a></span>
                                            <div class="combo">
                                                <input type="text" name="name_combo" id="name_combo_1" placeholder="Nhập tên món">
                                            </div>
                                            <p class="error message_error_name_combo_1"></p>

                                            <div class="descrip_combo">
                                                <span>Chọn món ăn<a>*</a></span>
                                                <div class="choose_combo">
                                                    <input type="text" name="choose_detail" id="descrip_combo_1" placeholder="Chọn món ăn nhà hàng đã lưu" value="">
                                                    <select class="form-select" name="" id="choose_detail" onchange="dom_detail()">
                                                        <option value="">Món đã lưu</option>
                                                        <?php
                                                        foreach($data_detail as $key => $v){
                                                        ?>
                                                        <option value="<?= $v["id"]?>"><?= $v["name_food"]?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <p class="error message_error_descrip_combo_1"></p>

                                            </div>
                                            <div class="gia_combo">
                                                <span>Giá tiền<a>*</a></span>
                                                <div class="input_combo">
                                                    <input type="number" name="gia_combo" id="gia_combo_1" placeholder="0đ">
                                                    <select name="" id="">
                                                            <option value="">1 Combo</option>
                                                        </select>
                                                </div>
                                                <p class="error message_error_gia_combo_1"></p>

                                            </div>
                                            <div class="serve">
                                                <div class="ngay_serve">
                                                    <span>Ngày phục vụ:</span>
                                                    <select name="ngay_phuc_vu" id="ngay_phucvu_1">
                                                        <option value="">-- Chọn --</option>
                                                        <?php
                                                        for($i = 0; $i <8; $i++){
                                                        ?>
                                                        <option value="<?= $i?>"><?= $day[$i]?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                    <p class="error message_error_ngay_phucvu_1"></p>
                                                </div>
                                                <div class="featured_combo">
                                                    <button type="button" onclick="return deleteCombo(id = '1')"></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="next_st2">
                                <button type="button" class="back-form-4">Quay lại</button>
                                <button type="submit" class="form4">Tiếp theo</button>
                                <div class="bt_them">
                                    <button type="button" onclick="return addComBo(idCombo)" class="btn_Combo"><div class="icon_add"></div><div>Thêm Combo</div></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="form_05">
                    <div class="step5"></div>
                    <div class="info_gr">
                        <div class="head">
                            <h2>Thực đơn chi tiết</h2>
                        </div>
                        <h2 class="chitiet_h2">Món ăn theo nhóm</h2>
                        <form action="register-food/group" id="uploadFormGR" method="POST">
                            <div class="wrap-info-group">

                                <div class="info_group" id="group1">
                                    <div class="name_gr">
                                        <span>Tên nhóm<a>*</a></span>
                                        <input type="text" name="name_group" id="name_group_1" placeholder="Nhập tên nhóm" value="">
                                        <p class="error message_error_name_group_1"></p>
                                    </div>
                                    <div class="descrip_combo">
                                        <span>Chọn món ăn<a>*</a></span>
                                        <div class="choose_combo">
                                            <input type="text" name="choose_detail_gr" id="gr_choose_1" placeholder="Chọn món ăn nhà hàng đã lưu" value="">
                                            <select class="form-select" name="" id="choose_detail_gr" onchange="dom_detail_gr()">
                                                <option value="">Món đã lưu</option>
                                                <?php
                                                foreach($data_detail as $key => $v){
                                                ?>
                                                <option value="<?= $v["id"]?>"><?= $v["name_food"]?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <p class="error message_error_gr_choose_1"></p>
                                    </div>
                                    <!-- <div class="gr_choose">
                                        <span>Chọn món ăn<a>*</a></span>
                                        <div class="choose">
                                            <input type="text" id="gr_choose_1" placeholder="Chọn món ăn nhà hàng đã lưu">
                                        </div>
                                        <p class="error message_error_gr_choose_1"></p>

                                        <div class="name-group" onclick="return showChooseSave(1)">
                                            <select name="" id="">
                                                <option value="">Món đã lưu</option>
                                            </select>
                                        </div> -->
                                        <!-- <div class="choose-loai-mon-an" id="group_1" hidden>
                                            <div class="title-loai-mon-an">
                                                <span>Loại món ăn</span>
                                            </div>
                                            <div class="can-choose-mon-an">
                                                <p class="name-can-choose-mon-an">Bạn có thể chọn các loại món ăn bên dưới</p>
                                                <div class="select-mon-an">
                                                    <div class="mon-an-1">
                                                        <div class="icon-dropdown-mon-an-1"></div>
                                                        <div class="wrap-mon-an-1">
                                                            <input type="checkbox" name="" id="">
                                                            <span class="name-mon-an-1" onclick="showDoAnThu1(1)">    Đồ ăn</span>
                                                            <div class="" id="do-an-1" hidden>
                                                                <div class="sub-mon-an-1">
                                                                    <input type="checkbox" name="" id="">
                                                                    <span class="name-mon-an-1">Đồ ăn</span>
                                                                </div>
                                                                <div class="sub-mon-an-1">
                                                                    <input type="checkbox" name="" id="">
                                                                    <span class="name-mon-an-1">Đồ ăn</span>
                                                                </div>
                                                                <div class="sub-mon-an-1">
                                                                    <input type="checkbox" name="" id="">
                                                                    <span class="name-mon-an-1">Đồ ăn</span>
                                                                </div>
                                                                <div class="sub-mon-an-1">
                                                                    <input type="checkbox" name="" id="">
                                                                    <span class="name-mon-an-1">Đồ ăn</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mon-an-2">
                                                        <div class="icon-dropdown-mon-an-2"></div>
                                                        <div class="wrap-mon-an-2">
                                                            <input type="checkbox" name="" id="">
                                                            <span class="name-mon-an-2" onclick="showMonAnThu1(1)">Đồ ăn</span>
                                                            <div class="" id="mon-an-1" hidden>
                                                                <div class="sub-mon-an-2">
                                                                    <input type="checkbox" name="" id="">
                                                                    <span class="name-mon-an-2">Đồ ăn</span>
                                                                </div>
                                                                <div class="sub-mon-an-1">
                                                                    <input type="checkbox" name="" id="">
                                                                    <span class="name-mon-an-2">Đồ ăn</span>
                                                                </div>
                                                                <div class="sub-mon-an-1">
                                                                    <input type="checkbox" name="" id="">
                                                                    <span class="name-mon-an-2">Đồ ăn</span>
                                                                </div>
                                                                <div class="sub-mon-an-1">
                                                                    <input type="checkbox" name="" id="">
                                                                    <span class="name-mon-an-2">Đồ ăn</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p class="mon-an-duoc-chon"><strong>5</strong> loại được chọn</p>
                                                    <div class="list">
                                                        <span>Cơm tấm <b class="close_lable_mon">x</b></span>
                                                        <span>Cơm tấm <b class="close_lable_mon">x</b></span>
                                                        <span>Cơm tấm <b class="close_lable_mon">x</b></span>
                                                        <span>Cơm tấm <b class="close_lable_mon">x</b></span>
                                                        <span>Cơm tấm <b class="close_lable_mon">x</b></span>
                                                    </div>
                                                    <div class="btn_save_cancle">
                                                        <button class="cancle">Hủy</button>
                                                        <button class="save">Lưu</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                    <!-- </div> -->
                                    <div class="delete">
                                        <button onclick="delGroup(1)"></button>
                                    </div>
                                </div>

                            </div>

                            <div class="next_st2">
                                <button type="button" class="back_form5">Quay lại</button>
                                <button type="submit" class="form5">Tiếp theo</button>
                                <div class="bt_them">
                                    <button type="button" onclick="return addGroup(idAddGroup);" class="add_group"><div class="icon_add"></div><div>Thêm Nhóm</div></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="form_06">
                    <div class="step6"></div>
                    <div class="done">
                        <div class="head_done">
                            <h2>Bạn đã hoàn thành xong tất cả các bước tạo hồ sơ Merchant !</h2>
                        </div>
                        <h2 class="chitiet_h2_done">Lưu hồ sơ để bắt đầu bán hàng.</h2>
                        <form action="">
                            <div class="gif"></div>

                        </form>
                        <div class="done_start">
                            <form action="/save-infor-merchant" method="POST" id="save_infor_merchant">
                                <button type="submit" onclick="save_infor_merchant()">Lưu hồ sơ</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>