<?php
include("../home/config.php");
include("../functions/send_mail.php");
$email = replaceMQ(trim(getValue('email', 'str', 'POST', '')));
$password = replaceMQ(trim(getValue('password', 'str', 'POST', '')));
$name = replaceMQ(trim(getValue('name', 'str', 'POST', '')));
$birthday = replaceMQ(trim(getValue('birthday', 'str', 'POST', '')));
$gender = getValue('gender', 'int', 'POST', -1);
$phone = replaceMQ(trim(getValue('phone', 'str', 'POST', '')));
$city = trim(getValue('city', 'int', 'POST', 0));
$address = replaceMQ(trim(getValue('address', 'str', 'POST', '')));
$cate = getValue('cate', 'int', 'POST', 0);
$catDetail = getValue('catDetail', 'int', 'POST', 0);
$data = [
    'result'=>false,
    'message'=>'Có lỗi xảy ra',
    'data'=>null,
];
if($email != '' && $password != '' && $name != '' && $phone != '' && $city != 0 && $address != '' && $cate != 0 && $catDetail != 0){
    $data_check = new db_query("SELECT usc_id FROM user WHERE usc_email = '$email' AND usc_type = 2");
    if(mysql_num_rows($data_check->result) == 0){
        $ip = client_ip();
        $birth = ($birthday != '')?strtotime($birthday):0;
        $time = time();
        $password_md5 = md5($password.'raonhanh365');
        $qr_insert = new db_query("
            INSERT INTO `user`(`usc_name`, `usc_pass`, `usc_phone`, `usc_email`, `usc_birth_day`, `usc_gender`, 
            `usc_address`, `usc_type`, `usc_time`, `usc_city`, `usc_category`, `usc_category_detail`,  `client_ip`)
            VALUES ('$name','$password_md5','$phone','$email','$birth','$gender','$address',2,'$time','$city','$cate','$catDetail','$ip')
        ");
        $last_id5 = mysql_insert_id();
        if($last_id5){
            $code = md5($email);
            $link = $domain."/xac-thuc-tai-khoan-thanh-cong.html?code=".$code."&id=".$last_id5;
            SendRegisterByBuy($email,$name,$link);
            $data = [
                'result'=>true,
                'message'=>'Đăng ký thành công',
                'data'=>[
                    'id'=>$last_id5,
                    'name'=>$name,
                    'email'=>$email,
                    'userType'=>2,
                ],
            ];
        }

    }
}

echo json_encode($data, JSON_UNESCAPED_UNICODE);
