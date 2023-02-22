<?
include('config.php');
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $us_id = $_COOKIE['UID'];
    $us_type = $_COOKIE['UT'];
    $id_dm = getValue('id_dm', 'int', 'POST', 0);
    $id_cs = getValue('id_cs', 'int', 'POST', 0);

    $tieu_de = getValue('tieu_de', 'str', 'POST', '');
    $tieu_de = removeEmoji($tieu_de);
    $tieu_de = sql_injection_rp($tieu_de);

    $ho_ten = getValue('ho_ten', 'str', 'POST', '');
    $ho_ten = sql_injection_rp($ho_ten);
    // dia chi mua hang
    $dia_chi = getValue('dia_chi', 'str', 'POST', '');
    $dia_chi = sql_injection_rp($dia_chi);

    $tinh_thanh = getValue('tinh_thanh', 'int', 'POST', 0);
    $quan_huyen = getValue('quan_huyen', 'int', 'POST', 0);
    $phuong_xa = getValue('phuong_xa', 'int', 'POST', 0);

    $so_nha = getValue('so_nha', 'str', 'POST', '');
    $so_nha = sql_injection_rp($so_nha);
    // end
    // dia diem nop ho so
    $diadiem_nop = getValue('diadiem_nop', 'str', 'POST', '');
    $tthanh_nop = getValue('tthanh_nop', 'int', 'POST', '');
    $qhuyen_nop = getValue('qhuyen_nop', 'int', 'POST', '');
    $pxa_nop = getValue('pxa_nop', 'int', 'POST', '');
    $sonha_nop = getValue('sonha_nop', 'str', 'POST', '');

    $mo_ta = getValue('mota', 'str', 'POST', '');
    $mo_ta = removeEmoji($mo_ta);
    $mo_ta = mb_convert_encoding($mo_ta, 'HTML-ENTITIES', 'UTF-8');
    $mo_ta = sql_injection_rp($mo_ta);

    $gia_bdau = getValue('salary_fr', 'str', 'POST', '');
    $gia_kthuc = getValue('salary_to', 'str', 'POST', '');
    $donvi_tien = getValue('salary_unit', 'int', 'POST', 0);
    $tinh_trang = getValue('tinh_trang', 'int', 'POST', 0);
    $hinhthuc_nop = getValue('hinhthuc_nop', 'int', 'POST', 0);

    $noidung_nhs = getValue('noidung_thau', 'str', 'POST', '');
    $noidung_nhs = removeEmoji($noidung_nhs);
    $noidung_nhs = mb_convert_encoding($noidung_nhs, 'HTML-ENTITIES', 'UTF-8');
    $noidung_nhs = sql_injection_rp($noidung_nhs);

    $tgian_bdau = getValue('tgian_bdau', 'str', 'POST', '');
    $tgian_bdau = strtotime($tgian_bdau);

    $tgian_kthuc = getValue('tgian_kthuc', 'str', 'POST', '');
    $tgian_kthuc = strtotime($tgian_kthuc);

    $tbao_bd_thau = getValue('tbao_bd_thau', 'str', 'POST', '');
    $tbao_bd_thau = strtotime($tbao_bd_thau);

    $tbao_kt_thau = getValue('tbao_kt_thau', 'str', 'POST', '');
    $tbao_kt_thau = strtotime($tbao_kt_thau);

    $chidan_timhieu = getValue('chidan_timhieu', 'str', 'POST', '');
    $chidan_timhieu = removeEmoji($chidan_timhieu);
    $chidan_timhieu = mb_convert_encoding($chidan_timhieu, 'HTML-ENTITIES', 'UTF-8');
    $chidan_timhieu = sql_injection_rp($chidan_timhieu);

    $phidu_thau = getValue('phidu_thau', 'str', 'POST', '');
    $dvi_thau = getValue('dvi_thau', 'int', 'POST', 0);

    $cou_file  = count($_FILES['files']['name']);
    // ảnh cũ
    $anh_dd = $_POST['anh_dd'];
    if ($anh_dd != "") {
        $da_dang = explode(',', $anh_dd);
        $cou_dang = count($da_dang);
    }
    // end

    // file cu
    $file_dthau = getValue('file_dthau', 'str', 'POST', '');
    $dd_file_dthau = getValue('dd_file_dthau', 'int', 'POST', 0);
    $file_nophs = getValue('file_nophs', 'str', 'POST', '');
    $dd_file_nophs = getValue('dd_file_nophs', 'int', 'POST', 0);
    $file_chidan = getValue('file_chidan', 'str', 'POST', '');
    $dd_file_chidan = getValue('dd_file_chidan', 'int', 'POST', 0);

    $ngay_dang = strtotime(date('Y-m-d H:i:s', time()));

    $file_mota = $_FILES['file_mota']['name'];
    $file_thutuc = $_FILES['file_thutuc']['name'];
    $file_hoso = $_FILES['file_hoso']['name'];

    $sdt_lhe = getValue('sdt_lhe', 'str', 'POST', '');
    $email_lhe = getValue('email_lhe', 'str', 'POST', '');

    $match = ['image/png', 'image/jpg', 'image/jpeg', 'image/jfif', 'image/PNG', 'image/svg+xml'];

    if ($id_dm != 0 && $id_cs != 0) {
        $check_tde = new db_query("SELECT `new_id` FROM `new` WHERE `new_user_id` = $us_id
                                AND `new_type` = $us_type AND `new_id` != $id_cs AND `new_title` = '$tieu_de'  LIMIT 1  ");
        if (mysql_num_rows($check_tde->result) > 0) {
            $data = [
                'result' => false,
                'error' => 'Bạn có tin đăng trùng với tiêu đề. Vui lòng chỉnh sửa tin đăng',
            ];
        } else {

            if ($cou_file > 0) {
                $anh = '';
                for ($i = 0; $i < $cou_file; $i++) {
                    $filename = time() . '_' . str_replace($bo_dau, '_', $_FILES['files']['name'][$i]);
                    $file_name = '/pictures/avt_tindangmua/' . time() . '_' . str_replace($bo_dau, '_', $_FILES['files']['name'][$i]);
                    $anh .= $file_name . ';';
                    $filetmp_name = $_FILES['files']['tmp_name'][$i];
                    $dir = '../pictures/avt_tindangmua/';
                    move_uploaded_file($filetmp_name, $dir . '/' . $filename);
                };
                $anh_avt = rtrim($anh, ';');
            };

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
                $file_anh =  implode(';', $anh_dd1);
            }
            // thêm ảnh mới và xóa ảnh cũ đi
            else if ($cou_file > 0 && $cou_dang == 0) {
                $file_anh = $anh_avt;
            } else {
                $file_anh = '';
            }

            if ($file_dthau != "") {
                $file_mota1 = $file_dthau;
                $dd_mota = $dd_file_dthau;
            } else if ($file_mota != "") {
                $filemota = time() . '_' . str_replace($bo_dau, '_', $_FILES['file_mota']['name']);
                $file_mota1 = 'avt_tindangmua/' . $filemota;
                $filetmp_name_mt = $_FILES['file_mota']['tmp_name'];
                $file_type_mt = $_FILES['file_mota']['type'];
                if (in_array($file_type_mt, $match)) {
                    $dd_mota = 1;
                } else {
                    $dd_mota = 2;
                };
                $dir = '../pictures/avt_tindangmua/';
                move_uploaded_file($filetmp_name_mt, $dir . '/' . $filemota);
            } else {
                $file_mota1 = "";
                $dd_mota = 0;
            };

            if ($file_nophs != "") {
                $file_thutuc1 = $file_nophs;
                $dd_thutuc = $dd_file_nophs;
            } else if ($file_thutuc != "") {
                $filethutuc = time() . '_' . str_replace(' ', '_', $_FILES['file_thutuc']['name']);
                $file_thutuc1 = 'avt_tindangmua/' . $filethutuc;
                $filetmp_name_tt = $_FILES['file_thutuc']['tmp_name'];
                $file_type_tt = $_FILES['file_thutuc']['type'];
                if (in_array($file_type_tt, $match)) {
                    $dd_thutuc = 1;
                } else {
                    $dd_thutuc = 2;
                };
                $dir = '../pictures/avt_tindangmua/';
                move_uploaded_file($filetmp_name_tt, $dir . '/' . $filethutuc);
            } else {
                $file_thutuc1 = "";
                $dd_thutuc = 0;
            };

            if ($file_chidan != "") {
                $file_hoso1 = $file_chidan;
                $dd_hoso = $dd_file_chidan;
            } else if ($file_hoso != "") {
                $filehoso = time() . '_' . str_replace(' ', '_', $_FILES['file_hoso']['name']);
                $file_hoso1 = 'avt_tindangmua/' . $filehoso;
                $filetmp_name_hs = $_FILES['file_hoso']['tmp_name'];
                $file_type_hs = $_FILES['file_hoso']['type'];
                if (in_array($file_type_hs, $match)) {
                    $dd_hoso = 1;
                } else {
                    $dd_hoso = 2;
                };
                $dir = '../pictures/avt_tindangmua/';
                move_uploaded_file($filetmp_name_hs, $dir . '/' . $filehoso);
            } else {
                $file_hoso1 = "";
                $dd_hoso = 0;
            };

            if ($dia_chi != '') {
                $address = get_infor_from_address($dia_chi);
                $lat = $address->results[0]->geometry->location->lat;
                $long = $address->results[0]->geometry->location->lng;
            } else {
                $lat = $long = '';
            };

            $updat_td = new db_query("UPDATE `new` SET `new_title` = '$tieu_de', `new_money` = '$gia_bdau', `gia_kt` = '$gia_kthuc', `new_cate_id` = '$id_dm',
                                    `new_city` = '$tinh_thanh', `new_image` = '$file_anh', `new_update_time` = '$ngay_dang', `new_unit` = '$donvi_tien',
                                    `new_address` = '$diadiem_nop', `quan_huyen` = '$quan_huyen', `phuong_xa` = '$phuong_xa', `new_sonha` = '" . $so_nha . "',
                                    `dia_chi` = '" . $dia_chi . "', `new_tinhtrang` = '$tinh_trang', `new_name` = '$ho_ten', `new_phone` = '$sdt_lhe',
                                    `new_email` = '$email_lhe' WHERE `new_id` = $id_cs AND `new_user_id` = $us_id
                                    AND `new_type` = $us_type AND `new_buy_sell` = 1 ");

            $updat_des = new db_query("UPDATE `new_description` SET `new_description` = '$mo_ta', `com_city` = '$tthanh_nop', `com_district` = '$qhuyen_nop',
                                    `com_ward` = '$pxa_nop', `com_address_num` = '$sonha_nop', `han_bat_dau` = '$tgian_bdau', `han_su_dung` = '$tgian_kthuc',
                                    `tgian_bd` = '$tbao_bd_thau', `tgian_kt` = '$tbao_kt_thau', `new_job_kind` = '$hinhthuc_nop', `new_file_dthau` = '$file_mota1',
                                    `noidung_nhs` = '$noidung_nhs', `new_file_nophs` = '$file_thutuc1', `noidung_chidan` = '$chidan_timhieu',
                                    `new_file_chidan` = '$file_hoso1', `donvi_thau` = '$dvi_thau', `phi_duthau` = '$phidu_thau', `file_mota` = '$dd_mota',
                                    `file_thutuc` = '$dd_thutuc', `file_hoso` = '$dd_hoso' WHERE `new_id` = $id_cs ");


            $data = [
                'result' => true,
                'error' => null,
            ];
        }
    }
} else {
    $data = [
        'result' => false,
        'error' => "Thông tin không đầy đủ",
    ];
}
echo json_encode($data);
