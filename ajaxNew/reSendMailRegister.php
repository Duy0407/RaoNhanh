<?
include("../home/config.php");
include("../functions/send_mail.php");

$email         = replaceMQ(trim(getValue("email","str","POST","")));
$id         = replaceMQ(getValue("id","int","POST",0));
$name      = replaceMQ(trim(getValue("name","str","POST","")));
$userType      = replaceMQ(getValue("type","int","POST",0));
$data = [
    'result'=>false,
    'message'=>'Có lỗi xảy ra',
    'data'=>null,
];
if($email != '' && $id != 0 && $name != '' && $userType != 0)
{
    $checkMail = new db_query("SELECT usc_authentic FROM user WHERE usc_id = '$id' AND usc_email = '$email' AND usc_type = '$userType'");
    if(mysql_num_rows($checkMail->result) > 0){
        $row = mysql_fetch_assoc($checkMail->result);
        if($row['usc_authentic'] == 0){
            $secu = md5($email);
            $link = $domain."/xac-thuc-tai-khoan-thanh-cong.html?code=".$secu."&id=".$id;
            if($userType == 2){
                SendRegisterByBuy($email,$name,$link);
            }else{
                SendRegisterUV($email,$name,$link);
            }
            unset($email,$lastname,$id);
            $data = [
                'result'=>true,
                'message'=>'Tài khoản của bạn đã được xác thực',
                'data'=>null,
            ];
        }else{
            $data = [
                'result'=>false,
                'message'=>'Tài khoản của bạn đã được xác thực',
                'data'=>null,
            ];
        }
    }
}
echo json_encode($data, JSON_UNESCAPED_UNICODE);
?>