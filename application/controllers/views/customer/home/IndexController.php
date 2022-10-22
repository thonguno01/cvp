<?php
defined('BASEPATH') or exit('No direct script access allowed');

class indexController extends CI_Controller
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
        $this->load->library('pagination');
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    }
    public function quanLiChung()
    {
        $time = hour();
        $day = day();
        $mechants =  $this->Generals_model->get_list2('merchant', ['authentic_food' => 1]);
        $citys = $this->Generals_model->get_list('city2');
        $save_mechant = $this->Generals_model->interJoin('customer_id , merchant_id', 'merchant', 'id', 'saved_merchant', 'merchant_id');
        $favourite_merchant = $this->Generals_model->get_list('favourite_merchant');
        // ===============
        if (!$this->input->get('page') || $this->input->get('page') < 0) {
            $page = 1;
        } else {
            $page = $this->input->get('page');
        }
        $url = '/';
        $total_rows = count($mechants);
        $row_per_page = 10;
        $pagination = ci_pagination($url, $total_rows, $row_per_page);
        $this->pagination->initialize($pagination);
        $link = $this->pagination->create_links();
        $data_page = $this->Generals_model->getList('merchant', ['authentic_food' => 1], $row_per_page, $row_per_page * ($page - 1));
        $result = $this->globals->getNameCityDistric($data_page, $citys, $time, $day);
        $mechants = $this->globals->getNameCityDistric($mechants, $citys, $time, $day);

        foreach ($result as $k => $item) {
            foreach ($save_mechant as $v) {
                if ($v['merchant_id'] ==  $item['id'] && $v['customer_id'] == $this->session->userdata('idCustomer')) {
                    $result[$item['id']]['like'] = 1;
                }
            }
        }

        // show($result);
        // die();
        // ================================
        if ($this->session->userdata('logined') == false) {
            $data = [
                'isLogin' => 0,
                'link' => $link,
                'mechants' => $result,
                'mechants1' => $mechants,
                'header' => 'customer/include/header',
                'footer' => 'footer',
                'page_name' => 'customer/home/after-login/index',
                'style' => ['/css/header.css',  '/css/banner.css', '/css/huongdan_dishhost.css', '/css/content_index.css', '/css/footer.css', '/css/pp_login.css'],
                'js' => ['/script/function/function.js', '/script/rice_store_detail.js', '/script/searchHome.js', '/script/after-login/index.js', '/script/pp_login.js'],
            ];
            $this->load->view('index', $data);
        } else {
            $data = [
                'isLogin' => 1,
                'cus' => $this->session->userdata('idCustomer'),
                'fav_mer' => $favourite_merchant,
                'link' => $link,
                'mechants1' => $mechants,
                'mechants' => $result,
                'header' => 'customer/include/header_after_login',
                'footer' => 'footer',
                'page_name' => 'customer/home/after-login/index',
                'style' => ['/css/header-custumer-login.css',  '/css/banner.css', '/css/huongdan_dishhost.css', '/css/content_index.css', '/css/footer.css'],
                'js' => ['/script/function/function.js', '/script/after-login/header-after-lg.js', '/script/after-login/index.js', '/script/searchHome.js', '/script/rice_store_detail.js'],
            ];
            $this->load->view('index', $data);
        }
    }
    public function detailMerchant($id)
    {
        $hours = hour();
        $days = day();
        $citys = $this->Generals_model->get_list('city2');
        $mechants =  $this->Generals_model->get_one_where_array('merchant', ['id' => $id]);
        $foods =  $this->Generals_model->get_one_where_array('detail_menu', ['merchant_id' => $id]);
        $result = $this->globals->getNameCityDistric($mechants, $citys, $hours, $days, typeMerchant());
        $combos = $this->Generals_model->get_one_where_array('combo', ['merchant_id' => $id]);
        $groups = $this->Generals_model->get_one_where_array('group', ['merchant_id' => $id]);
        $rsCombo = comboAndGroup($combos, 'detail_menu_combo_id', $this);
        $rsGroup = comboAndGroup($groups, 'detail_menu_group_id', $this);
        $addressOrder = $this->Generals_model->get_list('address_receive');
        $favourite_merchant = $this->Generals_model->get_list('favourite_merchant');
        // show($favourite_merchant);
        // die();
        if ($this->session->userdata('logined') == false) {
            if (!empty($mechants)) {
                $data = [
                    'cus' => $this->session->userdata('idCustomer'),
                    'fav_mer' => $favourite_merchant,
                    'idMerchanrt' => $id,
                    'merchants' => $result,
                    'foods' => $foods,
                    'combos' => $combos,
                    'groups' => $groups,
                    'comboDetails' => $rsCombo,
                    'groupDetails' => $rsGroup,
                    'header' => 'customer/include/header',
                    'footer' => 'footer',
                    'page_name' => 'customer/home/before-login/detail-mechant',
                    'style' => ['/css/header.css', '/css/banner.css', '/css/rice_store_detail.css', '/css/footer.css'],
                    'js' => ['/script/function/function.js', '/script/rice_store_detail.js'],
                ];
                $this->load->view('index', $data);
            } else {
                echo 'Không có quán ăn nào';
            }
        } else {
            if (!empty($mechants)) {
                $data = [
                    'cus' => $this->session->userdata('idCustomer'),
                    'fav_mer' => $favourite_merchant,
                    'idMerchanrt' => $id,
                    'addressOrder' => $addressOrder,
                    'foods' => $foods,
                    'comboDetails' => $rsCombo,
                    'groupDetails' => $rsGroup,
                    'groups' => $groups,
                    'combos' => $combos,
                    'merchants' => $result,
                    'header' => 'customer/include/header_after_login',
                    'footer' => 'footer',
                    'page_name' => 'customer/home/after-login/detail-merchant',
                    'style' => ['/css/header-custumer-login.css', '/css/rice_store_detail_after_lg.css', '/css/popup_detail_history_store.css', "/css/popup_change_address_recive.css", '/css/popup-add-address.css', '/css/popup-buy-success.css', '/css/footer.css'],
                    'js' => ['/script/function/function.js', '/script/after-login/header-after-lg.js', '/script/rice_store_detail.js'],
                ];
                $this->load->view('index', $data);
            } else {
                echo 'Không có quán ăn nào';
            }
        }
    }
}
