<?
include("config.php");
if (isset($_COOKIE['UID'])) {
    $user_id = getValue('user_id', 'int', 'POST', 0);
    $user_type = getValue('user_type', 'int', 'POST', 0);
    $id_dm = getValue('id_dm', 'int', 'POST', 0);

    $tieu_de = getValue('tieu_de', 'str', 'POST', '');
    $tieu_de = trim($tieu_de);
    $tieu_de = removeEmoji($tieu_de);
    $tieu_de = sql_injection_rp($tieu_de);

    // cac truong thay doi
    $gia_spham  = $_POST['td_gia_spham'];
    $gia_spham = str_replace(',', '', $gia_spham);
    $don_vi     = getValue('dvi_tien', 'int', 'POST', 1);
    $ctiet_dm = getValue('ctiet_dmuc', 'int', 'POST', 0);
    $tang_mphi = getValue('td_lienhe_ngban', 'int', 'POST', 0);
    // truong moi
    $canhan_moigioi = getValue('canhan_moigioi', 'int', 'POST', 0);
    // end 
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
    $dia_chi = getValue('dia_chi', 'str', 'POST', '');
    $dia_chi = sql_injection_rp($dia_chi);

    $tinh_thanh = getValue('tinh_thanh', 'int', 'POST', 0);
    $quan_huyen = getValue('quan_huyen', 'int', 'POST', 0);
    $phuong_xa = getValue('phuong_xa', 'int', 'POST', 0);
    $so_nha = getValue('so_nha', 'str', 'POST', '');
    $so_nha = sql_injection_rp($so_nha);

    $mo_ta = getValue('mo_ta', 'str', 'POST', '');
    $mo_ta = trim($mo_ta);
    $mo_ta = removeEmoji($mo_ta);
    $mo_ta = sql_injection_rp($mo_ta);
    $mo_ta =  mb_convert_encoding($mo_ta, 'HTML-ENTITIES', 'UTF-8');

    $ngay_dang = strtotime(date('Y-m-d H:i:s', time()));

    $cou_file = count($_FILES['files']['name']);

    $tinh_trang = getValue('tinh_trang', 'int', 'POST', 0);

    $new_buy_sell = 2;

    $sdt_lhe = getValue('sdt_lhe', 'str', 'POST', '');
    $email_lhe = getValue('email_lhe', 'str', 'POST', '');
    // ảnh cũ
    $anh_dd = getValue('anh_dd', 'str', 'POST', '');
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
        echo "Bạn đã đăng 24 tin trong ngày. Ngày mai bạn hãy quay lại đăng tiếp tin nhé.";
    } else {
        $tgian_tiep = new db_query("SELECT `new_create_time` FROM `new` WHERE `new_user_id` = '" . $_COOKIE['UID'] . "' ORDER BY `new_id` DESC LIMIT 1 ");
        $tieptuc_dt = mysql_fetch_assoc($tgian_tiep->result)['new_create_time'];
        if ((time() - $tieptuc_dt) > 600) {
            if ($user_id != 0 && $user_type != 0 && $id_dm != 0 && $tieu_de != '') {
                if ($cou_file > 0 || $cou_dang > 0) {
                    $check_tde = new db_query("SELECT `new_id` FROM `new` WHERE `new_user_id` = $user_id AND `new_type` = $user_type
                                            AND `new_title` = '$tieu_de' LIMIT 1 ");
                    if (mysql_num_rows($check_tde->result) > 0) {
                        echo "Tiêu đề đã tồn tại";
                    } else {
                        luu_index($ctiet_dm, $quan_huyen, $tinh_thanh, 0, 0, $arrcity2, $tags_tk1, $db_tags_vl, $db_cat_vl, $db_tkhoadb3);
                        $anh = '';
                        for ($i = 0; $i < $cou_file; $i++) {
                            $filename_strr = str_replace($bo_dau, '_', $_FILES['files']['name'][$i]);
                            $filename = '/pictures/thoi_trang/' . time() . '_' . $filename_strr;
                            $luu_anh = time() . '_' . $filename_strr;
                            $anh .= $filename . ';';
                            $filetmp_name = $_FILES['files']['tmp_name'][$i];
                            $dir          = '../pictures/thoi_trang/';
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
                        };

                        if ($cou_video > 0) {
                            $str_video  = $_FILES['file']['name'];
                            $str_video  = str_replace($bo_dau, '_', $str_video);
                            $filevideo  = time() . "_" . $str_video;
                            $file_video = '/pictures/thoi_trang/' . time() . "_" . $str_video;
                            $video_tmp  = $_FILES['file']['tmp_name'];
                            $dir1       = '../pictures/thoi_trang/';
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
                        };

                        $inser_td = new db_query("INSERT INTO `new`(`new_title`, `new_money`, `new_cate_id`, `new_city`, `new_user_id`, `new_image`,
                                        `new_create_time`, `new_type`, `new_active`, `new_unit`, `new_name`, `new_phone`, `new_email`, `new_address`,
                                        `chotang_mphi`, `quan_huyen`, `phuong_xa`, `new_sonha`, `dia_chi`, `new_video`, `new_ctiet_dmuc`,`new_tinhtrang`, 
                                        `link_title`,`new_buy_sell`,`new_update_time`,`thoigian_kmbd`,`thoigian_kmkt`,`soluong_min`,`soluong_max`)
                                        VALUES ('$tieu_de','$gia_spham','$id_dm',0,'$user_id','$file_anh','$ngay_dang','$user_type',
                                        '1','$don_vi','$user_name','$sdt_lhe','$email_lhe','" . $dia_chi . "','$tang_mphi',0,0,'',
                                        '" . $dia_chi . "','$file_video','$ctiet_dm','$tinh_trang','$tieu_de','$new_buy_sell','$ngay_dang'
                                        ,'$ngay_bat_dau','$ngay_ket_thuc','$soluong_min','$soluong_max')");

                        $newid = new db_query("SELECT LAST_INSERT_ID() AS id_dt");
                        $id_dt = mysql_fetch_assoc($newid->result)['id_dt'];
                        $inser_des = new db_query("INSERT INTO `new_description`(`new_id`, `new_description`, `canhan_moigioi`)
                                    VALUES ('$id_dt','$mo_ta','$canhan_moigioi')");
                        include('../ajax/xac_thuc_chung.php');

                        // fastcgi_finish_request();

                        // $tt_crea = 'Thời trang - Đồng phục';
                        // $send_chat = new SendMess($email_lhe, $chat365_id, $sdt_lhe, $user_name, 0);
                        // $send_chat->createNew($tt_crea);

                        // $arr_newcate_id = array(
                        //     'new_tinhtrang' => $tinh_trang,
                        // );
                        // $cat_parent_id = $db_cat[$id_dm]['cat_parent_id'];
                        // create_new_api($id_dm, $id_dt, $tieu_de, $gia_spham, '', $don_vi, $tang_mphi, $arr_newcate_id, $cat_parent_id, $user_id, 
                        // $tinh_thanh, $quan_huyen, $phuong_xa, $ngay_dang, $ctiet_dm, $mo_ta, $dia_chi, $dia_chi);
                    }
                } else {
                    echo "Chọn ít nhất 1 ảnh";
                }
            } else {
                echo "Thông tin không đầy đủ, vui lòng thử lại";
            }
        } else {
            echo "Sau 10 phút bạn hãy đăng tin tiếp theo nhé";
        }
    }
}
