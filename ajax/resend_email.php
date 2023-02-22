<?
include("config.php");
include('../functions/send_mail.php');

$email_user = getValue('email', 'str', 'POST', '');
$email_user = sql_injection_rp(replaceMQ($email_user));

$name_user = getValue('name_user', 'str', 'POST', '');
$name_user = sql_injection_rp(replaceMQ($name_user));

$query_check = new db_query("SELECT `usc_email` FROM `user` WHERE usc_email = '$email_user' ");
if(mysql_num_rows($query_check->result) == 1){
    $id_dn = new db_query("SELECT LAST_INSERT_ID() AS id");
    $id = mysql_fetch_assoc($id_dn->result)['id'];
    $code = md5($email_user);
    $link = "http://dev5.tinnhanh365.vn/xac-thuc-thanh-cong.html?code=" . $code . "&id=" . $id;
    SendRegisterUV($email_user, $name_user, $link);
}
?>