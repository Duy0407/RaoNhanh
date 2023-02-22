<?
include("config.php");

if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    if ($_COOKIE['UT'] == 1) {
        $id_user = $_COOKIE['UID'];
        $type_user = $_COOKIE['UT'];
        $history = new db_query("SELECT `his_user_id`, `noi_dung`, `his_price`, `his_time` FROM `history` WHERE `his_user_id` = $id_user ORDER BY `his_id` DESC ");
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
    <!-- <meta name="robots" content="index, follow,noodp" /> -->
    <meta name="robots" content="noindex,nofollow">
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

    <link rel="stylesheet" type="text/css" href="/css/style_new/style_d.css?$ver=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/newCss/box-left_pers_seller_prof.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/transaction_history.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/m_raonhanhcssnew.css?v=<?= $version ?>" />
</head>

<body>
    <?
    include("../includes/common/inc_header.php"); ?>
    <section class="select_tong">
        <div class="div_tong_bao_2_box">
            <div class="div_bao_box_left">
                <?php include "../includes/person_sell/inc_sidebar_left.php" ?>
            </div>
            <? if (mysql_num_rows($history->result) > 0) { ?>
                <div class="box-right box-right_df box-right_df_dl">
                    <div class="title-his">
                        <p class="chu-his">Lịch sử giao dịch</p>
                    </div>
                    <div class="content-lsgd">
                        <div class="his_table">
                            <table class="table">
                                <thead>
                                    <tr class="border-lsgd tilte-lsgd">
                                        <th class="quang-cao font-th">Quảng cáo / Nạp tiền</th>
                                        <th class="gia-tri-giao-dich font-th">Giá trị giao dịch</th>
                                        <th class="thanh-toan font-th">Phương thức thanh toán</th>
                                        <th class="ngay-giao-dich font-th">Ngày giao dịch</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <? while ($history_ok = (mysql_fetch_assoc($history->result))) { ?>
                                        <tr class="border-lsgd main-content-lsgd">
                                            <td class=" box-td padding-quang-cao  padding-quang-cao">
                                                <img src="/images/newImages/rao-nhanh-be.png" class="img-lsgd">
                                                <? if ($history_ok['noi_dung'] != '') { ?>
                                                    <p class="text-lsgd"><?= $history_ok['noi_dung'] ?></p>
                                                <? } else { ?>
                                                    <p class="text-lsgd">Nạp tài khoản</p>
                                                <? } ?>
                                            </td>
                                            <td class="font-td box-td padding-quang-cao"><?= number_format($history_ok['his_price']) ?> VNĐ</td>
                                            <td class="font-td box-td padding-quang-cao">Nạp tiền Rao Nhanh</td>
                                            <td class="font-td box-td padding-quang-cao"><?= date('d/m/Y', $history_ok['his_time']) ?></td>
                                        </tr>
                                    <? } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            <? } else { ?>
                <div class="khong_tdyt">
                    <div class="khong_tdyt2">
                        <img src="../images/anh_moi/anh022.png" alt="anh022" class="anh_khong_tdyt">
                    </div>
                    <div class="title_khong_tdyt">Ôi không, chẳng có gì ở đây cả</div>
                    <div class="con_khong_tdyt">Bạn chưa có lịch sử giao dịch nào cả<br>
                        Hãy lướt tìm Raonhanh365 và kiếm cho mình những món hàng yêu thích nhé</div>
                    <div class="btn_khong_tdyt">
                        <a href="/" class="btn-td-yt hd_cspointer font-bold">Về trang chủ</a>
                    </div>
                </div>
            <? } ?>
        </div>
    </section>
    <? include("../includes/inc_new/inc_footer.php") ?>

    <script>
        $('#transaction_history').addClass('menu_active');
        $('.btn-mui-ten').click(function() {
            $('.menu-bot').toggle(500)
        })
    </script>



</body>

</html>