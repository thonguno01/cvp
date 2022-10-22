// =======================  mở FORM ============================

document.getElementById("drop_item_02").onclick = function () {
    document.getElementById("form1").style.display = 'none';
    document.getElementById("form2").style.display = 'block';
    document.getElementById("form3").style.display = 'none';
};
document.getElementById("drop_item_03").onclick = function () {
    document.getElementById("form1").style.display = 'none';
    document.getElementById("form2").style.display = 'none';
    document.getElementById("form3").style.display = 'block';
};

document.getElementById("drop_item_01a").onclick = function () {
    document.getElementById("form1").style.display = 'block';
    document.getElementById("form2").style.display = 'none';
    document.getElementById("form3").style.display = 'none';
};
document.getElementById("drop_item_03a").onclick = function () {
    document.getElementById("form1").style.display = 'none';
    document.getElementById("form2").style.display = 'none';
    document.getElementById("form3").style.display = 'block';
};

document.getElementById("drop_item_01b").onclick = function () {
    document.getElementById("form1").style.display = 'block';
    document.getElementById("form2").style.display = 'none';
    document.getElementById("form3").style.display = 'none';
};
document.getElementById("drop_item_02b").onclick = function () {
    document.getElementById("form1").style.display = 'none';
    document.getElementById("form2").style.display = 'block';
    document.getElementById("form3").style.display = 'none';
};








// =======================  đang giao ============================
function showPopup_dang_giao(e, status) {
    // if (width < 481) {
    //     $('.body').css('display', 'none');
    //     $('footer').css('margin-top', '800px')
    // }
    let code = $(e).parent().parent().find('th.code_dang_giao').text();
    let data = {
        code: code,
    }; 
    let seeDetails = callAjax('see-detail-dish-history', 'post', data)
    let renderInfoOrder = popupRenderAjax_dang_giao(seeDetails);
    var city = '';
    var distrisct = ''
    for (let j = 0; j < (seeDetails.city).length; j++) {
        if (seeDetails.merchant['id_city'] == seeDetails.city[j]['cit_id']) {
            city += seeDetails.city[j]['cit_name'];
        }
        if (seeDetails.merchant['id_district'] == seeDetails.city[j]['cit_id']) {
            distrisct += seeDetails.city[j]['cit_name'];
        }
    }
    // if (status == 3) {
    let renderCancel = renderAddressInPopup_dang_giao(seeDetails, distrisct, city) + renderInfoOrder + `</div></div>`;
    $('.popup_03').addClass('d-block');
    $('.popup_03').html(renderCancel);
    $('.pp_cancle').remove();
    $('.btn_verify').css('width', '100%');
    $('.btn_verify').click(() => {
        $('.popup_03').removeClass('d-block');
        if (width < 481) {
            $('.body').css('display', 'block');
            $('footer').css('margin-top', '0px')

        }
    });

}
function renderAddressInPopup_dang_giao(seeDetails, distrisct, city, shipper = '') {
    let render = `
    <div class="popup_dang_giao">
                    <div class="title">
                        <h2>Xác nhận đơn giao</h2>
                        <span class="close-dang-giao" onclick="closePopup_pop3()">×</span>
                    </div>
                    <div class="content">
                        <div class="fet_01">
                            <div class="map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7838.684254869503!2d106.70676642475235!3d10.785086936675276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1547181657956" width="100%" height="420" frameborder="0" style="border:0; border-radius: 20px;"
                                            allowfullscreen></iframe>
                            </div>
                            <div class="dan_duong">
                                <div class="add_dd">
                                    <div class="icon_dd"></div>
                                    <div class="ct_dd">
                                        <div class="add_01">
                                            <h2>` + seeDetails.merchant['name_merchant'] + `</h2>
                                            <span>` + seeDetails.merchant['address'] + `,` + distrisct + `,` + city + `</span>
                                        </div>
                                        <div class="add_02">
                                            <h2>` + seeDetails.address['name'] + `</h2>
                                            <span>` + seeDetails.address['address'] + `</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="khoang_cach">
                                    <span>Khoảng cách: </span><span style="color: red;"> 2.4 </span><span style="color: red;"> km</span>
                                </div>
                            </div>` + shipper + `
                        </div>`
    return render;
}
function closePopup_pop3() {
    $('.popup_03').removeClass('d-block');
}
function auccessful_delivery_done(){
    let code = $("#codeReport").val();
    let data_json ={
        code : code,
    }
    let out = callAjax('don-hang-hom-nay/thanh-cong','post',data_json);
    if(out.rs == true){
        alert(out.msg)
        window.location = 'don-hang-hom-nay';
    }
    
}
function auccessful_delivery(){
    let code = $("#codeReport").val();
    let data_json ={
        code : code,
    }
    let out = callAjax('don-hang-hom-nay/khong-thanh-cong','post',data_json);
    if(out.rs == true){
        alert(out.msg)
        window.location = 'don-hang-hom-nay';
    }
    
}




