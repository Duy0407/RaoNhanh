<?
include("config.php");
$email = getValue('email', 'str', 'POST', '');
$email = sql_injection_rp($email);
if($email != ""){
    $tgian = time();
    $ins_ttin = new db_query("INSERT INTO `nhan_ttin`(`id`, `email`, `tgian_gui`, `active`) VALUES ('','$email','$tgian','0')");

    $curl = curl_init();
    $data = array(
        'MessageType' => 'text',
        'Message' => $email,
        );
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_URL, 'http://43.239.223.142:3005/Message/RaoNhanhSendMessageToHHP');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    $response = curl_exec($curl);
    curl_close($curl);

    $data = array(
        'result' => true,
        'msg' => null,
    );
}else{
    $data = array(
        'result' => false,
        'msg' => 'Nhập địa chỉ email',
    );
}

echo json_encode($data, true);

?>