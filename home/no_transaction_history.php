<?
// require_once("../functions/functions.php");
// ob_start();
// require_once("../functions/function_rewrite.php");
// require_once("../classes/database.php");
// require_once("../classes/config.php");
// require_once("../classes/user.php");
// date_default_timezone_set('Asia/Ho_Chi_Minh');
// require_once("../classes/resize-class.php");
// require_once("../cache_file/home-cache.php");
// $home = 'home';
// $css_new = true;
// $box_left = 'newCss/box-left_pers_seller_prof.css';
// $box_right = 'newCss/personal_seller_profile.css';
// $fotter_change = 2;


// $db_vl = new db_query("SELECT new_title,new_user_id,new_city,new_address,new_type,new_desc,new_money_min,new_money_max,new_picture,save_time_vl
// from vieclam
// join user on vieclam.new_user_id = user.usc_id
// join city2 on vieclam.new_city = city2.cit_id  where new_type=1 and new_picture != '' ORDER BY new_id DESC LIMIT 5");
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

    <title>Rao vặt miễn phí - Mua bán tức thì | RAONHANH365.VN</title>
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
    <meta name="robots" content="index, follow,noodp" />
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
    <link rel="stylesheet" type="text/css" href="/css/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="/css/slick.css" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/box-left_pers_seller_prof.css" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/no-news.css" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css">
</head>

<body>
    <?
    $file = '../cache_file/sql_cache.json';
    $arraytong       = json_decode(file_get_contents($file), true);
    $arrcity         = $arraytong['db_city'];
    $db_cat          = $arraytong['db_cat'];
    //----------------
    $file_home = '../cache_file/cache_home.json';
    $array_home       = json_decode(file_get_contents($file_home), true);
    $sp_qtam          = $array_home['sp_qtam'];
    $top_ghang        = $array_home['top_ghang'];
    $danh_muc         = $array_home['danh_muc'];

    include("../includes/common/inc_header.php"); ?>
    <section>
        <div class="themdivkhongtimyeuthich">
            <?php include "../includes/person_sell/inc_sidebar_left.php"?>
            <div class="box-right">
        </div>
            <div class="no-news">
                <img src="/images/newImages/qlt-rong.png" class="img-no-news">
            </div>
            <div class="text-no-news text-no-news_df">
                <div class="titlt-nn">Ôi không, chẳng có gì ở đây cả</div>
                <div class="lsgd content-fav">Bạn chưa thực hiện giao dịch nào trên Raonhanh365<br>Nạp tiền để quảng cáo tin đăng hoặc gian hàng với giá ưu đãi</div>
                <div class="box-up-news">
                    <a href="" class="text-box-return">Xem bảng giá</a>
                </div>
            </div>
        </div>
    </section>
    <?
    include '../includes/inc_new/inc_footer.php';
    ?>

</body>

</html>