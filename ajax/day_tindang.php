<?
include("config.php");
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $userid = $_COOKIE['UID'];
    $usertype = $_COOKIE['UT'];

    $new_id = getValue('new_id', 'int', 'POST', '');
    $day_tin = getValue('tin_nbat', 'int', 'POST', '');

    $tien_ttoan = $_POST['tien_ttoan'];
    $tien_ttoan1 = str_replace(',', '', $tien_ttoan);

    $tong_tien = $user_money;
    $tien_clai = $tong_tien - $tien_ttoan1;

    $gio_arr = $_POST['gio_arr'];
    $gio_lonnhat = max($gio_arr);
    $gio_nhonhat = min($gio_arr);

    $gio_arr = implode(',', $gio_arr);

    $so_ngay = getValue('so_ngay', 'int', 'POST', '');
    $thoi_gian = strtotime(date('Y-m-d H:i:s', time()));
    $noi_dung = "Đẩy tin đăng ";

    $gio_bdau = $_POST['gio_bdau'];
    $gio_bdau = strtotime($gio_bdau);

    $ngay_bdau = $_POST['ngay_bdau'];
    $ngay_bdau = strtotime($ngay_bdau);

    $gio_ss = $gio_nhonhat * 3600 + $ngay_bdau;
    if($gio_ss > $thoi_gian){
        $ngay_kthuc = ($ngay_bdau + (86400 * $so_ngay) + ($gio_lonnhat * 3600)) - 86400;
    }else{
        $ngay_kthuc = $ngay_bdau + (86400 * $so_ngay) + ($gio_lonnhat * 3600);
    }


    if ($new_id != "") {
        $update_ghim = new db_query("UPDATE `new` SET `new_day_tin` = '$gio_arr', `so_ngay_ghim` = '$so_ngay', `thoigian_bdghim` = '$thoi_gian',
                                `ngay_bdghim` = '$ngay_bdau', `ngay_ktghim` = '$ngay_kthuc', `tien_ghim` = '$tien_ttoan1' WHERE `new_id` = $new_id ");

        $upda_tien = new db_query("UPDATE `user` SET `usc_money` = '$tien_clai' WHERE `usc_id` = $userid AND `usc_type` = $usertype ");

        $inser_lsu = new db_query("INSERT INTO `history`(`his_id`, `his_user_id`, `his_price`, `his_price_suc`, `his_time`, `his_type`, `noi_dung`,`his_pb`)
                            VALUES ('','$userid','$tien_ttoan1','$tien_ttoan1','$thoi_gian','$usertype','$noi_dung','2')");
    } else {
        echo "Thông tin không đầy đủ";
    }
}
