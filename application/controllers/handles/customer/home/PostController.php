<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PostController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->library('Globals');
        $this->load->helper('General_helper');
        $this->load->model('Generals_model');
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    }
    public function sendComment()
    {
        $customer = $this->Generals_model->get_one_where_array_row('customer', ['email' => $this->session->userdata('email')]);
        $cmt = $this->input->post('comment');
        $idPost = $this->input->post('idPost');
        $idCustomer = $customer['id'];
        $saveSend = [
            'post_id' => $idPost,
            'customer_id' => $idCustomer,
            'content' => $cmt,
            'created_at' => getTime(),
        ];
        $send =  $this->Generals_model->get_id_insert($saveSend);
        $out = [
            'content' => $cmt,
            'result' => true,
            'img' => $customer['img_avata'],
            'name_cus' => $customer['name'],
            'idComment' => $send
        ];
        echo json_encode($out);
    }
    public function sendCommentReply()
    {
        $customer = $this->Generals_model->get_one_where_array_row('customer', ['email' => $this->session->userdata('email')]);
        $cmt = $this->input->post('content');
        $idPost = $this->input->post('idPost');
        $parent = $this->input->post('idComment');
        $idCustomer = $customer['id'];
        $saveSend = [
            'post_id' => $idPost,
            'customer_id' => $idCustomer,
            'content' => $cmt,
            'parent_id' => $parent,
            'created_at' => getTime(),
        ];
        $send =  $this->Generals_model->insert('comment_post', $saveSend);
        if ($send == true) {
            $out = [
                'content' => $cmt,
                'result' => true,
                'img' => $customer['img_avata'],
                'name_cus' => $customer['name'],
            ];
        } else {
            die();
        }
        echo json_encode($out);
    }

    public function getInfoReply()
    {
        $customer = $this->Generals_model->get_one_where_array_row('customer', ['email' => $this->session->userdata('email')]);
        echo json_encode($customer);
    }
    public function likePost()
    {
        $customer = $this->Generals_model->get_one_where_array_row('customer', ['email' => $this->session->userdata('email')]);
        $idPost = $this->input->post('idPost');
        $saveLike = [
            'post_id' => $idPost,
            'like_pst' => 1,
            'customer_id' => $customer['id'],
            'created_at' => getTime(),
        ];
        $checkLike = [
            'post_id' => $idPost,
            'customer_id' => $customer['id'],
        ];
        $checkInser = $this->Generals_model->get_one_where('like_post', $checkLike);
        if ($checkInser == null) {
            $check =  $this->Generals_model->insert('like_post', $saveLike);
            if ($check == true) {
                $out['rs'] = 'add';
            } else {
                die();
            }
        } else {
            $check1 =  $this->Generals_model->delete_where('like_post', $checkLike);
            if ($check1 == true) {
                $out['rs'] = 'del';
            } else {
                die();
            }
        }
        echo json_encode($out);
    }
    public function reportPost()
    {
        $customer = $this->Generals_model->get_one_where_array_row('customer', ['email' => $this->session->userdata('email')]);
        $reason1 = $this->input->post('reason1');
        $reason2 = $this->input->post('reason2');
        $idPost = $this->input->post('idPost');
        $idCus = $customer['id'];
        $saveReport =  [
            'post_id' => $idPost,
            'customer_id' => $idCus,
            'reason1' => $reason1,
            'reason2' => $reason2,
            'created_at' => getTime(),
        ];
        $check =  $this->Generals_model->insert('report_post', $saveReport);
        if ($check == true) {
            $out['rs'] = true;
        } else {
            die();
        }
        echo json_encode($out);
    }
}
