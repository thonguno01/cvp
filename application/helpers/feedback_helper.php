<?php
function countStar($order_dish)
{
    $star = [
        'star1' => 0,
        'star2' => 0,
        'star3' => 0,
        'star4' => 0,
        'star5' => 0,
    ];
    foreach ($order_dish as $val) {
        if ($val['check_feed_back'] == 1) {

            if ($val['ratting_quality'] == 1) {
                $star['star1'] += 1;
            }
            if ($val['ratting_service'] == 1) {
                $star['star1'] += 1;
            }
            if ($val['ratting_price'] == 1) {
                $star['star1'] += 1;
            }
            if ($val['ratting_quality'] == 2) {
                $star['star2'] += 1;
            }
            if ($val['ratting_service'] == 2) {
                $star['star2'] += 1;
            }
            if ($val['ratting_price'] == 2) {
                $star['star2'] += 1;
            }
            if ($val['ratting_quality'] == 3) {
                $star['star3'] += 1;
            }
            if ($val['ratting_service'] == 3) {
                $star['star3'] += 1;
            }
            if ($val['ratting_price'] == 3) {
                $star['star3'] += 1;
            }
            if ($val['ratting_quality'] == 4) {
                $star['star4'] += 1;
            }
            if ($val['ratting_service'] == 4) {
                $star['star4'] += 1;
            }
            if ($val['ratting_price'] == 4) {
                $star['star4'] += 1;
            }
            if ($val['ratting_quality'] == 5) {
                $star['star5'] += 1;
            }
            if ($val['ratting_service'] == 5) {
                $star['star5'] += 1;
            }
            if ($val['ratting_price'] == 5) {
                $star['star5'] += 1;
            }
        }
    }
    return $star;
}
function getImgAll($order_dish, $need, $idMer)
{
    $img = [];
    foreach ($order_dish as $k => $val) {
        if ($val['merchant_id'] == $idMer && $val['check_feed_back'] == 1) {
            if ($val[$need] != null) {
                $img[] = explode(',', $val[$need]);
            }
        }
    }
    return $img;
}
function getImgAllAjax($order_dish, $idMer, $label)
{
    $img = [];
    foreach ($order_dish as $val) {
        if ($val['merchant_id'] == $idMer && $val['check_feed_back'] == 1  &&  $val['label'] == $label) {
            if ($val['img_order'] != null) {
                $img[] = explode(',', $val['img_order']);
            }
        }
    }
    return $img;
}
function getVideoAllAjax($order_dish, $idMer)
{
    $img = [];
    foreach ($order_dish as $val) {
        if ($val['merchant_id'] == $idMer && $val['check_feed_back'] == 1) {
            if ($val['img_order'] != null) {
                $img[] = explode(',', $val['video_order']);
            }
        }
    }
    return $img;
}
function getFeedback($order_dish, $idMer, $model, $label)
{
    $feedback = [];
    foreach ($order_dish as $val) {
        if ($val['merchant_id'] == $idMer && $val['check_feed_back'] == 1) {
            $val['infoCus']   = $model->Generals_model->get_one_where_array_row('customer', ['id' => $val['customer_id']]);
            foreach ($label as $k => $item) {
                if ($k == $val['label']) {
                    $val['label'] = $item;
                }
            }
            $feedback[] = $val;
        }
    }
    return $feedback;
}
function getFeedback2($order_dish, $idMer, $model, $label)
{
    $feedback = [];
    foreach ($order_dish as $val) {

        $val['infoCus']   = $model->Generals_model->get_one_where_array_row('customer', ['id' => $val['customer_id']]);
        foreach ($label as $k => $item) {
            if ($k == $val['label']) {
                $val['label'] = $item;
            }
        }
        $feedback[] = $val;
    }
    return $feedback;
}
function getFeedbackAjax($order_dish, $idMer, $model, $label)
{
    $feedback = [];
    foreach ($order_dish as $val) {
        if ($val['merchant_id'] == $idMer && $val['check_feed_back'] == 1) {
            $val['infoCus']   = $model->Generals_model->get_one_where_array_row('customer', ['id' => $val['customer_id']]);
            foreach ($label as $k => $item) {
                if ($k == $val['label']) {
                    $val['label'] = $item;
                }
            }
            $feedback[] = $val;
        }
    }
    return $feedback;
}
