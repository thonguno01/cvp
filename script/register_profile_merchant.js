function chooseFile(fileInput) {
    if (fileInput.files && fileInput.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#image').attr('src', e.target.result);
        }
        reader.readAsDataURL(fileInput.files[0]);
    }
}

function back() {
    history.back();
}

function chooseFile_bia(fileInput) {
    if (fileInput.files && fileInput.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#image_bia').attr('src', e.target.result);
        }
        reader.readAsDataURL(fileInput.files[0]);
    }
}

function chooseFile_chitiet1(fileInput, id) {
    if (fileInput.files && fileInput.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#image_chitiet' + id).attr('src', e.target.result);
        }
        reader.readAsDataURL(fileInput.files[0]);
    }
}

function chooseFile_chitiet2(fileInput, id) {
    if (fileInput.files && fileInput.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#image_combo' + id).attr('src', e.target.result);
        }
        reader.readAsDataURL(fileInput.files[0]);
    }
}

function chooseFile_chitiet3(fileInput) {
    if (fileInput.files && fileInput.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#image_chitiet3').attr('src', e.target.result);
        }
        reader.readAsDataURL(fileInput.files[0]);
    }
}
$(document).ready(function() {
    $('.form-select').select2();
});
// =============Bước 1===================
// Thông tin  quán cơ bản
// Check onBlur
var flag = true;
$(".name_mer>input").blur(function() {
    let name_mer = $(".name_mer>input").val();
    if (name_mer == '') {
        $('.message_error_name_mer').text('Không được bỏ trống Tên quán')
        flag = false;
    } else {
        $('.message_error_name_mer').text('')
    }
});
$(".featured>input").blur(function() {
    let featured = $(".featured>input").val();
    if (featured == '') {
        $('.message_error_featured').text('Không được bỏ trống Loại đồ ăn đặc trưng')
        flag = false;
    } else {
        $('.message_error_featured').text('')
    }
});
$(".phone_mer>input").blur(function() {
    let phone_mer = $(".phone_mer>input").val();
    if (phone_mer == '') {
        $('.message_error_phone_mer').text('Không được bỏ trống Số điện thoại')
        flag = false;
    } else {
        $('.message_error_phone_mer').text('')
    }
});
$(".home_num>input").blur(function() {
    let home_num = $(".home_num>input").val();
    if (home_num == '') {
        $('.message_error_home_num').text('Không được bỏ trống Số nhà và đường/phố')
        flag = false;
    } else {
        $('.message_error_home_num').text('')
    }
});
//submit
$(".form1").click(function() {
    let name_mer = $(".name_mer>input").val();
    let featured = $(".featured>input").val();
    let phone_mer = $(".phone_mer>input").val();
    let home_num = $(".home_num>input").val().toString();
    let city = $("#id_city").val();
    let district = $("#id_district").val();
    let flag = true;
    if (name_mer == '') {
        $('.message_error_name_mer').text('Không được bỏ trống Tên quán');
        flag = false;
    } else {
        $('.message_error_name_mer').text('');
        flag = true;
    }
    if (featured == '') {
        $('.message_error_featured').text('Không được bỏ trống Loại đồ ăn đặc trưng');
        flag = false;
    } else {
        $('.message_error_featured').text('');
    }
    //-------------
    if (city == '-1') {
        $('.message_error_city').text('Vui lòng chọn thành phố');
        flag = false;
    } else {
        $('.message_error_city').text('');
    }
    //-------------
    if (district == '-1') {
        $('.message_error_district').text('Vui lòng chọn Quận huyện');
        flag = false;
    } else {
        $('.message_error_district').text('');
    }
    if (phone_mer == '') {
        $('.message_error_phone_mer').text('Không được bỏ trống Số điện thoại');
        flag = false;
    } else {
        $('.message_error_phone_mer').text('');
    }
    if (home_num == '') {
        $('.message_error_home_num').text('Không được bỏ trống Số nhà và đường/phố');
        flag = false;
    } else {
        $('.message_error_home_num').text('');
    }
    if (flag == true) {
        $('.form_01').css('display', 'none');
        $('.form_02').css('display', 'block');
    }
});
// ===================================Bước 2====================================================
// nút quay lại
$('.form_02 .back').click(function() {
    $('.form_01').css('display', 'block');
    $('.form_02').css('display', 'none');
});
// nút tiếp theo
$('.form2').click(function(event) {
    let flag = true;
    let open_week = $('#day_open').val();
    let gio_bd = $('#time_start').val();
    let gio_kt = $('#time_end').val();
    let type = $('#type_merchant').val();
    let culinary = $('#culinary').val();
    let search = $('.search>input').val();
    let ship_fee = $('.ship_fee>input').val();
    let mota = $('.mota>input').val();
    let anh_bia = $('#img_cover').val();
    let anh_bia1 = $('#image_bia').attr('src');
    let anh_dai_dien = $('#img_avatar').val();
    let anh_dai_dien1 = $('#image').attr('src');
    // alert(anh_dai_dien1)
    if (open_week == '-1') {
        $('.message_error_time_open1').text('Không được bỏ trống Thời gian mở cửa');
        flag = false;
    } else {
        $('.message_error_time_open1').text('');
    }
    if (gio_bd == '-1') {
        $('.message_error_time_open2').text('Không được bỏ trống Thời gian bắt đầu');
        flag = false;
    } else {
        $('.message_error_time_open2').text('');
    }
    if (gio_kt == '-1') {
        $('.message_error_time_open3').text('Không được bỏ trống Thời gian Kết thúc');
        flag = false;
    } else {
        $('.message_error_time_open3').text('');
    }
    if (type == '-1') {
        $('.message_error_type').text('Không được bỏ trống Loại hình mở cửa');
        flag = false;
    } else {
        $('.message_error_type').text('');
    }
    if (culinary == '-1') {
        $('.message_error_culinary').text('Không được bỏ trống Ẩm thực');
        flag = false;
    } else {
        $('.message_error_culinary').text('');
    }
    if (search == '') {
        $('.message_error_search').text('Không được bỏ trống tìm kiếm từ khóa ');
        flag = false;
    } else {
        $('.message_error_search').text('');
    }
    if (ship_fee == '') {
        $('.message_error_ship_fee').text('Không được bỏ trống phí ship ');
        flag = false;
    } else {
        $('.message_error_ship_fee').text('');
    }
    if (mota == '') {
        $('.message_error_mota').text('Không được bỏ trống mô tả ');
        flag = false;
    } else {
        $('.message_error_mota').text('');
    }
    if (anh_bia1 == '') {
        $('.message_error_anh_bia').text('Bạn phải thêm ảnh vào ảnh bìa ');
        flag = false;
    } else {
        $('.message_error_anh_bia').text('');
    }

    if (anh_dai_dien1 == '') {
        $('.message_error_anh_dai_dien').text('Bạn phải thêm ảnh vào ảnh đại diện ');
        flag = false;
    } else {
        $('.message_error_anh_dai_dien').text('');
    }
    if (flag == true) {
        let name_merchant = $('#name_merchant').val();
        let type_food = $('#type_food').val();
        let id_city = $('#id_city').val();
        let id_district = $('#id_district').val();
        let address = $('#address').val();
        let day_open = $('#day_open').val();
        let time_start = $('#time_start').val();
        let time_end = $('#time_end').val();
        let type_merchant = $('#type_merchant').val();
        let culinary = $('#culinary').val();
        let search_key = $('#search_key').val();
        let fee_ship = $('#fee_ship').val();
        let description = $('#description').val();
        let img_avatar = ($('#img_avatar').prop('files')[0] != undefined) ? $('#img_avatar').prop('files')[0] : '';
        let img_cover = ($('#img_cover').prop('files')[0] != undefined) ? $('#img_cover').prop('files')[0] : '';
        let size_avt = (img_avatar == '') ? '' : img_avatar.size;
        let size_cover = (img_cover == '') ? '' : img_cover.size;
        let form_data = new FormData();
        let check = true;
        let data_json = {
            name_merchant: name_merchant,
            type_food: type_food,
            id_city: id_city,
            id_district: id_district,
            address: address,
            day_open: day_open,
            time_start: time_start,
            time_end: time_end,
            type_merchant: type_merchant,
            culinary: culinary,
            search_key: search_key,
            fee_ship: fee_ship,
            description: description,
        }
        if (size_avt != '') {
            if (size_avt > 8000000) {
                $('.message_error_anh_dai_dien').text('Giới hạn file upload là 8mb!');
                check = false
            } else {
                form_data.append('img_avt', img_avatar);
            }
        }
        if (size_avt != '') {

            if (size_cover > 8000000) {
                $('.message_error_anh_bia').text('Giới hạn file upload là 8mb!');
                check = false
            } else {
                form_data.append('img_cover', img_cover);
            }
        }
        if (check == true) {
            $.ajax({
                type: 'POST',
                url: '/register-food/register-profile/upload',
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
            });
            let out = callAjax('/register-food/register-profile', 'post', data_json);
            if (out.rs == false) {
                alert(out.msg);
                flag = false;
            } else {
                alert(out.msg2);
                $('.form_03').css('display', 'block');
                $('.form_02').css('display', 'none');

            }
        }
    }
});
//===================================Bước 3================================================
$('.form_03 .back').click(function() {
    $('.form_02').css('display', 'block');
    $('.form_03').css('display', 'none');
});


