// alert('sad');
// đã hoàn tất 
var width = screen.width
    //mo ppup xem chi tiet
$('.td-see-detail').click(function() {
    $('.popup-detail').addClass('d-block');
    $('.btn_verify').css({ "width": "100%" });
    $('.change-add').addClass('d-none');
    if (width <= 481) {
        $('.note-popup').css({
            'position': 'absolute',
            'left': '0',
            'bottom': '-40px',
        });
        $('.btn_submit').css({
            'bottom': '-75px',
        });
    }
});
$('.icon-close-popup').click(function() {
    $('.popup-detail').removeClass('d-block');
});
// ============================================

function confirm() {
    $('.popup-detail').removeClass('d-block');
}
$('.done-feedback').click(function() {
    $('.popup-assess').addClass('d-block');
});
$('.cancle').click(function() {
    $('.popup-assess').removeClass('d-block');

});
$('.pp-add-address').click(function() {
    $('#add-address').addClass('d-block');
    $('.popup-chage-address').removeClass('d-block');

});
window.onclick = function(e) {
    let modal = document.querySelector(".popup-assess");
    if (e.target == modal) {
        $('.popup-assess').removeClass('d-block');
    }
}


// đã hủy
$(document).ready(function() {
    $('.td-see-detail').click(function() {
        $('.popup-detail').addClass('d-block');
    });
    $('.icon-close-popup').click(function() {
        $('.popup-detail').removeClass('d-block');
    });
    $('.btn_verify').click(function() {
        $('.popup-detail').removeClass('d-block');
    });
    $('.change-add').click(function() {
        $('.popup-chage-address').addClass('d-block');
        $('.popup-detail').removeClass('d-block');
    });
    $('.close-pp-chage-address').click(function() {
        $('.popup-chage-address').removeClass('d-block');
    });
    $('.close-pp-chage-address').click(function() {
        $('.popup-chage-address').removeClass('d-block');
    });
});