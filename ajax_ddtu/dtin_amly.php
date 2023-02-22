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

    $link_title = replaceTitle($tieu_de);

    $gia_spham = getValue('gia_spham', 'str', 'POST', '');
    $gia_spham = str_replace(',', '', $gia_spham);

    $tang_mphi = getValue('tang_mphi', 'int', 'POST', 0);
    $don_vi = getValue('don_vi', 'int', 'POST', 1);

    $mo_ta = getValue('mo_ta', 'str', 'POST', '');
    $mo_ta = trim($mo_ta);
    $mo_ta = removeEmoji($mo_ta);
    $mo_ta = mb_convert_encoding($mo_ta, 'HTML-ENTITIES', 'UTF-8');
    $mo_ta = sql_injection_rp($mo_ta);
    // truong moi
    $xac_thuc = getValue('xac_thuc', 'int', 'POST', 0);
    if ($xac_thuc == 1) {

        $ngay_bat_dau = getValue('ngay_bat_dau', 'int', 'POST', 0);
        $ngay_bat_dau = strtotime($ngay_bat_dau);
        $ngay_ket_thuc = getValue('ngay_ket_thuc', 'int', 'POST', 0);
        $ngay_ket_thuc = strtotime($ngay_ket_thuc);

        $soluong_min = getValue('soluong_min', 'int', 'POST', 0);
        $soluong_max = getValue('soluong_max', 'int', 'POST', 0);
    }
    // end

    $thiet_bi = getValue('thiet_bi', 'int', 'POST', 0);
    $hang = getValue('hang', 'str', 'POST', '');
    $kich_thuoc = getValue('kich_thuoc', 'int', 'POST', 0);
    $ketnoi_inter = getValue('ketnoi_inter', 'int', 'POST', 0);
    $do_phangiai = getValue('do_phangiai', 'int', 'POST', 0);
    $loai = getValue('loai', 'int', 'POST', 0);
    $cong_suat = getValue('cong_suat', 'int', 'POST', 0);
    $xuat_xu = getValue('xuat_xu', 'int', 'POST', 0);
    $bao_hanh = getValue('bao_hanh', 'int', 'POST', 0);
    $tinh_trang = getValue('tinh_trang', 'int', 'POST', 0);
    $canhan_moigioi = getValue('canhan_moigioi', 'int', 'POST', 0);
    $sdt_lhe = getValue('sdt_lhe', 'str', 'POST', '');
    $email_lhe = getValue('email_lhe', 'str', 'POST', '');
    $diachi_nban = getValue('diachi_nban', 'str', 'POST', '');
    $chitiet_dm = getValue('chitiet_dm', 'int', 'POST', 0);
    // ảnh cũ
    $anh_dd = getValue('anh_dd', 'str', 'POST', '');
    if ($anh_dd != "") {
        $da_dang = explode(',', $anh_dd);
        $cou_dang = count($da_dang);
    }
    // end

    $cou_file = count($_FILES['files']['name']);

    $cou_video = count($_FILES['file']['name']);

    $ngay_dang = strtotime(date('Y-m-d H:i:s', time()));

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
                                            AND `new_title` = '$tieu_de' LIMIT 1  ");
                    if (mysql_num_rows($check_tde->result) > 0) {
                        echo "Tiêu đề đã tồn tại";
                    } else {
                        luu_index($chitiet_dm, 0, 0, 0, 0, $arrcity2, $tags_tk1, $db_tags_vl, $db_cat_vl, $db_tkhoadb3);
                        $anh = '';
                        for ($i = 0; $i < $cou_file; $i++) {
                            $filename_strr = str_replace($bo_dau, '_', $_FILES['files']['name'][$i]);
                            $filename = '/pictures/do_dien_tu/' . time() . '_' . $filename_strr;
                            $luu_anh = time() . '_' . $filename_strr;
                            $anh .= $filename . ';';
                            $filetmp_name = $_FILES['files']['tmp_name'][$i];
                            $dir          = '../pictures/do_dien_tu/';
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

                            $file_video = 'do_dien_tu/' . time() . "_" . $str_video;
                            $video_tmp  = $_FILES['file']['tmp_name'];
                            $dir1       = '../pictures/do_dien_tu/';
                            move_uploaded_file($video_tmp, $dir1 . '/' . $filevideo);
                        } else {
                            $file_video = '';
                        }

                        if ($diachi_nban != '') {
                            $diachi_nban = explode(';', $diachi_nban);
                            foreach ($diachi_nban as $item_dc) {
                                if ($item_dc != '') {
                                    $address = get_infor_from_address($item_dc);
                                    $lat = $address->results[0]->geometry->location->lat;
                                    $long = $address->results[0]->geometry->location->lng;
                                }
                            }
                        } else {
                            $lat = $long = '';
                        };

                        $inser_td = new db_query("INSERT INTO `new`(`new_title`,`link_title`, `new_money`, `new_cate_id`, `new_city`, `new_user_id`, `new_image`,
                                            `new_create_time`, `new_type`, `new_active`, `new_unit`, `new_name`, `new_phone`, `new_email`, `new_address`,
                                            `chotang_mphi`, `quan_huyen`, `phuong_xa`, `new_sonha`, `dia_chi`, `new_video`, `new_ctiet_dmuc`,`new_tinhtrang`,
                                            `new_baohanh`, `new_buy_sell`,`new_update_time`,`thoigian_kmbd`,`thoigian_kmkt`,`soluong_min`,`soluong_max`) 
                                            VALUES ('$tieu_de','$link_title','$gia_spham','$id_dm',0,
                                            '$user_id','$file_anh','$ngay_dang','$user_type','1','$don_vi','$user_name','$sdt_lhe','$email_lhe','$diachi_nban',
                                            '$tang_mphi',0,0,'','$diachi_nban','$file_video','$chitiet_dm','$tinh_trang','$bao_hanh',2,'$ngay_dang'
                                            ,'$ngay_bat_dau','$ngay_ket_thuc','$soluong_min','$soluong_max')");

                        $newid = new db_query("SELECT LAST_INSERT_ID() AS id_dt");
                        $id_dt = mysql_fetch_assoc($newid->result)['id_dt'];

                        $inser_des = new db_query("INSERT INTO `new_description`(`new_id`, `new_description`, `hang`, `thiet_bi`, `knoi_internet`,
                                                `do_phan_giai`, `cong_suat`, `loai_chung`, `man_hinh`, `canhan_moigioi`, `xuat_xu`) VALUES ('$id_dt','$mo_ta',
                                                '$hang','$thiet_bi','$ketnoi_inter','$do_phangiai','$cong_suat','$loai','$kich_thuoc','$canhan_moigioi','$xuat_xu')");
                        include('../ajax/xac_thuc_chung.php');

                        fastcgi_finish_request();

                        // $domain = 'raonhanh365.vn';
                        // $usc_company = 'Tôi tên là: ' . $user_name . ', ';
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
                        // $MessageInforSupport = "Xin chào, " . $usc_company . "" . $phone . "" . $email . "tôi vừa đăng tin đồ điện tử tivi, âm thanh trên " . $domain;
                        // $message = "Tôi tên là: " . $user_name . ", " . $phone . "" . $email . "tôi vừa đăng tin đồ điện tử tivi, âm thanh trên " . $domain;
                        // $data_send_to_group = [
                        //     'LiveChat' => $LiveChat,
                        //     'MessageInforSupport' => $MessageInforSupport,
                        //     'idChat' => $chat365_id,
                        //     'Message' => $message,
                        // ];
                        // send_to_chat($data_send_to_group);
                        $tt_crea = 'Đồ điện tử Tivi - Âm thanh';
                        $send_chat = new SendMess($email_lhe, $chat365_id, $sdt_lhe, $user_name, 0);
                        $send_chat->createNew($tt_crea);

                        $arr_newcate_id = array(
                            'thiet_bi' => $thiet_bi,
                            'hang' => $hang,
                            'man_hinh' => $kich_thuoc,
                            'knoi_internet' => $ketnoi_inter,
                            'loai_chung' => $loai,
                            'cong_suat' => $cong_suat,
                            'do_phan_giai' => $do_phangiai,
                            'new_baohanh' => $bao_hanh,
                            'new_tinhtrang' => $tinh_trang,
                        );
                        $curl = curl_init();
                        $data = array(
                            'new_id'          => $id_dt,
                            'new_title'       => $tieu_de,
                            'new_money'       => $gia_spham,
                            'gia_kt'          => '',
                            'new_unit'        => $don_vi,
                            'chotang_mphi'    => $tang_mphi,
                            'new_cate_id'     => json_encode(array($id_dm => $arr_newcate_id)),
                            'new_parent_id'   => $db_cat[$id_dm]['cat_parent_id'],
                            'new_user_id'     => $user_id,
                            'new_city'        => 0,
                            'quan_huyen'      => 0,
                            'phuong_xa'       => 0,
                            'new_create_time' => $ngay_dang,
                            'new_update_time' => $ngay_dang,
                            'new_ctiet_dmuc'  => $chitiet_dm,
                            'new_view_count'  => 0,
                            'new_buy_sell'    => 2,
                            'new_description' => $mo_ta,
                            'dia_chi'         => $diachi_nban,
                            'new_address'     => $diachi_nban,
                            'new_pin_cate'    => 0,
                            'new_active' => 1,
                            'da_ban' => 0,
                            'site'            => 'spraonhanh365',
                        );
                        curl_setopt($curl, CURLOPT_POST, 1);
                        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                        curl_setopt($curl, CURLOPT_URL, "http://43.239.223.10:5003/create_data_sanpham");
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
                        // curl_setopt($curl, CURLOPT_TIMEOUT, 3);
                        curl_exec($curl);
                        curl_close($curl);
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
