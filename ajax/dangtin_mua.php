<?
include('config.php');

if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $us_id = $_COOKIE['UID'];
    $us_type = $_COOKIE['UT'];
    $id_dm = getValue('id_dm', 'int', 'POST', 0);

    $tieu_de = getValue('tieu_de', 'str', 'POST', '');
    $tieu_de = removeEmoji($tieu_de);
    $tieu_de = sql_injection_rp($tieu_de);

    $link_title = replaceTitle($tieu_de);

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
    $mo_ta = sql_injection_rp($mo_ta);
    $mo_ta = mb_convert_encoding($mo_ta, 'HTML-ENTITIES', 'UTF-8');

    $gia_bdau = getValue('salary_fr', 'str', 'POST', '');
    $gia_kthuc = getValue('salary_to', 'str', 'POST', '');
    $donvi_tien = getValue('salary_unit', 'int', 'POST', 0);
    $tinh_trang = getValue('tinh_trang', 'int', 'POST', 0);
    $hinhthuc_nop = getValue('hinhthuc_nop', 'int', 'POST', 0);

    $noidung_nhs = getValue('noidung_thau', 'str', 'POST', '');
    $noidung_nhs = sql_injection_rp($noidung_nhs);
    $noidung_nhs = removeEmoji($noidung_nhs);
    $noidung_nhs = mb_convert_encoding($noidung_nhs, 'HTML-ENTITIES', 'UTF-8');

    $tgian_bdau = getValue('tgian_bdau', 'str', 'POST', '');
    $tgian_bdau = strtotime($tgian_bdau);

    $tgian_kthuc = getValue('tgian_kthuc', 'str', 'POST', '');
    $tgian_kthuc = strtotime($tgian_kthuc);

    $tbao_bd_thau = getValue('tbao_bd_thau', 'str', 'POST', '');
    $tbao_bd_thau = strtotime($tbao_bd_thau);

    $tbao_kt_thau = getValue('tbao_kt_thau', 'str', 'POST', '');
    $tbao_kt_thau = strtotime($tbao_kt_thau);

    $chidan_timhieu = getValue('chidan_timhieu', 'str', 'POST', '');
    $chidan_timhieu = sql_injection_rp($chidan_timhieu);
    $chidan_timhieu = removeEmoji($chidan_timhieu);
    $chidan_timhieu = mb_convert_encoding($chidan_timhieu, 'HTML-ENTITIES', 'UTF-8');

    $phidu_thau = getValue('phidu_thau', 'str', 'POST', '');
    $dvi_thau = getValue('dvi_thau', 'int', 'POST', 0);

    $cou_file  = count($_FILES['files']['name']);

    $new_buy_sell = 1;
    $ngay_dang = strtotime(date('Y-m-d H:i:s', time()));

    $file_mota = $_FILES['file_mota']['name'];
    $file_thutuc = $_FILES['file_thutuc']['name'];
    $file_hoso = $_FILES['file_hoso']['name'];

    $match = ['image/png', 'image/jpg', 'image/jpeg', 'image/jfif', 'image/PNG', 'image/svg+xml'];

    $bo_arr = [',', ';', ' '];

    $sdt_lhe = getValue('sdt_lhe', 'str', 'POST', '');
    $email_lhe = getValue('email_lhe', 'str', 'POST', '');
    // ảnh cũ
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
    if ($dtin_hnay > 24) {
        $data = [
            'result' => false,
            'error' => "Bạn đã đăng 24 tin trong ngày. Ngày mai bạn hãy quay lại đăng tiếp tin nhé.",
        ];
    } else {
        $tgian_tiep = new db_query("SELECT `new_create_time` FROM `new` WHERE `new_user_id` = '" . $_COOKIE['UID'] . "' ORDER BY new_id DESC LIMIT 1 ");
        $tieptuc_dt = mysql_fetch_assoc($tgian_tiep->result)['new_create_time'];
        // if ((time() - $tieptuc_dt) > 600) {
            if ($id_dm != 0 || $cou_dang>0) {
                $check_tde = new db_query("SELECT `new_id` FROM `new` WHERE new_user_id = $us_id AND new_type = $us_type  AND
                                        new_title = '$tieu_de' LIMIT 1 ");

                if (mysql_num_rows($check_tde->result) > 0) {
                    $data = [
                        'result' => false,
                        'error' => 'Tiêu đề đã tồn tại',
                    ];
                } else {
                    // if ($cou_file > 0) {
                        // $anh = '';
                        // for ($i = 0; $i < $cou_file; $i++) {
                        //     $filename = time() . '_' . str_replace($bo_arr, '_', $_FILES['files']['name'][$i]);
                        //     $file_name = '/pictures/avt_tindangmua/' . time() . '_' . str_replace($bo_arr, '_', $_FILES['files']['name'][$i]);
                        //     $anh .= $file_name . ';';
                        //     $filetmp_name = $_FILES['files']['tmp_name'][$i];
                        //     $dir = '../pictures/avt_tindangmua/';
                        //     move_uploaded_file($filetmp_name, $dir . '/' . $filename);
                        // };
                        // $anh_avt = rtrim($anh, ';');
                        $anh = '';
                        for ($i = 0; $i < $cou_file; $i++) {
                            $filename_strr = str_replace($bo_dau, '_', $_FILES['files']['name'][$i]);
                            $filename = '/pictures/avt_tindangmua/' . time() . '_' . $filename_strr;
                            $luu_anh = time() . '_' . $filename_strr;
                            $anh .= $filename . ';';
                            $filetmp_name = $_FILES['files']['tmp_name'][$i];
                            $dir          = '../pictures/avt_tindangmua/';
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
                    // } else {
                    //     $anh_avt = '';
                    // };

                    if ($file_mota != "") {
                        $filemota = time() . '_' . str_replace($bo_arr, '_', $_FILES['file_mota']['name']);
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

                    if ($file_thutuc != "") {
                        $filethutuc = time() . '_' . str_replace($bo_arr, '_', $_FILES['file_thutuc']['name']);
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

                    if ($file_hoso != "") {
                        $filehoso = time() . '_' . str_replace($bo_arr, '_', $_FILES['file_hoso']['name']);
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

                    $inser_td = new db_query("INSERT INTO `new`(`new_title`, `new_money`, `gia_kt`, `new_cate_id`, `new_city`, `new_user_id`, `new_image`,
                                    `new_create_time`, `new_update_time`, `new_type`, `new_active`, `new_unit`, `new_address`, `quan_huyen`, `phuong_xa`, `new_sonha`,
                                    `dia_chi`, `new_tinhtrang`, `new_buy_sell`, `link_title`, `new_name`, `new_email`, `new_phone`)
                                    VALUES ('$tieu_de', '$gia_bdau', '$gia_kthuc', '$id_dm', '$tinh_thanh', '$us_id', '$file_anh', '$ngay_dang', '$ngay_dang',
                                    '$us_type', '1', '$donvi_tien', '$diadiem_nop', '$quan_huyen', '$phuong_xa', '" . $so_nha . "', '" . $dia_chi . "', '$tinh_trang', '$new_buy_sell',
                                    '$link_title','$ho_ten','$email_lhe','$sdt_lhe')");

                    $newid = new db_query("SELECT LAST_INSERT_ID() AS id_dt");
                    $id_dt = mysql_fetch_assoc($newid->result)['id_dt'];

                    $inser_des = new db_query("INSERT INTO `new_description`(`new_id`, `new_description`, `com_city`, `com_district`, `com_ward`, `com_address_num`,
                                    `han_bat_dau`, `han_su_dung`, `tgian_bd`, `tgian_kt`, `new_job_kind`, `new_file_dthau`, `noidung_nhs`, `new_file_nophs`,
                                    `noidung_chidan`, `new_file_chidan`, `donvi_thau`, `phi_duthau`, `file_mota`, `file_thutuc`, `file_hoso`)
                                    VALUES ('$id_dt','$mo_ta', '$tthanh_nop', '$qhuyen_nop', '$pxa_nop', '$sonha_nop', '$tgian_bdau', '$tgian_kthuc', '$tbao_bd_thau',
                                    '$tbao_kt_thau', '$hinhthuc_nop', '$file_mota1', '$noidung_nhs', '$file_thutuc1', '$chidan_timhieu', '$file_hoso1', '$dvi_thau',
                                    '$phidu_thau', '$dd_mota', '$dd_thutuc', '$dd_hoso')");

                    $data = [
                        'result' => true,
                        'error' => null,
                    ];
                }
            }
        // } else {
        //     $data = [
        //         'result' => false,
        //         'error' => "Sau 10 phút bạn hãy đăng tin tiếp theo nhé",
        //     ];
        // }
    }
} else {
    $data = [
        'result' => false,
        'error' => "Thông tin không đầy đủ",
    ];
}
echo json_encode($data);
