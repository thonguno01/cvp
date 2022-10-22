<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//register-customer
$route['customer-register'] = 'views/customer/user/HomeController/register';
$route['customer-authentic'] = 'views/customer/user/HomeController/authentic';
$route['customer-authentic-resend'] = 'handles/customer/user/HomeController/reSendMail';
$route['customer-register/save-customer'] = 'handles/customer/user/HomeController/saveCustomer';
$route['customer-register/checkMail'] = 'handles/customer/user/HomeController/checkMail';
$route['customer-register-error'] = 'handles/customer/user/HomeController/customerError';
$route['verify-register-a(:any)-id-c(:num).html'] = 'handles/customer/user/HomeController/authResgister/$1/$2';
// Lấy lại mật khẩu 
$route['customer-forgot-password'] = 'views/customer/user/HomeController/forgotPassword';
$route['customer-forgot-password/checkMail'] = 'handles/customer/user/HomeController/checkMailForgot';
$route['customer-forgot-password/sendOtp'] = 'handles/customer/user/HomeController/sendOtp';
$route['customer-change-password-(:any)-id-(:num).html'] = 'handles/customer/user/HomeController/changePass/$1/$2';
$route['customer-change-password/checkOtp'] = 'handles/customer/user/HomeController/checkOtp';
$route['customer-change-password/resendOtp'] = 'handles/customer/user/HomeController/reSendOtp';
// thay đổi thành công  
$route['customer-change-password-success'] = 'handles/customer/user/HomeController/changeSucess';
// ==================
// đăng nhập 
$route['customer-login'] = 'views/customer/user/HomeController/login';
$route['customer-login-success'] = 'handles/customer/user/HomeController/loginSuccess';
// Cập nhật tài khoản 
$route['customer-information'] = 'views/customer/user/HomeController/information';
$route['customer-information-update'] = 'handles/customer/user/HomeController/updateInfoCustomer';
$route['delete-image-information'] = 'handles/customer/user/HomeController/deleteImg';
//Quản lí chung
$route['customer-home'] = 'views/customer/home/IndexController/quanLiChung';
$route['detail-merchant-m(:num)'] = 'views/customer/home/indexController/detailMerchant/$1';
$route['quan-an'] = 'handles/customer/home/QuanLyChungController/searchLocation';
$route['mon-an'] = 'handles/customer/home/QuanLyChungController/searchDish';
// địa chỉ nhận hàng 
$route['address-receive'] = 'views/customer/home/AddressRecieveController/listAddress';
$route['add-address-receive'] = 'handles/customer/home/AddressRecieveController/addAdress';
$route['delete-address-receive'] = 'handles/customer/home/AddressRecieveController/deleteAdress';
$route['get-address-receive'] = 'handles/customer/home/AddressRecieveController/getAddress';
$route['update-address-receive'] = 'handles/customer/home/AddressRecieveController/updateAddress';
// mechant-like
$route['save-merchant'] = 'views/customer/home/MechantLikeController/pageSaveMerchant';
$route['action-mechant-like'] = 'handles/customer/home/MechantLikeController/actionLike';
$route['favourite-merchant'] = 'handles/customer/home/MechantLikeController/actionFavourite';
// đặt hàng 
$route['order-session'] = 'handles/customer/home/OrderController/saveSession';
$route['order-many-session'] = 'handles/customer/home/OrderController/saveManySession';
$route['order-session-combo'] = 'handles/customer/home/OrderController/saveSessionCombo';
$route['order-session-many-combo'] = 'handles/customer/home/OrderController/saveSessionManyCombo';
$route['order/pop-order'] = 'handles/customer/home/OrderController/subFood';
$route['order/add-order'] = 'handles/customer/home/OrderController/addFood';
$route['cacular-dish'] = 'handles/customer/home/OrderController/cacularDish';
$route['order-foods'] = 'handles/customer/home/OrderController/orderFoods';
$route['order-success'] = 'handles/customer/home/OrderController/orderSucess';
$route['delete-session-cart-buy'] = 'handles/customer/home/OrderController/delSession';
//  Lịch sử đơn hàng 
$route['history-order'] = 'views/customer/home/HistoryOrderController/historyOrder';
$route['see-detail-dish-history'] = 'handles/customer/home/HistoryOrderController/ppSeeDetail';
$route['cancel-ordered-history'] = 'handles/customer/home/HistoryOrderController/cancelOrder';
$route['save-feedback-history'] = 'handles/customer/home/HistoryOrderController/saveFeedBack';
$route['like-merchant-feedback-history'] = 'handles/customer/home/HistoryOrderController/likeMerchant';
$route['history-order-search'] = 'handles/customer/home/HistoryOrderController/historySearch';
// $route['save-feedback-history'] = 'handles/customer/home/HistoryOrderController/saveFeedBack';

