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
    $ten_toanha = mb_convert_encoding($ten_toanha, 'HTML-ENTITIES', 'UTF-8');

    $loai_hinh = getValue('loai_hinh', 'int', 'POST', 0);
    $tinh_trang = getValue('tinh_trang', 'int', 'POST', 0);
    $tang_so = getValue('tang_so', 'int', 'POST', 0);
    $tongso_tang = getValue('tongso_tang', 'int', 'POST', 0);
    $so_phongngu = getValue('so_phongngu', 'int', 'POST', 0);
    $so_phong_vs = getValue('so_phong_vs', 'int', 'POST', 0);
    $huong_cua = getValue('huong_cua', 'int', 'POST', 0);
    $huong_ban_cong = getValue('huong_ban_cong', 'int', 'POST', '');
    $giayto = getValue('giayto', 'int', 'POST', '');
    $tinhtrangnt = getValue('tinhtrangnt', 'int', 'POST', 0);
    $dientich = getValue('dientich', 'int', 'POST', 0);
    $chieudai = getValue('chieudai', 'int', 'POST', 0);
    $chieungang = getValue('chieungang', 'int', 'POST', 0);
    $td_gia_spham = getValue('td_gia_spham', 'str', 'POST', '');
    $dvi_tien = getValue('dvi_tien', 'int', 'POST', 1);

    $mo_ta = getValue('mo_ta', 'str', 'POST', '');
    $mo_ta = removeEmoji($mo_ta);
    $mo_ta = trim($mo_ta);
    $mo_ta = sql_injection_rp($mo_ta);
    $mo_ta = mb_convert_encoding($mo_ta, 'HTML-ENTITIES', 'UTF-8');

    $ctiet_dmuc = getValue('ctiet_dmuc', 'int', 'POST', 0);
    $tinh_thanh = getValue('tinh_thanh', 'int', 'POST', 0);
    $quan_huyen = getValue('quan_huyen', 'int', 'POST', 0);
    $phuong_xa = getValue('phuong_xa', 'int', 'POST', 0);

    $so_nha = getValue('so_nha', 'str', 'POST', '');
    $so_nha = sql_injection_rp($so_nha);

    $dia_chi = getValue('dia_chi', 'str', 'POST', '');
    $dia_chi = sql_injection_rp($dia_chi);

    $ngay_dang = strtotime(date("Y-m-d H:i:s", time()));
    $cate_id = 27;
    $cou_file = count($_FILES['files']['name']);
    $cou_video = count($_FILES['file']['name']);
    $td_gia_spham = str_replace(',', '', $td_gia_spham);
    $new_buy_sell = 2;

    $sdt_lhe = getValue('sdt_lhe', 'str', 'POST', '');
    $email_lhe = getValue('email_lhe', 'str', 'POST', '');
    // truong moi
    $td_cangoc = getValue('td_cangoc', 'int', 'POST', 0);
    $td_block_thap = getValue('td_block_thap', 'str', 'POST', '');
    $td_block_thap = sql_injection_rp($td_block_thap);

    $canhan_moigioi = getValue('canhan_moigioi', 'int', 'POST', 0);
    $td_macan = getValue('td_macan', 'str', 'POST', '');
    $td_macan = sql_injection_rp($td_macan);

    $td_diachi_nha = getValue('td_diachi_nha', 'str', 'POST', '');
    $td_diachi_nha = sql_injection_rp($td_diachi_nha);

    $td_htmch_rt = getValue('td_htmch_rt', 'int', 'POST', 0);
    $dacdiem = getValue('dacdiem', 'str', 'POST', '');
    // ???nh c??
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
        echo "B???n ???? ????ng 24 tin trong ng??y. Ng??y mai b???n h??y quay l???i ????ng ti???p tin nh??.";
    } else {
        $tgian_tiep = new db_query("SELECT `new_create_time` FROM `new` WHERE `new_user_id` = '" . $_COOKIE['UID'] . "' ORDER BY `new_id` DESC LIMIT 1 ");
        $tieptuc_dt = mysql_fetch_assoc($tgian_tiep->result)['new_create_time'];
        // if ((time() - $tieptuc_dt) > 600) {
            if ($user_id != 0 && $user_type != 0 && $tieu_de != "") {
                if ($cou_file > 0 || $cou_dang > 0) {
                    $query_check = new db_query("SELECT `new_id` FROM `new` WHERE  `new_user_id` = $user_id AND  `new_type` = $user_type
                                                AND `new_title` = '$tieu_de' LIMIT 1 ");

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
                            $dir          = '../pictures/dangtin_bds/';
                            move_uploaded_file($filetmp_name, $dir . '/' . $luu_anh);
                        };
                        $anh_avt = rtrim($anh, ';');
                        // tr?????ng h???p 1: th??m ???nh m???i v?? ???nh c?? v???n c??n
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
                        // -------------T??i kho???n ng?????i b??n------------------
                        $query_dt = new db_query("INSERT INTO `new`(`new_title`,`link_title`,`new_money`, `new_cate_id`, `new_city`, `new_user_id`, `new_image`,
                                            `new_create_time`, `new_type`, `new_buy_sell`, `new_active`,`new_unit`, `new_name`, `new_phone`, `new_email`,
                                            `new_address`, `da_ban`,`quan_huyen`, `phuong_xa`, `new_sonha`, `dia_chi`, `new_video`, `new_ctiet_dmuc`,
                                            `new_update_time`) VALUES ('$tieu_de','$tieu_de','$td_gia_spham','$cate_id','$tinh_thanh','$user_id','$file_anh',
                                            '$ngay_dang','$user_type', '$new_buy_sell',1,'$dvi_tien','$user_name','$sdt_lhe','$email_lhe',
                                            '$dia_chi',0,'$quan_huyen','$phuong_xa','" . $so_nha . "','" . $td_diachi_nha . "','$file_video','$ctiet_dmuc','$ngay_dang')");

                        $id_des = new db_query("SELECT LAST_INSERT_ID() AS id");
                        $id = mysql_fetch_assoc($id_des->result)['id'];

                        $query_decription = new db_query("INSERT INTO `new_description`(`new_id`, `new_description`,`can_ban_mua`, `ten_toa_nha`,
                                                    `loai_hinh_canho`, `tang_so`, `so_pngu`,`so_pve_sinh`,`huong_chinh`, `huong_ban_cong`, `tinh_trang_bds`, `giay_to_phap_ly`,
                                                    `tinh_trang_noi_that`, `dien_tich`, `chieu_dai`, `chieu_rong`,`cangoc`,`td_block_thap`,`canhan_moigioi`,
                                                    `td_macanho`,`td_htmch_rt`,`dac_diem`) VALUES ('$id','$mo_ta','$ban_thue','$ten_toanha','$loai_hinh',
                                                    '$tang_so','$so_phongngu','$so_phong_vs','$huong_cua','$huong_ban_cong','$tinh_trang' , '$giayto','$tinhtrangnt',
                                                    '$dientich','$chieudai','$chieungang','$td_cangoc','$td_block_thap','$canhan_moigioi','$td_macan',
                                                    '$td_htmch_rt','$dacdiem')");

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
                        // $MessageInforSupport = "Xin ch??o, " . $usc_company . "" . $phone . "" . $email . "t??i v???a ????ng tin b???t ?????ng s???n chung c?? tr??n " . $domain;
                        // $data_send_to_group = [
                        //     'LiveChat' => $LiveChat,
                        //     'MessageInforSupport' => $MessageInforSupport,
                        //     'idChat' => $chat365_id
                        // ];
                        // send_to_chat($data_send_to_group);

                        // $arr_newcate_id = array(
                        //     'can_ban_mua'         => $ban_thue,
                        //     'loai_hinh_canho'     => $loai_hinh,
                        //     'tang_so'             => $tang_so,
                        //     'giay_to_phap_ly'     => $giayto,
                        //     'dien_tich'           => $dientich,
                        //     'tinh_trang_noi_that' => $tinhtrangnt,
                        //     'so_pngu'             => $so_phongngu,
                        //     'so_pve_sinh'         => $so_phong_vs,
                        //     'huong_chinh'         => $huong_cua,
                        //     'ten_toa_nha'         => $ten_toanha,
                        //     'chieu_dai'           => $chieudai,
                        //     'chieu_rong'          => $chieungang,
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
                    echo "Vui l??ng ch???n ??t nh???t 1 ???nh";
                }
            } else {
                echo "Th??ng tin kh??ng ?????y ?????";
            }
        // } else {
        //     echo "Sau 10 ph??t b???n h??y ????ng tin ti???p theo nh??";
        // }
    }
}