// Nút bấm hiện loại món ăn


function type_dish(id) {
    $('.choose-loai-mon-an-' + id).toggleClass('d-block');
}

function cancle_type_detail(id) {
    $('.choose-loai-mon-an-' + id).toggleClass('d-block');
}

function doAn1(id) {
    $('.sub-do-an-' + id).toggleClass('d-block');
}

function doAn2(id) {
    $('#sub-mon-an-' + id).toggleClass('d-block');
}
// === === === === === === === === =
// thêm món
var idThemMon = 1;
$('.bt_them').click(function() {
    idThemMon = idThemMon + 1;
});
var saveRederNew = [];

function addMonAn(idThemMon) {
    idThemMon++;
    let idDelMonAn = idThemMon - 1;
    var render = `<div class="them_mon dish` + idDelMonAn + `">
    <div class="anh_chitiet">
        <!-- mặc định nó là 1  -->
        <div class="img_chitiet"><img src="" alt="" id="image_chitiet` + idThemMon + `"></div>
        <div class="ip_chitiet">
            <button>Tải ảnh lên <input type="file" name="img_detail_menu" id="anh_tai_le_chi_tiet_mon_an_` + idThemMon + `" onchange="chooseFile_chitiet1(this ,id = ` + idThemMon + `)"></button>
            <span>Dung lượng hình ảnh không được lớn hơn 1MB.</span>
        </div>
        <p class="message_error_anh_chitiet_` + idThemMon + ` error"></p>
    </div>
    <div class="info_mon">
        <div class="name_mon">
            <span>Tên món ăn<a>*</a></span>
            <div class="input_mon">
                <input type="text" id="name_mon_an_` + idThemMon + `" placeholder="Nhập tên món">
                <!-- <select name="" >
                    <option value="">Loại món ăn</option>
                </select> -->
                <div class="type_dish" onclick="type_dish(` + idThemMon + `)">
                    <p>loại Món ăn</p>
                </div>
            </div>
            <p class="massage_error_name_mon_an_` + idThemMon + ` error"></p>
            <div class="choose-loai-mon-an choose-loai-mon-an-` + idThemMon + `" hidden>
                <div class="title-loai-mon-an">
                    <p>Loại món ăn</p>
                </div>
                <div class="can-choose-mon-an">
                    <p class="name-can-choose-mon-an">Bạn có thể chọn các loại món ăn bên dưới</p>
                    <div class="select-mon-an">
                        <div class="mon-an-1">
                            <div class="icon-dropdown-mon-an-1"></div>
                            <div class="wrap-mon-an-1">
                                <input type="checkbox" name="" id="">
                                <span class="name-mon-an-1" onclick="doAn1(` + idThemMon + `)">    Đồ ăn</span>
                                <div class="sub-wrap-mon-an-1 sub-do-an-` + idThemMon + `">
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
                                <span class="name-mon-an-2" onclick="doAn2(` + idThemMon + `)">Đồ ăn</span>
                                <div class="sub-wrap-mon-an-2" id="sub-mon-an-` + idThemMon + `">
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
            </div>
            <div class="lable_mon">
                <h2>Nhãn:</h2>
                <div class="list">
                    <span>Cơm tấm <b class="close_lable_mon">x</b></span>
                    <span>Cơm tấm <b class="close_lable_mon">x</b></span>
                    <span>Cơm tấm <b class="close_lable_mon">x</b></span>
                    <span>Cơm tấm <b class="close_lable_mon">x</b></span>
                    <span>Cơm tấm <b class="close_lable_mon">x</b></span>
                    <span>Cơm tấm <b class="close_lable_mon">x</b></span>
                    <span>Cơm tấm <b class="close_lable_mon">x</b></span>
                    <span>Cơm tấm <b class="close_lable_mon">x</b></span>
                </div>
            </div>
            <div class="descrip">
                <span>Chi tiết món ăn<a>*</a></span>
                <input type="text" id="detail_mon_an_` + idThemMon + `" placeholder="Nhập mô tả...">
                <p class="message_error_descrip_` + idThemMon + ` error"></p>
            </div>
            <div class="gia_tien">
                <span>Giá tiền<a>*</a></span>
                <div class="input_gia">
                    <input type="number" id="money_mon_an_` + idThemMon + `" placeholder="0đ">
                    <select name="" id="">
                            <option value="">1 Suất</option>
                        </select>
                </div>
                <p class="message_error_gia_tien_` + idThemMon + ` error"></p>
            </div>
            <div class="serve">
                <div class="ngay_serve">
                    <span>Ngày phục vụ:</span>
                    <select name="" id="ngay_phuc_vu_` + idThemMon + `">
                        <option value="-1">Chọn </option>
                        <option value="">Cả tuần</option>
                    </select>
                    <p class="message_error_ngay_phuc_vu_` + idThemMon + ` error"></p>
                </div>
                <div class="featured">
                    <span>Món đặc trưng</span>
                    <input type="checkbox">
                    <button type="button" onclick="return delMonAn(id = ` + idDelMonAn + `)"></button>
                </div>
            </div>
        </div>
    </div>
</div>`;
    let lenght = saveRederNew.length;
    for (let i = 0; i <= lenght; i++) {
        saveRederNew[i] = render
    }
    $('.wrap-them-mon').append(saveRederNew[lenght]);
}

