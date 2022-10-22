var width = screen.width;
var count = 0;

function showPopup(e, status) {
    if (width < 481) {
        $('.body').css('display', 'none');
        $('footer').css('margin-top', '690px')
    }
    let code = $(e).parent().parent().find('td.code').text();
    console.log(code);
    let data = {
        code: code
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
    if (status == 0) {
        let renderCancel = renderAddressInPopup(seeDetails, distrisct, city) + renderInfoOrder + `</div></div>`;
        $('.popup-detail').addClass('d-block');
        $('.popup-detail').html(renderCancel);
        console.log(renderCancel);
        $('.btn_verify').remove();
        $('.pp_cancle').css('width', '100%');
        $('.pp_cancle').click(() => {
            $('.popup-detail').removeClass('d-block');
            if (width < 481) {
                $('.body').css('display', 'block');
                $('footer').css('margin-top', '0px')

            }
        });
    } else if (status == 1) {
        let shipper = `<div class="contactShip">
        <p>
        Liên hệ shipper: ` + seeDetails.phoneShipper + ` </span>
        </p>
        </div>`
        let renderSeedetail = renderAddressInPopup(seeDetails, distrisct, city, shipper) + renderInfoOrder + `</div></div>`;
        $('.popup-detail').addClass('d-block');
        $('.popup-detail').html(renderSeedetail);
        console.log(renderSeedetail);

        $('.pp_cancle').remove();
        $('.btn_verify').css('width', '100%');
        $('.btn_verify').click(() => {
            $('.popup-detail').removeClass('d-block');
            if (width < 481) {
                $('.body').css('display', 'block');
                $('footer').css('margin-top', '0px')

            }
        });
    } else {
        let shipper = '';
        let renderSeedetail = renderAddressInPopup(seeDetails, distrisct, city, shipper) + renderInfoOrder + `</div></div>`;
        $('.popup-detail').addClass('d-block');
        $('.popup-detail').html(renderSeedetail);
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

$('.pp_cancle').click(function() {
    $('#report').addClass('d-block');
});
var codeor = '';

function codeOrder(e) {
    let code = $(e).parent().parent().find('td.code').text();
    codeor = code;
    return code;
}

function cancelOr(e) {
    $('.popup-detail').removeClass('d-block');
    $('#report').addClass('d-block');
    let code = $(e).parent().parent().find('#codeReport').val();
    let idMer = $(e).parent().parent().find('#merIdReport').val();
    let idCus = $(e).parent().parent().find('#cusIdReport').val();
    $('.saveReport').click(() => {
        let reason1 = $('#reason1').val();
        let reason2 = $('#reason2').val();
        let dataJson = {
            reason1: reason1,
            reason2: reason2,
            code: code,
            idMer: idMer,
            idCus: idCus,
        };
        let cancleOrder = callAjax('cancel-ordered-history', 'post', dataJson);
        if (cancleOrder.rs == true) {
            let seeDetail = callAjax('see-detail-dish-history', 'post', dataJson);
            var city = '';
            var distrisct = ''
            for (let j = 0; j < (seeDetail.city).length; j++) {
                if (seeDetail.merchant['id_city'] == seeDetail.city[j]['cit_id']) {
                    city += seeDetail.city[j]['cit_name'];
                }
                if (seeDetail.merchant['id_district'] == seeDetail.city[j]['cit_id']) {
                    distrisct += seeDetail.city[j]['cit_name'];
                }
            }
            let textDish = '';
            for (let i = 0; i < seeDetail.info.length; i++) {
                var qty = seeDetail.info[i][0].qty;
                var name = seeDetail.info[i][0].name[0];
                var money = seeDetail.info[i][0].money[0];
                if (name.name_food == null) {
                    name = seeDetail.info[i][0].name[0].name_combo;
                } else if (name.name_combo == null) {
                    name = seeDetail.info[i][0].name[0].name_food;

                }
                if (money.price_food == null) {
                    money = seeDetail.info[i][0].money[0].price_combo;
                } else if (money.price_combo == null) {
                    money = seeDetail.info[i][0].money[0].price_food;
                }

                textDish += `
                <div class="mon_01">
                <div class="stt">` + qty + `</div>
                <div class="name">` + name + `</div>
                <div class="gia">` + new Intl.NumberFormat().format(money) + `<span>đ</span></div>
            </div>`;
            }
            $('#report').removeClass('d-block');
            $('#popup_no').css('display', 'block');
            let render = `   
            <div class="popup_huy_don">
            <div class="gif_huy">
                <div class="gif"></div>
                <h2>Hủy đơn thành công</h2>
            </div>
            <div class="fet_02">
                <h2>Chi tiết đơn hàng</h2>
                <div class="list_moned">
                ` + textDish + `
                </div>
                <div class="bill">
                    <div class="tit_bill">
                        <span>Tổng <span style="font-weight: 500;"> ` + seeDetail.info.length + ` </span> suất</span>
                        <span>Phí ship</span>
                        <span>Khuyến mại</span>
                        <span>Giảm thêm</span>
                    </div>
                    <div class="gia_bill">
                        <span>` + new Intl.NumberFormat().format(seeDetail.totalbefore) + `</span>
                        <span>` + new Intl.NumberFormat().format(seeDetail.feeShip) + `</span>
                        <span style="color: red;">-25<span style="color: red;">%</span></span>
                        <span>` + new Intl.NumberFormat().format(seeDetail.sale) + `đ</span>
                    </div>
                </div>
                <div class="total_bill">
                    <span>Tổng tiền:</span>
                    <a>` + new Intl.NumberFormat().format(seeDetail.totalAfter) + `đ</a>
                </div>
            </div>
            <div class="dan_duong">
                <div class="add_dd">
                    <div class="icon_dd"></div>
                    <div class="ct_dd">
                        <div class="add_01">
                            <h2>` + seeDetail.merchant['name_merchant'] + ` </h2>
                            <span>` + seeDetail.merchant['address'] + `,` + distrisct + `,` + city + `</span>
                        </div>
                        <div class="add_02">
                            <h2>` + seeDetail.address['name'] + `</h2>
                            <span>` + seeDetail.address['address'] + `</span>
                        </div>
                    </div>
                </div>
                <div class="khoang_cach">
                    <span>Khoảng cách: </span><span style="color: red;"> 2.4 </span><span style="color: red;"> km</span><br>
                </div>
            </div>
            <div class="popup_no_done">
                <button id="xac_nhan_huy">Xác nhận</button>
            </div>
        </div>
            `;
            $('#popup_no').html(render);
            $('#xac_nhan_huy').click(() => {
                window.location = window.location.pathname;
            })
        }
    });
}
//Nút quay lại khi viết lí do
$('.cancle').click(function() {
    $('#report').removeClass('d-block');
});

function feedBack(e) {
    let code = $(e).parent().parent().find('td.code').text();
    let inputCode = `<input type="hidden" name="code" value="` + code + `" readonly >`
    $('.btn_submit').append(inputCode);
    let data = {
        code: code
    };
    let seeDetail = callAjax('see-detail-dish-history', 'post', data);
    let textDish = '';
    for (let i = 0; i < seeDetail.info.length; i++) {
        var qty = seeDetail.info[i][0].qty;
        var name = seeDetail.info[i][0].name[0];
        var money = seeDetail.info[i][0].money[0];
        var img = seeDetail.info[i][0].img[0];
        if (name.name_food == null) {
            name = seeDetail.info[i][0].name[0].name_combo;
        } else if (name.name_combo == null) {
            name = seeDetail.info[i][0].name[0].name_food;
        }
        if (money.price_food == null) {
            money = seeDetail.info[i][0].money[0].price_combo;
        } else if (money.price_combo == null) {
            money = seeDetail.info[i][0].money[0].price_food;
        }
        if (img.img_food == null) {
            img = seeDetail.info[i][0].img[0].img_combo;
        } else if (img.img_combo == null) {
            img = seeDetail.info[i][0].img[0].img_food;
        }
        textDish += `   <div class="list-mon-an">
        <div class="img_mon_an">
            <img src="upload/information/` + img + `" alt="Ảnh món ăn đã đặt">
        </div>
        <div class="info_mon_an">
            <div class="name_mon_an">
                <span class="name">` + name + `</span>
                <span class="num_mon_an">SL:` + qty + `</span>
            </div>
        </div>
    </div>`;
        $('.popup-assess').addClass('d-block');
        $('.box01-assess').html(textDish);


        $('.cancle').click(function() {
            $('.popup-assess').removeClass('d-block');

        });
    }
}
let linkImg = '';

function chooseFile(fileInput) {
    if (fileInput.files && fileInput.files[0]) {
        for (let i = 0; i < (fileInput.files).length; i++) {

            var reader = new FileReader();
            reader.onload = function(e) {
                let renderImgVideo = ` <div class="content-vide-img">
                <div class="img-video">
                    <img src="` + e.target.result + `" alt="Ảnh  thêm video , thêm ảnh">
                </div>
                <div class="brand">
                    <label for="brand">Gán nhãn hình ảnh</label>
                    <select name="brand" id="brand">
                        <option value="1">Không gian </option>
                        <option value="2">Món ăn </option>
                        <option value="3">Thực đơn</option>
                    </select>
                </div>
            </div>`
                $('.appenImgVideo').append(renderImgVideo);
                linkImg += $('#anh_dai_dien').val().replace(/^.*[\\\/]/, '') + ',';
            }
            reader.readAsDataURL(fileInput.files[i]);
        }
    }
}
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
                    $(`<div class="content-vide-img">
                    <div class="img-video">
                    <span class="pip"><span >Video</span><span class="remove">×</span><br/>
                    <video controls class="imageThumb" id="myimg">
                    <source src="` + e.target.result + `" type="video/mp4">
                  </video></span>
                    </div>
                    <div class="brand">
                        <label for="brand">Gán nhãn hình ảnh</label>
                        <select name="" id="brand">
                            <option value="1">Không gian </option>
                            <option value="2">Món ăn </option>
                            <option value="3">Thực đơn</option>
                        </select>
                    </div>
                </div>`).appendTo(".appenImgVideo");

                    $(".remove").click(function() {
                        $(this).parent().parent().parent().remove();
                    });
                });
                fileReader.readAsDataURL(f);
            }
        });
    } else {
        alert("Your browser doesn't support to File API")
    }
});

