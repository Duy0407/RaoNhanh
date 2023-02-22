<?
include('config.php');

if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $id_user = $_COOKIE['UID'];
    $type_user = $_COOKIE['UT'];
    if ($type_user == 1) {
        $tinyt_ngban = new db_query("SELECT `new_title`, `new_type`, `chotang_mphi`, `new_money`, `gia_kt`, `new_create_time`, `new_cate_id`, `new_unit`,
                                `dia_chi`, `new_image`, n.`new_id` FROM `tin_yeu_thich` AS t JOIN `new` AS n ON n.`new_id` = t.`new_id`
                                WHERE t.`user_id` = $id_user AND t.`usc_type` = $type_user AND n.`new_buy_sell` = 2 ORDER BY `id` DESC ");
    } else {
        header('Location: /');
    }
} else {
    header('Location: /');
}

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
    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/box-left_pers_seller_prof.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/fav_news.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/m_raonhanhcssnew.css?v=<?= $version ?>" />
</head>

<body>
    <?
    include("../includes/common/inc_header.php"); ?>
    <section class="favorite_news_seller">
        <?php include "../includes/person_sell/inc_sidebar_left.php" ?>
        <? $showtinyt_ngban = mysql_num_rows($tinyt_ngban->result); ?>
        <? if ($showtinyt_ngban > 0) { ?>
            <div class="box-right">
                <div class="box_right_dlf">
                    <div class="title-fav">
                        <div class="chu">
                            <p class="chu-fav">Tin đã yêu thích</p>
                        </div>
                    </div>
                    <div class="content-fav">
                        <ul class="content-ul-fav" id="all-posts">
                            <? while ($row_nb = (mysql_fetch_assoc($tinyt_ngban->result))) {
                                $avata_tinyt = $row_nb['new_image'];
                                $avata_tinyt = explode(';', $avata_tinyt);

                                $id_tin = $row_nb['new_id'];
                                $check = new db_query("SELECT `id` FROM `tin_yeu_thich` WHERE `new_id` = '$id_tin' AND `user_id` = '$id_user' AND `usc_type` = '$type_user'");
                                $check_num = mysql_num_rows($check->result);
                            ?>
                                <li class="main-content">
                                    <div class="anh">
                                        <a href="/<?= replaceTitle($row_nb['new_title']) ?>-c<?= $row_nb['new_id'] ?>.html">
                                            <img class="img-fav lazyload" src="/images/newImages/mau-1.png" data-src="<?= $avata_tinyt[0] ?>" onerror="this.src=`/images/anh_moi/dai_dien_avt.png`">
                                        </a>
                                    </div>
                                    <div class="chu tca_ythich_tin">
                                        <div class="text-tilte">
                                            <a href="/<?= replaceTitle($row_nb['new_title']) ?>-c<?= $row_nb['new_id'] ?>.html" class="text-title-fav text_ellipsis">
                                                <?= $row_nb['new_title'] ?>
                                            </a>
                                        </div>
                                        <div class="text-btn text_btn_yc">
                                            <div class="menu-bot">
                                                <div class="time-fav"><?= lay_tgian($row_nb['new_create_time']) ?></div>
                                                <div class="address-fav"><?= $row_nb['dia_chi'] ?></div>
                                                <div class="ythich_tienyc">
                                                    <div class="money-fav">
                                                        <? if ($row_nb['new_cate_id'] != 120 && $row_nb['new_cate_id'] != 121) { ?>
                                                            <? if ($row_nb['chotang_mphi'] == 1) { ?>
                                                                Cho tặng miễn phí
                                                                <? } else if ($row_nb['new_money'] > 0) {
                                                                if ($row_nb['new_type'] == 1 || $row_nb['new_type'] == 5) { ?>
                                                                    <?= number_format($row_nb['new_money']) ?> <?= $arr_dvtien[$row_nb['new_unit']] ?>
                                                                <? } else if ($row_nb['new_type'] == 2) { ?>
                                                                    <?= number_format($row_nb['new_money']) ?> <?= $arr_dvtien[$row_nb['new_unit']] ?> - <?= number_format($row_nb['gia_kt']) ?> <?= $arr_dvtien[$row_nb['new_unit']] ?>
                                                                <? }
                                                            } else if ($row_nb['new_money'] == 0 || $row_nb['new_money'] == '') { ?>
                                                                Liên hệ để hỏi giá
                                                            <? } ?>
                                                        <? } else { ?>
                                                            <? if ($row_nb['new_money'] != 0 && $row_nb['gia_kt'] != 0) { ?>
                                                                <?= number_format($row_nb['new_money']) ?> - <?= number_format($row_nb['gia_kt']) ?> <?= $arr_dvtien[$row_nb['new_unit']] ?>
                                                            <? } else if ($row_nb['new_money'] != 0 && $row_nb['gia_kt'] == 0) { ?>
                                                                Từ <?= number_format($row_nb['new_money']) ?> <?= $arr_dvtien[$row_nb['new_unit']] ?>
                                                            <? } else if ($row_nb['new_money'] == 0 && $row_nb['gia_kt'] != 0) { ?>
                                                                Đến <?= number_format($row_nb['gia_kt']) ?> <?= $arr_dvtien[$row_nb['new_unit']] ?>
                                                            <? } else { ?>
                                                                Thỏa thuận
                                                            <? } ?>
                                                        <? } ?>
                                                    </div>
                                                    <div class="btn-fav">
                                                        <? if ($check_num == 0) { ?>
                                                            <img src="../images/anh_moi/anh013.png" data="<?= $id_tin ?>" alt="anh013" class="ko_yeuthich hd_cspointer sh_cursor" onclick="yeu_thich(this)">
                                                        <? } else { ?>
                                                            <img src="../images/anh_moi/anh014.png" data="<?= $id_tin ?>" alt="anh014" class="yeuthich hd_cspointer sh_cursor" onclick="yeu_thich(this)">
                                                        <? } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </li>
                            <? } ?>
                        </ul>
                    </div>
                </div>
            </div>
        <? } else { ?>
            <div class="themdiv_noclass1">
                <div class="themdiv_noclass2">
                    <img src="../images/anh_moi/anh_dulieutrong.png" alt="" class="d_flex img_trong">
                    <h1 class="h1_text">Ôi không, chẳng có gì ở đây cả</h1>
                    <p class="text_rong">Bạn chưa yêu thích tin nào <br>
                        Hãy lướt tìm Raonhanh365 và kiếm cho mình những món hàng yêu thích nhé</p>
                    <div class="text_center"><a href="/" class="color_cam vetrangchu">Về trang chủ</a></div>
                </div>
            </div>
        <? } ?>

    </section>
    <? include '../modals/md_tb_yeuthich.php' ?>
    <? include("../includes/inc_new/inc_footer.php"); ?>

    <script type="text/javascript">
        $('.btn-mui-ten').click(function() {
            $('.box-left .menu-bot').toggle(500);
            $(this).toggleClass('rotate')
        })
        $('#favotite_news').addClass('menu_active')
    </script>
</body>

</html>