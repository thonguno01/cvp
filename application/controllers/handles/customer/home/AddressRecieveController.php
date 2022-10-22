<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AddressRecieveController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->model('Generals_model');
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    }
    public function getTime()
    {
        $date = getdate();
        $dem = '';
        $dem .= $date['year'] . '-' . $date['mon'] . '-' . $date['mday'] . ' ' . $date['hours'] . ':' . $date['minutes'] . ':' . $date['seconds'];
        return $dem;
    }
    public function addAdress()
    {
        $name = $this->input->post('name');
        $phone = $this->input->post('phone');
        $cus  = $this->session->userdata('idCustomer');
        $address = $this->input->post('address');
        $time = $this->getTime();
        $saveAddress = [
            'customer_id' => $cus,
            'name' => $name,
            'phone' => $phone,
            'address' => $address,
            'created_at' => $time,
        ];
        $checkAddAdress = $this->Generals_model->insert('address_receive', $saveAddress);
        if ($checkAddAdress > 0) {
            $outPut['message'] = 'Thêm mới 1 địa chỉ thành công ';
            $outPut['result'] = 'true';
        } else {
            $outPut['message'] = 'Thêm mới thất bại !Vui lòng quý khách nhập đúng địa chỉ nhận hàng';
            $outPut['result'] = 'false';
        }
        echo json_encode($outPut);
    }
    public function deleteAdress()
    {
        $id = $this->input->post('id');

        $check = $this->Generals_model->delete_where('address_receive', ['id' => $id]);
        if ($check == true) {
            $outPut['message'] = 'Đã xóa thành công 1 địa chỉ ';
            $outPut['result'] = 'true';
            $outPut['link'] = 'address-receive';
        } else {
            $outPut['message'] = 'Đã xóa bị  Thất bại  ';
            $outPut['result'] = 'false';
            $outPut['link'] = 'address-receive';
        }
        echo json_encode($outPut);
    }
    public function getAddress()
    {
        $id = $this->input->post('id');
        $address = $this->Generals_model->get_one_where('address_receive', ['id' => $id]);
        echo json_encode($address);
    }
    public function updateAddress()
    {
        $id = $this->input->post('idData');
        $name = $this->input->post('name');
        $phone = $this->input->post('phone');
        $address = $this->input->post('address');
        $updateData = [
            'name' => $name,
            'phone' => $phone,
            'address' => $address,
        ];
        $check = $this->Generals_model->update('address_receive', ['id' => $id], $updateData);
        if ($check == true) {
            $outPut['message'] = 'Cập nhật thành công 1 địa chỉ ';
            $outPut['result'] = 'true';
            $outPut['link'] = 'address-receive';
        } else {
            $outPut['message'] = 'Cập nhật thất bại ';
            $outPut['result'] = 'false';
            $outPut['link'] = 'address-receive';
        }
        echo json_encode($outPut);
    }
}
