$(document).ready(function() {
    $('.more').click(function() {
        $('.report').addClass('d-block');
    });
});

$('.cancle').click(function() {
    $('#report').removeClass('d-block');
});

function seenAll() {
    let seeAll = callAjax('notification-seen-all', 'post', '');
    if (seeAll == true) {
        $('.notice-new').css('display', 'none');
    }
}

function seended(e) {
    let code = $(e).find('.code').text();
    let seen = callAjax('notification-seen', 'post', { code: code });
    if (seen == true) {
        $(e).find(".notice-new").removeClass('notice-new');
    }
}

function cancelOr(e) {
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
        // console.log(dataJson);
        let cancleOrder = callAjax('cancel-ordered-history', 'post', dataJson);
        window.location = window.location.pathname;
    });
}


function seeDetail(e, status) {
    let code = $(e).parent().parent().parent().find('.code').text();
    let data = {
        code: code
    };
    let seeDetails = callAjax('see-detail-dish-history', 'post', data)
    var renderInfoOrder = popupRenderAjax(seeDetails);
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
        $('.btn_verify').remove();
        $('.pp_cancle').css('width', '100%');
    } else if (status == 1) {
        let shipper = `<div class="contactShip">
        <p>
        Liên hệ shipper: ` + seeDetails.phoneShipper + ` </span>
        </p>
        </div>`
        let renderSeedetail = renderAddressInPopup(seeDetails, distrisct, city, shipper) + renderInfoOrder + `</div></div>`;
        $('.popup-detail').addClass('d-block');
        $('.popup-detail').html(renderSeedetail);
        $('.pp_cancle').remove();
        $('.btn_verify').css('width', '100%');
        $('.btn_verify').click(() => {
            $('.popup-detail').removeClass('d-block');
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
                    Khoảng cách: <span> 2.4 km</span>
                </p>
            </div>` + shipper + `
        </div>
        `
    return render;
}

function closePopup() {
    $('.popup-detail').removeClass('d-block');
}