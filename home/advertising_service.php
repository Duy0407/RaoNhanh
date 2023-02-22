<?
include('config.php');

if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    if ($_COOKIE['UT'] == 1) {
        $id_user = $_COOKIE['UID'];
        $type_user = $_COOKIE['UT'];

        $tin_qc = new db_query("SELECT  `new_id`, `new_title`, `new_money`, `gia_kt`, `new_unit`, `new_create_time`, `chotang_mphi`, `new_image`, `dia_chi`,
                            `new_pin_home`, `new_pin_cate`, `new_day_tin`, `da_ban`, `new_cate_id`, `new_update_time` FROM `new`
                            WHERE `new_user_id` = $id_user AND `new_type` = $type_user AND (`new_pin_home` != 0 OR `new_pin_cate` != 0 OR `new_day_tin` != '')
                            AND `da_ban` = 0 ORDER BY `thoigian_bdghim` DESC ");
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
    <meta name="robots" content="noindex, nofollow" />
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

    <link rel="stylesheet" type="text/css" href="/css/style_new/style_d.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/newCss/box-left_pers_seller_prof.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/adv_service.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/popup.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/m_raonhanhcssnew.css?v=<?= $version ?>" />

</head>

<body>
    <? include("../includes/common/inc_header.php"); ?>
    <section class="advertising_service">
        <?php include "../includes/person_sell/inc_sidebar_left.php" ?>
        <? if (mysql_num_rows($tin_qc->result)) { ?>
            <div class="box-right">
                <div class="title-adv">
                    <div class="chu">
                        <p class="chu-adv">Dịch vụ quảng cáo</p>
                    </div>
                </div>
                <div class="content-adv adv_service">
                    <ul class="content-ul-adv" id="all-posts">
                        <? while ($tin_qc_ok = (mysql_fetch_assoc($tin_qc->result))) {
                            $img = $tin_qc_ok['new_image'];
                            $img1 = explode(';', $img);

                            $daban = $tin_qc_ok['da_ban'];
                            $id_tin = $tin_qc_ok['new_id']; ?>
                            <li class="main-content">
                                <div class="anhhh">
                                    <p class="text-main-content-ghim">ĐANG GHIM</p>
                                    <div class="anh_qc">
                                        <img class="img-adv lazyload" src="/images/loading.gif" data-src="<?= $img1[0] ?>" onerror="this.src=`/images/anh_moi/dai_dien_avt.png`">
                                    </div>
                                </div>
                                <div class="chu">
                                    <div class="text-tilte">
                                        <button value="" class="menu-btn">⋮</button>
                                        <div class="thanh-menu">
                                            <p class="text-ddldb"><input type="button" value="Đánh dấu là đã bán" class="btn-ddldb"></a></p>
                                            <p class="text-ctgg"><input type="button" value="Chi tiết gói ghim" class="ctgg cl_ct_ghim" data="<?= $tin_qc_ok['new_id'] ?>"></a></p>
                                        </div>
                                        <a href="/<?= replaceTitle($tin_qc_ok['new_title']) ?>-c<?= $tin_qc_ok['new_id'] ?>.html" class="text-title-adv"><?= $tin_qc_ok['new_title'] ?></a>
                                    </div>
                                    <div class="text-btn">
                                        <div class="menu-bot">
                                            <div class="time-adv">
                                                <?= lay_tgian($tin_qc_ok['new_update_time']) ?>
                                            </div>
                                            <div class="address-adv"><?= $tin_qc_ok['dia_chi'] ?></div>
                                            <div class="money-adv">
                                                <? if ($tin_qc_ok['new_cate_id'] != 120) { ?>
                                                    <? if ($tin_qc_ok['chotang_mphi'] == 1) { ?>
                                                        Cho tặng miễn phí
                                                    <? } else if ($tin_qc_ok['new_money'] > 0) { ?>
                                                        <?= number_format($tin_qc_ok['new_money']) ?> <?= $arr_dvtien[$tin_qc_ok['new_unit']] ?>
                                                    <? } else if ($tin_qc_ok['new_money'] == 0) { ?>
                                                        Liên hệ người bán
                                                    <? } ?>
                                                <? } else { ?>
                                                    <? if ($tin_qc_ok['new_money'] != 0 && $tin_qc_ok['gia_kt'] != 0) { ?>
                                                        <?= number_format($tin_qc_ok['new_money']) ?> - <?= number_format($tin_qc_ok['gia_kt']) ?> <?= $arr_dvtien[$tin_qc_ok['new_unit']] ?>
                                                    <? } else if ($tin_qc_ok['new_money'] != 0 && $tin_qc_ok['gia_kt'] == 0) {  ?>
                                                        Từ <?= number_format($tin_qc_ok['new_money']) ?> <?= $arr_dvtien[$tin_qc_ok['new_unit']] ?>
                                                    <? } else if ($tin_qc_ok['new_money'] == 0 && $tin_qc_ok['gia_kt'] != 0) { ?>
                                                        Đến <?= number_format($tin_qc_ok['gia_kt']) ?> <?= $arr_dvtien[$tin_qc_ok['new_unit']] ?>
                                                    <? } else { ?>
                                                        Thỏa thuận
                                                    <? } ?>
                                                <? } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-adv mt0 w100">

                                        <span class="border-ctgg">
                                            <button class="btn-ctgg sh_cursor cl_ct_ghim" data="<?= $tin_qc_ok['new_id'] ?>">
                                                <img data-src="/images/newImages/info-circle.png" src="/images/newImages/info-circle.png" class="info-circle">
                                                <span class="text-ctgg">Chi tiết gói ghim</span>
                                            </button>
                                        </span>
                                        <? if ($tin_qc_ok['da_ban'] == 0) { ?>
                                            <span class="border-ddldb">
                                                <button class="btn-ddldb cl_dddb sh_cursor" data="<?= $id_tin ?>" data1="<?= $daban ?>">
                                                    <img data-src="/images/newImages/verify.png" src="/images/newImages/verify.png" class="verify">
                                                    <span class="text-ddldb">Đánh dấu là đã bán</span>
                                                </button>
                                            </span>
                                        <? } ?>
                                    </div>
                                </div>
                            </li>
                        <? } ?>
                    </ul>
                </div>
            </div>
        <? } else { ?>
            <div class="khong_tdyt">
                <div class="khong_tdyt2">
                    <img src="../images/anh_moi/anh022.png" alt="anh022" class="anh_khong_tdyt">
                </div>
                <div class="title_khong_tdyt">Ôi không, chẳng có gì ở đây cả</div>
                <div class="con_khong_tdyt">Bạn chưa có tin yêu thích nào cả<br>
                    Hãy lướt tìm Raonhanh365 và kiếm cho mình những món hàng yêu thích nhé</div>
                <div class="btn_khong_tdyt">
                    <a href="/" class="btn-td-yt hd_cspointer font-bold">Về trang chủ</a>
                </div>
            </div>
        <? } ?>
    </section>
    <?
    include("../includes/inc_new/inc_footer.php");
    include("../includes/common_new/popup.php");
    include("../includes/person_sell/inc_validate.php");
    ?>
    <script type="text/javascript">
        $('.btn-mui-ten').click(function() {
            $('.menu-bot-375').toggle(500);
        })
        $('#advertising_service').addClass('menu_active');


        $('.close_popup').click(function() {
            $('.modalmarkedAsSold ').hide();
        })

        $('.cl_dddb').click(function() {
            var data = $(this).attr('data')
            var data1 = $(this).attr('data1')
            $('.modalmarkedAsSold .dongy_tindd').attr("data", data);
            $('.modalmarkedAsSold .dongy_tindd').attr("data2", data1);
            $('.modalmarkedAsSold ').show();
        })

        $('.dongy_tindd').click(function() {
            var id_tin = $(this).attr('data');
            var fd = new FormData();
            fd.append('id_tin', id_tin);
            $.ajax({
                type: 'POST',
                url: '../ajax/updata_tindaban.php',
                data: fd,
                contentType: false,
                processData: false,
                success: function(d) {
                    window.location.reload();
                }
            })
        })

        $('.cl_ct_ghim').click(function() {
            // $('.chitiet_ghimtin').show();
            var new_id = $(this).attr("data");
            $.ajax({
                url: '/render/ctiet_ghimtin.php',
                type: 'POST',
                data: {
                    new_id: new_id,
                },
                success: function(data) {
                    $(".chitiet_ghimtin .ghimtin_ctiet_ld").html(data);
                    $(".chitiet_ghimtin").show();
                }
            })
        })

        $('.close_ctgtin').click(function() {
            $('.chitiet_ghimtin').hide();
        })
    </script>
</body>

</html>