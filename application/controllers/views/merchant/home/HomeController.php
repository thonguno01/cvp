<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HomeController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('Globals');
        $this->load->model('Generals_model');
        $this->load->model('Customer_model');
        $this->load->helper('General_helper');
        $this->load->helper('feedback');
        $this->load->helper('cookie');
        $this->load->library('pagination');
        // $this->load->helper('function'); 
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    }
    // public function test()
    // {
    //     $data = [
    //         'header' => 'merchant/include/header_merchant',
    //         'footer' => 'footer',
    //         'page_name' => 'merchant/home/test',
    //         'style' => ['/css/register.css', '/css/footer.css', '/css/responsive/responsive_register_customer.css'],
    //         'js' => ['/script/function/function.js', '/script/register_merchant.js'],
    //     ];
    //     $this->load->view('index', $data);
    // }
    public function register_merchant()
    {
        $data = [
            'header' => 'merchant/include/header_merchant',
            'footer' => 'footer',
            'page_name' => 'merchant/home/register-merchant',
            'style' => ['/css/header.css', '/css/register.css', '/css/footer.css', '/css/responsive/responsive_register_customer.css'],
            'js' => ['/script/function/function.js', '/script/register_merchant.js'],
        ];
        $this->load->view('index', $data);
    }
    public function login_merchant()
    {
        $data = [
            'header' => 'merchant/include/header_merchant',
            'footer' => 'footer',
            'page_name' => 'merchant/home/login_merchant',
            'style' => ['/css/login.css',  '/css/footer.css', '/css/header.css',],
            'js' => ['/script/function/function.js', '/script/login_merchant.js'],
        ];
        $this->load->view('index', $data);
    }
    public function forgotPassword()
    {
        $data = [
            'header' => 'merchant/include/header_merchant',
            'footer' => 'footer',
            'page_name' => 'merchant/home/forgot-password',
            'style' => ['/css/header.css', '/css/forgot-password.css', '/css/banner.css',  '/css/footer.css'],
            'js' => ['/script/function/function.js', '/script/forgot-password-merchant.js'],
        ];
        $this->load->view('index', $data);
    }
    public function email_authentic()
    {

        $email = $this->session->userdata('email_mer');
        $check_ath = $this->Generals_model->get_one_where('merchant', ['email' => $email]);
        $data_mer = $this->Generals_model->get_where('merchant', ['email' => $email]);
        $data_header = $this->Generals_model->notifi('notification', ['merchant_id' => $check_ath->id]);
        $data = [
            'check_ath' => $check_ath,
            'list' => $data_mer,
            'data_header' => $data_header,
            'header' => 'merchant/include/header_merchant_login',
            'footer' => 'footer',
            'page_name' => 'merchant/home/authentic_acc_merchant',
            'style' => ['/css/forgot-password.css',  '/css/footer.css',  '/css/responsive/responsive_forgot_pass.css',  '/css/reset.css',  '/css/header_merchant_login.css'],
            'js' => ['/script/function/function.js', '/script/authentic_acc_merchant.js'],
        ];
        $this->load->view('index', $data);
    }
    public function register_food()
    {
        $email = $this->session->userdata('email_mer');
        $data_mer = $this->Generals_model->get_where('merchant', ['email' => $email]);
        $city = $this->Generals_model->get_city('city2');
        $check_ath = $this->Generals_model->get_one_where('merchant', ['email' => $email]);

        //
        $data_header = $this->Generals_model->notifi('notification', ['merchant_id' => $check_ath->id]);
        //

        if ($email == NULL) {
            return redirect('/merchant-login');
        } elseif ($check_ath->authentic == '0') {
            return redirect('/email-authentic');
        } elseif ($check_ath->authentic_food == '1') {
            echo '<script language="javascript"> history.back()</script>';
        } else {
            $data = [
                'data_header' => $data_header,
                'notifi_mer' => notification_mer(),
                'list' => $data_mer,
                'city' => $city,
                'check_ath' => $check_ath,
                'day' => day(),
                'hour' => hour(),
                'culinary' => culinary(),
                'typeMerchant' => typeMerchant(),
                'header' => 'merchant/include/header_merchant_login',
                'footer' => 'footer',
                'page_name' => 'merchant/home/register_profile_merchant',
                'style' => ['/css/header.css', '/css/cdn_css/cdn_select2.css',  '/css/footer.css',  '/css/header_merchant_login.css',  '/css/reset.css',  '/css/register_profile_merchant.css'],
                'js' => ['/script/function/function.js', '/script/register.js', '/script/lib/jquery.min.js', '/script/lib/jquery.form.js', '/script/register_profile_merchant.js', '/script/lib/select2.min.js', '/script/showCity.js', '/script/domData_register_food.js'],
            ];
            $this->load->view('index', $data);
        }
    }
    public function trang_chu_truoc_login()
    {
        $data_index = $this->Generals_model->get_list_index('posts_index_merchant', ['censorship' => 1]);

        $data = [
            'notifi_mer' => notification_mer(),
            'data_index' => $data_index,
            'header' => 'merchant/include/header_merchant',
            'footer' => 'footer',
            'page_name' => 'merchant/home/index_merchant',
            'style' => ['/css/footer.css',  '/css/header_merchant.css',  '/css/banner_merchant.css',  '/css/index_merchant.css',  '/css/huongdan_dishhost.css'],
            'js' => ['/script/function/function.js', '/script/lib/jquery.min.js'],
        ];
        $this->load->view('index', $data);
    }
    public function merchant_chi_tiet_tin($title, $id)
    {
        $data_index = $this->Generals_model->get_list_index('posts_index_merchant', ['censorship' => 1]);
        $detail_post = $this->Generals_model->get_one_where('posts_index_merchant', ['id' => $id]);

        $data = [
            'notifi_mer' => notification_mer(),
            'data_index' => $data_index,
            'detail_post' => $detail_post,
            'header' => 'merchant/include/header_merchant',
            'footer' => 'footer',
            'page_name' => 'merchant/home/chi_tiet_bai_viet_merchant',
            'style' => ['/css/footer.css',  '/css/header_merchant.css',  '/css/banner_merchant.css',  '/css/chi_tiet_bai_viet_merchant.css'],
            'js' => ['/script/function/function.js', '/script/lib/jquery.min.js'],
        ];
        $this->load->view('index', $data);
    }
    public function trang_chu()
    {
        $email = $this->session->userdata('email_mer');

        $data_mer = $this->Generals_model->get_where('merchant', ['email' => $email]);
        $check_ath = $this->Generals_model->get_one_where('merchant', ['email' => $email]);
        $data_index = $this->Generals_model->get_list_index('posts_index_merchant', ['censorship' => 1]);
        //
        $data_header = $this->Generals_model->notifi('notification', ['merchant_id' => $check_ath->id]);
        //

        if ($email == NULL) {
            return redirect('/merchant-login');
        } elseif ($check_ath->authentic == '0') {
            return redirect('/email-authentic');
        } else {
            $data = [
                'data_header' => $data_header,
                'notifi_mer' => notification_mer(),
                'data_index' => $data_index,
                'list' => $data_mer,
                'check_ath' => $check_ath,
                'header' => 'merchant/include/header_merchant_login',
                'footer' => 'footer',
                'page_name' => 'merchant/home/index_merchant_login',
                'style' => ['/css/footer.css',  '/css/header_merchant_login.css',  '/css/banner_merchant.css',  '/css/index_merchant.css',  '/css/huongdan_dishhost.css'],
                'js' => ['/script/function/function.js', '/script/lib/jquery.min.js'],
            ];
            $this->load->view('index', $data);
        }
    }
    public function chi_tiet_tin($title, $id)
    {
        $email = $this->session->userdata('email_mer');

        $data_mer = $this->Generals_model->get_where('merchant', ['email' => $email]);
        $check_ath = $this->Generals_model->get_one_where('merchant', ['email' => $email]);
        $data_index = $this->Generals_model->get_list_index('posts_index_merchant', ['censorship' => 1]);
        $detail_post = $this->Generals_model->get_one_where('posts_index_merchant', ['id' => $id]);
        //
        $data_header = $this->Generals_model->notifi('notification', ['merchant_id' => $check_ath->id]);
        //

        if ($email == NULL) {
            return redirect('/merchant-login');
        } elseif ($check_ath->authentic == '0') {
            return redirect('/email-authentic');
        } else {
            $data = [
                'data_header' => $data_header,
                'notifi_mer' => notification_mer(),
                'data_index' => $data_index,
                'detail_post' => $detail_post,
                'list' => $data_mer,
                'check_ath' => $check_ath,
                'header' => 'merchant/include/header_merchant_login',
                'footer' => 'footer',
                'page_name' => 'merchant/home/chi_tiet_bai_viet_merchant_login',
                'style' => ['/css/footer.css',  '/css/header_merchant_login.css',  '/css/banner_merchant.css',  '/css/chi_tiet_bai_viet_merchant.css'],
                'js' => ['/script/function/function.js', '/script/lib/jquery.min.js'],
            ];
            $this->load->view('index', $data);
        }
    }
    public function thong_ke()
    {
        $email = $this->session->userdata('email_mer');
        $data_mer = $this->Generals_model->get_where('merchant', ['email' => $email]);
        $check_ath = $this->Generals_model->get_one_where('merchant', ['email' => $email]);

        $data_order = $this->Generals_model->get_list3('order_dish', [$check_ath->id]);

        //
        $data_header = $this->Generals_model->notifi('notification', ['merchant_id' => $check_ath->id]);
        //

        if ($email == NULL) {
            return redirect('/merchant-login');
        } elseif ($check_ath->authentic == '0') {
            return redirect('/email-authentic');
        } else {
            $data = [
                'data_header' => $data_header,
                'notifi_mer' => notification_mer(),
                'list' => $data_mer,
                'check_ath' => $check_ath,
                'data_order' => $data_order,
                'header' => 'merchant/include/header_merchant_login',
                'footer' => 'footer',
                'page_name' => 'merchant/home/thong-ke',
                'style' => ['/css/footer.css',  '/css/header_merchant_login.css',  '/css/reset.css',  '/css/thong-ke.css'],
                'js' => ['/script/function/function.js', '/script/thong-ke.js', '/script/lib/jquery.min.js', '/script/js_cdn/chart.min.js', '/script/js_cdn/chart_3.8.min.js'],
            ];
            $this->load->view('index', $data);
        }
    }
    public function quan_ly_ho_so()
    {
        $email = $this->session->userdata('email_mer');
        $data_mer = $this->Generals_model->get_where('merchant', ['email' => $email]);
        $check_ath = $this->Generals_model->get_one_where('merchant', ['email' => $email]);
        $data_header = $this->Generals_model->notifi('notification', ['merchant_id' => $check_ath->id]);
        //

        if ($email == NULL) {
            return redirect('/merchant-login');
        } elseif ($check_ath->authentic == '0') {
            return redirect('/email-authentic');
        } elseif ($check_ath->authentic_food == '0') {
            return redirect('/register-food');
        }
        $data_food_detail = $this->Generals_model->get_list2('detail_menu', ['merchant_id' => $check_ath->id, 'day_open' => 7]);
        $data_food_detail_day = $this->Generals_model->get_list2('detail_menu', ['merchant_id' => $check_ath->id, 'day_open !=' => 7]);
        $data_food_combo = $this->Generals_model->get_list2('combo', ['merchant_id' => $check_ath->id]);
        $data_food_group = $this->Generals_model->get_list2('group', ['merchant_id' => $check_ath->id]);
        $id = $this->input->post('id');
        $data_food_detail_2 = $this->Generals_model->get_one_where('detail_menu', ['id' => $id]);
        $city = $this->Generals_model->get_city('city2');
        $get_max = $this->Generals_model->get_max('detail_menu', 'price_food', ['merchant_id' => $check_ath->id]);
        $get_min = $this->Generals_model->get_min('detail_menu', 'price_food', ['merchant_id' => $check_ath->id]);
        $post_data = $this->Generals_model->get_list2_ORDER_BY('post', ['censorship' => 1], 'update_at');
        // ==========bai viet========== 
        // số lượt đánh giá 
        $order_dish =  $this->Generals_model->get_list2('order_dish', ['merchant_id' => $check_ath->id]);
        $star = countStar($order_dish);
        $merYeuThich = $this->Generals_model->get_list2('favourite_merchant', ['merchant_id' =>   $check_ath->id]);
        $imgAll = getImgAll($order_dish, 'img_order',  $check_ath->id);
        $outPut =  $this->Generals_model->get_list2('order_dish', ['merchant_id' => $check_ath->id, 'check_feed_back' => 1]);
        $feedBack = getFeedback2($outPut, $id, $this, lable());
        // show($feedBack);
        // die();
        $data = [
            'feedbacks' => $feedBack,
            'countStar' => $star,
            'merYeuThich' => $merYeuThich,
            'imgAlls' => $imgAll,
            'data_header' => $data_header,
            'notifi_mer' => notification_mer(),
            'check_ath' => $check_ath,
            'list' => $data_mer,
            'data_food_detail' => $data_food_detail,
            'city' => $city,
            'get_max' => $get_max,
            'get_min' => $get_min,
            'post_data' => $post_data,
            'data_food_detail_2' => $data_food_detail_2,
            'data_food_detail_day' => $data_food_detail_day,
            'data_food_combo' => $data_food_combo,
            'data_food_group' => $data_food_group,
            'day' => day(),
            'hour' => hour(),
            'gettime2' => gettime2(),
            'typeMerchant' => typeMerchant(),
            'type_food' => type_food(),
            'header' => 'merchant/include/header_merchant_login',
            'footer' => 'footer',
            'page_name' => 'merchant/home/quan_ly_ho_so_merchant',
            'style' => [
                '/css/footer.css',
                '/css/header_merchant_login.css',
                '/css/reset.css',
                '/css/cdn_css/cdn_select2.css',
                '/css/feed-back-store-merchant.css',
                '/css/quan_ly_bai_viet_merchant.css',
                '/css/popup_profile_merchant.css',
                '/css/popup_report_post.css',
            ],

            'js' => [
                '/script/function/function.js',
                // '/script/thong-ke.js',
                '/script/lib/jquery.min.js',
                '/script/quanly_hoso_merchant.js',
                '/script/register_profile_merchant.js',
                '/script/lib/select2.min.js',
                '/script/lib/jquery.form.js',
                '/script/showCity.js',
            ],
        ];
        $this->load->view('index', $data);
    }
    public function don_hang_hom_nay()
    {
        $email = $this->session->userdata('email_mer');
        $data_mer = $this->Generals_model->get_where('merchant', ['email' => $email]);
        $check_ath = $this->Generals_model->get_one_where('merchant', ['email' => $email]);

        $data_order = $this->Generals_model->get_list2('order_dish', ['merchant_id' => $check_ath->id]);

        //
        $data_header = $this->Generals_model->notifi('notification', ['merchant_id' => $check_ath->id]);
        //

        if ($email == NULL) {
            return redirect('/merchant-login');
        } elseif ($check_ath->authentic == '0') {
            return redirect('/email-authentic');
        } elseif ($check_ath->authentic_food == '0') {
            return redirect('/register-food');
        } else {
            $data = [
                'data_header' => $data_header,
                'notifi_mer' => notification_mer(),
                'check_ath' => $check_ath,
                'list' => $data_mer,
                'data_order' => $data_order,
                'header' => 'merchant/include/header_merchant_login',
                'footer' => 'footer',
                'page_name' => 'merchant/home/don_hang_hom_nay_merchant',
                'style' => ['/css/popup_don_hom_nay.css',  '/css/header_merchant_login.css',  '/css/popup_history.css',  '/css/don_hang_hom_nay_merchant.css',  '/css/popup-assess.css'],
                'js' => ['/script/function/function.js', '/script/popup_show_today_merchant.js', '/script/lib/jquery.min.js'],
            ];
            $this->load->view('index', $data);
        }
    }
    public function lich_su_don_hang()
    {
        $email = $this->session->userdata('email_mer');
        $data_mer = $this->Generals_model->get_where('merchant', ['email' => $email]);
        $check_ath = $this->Generals_model->get_one_where('merchant', ['email' => $email]);

        $data_order = $this->Generals_model->get_where('order_dish', ['merchant_id' => $check_ath->id]);

        //
        $data_header = $this->Generals_model->notifi('notification', ['merchant_id' => $check_ath->id]);
        //

        //phân trang
        if (!$this->input->get('page') || $this->input->get('page') < 0) {
            $page = 1;
        } else {
            $page = $this->input->get('page');
        }
        $url = 'lich-su-don-hang'; //lấy địa url của trang
        $total_rows = count($data_order);
        // var_dump($total_rows);
        $row_per_page = 1;
        $pagination = ci_pagination($url, $total_rows, $row_per_page);
        $this->pagination->initialize($pagination);
        $link = $this->pagination->create_links();
        $data_page = $this->Customer_model->interJoinPaginate('order_dish', 'addresss_id', 'address_receive', 'id', $row_per_page, $row_per_page * ($page - 1), ['merchant_id' => $check_ath->id]);

        // show($data_page);
        // die();
        if ($email == NULL) {
            return redirect('/merchant-login');
        } elseif ($check_ath->authentic == '0') {
            return redirect('/email-authentic');
        } elseif ($check_ath->authentic_food == '0') {
            return redirect('/register-food');
        } else {
            $data = [
                'data_header' => $data_header,
                'notifi_mer' => notification_mer(),
                'check_ath' => $check_ath,
                'link' => $link,
                'list' => $data_mer,
                'data_page' => $data_page,
                'header' => 'merchant/include/header_merchant_login',
                'footer' => 'footer',
                'page_name' => 'merchant/home/lich_su_don_hang_merchant',
                'style' => ['/css/popup_history.css',  '/css/header_merchant_login.css', '/css/popup_detail_history_store.css',  '/css/lich_su_don_hang_merchant.css'],
                'js' => ['/script/function/function.js', '/script/lich_su_don_hang_merchant.js', '/script/lib/jquery.min.js'],
            ];
            $this->load->view('index', $data);
        }
    }
}
