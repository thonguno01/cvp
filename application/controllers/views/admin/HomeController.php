<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HomeController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('Globals');
        $this->load->model('Generals_model');
        $this->load->helper('General_helper');
        $this->load->helper('cookie');
        $this->load->library('pagination');
        // $this->load->helper('function'); 
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    }
    public function admin_login()
    {
        $data = [
            'page_name' => 'admin/login',
        ];
        $this->load->view('index_admin', $data);
    }
    public function administrators()
    {
        $email = $this->session->userdata('email');
        $check =  $this->Generals_model->get_one_where('admin', ['email' => $email]);
        if ($email == NULL) {
            return redirect('/admin');
        } else {
            $data = [
                'check' => $check,
                'admin' => admin(),
                'page_name' => 'admin/administrators',
            ];
            $this->load->view('index_admin', $data);
        }
    }

    public function admin_index()
    {
        $email = $this->session->userdata('email');
        if ($email == NULL) {
            return redirect('/admin');
        } else {
            $data = [
                'page_name' => 'admin/home',
            ];
            $this->load->view('index_admin', $data);
        }
    }
    public function list_merchant()
    {
        $email = $this->session->userdata('email');
        if ($email == NULL) {
            return redirect('/admin');
        } else {
            $data = [
                'page_name' => 'admin/list_merchant',
            ];
            $this->load->view('index_admin', $data);
        }
    }
    public function them_quan_an()
    {
        $email = $this->session->userdata('email');
        if ($email == NULL) {
            return redirect('/admin');
        } else {
            $data = [
                'hour' => hour(),
                'page_name' => 'admin/them_quan_an',
            ];
            $this->load->view('index_admin', $data);
        }
    }

    // =============================================
    public function listCustomer()
    {
        $email = $this->session->userdata('email');
        if ($email == NULL) {
            return redirect('/admin');
        } else {
            $list  = $this->Generals_model->get_list_desc('customer');
            // show($list);
            // die();
            $data = [
                'listCustomers' => $list,
                'page_name' => 'admin/list_customer',
            ];
            $this->load->view('index_admin', $data);
        }
    }

    public function edit_merchant($id)
    {
        $email = $this->session->userdata('email');
        $check =  $this->Generals_model->get_one_where('merchant', ['id' => $id]);
        if ($email == NULL) {
            return redirect('/admin');
        } elseif ($check == NULL) {
            return redirect('/admin-list-merchant');
        } else {
            $data = [
                'id' => $id,
                'day' => day(),
                'hour' => hour(),
                'page_name' => 'admin/sua_quan_an',
            ];
            $this->load->view('index_admin', $data);
        }
    }
    public function list_customer_error()
    {
        $email = $this->session->userdata('email');
        if ($email == NULL) {
            return redirect('/admin');
        } else {
            $data = [
                'page_name' => 'admin/list_customer_error',
            ];
            $this->load->view('index_admin', $data);
        }
    }
    public function register_for_errorer($id)
    {
        $email = $this->session->userdata('email');
        $check =  $this->Generals_model->get_one_where('customer_error', ['id' => $id]);
        if ($email == NULL) {
            return redirect('/admin');
        } elseif ($check == NULL) {
            return redirect('/list-customer-error');
        } else {
            $data = [
                'id' => $id,
                'check' => $check,
                'page_name' => 'admin/register_for_errorer',
            ];
            $this->load->view('index_admin', $data);
        }
    }
    public function list_merchant_error()
    {
        $email = $this->session->userdata('email');
        if ($email == NULL) {
            return redirect('/admin');
        } else {
            $data = [
                'page_name' => 'admin/list_merchant_error',
            ];
            $this->load->view('index_admin', $data);
        }
    }
    public function register_for_merchant($id)
    {
        $email = $this->session->userdata('email');
        $check =  $this->Generals_model->get_one_where('merchant_error', ['id' => $id]);
        if ($email == NULL) {
            return redirect('/admin');
        } elseif ($check == NULL) {
            return redirect('/list-merchant-error');
        } else {
            $data = [
                'id' => $id,
                'check' => $check,
                'page_name' => 'admin/register_for_merchant',

            ];
            $this->load->view('index_admin', $data);
        }
    }

    public function addCustomer()
    {
        $email = $this->session->userdata('email');
        if ($email == NULL) {
            return redirect('/admin');
        } else {
            $data = [
                'page_name' => 'admin/add_customer',
            ];
            $this->load->view('index_admin', $data);
        }
    }

    public function post_merchant()
    {
        $email = $this->session->userdata('email');
        if ($email == NULL) {
            return redirect('/admin');
        } else {
            $data = [
                'page_name' => 'admin/post_merchant',

            ];
            $this->load->view('index_admin', $data);
        }
    }

    public function editCustomer($idCusTom)
    {
        $email = $this->session->userdata('email');
        if ($email == NULL) {
            return redirect('/admin');
        } else {
            $check = $this->Generals_model->get_one_where_array_row('customer', ['id' => $idCusTom]);
            // show(($check));
            if (count($check) == 0) {
                echo '404 page not found';
            } else {
                $data = [
                    'customer' =>  $check,
                    'page_name' => 'admin/edit-customer',
                ];
                $this->load->view('index_admin', $data);
            }
        }
    }
    public function listOrder()
    {
        $email = $this->session->userdata('email');
        if ($email == NULL) {
            return redirect('/admin');
        } else {
            $time_start = $this->input->post('time_start');
            $time_end = $this->input->post('time_end');
            if ($time_start != '' && $time_end == '') {
                $sql = $this->Generals_model->notifi('order_dish', ['created_at =' => $time_start]);
            } elseif ($time_start == '' && $time_end != '') {
                $sql = $this->Generals_model->notifi('order_dish', ['created_at <=' => $time_end]);
            } elseif ($time_start != '' && $time_end != '') {
                $sql = $this->Generals_model->notifi('order_dish', ['created_at >=' => $time_start, 'created_at <=' => $time_end]);
            } else {
                $sql = $this->Generals_model->get_list_desc('order_dish');
            }
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
            $data = [
                'time_start' => $time_start,
                'time_end' => $time_end,
                'sql' => $result,
                'page_name' => 'admin/manager-order',
            ];
            $this->load->view('index_admin', $data);
        }
    }

    public function admin_post()
    {
        $email = $this->session->userdata('email');
        if ($email == NULL) {
            return redirect('/admin');
        } else {
            $data = [
                'type_post' => type_post(),
                'page_name' => 'admin/admin_post',
            ];
            $this->load->view('index_admin', $data);
        }
    }
    public function add_post_sale()
    {
        $email = $this->session->userdata('email');
        if ($email == NULL) {
            return redirect('/admin');
        } else {
            $data = [
                'type_post' => type_post(),
                'page_name' => 'admin/add_post_sale',

            ];
            $this->load->view('index_admin', $data);
        }
    }

    public function listPersonOrder()
    {
        $email = $this->session->userdata('email');
        if ($email == NULL) {
            return redirect('/admin');
        } else {
            $time_start = strtotime($this->input->post('time_start'));
            $time_end = strtotime($this->input->post('time_end'));
            $sql = [];
            if ($time_start != '' && $time_end == '') {
                $sql = $this->Generals_model->get_list2_ORDER_BY('order_dish', ['created_at >=' => $time_start], 'update_at');
            } elseif ($time_start == '' && $time_end != '') {
                $sql = $this->Generals_model->get_list2_ORDER_BY('order_dish', ['created_at <=' => $time_end], 'update_at');
            } elseif ($time_start != '' && $time_end != '') {
                $sql = $this->Generals_model->get_list2_ORDER_BY('order_dish', ['created_at >=' => $time_start, 'update_at', 'created_at <=' => $time_end], 'update_at');
            } else {
                $sql = $this->Generals_model->get_list2_ORDER_BY('order_dish', [], 'update_at');
            }
            // show($sql)
            // die();

            $data = [
                'time_start' => $time_start,
                'time_end' => $time_end,
                'person_orders' => $sql,
                'page_name' => 'admin/quan-li-nguoi-dat-hang',
            ];
            $this->load->view('index_admin', $data);
        }
    }

    public function edit_post_sale($id)
    {
        $email = $this->session->userdata('email');
        $check =  $this->Generals_model->get_one_where('posts_index_merchant', ['id' => $id]);
        if ($email == NULL) {
            return redirect('/admin');
        } elseif ($check == NULL) {
            return redirect('/admin-post');
        } else {
            $data = [
                'id' => $id,
                'check' => $check,
                'type_post' => type_post(),
                'page_name' => 'admin/edit_post_sale',

            ];
            $this->load->view('index_admin', $data);
        }
    }
    public function administrators_add()
    {
        $email = $this->session->userdata('email');
        $check =  $this->Generals_model->get_one_where('admin', ['email' => $email]);
        if ($email == NULL) {
            return redirect('/admin');
        } elseif ($check->administrators != 0) {
            echo '<script language="javascript">alert("Trang này chỉ dành cho quản trị viên cấp cao!"); window.location.href="/administrators";</script>';
        } else {
            $data = [
                'check' => $check,
                'admin' => admin(),
                'page_name' => 'admin/administrators_add',
            ];
            $this->load->view('index_admin', $data);
        }
    }
    public function administrators_edit($id)
    {
        $email = $this->session->userdata('email');
        $data =  $this->Generals_model->get_one_where('admin', ['email' => $email]);
        $check =  $this->Generals_model->get_one_where('admin', ['id' => $id]);
        if ($email == NULL) {
            return redirect('/admin');
        } elseif ($data->administrators != 0) {
            echo '<script language="javascript">alert("Trang này chỉ dành cho quản trị viên cấp cao!"); window.location.href="/administrators";</script>';
        } else {
            $data = [
                'check' => $check,
                'admin' => admin(),
                'page_name' => 'admin/administrators_edit',
            ];
            $this->load->view('index_admin', $data);
        }
    }
    public function voucherSale()
    {
        $email = $this->session->userdata('email');
        $check =  $this->Generals_model->get_one_where('admin', ['email' => $email]);
        if ($email == NULL) {
            return redirect('/admin');
        } else {
            $data = [
                'check' => $check,
                'admin' => admin(),
                'day' => day(),
                'hour' => hour(),
                'page_name' => 'admin/voucher-sale',
            ];
            $this->load->view('index_admin', $data);
        }
    }
    public function addVoucherSale()
    {
        $email = $this->session->userdata('email');
        if ($email == NULL) {
            return redirect('/admin');
        } else {
            $data = [
                'page_name' => 'admin/voucher_sale_add',
            ];
            $this->load->view('index_admin', $data);
        }
    }
    public function voucher_merchant()
    {
        $email = $this->session->userdata('email');
        $check =  $this->Generals_model->get_one_where('admin', ['email' => $email]);
        if ($email == NULL) {
            return redirect('/admin');
        } else {
            $data = [
                'check' => $check,
                'admin' => admin(),
                'day' => day(),
                'hour' => hour(),
                'page_name' => 'admin/voucher_merchant',
            ];
            $this->load->view('index_admin', $data);
        }
    }
    public function voucher_merchant_add()
    {
        $email = $this->session->userdata('email');
        if ($email == NULL) {
            return redirect('/admin');
        } else {
            $data = [
                'page_name' => 'admin/voucher_merchant_add',
            ];
            $this->load->view('index_admin', $data);
        }
    }
}
