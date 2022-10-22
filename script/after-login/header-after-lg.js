$(".btn_drop_down").click(function() {
    let drop_down = $('.drop-down');
    drop_down.toggleClass("d-block");
});
$(".icon-menu-header").click(function() {
    // alert('hell')
    $('.menu-option').toggleClass('d-block');
    // $('.icon-menu-header').css('background', 'url(/com_van_phong_vl123/img/xclose.svg) no-repeat');
});

function seenAllHeader() {
    let seeAll = callAjax('notification-seen-all', 'post', '');
    if (seeAll == true) {
        window.location = window.location.pathname;
    }
}