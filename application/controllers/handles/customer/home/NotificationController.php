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
    public function seended()
    {
        $code = $this->input->post('code');
        $seen = $this->Generals_model->update('notification', ['code' => $code], ['status' => 0]);
        if ($seen == true) {
            $out = true;
        } else {
            $out = false;
        }
        echo json_encode($out);
    }
    public function seenAll()
    {
        $seen = $this->Generals_model->update('notification', ['customer_id' => $this->session->userdata('idCustomer')],  ['status' => 0]);
        if ($seen == true) {
            $out = true;
        } else {
            die();
        }
        echo json_encode($out);
    }
}
