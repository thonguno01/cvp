var width = screen.width;
$('.td-see-detail').click(function() {
    $('.popup-detail').addClass('d-block');
    $('.btn_submit .pp_cancle').css('display', 'none');
    $('.btn_verify').css({ "width": "100%" });
    if (width <= 481) {
        $('.why-destroy').css({ "bottom": "-96px" });
        $('.body').addClass('d-none');

        $('.note-popup').css({
            'position': 'absolute',
            'left': '0',
            'bottom': '-40px',
        });
        $('.btn_submit').css({
            'bottom': '-145px',
        });
    }
});
$('.icon-close-popup').click(function() {
    $('.popup-detail').removeClass('d-block');
});
// NÚT MỞ PP THAY ĐỔI ĐỊA CHỈ
$('.change-add').click(function() {
    $('.popup-chage-address').addClass('d-block');
    $('.popup-detail').removeClass('d-block');

});
$('.pp-add-address>span').click(function() {
    $('#add-address').addClass('d-block');
    $('.popup-chage-address').removeClass('d-block');
    if (width <= 480) {

        $('.content').addClass('d-none');
    } else {
        $('.content').removeClass('d-none');

    }
});
$('.btn_verify').click(function() {
    $('.popup-detail').removeClass('d-block');
    if (width <= 480) {
        window.location = '../home/history-order-destroy.html';
    }
});
//lay dia chi

function changeAdd(id) {
    // alert(id)
    let text = $(".get_add_" + id).text();
    $('#dia-chi-nguoi-nhan').html(text);
    $('.popup-chage-address').removeClass('d-block');
    $('.popup-detail').css('display', 'block');
}
// Tạo mới địa chỉ tronglịch sủ hủy hàng
$('.cancle').click(function() {
    $('#add-address').removeClass('d-block');
    if (width <= 480) {
        window.location = '../home/history-order-destroy.html';
    }
});
$('.save-address').click(function() {
    $('#add-address').removeClass('d-block');
    if (width <= 480) {
        window.location = '../home/history-order-destroy.html';
    }
});