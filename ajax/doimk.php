<?
include("config.php");
$user = getValue("user","str","POST","");
$user = trim($user);
$user = replaceMQ($user);
$pass = getValue("pass","str","POST","");
$pass = trim($pass);
$pass = replaceMQ($pass);
$pass = md5($pass."raonhanh365");
$passnew = getValue("passnew","str","POST","");
$passnew = trim($passnew);
$passnew = replaceMQ($passnew);
$passnew = md5($passnew."raonhanh365");
if($user != '' && $pass != '' && $passnew != '')
{
   $db_qr = new db_query("SELECT COUNT(*) as total FROM user WHERE usc_account = '".$user."' AND usc_pass = '".$pass."'");
   $data  = mysql_fetch_assoc($db_qr->result);
   if($data['total'] == 0)
   {
      echo 0;
   }
   else
   {
      echo 1;
   }
}
else
{
   redirect('https://google.com.vn');
}
?>