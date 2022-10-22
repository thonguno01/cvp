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
        $this->load->model('Generals_model');
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    }

    public function actionLike()
    {
        $idCustomer = $this->session->userdata('idCustomer');
        $idMechant = $this->input->post('idMechant');
        $likeMerchant = array(
            'customer_id' => $idCustomer,
            'merchant_id' => $idMechant,
        );
        $checkLikeMachant = $this->Generals_model->get_one_where('saved_merchant', ['merchant_id' => $idMechant, 'customer_id' => $idCustomer]);
        if ($checkLikeMachant == null) {
            $checkInsert =   $this->Generals_model->insert('saved_merchant', $likeMerchant);
            if ($checkInsert == true) {
                $ouput['mesage'] = 'Đã lưu 1 quán ăn ';
                $ouput['result'] = 'add';
            } else {
                $ouput['mesage'] = 'không lưu được quán ăn này';
                $ouput['result'] = 'false';
            }
        } else {
            $checkDelete =   $this->Generals_model->delete_where('saved_merchant', $likeMerchant);
            if ($checkDelete == true) {
                $ouput['mesage'] = 'Đã xóa 1 quán ăn đã lưu';
                $ouput['result'] = 'del';
            } else {
                $ouput['mesage'] = 'Không xóa được quán ăn đã lưu này ';
                $ouput['result'] = 'false';
            }
        }
        echo json_encode($ouput);
    }
    public function actionFavourite()
    {
        $idCustomer = $this->session->userdata('idCustomer');
        $idMechant = $this->input->post('idMer');
        $likeMerchant = array(
            'customer_id' => $idCustomer,
            'merchant_id' => $idMechant,
        );
        $checkLikeMachant = $this->Generals_model->get_one_where('favourite_merchant', $likeMerchant);
        if ($checkLikeMachant == null) {
            $checkInsert =   $this->Generals_model->insert('favourite_merchant', $likeMerchant);
            if ($checkInsert == true) {
                $ouput['mesage'] = 'Đã thêm thành công 1 quán ăn yêu thích';
                $ouput['result'] = 'add';
            } else {
                $ouput['mesage'] = 'Không thêm được quán ăn yêu thích';
                $ouput['result'] = 'false';
            }
        } else {
            $checkDelete =   $this->Generals_model->delete_where('favourite_merchant', $likeMerchant);
            if ($checkDelete == true) {
                $ouput['mesage'] = 'Đã xóa thành công 1 quán ăn yêu thích';
                $ouput['result'] = 'del';
            } else {
                $ouput['mesage'] = 'Không thêm được quán ăn yêu thích';
                $ouput['result'] = 'false';
            }
        }
        echo json_encode($ouput);
    }
}