// Thông báo 
$route['customer-notify'] = 'views/customer/home/NotificationController/notify';
$route['notification-seen'] = 'handles/customer/home/NotificationController/seended';
$route['notification-seen-all'] = 'handles/customer/home/NotificationController/seenAll';

// Bài viết 
$route['customer-post-p(:num)'] = 'views/customer/home/PostController/post/$1';
$route['customer-send-comment'] = 'handles/customer/home/PostController/sendComment';
$route['customer-send-reply-comment'] = 'handles/customer/home/PostController/sendCommentReply';
$route['get-infomation-customer-post'] = 'handles/customer/home/PostController/getInfoReply';
$route['customer-like-post'] = 'handles/customer/home/PostController/likePost';
$route['save-report-post'] = 'handles/customer/home/PostController/reportPost';

// Page Đánh giá
$route['customer-feedback-f(:num)'] = 'views/customer/home/FeedbackController/feedback/$1';
$route['get-image-all-feedback'] = 'handles/customer/home/FeedbackController/getAll';
$route['get-feedback-customer'] = 'handles/customer/home/FeedbackController/feedBackAjax';
//logout
$route['customer-logout'] = 'handles/customer/user/HomeController/logout';








// ================================ MERCHANT =================================
$route['merchant-login'] = 'views/merchant/home/HomeController/login_merchant';
$route['merchant-login-success'] = 'handles/merchant/user/HomeController/loginSuccess';
//register-merchant
$route['merchant-register'] = 'views/merchant/home/HomeController/register_merchant';
$route['merchant-register/save-merchant'] = 'handles/merchant/user/HomeController/saveMerchant';
$route['merchant-register/checkMail'] = 'handles/merchant/user/HomeController/checkMail';
// $route['verify-register-(:any)-id-(:num).html'] = 'handles/merchant/user/HomeController/authResgister/$1/$2';


//đăng ký lỗi
$route['merchant-register/merchant-error'] = 'handles/merchant/user/HomeController/merchant_error';

//xác thực email
$route['email-authentic'] = 'views/merchant/home/HomeController/email_authentic';
$route['merchant-authentic-resend'] = 'handles/merchant/user/HomeController/reSendMail';
$route['verify-register-merchant-b(:any)-id-m(:num).html'] = 'handles/merchant/user/HomeController/authResgisterMer/$1/$2';

// Quên mật khẩu
$route['merchant-forgot-password'] = 'views/merchant/home/HomeController/forgotPassword';
$route['merchant-forgot-password/checkMail'] = 'handles/merchant/user/HomeController/checkMailForgot';
$route['merchant-forgot-password/sendOtp'] = 'handles/merchant/user/HomeController/sendOtp';
$route['merchant-change-password-(:any)-id-(:num).html'] = 'handles/merchant/user/HomeController/changePass/$1/$2';
$route['merchant-change-password/checkOtp'] = 'handles/merchant/user/HomeController/checkOtp';
$route['merchant-change-password/resendOtp'] = 'handles/merchant/user/HomeController/reSendOtp';
// thay đổi thành công  
$route['merchant-change-password-success'] = 'handles/merchant/user/HomeController/changeSucess';

//Show city / district
$route['showCity'] = 'handles/merchant/user/DataShow/showCity';


//tạo món ăn
$route['register-food'] = 'views/merchant/home/HomeController/register_food';
$route['register-food/register-profile'] = 'handles/merchant/user/HomeController/register_profile';
$route['register-food/register-profile/upload'] = 'handles/merchant/user/HomeController/register_profile_upload';
$route['register-food/register-detail'] = 'handles/merchant/user/HomeController/register_detail';
$route['register-food/combo'] = 'handles/merchant/user/HomeController/register_combo';
$route['register-food/group'] = 'handles/merchant/user/HomeController/register_group';
$route['save-infor-merchant'] = 'handles/merchant/user/HomeController/save_infor_merchant';


