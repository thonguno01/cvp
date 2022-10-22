<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AddressRecieveController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->model('Generals_model');
        $this->load->model('Customer_model');
        $this->load->helper('General_helper');
        $this->load->helper('url');
        $this->load->library('pagination');
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    }
    public function listAddress()
    {
        $check  = $this->session->userdata('logined');
        if ($check) {
            $cus  = $this->session->userdata('idCustomer');
            $listAdress =  $this->Generals_model->get_list2('address_receive', ['customer_id' => $cus]);
            if (!$this->input->get('page') || $this->input->get('page') < 0) {
                $page = 1;
            } else {
                $page = $this->input->get('page');
            }
            $url = 'address-receive';
            $total_rows = count($listAdress);
            $row_per_page = 3;
            $pagination = ci_pagination($url, $total_rows, $row_per_page);
            $this->pagination->initialize($pagination);
            $link = $this->pagination->create_links();
            $outPut =  $this->Customer_model->getList('address_receive', ['customer_id' => $cus], $row_per_page, $row_per_page * ($page - 1));
            // show($outPut);
            // die();   
            $data = [
                'link' => $link,
                'list' => $outPut,
                'header' => 'customer/include/header_after_login',
                'footer' => 'footer',
                'page_name' => 'customer/home/after-login/address-recieve',
                'style' => ['/css/header-custumer-login.css', '/css/address-recieve.css', '/css/popup-add-address.css', '/css/footer.css'],
                'js' => ['/script/function/function.js', '/script/after-login/header-after-lg.js', '/script/after-login/address-recieve.js'],
            ];
            $this->load->view('index', $data);
        } else {
            redirect('customer-login');
        }
    }
}
