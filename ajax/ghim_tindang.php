<?
include("config.php");

if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $userid = $_COOKIE['UID'];
    $usertype = $_COOKIE['UT'];

    $new_id = getValue('new_id', 'int', 'POST', 0);
    $noi_ghim = getValue('noi_ghim', 'int', 'POST', 0);
    // $noi_ghim = 1: ghim trang chu
    // $noi_ghim = 2: ghim danh muc (thuoc ve tim kiem);
    $tien_ttoan = $_POST['tien_ghim'];
    $tien_ttoan1 = str_replace(',', '', $tien_ttoan);

    $tong_tien = $user_money;
    $tien_clai = $tong_tien - $tien_ttoan1;

    $so_ngay = getValue('so_ngay', 'int', 'POST', 0);
    if($so_ngay == 4){
        $so_ngayg = 7;
    }else if($so_ngay == 5){
        $so_ngayg = 14;
    }else{
        $so_ngayg = $so_ngay;
    }

    $thoi_gian = strtotime(date('Y-m-d H:i:s', time()));
    $noi_dung = "Ghim tin đăng ";

    $tgian_ghim = strtotime(date('Y-m-d H:i:s', time()));

    $ngay_bdau = strtotime(date('Y-m-d', time()));

    $ngay_kthuc = $tgian_ghim + (86400 * $so_ngayg);

    if ($new_id != "") {
        if($noi_ghim == 1){
            $update_ghim = new db_query("UPDATE `new` SET `new_pin_home` = '$so_ngay', `so_ngay_ghim` = '$so_ngayg', `thoigian_bdghim` = '$tgian_ghim',
                                `ngay_bdghim` = '$ngay_bdau', `ngay_ktghim` = '$ngay_kthuc', `tien_ghim` = '$tien_ttoan1' WHERE `new_id` = $new_id ");
        }else if($noi_ghim == 2){
            $update_ghim = new db_query("UPDATE `new` SET `new_pin_cate` = '$so_ngay', `so_ngay_ghim` = '$so_ngay', `thoigian_bdghim` = '$tgian_ghim',
                                `ngay_bdghim` = '$ngay_bdau', `ngay_ktghim` = '$ngay_kthuc', `tien_ghim` = '$tien_ttoan1' WHERE `new_id` = $new_id ");
        };

        $upda_tien = new db_query("UPDATE `user` SET `usc_money` = '$tien_clai' WHERE `usc_id` = $userid AND `usc_type` = $usertype ");

        $inser_lsu = new db_query("INSERT INTO `history`(`his_id`, `his_user_id`, `his_price`, `his_price_suc`, `his_time`, `his_type`, `noi_dung`,`his_pb`)
                            VALUES ('','$userid','$tien_ttoan1','$tien_ttoan1','$thoi_gian','$usertype','$noi_dung','1')");
    } else {
        echo "Thông tin không đầy đủ";
    }
}
