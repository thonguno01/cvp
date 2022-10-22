function callAjax(url, method, data) {
    var result;
    $.ajax({
        url: url,
        type: method,
        data: data,
        async: false,
        dataType: "json",
        success: function(response) {
            result = response;
        }
    });
    return result;
}

function callAjax2(url, method, data) {
    var result;
    $.ajax({
        url: url,
        type: method,
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        dataType: "text",
        success: function(response) {
            result = response;
        }
    });
    return result;
}

function randomString(len, charSet) {
    charSet = charSet || 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var randomString = '';
    for (var i = 0; i < len; i++) {
        var randomPoz = Math.floor(Math.random() * charSet.length);
        randomString += charSet.substring(randomPoz, randomPoz + 1);
    }
    return randomString;
}

function ChangeToSlug(string) {
    var string;
    slug = string.toLowerCase();

    //Đổi ký tự có dấu thành không dấu
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    //Xóa các ký tự đặt biệt
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    //Đổi khoảng trắng thành ký tự gạch ngang
    slug = slug.replace(/ /gi, "-");
    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    //Xóa các ký tự gạch ngang ở đầu và cuối
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    //In slug ra textbox có id “slug”
    return slug;
}
// tính toán giỏ hàng 
function caculaDish(phiShip, quangDuongShip) {
    let feeship = phiShip;
    let dataJson = {
        'ship': feeship,
        'lengthShip': quangDuongShip
    }
    let result = callAjax('cacular-dish', 'post', dataJson);
    return result;
}

function popupRenderAjax(seeDetail) {
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

        textDish += `<li>
        <div class="left">
            <span class="num-od">` + qty + `</span>
            <span class="name-od">` + name + `</span>
        </div>
        <div class="right">
            <span class="money">` + new Intl.NumberFormat().format(money) + `đ</span>
        </div>
         </li>`;
    }
    let render = `<div class="detail-order">
    <div class="title">
        <p>Chi tiết đơn hàng</p>

    </div>
    <div class="detail">
        <ul class="list-order">
        ` + textDish + `
        </ul>
        <div class="total">
            <div class="name-total">
                <p>Tổng <span class="num-od-total">4</span> suất</p>
                <div class="total-all">
                    <p>` + new Intl.NumberFormat().format(seeDetail.totalbefore) + `đ</p>
                </div>
            </div>

            <div class="fee-ship">
                <span>Phí ship</span>
                <span class="money-ship">` + new Intl.NumberFormat().format(seeDetail.feeShip) + `đ</span>
            </div>
            <div class="sale-percent">
                <span>Khuyến mại</span>
                <span class="percert">` + new Intl.NumberFormat().format(seeDetail.sale) + `đ</span>
            </div>
            <div class="sale">
                <span>Giảm thêm</span>
                <span class="money-sale">0 đ</span>
            </div>
        </div>
        <div class="total-all-order">
            <span>Tổng tiền:</span>
            <span class="money-total-all">` + new Intl.NumberFormat().format(seeDetail.totalAfter) + `đ</span>
        </div>
    </div>
    <div class="note-popup">
        <p>Chi tiết:` + seeDetail.note + `</p>
    </div>
    <input type="hidden" id="cusIdReport" value="` + seeDetail.customer['id'] + `" readonly>
    <input type="hidden" id="merIdReport" value="` + seeDetail.merchant['id'] + `" readonly>
    <input type="hidden" id="codeReport" value="` + seeDetail.code + `" readonly>
    <div class="btn_submit">
        <button class="pp_cancle" onclick="cancelOr(this)">Hủy</button>
        <button class="btn_verify">Xác nhận </button>
    </div>
</div>`;
    return render;
}

function popupRenderAjax_dang_giao(seeDetail) {
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
        textDish += `<div class="mon_01">
         <div class="stt">` + qty + `</div>
         <div class="name">` + name + `</div>
         <div class="gia">` + new Intl.NumberFormat().format(money) + `<span>đ</span></div>
     </div>`;
    }
    let render = `<div class="fet_02">
                    <h2>Chi tiết đơn hàng</h2>
                    <div class="list_moned">
                      ` + textDish + `
                    </div>
                    <div class="bill">
                        <div class="tit_bill">
                            <span>Tổng <span style="font-weight: 500;"> 4 </span> suất</span>
                            <span>Phí ship</span>
                            <span>Khuyến mại</span>
                            <span>Giảm thêm</span>
                        </div>
                        <div class="gia_bill">
                            <span>` + new Intl.NumberFormat().format(seeDetail.totalbefore) + `đ</span>
                            <span>` + new Intl.NumberFormat().format(seeDetail.feeShip) + `đ</span>
                            <span style="color: red;">` + new Intl.NumberFormat().format(seeDetail.sale) + `đ</span><br>
                            <span>0đ</span>
                        </div>
                    </div>
                    <div class="total_bill">
                        <span>Tổng tiền:</span>
                        <a>` + new Intl.NumberFormat().format(seeDetail.totalAfter) + `đ</a>
                    </div>
                    <div class="detail">
                        <span>Chi tiết: <span>` + seeDetail.note + `</span></span>
                    </div>
                    <input type="hidden" id="cusIdReport" value="` + seeDetail.customer['id'] + `" readonly>
                    <input type="hidden" id="merIdReport" value="` + seeDetail.merchant['id'] + `" readonly>
                    <input type="hidden" id="codeReport" value="` + seeDetail.code + `" readonly>
                </div>
                </div>
                <div class="xac_nhan">
                    <button class="not_done" onclick="auccessful_delivery(this)">Giao hàng không thành công</button>
                    <button class="done" onclick="auccessful_delivery_done(this)">Giao hàng thành công</button>
                </div>
            </div>`;
    return render;
}

