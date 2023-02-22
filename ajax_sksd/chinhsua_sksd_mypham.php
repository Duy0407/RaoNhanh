<?
include("config.php");
if (isset($_COOKIE['UID'])) {
    $user_id = getValue('user_id', 'int', 'POST', 0);
    $user_type = getValue('user_type', 'int', 'POST', 0);
    $id_nd = getValue('id_nd', 'int', 'POST', 0);

    $tieu_de = getValue('tieu_de', 'str', 'POST', '');
    $tieu_de = trim($tieu_de);
    $tieu_de = removeEmoji($tieu_de);
    $tieu_de = sql_injection_rp($tieu_de);

    $loaihinh = getValue('loaihinh', 'int', 'POST', 0);
    $loai_mypham = getValue('loai_mypham', 'int', 'POST', 0);
    $hang = getValue('hang', 'int', 'POST', 0);
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
    $td_lienhe_ngban = getValue('td_lienhe_ngban', 'int', 'POST', 0);
    $canhan_moigioi = getValue('canhan_moigioi', 'int', 'POST', 0);

    $hansudung = getValue('hansudung', 'str', 'POST', '');
    $hansudung = strtotime($hansudung);

    $td_gia_spham = getValue('td_gia_spham', 'str', 'POST', '');
    $td_gia_spham = sql_injection_rp($td_gia_spham);
    $td_gia_spham = str_replace(',', '', $td_gia_spham);

    $dvi_tien = getValue('dvi_tien', 'int', 'POST', 1);

    $mo_ta = getValue('mo_ta', 'str', 'POST', '');
    $mo_ta = trim($mo_ta);
    $mo_ta = removeEmoji($mo_ta);
    $mo_ta = mb_convert_encoding($mo_ta, 'HTML-ENTITIES', 'UTF-8');
    $mo_ta = sql_injection_rp($mo_ta);

    $ctiet_dmuc = getValue('ctiet_dmuc', 'int', 'POST', 0);
    $tinh_thanh = getValue('tinh_thanh', 'int', 'POST', 0);
    $quan_huyen = getValue('quan_huyen', 'int', 'POST', 0);
    $phuong_xa = getValue('phuong_xa', 'int', 'POST', 0);
    $so_nha = getValue('so_nha', 'str', 'POST', '');
    $so_nha = sql_injection_rp($so_nha);

    $dia_chi = getValue('dia_chi', 'str', 'POST', '');

    $dia_chi = getValue('diachi_nban', 'str', 'POST', '');
    $dia_chi = sql_injection_rp($dia_chi);
    $dia_chi = str_replace(',;', ';', $dia_chi);

    $sdt_lhe = getValue('sdt_lhe', 'str', 'POST', '');
    $email_lhe = getValue('email_lhe', 'str', 'POST', '');
    $ngay_dang = strtotime(date("Y-m-d H:i:s", time()));
    $cate_id = 61;
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

    if ($user_id != 0 && $id_nd != 0 && $tieu_de != "") {
        if ($cou_file > 0 || $cou_dang > 0) {
            $query_check = new db_query("SELECT `new_id` FROM `new` WHERE `new_user_id` = $user_id AND `new_type` = $user_type
                                    AND `new_id` != $id_nd AND  REPLACE(`new_title`,' ','') = REPLACE('$tieu_de',' ','') LIMIT 1 ");
            if (mysql_num_rows($query_check->result) > 0) {
                echo "Tiêu đề đã tồn tại!";
            } else {
                luu_index($ctiet_dmuc, 0, 0, 0, 0, $arrcity2, $tags_tk1, $db_tags_vl, $db_cat_vl, $db_tkhoadb3);
                $anh = '';
                for ($i = 0; $i < $cou_file; $i++) {
                    $filename_strr = str_replace($bo_dau, '_', $_FILES['files']['name'][$i]);
                    $filename = '/pictures/dangtin_suckhoesacdep/' . time() . '_' . $filename_strr;
                    $luu_anh = time() . '_' . $filename_strr;
                    $anh .= $filename . ';';
                    $filetmp_name = $_FILES['files']['tmp_name'][$i];
                    $dir = '../pictures/dangtin_suckhoesacdep/';
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
                };

                if ($cou_video > 0 && $video_cu == "") {
                    $str_video  = $_FILES['file']['name'];
                    $str_video  = str_replace($bo_dau, '_', $str_video);
                    $filevideo  = time() . "_" . $str_video;
                    $file_video = '/pictures/dangtin_suckhoesacdep/' . time() . "_" . $str_video;
                    $video_tmp  = $_FILES['file']['tmp_name'];
                    $dir1       = '../pictures/dangtin_suckhoesacdep/';
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
                // ---------------Tài khoản người bán---------------
                $query = new db_query("UPDATE `new` SET `new_title`='$tieu_de',`new_money`='$td_gia_spham', `new_city`='$tinh_thanh',
                                    `new_image`='$file_anh', `new_update_time`='$ngay_dang',`new_unit`='$dvi_tien',`chotang_mphi`='$td_lienhe_ngban',
                                    `quan_huyen`= 0, `phuong_xa`= 0 , `new_sonha`='', `dia_chi`='" . $dia_chi . "',
                                    `new_video`='$file_video',`new_phone`='$sdt_lhe',`new_email` ='$email_lhe',
                                    `new_ctiet_dmuc`='$ctiet_dmuc', `new_buy_sell` = '$new_buy_sell',
                                    `thoigian_kmbd` = '$ngay_bat_dau',`thoigian_kmkt` = '$ngay_ket_thuc',
                                    `soluong_min` = '$soluong_min',`soluong_max` = '$soluong_max' WHERE new_id = $id_nd");

                $query_des = new db_query("UPDATE `new_description` SET `new_description`='$mo_ta',`loai_hinh_sp`='$loaihinh',`loai_sanpham`='$loai_mypham',
                                    `hang`='$hang',`han_su_dung`='$hansudung',`canhan_moigioi`='$canhan_moigioi' WHERE new_id = $id_nd ");
                include('../ajax/xac_thuc_chung.php');

                // fastcgi_finish_request();

                // $domain = 'raonhanh365.vn';
                // $usc_company = 'tôi tên là: ' . $user_name . ', ';
                // if ($sdt_lhe != '') {
                //     $phone = 'SĐT: ' . $sdt_lhe . ', ';
                // };

                // if ($email_lhe != '') {
                //     $email = 'Email: ' . $email_lhe . ', ';
                // };
                // $LiveChat = [
                //     'ClientId' => $chat365_id . '_liveChatV2',
                //     'ClientName' => $user_name,
                //     'FromWeb' => $domain
                // ];
                // $MessageInforSupport = "Xin chào, " . $usc_company . "" . $phone . "" . $email . "tôi vừa chỉnh sửa tin đăng sức khỏe sắc đẹp mỹ phẩm: " . $id_nd . " trên " . $domain;
                // $data_send_to_group = [
                //     'LiveChat' => $LiveChat,
                //     'MessageInforSupport' => $MessageInforSupport,
                //     'idChat' => $chat365_id
                // ];
                // send_to_chat($data_send_to_group);

                // $arr_newcate_id = array(
                //     'loai_hinh_sp' => $loaihinh, // Loại hình mỹ phẩm
                //     'loai_sanpham' => $loai_mypham, // Loại mỹ phẩm
                //     'hang' => $hang,
                //     'han_su_dung' => $hansudung,
                //     'canhan_moigioi' => $canhan_moigioi,
                // );
                // $curl = curl_init();
                // $data = array(
                //     'new_id'          => $id_nd,
                //     'new_title'       => $tieu_de,
                //     'new_money'       => $td_gia_spham,
                //     'new_unit'        => $don_vi,
                //     'chotang_mphi'    => $td_lienhe_ngban,
                //     'new_cate_id'     => json_encode(array($cate_id => $arr_newcate_id)),
                //     'new_city'        => 0,
                //     'quan_huyen'      => 0,
                //     'phuong_xa'       => 0,
                //     'new_update_time' => $ngay_dang,
                //     'new_ctiet_dmuc'  => $ctiet_dmuc,
                //     'new_description' => $mo_ta,
                //     'dia_chi'         => $dia_chi,
                //     'new_address'     => $dia_chi,
                //     'site'            => 'spraonhanh365',
                // );
                // curl_setopt($curl, CURLOPT_POST, 1);
                // curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                // curl_setopt($curl, CURLOPT_URL, "http://43.239.223.10:5003/update_data_sanpham");
                // curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                // curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
                // // curl_setopt($curl, CURLOPT_TIMEOUT, 3);
                // curl_exec($curl);
                // curl_close($curl);
            }
        } else {
            echo "Vui lòng chọn ít nhất 1 ảnh";
        }
    } else {
        echo "Thông tin không đầy đủ";
    }
} else {
    echo "Đăng nhập tài khoản";
}
