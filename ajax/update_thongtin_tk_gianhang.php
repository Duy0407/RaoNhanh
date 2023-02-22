<? 
include("config.php");
   $user_id = getValue("user_id","str","POST","");
   $user_id = trim($user_id);
   
   $name = getValue("name","str","POST","");
   $name = trim($name);
   $name = replaceMQ($name);
   
   $email = getValue("email","str","POST","");
   $email = trim($email);
   $email = replaceMQ($email);
   
   $gender = getValue("gender","str","POST",0);
   $gender = trim($gender);
   
   $phone = getValue("phone","str","POST",0);
   $phone = trim($phone);
   $phone = replaceMQ($phone);
   
   $city_info = getValue("city_info","str","POST","");
   $city_info = trim($city_info);
   $city_info = replaceMQ($city_info);
   
   $nghe = getValue("nghe","str","POST","");
   $nghe = trim($nghe);
   $nghe = replaceMQ($nghe);
   
   $category = getValue("category","str","POST","");
   $category = trim($category);
   $category = replaceMQ($category);
   
   $web = getValue("web","str","POST","");
   $web = trim($web);
   $web = replaceMQ($web);
   
   $face = getValue("face","str","POST","");
   $face = trim($face);
   $face = replaceMQ($face);
   
   $sky = getValue("sky","str","POST","");
   $sky = trim($sky);
   $sky = replaceMQ($sky);
   
   $store_name = getValue("store_name","str","POST","");
   $store_name = trim($store_name);
   $store_name = replaceMQ($store_name);
   
   $slngay = getValue("ngay_sinh","str","POST",0);
   $slngay = trim($slngay);
   $slthang = getValue("thang","str","POST",0);
   $slthang = trim($slthang);
   $slnam = getValue("nam","str","POST",0);
   $slnam = trim($slnam);
   $date = strtotime($slngay."-".$slthang."-".$slnam);
   if($name != '' && $phone != 0 && $email != '' && $user_id != '')
   {
      $data = new db_execute("UPDATE user SET usc_name='".$name."',usc_phone='".$phone."',usc_city='".$city_info."',usc_gender='".$gender."',usc_email='".$email."',usc_birth_day='".$date."',usc_category='".$category."',usc_website='".$web."',usc_facename='".$face."',usc_skype='".$sky."',usc_job='".$nghe."',usc_store_name ='".$store_name."' WHERE usc_id ='".$user_id."'" );
      if($data){
          echo 1;
      }
   }
   else {
     echo 0;
   }

?>