function popupRenderAjax_cho_xu_ly(seeDetail) {
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
        textDish += `<div class="mon_01">
                        <div class="stt">` + qty + `</div>
                        <div class="name">` + name + `</div>
                        <div class="gia">` + new Intl.NumberFormat().format(money) + `<span>đ</span></div>
                    </div>`;
    }
    let render = `<div class="fet_02">
                            <h2>Chi tiết đơn hàng</h2>
                            <div class="list_moned">
                            ` + textDish + `
                            </div>
                            <?php
                            }
                            ?>
                            <div class="bill">
                                <div class="tit_bill">
                                    <span>Tổng <span style="font-weight: 500;"> 4 </span> suất</span>
                                    <span>Phí ship</span>
                                    <span>Khuyến mại</span>
                                    <span>Giảm thêm</span>
                                </div>
                                <div class="gia_bill">
                                    <span>` + new Intl.NumberFormat().format(seeDetail.totalbefore) + `đ</span>
                                    <span>` + new Intl.NumberFormat().format(seeDetail.feeShip) + `đ</span>
                                    <span style="color: red;">` + new Intl.NumberFormat().format(seeDetail.sale) + `đ</span><br>
                                    <span>0đ</span>
                                </div>
                            </div>
                            <div class="total_bill">
                                <span>Tổng tiền:</span>
                                <a>` + new Intl.NumberFormat().format(seeDetail.totalAfter) + `đ</a>
                            </div>
                            <div class="detail">
                                <span>Chi tiết: <span>` + seeDetail.note + `</span></span>
                            </div>
                            <input type="hidden" id="cusIdhuy_don" value="` + seeDetail.customer['id'] + `" readonly>
                            <input type="hidden" id="merIdhuy_don" value="` + seeDetail.merchant['id'] + `" readonly>
                            <input type="hidden" id="codehuy_don" value="` + seeDetail.code + `" readonly>
                            <div class="xac_nhan">
                                <button class="not_done" onclick="huy_don_hang(this)">Hủy đơn</button>
                                <button class="done" onclick="xac_nhan_don_hang(this)">Xác nhận đơn hàng</button>
                            </div>
                        </div>
                        </div>
                        </div>`;
    return render;
}

function popupRenderAjax_huy_done(seeDetail) {
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
        textDish += `<div class="mon_01">
                        <div class="stt">` + qty + `</div>
                        <div class="name">` + name + `</div>
                        <div class="gia">` + new Intl.NumberFormat().format(money) + `<span>đ</span></div>
                    </div>`;
    }
    let render = `<div class="fet_02">
                            <h2>Chi tiết đơn hàng</h2>
                            <div class="list_moned">
                                    ` + textDish + `
                            </div>
                            <div class="bill">
                                <div class="tit_bill">
                                    <span>Tổng <span style="font-weight: 500;"> 4 </span> suất</span>
                                    <span>Phí ship</span>
                                    <span>Khuyến mại</span>
                                    <span>Giảm thêm</span>
                                </div>
                                <div class="gia_bill">
                                    <span>` + new Intl.NumberFormat().format(seeDetail.totalbefore) + `đ</span>
                                    <span>` + new Intl.NumberFormat().format(seeDetail.feeShip) + `đ</span><br>
                                    <span style="color: red;">` + new Intl.NumberFormat().format(seeDetail.sale) + `đ</span><br>
                                    <span>0đ</span>
                                </div>
                            </div>
                            <div class="total_bill">
                                <span>Tổng tiền:</span>
                                <a>` + new Intl.NumberFormat().format(seeDetail.totalAfter) + `đ</a>
                            </div>  
                        </div>
                        <div class="popup_no_done">
                            <button onclick="close_don_huy()">Xác nhận</button>
                        </div>
                    </div>`;
    return render;
}


function dropdownHeader(e) {
    $(e).parent().find('.drop_danhmuc2').toggleClass("d-block");
}