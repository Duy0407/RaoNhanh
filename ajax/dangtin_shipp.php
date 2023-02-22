<?
include("config.php");

$user_id = getValue('user_id', 'int', 'POST', '');
$user_type = getValue('user_type', 'int', 'POST', 0);
$tieu_de = getValue('tieu_de', 'str', 'POST', '');
$tieu_de = removeEmoji($tieu_de);
$tieu_de = sql_injection_rp($tieu_de);
// truong moi + thay doi
$canhan_moigioi = getValue('canhan_moigioi', 'int', 'POST', 0);
$ctiet_dmuc = getValue('ctiet_dmuc', 'int', 'POST', 0);
$dia_chi = getValue('dia_chi', 'str', 'POST', '');
$dia_chi = sql_injection_rp($dia_chi);
// end
$thanhpho = getValue('thanhpho', 'int', 'POST', 0);
$quanhuyen = getValue('quanhuyen', 'int', 'POST', 0);
$ca_ngay = getValue('ca_ngay', 'int', 'POST', 0);
$ca_ngay = (int)$ca_ngay;
if ($ca_ngay != 0) {
    $time_lamviec = 0;
    $time_ketthuc = 0;
} else {
    $time_lamviec = getValue('time_lamviec', 'str', 'POST', '');
    $time_lamviec = strtotime($time_lamviec);

    $time_ketthuc = getValue('time_ketthuc', 'str', 'POST', '');
    $time_ketthuc = strtotime($time_ketthuc);
}

$loaixe = getValue('loaixe', 'int', 'POST', 0);
$loai_hanghoa = getValue('loai_hanghoa', 'int', 'POST', 0);
$td_gia_spham = getValue('td_gia_spham', 'str', 'POST', '');
$td_gia_spham = str_replace(',', '', $td_gia_spham);
$dvi_tien = getValue('dvi_tien', 'int', 'POST', 1);

$mo_ta = getValue('mo_ta', 'str', 'POST', '');
$mo_ta = removeEmoji($mo_ta);
$mo_ta = sql_injection_rp($mo_ta);
$mo_ta = mb_convert_encoding($mo_ta, 'HTML-ENTITIES', 'UTF-8');

$ngay_dang = strtotime(date("Y-m-d H:i:s", time()));
$cate_id = 19;

$cou_file = count($_FILES['files']['name']);
$cou_video = count($_FILES['file']['name']);
$new_buy_sell = 2;
$bo_dau = [',', ';', ' '];

// ảnh cũ
$anh_dd = $_POST['anh_dd'];
if ($anh_dd != "") {
    $da_dang = explode(',', $anh_dd);
    $cou_dang = count($da_dang);
}
// end
$sdt_lhe = getValue('sdt_lhe', 'str', 'POST', '');
$email_lhe = getValue('email_lhe', 'str', 'POST', '');

$homnay = strtotime(date('Y-m-d', time()));
$ngay_mai = $homnay + (24 * 3600);
$check_dt = new db_query("SELECT COUNT(`new_id`) AS dh_nay FROM `new` WHERE `new_create_time` > $homnay AND `new_create_time` < $ngay_mai
                        AND `new_user_id` = '" . $_COOKIE['UID'] . "' ");
$dtin_hnay = mysql_fetch_assoc($check_dt->result)['dh_nay'];
// if ($dtin_hnay > 24) {
//     echo "Bạn đã đăng 24 tin trong ngày. Ngày mai bạn hãy quay lại đăng tiếp tin nhé.";
// } else {
//     $tgian_tiep = new db_query("SELECT `new_create_time` FROM `new` WHERE `new_user_id` = '" . $_COOKIE['UID'] . "' ORDER BY `new_id` DESC LIMIT 1 ");
//     $tieptuc_dt = mysql_fetch_assoc($tgian_tiep->result)['new_create_time'];
//     if ((time() - $tieptuc_dt) > 600) {
if ($user_id != "" && $user_type != "" && $tieu_de != "") {
    $query_user = new db_query("SELECT `usc_id`, `usc_name`, `usc_address`, `usc_type` FROM `user` WHERE usc_id = $user_id");
    $tt_user = mysql_fetch_assoc($query_user->result);
    $user_name = $tt_user['usc_name'];
    $user_address = $tt_user['usc_address'];

    $check_tde = new db_query("SELECT `new_id` FROM `new` WHERE `new_user_id` = $user_id AND `new_type` = $user_type
                                    AND `new_title` = '" . $tieu_de . "' LIMIT 1  ");

    if (mysql_num_rows($check_tde->result) > 0) {
        echo "Tiêu đề đã tồn tại";
    } else {
        if ($cou_file > 0 || $cou_dang > 0) {
            luu_index(0, $quanhuyen, $thanhpho, 0, 0, $arrcity2, $tags_tk1, $db_tags_vl, $db_cat_vl);
            $anh = '';
            for ($i = 0; $i < $cou_file; $i++) {
                $filename_strr = str_replace($bo_dau, '_', $_FILES['files']['name'][$i]);
                $filename = '/pictures/dangtin_ship/' . time() . '_' . $filename_strr;
                $luu_anh = time() . '_' . $filename_strr;
                $anh .= $filename . ';';
                $filetmp_name = $_FILES['files']['tmp_name'][$i];
                $dir          = '../pictures/dangtin_ship/';
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
                $file_video = '/pictures/dangtin_ship/' . time() . "_" . $str_video;
                $video_tmp  = $_FILES['file']['tmp_name'];
                $dir1       = '../pictures/dangtin_ship/';
                move_uploaded_file($video_tmp, $dir1 . '/' . $filevideo);
            } else {
                $file_video = '';
            }
            if ($dia_chi != '') {
                $address = get_infor_from_address($dia_chi);
                $lat = $address->results[0]->geometry->location->lat;
                $long = $address->results[0]->geometry->location->lng;
            } else {
                $lat = $long = '';
            }
            $query_dt = new db_query("INSERT INTO `new`(`new_title`,`new_money`, `new_cate_id`, `new_city`, `new_user_id`, `new_image`, `new_create_time`,
                                `new_type`, `new_active`, `new_unit`, `new_name`, `new_phone`, `new_email`, `new_address`, `da_ban`, `quan_huyen`,
                                `new_video`, `new_buy_sell`, `link_title`,`new_update_time`,`dia_chi`,`new_ctiet_dmuc`) VALUES ('$tieu_de','$td_gia_spham','$cate_id','$thanhpho','$user_id','$file_anh','$ngay_dang',
                                '$user_type',1,'$dvi_tien','$user_name','$sdt_lhe','$email_lhe','" . $dia_chi . "',0, '$quanhuyen','$file_video',2,
                                '$tieu_de','$ngay_dang','" . $dia_chi . "',0)");
            $id_des = new db_query("SELECT LAST_INSERT_ID() AS id");
            $id = mysql_fetch_assoc($id_des->result)['id'];

            $query_decription = new db_query("INSERT INTO `new_description`(`new_id`, `new_description`,`tgian_bd`,`tgian_kt`,`ca_ngay`, `loai_xe`,`loai_hang_hoa`,`canhan_moigioi`) 
                                        VALUES ('$id','$mo_ta','$time_lamviec','$time_ketthuc','$ca_ngay','$loaixe','$loai_hanghoa','$canhan_moigioi')");
        } else {
            echo "Vui lòng chọn ít nhất 1 ảnh";
        }
    }
} else {
    echo "Thông tin không đầy đủ";
}
//     } else {
//         echo "Sau 10 phút bạn hãy đăng tin tiếp theo nhé";
//     }
// }
