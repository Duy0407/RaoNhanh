<? 
include("config.php");
include("../functions/send_mail.php");
$check = getValue("postok","str","POST","");
if($check != '')
{
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
   $array_phone = ["555-666-0606","+1 213 425 1453"];
   if(!in_array($phone,$array_phone)){
      if($password != '' && $name != '' && $phone != 0 && $email != '' && filter_var($email, FILTER_VALIDATE_EMAIL))
      { 
         $db_qrtrung =  new db_query("SELECT usc_id FROM user WHERE usc_email = '".$email."' LIMIT 1");
         if(mysql_num_rows($db_qrtrung->result) == 0)
         {
            
            $query5 = "INSERT INTO user(usc_name,usc_pass,usc_phone,usc_email,usc_type,usc_time,usc_gender,usc_birth_day,usc_city,usc_address,client_ip)
                                   VALUES ('".$name."','".md5($password."raonhanh365")."','".$phone."','".$email."','1','".time()."','".$gender."','".$date."','".$city."','".$address."','".$ip."')";
            $db_ex5 = new db_execute_return();
            $last_id5 = $db_ex5->db_execute($query5);

            $code = md5($email);
            $link = "https://raonhanh365.vn/xac-thuc-tai-khoan-thanh-cong.html?code=".$code."&id=".$last_id5;
            SendRegisterUV($email,$name,$link);

            // Đồng bộ tài khoản công ty với base chuyển đổi số
             $from            = 'raonhanh365vn';
             $array           = [
                 'email'           => $email,
                 'password'        => md5($password),
                 'company_name'    => $name,
                 'company_phone'   => $phone,
                 'company_address' => $address,
                 'from'            => $from,
             ];

             $curl = curl_init();

             curl_setopt_array($curl, array(
                 CURLOPT_RETURNTRANSFER => 1,
                 CURLOPT_URL            => 'https://chamcong.24hpay.vn/api_chat365/register_company.php',
                 CURLOPT_POST           => 1,
                 CURLOPT_SSL_VERIFYPEER => false, //Bỏ kiểm SSL
                 CURLOPT_POSTFIELDS     => $array,
             ));
             $resp = curl_exec($curl);
             $resp = json_decode($resp);
             if ($resp->data->result == true) {
                 $update = new db_query("UPDATE user SET quet_cds = 1 WHERE usc_id='$last_id5'");
             }else {
                 $update = new db_query("UPDATE user SET quet_cds = 2 WHERE usc_id='$last_id5'");
             }
             curl_close($curl);
             //===============
            setcookie('UT', 1 ,time() + 24*3600,'/');
            setcookie('UID', $last_id5 ,time() + 24*3600,'/');
            setcookie('PHPSESPASS', md5($password."raonhanh365") ,time() + 24*3600,'/');
            setcookie('dk_ok', 0 ,time() + 3600,'/');

            unset($query5,$db_ex5,$last_id5);
            header("Location: /xac-thuc-tai-khoan.html");
         }
         else
         {
            die();
         }
         unset($db_qrtrung);
      }
   }else{
      die();
   }
}
?>