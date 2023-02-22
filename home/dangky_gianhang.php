<?
include("config.php");
$check = getValue("postok","str","POST","");
if($check != '')
{
   $password = getValue("pass_gh1","str","POST","");
   $password = trim($password);
   $password = replaceMQ($password);

   $name = getValue("name_chu_gh","str","POST","");
   $name = trim($name);
   $name = replaceMQ($name);

   $gender = getValue("gender","str","POST",0);
   $gender = trim($gender);

   $slngay = getValue("slngay","str","POST",00);
   $slngay = trim($slngay);
   $slthang = getValue("slthang","str","POST",00);
   $slthang = trim($slthang);
   $slnam = getValue("slnam","str","POST",0000);
   $slnam = trim($slnam);
   $date_user = strtotime($slngay."-".$slthang."-".$slnam);

   $phone_user = getValue("phone_user","str","POST",0);
   $phone_user = trim($phone_user);
   $phone_user = replaceMQ($phone_user);

   $email_gh = getValue("email_gh","str","POST","");
   $email_gh = trim($email_gh);
   $email_gh = replaceMQ($email_gh);

   $cmt_gh = getValue("cmt_gh","str","POST",0);
   $cmt_gh = trim($cmt_gh);
   $cmt_gh = replaceMQ($cmt_gh);

   $slngay_cmt = getValue("slngay_cmt","str","POST",00);
   $slngay_cmt = trim($slngay_cmt);
   $slthang_cmt = getValue("slthang_cmt","str","POST",00);
   $slthang_cmt = trim($slthang_cmt);
   $slnam_cmt = getValue("slnam_cmt","str","POST",0000);
   $slnam_cmt = trim($slnam_cmt);
   $date_cmt = strtotime($slngay_cmt."-".$slthang_cmt."-".$slnam_cmt);

   $name_store	 = getValue("name_store","str","POST","");
   $name_store	 = trim($name_store);
   $name_store	 = replaceMQ($name_store);

   $category = getValue("category","str","POST",00);
   $category = trim($category);

   $phone_store = getValue("phone_store","str","POST",0);
   $phone_store = trim($phone_store);
   $phone_store = replaceMQ($phone_store);

   $city_gh = getValue("city_gh","str","POST","");
   $city_gh = trim($city_gh);

   $diachi_gh = getValue("diachi_gh","str","POST","");
   $diachi_gh = trim($diachi_gh);

   $web = getValue("web","str","POST","");
   $web = trim($web);
   $web = replaceMQ($web);

   $face = getValue("face","str","POST","");
   $face = trim($face);
   $face = replaceMQ($face);
   $refer = $_SERVER['HTTP_REFERER'];
   if($password != '' && $name != '' && $phone_store != 0 && $email_gh != '')
   {
      $db_qrtrung =  new db_query("SELECT usc_email FROM user WHERE usc_email = '".$email_gh."' AND usc_type = 5 LIMIT 1");
      if(mysql_num_rows($db_qrtrung->result) == 0)
      {
//         ===========logo==========
         if (isset($_FILES['logo_gh']['name']) && $_FILES['logo_gh']['name'] != '') {
            $filename = $_FILES['logo_gh']['name'];
            $filedata = $_FILES['logo_gh']['tmp_name'];
            $file_type = $_FILES['logo_gh']['type'];
            $file_size = $_FILES['logo_gh']['size'];
            $file_ext = strtolower(end(explode('.', $_FILES['logo_gh']['name'])));
            $array_ext = array("png", "jpg", "gif");
            if (in_array($file_ext, $array_ext) === false) {
               $message = "Định dạng logo tải lên không hợp lệ (gif, jpg, png)";
               echo "<script>alert(".$message.")</script>";
            } else if ($file_size > 2097152) {
               $message = "File ảnh của bạn vượt quá 2MB. Xin vui lòng chọn file khác";
               echo "<script>alert(".$message.")</script>";
            } else {
               $day = date("d");
               $month = date("m");
               $year = date("Y");
               $path_file = "../pictures/";

               if (!file_exists($path_file . $year)) {
                  mkdir($path_file . $year, 0775);
                  // chdir($year);
               }
               if (!file_exists($path_file . $year . "/" . $month)) {
                  mkdir($path_file . $year . "/" . $month, 0775);
                  //   chdir($month);
               }
               if (!file_exists($path_file . $year . "/" . $month . "/" . $day)) {
                  mkdir($path_file . $year . "/" . $month . "/" . $day, 0775);
               }
               $temp = explode(".", $filename);
               $newfile = time(). '.png';
               $target = $path_file . $year . "/" . $month . "/" . $day . "/" . $newfile;
               move_uploaded_file($_FILES['logo_gh']['tmp_name'], $target);
               $query5 = "INSERT INTO user(usc_name,usc_pass,usc_phone,usc_email,usc_type,usc_cmt,usc_date_cmt ,usc_time,usc_gender,usc_birth_day,usc_city,usc_address,usc_store_name,usc_category,usc_store_phone,usc_website,usc_facename,usc_logo)
                                 VALUES ('".$name."','".md5($password."raonhanh365")."','".$phone_user."','".$email_gh."','5','".$cmt_gh."','".$date_cmt."','".time()."','".$gender."','".$date_user."','".$city_gh."','".$diachi_gh."','".$name_store."','".$category."','".$phone_store."','".$web."','".$face."','".$target."')";
               $db_ex = new db_execute_return();
               $last_id5 = $db_ex->db_execute($query5);
               // Đồng bộ tài khoản công ty với base chuyển đổi số
               $from            = 'raonhanh365vn';
               $array           = [
                   'email'           => $email_gh,
                   'password'        => md5($password),
                   'company_name'    => $name,
                   'company_phone'   => $phone_user,
                   'company_address' => $diachi_gh,
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
//         ===============
               setcookie('UT', 1 ,time() + 48*3600,'/');
               setcookie('UID', $last_id5 ,time() + 48*3600,'/');
               setcookie('PHPSESPASS', md5($password."raonhanh365") ,time() + 48*3600,'/');
               setcookie('dk_ok_2', 1 ,time() + 3600,'/');
               header("Location: $refer");
//         redirect("/doanh-nghiep/tong-quan-tai-khoai");
            }

         }

      }
      else
      {
         redirect("/");
      }
      unset($query5,$last_id5,$db_ex);
   }
   redirect("/");
}
redirect("/");
?>
