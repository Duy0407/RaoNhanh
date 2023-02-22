<?
include "config.php";
if (isset($_COOKIE['UID'])) {
    $user_id   = getValue('user_id', 'int', 'POST', '');
    $user_type = getValue('user_type', 'int', 'POST', '');
    $id_dm     = getValue('id_dm', 'int', 'POST', '');
    $id_nd     = getValue('id_nd', 'int', 'POST', '');

    $tieu_de = getValue('tieu_de', 'str', 'POST', '');
    $tieu_de = removeEmoji($tieu_de);
    $tieu_de = sql_injection_rp($tieu_de);

    // thay đổi
    $tang_mphi = getValue('td_lienhe_ngban', 'int', 'POST', '');
    $gia_spham  = $_POST['td_gia_spham'];
    $gia_spham = str_replace(',', '', $gia_spham);
    $don_vi     = getValue('dvi_tien', 'int', 'POST', '');
    $ctiet_dm   = getValue('ctiet_dmuc', 'int', 'POST', '');
    $canhan_moigioi = getValue('canhan_moigioi', 'int', 'POST', '');
    $loai_san_pham = getValue('loai_san_pham', 'int', 'POST', '');
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

    $dia_chi    = getValue('dia_chi', 'str', 'POST', '');
    $tinh_thanh = getValue('tinh_thanh', 'int', 'POST', '');
    $quan_huyen = getValue('quan_huyen', 'int', 'POST', '');
    $phuong_xa  = getValue('phuong_xa', 'int', 'POST', '');
    $so_nha     = getValue('so_nha', 'str', 'POST', '');
    $so_nha     = sql_injection_rp($so_nha);

    $mo_ta = getValue('mo_ta', 'str', 'POST', '');
    $mo_ta = removeEmoji($mo_ta);
    $mo_ta = sql_injection_rp($mo_ta);
    $mo_ta = mb_convert_encoding($mo_ta, 'HTML-ENTITIES', 'UTF-8');

    $ngay_dang = strtotime(date('Y-m-d H:i:s', time()));
    // ảnh cũ
    $anh_dd = $_POST['anh_dd'];
    if ($anh_dd != "") {
        $da_dang = explode(',', $anh_dd);
        $cou_dang = count($da_dang);
    }
    // end
    $sdt_lhe = getValue('sdt_lhe', 'str', 'POST', '');
    $email_lhe = getValue('email_lhe', 'str', 'POST', '');

    $cou_file  = count($_FILES['files']['name']);

    $cou_video = count($_FILES['file']['name']);

    $tinh_trang = getValue('tinh_trang', 'int', 'POST', '');

if ($user_id != 0 && $id_dm != 0 && $id_nd != 0 && $tieu_de != '') {
    if ($cou_file > 0 || $cou_dang > 0) {
        $check_tkhoan = new db_query("SELECT `usc_id`, `usc_name`, `usc_phone`, `usc_email`, `usc_address` FROM `user` WHERE `usc_id` = $user_id
                                    AND `usc_type` = $user_type ");
        if (mysql_num_rows($check_tkhoan->result) > 0) {
            $check_tde = new db_query("SELECT `new_id` FROM `new` WHERE `new_user_id` = $user_id AND `new_type` = $user_type
                                AND `new_id` != $id_nd AND REPLACE(`new_title`,' ','') = REPLACE('$tieu_de',' ','') LIMIT 1 ");
            if (mysql_num_rows($check_tde->result) > 0) {
                echo "Tiêu đề đã tồn tại";
            } else {
                luu_index($ctiet_dm, $quan_huyen, $tinh_thanh, 0, 0, $arrcity2, $tags_tk1, $db_tags_vl, $db_cat_vl, $db_tkhoadb3);

                $anh = '';
                for ($i = 0; $i < $cou_file; $i++) {
                    $filename  = time() . '_' . $_FILES['files']['name'][$i];
                    $file_name = '/pictures/dangtin_dodung/' . time() . '_' . $_FILES['files']['name'][$i];
                    $anh .= $file_name . ';';
                    $filetmp_name = $_FILES['files']['tmp_name'][$i];
                    $dir          = '../pictures/dangtin_dodung/';
                    move_uploaded_file($filetmp_name, $dir . '/' . $filename);
                };
                $anh_avt = rtrim($anh, ';');
                // trường hợp 1: thêm ảnh mới và ảnh cũ vẫn còn
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
                    $file_video = '/pictures/dangtin_dodung/' . time() . "_" . $str_video;
                    $video_tmp  = $_FILES['file']['tmp_name'];
                    $dir1       = '../pictures/dangtin_dodung/';
                    move_uploaded_file($video_tmp, $dir1 . '/' . $filevideo);
                } else if ($cou_video == 0 && $video_cu != "") {
                    $file_video = $video_cu;
                } else if ($cou_video == 0 && $video_cu == "") {
                    $file_video = '';
                };

                if ($dia_chi != '') {
                    $address = get_infor_from_address($dia_chi);
                    $lat     = $address->results[0]->geometry->location->lat;
                    $long    = $address->results[0]->geometry->location->lng;
                } else {
                    $lat = $long = '';
                };
                $updat_td = new db_query("UPDATE `new` SET `new_title` = '$tieu_de', `new_money` = '$gia_spham', `new_city` = '$tinh_thanh', `new_image` = '$file_anh',
                `new_unit` = '$don_vi', `chotang_mphi` = '$tang_mphi', `quan_huyen` = '$quan_huyen', `phuong_xa` = '$phuong_xa',
                `new_sonha`='" . $so_nha . "', `dia_chi` = '" . $dia_chi . "', `new_video` = '$file_video', `new_ctiet_dmuc` = '$ctiet_dm',
                `new_update_time` = '$ngay_dang', `new_tinhtrang` = '$tinh_trang', `new_phone` = '$sdt_lhe', `new_email` = '$email_lhe',
                `thoigian_kmbd` = '$ngay_bat_dau',`thoigian_kmkt` = '$ngay_ket_thuc',`soluong_min` = '$soluong_min',`soluong_max` = '$soluong_max'
                WHERE `new_user_id` = $user_id AND `new_type` = $user_type AND `new_id` = $id_nd ");

                $update_des = new db_query("UPDATE `new_description` SET `new_description` = '$mo_ta',`loai_chung` = '$loai_san_pham',`canhan_moigioi`='$canhan_moigioi' WHERE `new_id` = $id_nd ");

                include('xac_thuc_chung.php');

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
} else {
echo "Đăng nhập tài khoản";
}
