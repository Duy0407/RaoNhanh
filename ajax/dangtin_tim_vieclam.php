<?
include("config.php");
if (isset($_COOKIE['UID'])) {
    $userid   = $_COOKIE['UID'];
    $new_type = $_COOKIE['UT'];
    if (isset($_POST["title"])) {
        $new_id = getValue('new_id', 'str', 'POST', 0);
        $title = getValue('title', 'str', 'POST', '');
        $alias = replaceTitle($title);
        $nganhnghe = getValue('nganh_nghe', 'str', 'POST', '');
        $work_type = getValue('hinh_thuclv', 'str', 'POST', '');
        // địa chỉ làm việc
        $td_diachi_lamviec = getValue('diachi_lv', 'str', 'POST', '');
        $tinhthanh_lv = getValue('tinh_thanh', 'str', 'POST', '');
        $quanhuyen_lv = getValue('quan_huyen', 'str', 'POST', '');
        $phuongxa_lv = getValue('phuong_xa', 'str', 'POST', '');
        $sonha_lv = getValue('so_nha', 'str', 'POST', '');
        // mức lương
        $moneymin = getValue('salary_fr', 'str', 'POST', '');
        $moneymin = str_replace(',', '', $moneymin);

        $moneymax = getValue('salary_to', 'str', 'POST', '');
        $moneymax = str_replace(',', '', $moneymax);

        $salary_type = getValue('hinhthuc_trl', 'str', 'POST', '');
        $salary_unit = getValue('salary_unit', 'str', 'POST', '');

        $mota = getValue('ky_nang', 'str', 'POST', '');
        $gioitinh = getValue('gioi_tinh', 'str', 'POST', '');
        $tuoi = getValue('tuoi', 'str', 'POST', '');
        $bangcap = getValue('bang_cap', 'str', 'POST', '');
        $kinhnghiem = getValue('kinh_nghiem', 'str', 'POST', '');
        $chungchi = getValue('chung_chi', 'str', 'POST', '');
        $sdt_lhe = getValue('sdt_lhe', 'str', 'POST', '');
        $email_lhe = getValue('email_lhe', 'str', 'POST', '');

        $allowImage = array("jpeg", "jpg", "png", "gif", "svg");
        $time = time();

        if ($new_id != 0) {
            // update tin
            // ảnh
            $logo = null;
            $logo_cu = getValue('logo_cu', 'str', 'POST', '');
            if (isset($_FILES['logo'])) {
                // nếu có logo mới => update logo
                //Tạo đường dẫn
                $logo_dir = "../pictures/timviec/";
                // check đuôi file
                $img_ext = strtolower(end(explode('.', $_FILES['logo']['name'])));
                //Check size ảnh
                if (in_array($img_ext, $allowImage) == true && $_FILES['logo']['size'] <= 2100000) {
                    $image =   'job-' . $time . '.' . $img_ext; // Tạo tên ảnh
                    if (!is_dir($logo_dir)) { // check xem đường dẫn đẩy ảnh vào tồn tại hay chưa
                        mkdir($logo_dir, 0777, TRUE); // Chưa tồn tại thì tạo đường dẫn đó
                    }
                    move_uploaded_file($_FILES['logo']['tmp_name'], $logo_dir . $image); //đẩy ảnh vào folder đã tạo
                }
                $logo = "/pictures/timviec/" . $image;
            } elseif ($logo_cu == '') {
                // nếu ko có logo mới ko còn logo cũ => update logo == ''
                $logo = '';
            } else {
                // nếu ko có logo mới còn logo cũ => logo = logo_cu
                $logo = $logo_cu;
            }
            // update new
            $db_qr = new db_query("UPDATE new SET new_title ='" . $title . "',new_city='" . $tinhthanh_lv . "',quan_huyen='" . $quanhuyen_lv . "',dia_chi='" . $td_diachi_lamviec . "',new_money='" . $moneymin . "',gia_kt='" . $moneymax . "',new_image='" . $logo . "',new_update_time='" . $time . "',phuong_xa='" . $phuongxa_lv . "',new_sonha='" . $sonha_lv . "',new_unit='" . $salary_unit . "' WHERE new_id = '" . $new_id . "'");
            // check new_description
            $query = new db_query("SELECT new_id FROM new_description WHERE new_id = $new_id");
            if (mysql_num_rows($query->result) > 0) {
                // update new_description
                $db_qr = new db_query("UPDATE new_description SET new_job_type='" . $nganhnghe . "',new_job_kind='" . $work_type . "',new_level='" . $bangcap . "',new_exp='" . $kinhnghiem . "',new_skill='" . $chungchi . "',new_description='" . $mota . "',gioi_tinh='" . $gioitinh . "',new_pay_by='" . $salary_type . "',new_min_age='" . $tuoi . "' WHERE new_id = '" . $new_id . "'");
            } else {
                // insert into new_description
                $db_qr = new db_query("INSERT INTO new_description (new_job_type,   new_job_kind,       new_level,      new_exp,        new_skill,  new_description,    gioi_tinh,      new_pay_by,     new_min_age)
                                                            VALUES ('" . $nganhnghe . "','" . $work_type . "','" . $bangcap . "','" . $kinhnghiem . "','" . $chungchi . "','" . $mota . "','" . $gioitinh . "','" . $salary_type . "','" . $tuoi . "')");
            }
            echo json_encode(['result' => true, 'msg' => 'Chỉnh sửa tin thành công']);
        } else {
            $homnay = strtotime(date('Y-m-d', time()));
            $ngay_mai = $homnay + (24 * 3600);
            $check_dt = new db_query("SELECT COUNT(`new_id`) AS dh_nay FROM `new` WHERE `new_create_time` > $homnay AND `new_create_time` < $ngay_mai
                        AND `new_user_id` = '" . $_COOKIE['UID'] . "' ");
            $dtin_hnay = mysql_fetch_assoc($check_dt->result)['dh_nay'];
            if ($dtin_hnay > 24) {
                echo json_encode(['result' => true, 'msg' => 'Bạn đã đăng 24 tin trong ngày. Ngày mai bạn hãy quay lại đăng tiếp tin nhé.']);
            } else {
                $tgian_tiep = new db_query("SELECT `new_create_time` FROM `new` WHERE `new_user_id` = '" . $_COOKIE['UID'] . "' ORDER BY `new_id` DESC LIMIT 1 ");
                $tieptuc_dt = mysql_fetch_assoc($tgian_tiep->result)['new_create_time'];
                if ((time() - $tieptuc_dt) > 600) {
                    // thêm tin
                    // ảnh
                    $logo = '';
                    if (isset($_FILES['logo'])) {
                        //Tạo đường dẫn
                        $logo_dir = "../pictures/timviec/";
                        // check đuôi file
                        $img_ext = strtolower(end(explode('.', $_FILES['logo']['name'])));
                        //Check size ảnh
                        if (in_array($img_ext, $allowImage) == true && $_FILES['logo']['size'] <= 2100000) {
                            $image =   'job-' . $time . '.' . $img_ext; // Tạo tên ảnh
                            if (!is_dir($logo_dir)) { // check xem đường dẫn đẩy ảnh vào tồn tại hay chưa
                                mkdir($logo_dir, 0777, TRUE); // Chưa tồn tại thì tạo đường dẫn đó
                            }
                            move_uploaded_file($_FILES['logo']['tmp_name'], $logo_dir . $image); //đẩy ảnh vào folder đã tạo
                        }
                        $logo = "/pictures/timviec/" . $image;
                    }
                    // insert into new
                    $db_qr = new db_query("INSERT INTO new(new_cate_id,new_title,link_title,     new_city,         quan_huyen,             dia_chi,            new_money,          gia_kt,     new_image,      new_type,new_user_id,new_create_time,new_update_time,phuong_xa,         new_sonha,      new_unit, new_buy_sell,new_active)
                                                VALUES (121,'" . $title . "','" . $alias . "','" . $tinhthanh_lv . "','" . $quanhuyen_lv . "','" . $td_diachi_lamviec . "','" . $moneymin . "','" . $moneymax . "','" . $logo . "','" . $new_type . "','" . $userid . "','" . $time . "','" . $time . "','" . $phuongxa_lv . "','" . $sonha_lv . "','" . $salary_unit . "',1,1)");
                    $insert_id = new db_query("SELECT LAST_INSERT_ID() AS id");
                    $insert_id = mysql_fetch_assoc($insert_id->result)['id'];
                    // insert into new_description
                    $db_qr = new db_query("INSERT INTO new_description (new_id,        new_job_type,   new_job_kind,       new_level,      new_exp,        new_skill,  new_description,    gioi_tinh,      new_pay_by,     new_min_age)
                                                        VALUES ('" . $insert_id . "','" . $nganhnghe . "','" . $work_type . "','" . $bangcap . "','" . $kinhnghiem . "','" . $chungchi . "','" . $mota . "','" . $gioitinh . "','" . $salary_type . "','" . $tuoi . "')");

                    echo json_encode(['result' => true, 'msg' => 'Thêm tin thành công']);
                } else {
                    echo json_encode(['result' => true, 'msg' => 'Sau 10 phút bạn hãy đăng tin tiếp theo nhé']);
                }
            }
        }
    }
}
