<?
include "config.php";
if (isset($_COOKIE['UID'])) {
    $user_id   = getValue('user_id', 'int', 'POST', 0);
    $user_type = getValue('user_type', 'int', 'POST', 0);
    $id_dm     = getValue('id_dm', 'int', 'POST', 0);

    $tieu_de = getValue('tieu_de', 'str', 'POST', '');
    $tieu_de = trim($tieu_de);
    $tieu_de = removeEmoji($tieu_de);
    $tieu_de = sql_injection_rp($tieu_de);

    $dvi_tien     = getValue('dvi_tien', 'int', 'POST', 1);
    $ctiet_dm   = getValue('ctiet_dmuc', 'int', 'POST', 0);
    $dia_chi    = getValue('dia_chi', 'str', 'POST', '');
    $tinh_thanh = getValue('tinh_thanh', 'int', 'POST', 0);
    $quan_huyen = getValue('quan_huyen', 'int', 'POST', 0);
    $phuong_xa  = getValue('phuong_xa', 'int', 'POST', 0);
    $so_nha     = getValue('so_nha', 'str', 'POST', '');
    $so_nha     = sql_injection_rp($so_nha);

    $mo_ta = getValue('mo_ta', 'str', 'POST', '');
    $mo_ta = trim($mo_ta);
    $mo_ta = removeEmoji($mo_ta);
    $mo_ta = sql_injection_rp($mo_ta);
    $mo_ta =  mb_convert_encoding($mo_ta, 'HTML-ENTITIES', 'UTF-8');

    $tinh_trang = getValue('tinh_trang', 'int', 'POST', 0);
    // truong moi
    $tang_mphi = getValue('td_lienhe_ngban', 'int', 'POST', 0);
    $canhan_moigioi = getValue('canhan_moigioi', 'int', 'POST', 0);
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

    $ngay_dang = strtotime(date('Y-m-d H:i:s', time()));

    $cou_file = count($_FILES['files']['name']);

    $cou_video = count($_FILES['file']['name']);

    $gia_spham  = $_POST['td_gia_spham'];
    $gia_spham = str_replace(',', '', $gia_spham);

    $new_buy_sell = 2;

    $sdt_lhe = getValue('sdt_lhe', 'str', 'POST', '');
    $email_lhe = getValue('email_lhe', 'str', 'POST', '');

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
    // if ($dtin_hnay > 24) {
    //     echo "B???n ???? ????ng 24 tin trong ng??y. Ng??y mai b???n h??y quay l???i ????ng ti???p tin nh??.";
    // } else {
    //     $tgian_tiep = new db_query("SELECT `new_create_time` FROM `new` WHERE `new_user_id` = '" . $_COOKIE['UID'] . "' ORDER BY `new_id` DESC LIMIT 1 ");
    //     $tieptuc_dt = mysql_fetch_assoc($tgian_tiep->result)['new_create_time'];
    //     if ((time() - $tieptuc_dt) > 600) {
    if ($user_id != 0 && $user_type != 0 && $id_dm != 0 && $tieu_de != '') {
        if ($cou_file > 0 || $cou_dang > 0) {
            $check_tde = new db_query("SELECT `new_id` FROM `new` WHERE `new_user_id` = '$user_id' AND `new_type` = $user_type
                                            AND `new_title` = '$tieu_de' LIMIT 1 ");

            if (mysql_num_rows($check_tde->result) > 0) {
                echo "Ti??u ????? ???? t???n t???i";
            } else {
                luu_index($ctiet_dm, 0, 0, 0, 0, $arrcity2, $tags_tk1, $db_tags_vl, $db_cat_vl, $db_tkhoadb3);
                $anh = '';
                for ($i = 0; $i < $cou_file; $i++) {
                    $filename_strr = str_replace($bo_dau, '_', $_FILES['files']['name'][$i]);
                    $filename = '/pictures/dangtin_dodung/' . time() . '_' . $filename_strr;
                    $luu_anh = time() . '_' . $filename_strr;
                    $anh .= $filename . ';';
                    $filetmp_name = $_FILES['files']['tmp_name'][$i];
                    $dir          = '../pictures/dangtin_dodung/';
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
                    $file_video = '/pictures/dangtin_dodung/' . time() . "_" . $str_video;
                    $video_tmp  = $_FILES['file']['tmp_name'];
                    $dir1       = '../pictures/dangtin_dodung/';
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

                $inser_td = new db_query("INSERT INTO `new`( `new_title`,`link_title`, `new_money`, `new_cate_id`, `new_city`, `new_user_id`, `new_image`,
                                        `new_create_time`, `new_type`, `new_active`, `new_unit`, `new_name`, `new_phone`, `new_email`, `new_address`,
                                        `chotang_mphi`, `quan_huyen`, `phuong_xa`, `new_sonha`, `dia_chi`, `new_video`, `new_ctiet_dmuc`,`new_tinhtrang`,
                                        `new_buy_sell`,`new_update_time`,`thoigian_kmbd`,`thoigian_kmkt`,`soluong_min`,`soluong_max`)
                                        VALUES ('$tieu_de','$tieu_de','$gia_spham','$id_dm',0,'$user_id','$file_anh','$ngay_dang','$user_type',
                                        '1','$dvi_tien','$user_name','$sdt_lhe','$email_lhe','" . $dia_chi . "','$tang_mphi',0,0,'',
                                        '" . $dia_chi . "','$file_video','$ctiet_dm','$tinh_trang','$new_buy_sell','$ngay_dang'
                                        ,'$ngay_bat_dau','$ngay_ket_thuc','$soluong_min','$soluong_max')");

                $newid     = new db_query("SELECT LAST_INSERT_ID() AS id_dt");
                $id_dt     = mysql_fetch_assoc($newid->result)['id_dt'];
                $inser_des = new db_query("INSERT INTO `new_description`( `new_id`, `new_description`,`canhan_moigioi`)
                                    VALUES ('$id_dt','$mo_ta','$canhan_moigioi')");
                include('../ajax/xac_thuc_chung.php');

                // fastcgi_finish_request();

                // $domain = 'raonhanh365.vn';
                // $usc_company = 't??i t??n l??: ' . $user_name . ', ';
                // if ($sdt_lhe != '') {
                //     $phone = 'S??T: ' . $sdt_lhe . ', ';
                // };

                // if ($email_lhe != '') {
                //     $email = 'Email: ' . $email_lhe . ', ';
                // };
                // $LiveChat = [
                //     'ClientId' => $chat365_id . '_liveChatV2',
                //     'ClientName' => $user_name,
                //     'FromWeb' => $domain
                // ];
                // $MessageInforSupport = "Xin ch??o, " . $usc_company . "" . $phone . "" . $email . "t??i v???a ????ng tin hoa, qu?? t???ng, handmade tr??n " . $domain;
                // $data_send_to_group = [
                //     'LiveChat' => $LiveChat,
                //     'MessageInforSupport' => $MessageInforSupport,
                //     'idChat' => $chat365_id
                // ];
                // send_to_chat($data_send_to_group);

                // $arr_newcate_id = array(
                //     'new_tinhtrang' => $tinh_trang,
                // );
                // $curl = curl_init();
                // $data = array(
                //     'new_id'          => $id_dt,
                //     'new_title'       => $tieu_de,
                //     'new_money'       => $gia_spham,
                //     'gia_kt'          => '',
                //     'new_unit'        => $dvi_tien,
                //     'chotang_mphi'    => $tang_mphi,
                //     'new_cate_id'     => json_encode(array($id_dm => $arr_newcate_id)),
                //     'new_parent_id'   => $db_cat[$id_dm]['cat_parent_id'],
                //     'new_user_id'     => $user_id,
                //     'new_city'        => 0,
                //     'quan_huyen'      => 0,
                //     'phuong_xa'       => 0,
                //     'new_create_time' => $ngay_dang,
                //     'new_update_time' => $ngay_dang,
                //     'new_ctiet_dmuc'  => $ctiet_dm,
                //     'new_view_count'  => 0,
                //     'new_buy_sell'    => 2,
                //     'new_description' => $mo_ta,
                //     'dia_chi'         => $dia_chi,
                //     'new_address'     => $user_address,
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
            echo "Ch???n ??t nh???t 1 ???nh";
        }
    } else {
        echo "Th??ng tin kh??ng ?????y ?????, vui l??ng th??? l???i";
    }
    //     } else {
    //         echo "Sau 10 ph??t b???n h??y ????ng tin ti???p theo nh??";
    //     }
    // }
}
