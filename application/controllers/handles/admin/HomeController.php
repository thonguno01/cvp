<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HomeController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->model('Generals_model');
        $this->load->library('Globals');
        $this->load->helper('General_helper');
        $this->load->helper('url');
        // $this->load->helper('function');
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
    }
    //Đăng xuất
    public function logout_admin()
    {
        $this->session->sess_destroy();
        return redirect('/admin');
    }
    // login
    public function login_admin()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $checkAdmin =  $this->Generals_model->get_one_where('admin', ['email' => $email, 'password' => md5($password)]);
        $cookie = array(
            'name'   => 'password',
            'value'  => $password,
            'expire' => time() + 86500,
        );
        if ($checkAdmin == null) {
            $out = [
                'rs' => false,
                'msg' => "Thông tin tài khoản mật khẩu của bạn không đúng!",
            ];
        } elseif ($checkAdmin->authentic == '0') {
            $out = [
                'msg' => "Tài khoản của bạn chưa xác thực. Liên hệ quản trị theo SĐT -0879956632- để xác thực!",
                'rs' => 'authentic'
            ];
        } else {
            $this->session->set_userdata(['name' => $checkAdmin->name, 'email' => $checkAdmin->email]);
            $out = [
                'msg' => '',
                'rs' => true
            ];
        }
        echo json_encode($out);
    }
    public function xuat_excel_merchant()
    {
        header("Content-type: application/octet-stream");
        header("Content-Disposition: attachment; filename=Thong_ke_quan_an.xls");
        header("Pragma: no-cache");
        header("Expires: 0");

        echo '<table border="1px solid black">';
        echo '<tr>';
        echo '<td><strong>Mã</strong></td>';
        echo '<td><strong>Họ và tên</strong></td>';
        echo '<td><strong>Email</strong></td>';
        echo '<td><strong>SĐT</strong></td>';
        echo '<td><strong>Địa chỉ</strong></td>';
        echo '<td><strong>Thời gian tạo</strong></td>';

        $sql = $this->Generals_model->get_list('merchant');
        foreach ($sql as $key => $row) {
            $id = $row['id'];
            $name = $row['name'];
            $name_merchant = $row['name_merchant'];
            $address = $row['address'];
            $email = $row['email'];
            $phone = $row['phone'];
            $created_at = $row['created_at'];

            echo '<table border="1px solid black">';
            echo '<tr>';
            echo '<td>' . $id . '</td>';
            echo '<td>' . $name . '</td>';
            echo '<td>' . $name_merchant . '</td>';
            echo '<td>' . $email . '</td>';
            echo '<td>' . $phone . '</td>';
            echo '<td>' . $address . '</td>';
            echo '<td>' . $created_at . '</td>';
        }
        $a = 1;
        echo '</tr>';
        echo '</table>';
        unset($rowData);
    }
    public function customerExel()
    {
        header("Content-type: application/octet-stream");
        header("Content-Disposition: attachment; filename=danh_sach_khach_hang.xls");
        header("Pragma: no-cache");
        header("Expires: 0");
        echo '<table border="1px solid black">';
        echo '<tr>';
        echo '<td><strong>STT</strong></td>';
        echo '<td><strong>SĐT</strong></td>';
        echo '<td><strong>Email</strong></td>';
        echo '<td><strong>Tên Khách hàng</strong></td>';
        echo '<td><strong>Ngày tạo</strong></td>';
        echo '<tr>';
        $sql = $this->Generals_model->get_list_desc('customer');
        foreach ($sql as $key => $customer) {
            echo '<tr>';
            echo ' <td>' . $customer['id'] . '</td>';
            echo ' <td>' . $customer['phone'] . '</td>';
            echo ' <td>' . $customer['email'] . '</td>';
            echo ' <td>' . $customer['name'] . '</td>';
            echo ' <td>' . $customer['created_at'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
        unset($rowData);
    }
    public function addCustomerNew()
    {
        $name = $this->input->post('name');
        $phone = $this->input->post('phone');
        $address = $this->input->post('address');
        $gender = $this->input->post('gender');
        $password = $this->input->post('password');
        $email = $this->input->post('email');
        $save  = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'gender' => $gender,
            'password' => md5($password),
            'created_at' => getTime(),
        ];
        $check =  $this->Generals_model->insert('customer', $save);
        if ($check == true) {
            $out = [
                'rs' => true,
                'message' => 'admin-list-customer'
            ];
        } else {
            die();
        }
        echo json_encode($out);
    }
    public function editCus()
    {
        $name = $this->input->post('name');
        $id = $this->input->post('id');
        $gender = $this->input->post('gender');
        $save = [
            'name' => $name,
            'gender' => $gender
        ];
        $check  = $this->Generals_model->update('customer', ['id' => $id], $save);
        if ($check == true) {
            $outPut = [
                'rs' => true,
                'mes' => 'Bạn đã cập nhật thành công',
            ];
        } else {
            die('cập nhật thất bại');
        }
        echo json_encode($outPut);
    }
    public function orderExel()
    {
        header("Content-type: application/octet-stream");
        header("Content-Disposition: attachment; filename=danh_sach_dat_hang.xls");
        header("Pragma: no-cache");
        header("Expires: 0");
        echo '<table border="1px solid black">';
        echo '<tr>';
        echo '<td><strong>Code</strong></td>';
        echo '<td><strong>Khách hàng</strong></td>';
        echo '<td><strong>QUán ăn</strong></td>';
        echo '<td><strong>Địa chỉ nhận hàng</strong></td>';
        echo '<td><strong>Món ăn</strong></td>';
        echo '<td><strong>Thành tiền</strong></td>';
        echo '<td><strong>Khuyến mại</strong></td>';
        echo '<td><strong>Phí ship</strong></td>';
        echo '<td><strong>Tổng tiền</strong></td>';
        echo '<tr>';
        $sql = $this->Generals_model->get_list_desc('order_dish');
        $result = [];
        foreach ($sql as $k => $v) {
            $mer  =  $this->Generals_model->get_one_where_array_row('merchant', ['id' => $v['merchant_id']]);
            $cus  =  $this->Generals_model->get_one_where_array_row('customer', ['id' => $v['customer_id']]);
            $address  =  $this->Generals_model->get_one_where_array_row('address_receive', ['id' => $v['addresss_id']]);
            if ($v['merchant_id'] == $mer['id']) {
                $v['merchant_id'] = $mer['name_merchant'];
            }
            if ($v['customer_id'] == $cus['id']) {
                $v['customer_id'] = $cus['name'];
            }
            if ($v['addresss_id'] == $address['id']) {
                $v['addresss_id'] = $address['address'];
            }
            $result[] = $v;
        }
        $text = '';
        foreach ($result as $key => $order) {
            $name = $this->Generals_model->selectData('dish_id', 'order_dish', '', ['id' => $order['id']], '', 'row');
            $name = $name->dish_id;
            $name = explode(',', $name);

            $data_all = [];
            foreach ($name as $key1 => $value1) {
                $data = explode('-', $value1);
                $data_all[] = $data;
            }
            $name_menu = [];
            foreach ($data_all as $key2 => $value2) {
                if ($value2[2] == 0) {
                    $name_menu1 = $this->Generals_model->selectData('name_food', 'detail_menu', '', ['id' => $value2[0]], '', 'row');
                    $money1 = $this->Generals_model->selectData('price_food', 'detail_menu', '', ['id' => $value2[0]], '', 'row');
                    $name_menu[] = $value2[1] . '-' . $name_menu1->name_food . '-' . number_format($money1->price_food) . 'đ';
                } else {
                    $name_menu1 = $this->Generals_model->selectData('name_combo', 'combo', '', ['id' => $value2[0]], '', 'row');
                    $money1 = $this->Generals_model->selectData('price_combo', 'combo', '', ['id' => $value2[0]], '', 'row');
                    $name_menu[] = $value2[1] . '-' . $name_menu1->name_combo . '-' . number_format($money1->price_combo) . 'đ';
                }
            }
            foreach ($name_menu as $item) {
                $text .= '<li>'  . $item .  '</li>';
            }
            echo '</tr>';
            echo ' <td>' . $order['code'] . '</td>';
            echo ' <td>' . $order['customer_id'] . '</td>';
            echo ' <td>' . $order['merchant_id'] . '</td>';
            echo ' <td>' . $order['addresss_id'] . '</td>';
            echo ' <td>' . $text . '</td>';
            echo ' <td>' . number_format($order['total_before']) . 'đ</td>';
            echo ' <td>' . number_format($order['sale']) . 'đ</td>';
            echo ' <td>' . number_format($order['fee_ship']) . 'đ</td>';
            echo ' <td>' . number_format($order['total_after']) . 'đ</td>';
            echo '</tr>';
            $text = '';
        }
        echo '</table>';
        unset($rowData);
    }
    public function searchPersons()
    {
        $time_st = strtotime($this->input->post('time_st'));
        $time_end = strtotime($this->input->post('time_end'));
        if ($time_end < $time_st) {
            $outPut = [
                'rs' => false,
                'mes' => ' Thời gian bắt đầu không được lớn hơn thời gian kết thúc',
            ];
        } else {
            if ($time_st != '' && $time_end == '') {
                $sql = $this->Generals_model->get_list2_ORDER_BY('order_dish', ['created_at >=' => $time_st], 'update_at');
            } elseif ($time_st == '' && $time_end != '') {
                $sql = $this->Generals_model->get_list2_ORDER_BY('order_dish', ['created_at <=' => $time_end], 'update_at');
            } elseif ($time_st != '' && $time_end != '') {
                $sql = $this->Generals_model->get_list2_ORDER_BY('order_dish', ['created_at >=' => $time_st, 'created_at <=' => $time_end], 'update_at');
            }
            $outPut = [
                'rs' => true,
                'mes' => $sql
            ];
        }
        echo json_encode($outPut);
    }
    public function userOrderExel()
    {
        header("Content-type: application/octet-stream");
        header("Content-Disposition: attachment; filename=danh_sach_nguoi_dat_hang.xls");
        header("Pragma: no-cache");
        header("Expires: 0");
        echo '<table border="1px solid black">';
        echo '<tr>';
        echo '<td><strong>STT</strong></td>';
        echo '<td><strong>Mã ĐH</strong></td>';
        echo '<td><strong>Tên khách hàng đặt</strong></td>';
        echo '<td><strong>Phone Đặt</strong></td>';
        echo '<td><strong>Tên khách hàng nhận</strong></td>';
        echo '<td><strong>Phone nhận </strong></td>';
        echo '<td><strong>Địa chỉ nhận hàng </strong></td>';
        echo '<td><strong>Thời gian đặt</strong></td>';
        echo '<tr>';
        // $time_start = strtotime($this->input->post('time_start'));
        // $time_end = strtotime($this->input->post('time_end'));
        // $sql = [];
        // if ($time_start != '' && $time_end == '') {
        //     $sql = $this->Generals_model->get_list2_ORDER_BY('order_dish', ['created_at >=' => $time_start], 'update_at');
        // } elseif ($time_start == '' && $time_end != '') {
        //     $sql = $this->Generals_model->get_list2_ORDER_BY('order_dish', ['created_at <=' => $time_end], 'update_at');
        // } elseif ($time_start != '' && $time_end != '') {
        //     $sql = $this->Generals_model->get_list2_ORDER_BY('order_dish', ['created_at >=' => $time_start, 'update_at', 'created_at <=' => $time_end], 'update_at');
        // } else {
        $sql = $this->Generals_model->get_list2_ORDER_BY('order_dish', [], 'update_at');
        // }
        foreach ($sql as $key => $value) {
            $address = $this->Generals_model->get_one_where_array_row('address_receive', ['id' => $value['addresss_id']]);
            $cus = $this->Generals_model->get_one_where_array_row('customer', ['id' => $value['customer_id']]);
            echo '</tr>';
            echo ' <td>' . $key  . '</td>';
            echo ' <td>' . $value['code'] . '</td>';
            echo ' <td>' . $cus['name'] . '</td>';
            echo ' <td>' . $cus['phone'] . '</td>';
            echo ' <td>' . $address['name'] . '</td>';
            echo ' <td>' .  $address['phone'] . '</td>';
            echo ' <td>' . $address['address'] . '</td>';
            echo ' <td>' .  date('Y-m-d H:i:s', $value['created_at']) . '</td>';
            echo '</tr>';
        }
        echo '</table>';
        unset($rowData);
    }
    public function admin_check_email()
    {
        $email = $this->input->post('email');
        $checkAdmin =  $this->Generals_model->get_one_where('merchant', ['email' => $email]);
        if ($checkAdmin != NULL) {
            $out = [
                'rs' => true
            ];
        } else {
            $out = [
                'rs' => false
            ];
        }
        echo json_encode($out);
    }
    public function check_email_admin()
    {
        $email = $this->input->post('email');
        $checkAdmin =  $this->Generals_model->get_one_where('admin', ['email' => $email]);
        if ($checkAdmin != NULL) {
            $out = [
                'rs' => true,
            ];
        } else {
            $out = [
                'rs' => false
            ];
        }
        echo json_encode($out);
    }
    public function administrators_add_php()
    {
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $administrators = $this->input->post('administrators');
        $auth = $this->input->post('auth');
        $password = md5($this->input->post('password'));
        $save = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'administrators' => $administrators,
            'authentic' => $auth,
            'password' => $password,
            'created_at' => getTime(),
        ];
        $checkReister = $this->Generals_model->insert('admin', $save);
        $out = [
            'rs' => true
        ];
        echo json_encode($out);
    }
    public function administrators_edit_php()
    {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $administrators = $this->input->post('administrators');
        $password = md5($this->input->post('password'));
        $save = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'administrators' => $administrators,
        ];
        $save2 = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'administrators' => $administrators,
            'password' => $password,
        ];
        if ($password == '') {
            $checkReister = $this->Generals_model->update('admin', ['id' => $id], $save);
            $out = [
                'rs' => true
            ];
        } else {
            $checkReister = $this->Generals_model->update('admin', ['id' => $id], $save2);
            $out = [
                'rs' => true
            ];
        }
        echo json_encode($out);
    }
    public function update_auth_admin()
    {
        $id = $this->input->post('id');
        $checkReister = $this->Generals_model->update('admin', ['id' => $id], ['authentic' => 1]);
        $out = [
            'rs' => true
        ];
        echo json_encode($out);
    }
    public function admin_them_merchant_done()
    {
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $password = md5($this->input->post('password'));
        $save = [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'phone' => $phone,
        ];
        $checkReister = $this->Generals_model->insert('merchant', $save);
        $out = [
            'rs' => true
        ];
        echo json_encode($out);
    }
    public function admin_edit_merchant_done()
    {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $name_merchant = $this->input->post('name_merchant');
        $typical_food = $this->input->post('typical_food');
        $address = $this->input->post('address');
        $key_word = $this->input->post('key_word');
        $fee_ship = $this->input->post('fee_ship');
        $phone = $this->input->post('phone');
        $description = $this->input->post('description');
        $save = [
            'name' => $name,
            'name_merchant' => $name_merchant,
            'typical_food' => $typical_food,
            'phone' => $phone,
            'address' => $address,
            'search_key' => $key_word,
            'fee_ship' => $fee_ship,
            'description' => $description,
        ];
        $checkReister = $this->Generals_model->update('merchant', ['id' => $id], $save);
        $out = [
            'rs' => true
        ];
        echo json_encode($out);
    }
    public function register_for_errorer_controller()
    {
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $password = md5($this->input->post('password'));
        $save = [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'phone' => $phone,
        ];
        $checkReister = $this->Generals_model->insert('customer', $save);
        $checkReister2 = $this->Generals_model->delete_where('customer_error', ['email' => $email]);
        $out = [
            'rs' => true
        ];
        echo json_encode($out);
    }
    public function register_for_errorer_controller_2()
    {
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $password = md5($this->input->post('password'));
        $save = [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'phone' => $phone,
        ];
        $checkReister = $this->Generals_model->insert('merchant', $save);
        $checkReister2 = $this->Generals_model->delete_where('merchant_error', ['email' => $email]);
        $out = [
            'rs' => true
        ];
        echo json_encode($out);
    }
    public function check_censorship()
    {
        $id = $this->input->post('id');
        $censorship = $this->input->post('censorship');
        if ($censorship == 0) {
            $checkReister = $this->Generals_model->update('post', ['id' => $id], ['censorship' => 1]);
            $out = [
                'rs' => true,
                'msg' => "Bài viết đã được duyệt ! Load lại để cập nhật lại trạng thái"
            ];
        }
        if ($censorship == 1) {
            $checkReister = $this->Generals_model->update('post', ['id' => $id], ['censorship' => 0]);
            $out = [
                'rs' => true,
                'msg' => "Đã chặn hiển thị bài viết ! Load lại để cập nhật lại trạng thái"
            ];
        }
        echo json_encode($out);
    }
    public function check_censorship_admin()
    {
        $id = $this->input->post('id');
        $censorship = $this->input->post('censorship');
        if ($censorship == 0) {
            $checkReister = $this->Generals_model->update('posts_index_merchant', ['id' => $id], ['censorship' => 1]);
            $out = [
                'rs' => true,
                'msg' => "Bài viết đã được duyệt ! Load lại để cập nhật lại trạng thái"
            ];
        }
        if ($censorship == 1) {
            $checkReister = $this->Generals_model->update('posts_index_merchant', ['id' => $id], ['censorship' => 0]);
            $out = [
                'rs' => true,
                'msg' => "Đã chặn hiển thị bài viết ! Load lại để cập nhật lại trạng thái"
            ];
        }
        echo json_encode($out);
    }
    public function add_post_sale()
    {
        $title = $this->input->post('title');
        $type = $this->input->post('type');
        $img = $this->input->post('img');
        $content = $this->input->post('content');
        $created_at = getTime();
        $save = [
            'title' => $title,
            'type_post' => $type,
            'img' => $img,
            'content' => $content,
            'created_at' => $created_at,
        ];
        $checkReister = $this->Generals_model->insert('posts_index_merchant', $save);
        $out = [
            'rs' => true,
            'msg' => "Tải tin thành công. Vui lòng duyệt tin !"
        ];
        echo json_encode($out);
    }
    public function edit_post_sale()
    {
        $id = $this->input->post('id');
        $title = $this->input->post('title');
        $type = $this->input->post('type');
        $img = $this->input->post('img');
        $content = $this->input->post('content');
        $created_at = getTime();
        $save = [
            'title' => $title,
            'type_post' => $type,
            'img' => $img,
            'content' => $content,
            'created_at' => $created_at,
        ];
        $save2 = [
            'title' => $title,
            'type_post' => $type,
            'content' => $content,
            'created_at' => $created_at,
        ];
        if ($img == '') {
            $checkReister = $this->Generals_model->update('posts_index_merchant', ['id' => $id], $save2);
            $out = [
                'rs' => true,
                'msg' => "Cập nhật thành công !"
            ];
        } else {
            $checkReister = $this->Generals_model->update('posts_index_merchant', ['id' => $id], $save);
            $out = [
                'rs' => true,
                'msg' => "Cập nhật thành công !"
            ];
        }
        echo json_encode($out);
    }
    public function addVoucherSale()
    {
        $submit = $this->input->post('submit');
        $code = $this->input->post('code');
        $discount = $this->input->post('discount');
        $discount = $this->input->post('discount');
        $theLoai = $this->input->post('theLoai');
        $number_tiket = $this->input->post('number_tiket');
        $thu = $this->input->post('thu');
        $ngay_bd = $this->input->post('ngay_bd');
        show($thu);
    }
}
