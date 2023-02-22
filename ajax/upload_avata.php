<?php
include("config.php");
if(isset($_COOKIE['UID']))
{
 $userid   = $_COOKIE['UID'];
 $userpass = $_COOKIE['PHPSESPASS'];
 $usertype = $_COOKIE['UT'];
}
function getime($timeimage)
{
   $month  = date('m',$timeimage);
   $year   = date('Y',$timeimage);
   $day    = date('d',$timeimage);
   $dir        = "../pictures/".$year."/".$month."/".$day."/"; // Full Path
    is_dir($dir) || @mkdir($dir,0777,true) || die("Can't Create folder");
   return $dir;
}

if(isset($_POST['image'])){

    $data = $_POST['image'];
    
    list($type, $data) = explode(';', $data);

    list(, $data)      = explode(',', $data);


    $data = base64_decode($data);

    $imageName = time().'.png';

    $dir = getime(time());

    file_put_contents($dir.$userid.$imageName, $data);

    $dir = str_replace('../pictures', '/pictures', $dir);
    // replace $host,$username,$password,$dbname with real info
    $data_logo = new db_query("SELECT usc_logo FROM user WHERE usc_id ='".$userid."'");
    $result_logo = mysql_fetch_assoc($data_logo->result);
    if($result_logo['usc_logo'] != ""){
        unlink("..".$result_logo['usc_logo']);
    }
    
    $data = new db_execute ("UPDATE user SET usc_logo ='".$dir.$userid.$imageName."' WHERE usc_id ='".$userid."'" );
    
    echo 1;
}

echo 2;
?>