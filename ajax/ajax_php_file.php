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
if (isset($_FILES["file"]["type"])) {
	$validextensions = array("jpeg", "jpg", "png","JPG","PNG","JPEG");
	$temporary = explode(".", $_FILES["file"]["name"]);
	$file_extension = end($temporary);
	if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
	) && ($_FILES["file"]["size"] < 250000) //Approx. 100kb files can be uploaded. for validation
		 && in_array($file_extension, $validextensions)) {
		if ($_FILES["file"]["error"] > 0) {
                    echo 0;
		} else {
			if (file_exists("../upload/" . $_FILES["file"]["name"])) {
				echo 0;
			} else {
                                $dir = getime(time());
				$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
				$targetPath = $dir.$userid.$_FILES['file']['name']; // Target path where file is to be stored
				move_uploaded_file($sourcePath, $targetPath); // Moving Uploaded file
				$dir = str_replace('../pictures', '/pictures', $dir);
				// replace $host,$username,$password,$dbname with real info
                                $data = new db_execute ("UPDATE user SET usc_logo ='".$dir.$userid.$_FILES['file']['name']."' WHERE usc_id ='".$userid."'" );
                                echo 1;
			}
		}
	} else {
            echo 0;
	}
}
?>
