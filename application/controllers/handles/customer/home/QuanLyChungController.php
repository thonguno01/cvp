<?php
defined('BASEPATH') or exit('No direct script access allowed');


class QuanLyChungController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->library('Globals');
        $this->load->helper('General_helper');
        $this->load->model('Generals_model');
        $this->load->helper('url');
        $this->load->library('pagination');
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    }
    public function search()
    {
        $nameDish = $this->input->post('nameDish');
        $addressMe = $this->input->post('addressMe');
        $url = '';
        if ($addressMe != '' && $nameDish == '') {
            $url = '/quan-an?keyword=' .  preg_replace('/\s+/', '-', $addressMe);
        } elseif ($nameDish != '' && $addressMe == '') {
            $url = '/mon-an?key=' . preg_replace('/\s+/', '-', $nameDish);
        } elseif ($nameDish != '' && $addressMe != '') {
            $url = '/mon-an?mon=' . preg_replace('/\s+/', '-', $nameDish) . '&tai=' . preg_replace('/\s+/', '-', $addressMe);
        } else {
            $url = '/';
        }
        $data = [
            'rs' => true,
            'url' => $url
        ];
        echo json_encode($data);
    }
    public function searchLocation()
    {
        $keyword =  preg_replace('/[-\s]+/', ' ', $this->input->get('keyword'));
        $result = [];
        $favourite_merchant = $this->Generals_model->get_list('favourite_merchant');
        $hours = hour();
        $days = day();
        $citys = $this->Generals_model->get_list('city2');
        $getMerchant = $this->Generals_model->get_list('merchant');
        $save_mechant = $this->Generals_model->interJoin('customer_id , merchant_id', 'merchant', 'id', 'saved_merchant', 'merchant_id');
        if (!$this->input->get('page') || $this->input->get('page') < 0) {
            $page = 1;
        } else {
            $page = $this->input->get('page');
        }
        $url = 'quan-an?keyword=' . $keyword;
        $total_rows = count($getMerchant);
        $row_per_page = 10;

        $pagination = ci_pagination($url, $total_rows, $row_per_page);
        $this->pagination->initialize($pagination);
        $link = $this->pagination->create_links();
        $result = $this->Generals_model->search_cit('city2', $keyword);
        $rs_search = [];
        foreach ($result as $city) {
            if ($city['cit_id'] < 63) {
                $rs_search =   $this->Generals_model->get_list2('merchant', ['id_city' => $city['cit_id']]);
            } else {
                $rs_search =   $this->Generals_model->get_list2('merchant', ['id_district' => $city['cit_id']]);
            }
        }

        $result = $this->globals->getNameCityDistric($rs_search, $citys, $hours, $days, typeMerchant());
        if (count($result) == 0) {
            $result = $this->Generals_model->search('merchant', ['address' => $keyword], $row_per_page, $row_per_page * ($page - 1));
        }
        $array = [];
        foreach ($result as $k => $item) {
            foreach ($save_mechant as $v) {
                if ($v['merchant_id'] ==  $item['id']) {
                    $result[$k]['like'] = 1;
                }
            }
        }
        if ($this->session->userdata('email') == false) {
            $data = [
                'isLogin' => 0,
                'cus' => $this->session->userdata('idCustomer'),
                'fav_mer' => $favourite_merchant,
                'link' => $link,
                'mechants' => $result,
                'header' => 'customer/include/header',
                'footer' => 'footer',
                'page_name' => 'customer/home/after-login/search',
                'style' => ['/css/header.css', '/css/banner.css', '/css/huongdan_dishhost.css', '/css/search.css', '/css/footer.css'],
                'js' => ['/script/function/function.js', '/script/searchHome.js', '/script/after-login/header-after-lg.js', '/script/rice_store_detail.js'],
            ];
            $this->load->view('index', $data);
        } else {
            $data = [
                'isLogin' => 1,
                'cus' => $this->session->userdata('idCustomer'),
                'fav_mer' => $favourite_merchant,
                'link' => $link,
                'mechants' => $result,
                'header' => 'customer/include/header_after_login',
                'footer' => 'footer',
                'page_name' => 'customer/home/after-login/search',
                'style' => ['/css/header-custumer-login.css', '/css/banner.css', '/css/huongdan_dishhost.css', '/css/search.css', '/css/footer.css'],
                'js' => ['/script/function/function.js', '/script/searchHome.js', '/script/after-login/header-after-lg.js', '/script/rice_store_detail.js'],
            ];
            $this->load->view('index', $data);
        }
    }
    public function searchDish()
    {
        $keyword =  preg_replace('/[-\s]+/', ' ', $this->input->get('key'));
        $name_mer = preg_replace('/[-\s]+/', ' ',  $this->input->get('mon'));
        $address =   preg_replace('/[-\s]+/', ' ', $this->input->get('tai'));
        $result = [];

        $favourite_merchant = $this->Generals_model->get_list('favourite_merchant');
        $hours = hour();
        $days = day();
        $citys = $this->Generals_model->get_list('city2');
        $getMerchant = $this->Generals_model->get_list('merchant');
        $save_mechant = $this->Generals_model->interJoin('customer_id , merchant_id', 'merchant', 'id', 'saved_merchant', 'merchant_id');
        if (!$this->input->get('page') || $this->input->get('page') < 0) {
            $page = 1;
        } else {
            $page = $this->input->get('page');
        }
        $url = 'mon-an' . $name_mer . '&tai=' . $address;
        $total_rows = count($getMerchant);
        $row_per_page = 10;

        $pagination = ci_pagination($url, $total_rows, $row_per_page);
        $this->pagination->initialize($pagination);
        $link = $this->pagination->create_links();
        if (isset($keyword)) {
            $result = $this->Generals_model->search('merchant', ['name_merchant' => $keyword], $row_per_page, $row_per_page * ($page - 1));
        } elseif (isset($mon) || isset($tai)) {
            $result = $this->Generals_model->search('merchant', ['name_merchant' => $name_mer, 'address' => $address], $row_per_page, $row_per_page * ($page - 1));
        }
        $result = $this->globals->getNameCityDistric($result, $citys, $hours, $days, typeMerchant());
        // $array = [];
        foreach ($result as $k => $item) {
            foreach ($save_mechant as $v) {
                if ($v['merchant_id'] ==  $item['id']) {
                    $result[$k]['like'] = 1;
                }
            }
        }
        // // show($result);
        foreach ($result as $k => $item) {
            foreach ($save_mechant as $v) {
                if ($v['merchant_id'] ==  $item['id']) {
                    $result[$k]['like'] = 1;
                }
            }
        }
        if ($this->session->userdata('email') == false) {
            $data = [
                'isLogin' => 0,
                'cus' => $this->session->userdata('idCustomer'),
                'fav_mer' => $favourite_merchant,
                'link' => $link,
                'mechants' => $result,
                'header' => 'customer/include/header',
                'footer' => 'footer',
                'page_name' => 'customer/home/after-login/search',
                'style' => ['/css/header.css', '/css/banner.css', '/css/huongdan_dishhost.css', '/css/search.css', '/css/footer.css', '/css/pp_login.css'],
                'js' => ['/script/function/function.js', '/script/searchHome.js', '/script/after-login/header-after-lg.js', '/script/rice_store_detail.js', '/script/after-login/index.js', '/script/pp_login.js'],
            ];
            $this->load->view('index', $data);
        } else {
            $data = [
                'isLogin' => 1,
                'cus' => $this->session->userdata('idCustomer'),
                'fav_mer' => $favourite_merchant,
                'link' => $link,
                'mechants' => $result,
                'header' => 'customer/include/header_after_login',
                'footer' => 'footer',
                'page_name' => 'customer/home/after-login/search',
                'style' => ['/css/header-custumer-login.css', '/css/banner.css', '/css/huongdan_dishhost.css', '/css/search.css', '/css/footer.css', '/css/pp_login.css'],
                'js' => ['/script/function/function.js', '/script/searchHome.js', '/script/after-login/header-after-lg.js', '/script/rice_store_detail.js', '/script/after-login/index.js', '/script/pp_login.js'],
            ];
            $this->load->view('index', $data);
        }
    }
    public function searchMerchantCity()
    {
        $city = $this->input->post('id_city');
        $merchant  =   $this->Generals_model->get_list2('merchant', ['id_city' => $city]);
        var_dump($merchant);
    }
}
