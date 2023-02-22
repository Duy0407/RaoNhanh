<? 
include("config.php");
include("../functions/send_mail.php");
$check = getValue("postok","str","POST","");
if($check != '')
{
   $account = getValue("usernamedk","str","POST","");
   $account = trim($account);
   $account = replaceMQ($account);
   $password = getValue("password","str","POST","");
   $password = trim($password);
   $password = replaceMQ($password);
   $name = getValue("Hoten","str","POST","");
   $name = trim($name);
   $name = replaceMQ($name);
   $phone = getValue("Phone","str","POST",0);
   $phone = trim($phone);
   $phone = replaceMQ($phone);
   $email = getValue("Email","str","POST","");
   $email = trim($email);
   $email = replaceMQ($email);
   $city = getValue("city","str","POST","");
   $city = trim($city);
   $address = getValue("address","str","POST","");
   $address = trim($address);
   $gender = getValue("gender","str","POST",0);
   $gender = trim($gender);
   $slngay = getValue("slngay","str","POST",0);
   $slngay = trim($slngay);
   $slthang = getValue("slthang","str","POST",0);
   $slthang = trim($slthang);
   $slnam = getValue("slnam","str","POST",0);
   $slnam = trim($slnam);
   $date = strtotime($slngay."-".$slthang."-".$slnam);
   $refer = $_SERVER['HTTP_REFERER'];
   $ip = client_ip();
   if($phone != '+1 213 425 1453'){
      if($account != '' && $password != '' && $name != '' && $phone != 0 && $email != '')
      { 
         $db_qrtrung =  new db_query("SELECT usc_id FROM user WHERE usc_email = '".$email."' LIMIT 1");
         if(mysql_num_rows($db_qrtrung->result) == 0)
         {
            
            $query5 = "INSERT INTO user(usc_name,usc_account,usc_pass,usc_phone,usc_email,usc_type,usc_time,usc_gender,usc_birth_day,usc_city,usc_address,client_ip)
                                   VALUES ('".$name."','".$account."','".md5($password."raonhanh365")."','".$phone."','".$email."','1','".time()."','".$gender."','".$date."','".$city."','".$address."','".$ip."')";
            $db_ex5 = new db_execute_return();
            $last_id5 = $db_ex5->db_execute($query5);

            $code = md5($email);
            $link = "https://raonhanh365.vn/xac-thuc-tai-khoan-thanh-cong.html?code=".$code."&id=".$last_id5;
            SendRegisterUV($email,$name,$link);


            setcookie('UT', 1 ,time() + 24*3600,'/');
            setcookie('UID', $last_id5 ,time() + 24*3600,'/');
            setcookie('PHPSESPASS', md5($password."raonhanh365") ,time() + 24*3600,'/');
            setcookie('dk_ok', 0 ,time() + 3600,'/');

            unset($query5,$db_ex5,$last_id5);
            header("Location: /viec-lam.html");
         }
         else
         {
            redirect("/");
         }
         unset($db_qrtrung);
      }
   }else{
      redirect("/");
   }
}
?>