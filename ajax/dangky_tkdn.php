<?
include("config.php");

$email_user = getValue('email', 'str', 'POST', '');
$email_user = sql_injection_rp(replaceMQ($email_user));

$password = getValue('password', 'str', 'POST', '');
$password = sql_injection_rp(replaceMQ($password));

$time = strtotime(date('Y-m-d H:i:s', time()));

$name_user = getValue('name_user', 'str', 'POST', '');
$name_user = strip_tags($name_user, '');
$name_user = sql_injection_rp(replaceMQ($name_user));
// echo $name_user;
// die;

$Phone = getValue('Phone', 'str', 'POST', '');
$Phone = sql_injection_rp(replaceMQ($Phone));

$type = 5; //Tài khoản doanh nghiệp

// $regex_email = ("/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/");

$regex_email = ("/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/");
$regex_sdt = ("/^(032|033|034|035|036|037|038|039|086|096|097|098|081|082|083|084|085|088|091|094|056|058|092|070|076|077|078|079|089|090|093|099|059)+([0-9]{7})$/");

if ($Phone != '' && $password != '' && $name_user != '') {
    if (preg_match($regex_email, $Phone) == true || preg_match($regex_sdt, $Phone) == true) {
        if (preg_match($regex_sdt, $Phone) == true) {
            $query_check = new db_query("SELECT `usc_id` FROM `user` WHERE usc_phone = '$Phone' ");
            if (mysql_num_rows($query_check->result) > 0) {
                $loi_dky = "Số điện thoại của bạn đã được đăng kí. Vui lòng nhập số số điện thoại khác!";
                $inse_loi = new db_query("INSERT INTO `loi_dangky`(`id`, `so_dthoai`, `email`, `ho_ten`, `mat_khau`, `tgian_dky`, `loi_dky`)
                                    VALUES ('','$Phone','$email_user','$name_user','$password','$time','$loi_dky')");
                $data = array(
                    'result' => false,
                    'error' => '1',
                    'msg' => 'Số điện thoại đã được đăng kí',
                );
            } else {
                $password1 = md5($password . "raonhanh365");
                $query_tkdn = new db_query("INSERT INTO `user`(`usc_id`, `usc_name`, `usc_pass`, `usc_phone`, `usc_authentic`, `email_ht`, `usc_type`, `usc_time`,
                                            `usc_update_time`, `usc_store_name`) VALUES ('','$name_user','$password1','$Phone',1,'$email_user','$type','$time','',
                                            '$name_user')");

                $id_dn = new db_query("SELECT LAST_INSERT_ID() AS id");
                $id = mysql_fetch_assoc($id_dn->result)['id'];
                // đồng bộ id chat vào raonhanh365
                $data_rp = get_id_chat365($Phone, $name_user, md5($password));
                // lưu giá trị đồng bộ chat
                $str_chat = 'id=' . encrypt_decrypt($row_u['chat365_id'], 'encrypt') . '&pass=' . md5($password) . '&from=raonhanh365.vn';
                $id_chat = $data_rp['data']['userId'];
                if ($data_rp['data']['secretCode'] == '') {
                    $update = new db_query("UPDATE user SET `chat365_id` = " . $data_rp['data']['userId'] . " WHERE `usc_id`='" . $id . "'");
                } else {
                    $update = new db_query("UPDATE user SET `chat365_id` = " . $data_rp['data']['userId'] . ", `chat365_secret` = '" . $data_rp['data']['secretCode'] . "' WHERE `usc_id` ='" . $id . "'");
                };
                setcookie('UT', $type, time() + 24 * 3600, '/');
                setcookie('UID', $id, time() + 24 * 3600, '/');
                setcookie('PHPSESPASS', $password1, time() + 24 * 3600, '/');

                setcookie('chat365', $str_chat, time() + 24 * 3600, '/');
                setcookie('id_chat365', $id_chat, time() + 24 * 3600, '/');

                $data = array(
                    'result' => true,
                    'error' => null,
                    'msg' => null,
                );
            }
        } else if (preg_match($regex_email, $Phone) == true) {
            $query_check = new db_query("SELECT `usc_id` FROM `user` WHERE usc_email = '$Phone' ");
            if (mysql_num_rows($query_check->result) > 0) {
                $loi_dky = "Email của bạn đã được đăng kí.";
                $inse_loi = new db_query("INSERT INTO `loi_dangky`(`id`, `so_dthoai`, `email`, `ho_ten`, `mat_khau`, `tgian_dky`, `loi_dky`)
                                    VALUES ('','$Phone','$email_user','$name_user','$password','$time','$loi_dky')");
                $data = array(
                    'result' => false,
                    'error' => '1',
                    'msg' => 'Email của bạn đã được đăng kí. Vui lòng nhập số email khác!',
                );
            } else {
                $password1 = md5($password . "raonhanh365");
                $query_tkdn = new db_query("INSERT INTO `user`(`usc_id`, `usc_name`, `usc_pass`, `usc_email`, `usc_authentic`, `email_ht`, `usc_type`, `usc_time`,
                                            `usc_update_time`, `usc_store_name`) VALUES ('','$name_user','$password1','$Phone',1,'$email_user','$type','$time','',
                                            '$name_user')");

                $id_dn = new db_query("SELECT LAST_INSERT_ID() AS id");
                $id = mysql_fetch_assoc($id_dn->result)['id'];
                // đồng bộ id chat vào raonhanh365
                $data_rp = get_id_chat365($Phone, $name_user, md5($password));
                // lưu giá trị đồng bộ chat
                $str_chat = 'id=' . encrypt_decrypt($row_u['chat365_id'], 'encrypt') . '&pass=' . md5($password) . '&from=raonhanh365.vn';
                $id_chat = $data_rp['data']['userId'];
                if ($data_rp['data']['secretCode'] == '') {
                    $update = new db_query("UPDATE user SET `chat365_id` = " . $data_rp['data']['userId'] . " WHERE `usc_id`='" . $id . "'");
                } else {
                    $update = new db_query("UPDATE user SET `chat365_id` = " . $data_rp['data']['userId'] . ", `chat365_secret` = '" . $data_rp['data']['secretCode'] . "' WHERE `usc_id` ='" . $id . "'");
                };
                setcookie('UT', $type, time() + 24 * 3600, '/');
                setcookie('UID', $id, time() + 24 * 3600, '/');
                setcookie('PHPSESPASS', $password1, time() + 24 * 3600, '/');

                setcookie('chat365', $str_chat, time() + 24 * 3600, '/');
                setcookie('id_chat365', $id_chat, time() + 24 * 3600, '/');

                $data = array(
                    'result' => true,
                    'error' => null,
                    'msg' => null,
                );
            }
        }
    } else if (preg_match($regex_email, $Phone) == false && preg_match($regex_sdt, $Phone) == false) {
        $loi_dky = "Không đúng định dạng";
        $inse_loi = new db_query("INSERT INTO `loi_dangky`(`id`, `so_dthoai`, `email`, `ho_ten`, `mat_khau`, `tgian_dky`, `loi_dky`)
                                    VALUES ('','$Phone','$email_user','$name_user','$password','$time','$loi_dky')");
        $data = array(
            'result' => false,
            'error' => '1',
            'msg' => 'Không đúng định dạng',
        );
    }
} else {
    $loi_dky = "Thông tin không đấy đủ";
    $inse_loi = new db_query("INSERT INTO `loi_dangky`(`id`, `so_dthoai`, `email`, `ho_ten`, `mat_khau`, `tgian_dky`, `loi_dky`)
                                    VALUES ('','$Phone','$email_user','$name_user','$password','$time','$loi_dky')");
    $data = array(
        'result' => false,
        'error' => '3',
        'msg' => "Thông tin không đấy đủ",
    );
}
echo json_encode($data, true);
