<? 
require_once("config_vl.php");
require_once("../classes/resize-class.php");
$xt =1;
if(isset($_COOKIE['UID']) && isset($_COOKIE['PHPSESPASS'])){
  $db_qr = new db_query("SELECT * FROM user WHERE usc_id = ".$_COOKIE['UID']);
  $row_use = mysql_fetch_assoc($db_qr->result);
}
else{
  redirect('/viec-lam.html');
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
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
        XÁC THỰC TÀI KHOẢN
      </div>
      <p>Sau khi đăng ký tài khoản thành công. Vui lòng kiểm tra hòm thư email cá nhân để xác thực tài khoản!</p>
      <p>Nếu quá lâu, vui lòng kiểm tra thư mục Spam</p>
      <p style="font-weight: 600">Nếu bạn chưa nhận được Email xác thực, hãy bấm nút Gửi lại Email dưới đây:</p>
      <div class="guilai_mail" data-id="<?= $row_use['usc_id']?>" data-name="<?= $row_use['usc_name'] ?>" data-email="<?= $row_use['usc_email'] ?>">Gửi lại mail</div>
    </div>
  </div>
</section>
<script src="/js/jquery-1.8.3.min.js"></script>
</body>
</html>
<script>
  $('.guilai_mail').click(function () {
      $.ajax({
          type: "POST",
          url: "../ajax/email_redo_vl.php",
          data: {
              email: $('.guilai_mail').attr('data-email'),
              name: $('.guilai_mail').attr('data-name'),
              id: $('.guilai_mail').attr('data-id')
          },
          success: function (data)
          {
              window.location.reload();
          }
      });
  });
</script>
<script src="/js/lazysizes.min.js"></script>
<script defer src="/js/dangky.js"></script>
<script defer src="/js/dangnhap_2.js" type="text/javascript"></script>
<script defer src="/js/dangnhap.js"></script>