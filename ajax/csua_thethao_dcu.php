<?
include "config.php";
if (isset($_COOKIE['UID'])) {
    $user_id   = getValue('user_id', 'int', 'POST', '');
    $user_type = getValue('user_type', 'int', 'POST', '');
    $id_dm     = getValue('id_dm', 'int', 'POST', '');
    $id_nd     = getValue('id_nd', 'int', 'POST', '');

    $tieu_de = getValue('tieu_de', 'str', 'POST', '');
    $tieu_de = sql_injection_rp($tieu_de);
    $tieu_de = removeEmoji($tieu_de);
    $tieu_de = rtrim($tieu_de);

    $dia_chi    = getValue('dia_chi', 'str', 'POST', '');
    $tinh_thanh = getValue('tinh_thanh', 'int', 'POST', '');
    $quan_huyen = getValue('quan_huyen', 'int', 'POST', '');
    $phuong_xa  = getValue('phuong_xa', 'int', 'POST', '');
    $so_nha     = getValue('so_nha', 'str', 'POST', '');
    $so_nha     = sql_injection_rp($so_nha);
    $mo_ta = getValue('mo_ta', 'str', 'POST', '');
    $mo_ta = sql_injection_rp($mo_ta);
    $mo_ta = removeEmoji($mo_ta);

    $mon_thethao = getValue('mon_the_thao', 'int', 'POST', '');
    $loai_dungcu = getValue('loai_dungcu', 'str', 'POST', '');
    $tinh_trang = getValue('tinh_trang', 'int', 'POST', '');
    $td_gia_spham =  getValue('td_gia_spham', 'str', 'POST', '');
    $td_gia_spham  = str_replace(',', '', $td_gia_spham);
    $ctiet_dm = getValue('ctiet_dmuc', 'int', 'POST', '');
    $dvi_tien = getValue('dvi_tien', 'int', 'POST', '');
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
    $canhan_moigioi = getValue('canhan_moigioi', 'int', 'POST', '');
    $tang_mphi = getValue('td_lienhe_ngban', 'int', 'POST', '');

    $sdt_lhe = getValue('sdt_lhe', 'str', 'POST', '');
    $email_lhe = getValue('email_lhe', 'str', 'POST', '');

    $ngay_dang = strtotime(date('Y-m-d H:i:s', time()));
    // ảnh cũ
    $anh_dd = $_POST['anh_dd'];
    if ($anh_dd != "") {
        $da_dang = explode(',', $anh_dd);
        $cou_dang = count($da_dang);
    }
    // end


    $cou_file  = count($_FILES['files']['name']);

    $cou_video = count($_FILES['file']['name']);

    $new_buy_sell = 2;
    $bo_dau = [',', ';', ' '];

    if ($user_id != "" && $user_type != "" && $id_dm != "" && $id_nd != "") {
        // xét ảnh mới hoặc ảnh cũ còn có ảnh hay không
        if ($cou_file > 0 || $cou_dang > 0) {
            $check_tde = new db_query("SELECT `new_id` FROM `new` WHERE `new_user_id` = $user_id AND `new_type` = $user_type AND `new_id` != $id_nd
                                    AND `new_title` = '" . $tieu_de . "' LIMIT 1 ");
            if (mysql_num_rows($check_tde->result) > 0) {
                echo "Tiêu đề đã tồn tại";
            } else {
                // $check_tde2 = new db_query("SELECT `new_id` FROM `new` WHERE `new_city` = $tinh_thanh AND `quan_huyen` = $quan_huyen
                //                     AND `new_ctiet_dmuc` = '$ctiet_dm' AND `new_user_id` = $user_id AND `new_type` = $user_type AND `new_id` != $id_nd  ");

                // if (mysql_num_rows($check_tde2->result) > 0) {
                //     echo "Tỉnh thành, quận huyện, chi tiết danh mục đã tồn tại";
                // } else {
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
                    $lat     = $address->results[0]->geometry->location->lat;
                    $long    = $address->results[0]->geometry->location->lng;
                } else {
                    $lat = $long = '';
                };

                $updat_td = new db_query("UPDATE `new` SET `new_title` = '$tieu_de', `new_money` = '$td_gia_spham', `new_city` = '$tinh_thanh', `new_image` = '$file_anh',
                                            `new_unit` = '$dvi_tien', `chotang_mphi` = '$tang_mphi', `quan_huyen` = 0, `phuong_xa` = 0,
                                            `new_sonha`='', `dia_chi` = '" . $dia_chi . "', `new_video` = '$file_video', `new_ctiet_dmuc` = '$ctiet_dm',
                                            `new_update_time` = '$ngay_dang', `new_tinhtrang` = '$tinh_trang', `new_phone` = '$sdt_lhe', `new_email` = '$email_lhe'
                                            ,`thoigian_kmbd` = '$ngay_bat_dau',`thoigian_kmkt` = '$ngay_ket_thuc',`soluong_min` = '$soluong_min',`soluong_max` = '$soluong_max'
                                            WHERE `new_user_id` = $user_id AND `new_type` = $user_type AND `new_id` = $id_nd ");

                $update_des = new db_query("UPDATE `new_description` SET `new_description` = '$mo_ta', `loai_chung` = '$loai_dungcu',
                                                `mon_the_thao` = '$mon_thethao',`canhan_moigioi` = '$canhan_moigioi' WHERE `new_id` = $id_nd ");
                include('xac_thuc_chung.php');
                // }
            }
        } else {
            echo "Chọn ít nhất 1 ảnh";
        }
    } else {
        echo "Thông tin không đầy đủ, vui lòng thử lại";
    }
}
