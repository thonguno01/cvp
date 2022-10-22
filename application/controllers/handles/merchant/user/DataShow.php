<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataShow extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session'); 
        $this->load->model('Generals_model');
        $this->load->library('Globals');
        $this->load->helper('url');
        // $this->load->helper('function');
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
    }
    // Đăng kí 
    public function showCity()
    {
        $cit_id = $this->input->post('cit_id');
        $city = $this->Generals_model->get_where('city2', ['cit_parent' => $cit_id]);
        echo json_encode($city,JSON_UNESCAPED_UNICODE); 
    }
}

