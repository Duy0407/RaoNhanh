<? 
require_once("config_vl.php");
require_once("../classes/resize-class.php");

if(isset($_COOKIE['UID'])){

  $userid = getValue('id','int','GET',0);
  $code   = getValue('code','str','GET','');
  $code   = trim($code);

  if($userid != 0 && $code != '')
  {
    $sl_qr = new db_query("SELECT usc_email FROM user WHERE usc_id = ".$userid);
    if(mysql_num_rows($sl_qr->result) > 0)
    {
      $row = mysql_fetch_assoc($sl_qr->result);
      if(md5($row['usc_email']) == $code)
      {
        $update = new db_query("UPDATE user SET usc_authentic = 1 WHERE usc_id = ".$userid);
      }
      else
      {
        redirect('/viec-lam.html');
      }
    }
    else
    {

      redirect('/viec-lam.html');
    }
  }
  else
  {

    redirect('/viec-lam.html');
  }
}
else{

  redirect('/viec-lam.html');
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <title>Xác thực tài khoản</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <title>Xác thực tài khoản</title>
  <meta name="robots" content="noindex,nofollow"/>
  <link rel="stylesheet" type="text/css" href="/css/vieclam/header2.css" />
  <link rel="stylesheet" type="text/css" href="/css/vieclam/vieclamraonhanh.css" />
</head>
<body>
<? include("../includes/vieclam/header1.php"); ?>
<section  style="clear: both; overflow: hidden;">
  <div class="container">
    <div class="div_xac_thuc">
      <div class="td_xacthuc">
        XÁC THỰC TÀI KHOẢN THÀNH CÔNG
      </div>
      <p>Chúc mừng bạn đã tạo tài khoản thành công, hãy tới ngay<a href="/viec-lam.html"> <b>Trang chủ </b></a> để có thể xem thêm các sản phẩm tại <a href="/">Raonhanh365.vn</a></p>
    </div>
  </div>
</section>
<script src="/js/jquery-1.8.3.min.js"></script>
</body>
</html>
<script src="/js/lazysizes.min.js"></script>
<script defer src="/js/dangky.js"></script>
<script defer src="/js/dangnhap_2.js" type="text/javascript"></script>
<script defer src="/js/dangnhap.js"></script>