
<?php
function show($array)
{
    echo "<pre>";
    var_dump($array);
    echo "</pre>";
}
function getTime()
{
    $date = getdate();
    $dem = '';
    $dem .= $date['year'] . '-' . $date['mon'] . '-' . $date['mday'] . ' ' . $date['hours'] . ':' . $date['minutes'] . ':' . $date['seconds'];
    return $dem;
}

function getTime2()
{
    $date = getdate();
    $dem = '';
    $dem .= $date['hours'] . ':' . $date['minutes'] . ':' . $date['seconds'];
    return $dem;
}
function hour()
{
    $hour = array(
        '0' => '00:00',
        '1' => '01:00',
        '2' => '02:00',
        '3' => '03:00',
        '4' => '04:00',
        '5' => '05:00',
        '6' => '06:00',
        '7' => '07:00',
        '8' => '08:00',
        '9' => '09:00',
        '10' => '10:00',
        '11' => '11:00',
        '12' => '12:00',
        '13' => '13:00',
        '14' => '14:00',
        '15' => '15:00',
        '16' => '16:00',
        '17' => '17:00',
        '18' => '18:00',
        '19' => '19:00',
        '20' => '20:00',
        '21' => '21:00',
        '22' => '22:00',
        '23' => '23:00',
        '24' => '24:00',
        '25' => '00:30',
        '26' => '01:30',
        '27' => '02:30',
        '28' => '03:30',
        '29' => '04:30',
        '30' => '05:30',
        '31' => '06:30',
        '32' => '07:30',
        '33' => '08:30',
        '34' => '09:30',
        '35' => '10:30',
        '36' => '11:30',
        '37' => '12:30',
        '38' => '13:30',
        '39' => '14:30',
        '40' => '15:30',
        '41' => '16:30',
        '42' => '17:30',
        '43' => '18:30',
        '44' => '19:30',
        '45' => '20:30',
        '46' => '21:30',
        '47' => '22:30',
        '48' => '23:30',
    );
    return $hour;
}
function get_hour($id)
{
    $hour = array(
        '0' => '00:00',
        '1' => '01:00',
        '2' => '02:00',
        '3' => '03:00',
        '4' => '04:00',
        '5' => '05:00',
        '6' => '06:00',
        '7' => '07:00',
        '8' => '08:00',
        '9' => '09:00',
        '10' => '10:00',
        '11' => '11:00',
        '12' => '12:00',
        '13' => '13:00',
        '14' => '14:00',
        '15' => '15:00',
        '16' => '16:00',
        '17' => '17:00',
        '18' => '18:00',
        '19' => '19:00',
        '20' => '20:00',
        '21' => '21:00',
        '22' => '22:00',
        '23' => '23:00',
        '24' => '24:00',
        '25' => '00:30',
        '26' => '01:30',
        '27' => '02:30',
        '28' => '03:30',
        '29' => '04:30',
        '30' => '05:30',
        '31' => '06:30',
        '32' => '07:30',
        '33' => '08:30',
        '34' => '09:30',
        '35' => '10:30',
        '36' => '11:30',
        '37' => '12:30',
        '38' => '13:30',
        '39' => '14:30',
        '40' => '15:30',
        '41' => '16:30',
        '42' => '17:30',
        '43' => '18:30',
        '44' => '19:30',
        '45' => '20:30',
        '46' => '21:30',
        '47' => '22:30',
        '48' => '23:30',
    );
    return $hour[$id];
}
function day()
{
    $day = array(
        '0' => 'Th??? 2',
        '1' => 'Th??? 3',
        '2' => 'Th??? 4',
        '3' => 'Th??? 5',
        '4' => 'Th??? 6',
        '5' => 'Th??? 7',
        '6' => 'Ch??? nh???t',
        '7' => "C??? Tu???n"
    );
    return $day;
}
function typeMerchant()
{
    $typeMerchant = array(
        '0' => 'Nh?? h??ng',
        '1' => 'Qu??n ??n',
        '2' => 'V???a h??',
        '3' => 'Handmande',
        '4' => '??n chay',
        '5' => 'Caf??',
        '6' => 'Tr?? s???a',
    );
    return $typeMerchant;
}

