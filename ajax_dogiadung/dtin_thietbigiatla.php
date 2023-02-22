<?
include "config.php";
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $user_id = $_COOKIE['UID'];
    $user_type = $_COOKIE['UT'];
}

$id_dm     = getValue('id_dm', 'int', 'POST', '');
$tang_mphi = getValue('tang_mphi', 'int', 'POST', '');

$tieu_de = getValue('tieu_de', 'str', 'POST', '');
$tieu_de = sql_injection_rp($tieu_de);

$nhom     = getValue('nhom', 'int', 'POST', '');


$gia_tpham  = $_POST['gia_tpham'];
$don_vi     = getValue('don_vi', 'int', 'POST', '');
$chitiet_dm = getValue('chitiet_dm', 'int', 'POST', '');

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

$cou_file = count($_FILES['files']['name']);

$cou_video = count($_FILES['file']['name']);

$tinh_trang_ban = getValue('tinh_trang_ban', 'int', 'POST', '');

// nguoi mua
$gia_bd = getValue('gia_bd', 'str', 'POST', '');
$gia_kt = getValue('gia_kt', 'str', 'POST', '');
$donvi_mua = getValue('donvi_mua', 'int', 'POST', '');

if ($user_id != "" && $user_type != "" && $id_dm != "") {
    if ($cou_file > 0) {
        $check_tkhoan = new db_query("SELECT `usc_id`, `usc_name`, `usc_phone`, `usc_email`, `usc_address` FROM `user` WHERE `usc_id` = $user_id AND `usc_type` = $user_type ");
        if (mysql_num_rows($check_tkhoan->result) > 0) {
            $tkhoan       = mysql_fetch_assoc($check_tkhoan->result);
            $user_name    = $tkhoan['usc_name'];
            $user_phone   = $tkhoan['usc_phone'];
            $user_email   = $tkhoan['usc_email'];
            $user_address = $tkhoan['usc_address'];

            $check_tde = new db_query("SELECT `new_id` FROM `new` WHERE REPLACE(`new_title`,' ','') = REPLACE('$tieu_de',' ','')
                                    AND `new_city` = $tinh_thanh AND `quan_huyen` = $quan_huyen AND `phuong_xa` = $phuong_xa
                                    AND `new_ctiet_dmuc` = $chitiet_dm AND `new_user_id` = $user_id AND `new_type` = $user_type  ");
            if (mysql_num_rows($check_tde->result) > 0) {
                echo "Tin đăng đã tồn tại";
            } else {
                $check_mta = new db_query("SELECT n.`new_id` FROM `new` AS n INNER JOIN `new_description` AS d ON n.`new_id` = d.`new_id`
                            WHERE REPLACE(d.`new_description`,' ','') = REPLACE('$mo_ta',' ','') ");
                if (mysql_num_rows($check_mta->result) > 0) {
                    echo "Mô tả đã tồn tại";
                } else {
                    $anh = '';
                    for ($i = 0; $i < $cou_file; $i++) {
                        $filename  = time() . '_' . $_FILES['files']['name'][$i];
                        $file_name = 'thoi_trang/' . time() . '_' . $_FILES['files']['name'][$i];
                        $anh .= $file_name . ',';
                        $filetmp_name = $_FILES['files']['tmp_name'][$i];
                        $dir          = '../pictures/thoi_trang/';
                        move_uploaded_file($filetmp_name, $dir . '/' . $filename);
                    }
                    ;
                    $anh_avt = rtrim($anh, ',');

                    if ($cou_video > 0) {
                        $str_video  = $_FILES['file']['name'];
                        $str_video  = str_replace(' ', '_', $str_video);
                        $filevideo  = time() . "_" . $str_video;
                        $file_video = 'thoi_trang/' . time() . "_" . $str_video;
                        $video_tmp  = $_FILES['file']['tmp_name'];
                        $dir1       = '../pictures/thoi_trang/';
                        move_uploaded_file($video_tmp, $dir1 . '/' . $filevideo);
                    } else {
                        $file_video = '';
                    }

                    if ($dia_chi != '') {
                        $address = get_infor_from_address($dia_chi);
                        $lat     = $address->results[0]->geometry->location->lat;
                        $long    = $address->results[0]->geometry->location->lng;
                    } else {
                        $lat = $long = '';
                    }
                    ;

                    if ($user_type == 1 || $user_type == 3) {
                        $inser_td = new db_query("INSERT INTO `new`(`new_id`, `new_title`, `new_money`, `new_cate_id`, `new_city`, `new_user_id`, `new_image`,
                                        `new_create_time`, `new_type`, `new_active`, `new_unit`, `new_name`, `new_phone`, `new_email`, `new_address`,`chotang_mphi`, `quan_huyen`, `phuong_xa`, `new_sonha`, `dia_chi`, `new_video`, `new_ctiet_dmuc`,`new_tinhtrang`)
                                        VALUES ('','$tieu_de','$gia_tpham','$id_dm','$tinh_thanh','$user_id','$anh_avt','$ngay_dang','$user_type',
                                        '1','$don_vi','$user_name','$user_phone','$user_email','$user_address','$tang_mphi','$quan_huyen','$phuong_xa','$so_nha',
                                        '$dia_chi','$file_video','$chitiet_dm','$tinh_trang_ban')");

                        $newid     = new db_query("SELECT LAST_INSERT_ID() AS id_dt");
                        $id_dt     = mysql_fetch_assoc($newid->result)['id_dt'];
                        $inser_des = new db_query("INSERT INTO `new_description`(`new_des_id`, `new_id`, `new_description`,`loai_thiet_bi`)
                                    VALUES ('','$id_dt','$mo_ta','$nhom')");
                    } else if ($user_type == 2) {
                        $inser_td = new db_query("INSERT INTO `new`(`new_id`, `new_title`, `new_money`, `gia_kt`, `new_cate_id`, `new_city`, `new_user_id`, `new_image`,
                                        `new_create_time`, `new_type`, `new_active`, `new_unit`, `new_name`, `new_phone`, `new_email`, `new_address`,`chotang_mphi`, `quan_huyen`, `phuong_xa`, `new_sonha`, `dia_chi`, `new_video`, `new_ctiet_dmuc`,`new_tinhtrang`)
                                        VALUES ('','$tieu_de','$gia_bd','$gia_kt','$id_dm','$tinh_thanh','$user_id','$anh_avt','$ngay_dang','$user_type',
                                        '1','$donvi_mua','$user_name','$user_phone','$user_email','$user_address','$tang_mphi','$quan_huyen','$phuong_xa','$so_nha',
                                        '$dia_chi','$file_video','$chitiet_dm','$tinh_trang_ban')");

                        $newid     = new db_query("SELECT LAST_INSERT_ID() AS id_dt");
                        $id_dt     = mysql_fetch_assoc($newid->result)['id_dt'];
                        $inser_des = new db_query("INSERT INTO `new_description`(`new_des_id`, `new_id`, `new_description`,`loai_thiet_bi`)
                                    VALUES ('','$id_dt','$mo_ta','$nhom')");
                    }
                }
            }
        } else {
            echo "Tài khoản không tồn tại";
        }
    } else {
        echo "Chọn ít nhất 1 ảnh";
    }
} else {
    echo "Thông tin không đầy đủ, vui lòng thử lại";
}
