<?
include("config.php");
if (isset($_COOKIE['UID'])) {
    $user_id = getValue('user_id', 'int', 'POST', 0);
    $user_type = getValue('user_type', 'int', 'POST', 0);
    $id_dm = getValue('id_dm', 'int', 'POST', 0);
    $id_nd = getValue('id_nd', 'int', 'POST', 0);

    $tieu_de = getValue('tieu_de', 'str', 'POST', '');
    $tieu_de = trim($tieu_de);
    $tieu_de = removeEmoji($tieu_de);
    $tieu_de = sql_injection_rp($tieu_de);

    $gia_spham = getValue('gia_spham', 'str', 'POST', '');
    $gia_spham = str_replace(',', '', $gia_spham);
    $gia_spham = sql_injection_rp($gia_spham);

    $tang_mphi = getValue('tang_mphi', 'int', 'POST', 0);
    $don_vi = getValue('don_vi', 'int', 'POST', 1);

    $mo_ta = getValue('mo_ta', 'str', 'POST', '');
    $mo_ta = trim($mo_ta);
    $mo_ta = removeEmoji($mo_ta);
    $mo_ta = mb_convert_encoding($mo_ta, 'HTML-ENTITIES', 'UTF-8');
    $mo_ta = sql_injection_rp($mo_ta);

    $tinh_trang = getValue('tinh_trang', 'int', 'POST', 0);
    $canhan_moigioi = getValue('canhan_moigioi', 'int', 'POST', 0);
    $sdt_lhe = getValue('sdt_lhe', 'str', 'POST', '');
    $email_lhe = getValue('email_lhe', 'str', 'POST', '');

    $ctiet_dm = getValue('chitiet_dm', 'int', 'POST', 0);
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

    $dia_chi = getValue('diachi_nban', 'str', 'POST', '');
    $dia_chi = str_replace(',;', ';', $dia_chi);
    $dia_chi = sql_injection_rp($dia_chi);
    // bỏ
    $tinh_thanh = getValue('tinh_thanh', 'int', 'POST', 0);
    $quan_huyen = getValue('quan_huyen', 'int', 'POST', 0);
    $phuong_xa = getValue('phuong_xa', 'int', 'POST', 0);
    $so_nha = getValue('so_nha', 'str', 'POST', '');
    $so_nha = sql_injection_rp($so_nha);
    // end bỏ

    $ngay_dang = strtotime(date('Y-m-d H:i:s', time()));

    // ảnh cũ
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

    if ($user_id != 0 && $id_dm != 0 && $id_nd != 0 && $tieu_de != '') {
        if ($cou_file > 0 || $cou_dang > 0) {
            $check_tkhoan = new db_query("SELECT `usc_id`, `usc_name`, `usc_phone`, `usc_email`, `usc_address` FROM `user` WHERE `usc_id` = $user_id
                                        AND `usc_type` = $user_type ");
            if (mysql_num_rows($check_tkhoan->result) > 0) {
                $check_tde = new db_query("SELECT `new_id` FROM `new` WHERE REPLACE(`new_title`,' ','') = REPLACE('$tieu_de',' ','')
                                    AND `new_user_id` = $user_id AND `new_type` = $user_type AND `new_id` != $id_nd LIMIT 1 ");
                if (mysql_num_rows($check_tde->result) > 0) {
                    echo "Tiêu đề đã tồn tại";
                } else {
                    luu_index($ctiet_dm, $quan_huyen, $tinh_thanh, 0, 0, $arrcity2, $tags_tk1, $db_tags_vl, $db_cat_vl, $db_tkhoadb3);
                    $anh = '';
                    for ($i = 0; $i < $cou_file; $i++) {
                        $filename_strr = str_replace($bo_dau, '_', $_FILES['files']['name'][$i]);
                        $filename  = time() . '_' . $filename_strr;
                        $file_name = '/pictures/noi_ngoai_that/' . time() . '_' . $filename_strr;
                        $anh .= $file_name . ';';
                        $filetmp_name = $_FILES['files']['tmp_name'][$i];
                        $dir          = '../pictures/noi_ngoai_that/';
                        move_uploaded_file($filetmp_name, $dir . '/' . $filename);
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
                        $file_video = '/pictures/noi_ngoai_that/' . time() . "_" . $str_video;
                        $video_tmp  = $_FILES['file']['tmp_name'];
                        $dir1       = '../pictures/noi_ngoai_that/';
                        move_uploaded_file($video_tmp, $dir1 . '/' . $filevideo);
                    } else if ($cou_video == 0 && $video_cu != "") {
                        $file_video = $video_cu;
                    } else if ($cou_video == 0 && $video_cu == "") {
                        $file_video = '';
                    };

                    if ($dia_chi != '') {
                        $diachi_nban1 = explode(';', $dia_chi);
                        for ($i = 0; $i < count($diachi_nban1); $i++) {
                            if ($diachi_nban1[$i] != '') {
                                $address = get_infor_from_address($diachi_nban1[$i]);
                                $lat = $address->results[0]->geometry->location->lat;
                                $long = $address->results[0]->geometry->location->lng;
                            }
                        }
                    } else {
                        $lat = $long = '';
                    };

                    $updat_td = new db_query("UPDATE `new` SET `new_title` = '$tieu_de', `new_money` = '$gia_spham', `new_city` = '$tinh_thanh', `new_image` = '$file_anh',
                                            `new_unit` = '$don_vi', `quan_huyen` = '$quan_huyen', `phuong_xa` = '$phuong_xa', `new_sonha` = '" . $so_nha . "',
                                            `dia_chi` = '" . $dia_chi . "', `new_video` = '$file_video', `new_ctiet_dmuc` = '$ctiet_dm', `new_update_time` = '$ngay_dang',
                                            `new_tinhtrang` = '$tinh_trang', `new_phone` = '$sdt_lhe', `new_email` = '$email_lhe', `new_address` = '$dia_chi',
                                            `chotang_mphi` = '$tang_mphi',`thoigian_kmbd` = '$ngay_bat_dau',`thoigian_kmkt` = '$ngay_ket_thuc',`soluong_min` = '$soluong_min',
                                            `soluong_max` = '$soluong_max' WHERE `new_user_id` = $user_id AND `new_id` = $id_nd ");

                    $update_des = new db_query("UPDATE `new_description` SET `new_description` = '$mo_ta', `canhan_moigioi` = '$canhan_moigioi' WHERE `new_id` = $id_nd ");

                    include('../ajax/xac_thuc_chung.php');

                    // fastcgi_finish_request();

                    // $tt_edit = 'nội thất - ngoại thất vườn: ' . $id_nd;
                    // $send_chat = new SendMess($email_lhe, $chat365_id, $sdt_lhe, $user_name, 0);
                    // $send_chat->editNew($tt_edit);

                    // $arr_newcate_id = array(
                    //     'new_tinhtrang' => $tinh_trang,
                    // );
                    // edit_new_api($id_dm, $id_nd, $tieu_de, $gia_spham, '', $don_vi, $tang_mphi, $arr_newcate_id, $tinh_thanh, $quan_huyen, $phuong_xa, $ngay_dang, $ctiet_dm, $mo_ta, $dia_chi, $dia_chi);

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
