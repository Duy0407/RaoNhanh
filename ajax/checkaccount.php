<?
include("config.php");
$user = getValue("user","str","POST","");
$user = trim($user);
$user = replaceMQ($user);
if($user != '')
{
   $db_qr = new db_query("SELECT COUNT(*) as total FROM user WHERE usc_account = '".$user."'");
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