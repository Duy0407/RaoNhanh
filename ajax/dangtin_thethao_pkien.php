<?
include("config.php");
$user_id   = getValue('user_id', 'int', 'POST', '');
$user_type = getValue('user_type', 'int', 'POST', '');
$id_dm     = getValue('id_dm', 'int', 'POST', '');

$tieu_de = getValue('tieu_de', 'str', 'POST', '');
$tieu_de = sql_injection_rp($tieu_de);
$tieu_de = removeEmoji($tieu_de);
$tieu_de = rtrim($tieu_de);
$mon_thethao = getValue('mon_the_thao', 'int', 'POST', 0);
$loai_phukien_ban = getValue('loai_phukien_ban', 'int', 'POST', 0);

$tinhtrang = getValue('tinhtrang', 'int', 'POST', '');
// truong moi
$canhan_moigioi = getValue('canhan_moigioi', 'int', 'POST', '');
$tang_mphi = getValue('td_lienhe_ngban', 'int', 'POST', '');
// truong moi
$xac_thuc = getValue('xac_thuc', 'int', 'POST', 0);
if ($xac_thuc == 1) {

    $ngay_bat_dau = getValue('ngay_bat_dau', 'str', 'POST', 0);
    $ngay_bat_dau = strtotime($ngay_bat_dau);
    $ngay_ket_thuc = getValue('ngay_ket_thuc', 'str', 'POST', 0);
    $ngay_ket_thuc = strtotime($ngay_ket_thuc);

    $soluong_min = getValue('soluong_min', 'int', 'POST', 0);
    $soluong_max = getValue('soluong_max', 'int', 'POST', 0);

    $gia_sanpham_xt = getValue('giasp_xt', 'str', 'POST', '');
    $gia_sanpham_xt = str_replace(',', '', $gia_sanpham_xt);
    $gia_sanpham_xt = rtrim(trim($gia_sanpham_xt), ';');
    if ($td_gia_spham == "") {
        $td_gia_spham = min(explode(";", $gia_sanpham_xt));
    }
}
// end

$gia_spham  = $_POST['td_gia_spham'];
$gia_spham  = str_replace(',', '', $gia_spham);
$don_vi     = getValue('dvi_tien', 'int', 'POST', '');

$ctiet_dm   = getValue('ctiet_dmuc', 'int', 'POST', '');
$dia_chi    = getValue('dia_chi', 'str', 'POST', '');
$tinh_thanh = getValue('tinh_thanh', 'int', 'POST', '');
$quan_huyen = getValue('quan_huyen', 'int', 'POST', '');
$phuong_xa  = getValue('phuong_xa', 'int', 'POST', '');
$so_nha     = getValue('so_nha', 'str', 'POST', '');
$so_nha     = sql_injection_rp($so_nha);

$mo_ta = getValue('mo_ta', 'str', 'POST', '');
$mo_ta = sql_injection_rp($mo_ta);
$mo_ta = removeEmoji($mo_ta);

$ngay_dang = strtotime(date('Y-m-d H:i:s', time()));
$cou_file  = count($_FILES['files']['name']);
$cou_video = count($_FILES['file']['name']);
$new_buy_sell = 2;
$bo_dau = [',', ';', ' '];
$sdt_lhe = getValue('sdt_lhe', 'str', 'POST', '');
$email_lhe = getValue('email_lhe', 'str', 'POST', '');

// ???nh c??
$anh_dd = $_POST['anh_dd'];
if ($anh_dd != "") {
    $da_dang = explode(',', $anh_dd);
    $cou_dang = count($da_dang);
}
// end

