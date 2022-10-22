const width = screen.width;

function filter_history_order() {
    var status = document.getElementById("status_fil").value;
    var ngay_bd = $("input#ngay_bd").val();
    var ngay_kt = $("input#ngay_kt").val();
    let text = '';
    $.ajax({
        url: "lich-su-don-hang/search",
        type: 'POST',
        dataType: "json",
        data: {
            status: status,
            ngay_bd: ngay_bd,
            ngay_kt: ngay_kt,
        },
        beforeSend: function() {
            $(".row_3").html("<span style= 'color: green;'>Đang tải...</span>");
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
                var text1 = '';
                for (let i = 0; i < (data[0]).length; i++) {
                    var code = data[0][i].code;
                    var created_at = data[0][i].created_at;

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
                        <td class="font">` + new Intl.NumberFormat().format(total_after) + `đ</td>
                        <td class="font dis">` + new Intl.NumberFormat().format(sale) + `Đ</td>
                        ` + statusText + `
                        <td>
                        <span class="td-see-detail" onclick="return showPopup(this ,` + statusAfter + ` );">Xem chi tiết</span>
                    </td>
                    </tr>`
                    text1 += `<tr class="data_list">
                   <td class="code">` + code + `</td>
                   <td class="font">` + new Intl.NumberFormat().format(total_after) + `đ</td>
                   ` + statusText + `
                   <td>
                   <span class="td-see-detail" onclick="return showPopup(this ,` + statusAfter + ` );">Xem chi tiết</span>
               </td>
               </tr>`;
                    statusText = '';
                }
                if (width > 768) {
                    $(".row_3").html(`<table>
                            <tr class="list">
                            <th>STT</th>
                            <th>Mã đơn hàng</th>
                            <th>Thời gian</th>
                            <th>Tổng tiền</th>
                            <th>Khuyến mại</th> 
                            <th>Trạng thái </th> 
                            <th> Xem chi tiết</th>
                        </tr>
                       ` + text + `
                        </table>`);
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

        },
    });

}

    function showPopup(e, status) {
        if (width < 481) {
            $('.body').css('display', 'none');
            $('footer').css('margin-top', '800px')
        }
        let code = $(e).parent().parent().find('td.code').text();
        console.log(code)
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