<?
include("config.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = getValue('user_id', 'int', 'POST', 0);
    $user_id = trim($user_id);

    $user_type = getValue('user_type', 'int', 'POST', 0);
    $user_type = trim($user_type);

    $ho_ten = getValue('ho_ten', 'str', 'POST', '');
    $ho_ten = trim($ho_ten);
    $ho_ten = replaceMQ($ho_ten);
    $ho_ten = sql_injection_rp($ho_ten);

    $email = getValue("email", "str", "POST", "");

    $address = getValue("address", "str", "POST", "");
    $address = trim($address);
    $address = replaceMQ($address);
    $address = sql_injection_rp($address);


    if ($ho_ten != '') {
        $check_d = new db_query("SELECT `usc_id`, `usc_type` FROM `user` WHERE `usc_type` = '$user_type' AND `usc_id` = '$user_id'");
        if (mysql_num_rows($check_d->result) > 0) {
                $ngmua_update = new db_query("UPDATE `user` SET `usc_name` = '$ho_ten', `email_ht` = '$email', `usc_address` = '$address' WHERE `usc_id` = $user_id");
        }else {
            echo "Tài khoản không tồn tại";
        }
    } else {
        echo "Thông tin không đầy đủ";
    }
}
