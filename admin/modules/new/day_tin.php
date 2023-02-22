<?
require_once("../../../classes/database.php");
require_once("../../../functions/functions.php");
$new_id = getValue('new_id', 'int', 'POST', 0);
$us_id = getValue('us_id', 'int', 'POST', 0);
if ($new_id != 0 && $us_id != 0) {
    $check_tt = new db_query("SELECT `new_id`, `new_title`, `new_day_tin` FROM `new` WHERE `new_active` = 1 AND `new_id` = '" . $new_id . "' AND `new_user_id` = '" . $us_id . "' ");
    if (mysql_num_rows($check_tt->result) > 0) {
        $row_newt = mysql_fetch_assoc($check_tt -> result);
        $new_day_tin = $row_newt['new_day_tin'];
        if($new_day_tin != ""){
            $data = array(
                'result' => false,
                'msg' => 'Tin đăng đã đẩy tin',
            );
        }else{
            $check_tk = new db_query("SELECT `usc_id`,`usc_pass`, `usc_type` FROM `user` WHERE `usc_id` = '" . $us_id . "' AND `usc_authentic` = 1 ");
            if (mysql_num_rows($check_tk->result) > 0) {
                $row_tk = mysql_fetch_assoc($check_tk->result);
                setcookie('UT', $row_tk['usc_type'], time() + 24 * 3600, '/');
                setcookie('UID', $row_tk['usc_id'], time() + 24 * 3600, '/');
                setcookie('PHPSESPASS', $row_tk['usc_pass'], time() + 24 * 3600, '/');
                $link = '/day-tin-' . $row_newt['new_id'] . '.html';
                $data = array(
                    'result' => true,
                    'data' => $link,
                );
            } else {
                $data = array(
                    'result' => false,
                    'msg' => 'Không tồn tại tài khoản',
                );
            }
        }
    }else{
        $data = array(
            'result' => false,
            'msg' => 'Thông tin không chính xác',
        );
    }
}else{
    $data = array(
        'result' => false,
        'msg' => 'Thông tin không đầy đủ',
    );
}

echo json_encode($data, true);
