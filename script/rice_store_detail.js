const width = screen.width;
var phiShip = Number($('#fee-ship').text().replace(/,/g, ""));
$(document).ready(function() {
    //  Ấn nút đặt hàng 
    $('.btn_dat_hang').click(function() {
        if (width <= 768) {
            $('.cart-375').removeClass('d-block');
        }
        let dish = $('#mon_an_da_dat').text().trim();
        if (dish != '') {
            if (width < 481) {
                $('footer').css('margin-top', '885px')
            }
            if (width < 376) {
                $('footer').css('margin-top', '920px')
            }
            if (width < 321) {
                $('footer').css('margin-top', '950px')
            }
            $('.popup-detail').addClass('d-block');
            $('.why-destroy').addClass('d-none');
            $('.note-popup').addClass('d-none');

            if (width <= 480) {
                $('.content').addClass('d-none');

            } else {
                $('.content').removeClass('d-none');

            }
        } else {
            alert('Giỏ hàng bạn không có món ăn !!')
        }
    });
    // nút quay lại của pp trạng thái đơn hàng
    $('.pp_cancle').click(function() {
        $('.popup-detail').removeClass('d-block');

        if (width <= 480) {
            $('.popup-detail').removeClass('d-block');
            $('.content').removeClass('d-none');
            $('footer').css('margin-top', '0');

        }
    });
    // ấn nút xác nhận đặt hàng 
    $('.btn_verify').click(function() {
        let address = $('span#dia-chi-nhan-han').text();

        let addressError = true;
        if (address == '') {
            addressError = false;
            $('#address-error').text('Bạn chưa chọn địa chỉ nhận hàng ');
        }
        if (addressError == true) {
            $('.btn_verify').css({ "display": "none" });
            $('.btn_saveOrder2').css({ "display": "block" });
            $('#address-error').text('');
            // khi xác nhận có địa chỉ 
            $('.btn_saveOrder2').click(function() {
                let note = $('#noteStatus').val();
                $('#note-popup').text(note);
                // $('.note-popup').addClass('d-block');
                $('.change-add').addClass('d-none');
                $('.note-status').addClass('d-none');
                $('.contect-mechart').addClass('d-none');
                $('.note-popup').removeClass('d-none');
                $('.pp_cancle').css("display", "none");
                $('.btn_verify').css({ "display": "none" });
                $('.btn_saveOrder').css({ "display": "block" });
                $('.btn_submit').css({
                    "bottom": "-50px"
                });
                $('.btn_saveOrder2').css({ "display": "none" });
            });
            $('.btn_saveOrder').click(function() {
                $(".btn_saveOrder").prop('disabled', true);
                let idAddress = $('input#idAddress').val();
                let addressCus = $('#dia-chi-nhan-han').text();
                let nameMechant = $('.infor-name p').text().trim();
                let nameCus = $('.name_order .order').html();
                let idMerchant = $('#idMerchant').val();
                let noteCus = $('#noteStatus').val()
                $('.popup-detail').removeClass('d-block');
                let data = {
                    idAddress: idAddress,
                    address: addressCus,
                    nameOrder: nameCus,
                    idMerchant: idMerchant,
                    note: noteCus,
                    nameMechant: nameMechant,
                }
                let orderDish = callAjax('order-foods', 'post', data);
                if (orderDish.result == true) {
                    $('#popup_succes').addClass('d-block');
                    let succes = callAjax('order-success', 'post', '');
                    let sclength = (succes.id).length;
                    let tmp_html = '';
                    for (let i = 0; i < sclength; i++) {
                        let qty = succes.id[i].qty;
                        let name = succes.id[i].name;
                        let money = succes.id[i].money;
                        tmp_html += `<div class="list_moned">
                        <div class="mon_01">
                            <div class="stt">` + qty + `</div>
                            <div class="name">` + name + `</div>
                            <div class="gia">` + money + `<span>đ</span></div>
                        </div>
                    </div>`;
                    }
                    var renderSc = `<div class="popup_sc_don">
                    <div class="gif_succes">
                        <div class="gif"></div>
                        <h2>Bạn đã xác nhận đơn thành công</h2>
                    </div>
                    <div class="fet_02">
                        <h2>Chi tiết đơn hàng</h2>
                        <div class="list_moned">
                          ` + tmp_html + `
                        </div>
                        <div class="bill">
                            <div class="tit_bill">
                                <span>Tổng <span style="font-weight: 500;"> 4 </span> suất</span>
                                <span>Phí ship</span>
                                <span>Khuyến mại</span>
                                <span>Giảm thêm</span>
                            </div>
                            <div class="gia_bill">
                                <span>` + succes.totalBefore + `</span>
                                <span>` + succes.feeShip + `</span>
                                <span style="color: red;">` + succes.sale + `<span style="color: red;">d</span></span>
                                <span>` + succes.totalAfter + `</span>
                            </div>
                        </div>
                        <div class="total_bill">
                            <span>Tổng tiền:</span>
                            <a>1.453.000đ</a>
                        </div>
                    </div>
                    <div class="dan_duong">
                        <div class="add_dd">
                            <div class="icon_dd"></div>
                            <div class="ct_dd">
                                <div class="add_01">
                                    <h2>Sườn nướng BBQ - Sườn Mười </h2>
                                    <span>264 Hoàng Văn Thái, 562 Trần Khát Chân, Hà Nội</span>
                                </div>
                                <div class="add_02">
                                    <h2>Đặng Diệp Thảo</h2>
                                    <span>264 Hoàng Văn Thái, 562 Trần Khát Chân, Hà Nội</span>
                                </div>
                            </div>
                        </div>
                        <div class="khoang_cach">
                            <span>Khoảng cách: </span><span style="color: red;"> 2.4 </span><span style="color: red;"> km</span><br>
                        </div>
                    </div>
                    <div class="popup_succes_done">
                        <button id="xac_nhan_done">Xác nhận</button>
                    </div>
                </div>`
                    $('#popup_succes').append(renderSc);
                }
                // if (width <= 480) {
                //     // window.location.href = "/home/rice_store_detail_after_lg.html";
                // }
                $('#xac_nhan_done').click(function() {
                    $('#popup_succes').removeClass('d-block');
                    let deleteSession = callAjax('delete-session-cart-buy', 'post', '');
                    alert(deleteSession);
                    window.location = window.location.pathname;
                });

            });
        }
    });
    // NÚT ĐÓNG 
    $('.icon-close-popup').click(function() {
        $('.popup-detail').removeClass('d-block');
    });
    // NÚT MỞ PP THAY ĐỔI ĐỊA CHỈ
    $('.change-add').click(function() {
        $('.popup-chage-address').addClass('d-block');
        $('.popup-detail').removeClass('d-block');
        if (width <= 480) {
            let address_order = $('.pp-detail-body td:last-child').text();
            $('.popup-chage-address td:last-child').text(address_order.slice(0, 20) + '...')
        }
    });
    // NÚT ĐÓNG MỞ PP THAY ĐỔI ĐỊA CHỈ
    $('.close-pp-chage-address').click(function() {
        $('.popup-chage-address').removeClass('d-block');
    });

    $('.pp-add-address>span').click(function() {
        $('#add-address').addClass('d-block');
        $('.popup-chage-address').removeClass('d-block');
        if (width <= 480) {
            $('.content').addClass('d-none');
            $('footer').css('margin-top', '550px');

        } else {
            $('.content').removeClass('d-none');

        }
    });
    // nút quay lại của popup tạo mới địa chỉ
    $('.cancle').click(function() {
        $('#add-address').removeClass('d-block');
        if (width <= 480) {
            $('#add-address').removeClass('d-block');
            $('.popup-chage-address').addClass('d-block');
            $('footer').css('margin-top', '815px');

        }
    });
    // nút x của pp quay trở lại
    $('.icon-close-popup').click(function() {
        $('#add-address').removeClass('d-block');

    });
    $('.save-address').click(function() {

        let fullname = document.getElementById('fullname').value;
        let phone = document.getElementById('phone').value;
        let address = document.getElementById('address').value;
        let flag = true;
        var phoneformat = /^\d+/;

        if (fullname == '') {
            document.getElementById('error_message_fullname').innerHTML = `<span class="error_message">Không được bỏ trống Họ và tên</span>`;
            document.getElementById('name_error').classList.add("color_error");
            document.getElementById('icon_error_fullname').innerHTML = ` <img src="/img/icon_error.svg" alt="Lỗi thông tin nhập vào">`;
            document.getElementById('fullname').style.border = "1px solid #F24236";;
            flag = false;
        }
        if (phone == '') {
            document.getElementById('error_message_phone').innerHTML = `<span class="error_message">Không được bỏ trống phone</span>`;
            document.getElementById('phone_error').classList.add("color_error");
            document.getElementById('icon_error_phone').innerHTML = ` <img src="/img/icon_error.svg" class="icon_error" alt="Lỗi thông tin nhập vào">`;
            document.getElementById('phone').style.border = "1px solid #F24236";;
            flag = false;
        } else {
            if (!phone.match(phoneformat)) {
                document.getElementById('error_message_phone').innerHTML = `<span class="error_message">Số điện thoại không đúng định dạng </span>`;
                document.getElementById('phone_error').classList.add("color_error");
                document.getElementById('icon_error_phone').innerHTML = ` <img src="/img/icon_error.svg" class="icon_error" alt="Lỗi thông tin nhập vào">`;
                document.getElementById('phone').style.border = "1px solid #F24236";;
                flag = false;
            }
        }
        if (address == '') {
            document.getElementById('error_message_address').innerHTML = `<span class="error_message">Không được bỏ trống Họ và tên</span>`;
            document.getElementById('address_error').classList.add("color_error");
            document.getElementById('icon_error_address').innerHTML = ` <img src="/img/icon_error.svg" alt="Lỗi thông tin nhập vào">`;
            document.getElementById('address').style.border = "1px solid #F24236";;
            flag = false;
        }
        if (flag == true) {
            $('#add-address').removeClass('d-block');
            alert('Thêm 1 địa chỉ thành công ');
        }
    });

});
$('.tl-menu-day-name p').click(function() {
    $('.menu-day-name .day').toggleClass('d-block');
})

