<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FeedbackController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->library('Globals');
        $this->load->helper('feedback');
        $this->load->helper('General_helper');
        $this->load->model('Generals_model');
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    }

    public function getAll()
    {
        $checkTitle = $this->input->post('checkTit');
        $idMer = $this->input->post('idMer');
        $order =  $this->Generals_model->get_list('order_dish');
        if ($checkTitle == 'video') {
            $result = getVideoAllAjax($order,   $idMer);
        } elseif ($checkTitle == '1') {
            $result = getImgAllAjax($order, $idMer, '1');
        } elseif ($checkTitle == '2') {
            $result = getImgAllAjax($order, $idMer, '2');
        } elseif ($checkTitle == '3') {
            $result = getImgAllAjax($order, $idMer, '3');
        }
        echo json_encode($result);
    }
    public function feedBackAjax()
    {
        $checkTitle = $this->input->post('checkTitle');
        $idMer = $this->input->post('idMer');
        if ($checkTitle == '0') {
            $order0 =  $this->Generals_model->get_list2('order_dish', ['img_order' => null]);
            $result = getFeedbackAjax($order0, $idMer, $this, lable());
        } elseif ($checkTitle == '1') {
            $order1 =  $this->Generals_model->get_where_not_null('order_dish', 'img_order');
            $result = getFeedbackAjax($order1, $idMer, $this, lable());
        } elseif ($checkTitle == 'vi') {
            $order =  $this->Generals_model->get_where_not_null('order_dish', 'video_order');
            $result = getFeedbackAjax($order, $idMer, $this, lable());
        }
        echo json_encode($result);
    }
}