function delMonAn(id) {
    // console.log(id)
    $('.dish' + id).remove();
}
// form-3
$('.form3').click(function(e) {
    // alert(idThemMon);
    let flag = true;
    for (var i = 1; i <= idThemMon; i++) {
        let img_detail = $('#anh_tai_le_chi_tiet_mon_an_' + i).val();
        let name_mon_an = $('#name_mon_an_' + i).val();
        let detail_mon_an = $('#detail_mon_an_' + i).val();
        let money_mon_an = $('#money_mon_an_' + i).val();
        let ngay_phuc_vu = $('#ngay_phuc_vu_' + i).val();

        if (img_detail == '') {
            $('.message_error_anh_chitiet_' + i).text('Chèn ảnh chi tiết món ăn');
            flag = false;
        } else {
            $('.message_error_anh_chitiet_' + i).text('');
        }
        if (name_mon_an == '') {
            $('.massage_error_name_mon_an_' + i).text('Bạn không được bỏ trống tên món ăn');
            flag = false;
        } else {
            $('.massage_error_name_mon_an_' + i).text('');
        }
        if (detail_mon_an == '') {
            $('.message_error_descrip_' + i).text('Bạn không được bỏ trống Chi tiết món ăn');
            flag = false;
        } else {
            $('.message_error_descrip_' + i).text(' ');
        }
        if (money_mon_an == '') {
            $('.message_error_gia_tien_' + i).text('Bạn không được bỏ trống giá tiền ');
            flag = false;
        } else {
            $('.message_error_gia_tien_' + i).text(' ');
        }
        if (ngay_phuc_vu == '-1') {
            $('.message_error_ngay_phuc_vu_' + i).text('Vui lòng chọn ngày phục vụ');
            flag = false;
        } else {
            $('.message_error_ngay_phuc_vu_' + i).text('');
        }
    }
    if (flag == true) {
        let check = true;
        let name_food = $('#name_mon_an_1').val();
        // let type_food = $('#type_food').val();
        let description = $('#detail_mon_an_1').val();
        let price_food = $('#money_mon_an_1').val();
        let day_open = $('#ngay_phuc_vu_1').val();
        // let features_food = $('#day_open').val();
        let img_detail_food = $('#1').prop('files')[0];
        let size_detail_food = img_detail_food.size;
        let form_data = new FormData();
        let features = document.getElementById('features_checkbox').checked;
        if (features == true) {
            features_food = 1;
        } else {
            features_food = 0;
        }
        if (size_detail_food > 8000000) {
            $('.message_error_anh_chitiet_1').text('Giới hạn file upload là 8mb!');
            check = false
        } else {
            form_data.append('img_food', img_detail_food);
        }
        if (check == true) {
            alert("Thêm món thành công")
            $('.form_03').css('display', 'none');
            $('.form_04').css('display', 'block');
        }
    }
    if (flag == false) {
        return false;
    }
})
$(document).ready(function() {
    $('#uploadFormDetail').ajaxForm(function() {});
});
// ============================Bước 4=========================================
$('.back-form-4').click(function() {
    $('.form_03').css('display', 'block');
    $('.form_04').css('display', 'none');
});
var idCombo = 1;
$('.btn_Combo').click(function() {
    idCombo = idCombo + 1;
    // alert(idCombo);
});

