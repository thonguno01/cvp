<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HistoryOrderController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('General_helper');
        $this->load->helper('history');
        $this->load->model('Generals_model');
        $this->load->library('pagination');
        $this->load->model('Customer_model');
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    }
    public function historyOrder()
    {
        $check = $this->session->userdata('logined');
        // $citys = $this->Generals_model->get_list('city2');
        // $results = getStatus($orders, status_order(), $this, $citys);

        if (!$this->input->get('page') || $this->input->get('page') < 0) {
            $page = 1;
        } else {
            $page = $this->input->get('page');
        }
        $url = 'history-order';
        $row_per_page = 10;
        $total_rows = count($this->Generals_model->get_where('order_dish', ['customer_id' => $this->session->userdata('idCustomer')]));
        $pagination = ci_pagination($url, $total_rows, $row_per_page);
        $this->pagination->initialize($pagination);
        $link = $this->pagination->create_links();
        $results =  $this->Customer_model->interJoinPaginate('order_dish', 'addresss_id', 'address_receive', 'id', $row_per_page, $row_per_page * ($page - 1), ['order_dish.customer_id' => $this->session->userdata('idCustomer')]);
        // show($results);
        // die();
        if ($check) {
            $data = [
                'link' => $link,
                'orders' => $results,
                'header' => 'customer/include/header_after_login',
                'footer' => 'footer',
                'page_name' => 'customer/home/after-login/history-order',
                'style' => ['/css/header-custumer-login.css', '/css/history-store.css', '/css/popup_detail_history_store.css', '/css/popup_feedback_history_store.css', '/css/popup-li-do-huy-don.css', '/css/popup-assess.css', '/css/popup-buy-success.css', '/css/popup_huy_don_hang.css', '/css/footer.css'],
                'js' => ['/script/lib/jquery.form.js', '/script/function/function.js', '/script/after-login/header-after-lg.js', '/script/after-login/history-order-all.js'],
            ];
            $this->load->view('index', $data);
        } else {
            redirect('customer-login');
        }
    }
}
