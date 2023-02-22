<?
include("config.php");
session_start();
$code  = getValue("code","int","POST",0);
$code  = (int)$code;
$userid = getValue("user","int","POST",0);


if(!isset($_SESSION["code"]))
{
  $_SESSION['code'] = '';
}
if($code == 0 )
{
   echo 0;
}
else if($_SESSION['code'] == '')
{
   echo 0;
}
else if($code == $_SESSION["code"])
{
   echo 1;
 
}
else
{
   echo 0;
}
unset($code,$userid);
?>