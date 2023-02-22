<?
require_once("config.php");
require_once("../classes/resize-class.php");

$userid = getValue('id', 'int', 'GET', 0);
    $code = getValue('code', 'str', 'GET', '');
    $code = trim($code);
    if ($userid != 0 && $code != '') {
        $sl_qr = new db_query("SELECT usc_email FROM user WHERE usc_id = " . $userid);
        if (mysql_num_rows($sl_qr->result) > 0) {
            $row = mysql_fetch_assoc($sl_qr->result);
            if (md5($row['usc_email']) == $code) {
                $update = new db_query("UPDATE user SET usc_authentic = 1 WHERE usc_id = " . $userid);
            } else {
                redirect('/');
            }
        } else {

            redirect('/');
        }
    } else {

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
    <?php include "../includes/common/inc_header_link.php" ?>
    <link href="/css/style.min.css?v=<?= $version ?>" rel="stylesheet" type="text/css"/>
</head>
<body>
<? include('../includes/common/inc_header.php'); ?>
<section style="clear: both; overflow: hidden;">
    <div class="container">
        <div class="div_xac_thuc">
            <div class="td_xacthuc">
                XÁC THỰC TÀI KHOẢN THÀNH CÔNG
            </div>
            <p>Chúc mừng bạn đã tạo tài khoản thành công, hãy tới ngay<a href="/"> <b>Trang chủ </b></a> để có thể xem
                thêm các sản phẩm tại <a href="/">Raonhanh365.vn</a></p>
        </div>
    </div>
</section>
<script src="/js/jquery-1.8.3.min.js"></script>
<? include("../includes/common/inc_footer.php") ?>
</body>
</html>

<script defer src="/js/dangky.js"></script>
<script defer src="/js/dangnhap_2.js" type="text/javascript"></script>
<script defer src="/js/dangnhap.js"></script>