function chooseAddress(e, id) {
    let text = $(".get_address_" + id).text();
    let name = $(e).parent().parent().find('.nameOrdered').text();
    $('.popup-chage-address').removeClass('d-block');
    $('#dia-chi-nhan-han').html(text);
    $('.name_order .order').html(name);
    $('input#idAddress').val(id);
    $('.popup-detail').addClass('d-block');
    $('.change-add').text('Thay đổi đại chỉ');

}
let total = 0;

function orderPermanent(id) {
    let numberFood = Number($('#num-permanent-' + id).text());
    let datajson = {
        id: id,
        numOr: numberFood
    }
    let order = callAjax('order-session', 'post', datajson);
    if (order != null) {
        if (order.status == 'add') {
            let render = `<div class="wrap-mon-an-da-dat"  >
                <div class="mon_an_da_dat_top">
                    <div class="ten_mon_an_da_dat">
                        <p>` + order.name + `
                        </p>
                    </div>
                    <div class="num-order">
                        <button onclick="return subTowOne(this,` + id + `,` + order.combo + `) ;">
                            <div class="img-sub"></div>
                        </button>
                        <span class="qtyOrder qtyOrder-permanent-` + ChangeToSlug(order.name) + id + order.combo + `">` + order.qty + `</span>
                        <button type="button" onclick="return addTowOne(this ,` + id + `,` + order.combo + `) ;">
                            <div class="img-add"></div>
                        </button>
                    </div>
                </div>
                <div class="ghi_chu_them">
                    <input type="text" name="" id="" placeholder="Thêm ghi chú ......">
                    <span class="tien_mon_an_da_dat tien_mon_an_da_dat` + ChangeToSlug(order.name) + id + order.combo +
                `"> ` + new Intl.NumberFormat().format(order.total) + `đ</span>
                </div>
            </div>`;
            let renderPopup = `<li>
            <div class="left">
                <span class="num-od num-od` + ChangeToSlug(order.name) + id + order.combo + `">` + order.qty + `</span>
                <span class="name-od ">` + order.name + `</span>
            </div>
            <div class="right">
                <span class="money money` + ChangeToSlug(order.name) + id + order.combo + `">` + new Intl.NumberFormat().format(order.total) + `đ</span>
            </div>
        </li>`;
            $('#mon_an_da_dat').append(render);
            $('.list-order').append(renderPopup);
            if (width <= 768) {
                $('.cart-375 ').prepend(render);
            }
        } else {
            $('.qtyOrder-permanent-' + ChangeToSlug(order.name) + id + order.combo).text(order.qty);
            $('.tien_mon_an_da_dat' + ChangeToSlug(order.name) + id + order.combo).text(new Intl.NumberFormat().format(order.total));
            $('.num-od' + ChangeToSlug(order.name) + id + order.combo).text(order.qty);
            $('.money' + ChangeToSlug(order.name) + id + order.combo).text(new Intl.NumberFormat().format(order.total));
        }
        let quangDuongShip = Number($('#distance').text().trim());
        // alert(quangDuongShip);
        let payAll = caculaDish(phiShip, quangDuongShip);
        $('#money').text(new Intl.NumberFormat().format(payAll.total));
        // $('#fee-ship').text(new Intl.NumberFormat().format(payAll.feeShip));
        $('#total-all').text(new Intl.NumberFormat().format(payAll.total));
        // =========
        $('.money-ship-popup').text(new Intl.NumberFormat().format(payAll.feeShip) + 'đ');
        $('#sale-percent').text(new Intl.NumberFormat().format(payAll.sale));
        $('.sale-orther').text(new Intl.NumberFormat().format(payAll.saleOther));
        $('.total-all p').text(new Intl.NumberFormat().format(payAll.total) + 'đ');
        $('.money-total-all').text(new Intl.NumberFormat().format(payAll.totalAll) + 'đ');
        // if (width <= 768) {
        //     $('#money768').text(new Intl.NumberFormat().format(payAll.total) + 'đ');
        // }
    }
}

