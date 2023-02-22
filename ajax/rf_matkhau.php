<?
include("config.php");
$type = getValue('type', 'int', 'POST', '');
$type = trim($type);

$sdt = getValue('phone', 'str', 'POST', '');
$sdt = trim($sdt);
$sdt = sql_injection_rp($sdt);

$ma_otp = getValue('ma_otp', 'int', 'POST', '');
$ma_otp = trim($ma_otp);
$ma_otp = sql_injection_rp($ma_otp);

$pass = getValue('pass', 'str', 'POST', '');
$pass = trim($pass);
$pass = sql_injection_rp($pass);



$regex_sdt = ("/^(032|033|034|035|036|037|038|039|086|096|097|098|081|082|083|084|085|088|091|094|056|058|092|070|076|077|078|079|089|090|093|099|059)+([0-9]{7})$/");

if($sdt != '' && $type != '' && $pass != "" && $ma_otp != ""){
    $pass_md5 = md5($pass . "raonhanh365");

    if (preg_match($regex_sdt, $sdt)) {
        $check_tt = new db_query("SELECT `usc_id` FROM `user` WHERE `usc_phone` = '$sdt' AND `usc_type` = '$type' AND `otp_sdt` = '$ma_otp' ");
        if (mysql_num_rows($check_tt->result) > 0) {
            $update_pass = new db_query("UPDATE `user` SET `usc_pass` = '$pass_md5' WHERE `usc_phone` = '$sdt' AND `usc_type` = '$type' ");
            $update_pass = new db_query("UPDATE `user` SET `otp_sdt` = '' WHERE `usc_phone` = '$sdt' AND `usc_type` = '$type' ");

            setcookie('PHPSESPASS', $pass_md5, time() + 24 * 3600, '/');
        } else {
            echo "Không tồn tại tài khoản";
        }
    }else{
        echo "Định dạng số điện thoại không hợp lệ";
    }
}else{
    echo "Thông tin không đầy đủ";
}



?>