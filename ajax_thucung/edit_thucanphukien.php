<?
include("config.php");
if (isset($_COOKIE['UID'])) {
    $user_id = getValue('user_id', 'int', 'POST', 0);
    $user_type = getValue('user_type', 'int', 'POST', 0);
    $id_tc = getValue('id_nd', 'int', 'POST', 0);

    $tieu_de = getValue('tieu_de', 'str', 'POST', '');
    $tieu_de = trim($tieu_de);
    $tieu_de = removeEmoji($tieu_de);
    $tieu_de = sql_injection_rp($tieu_de);

    $nhomsanpham = getValue('nhomsanpham', 'int', 'POST', 0);
    $giong_thucung = getValue('giong_thucung', 'int', 'POST', 0);

    if ($nhomsanpham == 58) {
        $han_sd = $_POST['han_sd'];
        $han_sd = strtotime($han_sd);

        $trong_luong = getValue('trong_luong', 'str', 'POST', '');
        $thetich = getValue('thetich', 'str', 'POST', '');
    } else {
        $han_sd = 0;
        $trong_luong = '';
        $thetich = '';
    }

    $han_sd = getValue('han_sd', 'str', 'POST', '');
    $han_sd = strtotime($han_sd);

    $trong_luong = getValue('trong_luong', 'str', 'POST', '');
    $thetich = getValue('thetich', 'str', 'POST', '');


    // thay doi
    $free_gift = getValue('td_lienhe_ngban', 'int', 'POST', 0);
    $cate_id = getValue('id_dm', 'int', 'POST', 0);
    $canhan_moigioi = getValue('canhan_moigioi', 'int', 'POST', 0);
    $sdt_lhe = getValue('sdt_lhe', 'str', 'POST', '');
    $email_lhe = getValue('email_lhe', 'str', 'POST', '');

    $td_gia_spham = getValue('td_gia_spham', 'str', 'POST', '');
    $td_gia_spham = str_replace(',', '', $td_gia_spham);

    $donvi_ban = getValue('donvi_ban', 'int', 'POST', 1);

    $mo_ta = getValue('mo_ta', 'str', 'POST', '');
    $mo_ta = trim($mo_ta);
    $mo_ta = removeEmoji($mo_ta);
    $mo_ta = mb_convert_encoding($mo_ta, 'HTML-ENTITIES', 'UTF-8');
    $mo_ta = sql_injection_rp($mo_ta);

    $ctiet_dmuc = getValue('ctiet_dmuc', 'int', 'POST', 0);
    $tinh_thanh = getValue('tinh_thanh', 'int', 'POST', 0);
    $quan_huyen = getValue('quan_huyen', 'int', 'POST', 0);
    $phuong_xa = getValue('phuong_xa', 'int', 'POST', 0);
    $so_nha = getValue('so_nha', 'str', 'POST', '');
    $so_nha = sql_injection_rp($so_nha);

    $dia_chi = getValue('dia_chi', 'str', 'POST', '');
    $dia_chi = sql_injection_rp2($dia_chi);

    $ngay_dang = strtotime(date("Y-m-d H:i:s", time()));
    $anh_dd = $_POST['anh_dd'];
    if ($anh_dd != "") {
        $da_dang = explode(',', $anh_dd);
        $cou_dang = count($da_dang);
    };
    // video cu
    $video_cu = getValue('video_cu', 'str', 'POST', '');
    // end
    $cou_file = count($_FILES['files']['name']);

    $cou_video = count($_FILES['file']['name']);

    if ($user_id != 0 && $id_tc != 0 && $tieu_de != "") {
        if ($cou_file > 0 || $cou_dang > 0) {
            $query_check = new db_query("SELECT `new_id` FROM `new` WHERE `new_user_id` = $user_id AND `new_type` = $user_type
                                        AND `new_id` != $id_tc AND REPLACE(`new_title`,' ','') = REPLACE('$tieu_de',' ','') LIMIT 1 ");
            if (mysql_num_rows($query_check->result) > 0) {
                echo "Tin đăng đã tồn tại!";
            } else {
                luu_index($ctiet_dmuc, $quan_huyen, $tinh_thanh, 0, 0, $arrcity2, $tags_tk1, $db_tags_vl, $db_cat_vl, $db_tkhoadb3);
                $anh = '';
                for ($i = 0; $i < $cou_file; $i++) {
                    $filename_strr = str_replace($bo_dau, '_', $_FILES['files']['name'][$i]);
                    $filename = '/pictures/dangtin_thucung/' . time() . '_' . $filename_strr;
                    $luu_anh = time() . '_' . $filename_strr;
                    $anh .= $filename . ';';
                    $filetmp_name = $_FILES['files']['tmp_name'][$i];
                    $dir = '../pictures/dangtin_thucung/';
                    move_uploaded_file($filetmp_name, $dir . '/' . $luu_anh);
                };
                $anh_avt = rtrim($anh, ';');
                // thêm ảnh mới và ảnh cũ vẫn còn
                if ($cou_file > 0 && $cou_dang > 0) {
                    $anh_avt1 = explode(';', $anh_avt);
                    $anh_dd1 = explode(',', $anh_dd);
                    $file_anh1 = array_merge($anh_avt1, $anh_dd1);
                    $file_anh = implode(';', $file_anh1);
                }
                // không thêm ảnh mới và ảnh cũ vẫn còn
                else if ($cou_file == 0 && $cou_dang > 0) {
                    $anh_dd1 = explode(',', $anh_dd);
                    $file_anh = implode(';', $anh_dd1);
                }
                // thêm ảnh mới và xóa ảnh cũ đi
                else if ($cou_file > 0 && $cou_dang == 0) {
                    $file_anh = $anh_avt;
                };

                if ($cou_video > 0 && $video_cu == "") {
                    $str_video  = $_FILES['file']['name'];
                    $str_video  = str_replace($bo_dau, '_', $str_video);
                    $filevideo  = time() . "_" . $str_video;
                    $file_video = '/pictures/dangtin_thucung/' . time() . "_" . $str_video;
                    $video_tmp  = $_FILES['file']['tmp_name'];
                    $dir1       = '../pictures/dangtin_thucung/';
                    move_uploaded_file($video_tmp, $dir1 . '/' . $filevideo);
                } else if ($cou_video == 0 && $video_cu != "") {
                    $file_video = $video_cu;
                } else if ($cou_video == 0 && $video_cu == "") {
                    $file_video = '';
                };

                if ($dia_chi != '') {
                    $address = get_infor_from_address($dia_chi);
                    $lat = $address->results[0]->geometry->location->lat;
                    $long = $address->results[0]->geometry->location->lng;
                } else {
                    $lat = $long = '';
                };

                $query_tc = new db_query("UPDATE `new` SET `new_title`='$tieu_de',`new_money`='$td_gia_spham', `new_city`='$tinh_thanh', `new_image`='$file_anh',
                `new_update_time`='$ngay_dang',`new_unit`='$donvi_ban',`chotang_mphi`='$free_gift', `quan_huyen`='$quan_huyen', `phuong_xa`='$phuong_xa',
                `new_address` = '" . $dia_chi . "',`new_phone`='$sdt_lhe',`new_email`='$email_lhe',
                `new_sonha`='" . $so_nha . "', `dia_chi`='" . $dia_chi . "', `new_video`='$file_video', `new_ctiet_dmuc`='$ctiet_dmuc' WHERE new_id = $id_tc ");

                $query_des = new db_query("UPDATE `new_description` SET `new_description`='$mo_ta',`nhom_sanpham`='$nhomsanpham', `giong_thu_cung`='$giong_thucung',
                                        `han_su_dung`='$han_sd',`khoiluong`='$trong_luong',`the_tich`='$thetich',`canhan_moigioi` = '$canhan_moigioi' WHERE new_id = $id_tc ");
            }
        } else {
            echo "Vui lòng chọn ít nhất 1 ảnh";
        }
    } else {
        echo "Thông tin không đầy đủ";
    }
} else {
    echo "Đăng nhập tài khoản";
}