function addComBo(idCombo) {
    idCombo++;
    renderCombo = `   <div class="them_combo combo` + idCombo + `">
    <div class="anh_chitiet">
        <div class="img_chitiet"><img src="" alt="" id="image_combo` + idCombo + `"></div>
        <div class="ip_chitiet">
            <button>Tải ảnh lên <input type="file" name="" id="" onchange="chooseFile_chitiet2(this , id = ` + idCombo + `)"></button>
            <span>Dung lượng hình ảnh không được lớn hơn 1MB.</span>
        </div>
        <p class="error message_error_img_combo_` + idCombo + `"></p>
    </div>
    <div class="info_combo">
        <div class="name_combo">
            <span>Tên Combo<a>*</a></span>
            <div class="combo">
                <input type="text" id="name_combo_` + idCombo + `" placeholder="Nhập tên món">
            </div>
            <p class="error message_error_name_combo_` + idCombo + `"></p>

            <div class="descrip_combo">
                <span>Chọn món ăn<a>*</a></span>
                <div class="choose_combo">
                    <input type="text" id="descrip_combo_` + idCombo + `" placeholder="Chọn món ăn nhà hàng đã lưu">
                    <select name="" id="">
                        <option value="">Món đã lưu</option>
                    </select>
                </div>
                <p class="error message_error_descrip_combo_` + idCombo + `"></p>

            </div>
            <div class="gia_combo">
                <span>Giá tiền<a>*</a></span>
                <div class="input_combo">
                    <input type="number" id="gia_combo_` + idCombo + `" placeholder="0đ">
                    <select name="" id="">
                            <option value="">1 Suất</option>
                        </select>
                </div>
                <p class="error message_error_gia_combo_` + idCombo + `"></p>

            </div>
            <div class="serve">
                <div class="ngay_serve">
                    <span>Ngày phục vụ:</span>
                    <select name="" id="ngay_phucvu_` + idCombo + `">
                        <option value="-1">Chọn</option>
                        <option value="">Cả tuần</option>
                    </select>
                    <p class="error message_error_ngay_phucvu_` + idCombo + `"></p>
                </div>
                <div class="featured_combo">
                <button type="button" onclick="return deleteCombo(id = ` + idCombo + `)"></button>
                </div>
            </div>
        </div>
    </div>
</div>`
    $('.wrap-combo').append(renderCombo);
}
$('.form4').click(function() {
    // console.log(idCombo); 
    let flag = true;
    for (let i = 1; i <= idCombo; i++) {
        let image_combo = $('#image_combo' + i).val();
        let name_combo = $('#name_combo_' + i).val();
        let descrip_combo = $('#descrip_combo_' + i).val();
        let gia_combo = $('#gia_combo_' + i).val();
        let ngay_phucvu = $('#ngay_phucvu_' + i).val()
        if (image_combo == '') {
            $('.message_error_img_combo_' + i).text('Chèn ảnh chi tiết combo');
            flag = false;
        } else {
            $('.message_error_img_combo_' + i).text('');
            flag = true;
        }
        if (name_combo == '') {
            $('.message_error_name_combo_' + i).text('Bạn không được bỏ trống Tên Combo');
            flag = false;
        } else {
            $('.message_error_name_combo_' + i).text('');
            flag = true;
        }
        if (descrip_combo == '') {
            $('.message_error_descrip_combo_' + i).text('Bạn không được bỏ trống Chi Tiết  Combo');
            flag = false;
        } else {
            flag = true;
            $('.message_error_descrip_combo_' + i).text('');
        }
        if (gia_combo == '') {
            $('.message_error_gia_combo_' + i).text('Bạn không được bỏ trống Giá Combo');
            flag = false;
        } else {
            flag = true;
            $('.message_error_gia_combo_' + i).text('');
        }
        if (ngay_phucvu == '-1') {
            $('.message_error_ngay_phucvu_' + i).text('Bạn không được bỏ trống Ngày phục vụ');
            flag = false;
        } else {
            flag = true;
            $('.message_error_ngay_phucvu_' + i).text('');
        }
        if (flag == false) {
            return false;
        }
    }
    if (flag == true) {
        let check = true;
        let img_combo = $('#1').prop('files')[0];
        let size_combo_food = img_combo.size;
        if (size_combo_food > 8000000) {
            $('.message_error_img_combo_1').text('Giới hạn file upload là 8mb!');
            check = false
        } else {
            $('.form_05').css('display', 'block');
            $('.form_04').css('display', 'none');
        }
    }
    if (flag == false) {
        return false;
    }

});
$(document).ready(function() {
    $('#uploadFormCombo').ajaxForm(function() {});
});
//xóa combo
function deleteCombo(id) {
    $('.combo' + id).remove();
    // alert(id)
}
// ===================================Bước 5============================================================
$('.back_form5').click(function() {
    $('.form_04').css('display', 'block');
    $('.form_05').css('display', 'none');
});
// bật nhóm món ăn đã lưu
function showChooseSave(id) {
    $('#group_' + id).toggleClass('d-block');
}
// xóa nhóm
function delGroup(id) {
    $('#group' + id).remove();

}
// thêm nhóm
var idAddGroup = 1;
$('.add_group').click(function() {
    idAddGroup = idAddGroup + 1;
    // alert(idCombo);
});

