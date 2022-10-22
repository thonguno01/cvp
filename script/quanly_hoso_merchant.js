$(document).ready(function() {
    $('.form-select').select2();
});


document.getElementById("btn1").onclick = function() {
    document.getElementById("form_01").style.display = 'block';
    document.getElementById("form_02").style.display = 'none';
    document.getElementById("form_03").style.display = 'none';
};
document.getElementById("btn2").onclick = function() {
    document.getElementById("form_01").style.display = 'none';
    document.getElementById("form_02").style.display = 'block';
    document.getElementById("form_03").style.display = 'none';
};
document.getElementById("btn3").onclick = function() {
    document.getElementById("form_01").style.display = 'none';
    document.getElementById("form_02").style.display = 'none';
    document.getElementById("form_03").style.display = 'block';
};



document.getElementById("btn1a").onclick = function() {
    document.getElementById("form_01").style.display = 'block';
    document.getElementById("form_02").style.display = 'none';
    document.getElementById("form_03").style.display = 'none';
};
document.getElementById("btn2a").onclick = function() {
    document.getElementById("form_01").style.display = 'none';
    document.getElementById("form_02").style.display = 'block';
    document.getElementById("form_03").style.display = 'none';
};
document.getElementById("btn3a").onclick = function() {
    document.getElementById("form_01").style.display = 'none';
    document.getElementById("form_02").style.display = 'none';
    document.getElementById("form_03").style.display = 'block';
};





document.getElementById("btn1b").onclick = function() {
    document.getElementById("form_01").style.display = 'block';
    document.getElementById("form_02").style.display = 'none';
    document.getElementById("form_03").style.display = 'none';
};
document.getElementById("btn2b").onclick = function() {
    document.getElementById("form_01").style.display = 'none';
    document.getElementById("form_02").style.display = 'block';
    document.getElementById("form_03").style.display = 'none';
};
document.getElementById("btn3b").onclick = function() {
    document.getElementById("form_01").style.display = 'none';
    document.getElementById("form_02").style.display = 'none';
    document.getElementById("form_03").style.display = 'block';
};






function lam_moi_ho_so() {
    $(".popup_profile_new").show();
}
document.getElementById("close-btn-new").onclick = function() {
    document.getElementById("popup_profile_new").style.display = 'none';
};
document.getElementById("huy").onclick = function() {
    document.getElementById("popup_profile_new").style.display = 'none';
};


function chinh_sua_thong_tin() {
    $(".popup_profile_chitiet").show();
}
document.getElementById("close-btn-chitiet").onclick = function() {
    document.getElementById("popup_profile_chitiet").style.display = 'none';
};
document.getElementById("huy_chitiet").onclick = function() {
    document.getElementById("popup_profile_chitiet").style.display = 'none';
};


document.getElementById("popup_post_show").onclick = function() {
    document.getElementById("popup_post_mer").style.display = 'block';
};
document.getElementById("close-btn-post").onclick = function() {
    document.getElementById("popup_post_mer").style.display = 'none';
};

