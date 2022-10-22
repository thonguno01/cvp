<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HomeController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Generals_model');
        $this->load->library('session');
        $this->load->helper('cookie');
        $this->load->helper('url');
        // $this->load->helper('function');
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    }
    public function register()
    {
        $data = [
            'header' => 'customer/include/header',
            'footer' => 'footer',
            'page_name' => 'customer/home/register',
            'style' => ['/css/header.css', '/css/register.css', '/css/footer.css'],
            'js' => ['/script/function/function.js', '/script/register.js'],
        ];
        $this->load->view('index', $data);
    }
    public function login()
    {
        $data = [
            'header' => 'customer/include/header',
            'footer' => 'footer',
            'page_name' => 'customer/home/login',
            'style' => ['/css/header.css', '/css/login.css',  '/css/footer.css'],
            'js' => ['/script/function/function.js', '/script/login.js'],
        ];
        $this->load->view('index', $data);
    }
    public function forgotPassword()
    {
        $data = [
            'header' => 'customer/include/header',
            'footer' => 'footer',
            'page_name' => 'customer/home/forgot-password',
            'style' => ['/css/header.css', '/css/banner.css', '/css/forgot-password.css', '/css/footer.css'],
            'js' => ['/script/function/function.js', '/script/forgot-password.js'],
        ];
        $this->load->view('index', $data);
    }
    // Cập nhật tài khoản
    public function information()
    {
        if ($this->session->userdata('logined') == true) {

            $email = $this->session->userdata('email');

            $info = $this->Generals_model->get_one_where('customer', ['email' => $email]);
            if ($info == null) {
                $info = '';
            }
            $data = [
                'header' => 'customer/include/header_after_login',
                'footer' => 'footer',
                'page_name' => 'customer/home/after-login/infomatiton-customer',
                'style' => ['/css/header-custumer-login.css', '/css/infomation-customer.css', '/css/footer.css'],
                'js' => ['/script/function/function.js', '/script/after-login/header-after-lg.js', '/script/after-login/infomation-customer.js'],
                'info' => $info,
            ];
            $this->load->view('index', $data);
        } else {
            redirect('/customer-login');
        }
    }
    //page xác thuực
    public function authentic()
    {
        $data = [
            'header' => 'customer/include/header_after_login',
            'footer' => 'footer',
            'page_name' => 'customer/home/authentic-acc-customer',
            'style' => ['/css/header-custumer-login.css', '/css/forgot-password.css', '/css/footer.css'],
            'js' => ['/script/function/function.js', '/script/after-login/header-after-lg.js', '/script/authentic-acc-customer.js'],
        ];
        $this->load->view('index', $data);
    }
}