function orderManyPermanent(e, id) {
    let numberFood = Number($('#num-permanent-' + id).text());
    let datajson = {
        id: id,
        numOr: numberFood
    }
    let order = callAjax('order-many-session', 'post', datajson);
    if (order != null) {
        if (order.status == 'add') {
            let render = `<div class="wrap-mon-an-da-dat"  >
                <div class="mon_an_da_dat_top">
                    <div class="ten_mon_an_da_dat">
                        <p>` + order.name + `
                        </p>
                    </div>
                    <div class="num-order">
                        <button onclick="return subTowOne(this,` + id + `,` + order.combo + `) ;">
                            <div class="img-sub"></div>
                        </button>
                        <span class="qtyOrder qtyOrder-permanent-` + ChangeToSlug(order.name) + id + order.combo + `">` + order.qty + `</span>
                        <button type="button" onclick="return addTowOne(this ,` + id + `,` + order.combo + `) ;">
                            <div class="img-add"></div>
                        </button>
                    </div>
                </div>
                <div class="ghi_chu_them">
                    <input type="text" name="" id="" placeholder="Thêm ghi chú ......">
                    <span class="tien_mon_an_da_dat tien_mon_an_da_dat` + ChangeToSlug(order.name) + id + order.combo +
                `"> ` + new Intl.NumberFormat().format(order.total) + `đ</span>
                </div>
            </div>`;
            let renderPopup = `<li>
            <div class="left">
                <span class="num-od num-od` + ChangeToSlug(order.name) + id + order.combo + `">` + order.qty + `</span>
                <span class="name-od ">` + order.name + `</span>
            </div>
            <div class="right">
                <span class="money money` + ChangeToSlug(order.name) + id + order.combo + `">` + new Intl.NumberFormat().format(order.total) + `đ</span>
            </div>
        </li>`;
            $('#mon_an_da_dat').append(render);
            if (width <= 768) {
                $('.cart-375 ').prepend(render);

            }
            $('.list-order').append(renderPopup);
        } else {
            $('.qtyOrder-permanent-' + ChangeToSlug(order.name) + id + order.combo).text(order.qty);
            $('.tien_mon_an_da_dat' + ChangeToSlug(order.name) + id + order.combo).text(new Intl.NumberFormat().format(order.total));
            $('.num-od' + ChangeToSlug(order.name) + id + order.combo).text(order.qty);
            $('.money' + ChangeToSlug(order.name) + id + order.combo).text(new Intl.NumberFormat().format(order.total));
        }
        let quangDuongShip = Number($('#distance').text().trim());
        // alert(quangDuongShip);
        let payAll = caculaDish(phiShip, quangDuongShip);
        $('#money').text(new Intl.NumberFormat().format(payAll.total));
        // $('#fee-ship').text(new Intl.NumberFormat().format(payAll.feeShip));
        $('#total-all').text(new Intl.NumberFormat().format(payAll.total));
        // =========
        $('.money-ship-popup').text(new Intl.NumberFormat().format(payAll.feeShip));
        $('#sale-percent').text(new Intl.NumberFormat().format(payAll.sale));
        $('.sale-orther').text(new Intl.NumberFormat().format(payAll.saleOther));
        $('.total-all p').text(new Intl.NumberFormat().format(payAll.total));
        $('.money-total-all').text(new Intl.NumberFormat().format(payAll.totalAll));
        // if (width <= 768) {
        //     $('#money768').text(new Intl.NumberFormat().format(payAll.total) + 'đ');
        // }
    }
    $(e).parent().find('.numOr').text(1);
}

