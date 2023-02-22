<?
include "config.php";
$user_id   = getValue('user_id', 'int', 'POST', '');
$user_type = getValue('user_type', 'int', 'POST', '');
$id_dm     = getValue('id_dm', 'int', 'POST', '');
$id_nd     = getValue('id_nd', 'int', 'POST', '');

$tieu_de = getValue('tieu_de', 'str', 'POST', '');
$tieu_de = removeEmoji($tieu_de);
$tieu_de = sql_injection_rp($tieu_de);

// thay moi
$tang_mphi = getValue('td_lienhe_ngban', 'int', 'POST', '');
$gia_spham  = $_POST['td_gia_spham'];
$gia_spham  = str_replace(',', '', $gia_spham);
$don_vi     = getValue('dvi_tien', 'int', 'POST', '');
$ctiet_dm   = getValue('ctiet_dmuc', 'int', 'POST', '');
$loai_thuc_pham = getValue('loai_thuc_pham', 'int', 'POST', '');
$canhan_moigioi   = getValue('canhan_moigioi', 'int', 'POST', 1);
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

$bo_dau = [',', ';', ' '];

// ảnh cũ
$anh_dd = $_POST['anh_dd'];
if ($anh_dd != "") {
    $da_dang = explode(',', $anh_dd);
    $cou_dang = count($da_dang);
}
$ngay_dang = strtotime(date('Y-m-d H:i:s', time()));

$cou_file = count($_FILES['files']['name']);

$cou_video = count($_FILES['file']['name']);

$sdt_lhe = getValue('sdt_lhe', 'str', 'POST', '');
$email_lhe = getValue('email_lhe', 'str', 'POST', '');

$han_sdung = strtotime($_POST['han_sdung']);
$new_buy_sell = 2;
if ($user_id != "" && $user_type != "" && $id_dm != "") {
    // xét ảnh mới hoặc ảnh cũ còn có ảnh hay không
    if ($cou_file > 0 || $cou_dang > 0) {
        $check_tkhoan = new db_query("SELECT `usc_id`, `usc_name`, `usc_phone`, `usc_email`, `usc_address` FROM `user` WHERE `usc_id` = $user_id AND `usc_type` = $user_type ");
        if (mysql_num_rows($check_tkhoan->result) > 0) {

            $check_tde = new db_query("SELECT `new_id` FROM `new` WHERE `new_user_id` = $user_id AND `new_type` = $user_type
                                     AND `new_id` != $id_nd AND `new_title` = '" . $tieu_de . "' LIMIT 1  ");
            if (mysql_num_rows($check_tde->result) > 0) {
                echo "Tiêu đề đã tồn tại";
            } else {
                luu_index($ctiet_dm, 0,0, 0, 0, $arrcity2, $tags_tk1, $db_tags_vl, $db_cat_vl);
                $anh = '';
                for ($i = 0; $i < $cou_file; $i++) {
                    $filename_strr = str_replace($bo_dau, '_', $_FILES['files']['name'][$i]);
                    $filename = '/pictures/thuc_pham/' . time() . '_' . $filename_strr;
                    $luu_anh = time() . '_' . $filename_strr;
                    $anh .= $filename . ';';
                    $filetmp_name = $_FILES['files']['tmp_name'][$i];
                    $dir          = '../pictures/thuc_pham/';
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
                    $file_video = '/pictures/thuc_pham/' . time() . "_" . $str_video;
                    $video_tmp  = $_FILES['file']['tmp_name'];
                    $dir1       = '../pictures/thuc_pham/';
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

                $updat_td = new db_query("UPDATE `new` SET `new_title` = '$tieu_de', `new_money` = '$gia_spham', `new_city` = '$tinh_thanh', `new_image` = '$file_anh',
                                                `new_unit` = '$don_vi', `chotang_mphi` = '$tang_mphi', `quan_huyen` = '$quan_huyen', `phuong_xa` = '$phuong_xa',
                                                `new_sonha`='" . $so_nha . "', `dia_chi` = '" . $dia_chi . "', `new_video` = '$file_video', `new_ctiet_dmuc` = '$ctiet_dm',
                                                `new_update_time` = '$ngay_dang', `new_buy_sell` = '$new_buy_sell', `new_phone` = '$sdt_lhe', `new_email` = '$email_lhe',
                                                `new_address`='" . $dia_chi . "'
                                                WHERE `new_user_id` = $user_id AND `new_type` = $user_type AND `new_id` = $id_nd ");

                $update_des = new db_query("UPDATE `new_description` SET `new_description` = '" . $mo_ta . "', `loai_chung` = '$loai_thuc_pham',
                                                    `han_su_dung` = '$han_sdung',`canhan_moigioi` = '$canhan_moigioi'  WHERE `new_id` = $id_nd ");

                // }
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