// =======================  chờ xử lý ============================
function popup_cho_xuly(e, id) {
    // if (width < 481) {
    //     $('.body').css('display', 'none');
    //     $('footer').css('margin-top', '800px')
    // }
    let code = $(e).parent().parent().find('th.code_xu_ly').text();
    let data = {
        code: code,
    }; 
    let seeDetails = callAjax('see-detail-dish-history', 'post', data)
    let renderInfoOrder = popupRenderAjax_cho_xu_ly(seeDetails);
    console.log(renderInfoOrder)
    var city = '';
    var distrisct = ''
    for (let j = 0; j < (seeDetails.city).length; j++) {
        if (seeDetails.merchant['id_city'] == seeDetails.city[j]['cit_id']) {
            city += seeDetails.city[j]['cit_name'];
        }
        if (seeDetails.merchant['id_district'] == seeDetails.city[j]['cit_id']) {
            distrisct += seeDetails.city[j]['cit_name'];
        }
    }
    // if (status == 3) {
    let renderCancel = renderAddressInPopup_cho_xu_ly(seeDetails, distrisct, city, id) + renderInfoOrder + `</div></div>`;
    $('.popup_04').addClass('d-block');
    $('.popup_04').html(renderCancel);
    $('.pp_cancle').remove();
    $('.btn_verify').css('width', '100%');
    $('.btn_verify').click(() => {
        $('.popup_04').removeClass('d-block');
        if (width < 481) {
            $('.body').css('display', 'block');
            $('footer').css('margin-top', '0px')

        }
    });

}
function renderAddressInPopup_cho_xu_ly(seeDetails, distrisct, city, id, shipper = '') {
    let render = `
    <div class="popup_cho_xuly">
                    <div class="title">
                        <h2>Xác nhận đơn hàng</h2>
                        <span class="close-cho-xuly" onclick="closePopup_pop4()">×</span>
                    </div>
                    <div class="content">
                        <div class="fet_01">
                            <div class="map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7838.684254869503!2d106.70676642475235!3d10.785086936675276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1547181657956" width="100%" height="420" frameborder="0" style="border:0; border-radius: 20px;"
                                            allowfullscreen></iframe>
                            </div>
                            <div class="dan_duong">
                                <div class="add_dd">
                                    <div class="icon_dd"></div>
                                    <div class="ct_dd">
                                        <div class="add_01">
                                            <h2>` + seeDetails.merchant['name_merchant'] + `</h2>
                                            <span>` + seeDetails.merchant['address'] + `,` + distrisct + `,` + city + `</span>
                                        </div>
                                        <div class="add_02">
                                            <h2>` + seeDetails.address['name'] + `</h2>
                                            <span>` + seeDetails.address['address'] + `</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="khoang_cach">
                                    <span>Khoảng cách: </span><span style="color: red;"> 2.4 </span><span style="color: red;"> km</span><br>
                                    <button class="shipper" onclick="add_shipper(` + id + `)">Thêm thông tin shipper</button>
                                </div>
                            </div>` + shipper + `
                        </div>`
    return render;
}             
function add_shipper(id){
    let render = `<div class="infor_shipper">
                    <div class="infor">
                        <h2>Thêm thông tin shipper</h2>
                        <span class="h2">Vui lòng nhập đủ các trường thông tin !</span>
                        <div class="name_ship">
                            <span>Họ và tên<span style="color: red;">*</span><span id="error_message_name"></span></span>
                            <input type="text" placeholder="Nhập họ và tên" id="name_shipper">
                        </div>
                        <div class="phone">
                            <span>Số điện thoại<span style="color: red;">*</span><span id="error_message_sdt"></span></span>
                            <input type="number" placeholder="Nhập số điện thoại" id="phone_shipper">
                        </div>
                        <div class="action">
                            <button class="back" id="back_shipper">Quay lại</button>
                            <button class="save" type="button" onclick="return form_validate_shipper(`+id+`)">Lưu</button>
                        </div>
                    </div>
                    <div class="banner_ship">
                        <div class="close"><span class="close-btn" id="close_shipper">×</span></div>
                        <div class="banner"></div>
                    </div>
                </div>`
     document.getElementById("popup_shipper").style.display = 'block';
    $('#popup_shipper').html(render);
    document.getElementById("close_shipper").onclick = function() {
        document.getElementById("popup_shipper").style.display = 'none';
    };
    document.getElementById("back_shipper").onclick = function() {
        document.getElementById("popup_shipper").style.display = 'none';
    };
}
    

