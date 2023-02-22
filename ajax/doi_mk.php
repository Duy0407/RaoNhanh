<?
include("config.php");

if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $usc_id = $_COOKIE['UID'];
    $us_type = $_COOKIE['UT'];

    $mk1 = getValue('mk1', 'str', 'POST', '');

    $mk1 = trim($mk1);
    $mk1 = replaceMQ($mk1);
    $mk1 = sql_injection_rp($mk1);
    $mkcu = md5($mk1 . "raonhanh365");

    $mk2 = getValue('mk2', 'str', 'POST', '');
    $mk2 = trim($mk2);
    $mk2 = replaceMQ($mk2);
    $mk2 = sql_injection_rp($mk2);

    $mkmh = md5($mk2 . "raonhanh365");

    if ($mk1 != "" && $mk2 != "") {
        if($mkcu == $mkmh){
            echo "Mật khẩu mới phải khác mật khẩu cũ";
        }else{
            $check_tt = new db_query("SELECT `usc_id` FROM `user` WHERE `usc_id` = $usc_id AND `usc_type` = $us_type AND `usc_pass` = '" . $mkcu . "' ");
            if (mysql_num_rows($check_tt->result) > 0) {
                $ud_mk = new db_query("UPDATE `user` SET `usc_pass` = '$mkmh' WHERE `usc_id` = $usc_id AND `usc_type` = $us_type ");
            } else {
                echo "Mật khẩu hiện tại không đúng";
            }
        }
    }
}
