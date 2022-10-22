<?php
function comboAndGroup($combos, $idDetailMenu, $models)
{
    $rs = array();
    foreach ($combos as $value) {
        $array[$value['id']] = explode(",", $value[$idDetailMenu]);
        foreach ($array[$value['id']] as $k => $v) {
            $rs[$value['merchant_id']][$value['id']][] = $models->Generals_model->get_one_where_array('detail_menu', ['id' => $v]);
        }
    }
    return $rs;
}
