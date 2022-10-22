<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HistoryOrderController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('Globals');
        $this->load->helper('General_helper');
        // $this->load->helper('History_helper');
        $this->load->model('Generals_model');
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    }
    public function ppSeeDetail()
    {
        $code = $this->input->post('code');
        $res = $this->Generals_model->get_one_where_array_row('order_dish', ['code' => $code]);
        $address =  $this->Generals_model->get_one_where_array_row('address_receive', ['id' => $res['addresss_id']]);
        $merchant =  $this->Generals_model->get_one_where_array_row('merchant', ['id' => $res['merchant_id']]);
        $citys = $this->Generals_model->get_list('city2');
        // $resMerchant = $this->globals->getCityDistric($merchant, $citys);
        $customer =  $this->Generals_model->get_one_where_array_row('customer', ['id' => $res['customer_id']]);
        $dish =  explode(',', $res['dish_id']);
        for ($i = 0; $i < count($dish); $i++) {
            $dish1[] = explode('-', $dish[$i]);
            if ($dish1[$i][2] == 0) {
                $name[] = $this->Generals_model->get_one_where_select_ar('detail_menu', 'name_food', ['id' => $dish[$i][0]]);
                $money[] = $this->Generals_model->get_one_where_select_ar('detail_menu', 'price_food', ['id' => $dish[$i][0]]);
                $img[] = $this->Generals_model->get_one_where_select_ar('detail_menu', 'img_food', ['id' => $dish[$i][0]]);
            } else {
                $name[] = $this->Generals_model->get_one_where_select_ar('combo', 'name_combo', ['id' => $dish[$i][0]]);
                $money[] = $this->Generals_model->get_one_where_select_ar('combo', 'price_combo', ['id' => $dish[$i][0]]);
                $img[] = $this->Generals_model->get_one_where_select_ar('combo', 'img_combo', ['id' => $dish[$i][0]]);
            }
            $qty[] = $dish1[$i][1];
            $info[$i][] = [
                'qty' => $dish1[$i][1],
                'name' => $name[$i],
                'money' => $money[$i],
                'img' => $img[$i],
            ];
        }
        $out = [
            'info' => $info,
            'totalbefore' => $res['total_before'],
            'totalAfter' => $res['total_after'],
            'feeShip' => $res['fee_ship'],
            'sale' => $res['sale'],
            'note' => $res['note'],
            'address' => $address,
            'customer' => $customer,
            'merchant' => $merchant,
            'city' => $citys,
            'phoneShipper' => $res['phone_ship'],
            'code' => $code
        ];
        echo json_encode($out);
    }
    public function cancelOrder()
    {
        $reason1 = $this->input->post('reason1');
        $reason2 = $this->input->post('reason2');
        $code = $this->input->post('code');
        $idMer = $this->input->post('idMer');
        $idCus = $this->input->post('idCus');
        $saveCancle = [
            'customer_id' => $idCus,
            'merchant_id' => $idMer,
            'code' => $code,
            'content_cus' => 3,
            'content_mer' => 3,
            'created_at' => getdateNotice(),
        ];
        if ($reason1 == 0) {
            $reason1 == null;
        }
        $check = $this->Generals_model->update('order_dish', ['code' => $code], ['status' => 3, 'reason1' => $reason1, 'reason2' => $reason2]);
        if ($check == true) {
            $this->Generals_model->insert('notification', $saveCancle);
            $outPut['mes'] = 'Bạn đã hủy thành công 1 đơn hàng ';
            $outPut['rs'] = true;
        } else {
            $outPut['rs'] = false;
            $outPut['mes'] = 'Bạn hủy không thành công 1 đơn hàng!! ';
        }
        echo json_encode($outPut);
    }
    public function saveFeedBack()
    {
        if (isset($_POST['btn_savefeedback'])) {

            $quality = $this->input->post('rating');

            $waitress = $this->input->post('waitress');
            $price = $this->input->post('price');
            $comment = $this->input->post('comment');

            $code = $this->input->post('code');

            $save = array(
                'ratting_quality' => $quality,
                'ratting_service' => $waitress,
                'ratting_price' => $price,
                'comment' => $comment,
                'check_feed_back' => 1,
            );

            $update = $this->Generals_model->update('order_dish', ['code' => $code], $save);
            if ($update == true) {
                $out = true;
            }
            if (isset($_FILES["fileImg"]["name"])) {
                $img = implode(',', $_FILES["fileImg"]["name"]);
                $brand = $this->input->post('brand');
                for ($i = 0; $i < count($_FILES["fileImg"]["name"]); $i++) {
                    $array[] = $_FILES["fileImg"]["name"][$i] . '|' . $brand[$i];
                }
                $this->Generals_model->update('order_dish', ['code' => $code], ['img_order' => $img, 'lable_img' => implode(',', $array), 'label' => $brand]);
                foreach ($_FILES['fileImg']['name'] as $key => $val) {
                    $target_directory = "upload/feed-back/";
                    $target_file = $target_directory . basename($_FILES['fileImg']['name'][$key]);
                    $filetype = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    if (move_uploaded_file($_FILES["fileImg"]["tmp_name"][$key], $target_file)) {
                        $out = true;
                    } else {
                        die();
                    }
                }
            }
            if (isset($_FILES["imageFileVD"]["name"])) {
                $video = implode(',', $_FILES["imageFileVD"]["name"]);
                $brand = $this->input->post('brand');
                $this->Generals_model->update('order_dish', ['code' => $code], ['video_order' => $video, 'label' => $brand]);
                foreach ($_FILES['imageFileVD']['name'] as $key => $val) {
                    $target_directory = "upload/feed-back/";
                    $target_file = $target_directory . basename($_FILES['imageFileVD']['name'][$key]);
                    $filetype = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    if (move_uploaded_file($_FILES["imageFileVD"]["tmp_name"][$key], $target_file)) {
                        $out = true;
                    } else {
                        die();
                    }
                }
            }
            echo json_encode($out);
        }
    }
    public function likeMerchant()
    {
        $code = $this->input->post('code');
        $check = $this->Generals_model->get_one_where('order_dish', ['code' => $code]);
        if ($check->like == null) {
            $update =  $this->Generals_model->update('order_dish',  ['code' => $code], ['like'  => 1]);
            if ($update == true) {
                $out['rs'] =  'add';
            } else {
                die();
            }
        } else {
            $update1 =  $this->Generals_model->update('order_dish',  ['code' => $code], ['like'  => null]);
            if ($update1 == true) {
                $out['rs'] =  'del';
            } else {
                die();
            }
        }
        echo json_encode($out);
    }
    public function historySearch()
    {
        $email = $this->session->userdata('email');
        $check_ath = $this->Generals_model->get_one_where('customer', ['email' => $email]);
        sleep(1);
        $status = $this->input->post('status');
        $ngay_bd = trim($this->input->post('ngay_bd'));
        $ngay_kt = trim($this->input->post('ngay_kt'));
        if ($ngay_bd != '' && $ngay_kt == '' && $status == 4) {
            $data_order = $this->Generals_model->get_list2('order_dish', ['customer_id' => $check_ath->id, 'created_at >' => strtotime($ngay_bd)]);
            $data[] = $data_order;
        } elseif ($ngay_bd == '' && $ngay_kt != '' && $status == 4) {
            $data_order = $this->Generals_model->get_list2('order_dish', ['customer_id' => $check_ath->id, 'created_at <' => strtotime($ngay_kt)]);
            $data[] = $data_order;
        } elseif ($ngay_bd != '' && $ngay_kt != '' && $status == 4) {
            $data_order = $this->Generals_model->get_list2('order_dish', ['customer_id' => $check_ath->id, 'created_at >' => strtotime($ngay_bd), 'created_at <' => strtotime($ngay_kt)]);
            $data[] = $data_order;
        } elseif ($ngay_bd != '' && $ngay_kt == '' && $status != 4) {
            $data_order = $this->Generals_model->get_list2('order_dish', ['customer_id' => $check_ath->id, 'status' => $status, 'created_at >' => strtotime($ngay_bd)]);
            $data[] = $data_order;
        } elseif ($ngay_bd == '' && $ngay_kt != '' && $status != 4) {
            $data_order = $this->Generals_model->get_list2('order_dish', ['customer_id' => $check_ath->id, 'status' => $status, 'created_at <' => strtotime($ngay_kt)]);
            $data[] = $data_order;
        } elseif ($ngay_bd != '' && $ngay_kt != '' && $status != 4) {
            $data_order = $this->Generals_model->get_list2('order_dish', ['customer_id' => $check_ath->id, 'status' => $status, 'created_at >' => strtotime($ngay_bd), 'created_at <' => strtotime($ngay_kt)]);
            $data[] = $data_order;
        } elseif ($status == 4 && $ngay_kt == ''  && $ngay_bd == '') {
            $data_order = $this->Generals_model->get_list2('order_dish', ['customer_id' => $check_ath->id]);
            $data[] = $data_order;
        } elseif ($status != 4 && $ngay_kt == ''  && $ngay_bd == '') {
            $data_order = $this->Generals_model->get_list2('order_dish', ['customer_id' => $check_ath->id, 'status' => $status]);
            $data[] = $data_order;
        }
        $data['address'] = $this->Generals_model->get_list('address_receive');
        echo json_encode($data);
    }
}
