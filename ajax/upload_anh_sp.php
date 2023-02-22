<?php
include("config.php");
include("../classes/resize-class.php");
session_start();
 $output = '';  
 $arrayanh = reArrayFiles($_FILES['images']);
   $createtime = time();
   if(count($arrayanh) > 0)
   { 
     $data = array();
      $timeimage = time();
      $month  = date('m',$timeimage);
      $year   = date('Y',$timeimage);
      $day    = date('d',$timeimage);
      $rand   = rand_string(10);
      $dir        = "../pictures/fullsize/".$year."/".$month."/".$day."/";  //Full Path
      $dirdt      = "../pictures/detail/".$year."/".$month."/".$day."/";  //Full Path
      $diris      = "/pictures/fullsize/".$year."/".$month."/".$day."/";
      $dirisdt     = "/pictures/detail/".$year."/".$month."/".$day."/";
      is_dir($dir) || @mkdir($dir,0777,true) || die("Can't Create folder");
      is_dir($dirdt) || @mkdir($dirdt,0777,true) || die("Can't Create folder");

      $allowUpload['size'] = $allowUpload['extension'] = $allowUpload['listSize']= true;

      foreach($_FILES['images']['name'] as $name => $data_img)  
      {  
           list($width, $height) = getimagesize($_FILES['images']['tmp_name'][$name]);
           $file_name = explode(".", $_FILES['images']['name'][$name]);
          $size = $_FILES['images']['size'][$name];
           $allowed_extension = array("jpg", "jpeg", "png", "gif", "JPG", "JPEG", "PNG", "GIF");  
           if(!in_array($file_name[1], $allowed_extension))  
           {
               $allowUpload['extension'] = false;
           }
           if($size == 0 || $size > 2000000){
               $allowUpload['size'] = false;
           }
           if($width < 300 || $height < 300){
               $allowUpload['listSize'] = false;
           }
      }
      
      if($allowUpload['size'] == true && $allowUpload['extension'] == true && $allowUpload['listSize'] == true){
          foreach($_FILES['images']['name'] as $name => $data_img)  
          {
               $file_name = explode(".", $_FILES['images']['name'][$name]);
               
               $allowed_extension = array("jpg", "jpeg", "png", "gif", "JPG", "JPEG", "PNG", "GIF");  
               if(in_array($file_name[1], $allowed_extension) && $_FILES['images']['size'][$name] < 2000000)  
               {
                    $new_name = rand(0,100000000000000000000) . '.'. $file_name[1];  
                    file_put_contents($dir.$new_name,file_get_contents($_FILES["images"]["tmp_name"][$name]));
                    $resizeObj = new resize($dir.$new_name);
                    $resizeObj -> resizeImage(468, 345, 'default');
                    $resizeObj -> saveImage($dirdt.$new_name, 100);       
                    //resize_image($dir,$nameimg, 468, 345, 100,"",$dirdt); 
                    $data[] = $dirisdt.$new_name; 
               }
          }
          $img = implode(";",$data);
          if(!(isset($_SESSION['data_img']))){
               $_SESSION['data_img'] = $img;
          }else{
               if($_SESSION['data_img'] == ''){
               $_SESSION['data_img'] = $img; 
               }else{
               $_SESSION['data_img'] = $_SESSION['data_img'].";".$img; 
               }
          }
     //      $images = glob("uploads/*.*"); 
          $ads = explode(';',$_SESSION['data_img']);
          foreach($ads as $image)  
          {  
               $output .= '<div class="imgdiv"><img class="upload" src="'.$image.'"><button class="removal-button removal-button_1" data-uploadid=""></button></div>';  
          }
          $data = [
               'result' => true,
               'output' => $output
          ];
      }else{
           $data = [
                'result' => false
           ];
           if($allowUpload['size'] == false){
               $data['msg'][] = [
                    'Dung lượng ảnh vượt quá yêu cầu cho phép, vui lòng tải lại !!!'
               ];
           }
           if($allowUpload['extension'] == false){
               $data['msg'][] = [
                'Định dạng ảnh tại lên không đúng, vui lòng kiểm tra lại !!!'
               ];
           }
           if($allowUpload['listSize'] == false){
               $data['msg'][] = [
                'Kích thước hình ảnh tải lên ko đạt yêu cầu, vui lòng kiểm tra lại !!!'
               ];
           }
      }
        
      echo json_encode($data);  
 }  
?>