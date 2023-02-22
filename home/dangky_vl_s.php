<? 
include("config.php");
include("../functions/send_mail.php");
if (isset($_POST["postok"])) {
   $username = $_POST["usernamedk"];
   $name = $_POST["Hoten"];
   $city = $_POST["city"];
   $address = $_POST["address"];
   $phone = $_POST["Phone"];
   $email = $_POST["Email"];
   $password = $_POST["password"];
   if ($username == "" || $name == "" || $city == "" || $address == "" || $phone == "" || $email == "" || $password == "") {
      header('Location: /dangky-vl.html');
   }else{
         $sql="select * from user where usc_account='$username'";
       $kt=mysqli_query($conn, $sql);

       if(mysqli_num_rows($kt)  > 0){
          echo "Tài khoản đã tồn tại";
       }else{
           $insert = new db_query("INSERT INTO user(
              usc_account,
              usc_name,
              usc_city,
              usc_address,
              usc_phone,
              usc_email,
              usc_pass
              ) VALUES (
              '".$username."',
              '".$name."',
              '".$city."',
              '".$address."',
              '".$phone."',
              '".$email."',
              '".md5($password."raonhanh365")."'
              )");
              $db_ex5 = new db_execute_return();
              $last_id5 = $db_ex5->db_execute($insert);
              setcookie('UT', 1 ,time() + 24*3600,'/');
              setcookie('UID', $last_id5 ,time() + 24*3600,'/');
              setcookie('PHPSESPASS', md5($password."raonhanh365") ,time() + 24*3600,'/');
              setcookie('dk_ok', 0 ,time() + 3600,'/');
              $code = md5($email);
              $link = "https://raonhanh365.vn/xac-thuc-tai-khoan-viec-lam-thanh-cong.html?code=".$code."&id=".$last_id5;
              SendRegisterUV($email,$name,$link);
              unset($insert,$db_ex5,$last_id5);
              header("Location: /xac-thuc-tai-khoan-viec-lam.html");
       }
      //  header("Location: /viec-lam.html");   
      // echo "tk tồn tại";
       
   }
}

?>