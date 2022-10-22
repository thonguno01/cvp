<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NotificationController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->library('Globals');
        $this->load->helper('General_helper');
        $this->load->helper('DetailMerchant');
        $this->load->model('Generals_model');
        $this->load->helper('url');
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    }
    public function notify()
    {
        $check = $this->session->userdata('logined');
        if ($check) {
            $customerEmail = $this->session->userdata('email');
            $customer = $this->Generals_model->get_one_where_array_row('customer', ['email' => $customerEmail]);
            $results = $this->Generals_model->get_list2_ORDER_BY('notification', ['customer_id' => $customer['id']], 'created_at');
            $mer = $this->Generals_model->get_list('merchant');
            $output = [];
            foreach ($results as $notify) {
                foreach ($mer as $mechant) {
                    if ($notify['merchant_id'] == $mechant['id']) {
                        $notify['name_mer'] = $mechant['name_merchant'];
                    }
                }
                foreach (notification_cus() as $k => $val) {
                    if ($notify['content_cus'] == $k) {
                        $notify['content'] = $val;
                    }
                }
                $output[] = $notify;
            }
            // var_dump($x);
            // show($results);
            // die();
            $data = [
                'notifis' => $output,
                'header' => 'customer/include/header_after_login',
                'footer' => 'footer',
                'page_name' => 'customer/home/after-login/notification',
                'style' => ['/css/header-custumer-login.css',  '/css/header-custumer-login.css', '/css/notice.css', "/css/popup_detail_history_store.css", '/css/popup_report_post.css', '/css/footer.css'],
                'js' => ['/script/function/function.js', '/script/after-login/header-after-lg.js', '/script/after-login/notice.js'],
            ];
            $this->load->view('index', $data);
        } else {
            redirect('customer-login');
        }
    }
}
