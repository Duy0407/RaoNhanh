<?
include("config.php");
$checkbox = getValue("checkbox", "str", "POST", "");
$user = getValue("user", "str", "POST", "");
$user = trim($user);
// $user = replaceMQ($user);
$pass = getValue("Password5", "str", "POST", "");
$pass = trim($pass);
$pass = $passSyn = replaceMQ($pass);
$pass = md5($pass . "raonhanh365");
$refer = $_SERVER['HTTP_REFERER'];

// Regex check định dạng email
$regex = ("/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/");
if ($user != '' && $pass != '') {

   // Kiểm tra xem tài khoản nhập vào là email hay tên đăng nhập
   if (preg_match($regex, $user)) {
      $db_qr = new db_query("SELECT * FROM user WHERE usc_email = '" . $user . "' AND usc_pass = '" . $pass . "'");
   } else {
      $db_qr = new db_query("SELECT * FROM user WHERE usc_account = '" . $user . "' AND usc_pass = '" . $pass . "'");
   }

   if (mysql_num_rows($db_qr->result) > 0) {
      $data  = mysql_fetch_assoc($db_qr->result);
       // Đồng bộ tài khoản công ty với base chuyển đổi số
       $from            = 'raonhanh365vn';
       $array           = [
           'email'           => $data['usc_email'],
           'password'        => md5($passSyn),
           'company_name'    => $data['usc_name'],
           'company_phone'   => $data['usc_phone'],
           'company_address' => $data['usc_address'],
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
           $update = new db_query("UPDATE user SET quet_cds = 1 WHERE usc_id='".$data['usc_id']."'");
       }else {
           $update = new db_query("UPDATE user SET quet_cds = 2 WHERE usc_id='".$data['usc_id']."'");
       }
       curl_close($curl);
       //===============
      if (empty($checkbox)) {
         setcookie('UT', 1, time() + 24 * 3600, '/');
         setcookie('UID', $data['usc_id'], time() + 24 * 3600, '/');
         setcookie('PHPSESPASS', $pass, time() + 24 * 3600, '/');
      } else {
         setcookie('UT', 1, time() + 365 * 24 * 3600, '/');
         setcookie('UID', $data['usc_id'], time() + 365 * 24 * 6000, '/');
         setcookie('PHPSESPASS', $pass, time() + 365 * 24 * 6000, '/');
      }
      header("Location: $refer");
   } else {
      header("Location: /");
   }
} else {
   header("Location: /");
}
