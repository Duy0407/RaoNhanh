<?
include("config.php");
$type = getValue('type', 'int', 'POST', 0);
$user = getValue('phone', 'str', 'POST', '');
$pass = getValue('pass', 'str', 'POST', '');

// $regex = ("/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/");
$regex_email = ("/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/");
$regex_sdt = ("/^(032|033|034|035|036|037|038|039|086|096|097|098|081|082|083|084|085|088|091|094|056|058|092|070|076|077|078|079|089|090|093|099|059)+([0-9]{7})$/");


if ($user != "" && $pass != "" && $type != 0) {
    $pass_md5 = md5($pass . "raonhanh365");
    if (preg_match($regex_sdt, $user)) {
        $db_qr = new db_query("SELECT * FROM user WHERE usc_phone = '" . $user . "' AND usc_pass = '" . $pass_md5 . "' AND usc_type = '$type'");
    } else if (preg_match($regex_email, $user)) {
        $db_qr = new db_query("SELECT * FROM user WHERE usc_email = '" . $user . "' AND usc_pass = '" . $pass_md5 . "' AND usc_type = '$type'");
    } else {
        $db_qr = new db_query("SELECT * FROM user WHERE usc_account = '" . $user . "' AND usc_pass = '" . $pass_md5 . "' AND usc_type = '$type' ");
    };

    if (mysql_num_rows($db_qr->result) > 0) {
        $row_u = mysql_fetch_assoc($db_qr->result);
        $id_user = $row_u['usc_id'];

        if ($row_u['chat365_id'] == 0 && $row_u['usc_authentic'] == 1) {
            // check và đẩy tài khoản sang chat365
            $row_u_rp = get_id_chat365($row_u['usc_phone'], $row_u['usc_name'], md5($pass));

            // lưu giá trị đồng bộ chat
            $str_chat = 'id=' . encrypt_decrypt($row_u_rp['data']['userId'], 'encrypt') . '&pass=' . md5($pass) . '&from=raonhanh365.vn';

            if ($row_u_rp['data']['secretCode'] == '') {
                $update = new db_query("UPDATE user SET chat365_id = " . $row_u_rp['data']['userId'] . " WHERE usc_id='" . $row_u['usc_id'] . "'");
            } else {
                $update = new db_query("UPDATE user SET chat365_id = " . $row_u_rp['data']['userId'] . ", chat365_secret = '" . $row_u_rp['data']['secretCode'] . "' WHERE usc_id='" . $row_u['usc_id'] . "'");
            }
        } else {
            if ($row_u['chat365_secret'] != '') {
                $str_chat = 'id=' . encrypt_decrypt($row_u['chat365_id'], 'encrypt') . '&pass=' . md5($pass) . '&sc=' . $row_u['chat365_secret'] . '&from=raonhanh365.vn';
            } else {
                $str_chat = 'id=' . encrypt_decrypt($row_u['chat365_id'], 'encrypt') . '&pass=' . md5($pass) . '&from=raonhanh365.vn';
            }
        }

        $id_chat = (@$row_u['chat365_id'] != 0) ? $row_u['chat365_id'] : @$row_u_rp['data']['userId'];


        setcookie('UT', $type, time() + 24 * 3600 * 7, '/');
        setcookie('UID', $id_user, time() + 24 * 3600 * 7, '/');
        setcookie('PHPSESPASS', $pass_md5, time() + 24 * 3600 * 7, '/');
        setcookie('IFR', 1, time() + 60, '/');
        if ($row_u['usc_authentic'] == 1) {
            setcookie('chat365', $str_chat, time() + 24 * 3600 * 7, '/');
            setcookie('id_chat365', $id_chat, time() + 24 * 3600 * 7, '/');
        };

        $data = array(
            'result' => true,
            'msg' => null,
            'data' => 0,
        );
    } else {
        if (preg_match($regex_sdt, $user)) {
            $db_qr1 = new db_query("SELECT * FROM user WHERE usc_phone = '" . $user . "' AND usc_pass = '" . $pass_md5 . "' ");
        } else if (preg_match($regex_email, $user)) {
            $db_qr1 = new db_query("SELECT * FROM user WHERE usc_email = '" . $user . "' AND usc_pass = '" . $pass_md5 . "' ");
        } else {
            $db_qr1 = new db_query("SELECT * FROM user WHERE usc_account = '" . $user . "' AND usc_pass = '" . $pass_md5 . "'  ");
        };
        if (mysql_num_rows($db_qr1->result) > 0) {
            $row_dn = mysql_fetch_assoc($db_qr1->result);
            $us_type = $row_dn['usc_type'];
            if ($us_type == 1) {
                $data = array(
                    'result' => true,
                    'msg' => null,
                    'data' => 1,
                );
            } else if ($us_type == 5) {
                $data = array(
                    'result' => true,
                    'msg' => null,
                    'data' => 5,
                );
            }
        } else {
            $data = array(
                'result' => false,
                'msg' => "Số điện thoại (email hoặc tên đăng nhập) hoặc mật khẩu không đúng",
                'data' => null,
            );
        }
    }
} else {
    $data = array(
        'result' => false,
        'msg' => "Thông tin không đầy đủ",
        'data' => null,
    );
}

echo json_encode($data, true);