// TRANG CHỦ TRƯỚC LOGIN
$route['merchant'] = 'views/merchant/home/HomeController/trang_chu_truoc_login';
$route['merchant/chi-tiet-(:any)-(:num)'] = 'views/merchant/home/HomeController/merchant_chi_tiet_tin/$1/$2';

// TRANG CHỦ
$route['merchant-home'] = 'views/merchant/home/HomeController/trang_chu';
$route['chi-tiet-(:any)-(:num)'] = 'views/merchant/home/HomeController/chi_tiet_tin/$1/$2';



//thống kê page
$route['thong-ke'] = 'views/merchant/home/HomeController/thong_ke';



//quản lý hồ sơ quán ăn
$route['ho-so-quan-an'] = 'views/merchant/home/HomeController/quan_ly_ho_so';
$route['ho-so-quan-an/post'] = 'handles/merchant/user/AfterLogin/post';

//Sửa món ăn
$route['ho-so-quan-an/edit-group'] = 'handles/merchant/user/AfterLogin/edit_group';
$route['ho-so-quan-an/edit-combo'] = 'handles/merchant/user/AfterLogin/edit_combo';
$route['ho-so-quan-an/edit-food'] = 'handles/merchant/user/AfterLogin/edit_food';

//Xóa món ăn
$route['ho-so-quan-an/delete-combo'] = 'handles/merchant/user/AfterLogin/delete_combo';
$route['ho-so-quan-an/delete-group'] = 'handles/merchant/user/AfterLogin/delete_group';
$route['ho-so-quan-an/delete-day'] = 'handles/merchant/user/AfterLogin/delete_day';
$route['ho-so-quan-an/delete-detail'] = 'handles/merchant/user/AfterLogin/delete_detail';

//update thông tin chi tiết quán ăn
$route['update-detail-merchant'] = 'handles/merchant/user/AfterLogin/update_detail_merchant';
$route['update-detail-merchant-2'] = 'handles/merchant/user/AfterLogin/update_detail_merchant_2';
$route['update-detail-merchant-2/upload'] = 'handles/merchant/user/AfterLogin/update_detail_merchant_2_upload';


// page đơn hàng hôm nay  

$route['don-hang-hom-nay'] = 'views/merchant/home/HomeController/don_hang_hom_nay';
$route['don-hang-hom-nay/add-shipper'] = 'handles/merchant/user/AfterLogin/add_shipper';
$route['don-hang-hom-nay/khong-thanh-cong'] = 'handles/merchant/user/AfterLogin/khong_thanh_cong';
$route['don-hang-hom-nay/thanh-cong'] = 'handles/merchant/user/AfterLogin/thanh_cong';
$route['don-hang-hom-nay/huy-don'] = 'handles/merchant/user/AfterLogin/huy_don';
$route['don-hang-hom-nay/xac-nhan-don-hang'] = 'handles/merchant/user/AfterLogin/xac_nhan_don_hang';

//page lịch sử đơn hàng

$route['lich-su-don-hang'] = 'views/merchant/home/HomeController/lich_su_don_hang';
$route['lich-su-don-hang/search'] = 'handles/merchant/user/AfterLogin/search_lich_su_don_hang';

// LOGOUT
$route['logout'] = 'handles/merchant/user/HomeController/logout';

// UPDATE STATUS NOTIFI
$route['update-status'] = 'handles/merchant/user/HomeController/update_status';
$route['update-status-all'] = 'handles/merchant/user/HomeController/update_status_all';


//TEST
$route['test'] = 'views/merchant/home/HomeController/test';









// ================================ADMIN=================================

//TRANG CHỦ
$route['admin'] = 'views/admin/HomeController/admin_login';
$route['admin-index'] = 'views/admin/HomeController/admin_index';

//Administrators
$route['administrators'] = 'views/admin/HomeController/administrators';
$route['update-auth-admin'] = 'handles/admin/HomeController/update_auth_admin';
//Thêm quản trị
$route['administrators_add'] = 'views/admin/HomeController/administrators_add';
$route['check-email-admin'] = 'handles/admin/HomeController/check_email_admin';
$route['administrators-add/php'] = 'handles/admin/HomeController/administrators_add_php';
//Edit quản trị
$route['administrators-edit-(:num)'] = 'views/admin/HomeController/administrators_edit/$1';
$route['administrators-edit/php'] = 'handles/admin/HomeController/administrators_edit_php';

