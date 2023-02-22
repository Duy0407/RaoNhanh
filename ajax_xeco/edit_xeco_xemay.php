<?
include("config.php");
$user_id = getValue('user_id', 'int', 'POST', '');
$user_type = getValue('user_type', 'int', 'POST', '');
$id_nd = getValue('id_nd', 'int', 'POST', '');
$td_lienhe_ngban = getValue('td_lienhe_ngban', 'int', 'POST', '');
$tieu_de = getValue('tieu_de', 'str', 'POST', '');
$tieu_de = removeEmoji($tieu_de);
$tieu_de = sql_injection_rp($tieu_de);
$tieu_de = rtrim($tieu_de);
$hang_xe = getValue('hang_xe', 'int', 'POST', '');
$dong_xe = getValue('dong_xe', 'str', 'POST', '');
$loai_xe = getValue('loai_xe', 'int', 'POST', '');
$dung_tich_xe = getValue('dung_tich_xe', 'int', 'POST', '');
$nam_san_xuat = getValue('nam_san_xuat', 'int', 'POST', '');
$bao_hanh = getValue('bao_hanh', 'int', 'POST', '');
$tinhtrang = getValue('tinhtrang', 'int', 'POST', '');
$km_di = getValue('km_di', 'int', 'POST', '');
$td_gia_spham = getValue('td_gia_spham', 'str', 'POST', '');
$dvi_tien = getValue('dvi_tien', 'int', 'POST', '');
$mo_ta = getValue('mo_ta', 'str', 'POST', '');
$mo_ta = removeEmoji($mo_ta);
$mo_ta =  mb_convert_encoding($mo_ta, 'HTML-ENTITIES', 'UTF-8');
$mo_ta = sql_injection_rp($mo_ta);
$ctiet_dmuc = getValue('ctiet_dmuc', 'int', 'POST', '');
$tinh_thanh = getValue('tinh_thanh', 'int', 'POST', '');
$quan_huyen = getValue('quan_huyen', 'int', 'POST', '');
$phuong_xa = getValue('phuong_xa', 'int', 'POST', '');
$so_nha = getValue('so_nha', 'str', 'POST', '');
$dia_chi = getValue('dia_chi', 'str', 'POST', '');
$ngay_dang = strtotime(date("Y-m-d H:i:s", time()));
$td_gia_spham = str_replace(',', '', $td_gia_spham);
$cate_id = 9;
$sdt_lienhe = getValue('sdt_lhe', 'str', 'POST', '');
$email_lhe = getValue('email_lhe', 'str', 'POST', '');
// truong moi
$xac_thuc = getValue('xac_thuc', 'int', 'POST', 0);
if ($xac_thuc == 1) {

    $ngay_bat_dau = getValue('ngay_bat_dau', 'str', 'POST', '');
    $ngay_bat_dau = strtotime($ngay_bat_dau);
    $ngay_ket_thuc = getValue('ngay_ket_thuc', 'str', 'POST', '');
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
$td_bien_soxe = getValue('td_bien_soxe', 'str', 'POST', '');
$canhan_moigioi = getValue('canhan_moigioi', 'int', 'POST', '');
$xac_thuc = getValue('xac_thuc', 'int', 'POST', 0);
// ảnh cũ
$anh_dd = $_POST['anh_dd'];
if ($anh_dd != "") {
    $da_dang = explode(',', $anh_dd);
    $cou_dang = count($da_dang);
}
// end
$cou_file = count($_FILES['files']['name']);
// video cu
$video_cu = $_POST['video_cu'];
$cou_video = count($_FILES['file']['name']);

if ($user_id != "" && $user_type != "" && $tieu_de != "") {
    if ($cou_file > 0 || $cou_dang > 0) {
        $query_check = new db_query("SELECT `new_id` FROM `new` WHERE REPLACE(`new_title`,' ','') = REPLACE('$tieu_de',' ','')
                                    AND `new_user_id` = $user_id AND `new_type` = $user_type  AND new_id != $id_nd LIMIT 1 ");
        if (mysql_num_rows($query_check->result) > 0) {
            echo "Tiêu đề đã tồn tại!";
        } else {
            $anh = '';
            for ($i = 0; $i < $cou_file; $i++) {
                $filename_strr = str_replace($bo_dau, '_', $_FILES['files']['name'][$i]);
                $filename = '/pictures/dangtin_xeco/' . time() . '_' . $filename_strr;
                $luu_anh = time() . '_' . $filename_strr;
                $anh .= $filename . ';';
                $filetmp_name = $_FILES['files']['tmp_name'][$i];
                $dir = '../pictures/dangtin_xeco/';
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
            }

            if ($cou_video > 0 && $video_cu == "") {
                $str_video  = $_FILES['file']['name'];
                $str_video  = str_replace($bo_dau, '_', $str_video);
                $filevideo  = time() . "_" . $str_video;
                $file_video = '/pictures/dangtin_xeco/' . time() . "_" . $str_video;
                $video_tmp  = $_FILES['file']['tmp_name'];
                $dir1       = '../pictures/dangtin_xeco/';
                move_uploaded_file($video_tmp, $dir1 . '/' . $filevideo);
            } else if ($cou_video == 0 && $video_cu != "") {
                $file_video = $video_cu;
            } else if ($cou_video == 0 && $video_cu == "") {
                $file_video = '';
            }
            if ($dia_chi != '') {
                $address = get_infor_from_address($dia_chi);
                $lat = $address->results[0]->geometry->location->lat;
                $long = $address->results[0]->geometry->location->lng;
            } else {
                $lat = $long = '';
            }
            // ---------------Tài khoản người bán---------------
            $query_xc = new db_query("UPDATE `new` SET 
                                                `new_title`='$tieu_de',`new_money`='$td_gia_spham', `new_city`='$tinh_thanh', `new_image`='$file_anh',
                                                `new_update_time`='$ngay_dang', `new_unit`='$dvi_tien',
                                                `chotang_mphi`='$td_lienhe_ngban', `quan_huyen`='$quan_huyen', `phuong_xa`='$phuong_xa',
                                                `new_phone` = '$sdt_lienhe',`new_email` = '$email_lhe' ,
                                                `new_sonha`='" . $so_nha . "', `dia_chi`='" . $dia_chi . "', `new_video`='$file_video', 
                                                `new_ctiet_dmuc`='$ctiet_dmuc',`new_tinhtrang`='$tinhtrang',`new_baohanh`='$bao_hanh',
                                                `thoigian_kmbd` = '$ngay_bat_dau',`thoigian_kmkt` = '$ngay_ket_thuc',
                                                `soluong_min` = '$soluong_min',`soluong_max` = '$soluong_max' WHERE new_id = $id_nd ");

            $query_des = new db_query("UPDATE `new_description` SET 
                                                `new_description`='$mo_ta',`hang`='$hang_xe',`dong_xe`='$dong_xe',
                                                `loai_xe`='$loai_xe',`so_km_da_di`='$km_di', `dung_tich`='$dung_tich_xe',
                                                `nam_san_xuat`='$nam_san_xuat' ,`td_bien_soxe`='$td_bien_soxe',
                                                `canhan_moigioi`='$canhan_moigioi' WHERE  new_id = $id_nd");
            include('../ajax/xac_thuc_chung.php');
        }
    } else {
        echo "Vui lòng chọn ít nhất 1 ảnh";
    }
} else {
    echo "Thông tin không đầy đủ";
}
