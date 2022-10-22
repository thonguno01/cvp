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
        $this->load->helper('cookie');
        $this->load->helper('General_helper');
        // $this->load->helper('function');
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $this->load->helper('url');
    }
    // check mail tồn tại hay k
    public function checkMail()
    {
        $email  = $this->input->post('email');
        $checkMail = $this->Generals_model->get_one_where('customer', ['email' => $email]);

        if ($checkMail == null) {
            $out['message'] = '';
        } else {
            $out['message'] = 'Email bạn đã tồn tại trên hệ thống ! ';
        }
        echo json_encode($out);
    }
    // Đăng kí 
    public function saveCustomer()
    {
        $dem = getTime();
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        $phone = $this->input->post('phone');
        $checkMail = $this->Generals_model->get_one_where('customer', ['email' => $email]);
        $save = [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'phone' => $phone,
            'created_at' => $dem,
            'time_mail' => $dem,
        ];
        if ($checkMail == null) {
            $checkReister = $this->Generals_model->insert('customer', $save);
            $customer = $this->Generals_model->get_one_where('customer', ['email' => $email]);
            if ($checkReister > 0) {
                $link = $this->getCurUrl() . '/verify-register-a' . md5($email) . '-id-c' . $customer->id . '.html';
                $body = file_get_contents('TemplateEmail/customer_regis.html');
                $body = str_replace('<%name%>', $save['name'], $body);
                $body = str_replace('<%link%>', $link, $body);
                // gui thu -> luu  session ->chuyrn page
                $res = $this->globals->SendMailAmazon('Đăng ký thành công', $save['name'], $save['email'], $body);
                $this->session->set_userdata(['emailRegis' => $email, 'name' => $name]);
                $this->Generals_model->delete_where('customer_error', ['email' => $email]);
                $out['message'] = '';
                $out['result'] = '/customer-authentic';
            }
        } else {
            $out['message'] = 'Email bạn đã tồn tại trên hệ thống ! ';
            $out['result'] = '';
        }
        echo json_encode($out);
    }
    public function customerError()
    {
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $user_error = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
        ];
        $checkPhoneError =  $this->Generals_model->get_one_where('customer_error', ['phone' => $phone]);
        if ($checkPhoneError == null) {
            $customer = $this->Generals_model->insert('customer_error', $user_error);
        } else {
            die();
        }
        echo json_encode($customer);
    }
    // gửi lại mail page xác thực đăng kí 
    public function reSendMail()
    {
        $email = $this->session->userdata('emailRegis');
        $customer =  $this->Generals_model->get_one_where('customer', ['email' => $email]);
        $out = [];
        $dem = getTime();
        if ($customer != null && $customer->authentic == 0) {
            $link = $this->getCurUrl() . '/verify-register-a' . md5($email) . '-id-c' . $customer->id . '.html';
            $body = file_get_contents('TemplateEmail/customer_regis.html');
            $body = str_replace('<%name%>', $customer->name, $body);
            $body = str_replace('<%link%>', $link, $body);
            $send_status = $this->globals->SendMailAmazon('Đăng ký thành công', $customer->name, $email, $body);
            $this->Generals_model->update('customer', ['email' => $email], ['time_mail' => $dem]);
            $this->session->unset_userdata('emailRegis');
        } else {
            if (empty($customer)) {
                $send_status = [
                    'result' => 'false',
                    'message' => "Gửi email không thành công!"
                ];
            }
            if ($customer->authentic != '0') {
                $send_status = [
                    'result' => 'false',
                    'message' => "Tài khoản đã được xác thực"
                ];
            }
        }
        echo json_encode($send_status);
    }
    // xác thực đăng kí thành công 
    public function authResgister($email, $id)
    {
        $customer  =  $this->Generals_model->update('customer', ['id' => $id], ['authentic' => 1]);

        if ($customer == true) {
            $checkCustomer =  $this->Generals_model->get_one_where('customer', ['id' => $id]);
            $this->session->set_userdata(['name' => $checkCustomer->name, 'email' => $checkCustomer->email, 'avata' => $checkCustomer->img_avata, 'idCustomer' => $checkCustomer->id, 'logined' => true]);
            return redirect('customer-home');
        } else {
            return redirect('customer-login');
        }
    }
    // check mail forgot
    public function checkMailForgot()
    {
        $email  = $this->input->post('email');
        $checkMail = $this->Generals_model->get_one_where('customer', ['email' => $email]);
        if ($checkMail == null) {
            $out = '';
        } else {
            $out['message'] = 'Email bạn đã tồn tại trên hệ thống ! ';
        }
        echo json_encode($out);
    }
    // gửi mã otp lấy lại mật khẩu  
    public function sendOtp()
    {
        $email = $this->input->post('email');
        $checkMail = $this->Generals_model->get_one_where('customer', ['email' => $email]);
        if ($checkMail == null) {
            $out['message'] = 'Email Không  tồn tại trên hệ thống ! ';
        } else {
            $out['message'] = '';
            $otp = rand(100000, 999999);
            $otp_update = $this->Generals_model->update('customer', ['email' => $email], ['opt_restore_password' => $otp]);

            if ($otp_update == true) {
                $link = $this->getCurUrl() . '/customer-change-password-' . md5($email) . '-id-' . $checkMail->id . '.html';
                $body = file_get_contents('TemplateEmail/forgot_pass.html');
                $body = str_replace('<%name%>', $checkMail->name, $body);
                $body = str_replace('<%OTP%>', $otp, $body);
                $res = $this->globals->SendMailAmazon('Mã OTP Lấy lại Mật khẩu',  $checkMail->name, 'thongvip011@gmail.com', $body);
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
            'header' => 'customer/include/header',
            'footer' => 'footer',
            'page_name' => 'customer/home/restore-password',
            'style' => ['/css/header.css', '/css/restore-password.css', '/css/banner.css', '/css/footer.css'],
            'js' => ['/script/function/function.js', '/script/restore-password.js'],
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
        $customer = $this->Generals_model->get_one_where('customer', ['id' => $id]);
        $otp_db = $customer->opt_restore_password;
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
        $send = $this->Generals_model->update('customer', ['id' => $id], ['opt_restore_password' => $otp]);
        $user =  $this->Generals_model->get_one_where('customer', ['id' => $id]);
        if ($send == true) {
            $body = file_get_contents('TemplateEmail/forgot_pass.html');
            $body = str_replace('<%name%>', $user->name, $body);
            $body = str_replace('<%OTP%>', $otp, $body);
            $res = $this->globals->SendMailAmazon('Mã OTP Lấy lại Mật khẩu',  $user->name, $user->email, $body);
        }
        echo json_encode($res);
    }
    // thay đổi mật khẩu 
    public function changeSucess()
    {
        $password = $this->input->post('password');
        $id = $this->session->userdata('id');
        $dem = getTime();
        $updatePassword =  $this->Generals_model->update('customer', ['id' => $id], ['password' => md5($password), 'update_at' => $dem]);
        if ($updatePassword ==  true) {
            $this->Generals_model->update('customer', ['id' => $id], ['opt_restore_password' => null]);
            $out['link'] = '/customer-login';
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
        $checkCustomer =  $this->Generals_model->get_one_where('customer', ['email' => $email, 'password' => md5($password)]);
        $cookie = array(
            'name'   => 'password',
            'value'  => $password,
            'expire' => time() + 86500,
        );
        if ($checkCustomer == null) {
            $out['mes'] = 'Thông tin tài khoản mật khẩu của bạn không đúng';
        } else {
            if ($checkCustomer->authentic == '1') {
                if ($saveInfo == true) {
                    $this->input->set_cookie($cookie);
                }
                $this->session->set_userdata(['name' => $checkCustomer->name, 'email' => $checkCustomer->email, 'avata' => $checkCustomer->img_avata, 'idCustomer' => $checkCustomer->id, 'logined' => true]);
                $out['mes'] = 'customer-home';
            } else {
                $out['mes'] = 'Tài khoản của bạn chưa được xác thực !Vui lòng vào email để xác thực';
                $this->session->set_userdata(['emailRegis' => $email, 'name' => $checkCustomer->name, 'avata' => $checkCustomer->img_avata]);
                $out['redirect'] = 'customer-authentic';
            }
        }
        echo json_encode($out);
    }
    public function deleteImg()
    {
        $email = $this->session->userdata('email');
        $x = $this->Generals_model->update('customer', ['email' => $email], ['img_avata' => null]);
        echo json_encode($x);
    }
    public function updateInfoCustomer()
    {
        if (isset($_POST['btn_save'])) {
            $this->session->unset_userdata('alertSizeImg');
            $dem = getTime();
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $gender = $this->input->post('gender');
            $anh = basename($_FILES['file_img_avata']["name"]);
            $target_dir     = "upload/information/";
            $target_file   = $target_dir . $anh;
            $eror = true;
            echo $target_file;
            if ($_FILES['file_img_avata']["size"] > 8000000) {
                $eror = false;
                $this->session->set_userdata('alertSizeImg', 'Dung lượng ảng lớn hơn 8MB');
                return redirect('/customer-information');
            } elseif ($eror == true) {
                $CHECK = move_uploaded_file($_FILES['file_img_avata']['tmp_name'], $target_file);

                if ($anh == '' && $name == '') {
                    echo '1';
                    $this->Generals_model->update('customer', ['email' => $email], ['gender' => $gender, 'update_at' => $dem]);
                } elseif ($anh == '') {
                    echo '2';
                    $this->Generals_model->update('customer', ['email' => $email], ['gender' => $gender, 'name' => $name, 'update_at' => $dem]);
                } elseif ($name == '') {
                    echo '3';
                    $this->Generals_model->update('customer', ['email' => $email], ['gender' => $gender, 'img_avata' => $anh, 'update_at' => $dem]);
                } else {
                    echo '4';
                    $this->Generals_model->update('customer', ['email' => $email], ['gender' => $gender, 'name' => $name, 'img_avata' => $anh, 'update_at' => $dem]);
                }
                // return redirect('customer-information');
            }
            // // cập nhật mật khẩu 
            $newPass = $this->input->post('passnew');
            $password = $this->input->post('password');
            $reNewPass = $this->input->post('repassnew');
            $flag = 1;
            if (isset($newPass)) {
                $checkPass = $this->Generals_model->get_one_where('customer', ['email' => $email]);
                if ($checkPass->password != md5($password)) {
                    $this->session->set_flashdata('changePass', 'Mật khẩu không chính xác');
                    return redirect('customer-information');
                } else {
                    if ($newPass == '') {
                        $flag = 0;
                        $this->session->set_flashdata('changePass', 'Mật khẩu mới  không Không được bỏ trống');
                    } else {
                        if (strlen($newPass) < 6) {
                            $flag = 0;
                            $this->session->set_flashdata('changePass', 'Mật khẩu mới  phải trên 6 kí tự trở lên ');
                            // $this->session->set_flashdata('message', 'This is a message.');
                        }
                    }
                    if ($reNewPass == '') {
                        $flag = 0;
                        $this->session->set_flashdata('changePass', 'Nhập lại Mật khẩu mới không được bỏ trống');
                    } else {
                        if ($reNewPass != $newPass) {
                            $flag = 0;
                            $this->session->set_flashdata('changePass', 'Nhập lại Mật khẩu mới không trùng với mật khẩu');
                        }
                    }
                    if ($flag == 1) {
                        $this->Generals_model->update('customer', ['email' => $email], ['password' => md5($newPass), 'update_at' => $dem]);
                        $this->session->unset_userdata('changePass');
                    }
                }
            }
            return redirect('customer-information');
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        return redirect('/customer-login');
    }
}