function closePopup_pop4() {
    $('.popup_04').removeClass('d-block');
}

function form_validate_shipper(id) {
    let name = document.getElementById('name_shipper').value;
    let phone = document.getElementById('phone_shipper').value;
    let flag = true;
    if (name == '') {
        document.getElementById('error_message_name').innerHTML = `<span class="error_message">(Không được bỏ trống)</span>`;
        flag = false;
    }
    if (phone == '') {
        document.getElementById('error_message_sdt').innerHTML = `<span class="error_message">(Không được bỏ trống)</span>`;
        flag = false;
    }
    if(flag == true){
        let data_json = {
            id: id,
            name_ship :name,
            phone_ship :phone
        }
        let out = callAjax('/don-hang-hom-nay/add-shipper', 'post', data_json);
        if(out.rs == true){
            alert(out.msg);
            document.getElementById("popup_shipper").style.display = 'none';
        }
    }
}
function huy_don_hang(){
    let code = $("#codehuy_don").val()
    let render =`<div class="popup_huy_don">
                    <div class="tit_huy">
                        <div class="icon"></div>
                        <h2>Lý do hủy đơn</h2>
                    </div>
                    <div class="select_lydo">
                        <span>Chọn lý do báo cáo:</span>
                        <select name="" id="reason1">
                            <option value="">--Chọn lý do--</option>
                            <option value="0">Nhà hàng hết nguyên liệu</option>
                            <option value="1">Món này đã bán hết</option>
                            <option value="2">Nhà hàng không bán hàng hôm nay</option>
                            <option value="3">Nhà hàng đã đóng cửa</option>
                            <option value="4">Nhà hàng trong khu vực phong tỏa</option>
                        </select>
                    </div>
                    <div class="lydo_more">
                        <span>Lý do khác:</span>
                        <textarea name="" id="reason2" cols="60%" rows="5%" placeholder="Nhập lý do khác..."></textarea>
                    </div>
                    <div class="canh_bao">
                        <span>Lưu ý! Nếu bạn hủy đơn quá nhiều lần trong tuần hệ thống sẽ hạn chế đơn hàng của bạn</span>
                    </div>
                    <div class="action">
                        <input type="hidden" id="codehuy_don" value="` + code + `" readonly>
                        <button class="huy" id="huy_lydo">Hủy</button>
                        <button class="luu" onclick="save_reason(this)">Lưu</button>
                    </div>
                </div>`
    document.getElementById("popup_huy").style.display = 'block';
    $('#popup_huy').html(render);
    document.getElementById("huy_lydo").onclick = function() {
        document.getElementById("popup_huy").style.display = 'none';
    };
}
function save_reason(){
    let code = $("#codehuy_don").val();
    let reason1 = $("#reason1").val();
    let reason2 = $("#reason2").val();
    if(reason1 == '' && reason2 == ''){
        alert("Vui lòng chọn hoặc thêm lý do hủy đơn!")
    }
    else{
        data_json = {
            code : code,
            reason1: reason1,
            reason2: reason2
        }
        let out = callAjax('don-hang-hom-nay/huy-don','post',data_json)
        if(out.rs == true){
            let data = {
                code: code,
            }; 
            let seeDetails = callAjax('see-detail-dish-history', 'post', data)
            let renderInfoOrder = popupRenderAjax_huy_done(seeDetails);
            console.log(renderInfoOrder)
            var city = '';
            var distrisct = ''
            for (let j = 0; j < (seeDetails.city).length; j++) {
                if (seeDetails.merchant['id_city'] == seeDetails.city[j]['cit_id']) {
                    city += seeDetails.city[j]['cit_name'];
                }
                if (seeDetails.merchant['id_district'] == seeDetails.city[j]['cit_id']) {
                    distrisct += seeDetails.city[j]['cit_name'];
                }
            }
            // if (status == 3) {
            let renderCancel = renderAddressInPopup_huy_done(seeDetails, distrisct, city) + renderInfoOrder + `</div></div>`;
            $('.popup_no').addClass('d-block');
            $('.popup_no').html(renderCancel);
            $('.pp_cancle').remove();
            $('.btn_verify').css('width', '100%');
            $('.btn_verify').click(() => {
                $('.popup_04').removeClass('d-block');
                if (width < 481) {
                    $('.body').css('display', 'block');
                    $('footer').css('margin-top', '0px')

                }
            });
        }
    }
}
function renderAddressInPopup_huy_done(seeDetails, distrisct, city, shipper = '') {
    let render = `
    <div class="popup_huy_don">
                    <div class="gif_huy">
                        <div class="gif"></div>
                        <h2>Hủy đơn thành công</h2>
                    </div>
                    <div class="dan_duong">
                        <div class="add_dd">
                            <div class="icon_dd"></div>
                            <div class="ct_dd">
                                <div class="add_01">
                                <h2>` + seeDetails.merchant['name_merchant'] + `</h2>
                                <span>` + seeDetails.merchant['address'] + `,` + distrisct + `,` + city + `</span>
                            </div>
                            <div class="add_02">
                                <h2>` + seeDetails.address['name'] + `</h2>
                                <span>` + seeDetails.address['address'] + `</span>
                                </div>
                            </div>
                        </div>
                        <div class="khoang_cach">
                            <span>Khoảng cách: </span><span style="color: red;"> 2.4 </span><span style="color: red;"> km</span><br>
                        </div>`+shipper+`
                    </div>`
    return render;
}    
function close_don_huy(){
    window.location = "don-hang-hom-nay"
}
function xac_nhan_don_hang(){
    let code = $("#codehuy_don").val();
    let data_json = {
        code: code,
    }
    let out = callAjax('don-hang-hom-nay/xac-nhan-don-hang', 'post', data_json);
    if(out.rs == true){
        let data = {
            code: code,
        }; 
        let seeDetails = callAjax('see-detail-dish-history', 'post', data)
        let renderInfoOrder = popupRenderAjax_huy_done(seeDetails);
        // console.log(renderInfoOrder)
        var city = '';
        var distrisct = ''
        for (let j = 0; j < (seeDetails.city).length; j++) {
            if (seeDetails.merchant['id_city'] == seeDetails.city[j]['cit_id']) {
                city += seeDetails.city[j]['cit_name'];
            }
            if (seeDetails.merchant['id_district'] == seeDetails.city[j]['cit_id']) {
                distrisct += seeDetails.city[j]['cit_name'];
            }
        }
        // if (status == 3) {
        let renderCancel = renderAddressInPopup_xac_nhan(seeDetails, distrisct, city) + renderInfoOrder + `</div></div>`;
        $('.popup_succes').addClass('d-block');
        $('.popup_succes').html(renderCancel);
        $('.pp_cancle').remove();
        $('.btn_verify').css('width', '100%');
        $('.btn_verify').click(() => {
            $('.popup_04').removeClass('d-block');
            if (width < 481) {
                $('.body').css('display', 'block');
                $('footer').css('margin-top', '0px')

            }
        });
    }
} 
function renderAddressInPopup_xac_nhan(seeDetails, distrisct, city, shipper = '') {
    let render = `
    <div class="popup_sc_don">
                    <div class="gif_succes">
                        <div class="gif"></div>
                        <h2>Bạn đã xác nhận đơn thành công</h2>
                    </div>
                    <div class="dan_duong">
                        <div class="add_dd">
                            <div class="icon_dd"></div>
                            <div class="ct_dd">
                                <div class="add_01">
                                <h2>` + seeDetails.merchant['name_merchant'] + `</h2>
                                <span>` + seeDetails.merchant['address'] + `,` + distrisct + `,` + city + `</span>
                            </div>
                            <div class="add_02">
                                <h2>` + seeDetails.address['name'] + `</h2>
                                <span>` + seeDetails.address['address'] + `</span>
                                </div>
                            </div>
                        </div>
                        <div class="khoang_cach">
                            <span>Khoảng cách: </span><span style="color: red;"> 2.4 </span><span style="color: red;"> km</span><br>
                        </div>`+shipper+`
                    </div>`
    return render;
}  