function report_btn(id){
    let render = `<div class="report_body_post">
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
                                <select name="" id="reason11">
                                    <option value="" selected>--Chọn--</option>
                                    <option value="0">Bài viết có nội dung không liên quan</option>
                                    <option value="1">Bài viết có nội dung không đúng đắn</option>
                                    <option value="2">Bài viết có nội dung phản động</option>
                                </select>
                                <div class="ic-drop-down"></div>
                            </div>
                            <div class="text-why">
                                <div class="name-text-why">
                                    <p>Lý do khác:</p>
                                </div>
                                <div class="textarea-why">
                                    <textarea name="" id="reason22"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="bot-system ">
                            <p>Hệ thống sẽ ghi nhận báo cáo của bạn!
                            </p>
                        </div>
                        <div class="btn_cancle_saveReport">
                            <button class="cancle" id="huy_report">Hủy</button>
                            <button class="saveReport" onclick="save_report(`+id+`)">Lưu Báo Cáo</button>
                        </div>
                    </div>
                </div>`
    document.getElementById("report_post").style.display = 'block';
    $('#report_post').html(render);
    document.getElementById("huy_report").onclick = function() {
    document.getElementById("report_post").style.display = 'none';
    };
}
function save_report(id){
    let reason11 = $("#reason11").val();
    let reason22 = $("#reason22").val();
    if(reason11 == '' && reason22 == ''){
        alert("Chọn hoặc nhập lý do báo cáo !")
    }
    else{
        let data_json = {
            id: id,
            reason1: reason11,
            reason2: reason22
        }
        let out = callAjax('ho-so-quan-an/report-post','post',data_json);
        if(out.rs == true){
            alert(out.msg)
            document.getElementById("report_post").style.display = 'none';
        }
    }
}
function edit_post(e,id){
    let content = $(e).parent().parent().find('span.post_content_data').text();
    let img_avata = $(e).parent().parent().find('span.post_img_data').text();
    let name_mechart = $(e).parent().parent().find('span.post_name_data').text();
    let render =`<div class="popup_body_post">
                    <div class="p1">
                        <h2>Chỉnh sửa bài viết</h2>
                        <div class="close"><span class="close-btn" onclick="close_btn_post()">×</span></div>
                    </div>
                    <form action="ho-so-quan-an/post" method="POST" id="uploadForm" enctype="multipart/form-data">
                        <div class="p2">
                            <div class="name_avt">
                                <div class="avt_post"><img src="../img/Logo_CVP.png" alt=""></div>
                                <h2>Sườn Mười</h2>
                            </div>
                            <textarea name="content_post" id="content_post" placeholder="Chủ quán ơi, bạn đang nghĩ gì thế ? ">`+content+`</textarea>
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
                                <button type="submit" name="submit" onclick="return form_post()">Lưu</button>
                            </div>
                        </div>
                    </form>
                </div>`
    document.getElementById("edit_popup_post_mer").style.display = 'block';
    $('#edit_popup_post_mer').html(render);
}
function close_btn_post(){
    document.getElementById("edit_popup_post_mer").style.display = 'none';
}

function editMon(id) {
    let render = `<div class="popup_mon_body">
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
                            <input type="text" value="" placeholder="Nhập tên món" id="name_mon">
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
                            <button type="button" id="huy_mon" class="back">Hủy</button>
                            <button type="button" onclick="return form_validate_chitiet_mon()">Lưu</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>`
document.getElementById("popup_profile_mon").style.display = 'block';
    $('#popup_profile_mon').html(render);
    document.getElementById("close-btn-mon").onclick = function() {
        document.getElementById("popup_profile_mon").style.display = 'none';
    };
    document.getElementById("huy_mon").onclick = function() {
        document.getElementById("popup_profile_mon").style.display = 'none';
    };
}


// document.getElementById("edit_combo").onclick = function() {
//     document.getElementById("popup_profile_combo").style.display = 'block';
// };
document.getElementById("close-btn-combo").onclick = function() {
    document.getElementById("popup_profile_combo").style.display = 'none';
};












function form_validate_info() {
    let name_merchant = document.getElementById('name_merchant').value;
    let phone_merchant = document.getElementById('phone_merchant').value;
    let typical_food = document.getElementById('typical_food').value;
    let id_city = document.getElementById('id_city').value;
    let id_district = document.getElementById('id_district').value;
    let add_merchant = document.getElementById('add_merchant').value;
    let flag = true;
    if (name_merchant == '') {
        document.getElementById('error_message_name').innerHTML = `<span class="error_message">(Không được bỏ trống)</span>`;
        flag = false;
    } else if (phone_merchant == '') {
        document.getElementById('error_message_phone').innerHTML = `<span class="error_message">(Không được bỏ trống)</span>`;
        flag = false;
    } else if (typical_food == '') {
        document.getElementById('error_message_typical_food').innerHTML = `<span class="error_message">(Không được bỏ trống)</span>`;
        flag = false;
    } else if (id_city == '') {
        document.getElementById('error_message_city').innerHTML = `<span class="error_message">(Không được bỏ trống)</span>`;
        flag = false;
    } else if (id_district == '') {
        document.getElementById('error_message_district').innerHTML = `<span class="error_message">(Không được bỏ trống)</span>`;
        flag = false;
    } else if (add_merchant == '') {
        document.getElementById('error_message_add').innerHTML = `<span class="error_message">(Không được bỏ trống)</span>`;
        flag = false;
    } else {
        if (flag = true) {
            let data_json = {
                name_merchant: name_merchant,
                phone_merchant: phone_merchant,
                typical_food: typical_food,
                id_city: id_city,
                id_district: id_district,
                add_merchant: add_merchant,
            }
            let out = callAjax('/update-detail-merchant', 'post', data_json);
            if (out.rs == true) {
                alert(out.msg);
            } else {
                alert(out.msg);
            }
        }
    }
}

