<?
include("config.php");
$user = getValue("user", "str", "POST", "");
$user = trim($user);
// $user = replaceMQ($user);
$pass = getValue("pass", "str", "POST", "");
$pass = trim($pass);
$pass = replaceMQ($pass);
$pass = md5($pass . "raonhanh365");

// Regex check định dạng email
$regex = ("/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/");

// Kiểm tra xem tài khoản nhập vào là email hay tên đăng nhập
if ($user != '' && $pass != '') {
   if (preg_match($regex, $user)) {
      $db_qr = new db_query("SELECT COUNT(*) as total FROM user WHERE usc_email = '" . $user . "' AND usc_pass = '" . $pass . "'");
   } else {
      $db_qr = new db_query("SELECT COUNT(*) as total FROM user WHERE usc_account = '" . $user . "' AND usc_pass = '" . $pass . "'");
   }

   $data  = mysql_fetch_assoc($db_qr->result);
   if ($data['total'] == 0) {
      echo 0;
   } else {
      echo 1;
   }
} else {
   redirect('https://google.com.vn');
}
