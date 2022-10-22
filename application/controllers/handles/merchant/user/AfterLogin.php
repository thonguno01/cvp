<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AfterLogin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->model('Generals_model');
        $this->load->library('Globals');
        $this->load->helper('url');
        $this->load->helper('General_helper');
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
    }
    public function update_detail_merchant()
    {
        $email = $this->session->userdata('email_mer');

        $name_merchant = $this->input->post('name_merchant');
        $phone_merchant = $this->input->post('phone_merchant');
        $typical_food = $this->input->post('typical_food');
        $id_city = $this->input->post('id_city');
        $id_district = $this->input->post('id_district');
        $add_merchant = $this->input->post('add_merchant');
        // $update_detail = $this->Generals_model->get_one_where('merchant', ['email' => $email]);
        $save = [
            'name_merchant' => $name_merchant,
            'phone' => $phone_merchant,
            'typical_food' => $typical_food,
            'id_city' => $id_city,
            'id_district' => $id_district,
            'address' => $add_merchant,
        ];
        $update =  $this->Generals_model->update('merchant', ['email' => $email], $save);
        if ($update == TRUE) {
            $out = [
                'rs' => true,
                'msg' => "Cập nhật thành công!",
            ];
        } else {
            $out = [
                'msg' => "Cập nhật không thành công!",
            ];
        }
        echo json_encode($out);
    }
    public function update_detail_merchant_2_upload()
    {
        $email = $this->session->userdata('email_mer');

        // $img_avatar = basename($_FILES['img_avt']['name']);
        // $img_cover = basename($_FILES['img_cover']['name']);
        $path = "upload/merchant/infor/";
        // $full_path_avt = $path . $img_avatar;
        // $full_path_cover = $path . $img_cover;
        
        if(basename($_FILES['img_avt']['name']) != '' && basename($_FILES['img_cover']['name']) == ''){
            $img_avatar = basename($_FILES['img_avt']['name']);
            $full_path_avt = $path . $img_avatar;
            move_uploaded_file($_FILES['img_avt']['tmp_name'], $full_path_avt);
            $upload_profile = $this->Generals_model->update('merchant',['email' => $email], ['img_avatar' => $img_avatar]);
        }
        if(basename($_FILES['img_avt']['name']) == '' && basename($_FILES['img_cover']['name']) != ''){
            $img_cover = basename($_FILES['img_cover']['name']);
            $full_path_cover = $path . $img_cover;
            move_uploaded_file($_FILES['img_cover']['tmp_name'], $full_path_cover);
            $upload_profile = $this->Generals_model->update('merchant',['email' => $email], ['img_cover' => $img_cover]);
        }
        if(basename($_FILES['img_avt']['name']) != '' && basename($_FILES['img_cover']['name']) != ''){
            $img_avatar = basename($_FILES['img_avt']['name']);
            $img_cover = basename($_FILES['img_cover']['name']);
            $full_path_avt = $path . $img_avatar;
            $full_path_cover = $path . $img_cover;
            $save = [
                'img_avatar' => $img_avatar,
                'img_cover' => $img_cover,
            ];
            move_uploaded_file($_FILES['img_avt']['tmp_name'], $full_path_avt);
            move_uploaded_file($_FILES['img_cover']['tmp_name'], $full_path_cover);
            $upload_profile = $this->Generals_model->update('merchant',['email' => $email], $save);
        }
    }
    public function update_detail_merchant_2()
    {
        $email = $this->session->userdata('email_mer');

        $day_open = $this->input->post('day_open');
        $time_start = $this->input->post('time_start');
        $time_end = $this->input->post('time_end');
        $type_merchant = $this->input->post('type_merchant');
        $key_search = $this->input->post('key_search');
        $fee_merchant = $this->input->post('fee_merchant');
        $mota_merchant = $this->input->post('mota_merchant');
        $save = [
            'day_open' => $day_open,
            'time_start' => $time_start,
            'time_end' => $time_end,
            'type_merchant' => $type_merchant,
            'search_key' => $key_search,
            'fee_ship' => $fee_merchant,
            'description' => $mota_merchant,
        ];
        $update_2 =  $this->Generals_model->update('merchant', ['email' => $email], $save);
        if ($update_2 == TRUE) {
            $out = [
                'rs' => true,
                'msg' => "Cập nhật thành công!",
            ];
        } else {
            $out = [
                'msg' => "Cập nhật không thành công!",
            ];
        }
        echo json_encode($out);
    }
    public function post()
    {
        $path = "upload/merchant/food/";
        $content = $this->input->post('content_post');
        $img = implode(",",$_FILES['imageFile']['name']);
        $video = basename($_FILES['imageFileVD']['name']);
        $full_path = $path . basename($_FILES["imageFileVD"]["name"]);
        $merchant_id = $this->input->post('merchant_id');
        move_uploaded_file($_FILES['imageFileVD']['tmp_name'], $full_path);
        foreach ($_FILES['imageFile']['name'] as $v) {
			$des_full_path[] = $path . '/' . basename($v);
		}
		for ($i = 0; $i < count($des_full_path); $i++) {
			move_uploaded_file($_FILES["imageFile"]['tmp_name'][$i], $des_full_path[$i]);
		}
        $get_date = getTime();

        $save = [
            'content' => $content,
            'merchant_id' => $merchant_id,
            'img_video' => $img,
            'video' => $video,
            'created_at' => $get_date,
        ];
        $post =  $this->Generals_model->insert('post', $save);
    }
    public function search_lich_su_don_hang()
    {
        sleep(1);
        $email = $this->session->userdata('email_mer');
        $status = $this->input->post('status');
        $check_ath = $this->Generals_model->get_one_where('merchant', ['email' => $email]);
        $ngay_bd = trim($this->input->post('ngay_bd'));
        $ngay_kt = trim($this->input->post('ngay_kt'));
        if ($ngay_bd != '' && $ngay_kt == '' && $status == 4) {
            $data_order = $this->Generals_model->get_list2('order_dish', ['merchant_id' => $check_ath->id, 'created_at >' => strtotime($ngay_bd)]);
            $data[] = $data_order;
        } elseif ($ngay_bd == '' && $ngay_kt != '' && $status == 4) {
            $data_order = $this->Generals_model->get_list2('order_dish', ['merchant_id' => $check_ath->id, 'created_at <' => strtotime($ngay_kt)]);
            $data[] = $data_order;
        } elseif ($ngay_bd != '' && $ngay_kt != '' && $status == 4) {
            $data_order = $this->Generals_model->get_list2('order_dish', ['merchant_id' => $check_ath->id, 'created_at >' => strtotime($ngay_bd), 'created_at <' => strtotime($ngay_kt)]);
            $data[] = $data_order;
        } elseif ($ngay_bd != '' && $ngay_kt == '' && $status != 4) {
            $data_order = $this->Generals_model->get_list2('order_dish', ['merchant_id' => $check_ath->id, 'status' => $status, 'created_at >' => strtotime($ngay_bd)]);
            $data[] = $data_order;
        } elseif ($ngay_bd == '' && $ngay_kt != '' && $status != 4) {
            $data_order = $this->Generals_model->get_list2('order_dish', ['merchant_id' => $check_ath->id, 'status' => $status, 'created_at <' => strtotime($ngay_kt)]);
            $data[] = $data_order;
        } elseif ($ngay_bd != '' && $ngay_kt != '' && $status != 4) {
            $data_order = $this->Generals_model->get_list2('order_dish', ['merchant_id' => $check_ath->id, 'status' => $status, 'created_at >' => strtotime($ngay_bd), 'created_at <' => strtotime($ngay_kt)]);
            $data[] = $data_order;
        } elseif ($status == 4 && $ngay_kt == ''  && $ngay_bd == '') {
            $data_order = $this->Generals_model->get_list2('order_dish', ['merchant_id' => $check_ath->id]);
            $data[] = $data_order;
        } elseif ($status != 4 && $ngay_kt == ''  && $ngay_bd == '') {
            $data_order = $this->Generals_model->get_list2('order_dish', ['merchant_id' => $check_ath->id, 'status' => $status]);
            $data[] = $data_order;
        }
        echo json_encode($data);
    }
    public function delete_combo()
    {
        $id = $this->input->post('id');
        $delete =  $this->Generals_model->delete_where('combo', ['id' => $id]);
    }
    public function delete_group()
    {
        $id = $this->input->post('id');
        $delete =  $this->Generals_model->delete_where('group', ['id' => $id]);
    }
    public function delete_day()
    {
        $id = $this->input->post('id');
        $delete =  $this->Generals_model->delete_where('detail_menu', ['id' => $id]);
    }
    public function delete_detail()
    {
        $id = $this->input->post('id');
        $delete =  $this->Generals_model->delete_where('detail_menu', ['id' => $id]);
    }
    public function edit_group()
    {
        $id = $this->input->post('id');
        $name_group = $this->input->post('name_group');
        $detail_menu_group_id = $this->input->post('detail_menu_group_id');
        $save = [
            'name_group' => $name_group,
            'detail_menu_group_id' => $detail_menu_group_id,
        ];
        $update =  $this->Generals_model->update('group', ['id' => $id], $save);
        $out = [
            'rs' => true,
            'msg' => "Cập nhật thành công!",
        ];
        echo json_encode($out);
    }
    public function edit_combo()
    {
        $email = $this->session->userdata('email_mer');
        $check_ath = $this->Generals_model->get_one_where('merchant', ['email' => $email]);

        $id = $this->input->post('id');
        $name_combo = $this->input->post('name_combo');
        $detail_menu_combo_id = $this->input->post('detail_menu_combo_id');
        $price_combo = $this->input->post('price_combo');
        $sale = $this->input->post('sale');
        $save = [
            'name_combo' => $name_combo,
            'detail_menu_combo_id' => $detail_menu_combo_id,
            'price_combo' => $price_combo,
            'sale' => $sale,
        ];
        $check =  $this->Generals_model->get_one_where('combo', ['name_combo' => $name_combo, 'id !=' => $id, 'merchant_id' => $check_ath->id]);
        if($check == NULL){
        $update =  $this->Generals_model->update('combo', ['id' => $id], $save);
        $out = [
            'rs' => true,
            'msg' => "Cập nhật thành công!",
        ];
        }
        else{
            $out = [
                'rs' => true,
                'msg' => "Trùng tên Combo. Vui lòng đặt lại!",
            ];
        }
        echo json_encode($out);
    }
    public function add_shipper()
    {
        $id = $this->input->post('id');
        $name_ship = $this->input->post('name_ship');
        $phone_ship = $this->input->post('phone_ship');
        $save = [
            'name_ship' => $name_ship,
            'phone_ship' => $phone_ship,
        ];
        $update =  $this->Generals_model->update('order_dish', ['id' => $id], $save);
        $out = [
            'rs' => true,
            'msg' => "Thêm shipper thành công!",
        ];
        echo json_encode($out);
    }
    public function thanh_cong()
    {
        $code = $this->input->post('code');
        $data_order =  $this->Generals_model->get_one_where('order_dish', ['code' => $code]);
        $save = [
            'customer_id' => $data_order->customer_id,
            'merchant_id' => $data_order->merchant_id,
            'code' => $code,
            'content_cus' => 2,
            'content_mer' => 2,
            'created_at' => strtotime(getTime()),
        ];
        $insert_noti = $this->Generals_model->insert('notification', $save);
        $update =  $this->Generals_model->update('order_dish', ['code' => $code], ['status' => 2]);
        $out = [
            'rs' => true,
            'msg' => "Giao hàng thành công!",
        ];
        echo json_encode($out);
    }
    public function khong_thanh_cong()
    {
        $code = $this->input->post('code');
        $data_order =  $this->Generals_model->get_one_where('order_dish', ['code' => $code]);
        $save = [
            'customer_id' => $data_order->customer_id,
            'merchant_id' => $data_order->merchant_id,
            'code' => $code,
            'content_cus' => 4,
            'content_mer' => 4,
            'created_at' => strtotime(getTime()),
        ];
        $insert_noti = $this->Generals_model->insert('notification', $save);
        $update =  $this->Generals_model->update('order_dish', ['code' => $code], ['status' => 3]);
        $out = [
            'rs' => true,
            'msg' => "Giao hàng thất bại!",
        ];
        echo json_encode($out);
    }
    public function huy_don()
    {
        $code = $this->input->post('code');
        $reason1 = $this->input->post('reason1');
        $reason2 = $this->input->post('reason2');
        $data_order =  $this->Generals_model->get_one_where('order_dish', ['code' => $code]);
        $save = [
            'customer_id' => $data_order->customer_id,
            'merchant_id' => $data_order->merchant_id,
            'code' => $code,
            'content_cus' => 3,
            'content_mer' => 3,
            'created_at' => strtotime(getTime()),
        ];
        $data = [
            'reason1' => $reason1,
            'reason2' => $reason2,
            'status' => 3,
        ];
        $insert_noti = $this->Generals_model->insert('notification', $save);
        $update =  $this->Generals_model->update('order_dish', ['code' => $code], $data);
        $out = [
            'rs' => true,
        ];
        echo json_encode($out);
    }
    public function xac_nhan_don_hang()
    {
        $code = $this->input->post('code');
        $data_order =  $this->Generals_model->get_one_where('order_dish', ['code' => $code]);
        $save = [
            'customer_id' => $data_order->customer_id,
            'merchant_id' => $data_order->merchant_id,
            'code' => $code,
            'content_cus' => 1,
            'content_mer' => 1,
            'created_at' => strtotime(getTime()),
        ];
        $data = [
            'status' => 1,
        ];
        $insert_noti = $this->Generals_model->insert('notification', $save);
        $update =  $this->Generals_model->update('order_dish', ['code' => $code], $data);
        $out = [
            'rs' => true,
        ];
        echo json_encode($out);
    }
    public function report_post()
    {
        $id = $this->input->post('id');
        $reason1 = $this->input->post('reason1');
        $reason2 = $this->input->post('reason2');
        $data_post =  $this->Generals_model->get_one_where('post', ['id' => $id]);
        $save = [
            'post_id' => $id,
            'merchant_id' => $data_post->merchant_id,
            'reason1' => $reason1,
            'reason2' => $reason2,
            'post_id' => $id,
            'created_at' => strtotime(getTime()),
        ];
        $insert_report = $this->Generals_model->insert('report_post', $save);
        $out = [
            'rs' => true,
            'msg' => 'Báo cáo của bạn đã được chúng tôi ghi nhận',
        ];
        echo json_encode($out);
    }
}