function addGroup(idAddGroup) {
    idAddGroup++;
    let renderGroup = `
    
    <div class="info_group" id="group` + idAddGroup + `">
    <div class="name_gr">
        <span>Tên nhóm<a>*</a></span>
        <input type="text" name="" id="name_group_` + idAddGroup + `" placeholder="Nhập tên món" value="">
        <p class="error message_error_name_group_` + idAddGroup + `"></p>
    </div>

    <div class="gr_choose">
        <span>Chọn món ăn<a>*</a></span>
        <div class="choose">
            <input type="text" id="gr_choose_` + idAddGroup + `" placeholder="Chọn món ăn nhà hàng đã lưu">
        </div>
        <p class="error message_error_gr_choose_` + idAddGroup + `"></p>

        <div class="name-group" onclick="return showChooseSave(` + idAddGroup + `)">
            <p>Món đã lưu</p>
        </div>
        <div class="choose-loai-mon-an" id="group_` + idAddGroup + `" hidden>
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
                            <span class="name-mon-an-1" " onclick="showDoAnThu1(` + idAddGroup + `)">    Đồ ăn</span>
                            <div class="" id="do-an-` + idAddGroup + `" hidden>
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
                    <div class="mon-an-2">
                        <div class="icon-dropdown-mon-an-2"></div>
                        <div class="wrap-mon-an-2">
                            <input type="checkbox" name="" id="">
                            <span class="name-mon-an-2" onclick="showMonAnThu1(` + idAddGroup + `)">Đồ ăn</span>
                            <div class="" id="mon-an-` + idAddGroup + `" hidden>
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
        </div>
        <div class="lable_mon">
            <h2>Nhãn:</h2>
            <div class="list">
                <span>Cơm tấm <b class="close_lable_mon">x</b></span>
                <span>Cơm tấm <b class="close_lable_mon">x</b></span>
                <span>Cơm tấm <b class="close_lable_mon">x</b></span>
                <span>Cơm tấm <b class="close_lable_mon">x</b></span>
                <span>Cơm tấm <b class="close_lable_mon">x</b></span>
                <span>Cơm tấm <b class="close_lable_mon">x</b></span>
                <span>Cơm tấm <b class="close_lable_mon">x</b></span>
                <span>Cơm tấm <b class="close_lable_mon">x</b></span>
            </div>
        </div>
    </div>
    <div class="delete">
        <button onclick="delGroup(` + idAddGroup + `)"></button>
    </div>
</div>`
    $('.wrap-info-group').append(renderGroup);
}
// show đồ ăn 
function showMonAnThu1(id) {
    $("#mon-an-" + id).toggleClass('d-block')
}

function showDoAnThu1(id) {
    $('#do-an-' + id).toggleClass('d-block')
}
// Validate form 5
$('.form5').click(function() {
    var flag;
    for (var i = 1; i <= idAddGroup; i++) {
        var name_gr = $('#name_group_' + i).val();
        var choose_group = $('#gr_choose_' + i).val();
        if (name_gr == '') {
            $('.message_error_name_group_' + i).text('Bạn không được bỏ trống tên nhóm');
            flag = false;
        } else {
            $('.message_error_name_group_' + i).text('');
            flag = true;

        }
        if (choose_group == '') {
            $('.message_error_gr_choose_' + i).text('Hãy chọn món ăn');
            flag = false;
        } else {
            flag = true;
            $('.message_error_gr_choose_' + i).text('');
        }
    }

    if (flag == true) {
        $('.form_06').css('display', 'block');
        $('.form_05').css('display', 'none');
    }

});
$(document).ready(function() {
    $('#uploadFormGR').ajaxForm(function() {});
});

function save_infor_merchant() {
    window.location = "/thong-ke";
}
$(document).ready(function() {
    $('#save_infor_merchant').ajaxForm(function() {});
});