function orderBuyDay(id) {
    let numberFood = Number($('#number-day-' + id).text());
    let datajson = {
        id: id,
        numOr: numberFood
    }
    let order = callAjax('order-session', 'post', datajson);
    if (order != null) {
        if (order.status == 'add') {
            let render = `<div class="wrap-mon-an-da-dat"  >
                <div class="mon_an_da_dat_top">
                    <div class="ten_mon_an_da_dat">
                        <p>` + order.name + `
                        </p>
                    </div>
                    <div class="num-order">
                        <button onclick="return subTowOne(this,` + id + `,` + order.combo + `) ;">
                            <div class="img-sub"></div>
                        </button>
                        <span class="qtyOrder qtyOrder-permanent-` + ChangeToSlug(order.name) + id + order.combo + `">` + order.qty + `</span>
                        <button type="button" onclick="return addTowOne(this ,` + id + `,` + order.combo + `) ;">
                            <div class="img-add"></div>
                        </button>
                    </div>
                </div>
                <div class="ghi_chu_them">
                    <input type="text" name="" id="" placeholder="Thêm ghi chú ......">
                    <span class="tien_mon_an_da_dat tien_mon_an_da_dat` + ChangeToSlug(order.name) + id + order.combo +
                `"> ` + new Intl.NumberFormat().format(order.total) + `đ</span>
                </div>
            </div>`;
            let renderPopup = `<li>
            <div class="left">
                <span class="num-od num-od` + ChangeToSlug(order.name) + id + order.combo + `">` + order.qty + `</span>
                <span class="name-od ">` + order.name + `</span>
            </div>
            <div class="right">
                <span class="money money` + ChangeToSlug(order.name) + id + order.combo + `">` + new Intl.NumberFormat().format(order.total) + `đ</span>
            </div>
        </li>`;
            $('#mon_an_da_dat').append(render);
            if (width <= 768) {
                $('.cart-375 ').prepend(render);

            }
            $('.list-order').append(renderPopup);
        } else {
            $('.qtyOrder-permanent-' + ChangeToSlug(order.name) + id + order.combo).text(order.qty);
            $('.tien_mon_an_da_dat' + ChangeToSlug(order.name) + id + order.combo).text(new Intl.NumberFormat().format(order.total));
            $('.num-od' + ChangeToSlug(order.name) + id + order.combo).text(order.qty);
            $('.money' + ChangeToSlug(order.name) + id + order.combo).text(new Intl.NumberFormat().format(order.total));
        }
        let quangDuongShip = Number($('#distance').text().trim());
        // alert(quangDuongShip);
        let payAll = caculaDish(phiShip, quangDuongShip);
        $('#money').text(new Intl.NumberFormat().format(payAll.total));
        // $('#fee-ship').text(new Intl.NumberFormat().format(payAll.feeShip));
        $('#total-all').text(new Intl.NumberFormat().format(payAll.total) + 'đ');
        // =========
        $('.money-ship-popup').text(new Intl.NumberFormat().format(payAll.feeShip));
        $('#sale-percent').text(new Intl.NumberFormat().format(payAll.sale));
        $('.sale-orther').text(new Intl.NumberFormat().format(payAll.saleOther));
        $('.total-all p').text(new Intl.NumberFormat().format(payAll.total) + 'đ');
        $('.money-total-all').text(new Intl.NumberFormat().format(payAll.totalAll) + 'đ');
        // if (width <= 768) {
        //     $('#money768').text(new Intl.NumberFormat().format(payAll.total) + 'đ');
        // }
    }
}

function orderManyBuyDay(e, id) {
    let numberFood = Number($('#number-day-' + id).text());
    let datajson = {
        id: id,
        numOr: numberFood
    }
    let order = callAjax('order-many-session', 'post', datajson);
    if (order != null) {
        if (order.status == 'add') {
            let render = `<div class="wrap-mon-an-da-dat"  >
                <div class="mon_an_da_dat_top">
                    <div class="ten_mon_an_da_dat">
                        <p>` + order.name + `
                        </p>
                    </div>
                    <div class="num-order">
                        <button onclick="return subTowOne(this,` + id + `,` + order.combo + `) ;">
                            <div class="img-sub"></div>
                        </button>
                        <span class="qtyOrder qtyOrder-permanent-` + ChangeToSlug(order.name) + id + order.combo + `">` + order.qty + `</span>
                        <button type="button" onclick="return addTowOne(this ,` + id + `,` + order.combo + `) ;">
                            <div class="img-add"></div>
                        </button>
                    </div>
                </div>
                <div class="ghi_chu_them">
                    <input type="text" name="" id="" placeholder="Thêm ghi chú ......">
                    <span class="tien_mon_an_da_dat tien_mon_an_da_dat` + ChangeToSlug(order.name) + id + order.combo +
                `"> ` + new Intl.NumberFormat().format(order.total) + `đ</span>
                </div>
            </div>`;
            let renderPopup = `<li>
            <div class="left">
                <span class="num-od num-od` + ChangeToSlug(order.name) + id + order.combo + `">` + order.qty + `</span>
                <span class="name-od ">` + order.name + `</span>
            </div>
            <div class="right">
                <span class="money money` + ChangeToSlug(order.name) + id + order.combo + `">` + new Intl.NumberFormat().format(order.total) + `đ</span>
            </div>
        </li>`;
            $('#mon_an_da_dat').append(render);
            if (width <= 768) {
                $('.cart-375 ').prepend(render);

            }
            $('.list-order').append(renderPopup);
        } else {
            $('.qtyOrder-permanent-' + ChangeToSlug(order.name) + id + order.combo).text(order.qty);
            $('.tien_mon_an_da_dat' + ChangeToSlug(order.name) + id + order.combo).text(new Intl.NumberFormat().format(order.total));
            $('.num-od' + ChangeToSlug(order.name) + id + order.combo).text(order.qty);
            $('.money' + ChangeToSlug(order.name) + id + order.combo).text(new Intl.NumberFormat().format(order.total));
        }
        let quangDuongShip = Number($('#distance').text().trim());
        // alert(quangDuongShip);
        let payAll = caculaDish(phiShip, quangDuongShip);
        $('#money').text(new Intl.NumberFormat().format(payAll.total));
        // $('#fee-ship').text(new Intl.NumberFormat().format(payAll.feeShip));
        $('#total-all').text(new Intl.NumberFormat().format(payAll.total) + 'đ');
        // =========
        $('.money-ship-popup').text(new Intl.NumberFormat().format(payAll.feeShip));
        $('#sale-percent').text(new Intl.NumberFormat().format(payAll.sale));
        $('.sale-orther').text(new Intl.NumberFormat().format(payAll.saleOther));
        $('.total-all p').text(new Intl.NumberFormat().format(payAll.total) + 'đ');
        $('.money-total-all').text(new Intl.NumberFormat().format(payAll.totalAll) + 'đ');
        // if (width <= 768) {
        //     $('#money768').text(new Intl.NumberFormat().format(payAll.total) + 'đ');
        // }
    }

    $(e).parent().find('.numOr').text(1);
}

