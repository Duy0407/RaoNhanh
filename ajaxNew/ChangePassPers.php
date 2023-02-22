<?
include("../home/config.php");
$currentPass = getValue('currentPass','str','POST','');
$currentPass = md5($currentPass . "raonhanh365");
$password = getValue('password','str','POST','');
$password = md5($password . "raonhanh365");
$rePass = getValue('repassword','str','POST','');
$password = md5($rePass . "raonhanh365");
$captcha = getValue('captcha','int','POST',0);
$id = $_COOKIE['UID'];
$data = [
    'result' => false,
    'message' => 'Thay đổi mật khẩu thất bại !',
    'data' => null,
];

if($currentPass != '' && $password != '' && $rePass != '' && $captcha != '' && $password != $rePass){
    $checkPass = new db_query("SELECT * FROM user WHERE usc_pass = '$currentPass' AND usc_id = '$id'");
    if(mysql_num_rows($checkPass->result) != 0){
        $sql = "UPDATE user SET usc_pass = '$password' WHERE usc_id = '$id'";
        $update_pass = new db_query($sql);
    }
    $data = [
        'result' => true,
        'message' => 'Thay đổi mật khẩu thành công',
        'data' => [
            'id' => $id,
            'userType' => 1,
        ],
    ];
}
echo json_encode($data);

