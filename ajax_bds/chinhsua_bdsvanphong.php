<?
include("config.php");
if (isset($_COOKIE['UID'])) {
    $user_id = getValue('user_id', 'int', 'POST', 0);
    $user_type = getValue('user_type', 'int', 'POST', 0);
    $id_nd = getValue('id_nd', 'int', 'POST', 0);
    $ban_thue = getValue('ban_thue', 'int', 'POST', 0);

    $tieu_de = getValue('tieu_de', 'str', 'POST', '');
    $tieu_de = trim($tieu_de);
    $tieu_de = removeEmoji($tieu_de);
    $tieu_de = sql_injection_rp($tieu_de);

    $ten_toanha = getValue('ten_toanha', 'str', 'POST', '');
    $ten_toanha = removeEmoji($ten_toanha);
    $ten_toanha = mb_convert_encoding($ten_toanha, 'HTML-ENTITIES', 'UTF-8');
    $ten_toanha = sql_injection_rp($ten_toanha);

    $huong_cua = getValue('huong_cua', 'int', 'POST', 0);
    $giayto = getValue('giayto', 'int', 'POST', 0);
    $tinhtrangnt = getValue('tinhtrangnt', 'int', 'POST', 0);
    $tang_so = getValue('tang_so', 'str', 'POST', '');
    $dientich = getValue('dientich', 'int', 'POST', 0);
    $chieudai = getValue('chieudai', 'int', 'POST', 0);
    $chieungang = getValue('chieungang', 'int', 'POST', 0);
    $loaihinh_vp = getValue('loaihinh_vp', 'int', 'POST', 0);

    $dvi_tien = getValue('dvi_tien', 'int', 'POST', 1);

    $td_gia_spham = getValue('td_gia_spham', 'str', 'POST', '');
    $td_gia_spham = str_replace(',', '', $td_gia_spham);

    $tien_datcoc = getValue('td_gia_datcoc', 'str', 'POST', '');
    $tien_datcoc = str_replace(',', '', $tien_datcoc);

    $dvi_dc = getValue('dvi_dc', 'int', 'POST', 1);

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
    $dia_chi = sql_injection_rp($dia_chi);

    $ngay_dang = strtotime(date("Y-m-d H:i:s", time()));
    $cate_id = 34;
    // ???nh c??
    $anh_dd = $_POST['anh_dd'];
    if ($anh_dd != "") {
        $da_dang = explode(',', $anh_dd);
        $cou_dang = count($da_dang);
    }
    // end
    $cou_file = count($_FILES['files']['name']);
    // video cu
    $video_cu = getValue('video_cu', 'str', 'POST', '');
    $cou_video = count($_FILES['file']['name']);

    $sdt_lhe = getValue('sdt_lhe', 'str', 'POST', '');
    $email_lhe = getValue('email_lhe', 'str', 'POST', '');

    //truong moi
    $td_diachi_nha = getValue('td_diachi_nha', 'str', 'POST', '');
    $td_diachi_nha = sql_injection_rp($td_diachi_nha);

    $td_macan = getValue('td_macan', 'str', 'POST', '');
    $td_macan = sql_injection_rp($td_macan);

    $td_block_thap = getValue('td_block_thap', 'str', 'POST', '');
    $tang_so = getValue('tang_so', 'int', 'POST', 0);
    $td_htmch_rt = getValue('td_htmch_rt', 'int', 'POST', 0);
    $canhan_moigioi = getValue('canhan_moigioi', 'int', 'POST', 0);


    if ($user_id != 0 && $id_nd != 0 && $tieu_de != "") {
        if ($cou_file > 0 || $cou_dang > 0) {
            $query_check = new db_query("SELECT `new_id` FROM `new` WHERE `new_user_id` = $user_id AND `new_type` = $user_type
                                    AND `new_title` = '$tieu_de' AND `new_id` != $id_nd LIMIT 1 ");

            if (mysql_num_rows($query_check->result) > 0) {
                echo "Ti??u ????? ???? t???n t???i!";
            } else {
                luu_index($ctiet_dmuc, $quan_huyen, $tinh_thanh, 0, 0, $arrcity2, $tags_tk1, $db_tags_vl, $db_cat_vl, $db_tkhoadb3);
                $anh = '';
                for ($i = 0; $i < $cou_file; $i++) {
                    $filename_strr = str_replace($bo_dau, '_', $_FILES['files']['name'][$i]);
                    $filename = '/pictures/dangtin_bds/' . time() . '_' . $filename_strr;
                    $luu_anh = time() . '_' . $filename_strr;
                    $anh .= $filename . ';';
                    $filetmp_name = $_FILES['files']['tmp_name'][$i];
                    $dir = '../pictures/dangtin_bds/';
                    move_uploaded_file($filetmp_name, $dir . '/' . $luu_anh);
                };
                $anh_avt = rtrim($anh, ';');
                // th??m ???nh m???i v?? ???nh c?? v???n c??n
                if ($cou_file > 0 && $cou_dang > 0) {
                    $anh_avt1 = explode(';', $anh_avt);
                    $anh_dd1 = explode(',', $anh_dd);
                    $file_anh1 = array_merge($anh_avt1, $anh_dd1);
                    $file_anh = implode(';', $file_anh1);
                }
                // kh??ng th??m ???nh m???i v?? ???nh c?? v???n c??n
                else if ($cou_file == 0 && $cou_dang > 0) {
                    $anh_dd1 = explode(',', $anh_dd);
                    $file_anh = implode(';', $anh_dd1);
                }
                // th??m ???nh m???i v?? x??a ???nh c?? ??i
                else if ($cou_file > 0 && $cou_dang == 0) {
                    $file_anh = $anh_avt;
                };

                if ($cou_video > 0 && $video_cu == "") {
                    $str_video  = $_FILES['file']['name'];
                    $str_video  = str_replace($bo_dau, '_', $str_video);
                    $filevideo  = time() . "_" . $str_video;
                    $file_video = '/pictures/dangtin_bds/' . time() . "_" . $str_video;
                    $video_tmp  = $_FILES['file']['tmp_name'];
                    $dir1       = '../pictures/dangtin_bds/';
                    move_uploaded_file($video_tmp, $dir1 . '/' . $filevideo);
                } else if ($cou_video == 0 && $video_cu != "") {
                    $file_video = $video_cu;
                } else if ($cou_video == 0 && $video_cu == "") {
                    $file_video = '';
                };

                if ($dia_chi != '') {
                    $address = get_infor_from_address($dia_chi);
                    $lat = $address->results[0]->geometry->location->lat;
                    $long = $address->results[0]->geometry->location->lng;
                } else {
                    $lat = $long = '';
                };

                $query_nd = new db_query("UPDATE `new` SET `new_title`='$tieu_de',`new_money`='$td_gia_spham', `new_city`='$tinh_thanh', `new_image`='$file_anh',
                                    `new_update_time`='$ngay_dang', `new_unit`='$dvi_tien',`quan_huyen`='$quan_huyen', `phuong_xa`='$phuong_xa',
                                    `new_sonha`='" . $so_nha . "', `dia_chi`='" . $dia_chi . "', `new_video`='$file_video', `new_ctiet_dmuc`='$ctiet_dmuc',
                                    `new_phone` = '$sdt_lhe', `new_email` = '$email_lhe', `new_address` = '$td_diachi_nha',`datcoc`='$tien_datcoc',
                                    `dc_unit`='$dvi_dc' WHERE new_id = $id_nd AND new_user_id = $user_id ");

                $query_decription = new db_query("UPDATE `new_description` SET  `new_description`='$mo_ta', `can_ban_mua`='$ban_thue', `ten_toa_nha`='$ten_toanha',
                                        `tang_so`='$tang_so', `huong_chinh`='$huong_cua', `giay_to_phap_ly`='$giayto', `tinh_trang_noi_that`='$tinhtrangnt',
                                        `dien_tich`='$dientich', `chieu_dai`='$chieudai', `chieu_rong`='$chieungang', `loaihinh_vp` = '$loaihinh_vp',
                                        `td_block_thap` = '$td_block_thap', `canhan_moigioi`='$canhan_moigioi', `td_macanho`='$td_macan', `td_htmch_rt`='$td_htmch_rt'
                                        WHERE new_id = $id_nd ");

                // fastcgi_finish_request();

                // $domain = 'raonhanh365.vn';
                // $usc_company = 't??i t??n l??: ' . $user_name . ', ';
                // if ($user_phone != '') {
                //     $phone = 'S??T: ' . $user_phone . ', ';
                // };

                // if ($user_email != '') {
                //     $email = 'Email: ' . $user_email . ', ';
                // };
                // $LiveChat = [
                //     'ClientId' => $chat365_id . '_liveChatV2',
                //     'ClientName' => $user_name,
                //     'FromWeb' => $domain
                // ];
                // $MessageInforSupport = "Xin ch??o, " . $usc_company . "" . $phone . "" . $email . "t??i v???a ch???nh s???a tin ????ng b???t ?????ng s???n v??n ph??ng: " . $id_nd . " tr??n " . $domain;
                // $data_send_to_group = [
                //     'LiveChat' => $LiveChat,
                //     'MessageInforSupport' => $MessageInforSupport,
                //     'idChat' => $chat365_id
                // ];
                // send_to_chat($data_send_to_group);

                // $arr_newcate_id = array(
                //     'can_ban_mua' => $ban_thue,
                //     'tang_so' => $tang_so,
                //     'giay_to_phap_ly' => $giayto,
                //     'tinh_trang_noi_that' => $tinhtrangnt,
                //     'dien_tich' => $dientich,
                //     'huong_chinh' => $huong_cua,
                //     'loaihinh_vp' => $loaihinh_vp,
                //     'ten_toa_nha' => $ten_toanha,
                //     'chieu_dai' => $chieudai,
                //     'chieu_rong' => $chieungang,
                // );
                // $curl = curl_init();
                // $data = array(
                //     'new_id'          => $id_nd,
                //     'new_title'       => $tieu_de,
                //     'new_money'       => $td_gia_spham,
                //     'new_unit'        => $dvi_tien,
                //     'new_cate_id'     => json_encode(array($cate_id => $arr_newcate_id)),
                //     'new_city'        => $tinh_thanh,
                //     'quan_huyen'      => $quan_huyen,
                //     'phuong_xa'       => $phuong_xa,
                //     'new_update_time' => $ngay_dang,
                //     'new_ctiet_dmuc'  => $ctiet_dmuc,
                //     'new_description' => $mo_ta,
                //     'dia_chi'         => $dia_chi,
                //     'new_address'     => $user_address,
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
            echo "Vui l??ng ch???n ??t nh???t 1 ???nh";
        }
    } else {
        echo "Th??ng tin kh??ng ?????y ?????";
    }
} else {
    echo "????ng nh???p t??i kho???n";
}