function orderManyBuyGroup(e, id) {
    let numberFood = Number($('#num-group-' + id).text());
    let datajson = {
        id: id,
        numOr: numberFood
    }
    let order = callAjax('order-many-session', 'post', datajson);
    if (order != null) {
        if (order.status == 'add') {
            let render = `<div class="wrap-mon-an-da-dat"  >
                <div class="mon_an_da_dat_top">
                    <div class="ten_mon_an_da_dat">
                        <p>` + order.name + `
                        </p>
                    </div>
                    <div class="num-order">
                        <button onclick="return subTowOne(this,` + id + `,` + order.combo + `) ;">
                            <div class="img-sub"></div>
                        </button>
                        <span class="qtyOrder qtyOrder-permanent-` + ChangeToSlug(order.name) + id + order.combo + `">` + order.qty + `</span>
                        <button type="button" onclick="return addTowOne(this ,` + id + `,` + order.combo + `) ;">
                            <div class="img-add"></div>
                        </button>
                    </div>
                </div>
                <div class="ghi_chu_them">
                    <input type="text" name="" id="" placeholder="Thêm ghi chú ......">
                    <span class="tien_mon_an_da_dat tien_mon_an_da_dat` + ChangeToSlug(order.name) + id + order.combo +
                `"> ` + new Intl.NumberFormat().format(order.total) + `đ</span>
                </div>
            </div>`;
            let renderPopup = `<li>
            <div class="left">
                <span class="num-od num-od` + ChangeToSlug(order.name) + id + order.combo + `">` + order.qty + `</span>
                <span class="name-od ">` + order.name + `</span>
            </div>
            <div class="right">
                <span class="money money` + ChangeToSlug(order.name) + id + order.combo + `">` + new Intl.NumberFormat().format(order.total) + `đ</span>
            </div>
        </li>`;
            $('#mon_an_da_dat').append(render);
            if (width <= 768) {
                $('.cart-375 ').prepend(render);

            }
            $('.list-order').append(renderPopup);
        } else {
            $('.qtyOrder-permanent-' + ChangeToSlug(order.name) + id + order.combo).text(order.qty);
            $('.tien_mon_an_da_dat' + ChangeToSlug(order.name) + id + order.combo).text(new Intl.NumberFormat().format(order.total));
            $('.num-od' + ChangeToSlug(order.name) + id + order.combo).text(order.qty);
            $('.money' + ChangeToSlug(order.name) + id + order.combo).text(new Intl.NumberFormat().format(order.total) + 'đ');
        }
        let quangDuongShip = Number($('#distance').text().trim());
        // alert(quangDuongShip);
        let payAll = caculaDish(phiShip, quangDuongShip);
        $('#money').text(new Intl.NumberFormat().format(payAll.total));
        // $('#fee-ship').text(new Intl.NumberFormat().format(payAll.feeShip));
        $('#total-all').text(new Intl.NumberFormat().format(payAll.total));
        // =========
        $('.money-ship-popup').text(new Intl.NumberFormat().format(payAll.feeShip));
        $('#sale-percent').text(new Intl.NumberFormat().format(payAll.sale));
        $('.sale-orther').text(new Intl.NumberFormat().format(payAll.saleOther));
        $('.total-all p').text(new Intl.NumberFormat().format(payAll.total) + 'đ');
        $('.money-total-all').text(new Intl.NumberFormat().format(payAll.totalAll) + 'đ');
        // if (width <= 768) {
        //     $('#money768').text(new Intl.NumberFormat().format(payAll.total) + 'đ');
        // }
    }

    $(e).parent().find('.numOr').text(1);
}

function orderBuyGroup(id) {
    let numberFood = Number($('#num-group-' + id).text());
    let datajson = {
        id: id,
        numOr: numberFood
    }
    let order = callAjax('order-session', 'post', datajson);
    if (order != null) {
        if (order.status == 'add') {
            let render = `<div class="wrap-mon-an-da-dat"  >
                <div class="mon_an_da_dat_top">
                    <div class="ten_mon_an_da_dat">
                        <p>` + order.name + `
                        </p>
                    </div>
                    <div class="num-order">
                        <button onclick="return subTowOne(this,` + id + `,` + order.combo + `) ;">
                            <div class="img-sub"></div>
                        </button>
                        <span class="qtyOrder qtyOrder-permanent-` + ChangeToSlug(order.name) + id + order.combo + `">` + order.qty + `</span>
                        <button type="button" onclick="return addTowOne(this ,` + id + `,` + order.combo + order.combo + `) ;">
                            <div class="img-add"></div>
                        </button>
                    </div>
                </div>
                <div class="ghi_chu_them">
                    <input type="text" name="" id="" placeholder="Thêm ghi chú ......">
                    <span class="tien_mon_an_da_dat tien_mon_an_da_dat` + ChangeToSlug(order.name) + id + order.combo +
                `"> ` + new Intl.NumberFormat().format(order.total) + `đ</span>
                </div>
            </div>`;
            let renderPopup = `<li>
            <div class="left">
                <span class="num-od num-od` + ChangeToSlug(order.name) + id + order.combo + `">` + order.qty + `</span>
                <span class="name-od ">` + order.name + `</span>
            </div>
            <div class="right">
                <span class="money money` + ChangeToSlug(order.name) + id + order.combo + `">` + new Intl.NumberFormat().format(order.total) + `đ</span>
            </div>
        </li>`;
            $('#mon_an_da_dat').append(render);
            if (width <= 768) {
                $('.cart-375 ').prepend(render);

            }
            $('.list-order').append(renderPopup);
        } else {
            $('.qtyOrder-permanent-' + ChangeToSlug(order.name) + id + order.combo).text(order.qty);
            $('.tien_mon_an_da_dat' + ChangeToSlug(order.name) + id + order.combo).text(new Intl.NumberFormat().format(order.total));
            $('.num-od' + ChangeToSlug(order.name) + id + order.combo).text(order.qty);
            $('.money' + ChangeToSlug(order.name) + id + order.combo).text(new Intl.NumberFormat().format(order.total));
        }
        let quangDuongShip = Number($('#distance').text().trim());
        // alert(quangDuongShip);
        let payAll = caculaDish(phiShip, quangDuongShip);
        $('#money').text(new Intl.NumberFormat().format(payAll.total));
        // $('#fee-ship').text(new Intl.NumberFormat().format(payAll.feeShip));
        $('#total-all').text(new Intl.NumberFormat().format(payAll.total) + 'đ');
        // =========
        $('.money-ship-popup').text(new Intl.NumberFormat().format(payAll.feeShip));
        $('#sale-percent').text(new Intl.NumberFormat().format(payAll.sale));
        $('.sale-orther').text(new Intl.NumberFormat().format(payAll.saleOther));
        $('.total-all p').text(new Intl.NumberFormat().format(payAll.total) + 'đ');
        $('.money-total-all').text(new Intl.NumberFormat().format(payAll.totalAll) + 'đ');
        // if (width <= 768) {
        //     $('#money768').text(new Intl.NumberFormat().format(payAll.total) + 'đ');
        // }
    }
}

