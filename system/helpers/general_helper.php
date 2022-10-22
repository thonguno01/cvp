
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
function day()
{
    $day = array(
        '0' => 'Thứ 2',
        '1' => 'Thứ 3',
        '2' => 'Thứ 4',
        '3' => 'Thứ 5',
        '4' => 'Thứ 6',
        '5' => 'Thứ 7',
        '6' => 'Chủ nhật',
        '7' => "Cả Tuần"
    );
    return $day;
}

function typeMerchant()
{
    $typeMerchant = array(
        '0' => 'Nhà hàng',
        '1' => 'Quán ăn',
        '2' => 'Vỉa hè',
        '3' => 'Handmande',
        '4' => 'Ăn chay',
        '5' => 'Café',
        '6' => 'Trà sữa',
    );
    return $typeMerchant;
}

function type_food()
{
    $type_food = array(
        '0' => 'Đồ ăn vặt',
        '1' => 'Cơm văn phòng',
        '2' => 'Tráng miệng',
        '3' => 'Đồ ăn giảm cân',
        '4' => 'Món từ thịt',
        '5' => 'Đồ chay',
        '6' => 'Handmade',
        '7' => 'Nước có ga',
        '8' => 'Nước khoáng',
        '9' => 'Bia hơi',
    );
    return $type_food;
}
function lable()
{
    $lable = [
        '1' => 'Không gian',
        '2' => 'Món ăn',
        '3' => 'Thực đơn'
    ];
    return $lable;
}
function culinary()
{
    $lable = [
        '0' => 'Món Việt',
        '1' => 'Món Âu',
        '2' => 'Món Hàn',
        '3' => 'Món Nhật'
    ];
    return $lable;
}
function status_order()
{
    $status_order = array(
        '0' => 'Chờ xử lý',
        '1' => 'Đang giao',
        '2' => 'Hoàn thành',
        '3' => 'Đã hủy',
    );
    return $status_order;
}
function type_post()
{
    $status_order = array(
        '1' => 'HƯỚNG DẪN SỬ DỤNG CƠM VĂN PHÒNG - VIECLAM123',
        '2' => 'TIN TỨC DÀNH CHO MERCHANT',
        '3' => 'CÂU HỎI THƯỜNG GẶP',
    );
    return $status_order;
}
function notification_cus()
{
    $notifiCustomer =  array(
        // Khách hàng
        '0' => 'Đơn hàng của bạn Đang chờ xử lí ! Vui lòng chờ trong ít phút.',
        '1' => 'Đơn hàng của bạn Đang giao ! Vui lòng nhận hàng trong ít phút.',
        '2' => 'Đơn hàng của bạn đã hoàn tất ! Vui lòng vào đánh giá đơn hàng .',
        '4' => 'Đơn hàng của bạn đã giao thất bại !',
        '3' => 'Đơn hàng của bạn đã được hủy thành công ! Chúc bạn một ngày tràn đầy năng lượng .',
        '5' => 'Đơn hàng này đã bị hủy ! Chúng tôi rất tiếc về sự cố này.',
    );
    return $notifiCustomer;
}
function notification_mer()
{
    $notifiCustomer =  array(
        // Merchant
        '0' => 'Bạn vừa nhận được đơn hàng mới ! Hãy xác nhận.',
        '1' => 'Xác nhận đơn hàng thành công ! Đang giao hàng...',
        '2' => 'Giao hàng thành công ! Đón đơn mới thôi.',
        '4' => 'Giao hàng thất bại ! Chờ đơn về và tự thưởng thức nào.',
        '3' => 'Đơn hàng này đã bị hủy ! Chúng tôi rất tiếc về sự cố này.',
        '5' => 'Huỷ đơn hàng thành công ! Chúc quán ăn một ngày đông khách.',
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
    $pagination['first_link'] = 'Đầu';
    $pagination['last_link'] = 'Cuối';
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
        '3' => 'Biên tập',
        '4' => 'Thiết kế'
    ];
    return $lable;
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

function changeMinute($date2)
{
    // $date = getdate();
    // $dem = '';
    // $dem .= $date['year'] . '-' . $date['mon'] . '-' . $date['mday'] . ' ' . $date['hours'] . ':' . $date['minutes'] . ':' . $date['seconds'];

    // $date1 = $dem;
    $diff = abs(getdate()[0]) - $date2;
    $years = floor($diff / (365 * 60 * 60 * 24));
    $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
    $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
    $hours = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24) / (60 * 60));
    $minutes = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24 - $hours * 60 * 60) / 60);
    $seconds = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24 - $hours * 60 * 60 - $minutes * 60));

    if ($years = $months = $days = $hours == 0) {
        $time = $minutes . " phút trước";
    } elseif ($years = $months = $days == 0) {
        $time = $hours . " giờ trước";
    } elseif ($years = $months == 0) {
        $time = $days . " ngày trước";
    } elseif ($years == 0) {
        $time = $months . " tháng trước";
    } else {
        $time = $years . " năm trước";
    }
    return $time;
}
