<? 
require_once("config.php");
require_once("../classes/resize-class.php");
$xt =1;
if(isset($_COOKIE['UID']) && isset($_COOKIE['PHPSESPASS'])){
  $db_qr = new db_query("SELECT * FROM user WHERE usc_id = ".$_COOKIE['UID']);
  $row_use = mysql_fetch_assoc($db_qr->result);
}
else{
  redirect('/');
}
//$index = "index, follow,noodp";
$index = "noindex, nofollow";
$title = "Xác thực tài khoản";
$keyword = "Raonhanh365, rao vặt miễn phí, trang rao vặt, kênh mua bán, quảng cáo, mua ban, quang cao, rao vat, đăng tin miễn phí";
$description = "Mạng xã hội Rao vặt miễn phí Việt, Kênh mua bán trực tuyến rao vặt các loại đồ cũ, đồ mới, đồ Secondhand, rao vặt miễn phí cùng các dịch vụ giá cực rẻ ưu đã tốt. Quảng cáo gian hàng của bạn một cách tốt nhất uy tín nhất, giúp sản phẩm của bạn tiếp cận nhiều người hơn, là cầu nối tốt nhất giữa người mua và người bán.";
$canonical = "https://raonhanh365.vn/";
$url_image = "/";
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <!--link meta seo-->
    <?php include "../includes/common/inc_header_link.php"?>
    <link href="/css/style.min.css?v=<?= $version ?>" rel="stylesheet" type="text/css"/>
</head>
<body>
<? include('../includes/common/inc_header.php'); ?>
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
<? include("../includes/common/inc_footer.php") ?>
</body>
</html>
<script>
  $('.guilai_mail').click(function () {
      $.ajax({
          type: "POST",
          url: "../ajax/email_redo.php",
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
<script defer src="/js/dangky.js"></script>
<script defer src="/js/dangnhap_2.js" type="text/javascript"></script>
<script defer src="/js/dangnhap.js"></script>