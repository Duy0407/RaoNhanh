<?
include("config.php");
$email = getValue("email", "str", "POST", "");
$type = getValue("type", "str", "POST", "");
$email = trim($email);
$email = replaceMQ($email);
$type = trim($type);
$type = replaceMQ($type);
if ($email != '' && $type != '') {
    $db_qr = new db_query("SELECT COUNT(*) as total FROM user WHERE usc_email = '" . $email . "' AND usc_type = '" . $type . "'");
    $data = mysql_fetch_assoc($db_qr->result);
    if ($data['total'] == 0) {
        $data = [
            'result' => false,
        ];
    } else {
        $data = [
            'result'=>true,
        ];
    }
}else{
    $data = [
        'result' => false,
    ];
}
echo json_encode($data, JSON_UNESCAPED_UNICODE);
?>