// ======================== đơn hàng hoàn tất =========================

function showPopup_done(e, status) {
    // if (width < 481) {
    //     $('.body').css('display', 'none');
    //     $('footer').css('margin-top', '800px')
    // }
    let code = $(e).parent().parent().find('th.code').text();
    let data = {
        code: code,
    }; 

    let seeDetails = callAjax('see-detail-dish-history', 'post', data)
    let renderInfoOrder = popupRenderAjax(seeDetails);
    var city = '';
    var distrisct = ''
    for (let j = 0; j < (seeDetails.city).length; j++) {
        if (seeDetails.merchant['id_city'] == seeDetails.city[j]['cit_id']) {
            city += seeDetails.city[j]['cit_name'];
        }
        if (seeDetails.merchant['id_district'] == seeDetails.city[j]['cit_id']) {
            distrisct += seeDetails.city[j]['cit_name'];
        }
    }
    // if (status == 3) {
    let renderCancel = renderAddressInPopup(seeDetails, distrisct, city) + renderInfoOrder + `</div></div>`;
    $('.popup-detail').addClass('d-block');
    $('.popup-detail').html(renderCancel);
    $('.pp_cancle').remove();
    $('.btn_verify').css('width', '100%');
    $('.btn_verify').click(() => {
        $('.popup-detail').removeClass('d-block');
        if (width < 481) {
            $('.body').css('display', 'block');
            $('footer').css('margin-top', '0px')

        }
    });

}

