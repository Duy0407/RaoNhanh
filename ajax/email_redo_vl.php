<?
include("../home/config_vl.php");
include("../functions/send_mail.php");

$email         = getValue("email","str","POST","");
$email         = replaceMQ($email);
$id         = getValue("id","str","POST","0");
$id         = replaceMQ($id);
$lastname      = getValue("name","str","POST","");
$lastname      = replaceMQ($lastname);

echo $email.$id.$lastname;


if($email != '' && $id != '0' && $lastname != '')
{
      $secu = md5($email);
      $link = "https://raonhanh365.vn/xac-thuc-tai-khoan-viec-lam-thanh-cong.html?code=".$secu."&id=".$id;
      SendRegisterUV($email,$lastname,$link);
      unset($email,$lastname,$id);
      echo 1;
}
else
{
  echo 0; 
}
?>