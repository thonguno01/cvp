<?php
function getInfoCmt($cmtPost, $mod)
{
    $comments = [];
    foreach ($cmtPost as $value) {
        if ($value['customer_id'] != null) {
            $cus = $mod->Generals_model->get_one_where_array('customer', ['id' => $value['customer_id']]);
        } else {
            $cus = $mod->Generals_model->get_one_where_array('merchant', ['id' => $value['merchant_id']]);
        }
        $value['cmtUser'] = $cus;
        $comments[] = $value;
    }
    return $comments;
}
function getInfoMerchant($post, $checkIdMerchant)
{
    $out = array();
    foreach ($post as $k => $item) {
        foreach ($checkIdMerchant as $value) {
            if ($item['merchant_id'] == $value['id']) {
                $item['name_merchant'] = $value['name_merchant'];
                $item['img_merchant'] = $value['img_avatar'];
            }
        }
        $item['img'] = explode(',', $item['img_video']);
        $out[] = $item;
    }
    return $out;
}