function closePopup() {
    $('.popup-detail').removeClass('d-block');
}

function renderSearchHistory(data, stt, textStatus) {
    let text = '';
    let text1 = '';

    for (let i = 0; i < (data[0]).length; i++) {
        var code = data[0][i].code;
        var created_at = data[0][i].created_at;
        var total_after = data[0][i].total_after;
        var sale = data[0][i].sale;
        var statusAfter = data[0][i].status;
        if (statusAfter == stt) {
            text += `<tr class="data_list">
            <th>` + i + `</th>
            <td class="code">` + code + `</td>
            <td>` + created_at + `</td>
            <td class="font">` + new Intl.NumberFormat().format(total_after) + `đ</td>
            <td class="font dis">` + new Intl.NumberFormat().format(sale) + `đ</td>
            ` + textStatus + `
            <td>
            <span class="td-see-detail" onclick="return showPopup(this ,` + statusAfter + ` );">Xem chi tiết</span>
        </td>
        </tr>`
            text1 += `<tr class="data_list">
        <td class="code">` + code + `</td>
        <td class="font">` + new Intl.NumberFormat().format(total_after) + `đ</td>
        ` + textStatus + `
        <td>
        <span class="td-see-detail" onclick="return showPopup(this ,` + statusAfter + ` );">Xem chi tiết</span>
    </td>
    </tr>`;
        }

    }
    if (width > 768) {
        $(".row_3").html(` < table >
                <tr class = "list" >
                <th> STT </th> 
                <th> Mã đơn hàng </th> 
                <th> Thời gian </th>
                 <th> Tổng tiền </th> 
                <th> Khuyến mại </th>  
                <th> Trạng thái </th>
                  <th> Xem chi tiết </th> </tr >
                ` + text + ` </table>`);
    } else {
        $(".row_3").html(`<table>
                <tr class="list">
                <th>Mã đơn hàng</th>
                <th>Tổng tiền</th>
                <th>Trạng thái </th> 
                <th> Xem chi tiết</th>
            </tr>
           ` + text1 + `
            </table>`);
    }
}

