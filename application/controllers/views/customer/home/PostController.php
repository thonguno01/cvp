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
        $this->load->helper('post');
        $this->load->model('Generals_model');
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    }
    public function post($id)
    {
        $checkIdMerchant = $this->Generals_model->get_one_where_array('merchant', ['id' => $id]);
        if ($checkIdMerchant != null) {
            $hours = hour();
            $days = day();
            $citys = $this->Generals_model->get_list('city2');
            $result = $this->globals->getNameCityDistric($checkIdMerchant, $citys, $hours, $days, typeMerchant());
            $post = $this->Generals_model->get_list2_ORDER_BY('post', ['merchant_id' => $id], 'created_at');
            $merchantPost = getInfoMerchant($post, $checkIdMerchant);
            $cmtPost =  $this->Generals_model->get_list('comment_post');
            $comments = getInfoCmt($cmtPost, $this);
            $likePost = $this->Generals_model->get_list('like_post');
            // show($comments);
            // die();
            if ($this->session->userdata('logined') == false) {
                $data = [
                    'merchants' => $result,
                    'likePosts' => $likePost,
                    'idMer' => $id,
                    'posts' => $merchantPost,
                    'customer' => $this->Generals_model->get_one_where_array_row('customer', ['email' => $this->session->userdata('email')]),
                    'comments' => $comments,
                    'header' => 'customer/include/header',
                    'footer' => 'footer',
                    'page_name' => 'customer/home/before-login/post',
                    'style' => ['/css/header.css',  '/css/post.css', '/css/footer.css'],
                    'js' => ['/script/function/function.js', '/script/post.js'],
                ];
                $this->load->view('index', $data);
            } else {
                $data = [
                    'likePosts' => $likePost,
                    'merchants' => $result,
                    'idMer' => $id,
                    'comments' => $comments,
                    'customer' => $this->Generals_model->get_one_where_array_row('customer', ['email' => $this->session->userdata('email')]),
                    'posts' => $merchantPost,
                    'header' => 'customer/include/header_after_login',
                    'footer' => 'footer',
                    'page_name' => 'customer/home/after-login/post',
                    'style' => ['/css/header-custumer-login.css',  '/css/post_customer_login.css', '/css/popup_report_post.css', '/css/footer.css'],
                    'js' => ['/script/function/function.js', '/script/after-login/header-after-lg.js', '/script/after-login/post.js'],
                ];
                $this->load->view('index', $data);
            }
        } else {
            echo "404 page is not found";
        }
    }
}
