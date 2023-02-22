<?
include("config.php");
if (isset($_COOKIE['UID'])) {
    $user_id = getValue('user_id', 'int', 'POST', 0);
    $user_type = getValue('user_type', 'int', 'POST', 0);
    $ban_thue = getValue('ban_thue', 'int', 'POST', 0);

    $tieu_de = getValue('tieu_de', 'str', 'POST', '');
    $tieu_de = removeEmoji($tieu_de);
    $tieu_de = trim($tieu_de);
    $tieu_de = sql_injection_rp($tieu_de);

    $ten_toanha = getValue('ten_toanha', 'str', 'POST', '');
    $ten_toanha = removeEmoji($ten_toanha);
    $ten_toanha = sql_injection_rp($ten_toanha);
    $ten_toanha =  mb_convert_encoding($ten_toanha, 'HTML-ENTITIES', 'UTF-8');

    $tongso_tang = getValue('tongso_tang', 'int', 'POST', 0);
    $huong_cua = getValue('huong_cua', 'int', 'POST', 0);
    $so_phongngu = getValue('so_phongngu', 'int', 'POST', 0);
    $so_phong_vs = getValue('so_phong_vs', 'int', 'POST', 0);
    $giayto = getValue('giayto', 'int', 'POST', 0);
    $tinhtrangnt = getValue('tinhtrangnt', 'int', 'POST', 0);
    $dac_diem = getValue('dac_diem', 'int', 'POST', '');
    $dientich = getValue('dientich', 'int', 'POST', 0);
    $chieudai = getValue('chieudai', 'int', 'POST', 0);
    $chieungang = getValue('chieungang', 'int', 'POST', 0);
    $td_gia_spham = getValue('td_gia_spham', 'str', 'POST', '');
    $dvi_tien = getValue('dvi_tien', 'int', 'POST', 1);

    $mo_ta = getValue('mo_ta', 'str', 'POST', '');
    $mo_ta = removeEmoji($mo_ta);
    $mo_ta = trim($mo_ta);
    $mo_ta = sql_injection_rp($mo_ta);
    $mo_ta =  mb_convert_encoding($mo_ta, 'HTML-ENTITIES', 'UTF-8');

    $ctiet_dmuc = getValue('ctiet_dmuc', 'int', 'POST', 0);
    $tinh_thanh = getValue('tinh_thanh', 'int', 'POST', 0);
    $quan_huyen = getValue('quan_huyen', 'int', 'POST', 0);
    $phuong_xa = getValue('phuong_xa', 'int', 'POST', 0);

    $so_nha = getValue('so_nha', 'str', 'POST', '');
    $so_nha = sql_injection_rp($so_nha);

    $dia_chi = getValue('dia_chi', 'str', 'POST', '');
    $dia_chi = sql_injection_rp($dia_chi);

    $ngay_dang = strtotime(date("Y-m-d H:i:s", time()));
    $td_gia_spham = str_replace(',', '', $td_gia_spham);
    $cate_id = 29;
    $new_buy_sell = 2;
    $cou_file = count($_FILES['files']['name']);
    $cou_video = count($_FILES['file']['name']);

    $sdt_lhe = getValue('sdt_lhe', 'str', 'POST', '');
    $email_lhe = getValue('email_lhe', 'str', 'POST', '');
    // truong moi
    $dacdiem = getValue('dacdiem', 'str', 'POST', '');
    $td_macan = getValue('td_macan', 'str', 'POST', '');
    $td_macan = sql_injection_rp($td_macan);

    $td_tenpk_lo = getValue('td_tenpk_lo', 'str', 'POST', '');
    $td_tenpk_lo = sql_injection_rp($td_tenpk_lo);

    $canhan_moigioi = getValue('canhan_moigioi', 'int', 'POST', 0);
    $td_diachi_nha = getValue('td_diachi_nha', 'str', 'POST', '');
    $td_diachi_nha = sql_injection_rp($td_diachi_nha);

    $dientichsudung = getValue('dientichsudung', 'int', 'POST', 0);
    $td_htmch_rt = getValue('td_htmch_rt', 'int', 'POST', 0);
    $td_gia_datcoc = getValue('td_gia_datcoc', 'str', 'POST', '');
    $td_gia_datcoc = str_replace(',', '', $td_gia_datcoc);
    $dc_new_unit = getvalue('dc_new_unit', 'int', 'POST', 1);
    // end truong moi
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
        // if ((time() - $tieptuc_dt) > 600) {
            if ($user_id != 0 && $user_type != 0 && $tieu_de != "") {
                if ($cou_file > 0 || $cou_dang > 0) {
                    $query_check = new db_query("SELECT `new_id` FROM `new` WHERE `new_user_id` = $user_id AND `new_type` = $user_type
                                                AND `new_title` = '$tieu_de' LIMIT 1");
                    if (mysql_num_rows($query_check->result) > 0) {
                        echo "Tiêu đề đã tồn tại!";
                    } else {
                        luu_index($ctiet_dmuc, $quan_huyen, $tinh_thanh, 0, 0, $arrcity2, $tags_tk1, $db_tags_vl, $db_cat_vl, $db_tkhoadb3);
                        $anh = '';
                        for ($i = 0; $i < $cou_file; $i++) {
                            $filename_strr = str_replace($bo_dau, '_', $_FILES['files']['name'][$i]);
                            $filename = '/pictures/dangtin_bds/' . time() . '_' . $filename_strr;
                            $luu_anh = time() . '_' . $filename_strr;
                            $anh .= $filename . ';';
                            $filetmp_name = $_FILES['files']['tmp_name'][$i];
                            $dir          = '../pictures/dangtin_bds/';
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
                            $file_video = '/pictures/dangtin_bds/' . time() . "_" . $str_video;
                            $video_tmp  = $_FILES['file']['tmp_name'];
                            $dir1       = '../pictures/dangtin_bds/';
                            move_uploaded_file($video_tmp, $dir1 . '/' . $filevideo);
                        } else {
                            $file_video = '';
                        }
                        if ($td_diachi_nha != '') {
                            $address = get_infor_from_address($td_diachi_nha);
                            $lat = $address->results[0]->geometry->location->lat;
                            $long = $address->results[0]->geometry->location->lng;
                        } else {
                            $lat = $long = '';
                        }
                        // -------------Tài khoản người bán------------------
                        $query_dt = new db_query("INSERT INTO `new`(`new_title`,`link_title`,`new_money`, `new_cate_id`, `new_city`, `new_user_id`, `new_image`,
                                    `new_create_time`, `new_type`, `new_buy_sell`, `new_active`,`new_unit`, `new_name`, `new_phone`, `new_email`, `new_address`, `da_ban`,
                                    `quan_huyen`, `phuong_xa`, `new_sonha`, `dia_chi`, `new_video`, `new_ctiet_dmuc`,`new_update_time`, `datcoc`, `dc_unit`)
                                    VALUES ('$tieu_de','$tieu_de','$td_gia_spham','$cate_id','$tinh_thanh','$user_id','$file_anh','$ngay_dang','$user_type',
                                    '$new_buy_sell',1,'$dvi_tien','$user_name','$sdt_lhe','$email_lhe','$dia_chi',0,'$quan_huyen','$phuong_xa','" . $so_nha . "',
                                    '" . $td_diachi_nha . "','$file_video','$ctiet_dmuc','$ngay_dang','$td_gia_datcoc','$dc_new_unit')");

                        $id_des = new db_query("SELECT LAST_INSERT_ID() AS id");
                        $id = mysql_fetch_assoc($id_des->result)['id'];

                        $query_decription = new db_query("INSERT INTO `new_description`(`new_id`, `new_description`,`can_ban_mua`, `ten_toa_nha`,
                                            `tong_so_tang`,`huong_chinh`, `so_pngu`,`so_pve_sinh`, `giay_to_phap_ly`, `tinh_trang_noi_that`,`dac_diem`,
                                            `dien_tich`, `chieu_dai`, `chieu_rong`,`ten_phan_khu`,`td_macanho`,`td_htmch_rt`,`dientichsd`,`canhan_moigioi`)
                                            VALUES ('$id','$mo_ta','$ban_thue','$ten_toanha','$tongso_tang', '$huong_cua','$so_phongngu','$so_phong_vs',
                                            '$giayto','$tinhtrangnt', '$dacdiem','$dientich','$chieudai','$chieungang','$td_tenpk_lo','$td_macan','$td_htmch_rt',
                                            '$dientichsudung','$canhan_moigioi')");

                        // fastcgi_finish_request();

                        // $domain = 'raonhanh365.vn';
                        // $usc_company = 'tôi tên là: ' . $user_name . ', ';
                        // if ($user_phone != '') {
                        //     $phone = 'SĐT: ' . $user_phone . ', ';
                        // };

                        // if ($user_email != '') {
                        //     $email = 'Email: ' . $user_email . ', ';
                        // };
                        // $LiveChat = [
                        //     'ClientId' => $chat365_id . '_liveChatV2',
                        //     'ClientName' => $user_name,
                        //     'FromWeb' => $domain
                        // ];
                        // $MessageInforSupport = "Xin chào, " . $usc_company . "" . $phone . "" . $email . "tôi vừa đăng tin bất động sản nhà riêng trên " . $domain;
                        // $data_send_to_group = [
                        //     'LiveChat' => $LiveChat,
                        //     'MessageInforSupport' => $MessageInforSupport,
                        //     'idChat' => $chat365_id
                        // ];
                        // send_to_chat($data_send_to_group);

                        // $arr_newcate_id = array(
                        //     'can_ban_mua' => $ban_thue,
                        //     'tong_so_tang' => $tongso_tang,
                        //     'so_pngu' => $so_phongngu,
                        //     'so_pve_sinh' => $so_phong_vs,
                        //     'giay_to_phap_ly' => $giayto,
                        //     'tinh_trang_noi_that' => $tinhtrangnt,
                        //     'dien_tich' => $dientich,
                        //     'huong_chinh' => $huong_cua,
                        //     'ten_toa_nha' => $ten_toanha,
                        //     'chieu_dai' => $chieudai,
                        //     'chieu_rong' => $chieungang,
                        // );
                        // $curl = curl_init();
                        // $data = array(
                        //     'new_id'          => $id,
                        //     'new_title'       => $tieu_de,
                        //     'new_money'       => $td_gia_spham,
                        //     'gia_kt'          => '',
                        //     'new_unit'        => $dvi_tien,
                        //     'chotang_mphi'    => 0,
                        //     'new_cate_id'     => json_encode(array($cate_id => $arr_newcate_id)),
                        //     'new_parent_id'   => $db_cat[$cate_id]['cat_parent_id'],
                        //     'new_user_id'     => $user_id,
                        //     'new_city'        => $tinh_thanh,
                        //     'quan_huyen'      => $quan_huyen,
                        //     'phuong_xa'       => $phuong_xa,
                        //     'new_create_time' => $ngay_dang,
                        //     'new_update_time' => $ngay_dang,
                        //     'new_ctiet_dmuc'  => $ctiet_dmuc,
                        //     'new_view_count'  => 0,
                        //     'new_buy_sell'    => 2,
                        //     'new_description' => $mo_ta,
                        //     'dia_chi'         => $td_diachi_nha,
                        //     'new_address'     => $dia_chi,
                        //     'new_pin_cate'    => 0,
                        //     'new_active' => 1,
                        //     'da_ban' => 0,
                        //     'site'            => 'spraonhanh365',
                        // );
                        // curl_setopt($curl, CURLOPT_POST, 1);
                        // curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                        // curl_setopt($curl, CURLOPT_URL, "http://43.239.223.10:5003/create_data_sanpham");
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
        // } else {
        //     echo "Sau 10 phút bạn hãy đăng tin tiếp theo nhé";
        // }
    }
}