function orderManyBuyCombo(e, id) {
    let numberFood = Number($('#num-combo-' + id).text());
    let datajson = {
        id: id,
        numOr: numberFood
    }
    let order = callAjax('order-session-many-combo', 'post', datajson);
    if (order != null) {
        if (order.status == 'add') {
            let render = `<div class="wrap-mon-an-da-dat"  >
                            <div class="mon_an_da_dat_top">
                                <div class="ten_mon_an_da_dat">
                                    <p>` + order.name + `
                                    </p>
                                </div>
                                <div class="num-order">
                                    <button onclick="return subTowOne(this,` + id + `,` + order.combo + `) ;">
                                        <div class="img-sub"></div>
                                    </button>
                                    <span class="qtyOrder qtyOrder-permanent-` + ChangeToSlug(order.name) + id + order.combo + `">` + order.qty + `</span>
                                    <button type="button" onclick="return addTowOne(this ,` + id + `,` + order.combo + `) ;">
                                        <div class="img-add"></div>
                                    </button>
                                </div>
                            </div>
                            <div class="ghi_chu_them">
                                <input type="text" name="" id="" placeholder="Thêm ghi chú ......">
                                <span class="tien_mon_an_da_dat tien_mon_an_da_dat` + ChangeToSlug(order.name) + id + order.combo + `"> ` + new Intl.NumberFormat().format(order.total) + `đ</span>
                            </div>
                        </div>`;
            let renderPopup = `<li>
                        <div class="left">
                            <span class="num-od num-od` + ChangeToSlug(order.name) + id + order.combo + `">` + order.qty + `</span>
                            <span class="name-od ">` + order.name + `</span>
                        </div>
                        <div class="right">
                            <span class="money money` + ChangeToSlug(order.name) + id + order.combo + `">` + new Intl.NumberFormat().format(order.total) + `đ</span>
                        </div>
                    </li>`;
            $('#mon_an_da_dat').append(render);
            if (width <= 768) {
                $('.cart-375 ').prepend(render);

            }
            $('.list-order').append(renderPopup);

        } else {
            $('.qtyOrder-permanent-' + ChangeToSlug(order.name) + id + order.combo).text(order.qty);
            $('.tien_mon_an_da_dat' + ChangeToSlug(order.name) + id + order.combo).text(new Intl.NumberFormat().format(order.total));
            $('.num-od' + ChangeToSlug(order.name) + id + order.combo).text(order.qty);
            $('.money' + ChangeToSlug(order.name) + id + order.combo).text(new Intl.NumberFormat().format(order.total) + 'đ');
        }
        let quangDuongShip = Number($('#distance').text().trim());
        // alert(quangDuongShip);
        let payAll = caculaDish(phiShip, quangDuongShip);
        $('#money').text(new Intl.NumberFormat().format(payAll.total));
        // $('#fee-ship').text(new Intl.NumberFormat().format(payAll.feeShip));
        $('#total-all').text(new Intl.NumberFormat().format(payAll.total));
        // =========
        $('.money-ship-popup').text(new Intl.NumberFormat().format(payAll.feeShip));
        $('#sale-percent').text(new Intl.NumberFormat().format(payAll.sale));
        $('.sale-orther').text(new Intl.NumberFormat().format(payAll.saleOther));
        $('.total-all p').text(new Intl.NumberFormat().format(payAll.total) + 'đ');
        $('.money-total-all').text(new Intl.NumberFormat().format(payAll.totalAll) + 'đ');
        // if (width <= 768) {
        //     $('#money768').text(new Intl.NumberFormat().format(payAll.total) + 'đ');
        // }
        // console.log(payAll)
    }

    $(e).parent().find('.numOr').text(1);
}

