var width = screen.width

$('.icon-close-popup').click(function() {
    $('.popup-detail').removeClass('d-block');
});

$(document).ready(function() {
    $('.add-address>span').click(function() {
        $('.editAddress').attr('disabled', 'disabled');
        $('.editAddress').addClass('d-none');
        $('#add-address').addClass('d-block');
        if (width <= 481) {
            $('.body').addClass('d-none');
        }
    });
    $('.icon-close-popup').click(function() {
        $('#add-address').removeClass('d-block');
        window.location = 'address-receive';
    });
    $('.cancle').click(function() {
        $('#add-address').removeClass('d-block');
        if (width <= 481) {
            window.location = '../home/address-recieve.html'
        }
    });
    // window.onclick = function(e) {
    //     let modal = document.querySelector("#add-address");
    //     if (e.target == modal) {
    //         $('#add-address').removeClass('d-block');

    //     }
    // }
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
                window.location = 'address-receive';
                $('#address').val('');
                $('#name').val('');
                $('#phone').val('');
            }
        }
    });
});

function deleteAddress(id) {
    let data_json = {
        id: id,
    }
    let deleteAddress = callAjax('delete-address-receive', 'post', data_json);
    if (deleteAddress.result == 'true') {
        alert(deleteAddress.message);
        window.location = deleteAddress.link;
    } else {
        alert(deleteAddress.message);

    }
}

function editAddress(id) {
    $('#add-address').addClass('d-block');
    $('.save-address').attr('disabled', 'disabled');
    $('.save-address').addClass('d-none');
    if (width <= 481) {
        $('.body').addClass('d-none');
    }
    $('.title-add-address>p').text('Chỉnh sửa địa chỉ nhận hàng ');
    $('#save-address').text('Chỉnh sửa ');
    $('#save-address').addClass('editAddress');
    let data_json = {
        id: id,
    }
    let getAddress = callAjax('get-address-receive', 'post', data_json);
    if (getAddress != null) {
        $('#fullname').val(getAddress.name);
        $('#phone').val(getAddress.phone);
        $('#address').val(getAddress.address);
        $('.editAddress').click(() => {
            let name = $('#fullname').val();
            let phone = $('#phone').val();
            let address = $('#address').val();
            let data = {
                name: name,
                phone: phone,
                address: address,
                idData: id,
            }
            let updateAddress = callAjax('update-address-receive', 'post', data);

            if (updateAddress.result == 'true') {
                window.location = updateAddress.link;
                alert(updateAddress.message);
            } else {
                alert(updateAddress.message);
            }
        })
    }
}