var codeFBack = '';

function codeFeedBack(e) {
    let code = $(e).parent().parent().find('td.code').text();
    codeFBack = code;
}
$(document).ready(function() {
    $('#uploadForm').ajaxForm({
        success: function(data) {
            // if (data == true) {
            window.location = window.location.pathname;
            // }
        },
    });
});

function likeDish(e) {
    let code = codeFBack;
    let likeMerchant = callAjax('like-merchant-feedback-history', 'post', { code: code })
    if (likeMerchant.rs == 'add') {
        $(e).find('.icon-img-like img').attr('src', '../img/like_red.svg');
    } else {
        $(e).find('.icon-img-like img').attr('src', '../img/like-food.svg');

    }
}

function closePopup() {
    $('.popup-detail').removeClass('d-block');
}
// tim kiem
function filter_history_order() {
    var status = $("#status_fil").val();
    var ngay_bd = $("#ngay_bd").val();
    var ngay_kt = $("#ngay_kt").val();
    console.log(ngay_bd);
    $.ajax({
        url: "history-order-search",
        type: 'POST',
        dataType: "json",
        data: {
            ngay_bd: ngay_bd,
            ngay_kt: ngay_kt,
            status: status,
        },
        beforeSend: function() {
            $(".table-reciever").html("<span style= 'color: green;'>Đang tải...</span>");
        },
        success: function(data) {
            if (status == 0) {
                return renderSearchHistory(data, 0, '<td><span class="processing" >Chờ xử lí</span>');

            } else if (status == 1) {
                return renderSearchHistory(data, 1, '<td><span class="delivery" >Đang giao hàng</span></td>');

            } else if (status == 2) {
                return renderSearchHistory(data, 2, '<td><span class="done">Đã hoàn tất</span></td>');

            } else if (status == 3) {
                return renderSearchHistory(data, 3, '<td><span class="text-destroy">Đã hủy</span> </td>');
            } else if (status == 4) {
                var statusText = '';
                var text = '';
                var address = '';
                // console.log(data['address'][1].name);
                for (let i = 0; i < (data[0]).length; i++) {
                    var code = data[0][i].code;
                    var created_at = data[0][i].created_at;
                    for (let j = 0; j < (data['address']).length; j++) {
                        if (data[0][i].addresss_id == data['address'][j].id) {
                            address = data['address'][j].address;
                        }
                    }
                    var total_after = data[0][i].total_after;
                    var sale = data[0][i].sale;
                    var statusAfter = data[0][i].status;
                    if (data[0][i].status == 0) {
                        statusText += ` <td><span class="processing" >Chờ xử lí</span>`
                    } else if (data[0][i].status == 1) {
                        statusText += ` <td><span class="delivery" >Đang giao hàng</span></td>`
                    } else if (data[0][i].status == 2) {
                        statusText += ` <td><span class="done">Đã hoàn tất</span></td>`
                    } else if (data[0][i].status == 3) {
                        statusText += `<td><span class="text-destroy">Đã hủy</span> </td>`
                    }
                    text += `<tr class="data_list">
                         <th>` + i + `</th>
                        <td class="code">` + code + `</td>
                        <td>` + created_at + `</td>
                        <td>` + address + `</td>
                        <td class="font">` + new Intl.NumberFormat().format(total_after) + `đ</td>
                        ` + statusText + `
                        <td class="font dis">` + new Intl.NumberFormat().format(sale) + `Đ</td>
                        <td>
                        <span class="td-see-detail" onclick="return showPopup(this ,` + statusAfter + ` );">Xem chi tiết</span>
                    </td>
                    </tr>`
                    statusText = '';
                }
                $(".table-reciever").html(`<table>
                        <tr class="list">
                        <th>STT</th>
                        <th>Mã đơn hàng</th>
                        <th>Thời gian</th>
                        <th>Địa điểm</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái </th> 
                        <th>Đánh giá </th>
                        <th> Xem chi tiết</th>
                    </tr>
                   ` + text + `
                    </table>`);
            }

        },
    });

}