function orderBuyCombo(id) {
    let numberFood = Number($('#num-combo-' + id).text());
    let datajson = {
        id: id,
        numOr: numberFood
    }
    let order = callAjax('order-session-combo', 'post', datajson);
    if (order != null) {
        if (order.status == 'add') {
            let render = `<div class="wrap-mon-an-da-dat"  >
                            <div class="mon_an_da_dat_top">
                                <div class="ten_mon_an_da_dat">
                                    <p>` + order.name + `
                                    </p>
                                </div>
                                <div class="num-order">
                                    <button onclick="return subTowOne(this,` + id + `,` + order.combo + `) ;">
                                        <div class="img-sub"></div>
                                    </button>
                                    <span class="qtyOrder qtyOrder-permanent-` + ChangeToSlug(order.name) + id + order.combo + `">` + order.qty + `</span>
                                    <button type="button" onclick="return addTowOne(this ,` + id + `,` + order.combo + `) ;">
                                        <div class="img-add"></div>
                                    </button>
                                </div>
                            </div>
                            <div class="ghi_chu_them">
                                <input type="text" name="" id="" placeholder="Thêm ghi chú ......">
                                <span class="tien_mon_an_da_dat tien_mon_an_da_dat` + ChangeToSlug(order.name) + id + order.combo + `"> ` + order.total + `đ</span>
                            </div>
                        </div>`;
            let renderPopup = `<li>
                        <div class="left">
                            <span class="num-od num-od` + ChangeToSlug(order.name) + id + order.combo + `">` + order.qty + `</span>
                            <span class="name-od ">` + order.name + `</span>
                        </div>
                        <div class="right">
                            <span class="money money` + ChangeToSlug(order.name) + id + order.combo + `">` + new Intl.NumberFormat().format(order.total) + `đ</span>
                        </div>
                    </li>`;
            $('#mon_an_da_dat').append(render);
            $('.list-order').append(renderPopup);
            if (width <= 768) {
                $('.cart-375 ').prepend(render);

            }

        } else {
            $('.qtyOrder-permanent-' + ChangeToSlug(order.name) + id + order.combo).text(order.qty);
            $('.tien_mon_an_da_dat' + ChangeToSlug(order.name) + id + order.combo).text(new Intl.NumberFormat().format(order.total));
            $('.num-od' + ChangeToSlug(order.name) + id + order.combo).text(order.qty);
            $('.money' + ChangeToSlug(order.name) + id + order.combo).text(new Intl.NumberFormat().format(order.total) + 'đ');
        }
        let quangDuongShip = Number($('#distance').text().trim());
        // alert(quangDuongShip);
        let payAll = caculaDish(phiShip, quangDuongShip);
        $('#money').text(new Intl.NumberFormat().format(payAll.total));
        // $('#fee-ship').text(new Intl.NumberFormat().format(payAll.feeShip));
        $('#total-all').text(new Intl.NumberFormat().format(payAll.total));
        // =========
        $('.money-ship-popup').text(new Intl.NumberFormat().format(payAll.feeShip));
        $('#sale-percent').text(new Intl.NumberFormat().format(payAll.sale));
        $('.sale-orther').text(new Intl.NumberFormat().format(payAll.saleOther));
        $('.total-all p').text(new Intl.NumberFormat().format(payAll.total) + 'đ');
        $('.money-total-all').text(new Intl.NumberFormat().format(payAll.totalAll) + 'đ');
        // if (width <= 768) {
        //     $('#money768').text(new Intl.NumberFormat().format(payAll.total) + 'đ');
        // }
        // console.log(payAll)
    }
}

function addTowOne(e, id, isCombo) {

    let numOr = Number($(e).parent().find('.qtyOrder').text());
    let dataJson = {
        id: id,
        isCombo: isCombo,
        numberOrder: numOr,
    };
    let addOne = callAjax('order/add-order', 'post', dataJson);
    if (addOne != null) {
        let format_money = new Intl.NumberFormat().format(addOne.total) + 'đ';
        Number($(e).parent().find('.qtyOrder').text(addOne.qty));
        Number($(e).parent().parent().parent().find('.tien_mon_an_da_dat').text(format_money));
        $('.num-od' + id + addOne.combo).text(addOne.qty);
        $('.money' + id + addOne.combo).text(format_money);
    }
    let quangDuongShip = Number($('#distance').text().trim());
    // alert(quangDuongShip);
    let payAll = caculaDish(phiShip, quangDuongShip);
    $('#money').text(new Intl.NumberFormat().format(payAll.total));
    // $('#fee-ship').text(new Intl.NumberFormat().format(payAll.feeShip));
    $('#total-all').text(new Intl.NumberFormat().format(payAll.total));
    // =========
    $('.money-ship-popup').text(new Intl.NumberFormat().format(payAll.feeShip));
    $('#sale-percent').text(new Intl.NumberFormat().format(payAll.sale));
    $('.sale-orther').text(new Intl.NumberFormat().format(payAll.saleOther));
    $('.total-all p').text(new Intl.NumberFormat().format(payAll.total));
    $('.money-total-all').text(new Intl.NumberFormat().format(payAll.totalAll));
}

function subTowOne(e, id, isCombo) {
    let numOr = Number($(e).parent().find('.qtyOrder').text()) - 1;
    let dataJson = {
        id: id,
        numberOrder: numOr,
        isCombo: isCombo
    }

    let subOne = callAjax('order/pop-order', 'post', dataJson);
    if (subOne != null) {
        let format_money = new Intl.NumberFormat().format(subOne.total) + 'đ';
        Number($(e).parent().find('.qtyOrder').text(subOne.qty));
        Number($(e).parent().parent().parent().find('.tien_mon_an_da_dat').text(format_money));
        $('.num-od' + id + subOne.combo).text(subOne.qty);
        $('.money' + id + subOne.combo).text(format_money);
        // console.log('.money' + ChangeToSlug(subOne.name) + id + subOne.combo);
        // if (subOne.qty <= 0) {
        //     console.log($(e).parent().parent().parent().parent().remove());

        // }
    } else {
        console.log($(e).parent().parent().parent().remove());
    }
    let quangDuongShip = Number($('#distance').text().trim());
    // alert(quangDuongShip);
    let payAll = caculaDish(phiShip, quangDuongShip);
    $('#money').text(new Intl.NumberFormat().format(payAll.total));
    // $('#fee-ship').text(new Intl.NumberFormat().format(payAll.feeShip));
    $('#total-all').text(new Intl.NumberFormat().format(payAll.total));
    // =========
    $('.money-ship-popup').text(new Intl.NumberFormat().format(payAll.feeShip));
    $('#sale-percent').text(new Intl.NumberFormat().format(payAll.sale));
    $('.sale-orther').text(new Intl.NumberFormat().format(payAll.saleOther));
    $('.total-all p').text(new Intl.NumberFormat().format(payAll.total));
    $('.money-total-all').text(new Intl.NumberFormat().format(payAll.totalAll));
}

