<?
include("config.php");
$type = getValue('type', 'int', 'POST', '');
$type = trim($type);

$sdt = getValue('sdt', 'str', 'POST', '');
$sdt = trim($sdt);
$sdt = sql_injection_rp($sdt);

$ma_otp = getValue('ma_otp', 'int', 'POST', '');

$regex_email = ("/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/");
$regex_sdt = ("/^(032|033|034|035|036|037|038|039|086|096|097|098|081|082|083|084|085|088|091|094|056|058|092|070|076|077|078|079|089|090|093|099|059)+([0-9]{7})$/");

if ($sdt != '' && $type != '' && $ma_otp != "") {
    if (preg_match($regex_sdt, $sdt) == true || preg_match($regex_email, $sdt) == true) {
        if (preg_match($regex_sdt, $sdt) == true) {
            $check_tt = new db_query("SELECT `usc_id` FROM `user` WHERE `usc_phone` = '$sdt' AND `usc_type` = '$type' AND `otp_sdt` = $ma_otp ");
            if (mysql_num_rows($check_tt->result) > 0) {
                $update_otp = new db_query("UPDATE `user` SET `otp_sdt` = '$ma_otp' WHERE `usc_phone` = '$sdt' AND `usc_type` = '$type' AND `otp_sdt` = $ma_otp  ");
            } else {
                echo "Mã otp không đúng";
            }
        } else if (preg_match($regex_email, $sdt) == true) {
            $check_tt = new db_query("SELECT `usc_id` FROM `user` WHERE `usc_email` = '$sdt' AND `usc_type` = '$type' AND `otp_sdt` = $ma_otp ");
            if (mysql_num_rows($check_tt->result) > 0) {
                $update_otp = new db_query("UPDATE `user` SET `otp_sdt` = '$ma_otp' WHERE `usc_email` = '$sdt' AND `usc_type` = '$type' AND `otp_sdt` = $ma_otp  ");
            } else {
                echo "Mã otp không đúng";
            }
        }
    } else if (preg_match($regex_sdt, $sdt) == false || preg_match($regex_email, $sdt) == false) {
        echo "Định dạng số điện thoại không hợp lệ";
    }
} else {
    echo "Thông tin không đầy đủ";
}
