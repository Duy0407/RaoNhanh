<?
include("../home/config.php");
$currentPass = getValue('currentPass', 'str', 'POST', '');
$currentPass = trim($currentPass);
$currentPass = md5($currentPass . "raonhanh365");
$type = getValue('type', 'str', 'POST', '');
$type = trim($type);
if ($currentPass != '' && $type != '') {
    $id = $_COOKIE['UID'];
    $checkPass = new db_query("SELECT COUNT(*) as total FROM user WHERE usc_pass = '$currentPass' AND usc_id = '$id'");
    $data = mysql_fetch_assoc($checkPass->result);
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