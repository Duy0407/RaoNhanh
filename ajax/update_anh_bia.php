<?php
   include("config.php");
   include("../classes/resize-class.php");

   $userid  = getValue("user_id",'str',"POST",0);
   if ($userid >0) {
      $background = $_FILES['background'];
         // $urlimg='';
            //  $userid = $_COOKIE["UID"];
            $dir = getimageuv(time());
            
            if($background['type'] == 'image/png')
               {  $bg = 'avatar'.$userid.".png"; }
            if($background['type'] == 'image/jpeg')
               {  $bg = 'avatar'.$userid.".jpg"; }
            if($background['type'] == 'image/gif')
               {  $bg = 'avatar'.$userid.".gif"; }
            file_put_contents($dir.$bg, file_get_contents($background['tmp_name']));  
            var_dump($bg);
            
            $resizeObj = new resize($dir.$bg);
            $resizeObj -> resizeImage(177, 130, 'auto');
            $resizeObj -> saveImage($dir.$bg, 100);
            $db_exx = new db_query("UPDATE user SET usc_anhbia = '".$dir.$bg."' WHERE usc_id = ".$userid);
            
   }
?>