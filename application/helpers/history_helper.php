<?php
function getStatus($orders, $statusOder = array(), $model, $citys = array())
{
    $result = array();
    foreach ($orders as $k => $value) {
        foreach ($statusOder as $k => $status) {
            if ($value['status'] == $k) {
                $value['status1'] = $status;
            }
        }
        $city = $model->Generals_model->get_one_where_select('merchant', 'id_city', ['id' => $value['merchant_id']]);
        $distric = $model->Generals_model->get_one_where_select('merchant', 'id_district', ['id' => $value['merchant_id']]);
        $address = $model->Generals_model->get_one_where_select('merchant', 'address', ['id' => $value['merchant_id']]);
        $name_mer = $model->Generals_model->get_one_where_select('merchant', 'name_merchant', ['id' => $value['merchant_id']]);
        foreach ($citys as $v) {
            if ($v['cit_id'] ==  $city->id_city) {
                $value['city'] =  $v['cit_name'];
            }
            if ($v['cit_id'] ==  $distric->id_district) {
                $value['district'] =  $v['cit_name'];
            };
        }
        $value['addess_mer'] = $address->address;
        $value['name_mer'] = $name_mer->name_merchant;
        $result[] = $value;
    }
    return $result;
}
