<?
include("config.php");
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $user_id = $_COOKIE['UID'];
    $user_type = $_COOKIE['UT'];

    // ĐÃ BÁN
    $id_tin = getValue('id_tin', 'int', 'POST', 0);
    $tgian_ban = strtotime(date('Y-m-d H:i:s', time()));

    // dang ban lai
    $id_tindl = getValue('id_tindl', 'int', 'POST', 0);
    $tgian_dang = strtotime(date('Y-m-d H:i:s', time()));

    if ($id_tin != 0 && $id_tindl == "") {
        // đã bán
        $ud = new db_query("UPDATE `new` SET `da_ban` = 1, `tgian_ban` = $tgian_ban WHERE `new_id` = $id_tin AND `new_user_id` = $user_id AND `new_type` = $user_type");

        $ud_tdghim = new db_query("UPDATE `new` SET `tgian_tghim` = $tgian_ban WHERE `new_id` = $id_tin AND `new_user_id` = $user_id AND `new_type` = $user_type
                                AND (`new_pin_home` != 0 OR `new_pin_cate` != 0 OR `new_day_tin` != '' )");

    } else if ($id_tin == "" && $id_tindl != 0 ) {
        // đăng bán lại
        $check_gtin = new db_query("SELECT `tgian_tghim`, `ngay_ktghim` FROM `new` WHERE `new_id` = $id_tindl AND `new_user_id` = $user_id
                                    AND (`new_pin_home` != 0 OR `new_pin_cate` != 0 OR `new_day_tin` != '' ) ");

        if(mysql_num_rows($check_gtin -> result) > 0){
            $row_ghim = mysql_fetch_assoc($check_gtin -> result);
            $ngay_ktghim = $row_ghim['ngay_ktghim'];
            $tgian_tghim = $row_ghim['tgian_tghim'];

            $tgian_clai = $ngay_ktghim - $tgian_tghim;

            $tgian_ktmoi = $tgian_clai + $tgian_dang;

            $ud_tdghim = new db_query("UPDATE `new` SET `tgian_tghim` = '0', `ngay_ktghim` = '$tgian_ktmoi' WHERE `new_id` = $id_tindl AND `new_user_id` = $user_id
                                    AND `new_type` = $user_type ");
        }

        $ud = new db_query("UPDATE `new` SET `da_ban` = 0, `new_create_time` = '$tgian_dang' WHERE `new_id` = $id_tindl AND `new_user_id` = $user_id
                            AND `new_type` = $user_type");
    } else {
        echo "Thông tin không đầy đủ";
    }
}
