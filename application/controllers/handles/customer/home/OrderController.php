<?php
defined('BASEPATH') or exit('No direct script access allowed');

class OrderController extends CI_Controller
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
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    }
    function create_slug($string)
    {
        $search = array(
            '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#',
            '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',
            '#(ì|í|ị|ỉ|ĩ)#',
            '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',
            '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',
            '#(ỳ|ý|ỵ|ỷ|ỹ)#',
            '#(đ)#',
            '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',
            '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',
            '#(Ì|Í|Ị|Ỉ|Ĩ)#',
            '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',
            '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',
            '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',
            '#(Đ)#',
            "/[^a-zA-Z0-9\-\_]/",
        );
        $replace = array(
            'a',
            'e',
            'i',
            'o',
            'u',
            'y',
            'd',
            'A',
            'E',
            'I',
            'O',
            'U',
            'Y',
            'D',
            '-',
        );
        $string = preg_replace($search, $replace, $string);
        $string = preg_replace('/(-)+/', '-', $string);
        $string = strtolower($string);
        return $string;
    }
    public function saveSession()
    {
        $id = $this->input->post('id');
        $qty = 1;
        $status = 'add';
        $food =  $this->Generals_model->get_one_where_array_row('detail_menu', ['id' => $id]);
        $priceSale = $food['price_food'] * ($food['sale_code'] / 100);
        if (isset($_SESSION['cart']) && array_key_exists($id, $_SESSION['cart']['buy'])) {
            $qty = (int)$_SESSION['cart']['buy'][$id]['qty'] + $qty;
            $_SESSION['cart']['buy'][$id]['status'] = 'update';
            $priceSale = $priceSale * $qty;
            $status = $_SESSION['cart']['buy'][$id]['status'];
        }
        $_SESSION['cart']['buy'][$id] = array(
            'sale' => $priceSale,
            'combo' => '0',
            'status' => $status,
            'id' => $id,
            'qty' => $qty,
            'name' => $food['name_food'],
            'price' => $food['price_food'],
            'total' => (int)$qty * $food['price_food'],
        );
        echo json_encode($_SESSION['cart']['buy'][$id]);
    }
    public function saveManySession()
    {
        $id = $this->input->post('id');
        $qty = $this->input->post('numOr');
        $status = 'add';
        $food =  $this->Generals_model->get_one_where_array_row('detail_menu', ['id' => $id]);
        $priceSale = $food['price_food'] * ($food['sale_code'] / 100) * $qty;
        if (isset($_SESSION['cart']) && array_key_exists($id, $_SESSION['cart']['buy'])) {
            $qty = (int)$_SESSION['cart']['buy'][$id]['qty'] + $qty;
            $_SESSION['cart']['buy'][$id]['status'] = 'update';
            $priceSale = $priceSale * $qty;
            $status = $_SESSION['cart']['buy'][$id]['status'];
        }
        $_SESSION['cart']['buy'][$id] = array(
            'sale' => $priceSale,
            'combo' => '0',
            'status' => $status,
            'id' => $id,
            'qty' => $qty,
            'name' => $food['name_food'],
            'price' => $food['price_food'],
            'total' => (int)$qty * $food['price_food'],
        );
        echo json_encode($_SESSION['cart']['buy'][$id]);
    }
    public function saveSessionManyCombo()
    {
        $id = $this->input->post('id');
        $qty = $this->input->post('numOr');
        $status = 'add';
        $food =  $this->Generals_model->get_one_where_array_row('combo', ['id' => $id]);
        if (isset($_SESSION['cart']) && array_key_exists('combo' . $id, $_SESSION['cart']['buy'])) {
            $qty = (int)$_SESSION['cart']['buy']['combo' . $id]['qty'] + $qty;
            $_SESSION['cart']['buy']['combo' . $id]['status'] = 'update';
            $status =  $_SESSION['cart']['buy']['combo' . $id]['status'];
        }
        $_SESSION['cart']['buy']['combo' . $id] = array(
            'combo' => '1',
            'id' => $id,
            'qty' => $qty,
            'status' => $status,
            'name' => $food['name_combo'],
            'price' => $food['price_combo'],
            'total' => (int)$qty * $food['price_combo'],
        );
        echo json_encode($_SESSION['cart']['buy']['combo' . $id]);
    }
    public function saveSessionCombo()
    {
        $id = $this->input->post('id');
        $qty = 1;
        $status = 'add';
        $food =  $this->Generals_model->get_one_where_array_row('combo', ['id' => $id]);
        if (isset($_SESSION['cart']) && array_key_exists('combo' . $id, $_SESSION['cart']['buy'])) {
            $qty = (int)$_SESSION['cart']['buy']['combo' . $id]['qty'] + 1;
            $_SESSION['cart']['buy']['combo' . $id]['status'] = 'update';
            $status =  $_SESSION['cart']['buy']['combo' . $id]['status'];
        }
        $_SESSION['cart']['buy']['combo' . $id] = array(
            'combo' => '1',
            'id' => $id,
            'qty' => $qty,
            'status' => $status,
            'name' => $food['name_combo'],
            'price' => $food['price_combo'],
            'total' => (int)$qty * (int)$food['price_combo'],
        );
        echo json_encode($_SESSION['cart']['buy']['combo' . $id]);
    }
    public function subFood()
    {
        $id =  $this->input->post('id');
        $numOr =  $this->input->post('numberOrder');
        $isCombo =  $this->input->post('isCombo');
        if ($isCombo == 0) {
            if ($numOr <= 0) {
                unset($_SESSION['cart']['buy'][$id]);
                // session_destroy();
            } else {
                if (isset($_SESSION['cart']) && array_key_exists($id, $_SESSION['cart']['buy'])) {
                    $_SESSION['cart']['buy'][$id]['sale'] = $_SESSION['cart']['buy'][$id]['sale'] - $_SESSION['cart']['buy'][$id]['sale'] / (int)$_SESSION['cart']['buy'][$id]['qty'];
                    $_SESSION['cart']['buy'][$id]['qty'] = (int)$_SESSION['cart']['buy'][$id]['qty'] - 1;
                    $_SESSION['cart']['buy'][$id]['total'] = (int)$_SESSION['cart']['buy'][$id]['qty'] *  (int)$_SESSION['cart']['buy'][$id]['price'];
                    $result = $_SESSION['cart']['buy'][$id];
                }
            }
        } else {
            if ($numOr <= 0) {
                unset($_SESSION['cart']['buy']['combo' . $id]);
            } else {
                if (isset($_SESSION['cart']) && array_key_exists('combo' . $id, $_SESSION['cart']['buy'])) {
                    $_SESSION['cart']['buy']['combo' . $id]['qty'] = (int)$_SESSION['cart']['buy']['combo' . $id]['qty'] - 1;
                    $_SESSION['cart']['buy']['combo' . $id]['total'] = (int)$_SESSION['cart']['buy']['combo' . $id]['qty'] *  (int)$_SESSION['cart']['buy']['combo' . $id]['price'];
                    $result =  $_SESSION['cart']['buy']['combo' . $id];
                }
            }
        }
        echo json_encode($result);
    }
    public function addFood()
    {
        $id =  $this->input->post('id');
        $numOr =  $this->input->post('numberOrder');
        $isCombo =  $this->input->post('isCombo');
        if ($isCombo == 0) {
            if (isset($_SESSION['cart']) && array_key_exists($id, $_SESSION['cart']['buy'])) {
                $_SESSION['cart']['buy'][$id]['sale'] = $_SESSION['cart']['buy'][$id]['sale'] + $_SESSION['cart']['buy'][$id]['sale'] / (int)$_SESSION['cart']['buy'][$id]['qty'];
                $_SESSION['cart']['buy'][$id]['qty'] = (int)$_SESSION['cart']['buy'][$id]['qty'] + 1;
                $_SESSION['cart']['buy'][$id]['total'] = (int)$_SESSION['cart']['buy'][$id]['qty'] * (int)$_SESSION['cart']['buy'][$id]['price'];
                $result =  $_SESSION['cart']['buy'][$id];
            }
        } else {
            if (isset($_SESSION['cart']) && array_key_exists('combo' . $id, $_SESSION['cart']['buy'])) {
                $_SESSION['cart']['buy']['combo' . $id]['qty'] = (int)$_SESSION['cart']['buy']['combo' . $id]['qty'] + 1;
                $_SESSION['cart']['buy']['combo' . $id]['total'] = (int)$_SESSION['cart']['buy']['combo' . $id]['qty'] * (int)$_SESSION['cart']['buy']['combo' . $id]['price'];
                $result =  $_SESSION['cart']['buy']['combo' . $id];
            }
        }
        // }
        echo json_encode($result);
    }
    public function cacularDish()
    {
        $feeShip = (int)$this->input->post('ship');
        $quangDuongShip = $this->input->post('lengthShip');
        $sale = 0;
        $saleOther = 0;
        $total = 0;
        if (isset($_SESSION['cart']['buy'])) {
            foreach ($_SESSION['cart']['buy'] as $item) {
                $total += $item['total'];
                if (isset($item['sale'])) {
                    $sale += $item['sale'];
                }
            }
        }
        $totalAll = $total + $feeShip * $quangDuongShip - $sale - $saleOther;
        $outPut = array(
            'total' => $total,
            'sale' => $sale,
            'saleOther' => $saleOther,
            'feeShip' => $feeShip * $quangDuongShip,
            'totalAll' => $totalAll,
        );
        $_SESSION['cart']['paypal'] = $outPut;
        echo json_encode($outPut);
    }
    public function orderFoods()
    {
        $nameMechant = $this->create_slug($this->input->post('nameMechant'));
        // ====================
        $idCustomer = $this->session->userdata('idCustomer');
        $idAddress = $this->input->post('idAddress');

        $idMerchant = $this->input->post('idMerchant');
        $noteCus = $this->input->post('note');
        if (isset($_SESSION['cart']['buy']) && isset($_SESSION['cart']['paypal'])) {
            foreach ($_SESSION['cart']['buy'] as $k => $value) {
                $idDish[] =   $value['id'] . '-' . $value['qty'] . '-' . $value['combo'];
            }
            $idDish = implode(',', $idDish);
            $totalBefore = $_SESSION['cart']['paypal']['total'];
            $totalAfter = $_SESSION['cart']['paypal']['totalAll'];
            $feeShip = $_SESSION['cart']['paypal']['feeShip'];
            $sale = $_SESSION['cart']['paypal']['sale'];
        }
        $a = explode("-", $nameMechant);
        $b = "";
        foreach ($a as $w) {
            $b .= $w[0];
        }
        $time = substr(time(), 4, -1);
        $code = strtoupper($b) . $time;
        $save = array(
            'customer_id' => $idCustomer,
            'addresss_id' => $idAddress,
            'merchant_id' => $idMerchant,
            'code' => $code,
            'dish_id' => $idDish,
            'sale' => $sale,
            'total_before' => $totalBefore,
            'total_after' => $totalAfter,
            'fee_ship' => $feeShip,
            'note' => $noteCus,
            'created_at' => getdate()[0],
        );
        $saveNotification = [
            'customer_id' => $idCustomer,
            'merchant_id' => $idMerchant,
            'code' => $code,
            'created_at' => getdateNotice(),
        ];
        $check = $this->Generals_model->insert('order_dish', $save);

        if ($check == true) {
            $this->Generals_model->insert('notification', $saveNotification);
            $outPut = [
                'result' => true
            ];
        } else {
            $outPut = [
                'result' => false
            ];
        }
        echo json_encode($outPut);
    }
    public function orderSucess()
    {
        $successOrder = array();
        if (isset($_SESSION['cart']['buy']) && isset($_SESSION['cart']['paypal'])) {
            foreach ($_SESSION['cart']['buy'] as $value) {
                $successOrder['id'][] = [
                    'qty' => $value['qty'],
                    'name' => $value['name'],
                    'money' => $value['total'],
                ];
            }
            $successOrder['totalBefore'] = $_SESSION['cart']['paypal']['total'];
            $successOrder['feeShip'] = $_SESSION['cart']['paypal']['feeShip'];
            $successOrder['totalAfter'] = $_SESSION['cart']['paypal']['totalAll'];
            $successOrder['sale'] = $_SESSION['cart']['paypal']['sale'];
        }
        echo json_encode($successOrder);
    }
    public function delSession()
    {
        $this->session->unset_userdata('cart');
        echo json_encode('Đặt hàng thành công');
    }
    public function searchDishDay()
    {
        $id_mer = $this->input->post('id_mer');
        $data = $this->input->post('data');
        $save_merchant = [];
        for ($i = 0; $i < count($data); $i++) {
            $merchant = $this->Generals_model->selectData('*', 'detail_menu', [], ['merchant_id' => $id_mer, 'day_open' => $data[$i]]);
            foreach ($merchant as $key => $value) {
                if (!empty($merchant[$key])) {
                    array_push($save_merchant, $merchant[$key]);
                }
            }
        }
        if (count($save_merchant) == 0) {
            echo json_encode(['rs' => false, 'ms' => 'Không tìm thấy quán ăn ']);
        } else {
            echo json_encode(['rs' => true, 'ms' => $save_merchant]);
        }
    }
}