function form_validate_chitiet() {
    let day_open = document.getElementById('day_open').value;
    let time_start = document.getElementById('time_start').value;
    let time_end = document.getElementById('time_end').value;
    let type_merchant = document.getElementById('type_merchant').value;
    let key_search = document.getElementById('key_search').value;
    let fee_merchant = document.getElementById('fee').value;
    let mota_merchant = document.getElementById('mo_ta').value;
    let img_avatar_check = document.getElementById('img_avatar').value;
    let img_cover_check = document.getElementById('img_cover').value;

    let flag = true;
    let data_json = {
        day_open: day_open,
        time_start: time_start,
        time_end: time_end,
        type_merchant: type_merchant,
        key_search: key_search,
        fee_merchant: fee_merchant,
        mota_merchant: mota_merchant,
        // data: formData,
    }
    if (fee_merchant == '') {
        document.getElementById('error_message_fee').innerHTML = `<span class="error_message">(Không được bỏ trống)</span>`;
        flag = false;
    }
    if (mota_merchant == '') {
        document.getElementById('error_message_mota').innerHTML = `<span class="error_message">(Không được bỏ trống)</span>`;
        flag = false;
    } else {
        if (img_avatar_check == '' && img_cover_check == '') {
            let out = callAjax('/update-detail-merchant-2', 'post', data_json);
            if (out.rs == true) {
                alert(out.msg);
            } else {
                alert(out.msg);
            }
        } else {
            let img_avatar = $('#img_avatar').prop('files')[0];
            let img_cover = $('#img_cover').prop('files')[0];
            let form_data = new FormData();
            let check = true

            if (img_avatar_check != '' && img_cover_check == '') {
                let size_avt = img_avatar.size;
                if (size_avt > 8000000) {
                    $('.message_error_anh_dai_dien').text('Giới hạn file upload là 8mb!');
                    check = false
                } else {
                    form_data.append('img_avt', img_avatar);
                }
                if (check == true) {
                    $.ajax({
                        type: 'POST',
                        url: '/update-detail-merchant-2/upload',
                        dataType: 'text',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                    });
                    let out = callAjax('/update-detail-merchant-2', 'post', data_json);
                    if (out.rs == true) {
                        alert(out.msg);
                    } else {
                        alert(out.msg);
                    }
                }
            }
            if (img_avatar_check == '' && img_cover_check != '') {
                let size_cover = img_cover.size;
                if (size_cover > 8000000) {
                    $('.message_error_anh_bia').text('Giới hạn file upload là 8mb!');
                    check = false
                } else {
                    form_data.append('img_cover', img_cover);
                }
                if (check == true) {
                    $.ajax({
                        type: 'POST',
                        url: '/update-detail-merchant-2/upload',
                        dataType: 'text',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                    });
                    let out = callAjax('/update-detail-merchant-2', 'post', data_json);
                    if (out.rs == true) {
                        alert(out.msg);
                    } else {
                        alert(out.msg);
                    }
                }
            }
            if (img_avatar_check != '' && img_cover_check != '') {
                let size_avt = img_avatar.size;
                let size_cover = img_cover.size;
                if (size_avt > 8000000) {
                    $('.message_error_anh_dai_dien').text('Giới hạn file upload là 8mb!');
                    check = false
                } else {
                    form_data.append('img_avt', img_avatar);
                }
                if (size_cover > 8000000) {
                    $('.message_error_anh_bia').text('Giới hạn file upload là 8mb!');
                    check = false
                } else {
                    form_data.append('img_cover', img_cover);
                }
                if (check == true) {
                    $.ajax({
                        type: 'POST',
                        url: '/update-detail-merchant-2/upload',
                        dataType: 'text',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                    });
                    let out = callAjax('/update-detail-merchant-2', 'post', data_json);
                    if (out.rs == true) {
                        alert(out.msg);
                    } else {
                        alert(out.msg);
                    }
                }
            }
        }
    }
}
$(document).ready(function() {
    if (window.File && window.FileList && window.FileReader) {
        $("#imageFile").on("change", function(e) {
            var files = e.target.files,
                filesLength = files.length;
            for (var i = 0; i < filesLength; i++) {
                var f = files[i]
                var fileReader = new FileReader();
                fileReader.onload = (function(e) {
                    var file = e.target;
                    $("<span class=\"pip\">" +
                        "<span >Ảnh</span><span class=\"remove\">×</span>" +
                        "<img id=\"myimg\" class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                        "</span>").appendTo("#img_vd");
                    $(".remove").click(function() {
                        $(this).parent(".pip").remove();
                    });
                });
                fileReader.readAsDataURL(f);
            }
        });
    } else {
        alert("Your browser doesn't support to File API")
    }
});
$(document).ready(function() {
    if (window.File && window.FileList && window.FileReader) {
        $("#imageFileVD").on("change", function(e) {
            var files = e.target.files,
                filesLength = files.length;
            for (var i = 0; i < filesLength; i++) {
                var f = files[i]
                var fileReader = new FileReader();
                fileReader.onload = (function(e) {
                    var file = e.target;
                    $("<span class=\"pip\">" +
                        "<span >Video</span><span class=\"remove\">×</span><br/>" +
                        "<video id=\"myimg\" class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/></video>" +
                        "</span>").appendTo("#img_vd");
                    $(".remove").click(function() {
                        $(this).parent(".pip").remove();
                    });
                });
                fileReader.readAsDataURL(f);
            }
        });
    } else {
        alert("Your browser doesn't support to File API")
    }
});




function form_validate_chitiet_mon() {
    let name_mon = document.getElementById('name_mon').value;
    let chitiet_mon = document.getElementById('chitiet_mon').value;
    let gia_tien = document.getElementById('gia_tien').value;
    let flag = true;
    if (name_mon == '') {
        document.getElementById('error_message_name_mon').innerHTML = `<span class="error_message" >(Không được bỏ trống)</span>`;
        flag = true;
    }
    if (chitiet_mon == '') {
        document.getElementById('error_message_chitiet_mon').innerHTML = `<span class="error_message">(Không được bỏ trống)</span>`;
        flag = false;
    }
    if (gia_tien == '') {
        document.getElementById('error_message_gia').innerHTML = `<span class="error_message">(Không được bỏ trống)</span>`;
        flag = false;
    }
}


document.getElementById("video").onclick = function() {
    document.getElementById("popup_post_mer").style.display = 'block';
};
document.getElementById("hinh_anh").onclick = function() {
    document.getElementById("popup_post_mer").style.display = 'block';
};
document.getElementById("cam_xuc").onclick = function() {
    document.getElementById("popup_post_mer").style.display = 'block';
};




function form_post() {
    let imageFile = document.getElementById('imageFile').value;
    let imageFileVD = document.getElementById('imageFileVD').value;
    let content = document.getElementById('content_post').value;
    let merchant_id = document.getElementById('merchant_id').value;

    let img_post = $('#imageFile').prop('files')[0];
    let video_post = $('#img_cover').prop('files')[0];

    let flag = true;
    if (content == "") {
        alert("Hãy nhập suy nghĩ của bạn!");
        flag = false;
    } else if (imageFile == '' && imageFileVD == '') {
        alert("Chọn ít nhất 1 file ảnh nha bạn!");
        flag = false;
    } else if (flag == true) {
        alert("Tin của bạn đã được tải lên. Hãy chờ xét duyệt!");
    }
    if (flag == false) {
        return false;
    }
}
$(document).ready(function() {
    $('#uploadForm').ajaxForm(function() {});
});

function delete_combo(id) {
    let name_combo = $("#name_combo_" + id).val();
    let data_json = {
        id: id,
    }
    if (confirm("Xóa " + name_combo + " khỏi cửa hàng?") == true) {
        let redirect = callAjax('/ho-so-quan-an/delete-combo', 'post', data_json);
        document.getElementById("combo_dom_" + id).style.display = 'none';
    }
}

function delete_group(id) {
    let name_group = $("#name_group_" + id).val();
    let data_json = {
        id: id,
    }
    if (confirm("Xóa " + name_group + " khỏi cửa hàng?") == true) {
        let redirect = callAjax('/ho-so-quan-an/delete-group', 'post', data_json);
        document.getElementById("group_dom_" + id).style.display = 'none';
    }
}

function delete_day(id) {
    let name_day = $("#name_day_" + id).val();
    let data_json = {
        id: id,
    }
    if (confirm("Xóa " + name_day + " khỏi cửa hàng?") == true) {
        let redirect = callAjax('/ho-so-quan-an/delete-day', 'post', data_json);
        document.getElementById("day_dom_" + id).style.display = 'none';
    }
}

function delete_detail(id) {
    let name_detail = $("#name_detail_" + id).val();
    let data_json = {
        id: id,
    }
    if (confirm("Xóa " + name_detail + " khỏi cửa hàng?") == true) {
        let redirect = callAjax('/ho-so-quan-an/delete-detail', 'post', data_json);
        document.getElementById("detail_dom_" + id).style.display = 'none';
    }
}

// =====================================================================
// form đánh giá 
function getImgAll(e, checkTitle, active, idMer) {

    if (checkTitle == 'video') {
        $(e).parent().find('span').removeClass(active);
        $(e).addClass(active);
        let ResAjax = callAjax('get-image-all-feedback', 'post', { idMer: idMer, checkTit: 'video' });
        $('#image').html(renderImg(ResAjax))

    } else if (checkTitle == '2') {
        $(e).parent().find('span').removeClass(active);
        $(e).addClass(active);
        let ResAjax = callAjax('get-image-all-feedback', 'post', { idMer: idMer, checkTit: '2' });
        $('#image').html(renderImg(ResAjax))


    } else if (checkTitle == '1') {
        $(e).parent().find('span').removeClass(active);
        $(e).addClass(active);
        let ResAjax = callAjax('get-image-all-feedback', 'post', { idMer: idMer, checkTit: '1' });
        $('#image').html(renderImg(ResAjax))

    } else if (checkTitle == '3') {
        $(e).parent().find('span').removeClass(active);
        $(e).addClass(active);
        let ResAjax = callAjax('get-image-all-feedback', 'post', { idMer: idMer, checkTit: '3' });
        $('#image').html(renderImg(ResAjax))



    }

}

function renderImg(ResAjax) {
    let text = '';
    for (let i = 0; i < (ResAjax).length; i++) {
        for (let j = 0; j < (ResAjax[i]).length; j++) {
            if (ResAjax[i][j] == '') {
                text = '';
            } else {
                let x = Number((ResAjax[i][j]).length);
                let check = ResAjax[i][j].slice(x - 3, x);
                if (check == 'mp4' || check == 'avi' || check == 'wmv' || check == 'mp3' || check == 'wav') {
                    text += `<video controls><source src="/upload/feed-back/` + ResAjax[i][j] + `" type=""></video>`;

                } else {
                    text += `<img src="/upload/feed-back/` + ResAjax[i][j] + `" alt="Tất cả ảnh "></img>`;
                }
            }
        }
    }
    return text;
}


function getFeedBack(e, checkTitle, active, idMer) {
    // alert();
    if (checkTitle == '0') {
        $(e).parent().find('span').removeClass(active);
        $(e).addClass(active);
        let feedBackAjax1 = callAjax('get-feedback-customer', 'post', { idMer: idMer, checkTitle: '0' })
        $('.wrap-comment').html(renderFeedBackNoImg(feedBackAjax1));
    } else if (checkTitle == '1') {
        $(e).parent().find('span').removeClass(active);
        $(e).addClass(active);
        let feedBackAjax = callAjax('get-feedback-customer', 'post', { idMer: idMer, checkTitle: '1' })
        $('.wrap-comment').html(renderFeedBack(feedBackAjax));
    } else if (checkTitle == 'vi') {
        $(e).parent().find('span').removeClass(active);
        $(e).addClass(active);
        let feedBackAjax = callAjax('get-feedback-customer', 'post', { idMer: idMer, checkTitle: 'vi' })
        $('.wrap-comment').html(renderFeedBack(feedBackAjax));
    }
}

function renderFeedBack(feedBackAjax) {

    let text = '';
    let textImg = '';
    let textComent = '';
    if (feedBackAjax == []) {
        text = 'không có dữ liệu';
    } else {
        for (let i = 0; i < feedBackAjax.length; i++) {
            if (feedBackAjax[i].img_order != null) {
                let img = (feedBackAjax[i].img_order).split(",");
                for (let j = 0; j < img.length; j++) {
                    textImg += `<img src="/upload/feed-back/` + img[j] + `" alt="">`
                }
            }
            if (feedBackAjax[i].video_order != null) {
                let video = (feedBackAjax[i].video_order).split(",");
                for (let j = 0; j < video.length; j++) {
                    if (video[j] != '') {
                        textImg += `    <video controls><source src="/upload/feed-back/` + video[j] + `" type=""></video>`;
                    }
                }
            }
            if (feedBackAjax[i].comment == null) {
                textComent == '';
            }
            text += `
           <div class="comment">
           <div class="avat-comment">
               <img src="upload/information/` + feedBackAjax[i].infoCus['img_avata'] + `" alt="ảnh đại diện người comment ">
           </div>
           <div class="info-commenter">
               <div class="name-commenter">
                   <span class="name_cmter">` + feedBackAjax[i].infoCus['name'] + `</span>
                   <div class="num-img">
                       <img src="../img/more.svg" alt="Tùy chọn">
                   </div>
               </div>
               <div class="cmt-start">
                   <img src="../img/star_feedback.svg" alt="comment sao">
                   <img src="../img/star_feedback.svg" alt="comment sao">
                   <img src="../img/star_feedback.svg" alt="comment sao">
                   <img src="../img/star_feedback.svg" alt="comment sao">
                   <img src="../img/star_feedback.svg" alt="comment sao">
               </div>
               <div class="cmt-contnet">
                   <p>` + textComent + `</p>
               </div>
               <div class="toppic-cmt">
                   <span>` + feedBackAjax[i].label + `</span>
               </div>
               <div class="detail-order">
                   <div class="thea">
                       <a href=""> Chi tiết đơn hàng </a>
                   </div>
                   <div class="img-detail-order">
                    ` + textImg + `
                   </div>
               </div>
               <div class="button-like-cmt">
                   <button class="button-like">
                       <img src="../img/like-food.svg" alt="Lượt thích">
                       <span class="num-like">10</span>
                   </button>
                   <button class="button-cmt">
                       <img src="../img/cmt-post.svg" alt="Lượt comment">
                       <span class="num-cmt">10</span>
                   </button>
               </div>
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
           `
            textImg = '';
        }
    }
    return text;
}

function renderFeedBackNoImg(feedBackAjax) {

    let text = '';
    let textComent = '';
    if (feedBackAjax == []) {
        text = 'không có dữ liệu';
    } else {
        for (let i = 0; i < feedBackAjax.length; i++) {
            if (feedBackAjax[i].comment == null) {
                textComent == '';
            }
            text += `
           <div class="comment">
           <div class="avat-comment">
               <img src="upload/information/` + feedBackAjax[i].infoCus['img_avata'] + `" alt="ảnh đại diện người comment ">
           </div>
           <div class="info-commenter">
               <div class="name-commenter">
                   <span class="name_cmter">` + feedBackAjax[i].infoCus['name'] + `</span>
                   <div class="num-img">
                       <img src="../img/more.svg" alt="Tùy chọn">
                   </div>
               </div>
               <div class="cmt-start">
                   <img src="../img/star_feedback.svg" alt="comment sao">
                   <img src="../img/star_feedback.svg" alt="comment sao">
                   <img src="../img/star_feedback.svg" alt="comment sao">
                   <img src="../img/star_feedback.svg" alt="comment sao">
                   <img src="../img/star_feedback.svg" alt="comment sao">
               </div>
               <div class="cmt-contnet">
                   <p>` + textComent + `</p>
               </div>
               <div class="toppic-cmt">
                   <span>` + feedBackAjax[i].label + `</span>
               </div>
               <div class="detail-order">
                   <div class="thea">
                       <a href=""> Chi tiết đơn hàng </a>
                   </div>
                   
               </div>
               <div class="button-like-cmt">
                   <button class="button-like">
                       <img src="../img/like-food.svg" alt="Lượt thích">
                       <span class="num-like">10</span>
                   </button>
                   <button class="button-cmt">
                       <img src="../img/cmt-post.svg" alt="Lượt comment">
                       <span class="num-cmt">10</span>
                   </button>
               </div>
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
           `
        }
    }
    return text;
}


function edit_group(id){
    let name_group = $("#name_group_"+id).val();
    let detail_menu_group_id = $("#detail_menu_group_id_"+id).val();

    let render = `<div class="popup_nhom_body">
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
                                    <input type="hidden" name="" id="id_nhom" value="`+ id +`">
                                    <input type="text" name="" id="name_nhom" placeholder="Nhập tên món" value="`+ name_group +`">
                                </div>
                                <div class="gr_choose">
                                    <span>Chọn món ăn<a>*</a></span><span id="error_message_chon_nhom"></span>
                                    <div class="choose">
                                        <input type="text" placeholder="Chọn món ăn nhà hàng đã lưu" id="chon_nhom" value="`+ detail_menu_group_id +`">
                                        <select name="" id="">
                                            <option value="">Món đã lưu</option>
                                        </select>
                                    </div>
                                </div>
                               
                            </div>
                            <div class="next_st2">
                                <button type="button" class="back" id="huy-btn-nhom">Hủy</button>
                                <button type="button" onclick="return form_validate_nhom()">Lưu</button>
                            </div>
                        </form>
                    </div>
                </div>`
    document.getElementById("popup_profile_nhom").style.display = 'block';
    $('#popup_profile_nhom').html(render);
    document.getElementById("close-btn-nhom").onclick = function() {
        document.getElementById("popup_profile_nhom").style.display = 'none';
    };
    document.getElementById("huy-btn-nhom").onclick = function() {
        document.getElementById("popup_profile_nhom").style.display = 'none';
    };
}
function form_validate_nhom() {
    let id_nhom = document.getElementById('id_nhom').value;
    let name_nhom = document.getElementById('name_nhom').value;
    let chon_nhom = document.getElementById('chon_nhom').value;
    let flag = true;
    if (name_nhom == '') {
        document.getElementById('error_message_name_nhom').innerHTML = `<span class="error_message" >(Không được bỏ trống)</span>`;
        flag = false;
    }
    if (chon_nhom == '') {
        document.getElementById('error_message_chon_nhom').innerHTML = `<span class="error_message">(Không được bỏ trống)</span>`;
        flag = false;
    }
    if(flag == true){
        let data_json = {
            id : id_nhom,
            name_group : name_nhom,
            detail_menu_group_id :chon_nhom
        }
        let out = callAjax('/ho-so-quan-an/edit-group', 'post', data_json);
        if(out.rs == true){
            alert(out.msg);
        }
    }
}
function edit_combo(id){
    let name_combo = $("#name_combo_"+id).val();
    let detail_menu_combo_id = $("#detail_menu_combo_id_"+id).val();
    let price_combo = $("#price_combo_"+id).val();
    let img_combo = $("#img_combo_"+id).val();
    let day_service = $("#day_service_"+id).val();
    let thu = ['Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7', 'Chủ nhật', 'Cả tuần'];
    let render = `<div class="popup_combo_body">
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
                                    <div class="img_chitiet"><img src="upload/merchant/food/`+ img_combo +`" alt="" id="image_combo"></div>
                                    <div class="ip_chitiet">
                                        <button>Tải ảnh lên <input type="file" name="" id="" onchange="chooseFile_combo(this)"></button>
                                        <span>Dung lượng hình ảnh không được lớn hơn 8MB.</span>
                                    </div>
                                </div>
                                <div class="info_combo">
                                    <div class="name_combo">
                                        <span>Tên Combo<a>*</a></span><span id="error_message_name_combo"></span>
                                        <div class="combo">
                                            <input type="text" placeholder="Nhập tên món" id="name_combo" value="`+ name_combo +`">
                                        </div>
                                        <div class="descrip_combo">
                                            <span>Chọn món ăn<a>*</a></span><span id="error_message_chon_combo"></span>
                                            <div class="choose_combo">
                                                <input type="text" placeholder="Chọn món ăn nhà hàng đã lưu" id="chon_mon" value="`+ detail_menu_combo_id +`">
                                                <select name="" id="">
                                                    <option value="">Món đã lưu</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="gia_combo">
                                            <span>Giá tiền<a>*</a></span><span id="error_message_gia_combo"></span>
                                            <div class="input_combo">
                                                <input type="number" placeholder="0đ" id="gia_combo" value="`+ price_combo +`">
                                                <select name="" id="">
                                                    <option value="">1 Suất</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="serve">
                                            <div class="ngay_serve">
                                                <span>Ngày phục vụ:</span>
                                                <select name="" id="">
                                                    <option value="`+ day_service +`" selected>` + thu[day_service] + `</option>
                                                    <option value="0">Thứ 2</option>
                                                    <option value="1">Thứ 3</option>
                                                    <option value="2">Thứ 4</option>
                                                    <option value="3">Thứ 5</option>
                                                    <option value="4">Thứ 6</option>
                                                    <option value="5">Thứ 7</option>
                                                    <option value="6">Chủ nhật</option>
                                                    <option value="7">Cả tuần</option>
                                                </select>
                                            </div>
                                            <div class="featured_combo">
                                             <input type="checkbox" placeholder="0đ" id="sale_combo_check" value="1">
                                             <span>Khuyến mãi</span>
                                             <input type="number" placeholder="20%" id="sale_combo_input" >
                                            </div>
                                        </div>
                                        
                                        <div class="next_st2">
                                            <button type="button" class="back" id="huy-btn-combo">Hủy</button>
                                            <button type="button" onclick="return form_validate_combo(`+id+`)">Lưu</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>`
    document.getElementById("popup_profile_combo").style.display = 'block';
    $('#popup_profile_combo').html(render);
    document.getElementById("close-btn-combo").onclick = function() {
        document.getElementById("popup_profile_combo").style.display = 'none';
    };
    document.getElementById("huy-btn-combo").onclick = function() {
        document.getElementById("popup_profile_combo").style.display = 'none';
    };
}
function form_validate_combo(id) {
    let name_combo = document.getElementById('name_combo').value;
    let chon_mon = document.getElementById('chon_mon').value;
    let gia_combo = document.getElementById('gia_combo').value;
    let sale_check = document.getElementById('sale_combo_check').checked;
    let flag = true;
    if (name_combo == '') {
        document.getElementById('error_message_name_combo').innerHTML = `<span class="error_message" >(Không được bỏ trống)</span>`;
        flag = false;
    }
    if (chon_mon == '') { 
        document.getElementById('error_message_chon_combo').innerHTML = `<span class="error_message">(Không được bỏ trống)</span>`;
        flag = false;
    }
    if (gia_combo == '') {
        document.getElementById('error_message_gia_combo').innerHTML = `<span class="error_message">(Không được bỏ trống)</span>`;
        flag = false;
    }
    if(sale_check == true){
        let sale_input = document.getElementById('sale_combo_input').value;
        if (sale_input == '') {
            alert("Vui lòng nhập % giảm giá!");
            flag = false;
        }
        if(flag == true){
            let data_json = {
                id: id,
                name_combo : name_combo,
                detail_menu_combo_id: chon_mon,
                price_combo : gia_combo,
                sale: sale_input
            }
            let out = callAjax('/ho-so-quan-an/edit-combo', 'post', data_json);
            if(out.rs == true){
                alert(out.msg);
            }
        }
    }
    else{
        if(flag == true){
            let data_json = {
                id: id,
                name_combo : name_combo,
                detail_menu_combo_id: chon_mon,
                price_combo : gia_combo,
            }
            let out = callAjax('/ho-so-quan-an/edit-combo', 'post', data_json);
            if(out.rs == true){
                alert(out.msg);
            }
        }
    }
}
