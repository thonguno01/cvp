function like(idMechant) {
    let data_json = {
        idMechant: idMechant,
    }
    let likeMechant = callAjax('/action-mechant-like', 'post', data_json);
    if (likeMechant.result == 'add') {
        alert(likeMechant.mesage);
        $('#like-' + idMechant).css('background', '#E63950');
        $('#like-pro-' + idMechant).css('background', '#E63950');
    } else if (likeMechant.result == 'del') {
        alert(likeMechant.mesage);
        $('#like-' + idMechant).css('background', '#F1F1F1');
        $('#like-pro-' + idMechant).css('background', '#F1F1F1');
    } else {
        alert(likeMechant.mesage);
    }
}

function favouriteMerchant(e, idMerchant) {
    let data_json = {
        idMer: idMerchant
    }
    let checkAjax = callAjax('favourite-merchant', 'post', data_json);
    if (checkAjax.result == 'add') {
        // alert(checkAjax.mesage);
        $(e).css('background', '#E63950');
        // $('#like-pro-' + idMechant).css('background', '#E63950');
    } else if (checkAjax.result == 'del') {
        // alert(checkAjax.mesage);
        $(e).css('background', '#C4C4C4');
        // $('#like-pro-' + idMechant).css('background', '#F1F1F1');
    } else {
        alert(checkAjax.mesage);
    }
}

function popupLogin() {
    $('.popup_login').addClass('d-block')
}

function search_merchant_city(e) {
    let id_city = $(e).val();
    let merchant = callAjax('handles/customer/home/QuanLyChungController/searchMerchantCity', 'post', { id_city: id_city })
    console.log(merchant);
}