<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HomeController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->model('Generals_model');
        $this->load->library('Globals');
        $this->load->helper('url');
        // $this->load->helper('function');
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
    }
    //Đăng xuất
    public function logout()
    {
        $this->session->sess_destroy();
        $out = [
            'rs' => true
        ];
        echo json_encode($out);
    }
    // Đăng kí 
    public function saveMerchant()
    {
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        $phone = $this->input->post('phone');
        $checkMail = $this->Generals_model->get_one_where('merchant', ['email' => $email]);
        $save = [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'phone' => $phone,
        ];


        if ($checkMail == null) {
            $checkReister = $this->Generals_model->insert('merchant', $save);
            $merchant = $this->Generals_model->get_one_where('merchant', ['email' => $email]);
            $out['message'] = '';
            $out['link'] = '/email-authentic';
            if ($checkReister > 0) {
                $link = $this->getCurUrl() . '/verify-register-merchant-b' . md5($email) . '-id-m' . $merchant->id . '.html';
                $body = file_get_contents('TemplateEmail/merchant_regis.html');
                $body = str_replace('<%name%>', $save['name'], $body);
                $body = str_replace('<%link%>', $link, $body);
                $res = $this->globals->SendMailAmazon('Đăng ký thành công', $save['name'], $save['email'], $body);
            }
            $merchant = $this->Generals_model->delete_where('merchant_error', ['email' => $email]);
            $this->session->set_userdata(['email_mer' => $email]);
        } else {
            $out['message'] = 'Email bạn đã tồn tại trên hệ thống ! ';
            $out['result'] = '';
        }
        echo json_encode($out);
    }
    public function reSendMail()
    {
        $email = $this->session->userdata('email_mer');
        $merchant =  $this->Generals_model->get_one_where('merchant', ['email' => $email]);
        $out = [];
        $date = getdate();
        $dem = '';
        $dem .= $date['year'] . '-' . $date['mon'] . '-' . $date['mday'] . ' ' . $date['hours'] . ':' . $date['minutes'] . ':' . $date['seconds'];

        if ($merchant != null && $merchant->authentic == 0) {
            $link = $this->getCurUrl() . '/verify-register-merchant-b' . md5($email) . '-id-m' . $merchant->id . '.html';
            $body = file_get_contents('TemplateEmail/merchant_regis.html');
            $body = str_replace('<%name%>', $merchant->name, $body);
            $body = str_replace('<%link%>', $link, $body);
            $send_status = $this->globals->SendMailAmazon('Đăng ký thành công', $merchant->name, $email, $body);
            $this->Generals_model->update('merchant', ['email' => $email], ['time_mail' => $dem]);
            // $this->session->unset_userdata('email'); 
        } else {
            if (empty($customer)) {
                $send_status = [
                    'result' => 'false',
                    'message' => "Gửi email không thành công!"
                ];
            }
            if ($merchant->authentic != '0') {
                $send_status = [
                    'result' => 'false',
                    'message' => "Tài khoản đã được xác thực"
                ];
            }
        }
        echo json_encode($send_status);
    }
    // check mail tồn tại hay k
    public function checkMail()
    {
        $email  = $this->input->post('email');
        $checkMail = $this->Generals_model->get_one_where('merchant', ['email' => $email]);
        if ($checkMail == null) {
            $out['message'] = '';
        } else {
            $out['message'] = 'Email bạn đã tồn tại trên hệ thống ! ';
        }
        echo json_encode($out);
    }
    // xác thực đăng kí thành công 
    public function authResgisterMer($email, $id)
    {
        $merchant  =  $this->Generals_model->update('merchant', ['id' => $id], ['authentic' => 1]);
        // echo 'sdkjv';
        return redirect('register-food');
    }
    // gửi mã otp lấy lại mật khẩu 
    public function sendOtp()
    {
        $email = $this->input->post('email');
        $checkMail = $this->Generals_model->get_one_where('merchant', ['email' => $email]);
        if ($checkMail == null) {
            $out['message'] = 'Email không tồn tại trên hệ thống ! ';
        } else {
            $out['message'] = '';
            $otp = rand(100000, 999999);
            $otp_update = $this->Generals_model->update('merchant', ['email' => $email], ['otp' => $otp]);
            if ($otp_update == true) {
                $link = $this->getCurUrl() . '/merchant-change-password-' . md5($email) . '-id-' . $checkMail->id . '.html';
                $body = file_get_contents('TemplateEmail/forgot_pass.html');
                $body = str_replace('<%name%>', $checkMail->name, $body);
                $body = str_replace('<%OTP%>', $otp, $body);
                $res = $this->globals->SendMailAmazon('Mã OTP Lấy lại Mật khẩu',  $checkMail->name, $email, $body);
                $out['redirect'] = $link;
                $out['senmail'] = $res;
            }
        }
        echo json_encode($out);
    }
    // thay đổi mật khẩu 
    public function changePass($email, $id)
    {
        // echo $id;
        $this->session->set_userdata('id', $id);
        $data = [
            'header' => 'merchant/include/header_merchant',
            'footer' => 'footer',
            'page_name' => 'merchant/home/restore-password',
            'style' => ['/css/restore-password.css', '/css/banner.css',  '/css/footer.css'],
            'js' => ['/script/function/function.js', '/script/restore-password-merchant.js'],
        ];
        $this->load->view('index', $data);
    }
    public function getCurURL()
    {
        if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
            $pageURL = "https://";
        } else {
            $pageURL = 'http://';
        }
        if (isset($_SERVER["SERVER_PORT"]) && $_SERVER["SERVER_PORT"] != "80") {
            $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"];
        } else {
            $pageURL .= $_SERVER["SERVER_NAME"];
        }
        return $pageURL;
    }
    public function checkOtp()
    {
        $otp_input = $this->input->post('otp');
        $id = $this->session->userdata('id');
        $merchant = $this->Generals_model->get_one_where('merchant', ['id' => $id]);
        $otp_db = $merchant->otp;
        if ($otp_input == $otp_db) {
            $checkOTP['message'] = '';
        } else {
            $checkOTP['message'] = 'Mã xác thực chưa được nhập hoặc Nhập chưa đúng vui lòng vào gmail để xem mã xác thực ! ';
        }
        echo json_encode($checkOTP);
    }
    public function reSendOtp()
    {
        $id = $this->session->userdata('id');
        $otp = rand(100000, 999999);
        $send = $this->Generals_model->update('merchant', ['id' => $id], ['otp' => $otp]);
        $user =  $this->Generals_model->get_one_where('merchant', ['id' => $id]);
        if ($send == true) {
            $body = file_get_contents('TemplateEmail/forgot_pass.html');
            $body = str_replace('<%name%>', $user->name, $body);
            $body = str_replace('<%OTP%>', $otp, $body);
            $res = $this->globals->SendMailAmazon('Mã OTP Lấy lại Mật khẩu',  $user->name, $user->email, $body);
        }
        echo json_encode($res);
    }
    public function checkMailForgot()
    {
        $email  = $this->input->post('email');
        $checkMail = $this->Generals_model->get_one_where('merchant', ['email' => $email]);
        if ($checkMail == null) {
            $out = '';
        } else {
            $out['message'] = 'Email bạn đã tồn tại trên hệ thống ! ';
        }
        echo json_encode($out);
    }

    // thay đổi mật khẩu  
    public function changeSucess()
    {
        $password = $this->input->post('password');
        $id = $this->session->userdata('id');
        $updatePassword =  $this->Generals_model->update('merchant', ['id' => $id], ['password' => md5($password)]);
        if ($updatePassword ==  true) {
            $out['link'] = '/merchant-login';
        }
        $this->session->unset_userdata('id');
        echo json_encode($out);
    }
    // login
    public function loginSuccess()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $saveInfo =  $this->input->post('miss_pass');
        $checkMerchant =  $this->Generals_model->get_one_where('merchant', ['email' => $email, 'password' => md5($password)]);
        $cookie = array(
            'name'   => 'password',
            'value'  => $password,
            'expire' => time() + 86500,
        );
        if ($checkMerchant == null) {
            $out = [
                'msg' => "Thông tin tài khoản mật khẩu của bạn không đúng!",
            ];
        } elseif ($checkMerchant->authentic == '0') {
            $this->session->set_userdata(['name' => $checkMerchant->name, 'email_mer' => $checkMerchant->email]);
            $out = [
                'msg' => "Tài khoản của bạn chưa xác thực. Gửi lại mail xác thực ngay!",
                'rs' => 'authentic'
            ];
        } elseif ($checkMerchant->authentic_food == '0') {
            $this->session->set_userdata(['name' => $checkMerchant->name, 'email_mer' => $checkMerchant->email]);
            // $out = '1';
            $out = [
                'msg' => $checkMerchant->name,
                'rs' => 'authentic_food'
            ];
        } else {
            $this->session->set_userdata(['name' => $checkMerchant->name, 'email_mer' => $checkMerchant->email]);
            $out = [
                'msg' => '',
                'rs' => false
            ];
        }
        echo json_encode($out);
    }

    // đăng ký lỗi
    public function merchant_error()
    {
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $checkMail = $this->Generals_model->get_one_where('merchant', ['email' => $email]);
        $checkMail2 = $this->Generals_model->get_one_where('merchant_error', ['email' => $email]);
        $save = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
        ];
        if ($checkMail == "" & $checkMail2 == "") {
            $checkReister = $this->Generals_model->insert('merchant_error', $save);
        } else {
            $out['result'] = '';
        }
        echo json_encode($out);
    }

    //register profile bước 1+2
    public function register_profile_upload()
    {
        $email = $this->session->userdata('email_mer');

        $img_avatar = basename($_FILES['img_avt']['name']);
        $img_cover = basename($_FILES['img_cover']['name']);
        $path = "upload/merchant/infor/";
        $full_path_avt = $path . $img_avatar;
        $full_path_cover = $path . $img_cover;
        move_uploaded_file($_FILES['img_avt']['tmp_name'], $full_path_avt);
        move_uploaded_file($_FILES['img_cover']['tmp_name'], $full_path_cover);
        $save = [
            'img_avatar' => $img_avatar,
            'img_cover' => $img_cover,
        ];
        $register_profile = $this->Generals_model->update('merchant', ['email' => $email], $save);
    }
    public function register_profile()
    {
        $email = $this->session->userdata('email_mer');

        $name_merchant = $this->input->post('name_merchant');
        $type_food = $this->input->post('type_food');
        $id_city = $this->input->post('id_city');
        $id_district = $this->input->post('id_district');
        $address = $this->input->post('address');
        $day_open = $this->input->post('day_open');
        $time_start = $this->input->post('time_start');
        $time_end = $this->input->post('time_end');
        $type_merchant = $this->input->post('type_merchant');
        $culinary = $this->input->post('culinary');
        $search_key = $this->input->post('search_key');
        $fee_ship = $this->input->post('fee_ship');
        $description = $this->input->post('description');
        $save = [
            'name_merchant' => $name_merchant,
            'typical_food' => $type_food,
            'id_city' => $id_city,
            'id_district' => $id_district,
            'address' => $address,
            'day_open' => $day_open,
            'time_start' => $time_start,
            'time_end' => $time_end,
            'type_merchant' => $type_merchant,
            'culinary' => $culinary,
            'search_key' => $search_key,
            'fee_ship' => $fee_ship,
            'description' => $description,
        ];
        if ($email == NULL) {
            $out = [
                'rs' => false,
                'msg' => 'Thất bại'
            ];
        } else {
            $register_profile = $this->Generals_model->update('merchant', ['email' => $email], $save);
            $out = [
                'rs' => true,
                'msg2' => 'Cập nhật thành công thông tin quán ăn'
            ];
        }
        echo json_encode($out);
    }
    public function register_detail_upload()
    {
        $email = $this->session->userdata('email_mer');

        $img_avatar = basename($_FILES['img_avt']['name']);
        $img_cover = basename($_FILES['img_cover']['name']);
        $path = "upload/merchant/infor/";
        $full_path_avt = $path . $img_avatar;
        $full_path_cover = $path . $img_cover;
        move_uploaded_file($_FILES['img_avt']['tmp_name'], $full_path_avt);
        move_uploaded_file($_FILES['img_cover']['tmp_name'], $full_path_cover);
        $save = [
            'img_avatar' => $img_avatar,
            'img_cover' => $img_cover,
        ];
        $register_profile = $this->Generals_model->update('merchant', ['email' => $email], $save);
    }
    public function register_detail()
    {
        $email = $this->session->userdata('email_mer');

        $name_food = $this->input->post('name_mon_an_1');
        $type_food = $this->input->post('an');
        $description = $this->input->post('detail_mon_an_1');
        $price_food = $this->input->post('money_mon_an_1');
        $day_open = $this->input->post('ngay_phuc_vu_1');
        $features_food = $this->input->post('features_checkbox');

        $img_food = basename($_FILES['img_detail_menu']['name']);
        $path = "upload/merchant/food/";
        $full_path = $path . basename($_FILES["img_detail_menu"]["name"]);
        move_uploaded_file($_FILES['img_detail_menu']['tmp_name'], $full_path);

        $data_detail = $this->Generals_model->get_one_where('merchant', ['email' => $email]);
        $merchant_id = $data_detail->id;
        $save = [
            'merchant_id' => $merchant_id,
            'name_food' => $name_food,
            'type_food' => $type_food,
            'description' => $description,
            'price_food' => $price_food,
            'day_open' => $day_open,
            'features_food' => $features_food,
            'img_food' => $img_food,
        ];
        $register_detail = $this->Generals_model->insert('detail_menu', $save);
    }
    public function register_combo()
    {
        $email = $this->session->userdata('email_mer');

        $name_combo = $this->input->post('name_combo');
        $detail_menu_combo_id = $this->input->post('choose_detail');
        $price_combo = $this->input->post('gia_combo');
        $day_service = $this->input->post('ngay_phuc_vu');

        $img_combo = basename($_FILES['img_combo']['name']);
        $path = "upload/merchant/food/";
        $full_path = $path . basename($_FILES["img_combo"]["name"]);
        move_uploaded_file($_FILES['img_combo']['tmp_name'], $full_path);

        $check_trung = $this->Generals_model->get_one_where('combo', ['name_combo' => $name_combo]);

        $data_detail = $this->Generals_model->get_one_where('merchant', ['email' => $email]);
        $merchant_id = $data_detail->id;
        $save = [
            'merchant_id' => $merchant_id,
            'name_combo' => $name_combo,
            'detail_menu_combo_id' => $detail_menu_combo_id,
            'price_combo' => $price_combo,
            'day_service' => $day_service,
            'img_combo' => $img_combo,
        ];
        if ($check_trung != '') {
            die;
        } else {
            $register_detail = $this->Generals_model->insert('combo', $save);
        }
    }
    public function register_group()
    {
        $email = $this->session->userdata('email_mer');

        $name_group = $this->input->post('name_group');
        $detail_menu_group_id = $this->input->post('choose_detail_gr');


        $check_trung = $this->Generals_model->get_one_where('group', ['name_group' => $name_group]);

        $data_detail = $this->Generals_model->get_one_where('merchant', ['email' => $email]);
        $merchant_id = $data_detail->id;
        $save = [
            'merchant_id' => $merchant_id,
            'name_group' => $name_group,
            'detail_menu_group_id' => $detail_menu_group_id,
        ];
        if ($check_trung != '') {
            die;
        } else {
            $register_detail = $this->Generals_model->insert('group', $save);
        }
    }
    public function save_infor_merchant()
    {
        $email = $this->session->userdata('email_mer');
        $this->Generals_model->update('merchant', ['email' => $email], ['authentic_food' => 1]);
    }
    public function update_status()
    {
        $id = $this->input->post('id');
        $this->Generals_model->update('notification', ['id' => $id], ['status' => 0]);
    }
    public function update_status_all()
    {
        $id = $this->input->post('id');
        $this->Generals_model->update('notification', ['merchant_id' => $id], ['status' => 0]);
    }
}
