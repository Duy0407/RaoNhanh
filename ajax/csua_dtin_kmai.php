<?
include("config.php");
if (isset($_COOKIE['UID'])) {
    $user_id = getValue('user_id', 'int', 'POST', 0);
    $user_type = getValue('user_type', 'int', 'POST', 0);
    $id_nd = getValue('id_nd', 'int', 'POST', 0);

    $tieu_de = getValue('tieu_de', 'str', 'POST', '');
    $tieu_de = trim($tieu_de);
    $tieu_de = removeEmoji($tieu_de);
    $tieu_de = sql_injection_rp($tieu_de);

    $td_gia_spham = getValue('td_gia_spham', 'str', 'POST', '');
    $td_gia_spham = sql_injection_rp($td_gia_spham);
    $td_gia_spham = str_replace(',', '', $td_gia_spham);

    $don_vi = getValue('don_vi', 'int', 'POST', 1);
    // truong moi
    $td_lienhe_ngban = getValue('td_lienhe_ngban', 'int', 'POST', 0);
    $canhan_moigioi = getValue('canhan_moigioi', 'int', 'POST', 0);

    $mo_ta = getValue('mo_ta', 'str', 'POST', '');
    $mo_ta = trim($mo_ta);
    $mo_ta = removeEmoji($mo_ta);
    $mo_ta = mb_convert_encoding($mo_ta, 'HTML-ENTITIES', 'UTF-8');
    $mo_ta = sql_injection_rp($mo_ta);
    $sdt_lhe = getValue('sdt_lhe', 'str', 'POST', '');
    $email_lhe = getValue('email_lhe', 'str', 'POST', '');
    $ctiet_dmuc = getValue('ctiet_dmuc', 'int', 'POST', 0);
    $tinh_thanh = getValue('tinh_thanh', 'int', 'POST', 0);
    $quan_huyen = getValue('quan_huyen', 'int', 'POST', 0);
    $phuong_xa = getValue('phuong_xa', 'int', 'POST', 0);
    $so_nha = getValue('so_nha', 'str', 'POST', '');
    $dia_chi = getValue('dia_chi', 'str', 'POST', '');
    $ngay_dang = strtotime(date("Y-m-d H:i:s", time()));
    $td_gia_spham = str_replace(',', '', $td_gia_spham);
    $cate_id = 24;
    // ảnh cũ
    $new_buy_sell = 2;
    $anh_dd = $_POST['anh_dd'];
    if ($anh_dd != "") {
        $da_dang = explode(',', $anh_dd);
        $cou_dang = count($da_dang);
    };
    // end
    $cou_file = count($_FILES['files']['name']);
    // video cu
    $video_cu = getValue('video_cu', 'str', 'POST', '');
    $cou_video = count($_FILES['file']['name']);

    if ($user_id != "" && $user_type != "" && $tieu_de != "") {
        if ($cou_file > 0 || $cou_dang > 0) {
            $query_check = new db_query("SELECT `new_id` FROM `new` WHERE REPLACE(`new_title`,' ','') = REPLACE('$tieu_de',' ','')
                                    AND `new_user_id` = $user_id AND `new_type` = $user_type AND `new_id` != $id_nd LIMIT 1 ");

            if (mysql_num_rows($query_check->result) > 0) {
                echo "Tiêu đề đã tồn tại!";
            } else {
                luu_index($ctiet_dmuc, 0, 0, 0, 0, $arrcity2, $tags_tk1, $db_tags_vl, $db_cat_vl, $db_tkhoadb3);
                $anh = '';
                for ($i = 0; $i < $cou_file; $i++) {
                    $filename_strr = str_replace($bo_dau, '_', $_FILES['files']['name'][$i]);
                    $filename = '/pictures/khuyen_mai/' . time() . '_' . $filename_strr;
                    $luu_anh = time() . '_' . $filename_strr;
                    $anh .= $filename . ';';
                    $filetmp_name = $_FILES['files']['tmp_name'][$i];
                    $dir = '../pictures/khuyen_mai/';
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
                    $file_video = '/pictures/khuyen_mai/' . time() . "_" . $str_video;
                    $video_tmp  = $_FILES['file']['tmp_name'];
                    $dir1       = '../pictures/khuyen_mai/';
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

                $query = new db_query("UPDATE `new` SET `new_title`='$tieu_de',`new_money`='$td_gia_spham', `new_city`='$tinh_thanh', `new_image`='$file_anh',
                                `new_update_time`='$ngay_dang',`new_unit`='$don_vi',`chotang_mphi`='$td_lienhe_ngban', `quan_huyen`= 0,
                                `phuong_xa`= 0, `new_sonha`='', `dia_chi`='" . $dia_chi . "', `new_video`='$file_video',
                                `new_ctiet_dmuc`='$ctiet_dmuc', `new_buy_sell` = '$new_buy_sell',`new_phone`='$sdt_lhe',`new_email` ='$email_lhe'
                                WHERE new_id = $id_nd ");

                $query_des = new db_query("UPDATE `new_description` SET  `new_description`='$mo_ta',`canhan_moigioi`='$canhan_moigioi' WHERE new_id = $id_nd ");
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
