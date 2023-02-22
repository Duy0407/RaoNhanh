<?
include("config.php");
if (isset($_COOKIE['UID'])) {
    $userid   = $_COOKIE['UID'];
    $new_type = $_COOKIE['UT'];
    $id_dm = 120;
    if (isset($_POST["vitri_td"])) {
        $new_id = getValue('new_id', 'str', 'POST', 0);
        $ten_cty = getValue('ten_cty', 'str', 'POST', '');
        // địa chỉ công ty
        $td_diachi = getValue('diachi_kd', 'str', 'POST', '');
        $tinhthanh = getValue('tinhthanh', 'int', 'POST', 0);
        $quanhuyen = getValue('quanhuyen', 'int', 'POST', 0);
        $phuongxa = getValue('phuongxa', 'int', 'POST', 0);
        $sonha = getValue('sonha', 'str', 'POST', '');

        $vitri_td = getValue('vitri_td', 'str', 'POST', '');
        $vitri_td = trim($vitri_td);
        $vitri_td = sql_injection_rp($vitri_td);

        $alias = replaceTitle($vitri_td);
        $nganhnghe = getValue('nganh_nghe', 'int', 'POST', 0);
        $detail_job = getValue('chitiet_cv', 'int', 'POST', 0);
        $work_type = getValue('hinh_thuclv', 'int', 'POST', 0);
        // địa chỉ làm việc
        $td_diachi_lamviec = getValue('diachi_lv', 'str', 'POST', '');
        $tinhthanh_lv = getValue('tinh_thanh', 'int', 'POST', 0);
        $quanhuyen_lv = getValue('quan_huyen', 'int', 'POST', 0);
        $phuongxa_lv = getValue('phuong_xa', 'int', 'POST', 0);
        $sonha_lv = getValue('so_nha', 'str', 'POST', '');
        // mức lương
        $moneymin = getValue('salary_fr', 'str', 'POST', '');
        $moneymin = str_replace(',', '', $moneymin);

        $moneymax = getValue('salary_to', 'str', 'POST', '');
        $moneymax = str_replace(',', '', $moneymax);

        $salary_unit = getValue('salary_unit', 'int', 'POST', 1);
        $salary_type = getValue('hinhthuc_trl', 'str', 'POST', '');

        $quantity = getValue('so_luong', 'int', 'POST', 0);

        $mota = getValue('mo_ta', 'str', 'POST', '');
        $mota = removeEmoji($mota);
        $mota = mb_convert_encoding($mota, 'HTML-ENTITIES', 'UTF-8');
        $mota = sql_injection_rp($mota);

        $ky_nang = getValue('ky_nang', 'str', 'POST', '');
        $quyen_loi = getValue('quyen_loi', 'str', 'POST', '');
        $hannop = $_POST['han_nop'];
        // thông tin thêm
        $gioitinh = getValue('gioi_tinh', 'int', 'POST', 0);
        $minAge = getValue('minAge', 'int', 'POST', 0);
        $maxAge = getValue('maxAge', 'int', 'POST', 0);
        $bangcap = getValue('bang_cap', 'int', 'POST', 0);
        $kinhnghiem = getValue('kinh_nghiem', 'int', 'POST', 0);
        $chungchi = getValue('chung_chi', 'str', 'POST', '');

        $sdt_lhe = getValue('sdt_lhe', 'str', 'POST', '');
        $email_lhe = getValue('email_lhe', 'str', 'POST', '');

        $allowImage = array("jpeg", "jpg", "png", "gif", "svg");
        $time = time();
        $bo_dau = [',', ';', ' '];

        if ($new_id != 0) {
            // update tin
            // logo công ty
            $logo = null;
            $logo_cu = getValue('logo_cu', 'str', 'POST', '');
            if (isset($_FILES['logo'])) {
                // nếu có logo mới => update logo
                //Tạo đường dẫn
                $logo_dir = "../pictures/ungvien/";
                // check đuôi file
                $img_ext = strtolower(end(explode('.', $_FILES['logo']['name'])));
                //Check size ảnh
                if (in_array($img_ext, $allowImage) == true && $_FILES['logo']['size'] <= 2100000) {
                    $image =   'logo-' . $time . '.' . $img_ext; // Tạo tên ảnh
                    if (!is_dir($logo_dir)) { // check xem đường dẫn đẩy ảnh vào tồn tại hay chưa
                        mkdir($logo_dir, 0777, TRUE); // Chưa tồn tại thì tạo đường dẫn đó
                    }
                    move_uploaded_file($_FILES['logo']['tmp_name'], $logo_dir . $image); //đẩy ảnh vào folder đã tạo
                }
                $logo = "ungvien/" . $image;
            } elseif ($logo_cu == '') {
                // nếu ko có logo mới ko còn logo cũ => update logo == ''
                $logo = '';
            } else {
                // nếu ko có logo mới còn logo cũ => logo = logo_cu
                $logo = $logo_cu;
            }
            // ảnh hoạt động công ty
            // ảnh cũ
            $anh_dd = $_POST['old_files'];
            if ($anh_dd != "") {
                $da_dang = explode(',', $anh_dd);
                $cou_dang = count($da_dang);
            }
            $cou_file = count($_FILES['files']['name']);
            $arr_com_pic = '';
            if ($cou_file > 0 || $cou_dang > 0) {
                //Tạo đường dẫn
                $upload_dir = "../pictures/ungvien/";
                $arr_com_pic = [];
                for ($i = 0; $i < $cou_file; $i++) {
                    // check đuôi file
                    $img_ext = strtolower(end(explode('.', $_FILES['files']['name'][$i])));
                    //Check size ảnh
                    if (in_array($img_ext, $allowImage) == true && $_FILES['files']['size'][$i] <= 2100000) {
                        $image =   time() . '_' . $_FILES['files']['name'][$i]; // Tạo tên ảnh
                        if (!is_dir($upload_dir)) { // check xem đường dẫn đẩy ảnh vào tồn tại hay chưa
                            mkdir($upload_dir, 0777, TRUE); // Chưa tồn tại thì tạo đường dẫn đó
                        }
                        move_uploaded_file($_FILES['files']['tmp_name'][$i], $upload_dir . $image); //đẩy ảnh vào folder đã tạo
                        $arr_com_pic[] = "/pictures/ungvien/" . $image;
                    }
                }
                $arr_com_pic = implode(';', $arr_com_pic);
                // thêm ảnh mới và ảnh cũ vẫn còn
                if ($cou_file > 0 && $cou_dang > 0) {
                    $anh_dd1 = explode(',', $anh_dd);
                    $anh_dd1 = implode(';', $anh_dd1);
                    $arr_com_pic = $arr_com_pic . ';' . $anh_dd1;
                }
                // không thêm ảnh mới và ảnh cũ vẫn còn
                else if ($cou_file == 0 && $cou_dang > 0) {
                    $anh_dd1 = explode(',', $anh_dd);
                    $anh_dd1 = implode(';', $anh_dd1);
                    $arr_com_pic =  $anh_dd1;
                }
                // thêm ảnh mới và xóa ảnh cũ đi
                else if ($cou_file > 0 && $cou_dang == 0) {
                    $arr_com_pic = $arr_com_pic;
                }
            }
            // update new
            $db_qr = new db_query("UPDATE new SET new_title ='" . $vitri_td . "',new_city='" . $tinhthanh_lv . "',quan_huyen='" . $quanhuyen_lv . "',
                                dia_chi='" . $td_diachi_lamviec . "',new_ctiet_dmuc='" . $detail_job . "',new_money='" . $moneymin . "',gia_kt='" . $moneymax . "',
                                new_image='" . $arr_com_pic . "',new_update_time='" . $time . "',new_name='" . $ten_cty . "',new_address='" . $td_diachi . "',
                                phuong_xa='" . $phuongxa_lv . "',new_sonha='" . $sonha_lv . "',new_unit='" . $salary_unit . "', new_phone = '" . $sdt_lhe . "',
                                new_email = '" . $email_lhe . "' WHERE new_id = '" . $new_id . "'");
            // check new_description
            $query = new db_query("SELECT new_id FROM new_description WHERE new_id = $new_id");
            if (mysql_num_rows($query->result) > 0) {
                // update new_description
                $db_qr = new db_query("UPDATE new_description SET new_job_type='" . $nganhnghe . "',new_job_kind='" . $work_type . "',new_level='" . $bangcap . "',new_exp='" . $kinhnghiem . "',new_skill='" . $chungchi . "',han_su_dung='" . strtotime($hannop) . "',new_description='" . $mota . "',new_quantity='" . $quantity . "',com_city='" . $tinhthanh . "',com_district='" . $quanhuyen . "',com_ward='" . $phuongxa . "',com_address_num='" . $sonha . "',gioi_tinh='" . $gioitinh . "',new_pay_by='" . $salary_type . "',com_logo='" . $logo . "',new_min_age='" . $minAge . "',new_max_age='" . $maxAge . "' WHERE new_id = '" . $new_id . "'");
            } else {
                // insert into new_description
                $db_qr = new db_query("INSERT INTO new_description (new_id,        new_job_type,   new_job_kind,       new_level,      new_exp,        new_skill,         han_su_dung,    new_description,new_quantity,       com_city,       com_district,   com_ward,   com_address_num,    gioi_tinh,    new_pay_by,     com_logo,   new_min_age,  new_max_age)
                                                            VALUES ('" . $new_id . "','" . $nganhnghe . "','" . $work_type . "','" . $bangcap . "','" . $kinhnghiem . "','" . $chungchi . "','" . strtotime($hannop) . "','" . $mota . "','" . $quantity . "','" . $tinhthanh . "','" . $quanhuyen . "','" . $phuongxa . "','" . $sonha . "','" . $gioitinh . "','" . $salary_type . "','" . $logo . "','" . $minAge . "','" . $maxAge . "')");
            }
            echo json_encode(['result' => true, 'msg' => 'Chỉnh sửa tin thành công']);
        } else {
            $homnay = strtotime(date('Y-m-d', time()));
            $ngay_mai = $homnay + (24 * 3600);
            $check_dt = new db_query("SELECT COUNT(`new_id`) AS dh_nay FROM `new` WHERE `new_create_time` > $homnay AND `new_create_time` < $ngay_mai
                        AND `new_user_id` = '" . $_COOKIE['UID'] . "' ");
            $dtin_hnay = mysql_fetch_assoc($check_dt->result)['dh_nay'];
            if ($dtin_hnay > 24) {
                echo json_encode(['result' => false, 'msg' => 'Bạn đã đăng 24 tin trong ngày. Ngày mai bạn hãy quay lại đăng tiếp tin nhé.']);
            } else {
                $tgian_tiep = new db_query("SELECT `new_create_time` FROM `new` WHERE `new_user_id` = '" . $_COOKIE['UID'] . "' ORDER BY `new_id` DESC LIMIT 1 ");
                $tieptuc_dt = mysql_fetch_assoc($tgian_tiep->result)['new_create_time'];
                if ((time() - $tieptuc_dt) > 600) {
                    // thêm tin
                    // logo công ty
                    $logo = '';
                    // if (isset($_FILES['logo'])) {
                    //     //Tạo đường dẫn
                    //     $logo_dir = "../pictures/ungvien/";
                    //     // check đuôi file
                    //     $img_ext = strtolower(end(explode('.', $_FILES['logo']['name'])));
                    //     //Check size ảnh
                    //     if (in_array($img_ext, $allowImage) == true && $_FILES['logo']['size'] <= 2100000) {
                    //         $image =   'logo-' . $time . '.' . $img_ext; // Tạo tên ảnh
                    //         if (!is_dir($logo_dir)) { // check xem đường dẫn đẩy ảnh vào tồn tại hay chưa
                    //             mkdir($logo_dir, 0777, TRUE); // Chưa tồn tại thì tạo đường dẫn đó
                    //         }
                    //         move_uploaded_file($_FILES['logo']['tmp_name'], $logo_dir . $image); //đẩy ảnh vào folder đã tạo
                    //     }
                    //     $logo = "ungvien/" . $image;
                    // }
                    // ảnh hoạt động công ty
                    $arr_com_pic = '';
                    if (count($_FILES['files']['name']) != 0) {
                        //Tạo đường dẫn
                        $upload_dir = "../pictures/ungvien/";
                        $arr_com_pic = [];
                        for ($i = 0; $i < count($_FILES['files']['name']); $i++) {
                            // check đuôi file
                            $img_ext = strtolower(end(explode('.', $_FILES['files']['name'][$i])));
                            //Check size ảnh
                            if (in_array($img_ext, $allowImage) == true && $_FILES['files']['size'][$i] <= 2100000) {
                                $image =   time() . '_' . $_FILES['files']['name'][$i]; // Tạo tên ảnh
                                if (!is_dir($upload_dir)) { // check xem đường dẫn đẩy ảnh vào tồn tại hay chưa
                                    mkdir($upload_dir, 0777, TRUE); // Chưa tồn tại thì tạo đường dẫn đó
                                }
                                move_uploaded_file($_FILES['files']['tmp_name'][$i], $upload_dir . $image); //đẩy ảnh vào folder đã tạo
                                $arr_com_pic[] = "/pictures/ungvien/" . $image;
                            }
                        }
                        $arr_com_pic = implode(';', $arr_com_pic);
                    }

                    // insert into new
                    $db_qr = new db_query("INSERT INTO new(new_cate_id,new_title,     link_title,     new_city,           quan_huyen,         dia_chi,                new_ctiet_dmuc,     new_money,      gia_kt,         new_image,          new_type, new_user_id, new_create_time,new_update_time,new_name,new_address,    phuong_xa,          new_sonha,      new_unit, new_buy_sell,new_active, new_phone, new_email)
                                                VALUES (120,'" . $vitri_td . "','" . $alias . "','" . $tinhthanh_lv . "','" . $quanhuyen_lv . "','" . $td_diachi_lamviec . "','" . $detail_job . "','" . $moneymin . "','" . $moneymax . "','" . $arr_com_pic . "','" . $new_type . "','" . $userid . "','" . $time . "','" . $time . "','" . $ten_cty . "','" . $td_diachi . "','" . $phuongxa_lv . "','" . $sonha_lv . "','" . $salary_unit . "',2,1,'$sdt_lhe','$email_lhe')");
                    $insert_id = new db_query("SELECT LAST_INSERT_ID() AS id");
                    $insert_id = mysql_fetch_assoc($insert_id->result)['id'];
                    // insert into new_description
                    $db_qr = new db_query("INSERT INTO new_description (new_id,        new_job_type,   new_job_kind,       new_level,      new_exp,        new_skill,         han_su_dung,    new_description,new_quantity,       com_city,       com_district,   com_ward,   com_address_num,    gioi_tinh,        new_pay_by,     com_logo, new_min_age, new_max_age, ky_nang, quyen_loi)
                                                        VALUES ('" . $insert_id . "','" . $nganhnghe . "','" . $work_type . "','" . $bangcap . "','" . $kinhnghiem . "','" . $chungchi . "','" . strtotime($hannop) . "','" . $mota . "','" . $quantity . "','" . $tinhthanh . "','" . $quanhuyen . "','" . $phuongxa . "','" . $sonha . "','" . $gioitinh . "','" . $salary_type . "','" . $logo . "','" . $minAge . "','" . $maxAge . "','".$ky_nang."','".$quyen_loi."')");
                    echo json_encode(['result' => true, 'msg' => 'Thêm tin thành công']);

                    // fastcgi_finish_request();
                    // $tt_crea = 'Tìm ứng viên';
                    // $send_chat = new SendMess($email_lhe, $chat365_id, $sdt_lhe, $user_name, 0);
                    // $send_chat->createNew($tt_crea);


                    // $arr_newcate_id = array(
                    //     'new_job_type' => $nganhnghe,
                    //     'new_job_kind' => $work_type,
                    //     'new_level' => $bangcap,
                    //     'new_exp' => $kinhnghiem,
                    //     'new_skill' => $chungchi,
                    //     'han_su_dung' => strtotime($hannop),
                    //     'new_quantity' => $quantity,
                    //     'gioi_tinh' => $gioitinh,
                    //     'new_pay_by' => $salary_type,
                    // );
                    // $cat_parent_id = $db_cat[$id_dm]['cat_parent_id'];
                    // create_new_api($id_dm, $insert_id, $vitri_td, $moneymin, $moneymax, $salary_unit, 0, $arr_newcate_id, $cat_parent_id, $userid, $tinhthanh_lv, $quanhuyen_lv, $phuongxa_lv, $time, $detail_job, $mo_ta, $td_diachi_lamviec, $td_diachi);

                } else {
                    echo json_encode(['result' => false, 'msg' => 'Sau 10 phút bạn hãy đăng tin tiếp theo nhé']);
                }
            }
        }
    }
}