function type_food()
{
    $type_food = array(
        '0' => '????? ??n v???t',
        '1' => 'C??m v??n ph??ng',
        '2' => 'Tr??ng mi???ng',
        '3' => '????? ??n gi???m c??n',
        '4' => 'M??n t??? th???t',
        '5' => '????? chay',
        '6' => 'Handmade',
        '7' => 'N?????c c?? ga',
        '8' => 'N?????c kho??ng',
        '9' => 'Bia h??i',
    );
    return $type_food;
}
function lable()
{
    $lable = [
        '1' => 'Kh??ng gian',
        '2' => 'M??n ??n',
        '3' => 'Th???c ????n'
    ];
    return $lable;
}
function culinary()
{
    $lable = [
        '0' => 'M??n Vi???t',
        '1' => 'M??n ??u',
        '2' => 'M??n H??n',
        '3' => 'M??n Nh???t'
    ];
    return $lable;
}
function status_order()
{
    $status_order = array(
        '0' => 'Ch??? x??? l??',
        '1' => '??ang giao',
        '2' => 'Ho??n th??nh',
        '3' => '???? h???y',
    );
    return $status_order;
}
function type_post()
{
    $status_order = array(
        '1' => 'H?????NG D???N S??? D???NG C??M V??N PH??NG - VIECLAM123',
        '2' => 'TIN T???C D??NH CHO MERCHANT',
        '3' => 'C??U H???I TH?????NG G???P',
    );
    return $status_order;
}
function notification_cus()
{
    $notifiCustomer =  array(
        // Kh??ch h??ng
        '0' => '????n h??ng c???a b???n ??ang ch??? x??? l?? ! Vui l??ng ch??? trong ??t ph??t.',
        '1' => '????n h??ng c???a b???n ??ang giao ! Vui l??ng nh???n h??ng trong ??t ph??t.',
        '2' => '????n h??ng c???a b???n ???? ho??n t???t ! Vui l??ng v??o ????nh gi?? ????n h??ng .',
        '4' => '????n h??ng c???a b???n ???? giao th???t b???i !',
        '3' => '????n h??ng c???a b???n ???? ???????c h???y th??nh c??ng ! Ch??c b???n m???t ng??y tr??n ?????y n??ng l?????ng .',
        '5' => '????n h??ng n??y ???? b??? h???y ! Ch??ng t??i r???t ti???c v??? s??? c??? n??y.',
    );
    return $notifiCustomer;
}
function notification_mer()
{
    $notifiCustomer =  array(
        // Merchant
        '0' => 'B???n v???a nh???n ???????c ????n h??ng m???i ! H??y x??c nh???n.',
        '1' => 'X??c nh???n ????n h??ng th??nh c??ng ! ??ang giao h??ng...',
        '2' => 'Giao h??ng th??nh c??ng ! ????n ????n m???i th??i.',
        '4' => 'Giao h??ng th???t b???i ! Ch??? ????n v??? v?? t??? th?????ng th???c n??o.',
        '3' => '????n h??ng n??y ???? b??? h???y ! Ch??ng t??i r???t ti???c v??? s??? c??? n??y.',
        '5' => 'Hu??? ????n h??ng th??nh c??ng ! Ch??c qu??n ??n m???t ng??y ????ng kh??ch.',
    );
    return $notifiCustomer;
}
function getdateNotice()
{
    return getdate()[0];
}
function ci_pagination($url, $total_rows, $row_per_page)
{
    $pagination['base_url'] = $url;
    $pagination['total_rows'] = $total_rows;
    $pagination['per_page'] = $row_per_page;
    $pagination['page_query_string'] = true;
    $pagination['num_tag_open'] = '<button class="t_paginate_item">';
    $pagination['num_tag_close'] = '</button>';
    $pagination['first_tag_open'] = '<button class="t_paginate_item t_paginate_item_big">';
    $pagination['first_tag_close'] = '</button>';
    $pagination['last_tag_open'] = '<button class="t_paginate_item t_paginate_item_big">';
    $pagination['last_tag_close'] = '</button>';
    $pagination['next_tag_open'] = '<button class="t_paginate_item t_paginate_item_next">';
    $pagination['next_tag_close'] = '</button>';
    $pagination['prev_tag_open'] = '<button class="t_paginate_item t_paginate_item_prev">';
    $pagination['prev_tag_close'] = '</button>';
    $pagination['cur_tag_open'] = '<button class="t_paginate_item t_paginate_active">';
    $pagination['first_link'] = '?????u';
    $pagination['last_link'] = 'Cu???i';
    $pagination['query_string_segment'] = 'page';
    $pagination['use_page_numbers'] = TRUE;
    return $pagination;
}
function admin()
{
    $lable = [
        '0' => 'Admin',
        '1' => 'Sale',
        '2' => 'Kinh doanh',
        '3' => 'Bi??n t???p',
        '4' => 'Thi???t k???'
    ];
    return $lable;
}
function create_slug($string)
{
    $search = array(
        '#(??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???)#',
        '#(??|??|???|???|???|??|???|???|???|???|???)#',
        '#(??|??|???|???|??)#',
        '#(??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???)#',
        '#(??|??|???|???|??|??|???|???|???|???|???)#',
        '#(???|??|???|???|???)#',
        '#(??)#',
        '#(??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???)#',
        '#(??|??|???|???|???|??|???|???|???|???|???)#',
        '#(??|??|???|???|??)#',
        '#(??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???)#',
        '#(??|??|???|???|??|??|???|???|???|???|???)#',
        '#(???|??|???|???|???)#',
        '#(??)#',
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

function changeMinute($date2)
{
    $etime = time() - $date2;

    if ($etime < 1) {
        return '0 gi??y';
    }
    $a = array(
        365 * 24 * 60 * 60  =>  'n??m',
        30 * 24 * 60 * 60  =>  'th??ng',
        24 * 60 * 60  =>  'ng??y',
        60 * 60  =>  'gi???',
        60  =>  'ph??t',
        1  =>  'gi??y'
    );
    $a_plural = array(
        'n??m'  => 'n??m',
        'th??ng' => 'th??ng',
        'ng??y' => 'ng??y',
        'gi???'  => 'gi???',
        'ph??t' => 'ph??t',
        'gi??y' => 'gi??y'
    );
    foreach ($a as $secs => $str) {
        $d = $etime / $secs;
        if ($d >= 1) {
            $r = round($d);
            return $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) . ' tr?????c';
        }
    }
}
function getNameCityDistric($mechants, $citys, $hours = array(), $days = array(), $typeMerchant = array())
{
    $result = array();
    foreach ($mechants as $k => $mechant) {
        foreach ($citys as $city) {
            if ($mechant['id_city'] ==  $city['cit_id']) {
                $mechant['id_city'] =  $city['cit_name'];
            }
            if ($mechant['id_district'] ==  $city['cit_id']) {
                $mechant['id_district'] =  $city['cit_name'];
            };
        }
        foreach ($hours as $key => $value) {
            if ($mechant['time_start'] == $key) {
                $mechant['time_start'] =  $value;
            }
            if ($mechant['time_end'] == $key) {
                $mechant['time_end'] =  $value;
            }
        }
        foreach ($days as $keyDay => $day) {
            if ($mechant['day_open'] == $keyDay) {
                $mechant['day_open'] =  $day;
            }
        }
        foreach ($typeMerchant as $keyMechant => $type) {
            if ($mechant['type_merchant'] == $keyMechant) {
                $mechant['type_merchant'] =  $type;
            }
        }
        $result[$mechant['id']] = $mechant;
    }
    return $result;
}
function list_city()
{
    $CI = &get_instance();
    $CI->load->database();

    $CI->db->select('*');
    $CI->db->where('cit_parent', 0);
    $array = $CI->db->get('city2')->result_array();
    $result = [];
    foreach ($array as $item) {
        $result[$item['cit_id']] = $item;
    }
    return $result;
}
function get_city_where($id_city)
{
    $CI = &get_instance();
    $CI->load->database();

    $CI->db->select('*');
    $CI->db->where('cit_id', $id_city);
    $array = $CI->db->get('city2')->row_array();
    return $array['cit_name'];
}