function renderAddressInPopup(seeDetails, distrisct, city, shipper = '') {
    let render = `
    <div class="wrap-popup-detail">
    <div class="pp-detail-title">
        <p>Chi tiết đơn hàng đã hoàn tất</p>
        <div class="icon-close-popup" onclick="return closePopup(this);"></div>
    </div>
    <div class="pp-detail-body">
        <div class="address-order">
            <div class="gg-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7838.684254869503!2d106.70676642475235!3d10.785086936675276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1547181657956" width="100%" height="100%" frameborder="0" style="border:0; border-radius: 20px;" allowfullscreen=""></iframe>
            </div>
            <div class="add-store-order">
                <div class="add-store">
                    <div class="name_store">
                        <div class="img-status-done">
                        </div>
                        <span class="name_mechart">` + seeDetails.merchant['name_merchant'] + `</span>
                    </div>
                    <div class="add-store-detail">
                        <div class="icon-add"> </div>
                        <div class="store-detail">` + seeDetails.merchant['address'] + `,` + distrisct + `,` + city + `</div>
                    </div>
                </div>
                <div class="add-order">
                    <div class="name_order">
                        <div class="wrap-add-order">
                            <div class="img-status-warning"></div>
                            <span class="order">` + seeDetails.address['name'] + `</span>
                        </div>
                        <div class="wrap-address-order">
                            <div class="icon-add"> </div>
                            <span>` + seeDetails.address['address'] + `</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="distance">
                <p>
                    Khoảng cách: <span> 1.5 km</span>
                </p>
            </div>` + shipper + `
        </div>
        `
    return render;
}



// ======================== đơn hàng đã hủy =========================

function showPopup_huy(e, status) {
    // if (width < 481) {
    //     $('.body').css('display', 'none');
    //     $('footer').css('margin-top', '800px')
    // }
    let code = $(e).parent().parent().find('th.code_huy').text();
    let data = {
        code: code,
    }; 
    let seeDetails = callAjax('see-detail-dish-history', 'post', data)
    let renderInfoOrder = popupRenderAjax(seeDetails);
    var city = '';
    var distrisct = ''
    for (let j = 0; j < (seeDetails.city).length; j++) {
        if (seeDetails.merchant['id_city'] == seeDetails.city[j]['cit_id']) {
            city += seeDetails.city[j]['cit_name'];
        }
        if (seeDetails.merchant['id_district'] == seeDetails.city[j]['cit_id']) {
            distrisct += seeDetails.city[j]['cit_name'];
        }
    }
    // if (status == 3) {
    let renderCancel = renderAddressInPopup_huy(seeDetails, distrisct, city) + renderInfoOrder + `</div></div>`;
    $('.popup-detail').addClass('d-block');
    $('.popup-detail').html(renderCancel);
    console.log(renderCancel);
    $('.pp_cancle').remove();
    $('.btn_verify').css('width', '100%');
    $('.btn_verify').click(() => {
        $('.popup-detail').removeClass('d-block');
        if (width < 481) {
            $('.body').css('display', 'block');
            $('footer').css('margin-top', '0px')

        }
    });

}
function renderAddressInPopup_huy(seeDetails, distrisct, city, shipper = '') {
    let render = `
    <div class="wrap-popup-detail">
    <div class="pp-detail-title">
        <p>Chi tiết đơn hàng đã hủy</p>
        <div class="icon-close-popup" onclick="return closePopup(this);"></div>
    </div>
    <div class="pp-detail-body">
        <div class="address-order">
            <div class="gg-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7838.684254869503!2d106.70676642475235!3d10.785086936675276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1547181657956" width="100%" height="100%" frameborder="0" style="border:0; border-radius: 20px;" allowfullscreen=""></iframe>
            </div>
            <div class="add-store-order">
                <div class="add-store">
                    <div class="name_store">
                        <div class="img-status-done">
                        </div>
                        <span class="name_mechart">` + seeDetails.merchant['name_merchant'] + `</span>
                    </div>
                    <div class="add-store-detail">
                        <div class="icon-add"> </div>
                        <div class="store-detail">` + seeDetails.merchant['address'] + `,` + distrisct + `,` + city + `</div>
                    </div>
                </div>
                <div class="add-order">
                    <div class="name_order">
                        <div class="wrap-add-order">
                            <div class="img-status-warning"></div>
                            <span class="order">` + seeDetails.address['name'] + `</span>
                        </div>
                        <div class="wrap-address-order">
                            <div class="icon-add"> </div>
                            <span>` + seeDetails.address['address'] + `</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="distance">
                <p>
                    Khoảng cách: <span> 1.5 km</span>
                </p>
            </div>` + shipper + `
        </div>
        `
    return render;
}


