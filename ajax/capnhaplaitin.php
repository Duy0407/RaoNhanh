<?php
include("config.php");
$id_user = $_COOKIE['UID'];
$new_id_cn = getValue("new_id_cn", "int", "POST", 0);

if (isset($_COOKIE['UID'])) {
    $hom_nay = strtotime(date('Y-m-d', time()));
    $ngay_mai = $hom_nay + (24 * 3600);
    $thoi_gian = time();
    if ($new_id_cn != 0 && $id_user != 0) {
        $check_tt = new db_query("SELECT COUNT(`new_id`) AS cou_td FROM `new` WHERE `new_user_id` = $id_user AND `refresh_time` > $hom_nay
        AND `refresh_time` < $ngay_mai AND `refresh_new_home` = 1 ");
        $cou_td = mysql_fetch_assoc($check_tt->result)['cou_td'];
        if ($cou_td == 0) {
            $check_tg = new db_query("UPDATE `new` SET `new_create_time` = '$thoi_gian', `new_update_time` = '$thoi_gian', `refresh_time` = '$thoi_gian',
            `refresh_new_home` = 1 WHERE `new_id` = $new_id_cn AND `new_user_id` = $id_user ");
        } else {
            echo "Bạn đã làm mới tin ngày hôm nay.";
        }
    }
} else {
    echo "VUI LÒNG ĐĂNG NHẬP TÀI KHOẢN";
}
