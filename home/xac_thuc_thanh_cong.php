<?php
include("config.php");
$id = $_GET['id'];
$query_xt = new db_query("UPDATE `user` SET `usc_authentic` = '1' WHERE usc_id = '$id' ");
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <link rel="dns-prefetch" href="https://www.google.com.vn">
    <link rel="dns-prefetch" href="https://www.google-analytics.com">
    <link rel="preconnect" href="https://www.google.com.vn">
    <link rel="preconnect" href="https://www.google-analytics.com">
    <!--    -----tvt them  27/05--->
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" as="image" href="/images/banner.webp">
    <link rel="preload" as="image" href="/images/cv_trangchu1.webp">

    <!--------------->

    <title>Xác thực thành công</title>
    <meta name="keywords" content="Raonhanh365, rao vặt miễn phí, trang rao vặt, kênh mua bán, quảng cáo, mua ban, quang cao, rao vat, đăng tin miễn phí" />
    <meta name="description" content="Mạng xã hội Rao vặt miễn phí Việt, Kênh mua bán trực tuyến rao vặt các loại đồ cũ, đồ mới, đồ Secondhand, rao vặt miễn phí cùng các dịch vụ giá cực rẻ ưu đã tốt. Quảng cáo gian hàng của bạn một cách tốt nhất uy tín nhất, giúp sản phẩm của bạn tiếp cận nhiều người hơn, là cầu nối tốt nhất giữa người mua và người bán." />
    <meta property="og:title" content="Rao vặt miễn phí - Mua bán tức thì | RAONHANH365.VN" />
    <meta property="og:description" content="Mạng xã hội Rao vặt miễn phí Việt, Kênh mua bán trực tuyến rao vặt các loại đồ cũ, đồ mới, đồ Secondhand, rao vặt miễn phí cùng các dịch vụ giá cực rẻ ưu đã tốt. Quảng cáo gian hàng của bạn một cách tốt nhất uy tín nhất, giúp sản phẩm của bạn tiếp cận nhiều người hơn. Raonhanh365 'đăng tin miễn phí - mua bán tức thì, nơi kết nối giữa người mua kẻ bán.'" />
    <meta property="og:url" content="https://raonhanh365.vn/" />
    <meta name="copyright" content="Copyright © 2017 by raonhanh365.vn" />
    <meta name="abstract" content="Rao vặt miễn phí - Mua bán tức thì | RAONHANH365.VN<" />
    <meta name="author" itemprop="author" content="raonhanh365.vn" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="robots" content="noindex, nofollow,noodp" />
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui" />
    <meta property="og:image:url" content="https://raonhanh365.vn/images/banner_raonhanh365.jpg" />
    <meta property="og:image:width" content="476" />
    <meta property="og:image:height" content="249" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="vi_VN" />
    <meta name="revisit-after" content="1 days" />
    <meta name="page-topic" content="Mua bán rao vặt" />
    <meta name="resource-type" content="Document" />
    <meta name="distribution" content="Global" />
    <link rel="canonical" href="https://raonhanh365.vn" />
    <meta name="google-site-verification" content="8HoYLGUD3DXbNpPr7JHZjAxMghKbHnuSClcHal7OnRA" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/newCss/style.css">
    <link rel="stylesheet" type="text/css" href="/css/newCss/admin.style.css">
    <link rel="stylesheet" type="text/css" href="../css/style_new/style.css">
    <link rel="stylesheet" href="/css/newCss/popup.css">
    <link rel="stylesheet" type="text/css" href="../css/newCss/register.css">
</head>

<body>
    <?php include("../includes/common/inc_header.php"); ?>
    <?php include("../includes/common_new/popup.php"); ?>
    <section class="register_buy_container">
        <div class="content_register1">
            <div class="box_title_register">
                <p class="title_register">Đăng ký tài khoản <span class="break">thành công!</span></p>
            </div>
            <div class="box_sucsess no_text">
                <div class="img_tc"><img src="../images/anh_moi/icon_tbao_tc.png" alt=""></div>
                <p>Bạn đã xác thực tài khoản thành công!</p>
                <div class="btn_dong" onclick="location.href='/index.html'">
                    Đóng
                </div>
            </div>
            <div class="box_sucsess text">
                <div class="title_tc">ĐĂNG KÝ TÀI KHOẢN THÀNH CÔNG!</div>
                <div class="img_tc"><img src="../images/anh_moi/icon_tbao_tc.png" alt=""></div>
                <p>Bạn đã xác thực tài khoản thành công!</p>
                <div class="btn_dong" onclick="location.href='/index.html'">
                    Đóng
                </div>
            </div>
        </div>
    </section>

    <? include '../includes/inc_new/inc_footer.php'; ?>
</body>

</html>
<script type="text/javascript" src="../js/style_new/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="/js/style_new/select2.min.js"></script>
<script type="text/javascript" src="/js/style_new/jquery.validate.min.js"></script>
<script type="text/javascript" src="/js/style_new/js_quang.js"></script>
<script type="text/javascript" src="../js/newJs/admin.main.js"></script>

<script>

</script>