// alert()
function clickToLogin() {
    let check = confirm(' bạn cần phải đăng nhập để bình luận ');
    if (check == true) {
        window.location = '/customer-login';
    }
}