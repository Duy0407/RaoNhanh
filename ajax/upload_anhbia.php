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

if(isset($_POST['action']) && $_POST['action']=='upload'){
    $upload_url = '/uploads/';
    $upload_path = dirname(__FILE__).'/uploads/';
    // Check file type
    $validextensions = array("image/jpeg", "image/jpg", "image/png", "image/gif");
    if(!in_array($_FILES['file']['type'],$validextensions)){
        echo '_invalid_type';
        die();  
    }
    // Check file size
    if($_FILES['file']['size'] > 2000000){
        echo '_invalid_size';
        die();  
    }
    $dir = getime(time()); 
    $sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
    $targetPath = $dir.$userid.$_FILES['file']['name']; 
    if(is_uploaded_file($_FILES['file']['tmp_name'])){
        move_uploaded_file($sourcePath, $targetPath); // Moving Uploaded file
	$dir = str_replace('../pictures', '/pictures', $dir);
        $db_anhbia = new db_query("SELECT usc_anhbia FROM user WHERE usc_id ='".$userid."'");
        $item = mysql_fetch_assoc($db_anhbia->result);
        if($item != ''){
            unlink("../".$item['usc_anhbia']);
        }
        $data = new db_execute ("UPDATE user SET usc_anhbia ='".$dir.$userid.$_FILES['file']['name']."' WHERE usc_id ='".$userid."'" );
    }
    echo str_replace('../pictures', '/pictures', $targetPath);; die();
}
				