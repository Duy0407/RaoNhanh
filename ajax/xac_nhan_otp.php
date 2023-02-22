<?
include("config.php");
$tk = getValue('tai_khoan', 'str', 'POST', '');
$type = getValue('type', 'int', 'POST', '');
$ma_otp = getValue('ma_otp', 'int', 'POST', '');

if($tk != "" && $type != "" && $ma_otp != ""){
    $check_ttai = new db_query("SELECT `usc_id`, `usc_pass` FROM `user` WHERE `usc_phone` = '".$tk. "' AND `usc_type` = '".$type. "' AND `otp_sdt` = '".$ma_otp."' ");
    if(mysql_num_rows($check_ttai -> result) > 0){
        $tt_dnghiep = mysql_fetch_assoc($check_ttai -> result);
        $user_id = $tt_dnghiep['usc_id'];
        $pass = $tt_dnghiep['usc_pass'];
        $update_code = new db_query("UPDATE `user` SET `usc_authentic`= '1', `otp_sdt`= '0' WHERE `usc_phone` = '" . $tk . "' AND `usc_type` = '" . $type . "' AND `otp_sdt` = '" . $ma_otp . "' ");

        setcookie('UT', $type, time() + 24 * 3600, '/');
        setcookie('UID', $user_id, time() + 24 * 3600, '/');
        setcookie('PHPSESPASS', $pass, time() + 24 * 3600, '/');
    }else{
        echo "Thông tin không chính xác";
    }
}