function add(e) {
    let numOr = Number($(e).parent().find('.numOr').text());
    $(e).parent().find('.numOr').text(numOr += 1);
}

function sub(e) {
    let numOr = Number($(e).parent().find('.numOr').text());
    if (numOr <= 0) {
        $(e).parent().find('.numOr').text(0);

    } else {
        $(e).parent().find('.numOr').text(numOr -= 1);
    }
}
$('.save-address').click(function() {

    let fullname = document.getElementById('fullname').value;
    let phone = document.getElementById('phone').value;
    let address = document.getElementById('address').value;
    let flag = true;
    var phoneformat = /^\d+/;

    if (fullname == '') {
        document.getElementById('error_message_fullname').innerHTML = `<span class="error_message">Không được bỏ trống Họ và tên</span>`;
        document.getElementById('name_error').classList.add("color_error");
        document.getElementById('icon_error_fullname').innerHTML = ` <img src="../img/icon_error.svg" alt="Lỗi thông tin nhập vào">`;
        document.getElementById('fullname').style.border = "1px solid #F24236";;
        flag = false;
    }
    if (phone == '') {
        document.getElementById('error_message_phone').innerHTML = `<span class="error_message">Không được bỏ trống phone</span>`;
        document.getElementById('phone_error').classList.add("color_error");
        document.getElementById('icon_error_phone').innerHTML = ` <img src="../img/icon_error.svg" class="icon_error" alt="Lỗi thông tin nhập vào">`;
        document.getElementById('phone').style.border = "1px solid #F24236";;
        flag = false;
    } else {
        if (!phone.match(phoneformat)) {
            document.getElementById('error_message_phone').innerHTML = `<span class="error_message">Số điện thoại không đúng định dạng </span>`;
            document.getElementById('phone_error').classList.add("color_error");
            document.getElementById('icon_error_phone').innerHTML = ` <img src="../img/icon_error.svg" class="icon_error" alt="Lỗi thông tin nhập vào">`;
            document.getElementById('phone').style.border = "1px solid #F24236";;
            flag = false;
        }
    }
    if (address == '') {
        document.getElementById('error_message_address').innerHTML = `<span class="error_message">Không được bỏ trống Họ và tên</span>`;
        document.getElementById('address_error').classList.add("color_error");
        document.getElementById('icon_error_address').innerHTML = ` <img src="../img/icon_error.svg" alt="Lỗi thông tin nhập vào">`;
        document.getElementById('address').style.border = "1px solid #F24236";;
        flag = false;
    }
    if (flag == true) {
        $('#add-address').removeClass('d-block');
        let data_json = {
            name: fullname,
            phone: phone,
            address: address,
        };
        let add_Adress = callAjax('add-address-receive', 'post', data_json);
        if (add_Adress.result == 'true') {
            alert(add_Adress.message);
            $('#address').val('');
            $('#name').val('');
            $('#phone').val('');
        }
    }
});
$('.img-my-cart').click(() => {
    // alert('');  
    if (width <= 768) {
        $('.cart-375').toggleClass('d-block');
    }
});
// Nut tìm kiếm theo ngày 



// .addEventListener('click', e => {
//     alert()
//     console.log(e.target);
// });
var array_day = new Array;
$("input[name=day_open_merchant]").on('click', (e) => {
    let id_mer = $('#id_merchant').val()
    let value = e.target.value;
    if (array_day.includes(value) == false) {
        array_day.push(value)
    } else {
        // delete array_day[array_day.indexOf(value)]
        array_day.splice(array_day.indexOf(value), 1);
    }

    let json_data = {
        id_mer: id_mer,
        data: array_day,
    }
    let respone = callAjax('handles/customer/home/OrderController/searchDishDay', 'post', json_data);
    let render = '<p class="fp-titxle-1">Món ăn Theo Ngày</p>';
    if (respone.rs == true) {
        respone = respone.ms;
        let doDai = respone.length;
        for (let i = 0; i < doDai; i++) {
            console.log(respone[i]);
            let sale_code = Math.round((respone[i].price_food * respone[i].sale_code) / 100);
            render += `
            <div class="wrap-fb-title-1">
            <div class="img-fp">
                <div class="size-img">
                    <img src="/upload/merchant/food/` + respone[i].img_food + `" alt="` + respone[i].name_food + `">
                </div>
                <div class="info-food">
                    <div class="name-food">
                        <p id="day-` + respone[i].id + `">` + respone[i].name_food + `</p>
                    </div>
                    <div class="content-food">
                        <p>` + respone[i].description + `</p>
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
                    <span class="no_sale">` + new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(sale_code) + `</span>
                    <span class="sale " id="sale-day-` + respone[i].id + `">` + new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(respone[i].price_food) + `</span>
                </div>
                <button class="btn_add_item" onclick="return orderBuyDay(` + respone[i].id + `);"><img src="../img/add_item.svg" alt=""></button>
            </div>
            <div class="detail-img-fb">
                <div class="detail-img-fb-title">
                    <p>Chi tiết món ăn</p>
                </div>
                <div class="detail-img-fb-content">
                    <div class="dish">
                        <span>` + respone[i].description + `</span>
                    </div>
                </div>
                <div class="number-order-ok">
                        <div class="num-order">
                            <button type="button" onclick="sub(this )">
                                <div class="img-sub"></div>
                            </button>
                            <span class="numOr" id="number-day-2">1</span>
                            <button type="button" onclick="add(this )">
                                <div class="img-add"></div>
                            </button>
                        </div>
                        <button onclick="return orderManyBuyDay(this,2);" class="btn_ok">
                        OK + ` + new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(respone[i].price_food) + `
                            </button>
                    </div>
                </div>

            </div>
        </div>
            `;
            $('.food-permanent').html(render);
        }
    } else {
        $('.food-permanent').html(respone.ms);

    }
})