<?
include("config.php");
if (isset($_COOKIE['UID'])) {
$user_id = getValue('user_id', 'int', 'POST', '');
$user_type = getValue('user_type', 'int', 'POST', '');
$id_nd = getValue('id_nd', 'int', 'POST', '');
$tieu_de = getValue('tieu_de', 'str', 'POST', '');
$tieu_de = sql_injection_rp($tieu_de);
$tieu_de = removeEmoji($tieu_de);
// truong moi + thay doi
$canhan_moigioi = getValue('canhan_moigioi', 'int', 'POST', 0);
$ctiet_dmuc = getValue('ctiet_dmuc', 'int', 'POST', 0);
$dia_chi = getValue('dia_chi', 'str', 'POST', '');
$dia_chi = sql_injection_rp($dia_chi);
// end

$thanhpho = getValue('thanhpho', 'int', 'POST', '');
$quanhuyen = getValue('quanhuyen', 'int', 'POST', '');
$time_lamviec = getValue('time_lamviec', 'str', 'POST', '');
$time_lamviec = strtotime($time_lamviec);
$time_ketthuc = getValue('time_ketthuc', 'str', 'POST', '');
$time_ketthuc = strtotime($time_ketthuc);
$ca_ngay = getValue('ca_ngay', 'int', 'POST', '');
$loaixe = getValue('loaixe', 'int', 'POST', '');
$loai_hanghoa = getValue('loai_hanghoa', 'int', 'POST', '');
$td_gia_spham = getValue('td_gia_spham', 'str', 'POST', '');
$dvi_tien = getValue('dvi_tien', 'int', 'POST', '');
$mo_ta = getValue('mo_ta', 'str', 'POST', '');
$mo_ta = sql_injection_rp($mo_ta);
$mo_ta = removeEmoji($mo_ta);
// $ctiet_dmuc = getValue('ctiet_dmuc', 'int', 'POST', '');
$ngay_dang = strtotime(date("Y-m-d H:i:s", time()));
$td_gia_spham = str_replace(',', '', $td_gia_spham);
$cate_id = 19;
$new_buy_sell = 2;
// ảnh cũ
$anh_dd = $_POST['anh_dd'];
if ($anh_dd != "") {
    $da_dang = explode(',', $anh_dd);
    $cou_dang = count($da_dang);
}
$cou_file = count($_FILES['files']['name']);
// video cu
$video_cu = $_POST['video_cu'];
$cou_video = count($_FILES['file']['name']);
$sdt_lienhe = getValue('sdt_lhe', 'str', 'POST', '');
$email_lhe = getValue('email_lhe', 'str', 'POST', '');
$bo_dau = [',', ';', ' '];

if ($user_id != 0 && $id_nd != 0 && $tieu_de != '') {
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
                    $file_name = '/pictures/dangtin_ship/' . time() . '_' . $_FILES['files']['name'][$i];
                    $anh .= $file_name . ';';
                    $filetmp_name = $_FILES['files']['tmp_name'][$i];
                    $dir          = '../pictures/dangtin_ship/';
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
                    $file_video = '/pictures/dangtin_ship/' . time() . "_" . $str_video;
                    $video_tmp  = $_FILES['file']['tmp_name'];
                    $dir1       = '../pictures/dangtin_ship/';
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
                $updat_td = new db_query("UPDATE `new` SET `new_title` = '$tieu_de', `new_money` = '$td_gia_spham', `new_city` = '$thanhpho', `new_image` = '$file_anh',
                                        `new_unit` = '$dvi_tien', `quan_huyen` ='$quanhuyen', `phuong_xa` = 0,
                                        `new_sonha`='', `dia_chi` = '" . $dia_chi . "', `new_video` = '$file_video', `new_ctiet_dmuc` = 0,
                                        `new_update_time` = '$ngay_dang', `new_address` = '" . $dia_chi . "',`new_phone` = '$sdt_lienhe',`new_email` ='$email_lhe '
                                        WHERE `new_user_id` = $user_id AND `new_type` = $user_type AND `new_id` = $id_nd ");

                $query_des = new db_query("UPDATE `new_description` SET `new_description`='$mo_ta',
                                                                `tgian_bd`='$time_lamviec',`tgian_kt`='$time_ketthuc',
                                                                `ca_ngay`='$ca_ngay', `loai_xe`='$loaixe',
                                                                `canhan_moigioi` = '$canhan_moigioi',
                                                                `loai_hang_hoa`='$loai_hanghoa' WHERE new_id = $id_nd ");

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
