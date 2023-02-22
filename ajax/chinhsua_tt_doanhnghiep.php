<?php
include("config.php");
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $user_id = getValue('user_id', 'int', 'POST', 0);
    $user_id = trim($user_id);

    $user_type = getValue('user_type', 'int', 'POST', 0);
    $user_type = trim($user_type);

    $ma_thue = getValue("ma_thue", "str", "POST", '');
    $ma_thue = trim($ma_thue);
    $ma_thue = replaceMQ($ma_thue);
    $ma_thue = sql_injection_rp($ma_thue);

    $gian_hang = getValue("gian_hang", "str", "POST", '');
    $gian_hang = trim($gian_hang);
    $gian_hang = replaceMQ($gian_hang);
    $gian_hang = sql_injection_rp($gian_hang);


    $website = getValue("website", "str", "POST", '');
    $website = trim($website);
    $website = replaceMQ($website);
    $website = sql_injection_rp($website);

    $facebook = getValue("facebook", "str", "POST", '');
    $facebook = trim($facebook);
    $facebook = replaceMQ($facebook);
    $facebook = sql_injection_rp($facebook);

    $tinh_thanh = getValue("tinh_thanh", "int", "POST", "");
    $tinh_thanh = trim($tinh_thanh);
    $tinh_thanh = replaceMQ($tinh_thanh);

    $address = getValue("address", "str", "POST", "");
    $address = trim($address);
    $address = replaceMQ($address);
    $address = sql_injection_rp($address);

    $mota = getValue("mota", "str", "POST", "");
    $mota = trim($mota);
    $mota = replaceMQ($mota);
    $mota = sql_injection_rp($mota);

    // $anh = $_FILES['files']['name'];
    $file_name = trim($_FILES['files']['name']);
    $anh_cu = getValue('anh_cu', 'str', 'POST', '');

    if ($gian_hang != '') {
        $check_d = new db_query("SELECT `usc_id`, `usc_type` FROM `user` WHERE `usc_type` = '$user_type' AND `usc_id` = '$user_id'");
        if (mysql_num_rows($check_d->result) > 0) {
            if ($file_name != "" && $anh_cu == "") {
                $file_name = str_replace($bo_dau, '_', $file_name);
                $file_name1 = time() . '_' . $file_name;
                $filename = 'avt_dangtin/' . time() . '_' . $file_name;
                $filetmp_name = $_FILES['files']['tmp_name'];
                $dir = "../pictures/avt_dangtin/";
                move_uploaded_file($filetmp_name, $dir . '/' . $file_name1);
            } else if ($file_name == "" && $anh_cu != "") {
                $filename = $anh_cu;
            } else {
                $filename = '';
            }

            $update_dn = new db_query("UPDATE `user` SET `usc_name` = '$gian_hang', `usc_tax_code` = '$ma_thue', `usc_store_name` = '$gian_hang', `usc_website` = '$website',
                            `usc_facename`='$facebook', `usc_city`='$tinh_thanh', `usc_address` = '$address', `usc_des` = '$mota', `usc_store_license` = '$filename'
                            WHERE `usc_id` = $user_id ");
        } else {
            echo "Thông tin không đầy đủ";
        }
    } else {
        echo "Thông tin không đầy đủ";
    }
}
