<?
require_once("../functions/functions.php"); 
require_once("../classes/database.php");
require_once("../classes/resize-class.php");
if(isset($_FILES) and $_SERVER['REQUEST_METHOD'] == "POST"){
   $userid = $_COOKIE["UID"];
   $userid = (int)$userid;
   $db_qrcheck = new db_query("SELECT usc_id,usc_time,usc_logo FROM user WHERE usc_id = '".$userid."' LIMIT 1");
   if(mysql_num_rows($db_qrcheck->result) > 0)
   {
      $row = mysql_fetch_assoc($db_qrcheck->result);
      $dir = getimageuv($row['usc_time']);
      if($_FILES['file']['type'] == 'image/png')
      {
         $name = 'avatar'.$userid.".png";
      }
      if($_FILES['file']['type'] == 'image/jpeg')
      {
         $name = 'avatar'.$userid.".jpg";
      }
      if($_FILES['file']['type'] == 'image/gif')
      {
         $name = 'avatar'.$userid.".gif";
      }
      file_put_contents($dir.$name, file_get_contents($_FILES['file']['tmp_name']));  
      $resizeObj = new resize($dir.$name);
      $resizeObj -> resizeImage(130, 180, 'auto');
      $resizeObj -> saveImage($dir.$name, 100);
      $db_exx = new db_execute("UPDATE user SET usc_logo = '".$dir.$name."' WHERE usc_id = ".$userid);
   }
   unset($userid,$userpass,$db_qrcheck,$row,$dir,$name,$db_exx);
}
?>