// Login
$route['login-admin'] = 'handles/admin/HomeController/login_admin';
//Danh sách merchant
$route['admin-list-merchant'] = 'views/admin/HomeController/list_merchant';
$route['xuat-excel-merchant'] = 'handles/admin/HomeController/xuat_excel_merchant';
//Thêm quán ăn 
$route['admin-them-quan-an'] = 'views/admin/HomeController/them_quan_an';



// ---------------------------Admin khach hang-----------------------
$route['admin-list-customer'] = 'views/admin/HomeController/listCustomer';
$route['admin-add-customer'] = 'views/admin/HomeController/addCustomer';
$route['admin-edit-customer-(:num)'] = 'views/admin/HomeController/editCustomer/$1';
$route['admin-list-order'] = 'views/admin/HomeController/listOrder';
$route['admin-list-user-order'] = 'views/admin/HomeController/listPersonOrder';
$route['admin-new-customer'] = 'handles/admin/HomeController/addCustomerNew';
$route['admin-edit-customer'] = 'handles/admin/HomeController/editCus';
$route['admin-search-user-order'] = 'handles/admin/HomeController/searchPersons';
$route['xuat-excel-order'] = 'handles/admin/HomeController/orderExel';
$route['xuat-excel-user-order'] = 'handles/admin/HomeController/userOrderExel';
$route['xuat-excel-customer'] = 'handles/admin/HomeController/customerExel';

$route['admin-check-email'] = 'handles/admin/HomeController/admin_check_email';
$route['admin-them-merchant-done'] = 'handles/admin/HomeController/admin_them_merchant_done';
//Sửa quán ăn
$route['admin-edit-merchant-(:num)'] = 'views/admin/HomeController/edit_merchant/$1';
$route['admin-edit-merchant-done'] = 'handles/admin/HomeController/admin_edit_merchant_done';

//Danh sách khách khàng đăng ký lỗi
$route['list-customer-error'] = 'views/admin/HomeController/list_customer_error';
$route['register-for-errorer-(:num)'] = 'views/admin/HomeController/register_for_errorer/$1';
$route['register-for-errorer-controller'] = 'handles/admin/HomeController/register_for_errorer_controller';

//Danh sách quán ăn đăng ký lỗi
$route['list-merchant-error'] = 'views/admin/HomeController/list_merchant_error';
$route['register-for-merchant-(:num)'] = 'views/admin/HomeController/register_for_merchant/$1';
$route['register-for-errorer-controller-2'] = 'handles/admin/HomeController/register_for_errorer_controller_2';

//Danh sách bài đăng của quán ăn 
$route['post-merchant'] = 'views/admin/HomeController/post_merchant';
$route['check-censorship'] = 'handles/admin/HomeController/check_censorship';

//Danh sách bài đăng của Sale
$route['admin-post'] = 'views/admin/HomeController/admin_post';
$route['check-censorship-admin'] = 'handles/admin/HomeController/check_censorship_admin';
//Thêm bài viết cho sale
$route['add-post-sale'] = 'views/admin/HomeController/add_post_sale';
$route['add-post-sale/php'] = 'handles/admin/HomeController/add_post_sale';
//Sửa bài viết cho sale
$route['edit-post-sale-(:num)'] = 'views/admin/HomeController/edit_post_sale/$1';
$route['edit-post-sale/php'] = 'handles/admin/HomeController/edit_post_sale';
// voucher cho sale
$route['voucher-sale'] = 'views/admin/HomeController/voucherSale';
$route['voucher-sale-add'] = 'views/admin/HomeController/addVoucherSale';
$route['voucher-sale-addNew'] = 'handles/admin/HomeController/addVoucherSale';


// LOGOUT ADMIN
$route['logout-admin'] = 'handles/admin/HomeController/logout_admin';

//voucher merchant
$route['voucher-merchant'] = 'views/admin/HomeController/voucher_merchant';
$route['voucher-merchant-add'] = 'views/admin/HomeController/voucher_merchant_add';
