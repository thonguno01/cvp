<?php
class Globals
{
    function SendMailAmazon($title, $name, $email, $body)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://vieclam123.vn/api_sendemail',
            CURLOPT_POST => 1,
            CURLOPT_SSL_VERIFYPEER => false, //Bỏ kiểm SSL
            CURLOPT_POSTFIELDS => array(
                'email' => $email,
                'body'  => $body,
                'title' => $title,
                'name' => $name,
            )
        ));
        $resp = curl_exec($curl);
        $responsive = json_decode($resp);
        curl_close($curl);
        return $responsive;
    }
    public static function getNameCityDistric($mechants, $citys, $hours = array(), $days = array(), $typeMerchant = array())
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
    public static function getCityDistric($mechants, $citys)
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
            $result[$mechant['id']] = $mechant;
        }
        return $result;
    }
}