$homnay = strtotime(date('Y-m-d', time()));
$ngay_mai = $homnay + (24 * 3600);
$check_dt = new db_query("SELECT COUNT(`new_id`) AS dh_nay FROM `new` WHERE `new_create_time` > $homnay AND `new_create_time` < $ngay_mai
                        AND `new_user_id` = '" . $_COOKIE['UID'] . "' ");
$dtin_hnay = mysql_fetch_assoc($check_dt->result)['dh_nay'];
// if ($dtin_hnay > 24) {
//     echo "B???n ???? ????ng 24 tin trong ng??y. Ng??y mai b???n h??y quay l???i ????ng ti???p tin nh??.";
// } else {
//     $tgian_tiep = new db_query("SELECT `new_create_time` FROM `new` WHERE `new_user_id` = '" . $_COOKIE['UID'] . "' ORDER BY `new_id` DESC LIMIT 1 ");
//     $tieptuc_dt = mysql_fetch_assoc($tgian_tiep->result)['new_create_time'];
//     if ((time() - $tieptuc_dt) > 600) {
if ($user_id != "" && $user_type != "" && $id_dm != "") {
    if ($cou_file > 0 || $cou_dang > 0) {
        $check_tkhoan = new db_query("SELECT `usc_id`, `usc_name`, `usc_phone`, `usc_email`, `usc_address` FROM `user` WHERE `usc_id` = $user_id AND `usc_type` = $user_type ");
        if (mysql_num_rows($check_tkhoan->result) > 0) {
            $tkhoan = mysql_fetch_assoc($check_tkhoan->result);
            $user_name = $tkhoan['usc_name'];
            $user_address = $tkhoan['usc_address'];
            $check_tde = new db_query("SELECT `new_id` FROM `new` WHERE REPLACE(`new_title`,' ','') = REPLACE('$tieu_de',' ','')AND `new_user_id` = $user_id AND `new_type` = $user_type  ");
            if (mysql_num_rows($check_tde->result) > 0) {
                echo "Tin ????ng ???? t???n t???i";
            } else {
                $check_mta = new db_query("SELECT n.`new_id` FROM `new` AS n INNER JOIN `new_description` AS d ON n.`new_id` = d.`new_id`
                            WHERE REPLACE(d.`new_description`,' ','') = REPLACE('$mo_ta',' ','') ");
                if (mysql_num_rows($check_mta->result) > 0) {
                    echo "M?? t??? ???? t???n t???i";
                } else {
                    luu_index($ctiet_dm, $quan_huyen, $tinh_thanh, 0, 0, $arrcity2, $tags_tk1, $db_tags_vl, $db_cat_vl);
                    $anh = '';
                    for ($i = 0; $i < $cou_file; $i++) {
                        $filename_strr = str_replace($bo_dau, '_', $_FILES['files']['name'][$i]);
                        $filename = '/pictures/dtin_thethao/' . time() . '_' . $filename_strr;
                        $luu_anh = time() . '_' . $filename_strr;
                        $anh .= $filename . ';';
                        $filetmp_name = $_FILES['files']['tmp_name'][$i];
                        $dir          = '../pictures/dtin_thethao/';
                        move_uploaded_file($filetmp_name, $dir . '/' . $luu_anh);
                    };
                    $anh_avt = rtrim($anh, ';');
                    // tr?????ng h???p 1: th??m ???nh m???i v?? ???nh c?? v???n c??n
                    if ($cou_file > 0 && $cou_dang > 0) {
                        $anh_avt1 = explode(';', $anh_avt);
                        $anh_dd1 = explode(',', $anh_dd);
                        $file_anh1 = array_merge($anh_avt1, $anh_dd1);
                        $file_anh = implode(';', $file_anh1);
                    }
                    // kh??ng th??m ???nh m???i v?? ???nh c?? v???n c??n
                    else if ($cou_file == 0 && $cou_dang > 0) {
                        $anh_dd1 = explode(',', $anh_dd);
                        $file_anh = implode(';', $anh_dd1);
                    }
                    // th??m ???nh m???i v?? x??a ???nh c?? ??i
                    else if ($cou_file > 0 && $cou_dang == 0) {
                        $file_anh = $anh_avt;
                    }
                    if ($cou_video > 0) {
                        $str_video  = $_FILES['file']['name'];
                        $str_video  = str_replace($bo_dau, '_', $str_video);
                        $filevideo  = time() . "_" . $str_video;
                        $file_video = '/pictures/dtin_thethao/' . time() . "_" . $str_video;
                        $video_tmp  = $_FILES['file']['tmp_name'];
                        $dir1       = '../pictures/dtin_thethao/';
                        move_uploaded_file($video_tmp, $dir1 . '/' . $filevideo);
                    } else {
                        $file_video = '';
                    }

                    if ($dia_chi != '') {
                        $address = get_infor_from_address($dia_chi);
                        $lat = $address->results[0]->geometry->location->lat;
                        $long = $address->results[0]->geometry->location->lng;
                    } else {
                        $lat = $long = '';
                    };

                    $inser_td = new db_query("INSERT INTO `new`(`new_id`, `new_title`,`link_title`, `new_money`, `new_cate_id`, `new_city`, `new_user_id`, `new_image`,
                                    `new_create_time`, `new_type`, `new_active`, `new_unit`, `new_name`, `new_phone`, `new_email`, `new_address`,
                                    `chotang_mphi`, `quan_huyen`, `phuong_xa`, `new_sonha`, `dia_chi`, `new_video`, `new_ctiet_dmuc`, `new_tinhtrang`,
                                    `new_buy_sell`,`new_update_time`,`thoigian_kmbd`,`thoigian_kmkt`,`soluong_min`,`soluong_max`)
                                    VALUES ('', '$tieu_de','$tieu_de', '$gia_spham', '$id_dm', '$tinh_thanh', '$user_id', '$file_anh', '$ngay_dang', '$user_type',
                                    '1', '$don_vi', '$user_name', '$sdt_lhe', '$email_lhe','" . $dia_chi . "', '$tang_mphi', '$quan_huyen', '$phuong_xa',
                                    '$so_nha', '" . $dia_chi . "', '$file_video','$ctiet_dm','$tinhtrang',2,'$ngay_dang'
                                    ,'$ngay_bat_dau','$ngay_ket_thuc','$soluong_min','$soluong_max')");

                    $newid = new db_query("SELECT LAST_INSERT_ID() AS id_dt");
                    $id_dt = mysql_fetch_assoc($newid->result)['id_dt'];
                    $inser_des = new db_query("INSERT INTO `new_description`(`new_des_id`, `new_id`, `new_description`, `loai_chung`, `mon_the_thao`,`canhan_moigioi`)
                                VALUES ('','$id_dt','$mo_ta', '$loai_phukien_ban', '$mon_thethao','$canhan_moigioi')");
                    include('xac_thuc_chung.php');
                }
            }
        } else {
            echo "T??i kho???n kh??ng t???n t???i";
        }
    } else {
        echo "Ch???n ??t nh???t 1 ???nh";
    }
} else {
    echo "Th??ng tin kh??ng ?????y ?????, vui l??ng th??? l???i";
}
//     } else {
//         echo "Sau 10 ph??t b???n h??y ????ng tin ti???p theo nh??";
//     }
// }
