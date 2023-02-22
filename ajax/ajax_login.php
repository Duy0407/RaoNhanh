<?
include("config.php");
$userType = getValue("userType", "int", "POST", 0);
$email = getValue("email", "str", "POST", "");
$password = getValue("password", "str", "POST", "");
$password = trim($password);
$password = $passSyn = replaceMQ($password);
$email = trim($email);
$email = replaceMQ($email);
// Regex check định dạng email
$regex = ("/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/");
if ($userType != 0 && $email != '' && $password != '') {
    $password_md5 = md5($password."raonhanh365");
    // Kiểm tra xem tài khoản nhập vào là email hay tên đăng nhập
    if (preg_match($regex, $email)) {
        $db_qr = new db_query("SELECT usc_id FROM user WHERE usc_email = '" . $email . "' AND usc_pass = '" . $password_md5 . "' AND usc_type = '$userType'");
    } else {
        $db_qr = new db_query("SELECT usc_id FROM user WHERE usc_account = '" . $email . "' AND usc_pass = '" . $password_md5 . "' AND usc_type = '$userType'");
    }
    if(mysql_num_rows($db_qr->result) > 0){
        $row_u = mysql_fetch_assoc($db_qr->result);
        $id_user = $row_u['usc_id'];
        setcookie('UT', $userType, time() + 24 * 3600, '/');
        setcookie('UID', $id_user, time() + 24 * 3600, '/');
        setcookie('PHPSESPASS', $password_md5, time() + 24 * 3600, '/');
        $data = [
            'result'=>true,
            'type'=>1,
            'message'=>'Đăng nhập tài khoản thành công',
        ];
    }else{
        $data = [
            'result'=>false,
            'type'=>1,
            'message'=>'Tài khoản hoặc mật khẩu không đúng',
        ];
    }
}else {
    $data = [
        'result'=>false,
        'type'=>2,
        'message'=>'Có lỗi xảy ra',
    ];
}
echo json_encode($data, JSON_UNESCAPED_UNICODE);
?>