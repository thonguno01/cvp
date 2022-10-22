<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MechantLikeController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->library('Globals');
        $this->load->helper('General_helper');
        $this->load->model('Customer_model');
        $this->load->library('pagination');
        $this->load->model('Generals_model');
        $this->load->helper('url');
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    }
    public function pageSaveMerchant()
    {

        $check  = $this->session->userdata('logined');
        if ($check) {
            $cus  = $this->session->userdata('idCustomer');

            $citys = $this->Generals_model->get_list('city2');
            $save_mechant = $this->Generals_model->get_list2('saved_merchant', ['customer_id' => $cus]);

            if (!$this->input->get('page') || $this->input->get('page') < 0) {
                $page = 1;
            } else {
                $page = $this->input->get('page');
            }
            $url = 'save-merchant';

            $total_rows = count($save_mechant);
            $row_per_page = 1;
            $pagination = ci_pagination($url, $total_rows, $row_per_page);
            $outPut =  $this->Customer_model->interJoinPaginate('merchant', 'id', 'saved_merchant', 'merchant_id', $row_per_page, $row_per_page * ($page - 1), ['customer_id' => $cus]);
            $this->pagination->initialize($pagination);
            $link = $this->pagination->create_links();
            $result = $this->globals->getNameCityDistric($outPut, $citys);
            // show($outPut);
            // die();
            $data = [
                'link' => $link,
                'saveMerchant' => $result,
                'header' => 'customer/include/header_after_login',
                'footer' => 'footer',
                'page_name' => 'customer/home/after-login/save-merchant',
                'style' => ['/css/header-custumer-login.css', '/css/store-save.css', '/css/footer.css'],
                'js' => ['/script/function/function.js', '/script/after-login/header-after-lg.js', 'script/after-login/save-merchant.js'],
            ];
            $this->load->view('index', $data);
        } else {
            return  redirect('customer-login');
        }
    }
}
