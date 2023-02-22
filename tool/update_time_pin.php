<?php
include_once "../config.php";
$today = strtotime(date('Y-m-d',time()));
//lấy tin đã ghim
$data_new_pin_home = new db_query("SELECT new_id FROM new WHERE new_pin_home = 1 AND new_time_home < $today");
$data_new_pin_cate = new db_query("SELECT new_id FROM new WHERE new_pin_cate = 1 AND new_time_cate < $today");

//lấy gian hàng đã ghim
$data_user_pin_cate = new db_query("SELECT usc_id FROM user WHERE usc_type = 5 AND ghim_gian_hang = 1 AND han_ghim < $today");

//cập nhật trạng thái ghim
if (mysql_num_rows($data_new_pin_home->result) > 0) {
    while ($row = mysql_fetch_assoc($data_new_pin_home->result)) {
        $new_id = $row['new_id'];
        $update_pinHome = new db_query("UPDATE new SET new_pin_home=0 WHERE new_id = '$new_id'");
    }
}
if (mysql_num_rows($data_new_pin_cate->result) > 0) {
    while ($row = mysql_fetch_assoc($data_new_pin_cate->result)) {
        $new_id = $row['new_id'];
        $update_pinCate = new db_query("UPDATE new SET new_pin_cate=0 WHERE new_id = '$new_id'");
    }
}
if (mysql_num_rows($data_user_pin_cate->result) > 0) {
    while ($row = mysql_fetch_assoc($data_user_pin_cate->result)) {
        $usc_id = $row['usc_id'];
        $update_pinGh = new db_query("UPDATE user SET ghim_gian_hang=0 WHERE usc_id = '$usc_id'");
    }
}