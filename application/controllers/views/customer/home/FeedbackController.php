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
            $this->load->helper('General_helper');
            $this->load->helper('feedback');
            $this->load->model('Generals_model');
            $this->load->model('Customer_model');
            $this->load->library('pagination');
            date_default_timezone_set('Asia/Ho_Chi_Minh');
        }
        public function feedback($id)
        {
            $checkIdMerchant = $this->Generals_model->get_one_where_array('merchant', ['id' => $id]);
            if ($checkIdMerchant != null) {
                $hours = hour();
                $days = day();
                $citys = $this->Generals_model->get_list('city2');
                $result = $this->globals->getNameCityDistric($checkIdMerchant, $citys, $hours, $days, typeMerchant());
                $merYeuThich = $this->Generals_model->get_list2('favourite_merchant', ['merchant_id' => $id]);
                $order_dish =  $this->Generals_model->get_list2('order_dish', ['merchant_id' => $id]);

                // =================================================================
                if (!$this->input->get('page') || $this->input->get('page') < 0) {
                    $page = 1;
                } else {
                    $page = $this->input->get('page');
                }
                $url = 'customer-feedback-f' . $id;
                $total_rows = count($order_dish);
                $row_per_page = 10;
                $pagination = ci_pagination($url, $total_rows, $row_per_page);
                $this->pagination->initialize($pagination);
                $link = $this->pagination->create_links();
                $outPut =  $this->Customer_model->getList('order_dish', ['check_feed_back' => 1], $row_per_page, $row_per_page * ($page - 1));
                $star = countStar($order_dish);
                $imgAll = getImgAll($order_dish, 'img_order', $id);
                $feedBack = getFeedback($outPut, $id, $this, lable());
                // show($order_dish);
                // show($outPut);
                // die();
                if ($this->session->userdata('logined') == false) {
                    $data = [
                        'link' => $link,
                        'feedbacks' => $feedBack,
                        'imgAlls' => $imgAll,
                        'countStar' => $star,
                        'merYeuThich' => $merYeuThich,
                        'merchants' => $result,
                        'idMer' => $id,
                        'header' => 'customer/include/header',
                        'footer' => 'footer',
                        'page_name' => 'customer/home/before-login/feedback',
                        'style' => ['/css/header.css',  '/css/feed-back-store.css', '/css/footer.css'],
                        'js' => ['/script/function/function.js', '/script/feedback.js'],
                    ];
                    $this->load->view('index', $data);
                } else {
                    $data = [
                        'link' => $link,
                        'feedbacks' => $feedBack,
                        'imgAlls' => $imgAll,
                        'countStar' => $star,
                        'merYeuThich' => $merYeuThich,
                        'merchants' => $result,
                        'idMer' => $id,
                        'header' => 'customer/include/header_after_login',
                        'footer' => 'footer',
                        'page_name' => 'customer/home/after-login/feedback',
                        'style' => ['/css/header-custumer-login.css',  '/css/feed-back-store.css', '/css/footer.css'],
                        'js' => ['/script/function/function.js', '/script/after-login/header-after-lg.js', '/script/feedback.js'],
                    ];
                    $this->load->view('index', $data);
                }
            } else {
                echo "404 page is not found";
            }
        }
    }