function renderSearchHistory(data, stt, textStatus) {
    let text = '';
    let address = '';

    for (let i = 0; i < (data[0]).length; i++) {
        let feedBack = '';
        var code = data[0][i].code;
        var created_at = data[0][i].created_at;
        var check_feed_back = data[0][i].check_feed_back;
        for (let j = 0; j < (data['address']).length; j++) {
            if (data[0][i].addresss_id == data['address'][j].id) {
                address = data['address'][j].address;
            }
        }
        if (check_feed_back == 1) {
            feedBack = 'Đã đánh giá';
        }
        var total_after = data[0][i].total_after;
        var sale = data[0][i].sale;
        var statusAfter = data[0][i].status;
        if (statusAfter == stt) {
            text += `<tr class="data_list">
            <td class="code">` + i + `</td>
            <td class="code">` + code + `</td>
            <td>` + created_at + `</td>
            <td>` + address + `</td>
            <td class="font">` + new Intl.NumberFormat().format(total_after) + `đ</td>
            ` + textStatus + `
            <td class="font dis">` + feedBack + `Đ</td>
            <td>
            <span class="td-see-detail" onclick="return showPopup(this ,` + statusAfter + ` );">Xem chi tiết</span>
        </td>
        </tr>`
        }

    }
    $(".table-reciever  ").html(`<table>
    <tr class="list">
    <th>STT</th>
    <th>Mã đơn hàng</th>
    <th>Thời gian</th>
    <th>Địa điểm</th>
    <th>Tổng tiền</th>
    <th>Trạng thái </th> 
    <th>Đánh giá </th>
    <th> Xem chi tiết</th>
</tr>
       ` + text + `
        </table>`);
}