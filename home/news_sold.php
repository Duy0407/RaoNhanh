<?
include('config.php');
include('config.php');
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $id_user = $_COOKIE['UID'];
    $type_user = $_COOKIE['UT'];
    // phan trang
    $url = $_SERVER['REDIRECT_URL'];

    isset($_GET['page']) ? $page = $_GET['page'] : $page = 1;
    $current_page = 10;
    $start = ($page - 1) * $current_page;
    $start = abs($start);
    $sql_limit = "limit $start,$current_page";
    // end phan trang
    if ($type_user == 1) {
        // TỔNG TIN
        $tongtin = new db_query("SELECT new_id FROM `new` WHERE `new_type` = $usertype AND `new_user_id` = $id_user AND `new_buy_sell` = 2 AND `new_cate_id` != 121");
        $result_tongin = mysql_num_rows($tongtin->result);

        // TIN ĐANG ĐĂNG
        $tongtindangdang = new db_query("SELECT new_id FROM `new` WHERE `new_type` = $usertype AND `new_user_id` = $id_user AND `new_buy_sell` = 2 AND `new_cate_id` != 121 AND `da_ban` = 0");
        $result_tongtindangdang = mysql_num_rows($tongtindangdang->result);

        // TIN ĐÃ BÁN
        $all_tindaban = new db_query("SELECT `new_id`, `new_title`, `da_ban`, `new_money`,`sluong_daban`,`tong_sluong`,`new_image`, `new_create_time`, `dia_chi`, `chotang_mphi`, `new_unit`,new_cate_id
                                    FROM `new` WHERE `new_type` = $usertype AND `new_user_id` = $id_user AND `new_buy_sell` = 2 
                                    AND `new_cate_id` != 121 AND `da_ban` = 1 ORDER BY `new_id` DESC $sql_limit");
        $tong_tinban = new db_query("SELECT new_id FROM `new` WHERE `new_type` = $usertype AND `new_user_id` = $id_user AND `new_buy_sell` = 2 AND `new_cate_id` != 121 AND `da_ban` = 1");
        $result_tongtinban = mysql_num_rows($tong_tinban->result);
        // TIN DA AN
        $tongtindaan = new db_query("SELECT new_id FROM `new` WHERE `new_type` = $usertype AND `new_user_id` = $id_user AND `da_ban` = 0 AND `new_buy_sell` = 2 AND `new_cate_id` != 120 AND `new_cate_id` != 121  AND new_active !=1 ");
        $result_tongtindaan = mysql_num_rows($tongtindaan->result);
        // TIN DANG HOAT DONG
        $tongtinhoatdong = new db_query("SELECT new_id FROM `new` WHERE `new_type` = $usertype AND tong_sluong != 0 AND `new_user_id` = $id_user AND `da_ban` = 0 AND `new_buy_sell` = 2 AND `new_cate_id` != 120 AND `new_cate_id` != 121  AND new_active !=0 ");
        $result_tongtinhoatdong = mysql_num_rows($tongtinhoatdong->result);
        // Hết hàng
        $tongsoluong = new db_query("SELECT new_id FROM `new` WHERE `new_user_id` = $id_user AND `new_buy_sell` = 2 
        AND `new_cate_id` != 120 AND `new_cate_id` != 121 AND new_active = 1 AND tong_sluong = 0");
        $result_tongsoluong = mysql_num_rows($tongsoluong->result);
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

    <link rel="stylesheet" type="text/css" href="/css/newCss/news_sold.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/popup.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/box-left_pers_seller_prof.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/news_management.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/m_raonhanhcssnew.css?v=<?= $version ?>" />
</head>

<body>
    <?
    include("../includes/common/inc_header.php"); ?>

    <section class="news_sold news_managenment_post">
        <?php include "../includes/person_sell/inc_sidebar_left.php" ?>

        <div class="box-right">
            <!-- check  title quan ly tin(tat ca tin,tin dang dang,danghd...)  -->
            <?include("../includes/inc_new/check_quanlytin.php")?>
            <!-- end check quan ly tin -->
            <ul class="content-qlt" id="all-posts">
                <? while ($show_tinmua = (mysql_fetch_assoc($all_tindaban->result))) {
                    $avatar_tinthuong = $show_tinmua['new_image'];
                    $avatar_tinthuong = explode(';', $avatar_tinthuong);
                    $id_tin = $show_tinmua['new_id'];
                    $cat_id = $show_tinmua['new_cate_id'];
                ?>
                    <li class="main-content">

                        <div class="chu">
                            <div class="m_box_chu d_flex fl_row w100">
                                <div class="anh">
                                    <p class="text-main-content">ĐÃ BÁN</p>
                                    <div class="w_100_h_100 anh_qltin_df">
                                        <a href="/<?= replaceTitle($show_tinmua['new_title']) ?>-c<?= $id_tin ?>.html">
                                            <img class="img-qlt lazyload" onerror="this.onerror=null; this.src='/images/anh_moi/avatar.png';" src="<?= $avatar_tinthuong[0] ?>">
                                        </a>
                                    </div>
                                </div>
                                <div class="m_box-txttilte d_flex fl_cl w100">
                                    <div class="text-tilte">
                                        <div class="menu_btn_df_dl cus_poi">
                                            <img src="/images/anh_moi/3cham_dl.svg">
                                        </div>
                                        <div class="text-title-qlt">
                                            <a href="/<?= replaceTitle($show_tinmua['new_title']) ?>-c<?= $id_tin ?>.html" class="text-title-qlt text_ellipsis pr_10">
                                                <?= $show_tinmua['new_title'] ?>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="text-btn">
                                        <div class="menu-bot">
                                            <div class="time-qlt d_flex fl_row al_ct">
                                                <img src="/images/m_raonhanh_imgnew/timer.png" alt="Thời gian đăng" class="time_qlt_icon img_16">
                                                <div class="pdl_6"><?= lay_tgian($show_tinmua['new_create_time']) ?></div>
                                            </div>
                                            <div class="m_lct_qlt d_flex fl_row al_ct">
                                                <img src="/images/m_raonhanh_imgnew/location.png" alt="Thời gian đăng" class="time_qlt_icon img_16">
                                                <div class="address-qlt"><?= $show_tinmua['dia_chi'] ?></div>
                                            </div>
                                            <div class="m_tieuthu_qlt d_flex fl_row jtf_spb">
                                                <div class="m_money_qlt">
                                                    <? if ($show_tinmua['chotang_mphi']) { ?>
                                                        <div class="money-qlt">Cho tặng miễn phí</div>
                                                    <? } elseif ($show_tinmua['new_money'] > 0) { ?>
                                                        <div class="money-qlt d_flex fl_row al_ct">
                                                            <div class="pdr_5">
                                                                <?= number_format($show_tinmua['new_money']) ?> <?= $arr_dvtien[$show_tinmua['new_unit']] ?>
                                                            </div>
                                                            <? if ($xacthuc_lket == 1) { ?>
                                                                <!-- <img src="/images/m_raonhanh_imgnew/edit-black.png" alt="sửa" class="m_edit_money img_18 cursor_Pt"> -->
                                                            <? } ?>
                                                        </div>
                                                    <? } else { ?>
                                                        <div class="money-qlt">Liên hệ người bán để hỏi giá</div>
                                                    <? } ?>
                                                </div>
                                                <? if ($xacthuc_lket == 1) { ?>
                                                    <!-- <div class="m_amount_qlt d_flex fl_row al_ct">
                                                        <img src="/images/m_raonhanh_imgnew/Box.png" alt="" class="m_amount_qlt_icon img_18">
                                                        <p class="m_amount_qlt_text pdl_5 pdr_5 p_400_s14_l17">
                                                            Số lượng: <?= $show_tinmua['tong_sluong'] ?>
                                                        </p>
                                                        <img src="/images/m_raonhanh_imgnew/edit-black.png" alt="" class="m_amount_qlt_edit img_18 cursor_Pt">
                                                    </div>
                                                    <div class="m_sold_qlt d_flex fl_row al_ct">
                                                        <img src="/images/m_raonhanh_imgnew/shopping-cart.png" alt="" class="m_sold_qlt_icon img_18 cursor_Pt">
                                                        <p class="m_sold_qlt_text pdl_5 p_400_s14_l17">
                                                            Đã bán: 152k
                                                        </p>
                                                    </div> -->
                                                <? } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="btn_qlt_df btn_qlt_df_chung btn_qlt_df_dbl">
                                <span class="border-dbl img_refresh_sold">
                                    <div class="btn-dbl cus_poi" data="<?= $id_tin ?>" data1="/<?= duong_dan($id_tin, $cat_id) ?>" data2="<?= $xacthuc_lket ?>" onclick="id_dangbanlai(this)">
                                        <img data-src="/images/newImages/rotate-left.png" src="/images/newImages/rotate-left.png" class="rotate-left">
                                        <span class="text-qlt">Đăng bán lại</span>
                                    </div>
                                </span>
                            </div>
                        </div>
                    </li>
                <? } ?>
            </ul>
            <!-- phân trang -->
            <div class="m_phantrang w100 d_flex al_ct jtf_ct">
                <ul class="m_pt_ul d_flex fl_row al_ct">
                    <?= generatePageBar3('', $page, $current_page, $result_tongtinban, $url, '?', '', 'active', 'preview', '<', 'next', '>', '', '', '', ''); ?>
                </ul>
            </div>
            <!--  -->
        </div>
    </section>
    <?
    include("../modals/tbao_tcong.php");
    include("../includes/common_new/popup.php");
    include '../includes/inc_new/inc_footer.php';
    ?>
    <script type="text/javascript" src="/js/style_new/app.js"></script>
    <script type="text/javascript" src="/js/personal_seller_profile.js"></script>
    <script type="text/javascript">
        $(".luu_chung").click(function() {
            $(".dddban").hide();
            $(".popup_resell").hide();
            $(".tbao_tcong_d").hide();
            window.location.reload();
        });

        // ĐĂNG BÁN LẠI
        $('.clickdangbanlai').click(function() {
            var id_tindl = $(this).attr('data');
            var id_linkdl = $(this).attr('data1');
            var id_xcathuclkdl = $(this).attr('data2');

            if (id_xcathuclkdl == 0) {
                $.ajax({
                    type: 'POST',
                    url: '../ajax/updata_tindaban.php',
                    data: {
                        id_tindl: id_tindl
                    },
                    success: function(data) {
                        if (data == "") {
                            $(".tbao_tcong_d .cau_tbao").text("Đăng bán lại thành công");
                            $(".tbao_tcong_d .luu_chung").text("Đóng");
                            $(".tbao_tcong_d").show();
                        } else {
                            alert(data);
                        }
                    }
                })
            } else {
                location.href = id_linkdl;
            }
        });
        $('#management_news').addClass('menu_active');
        $('.menu_btn_df_dl').click(function() {
            $(this).parents('.chu').find('.btn_qlt_df_chung').toggleClass('hid_1200');
        });
    </script>
    <script src="/js/m_raonhanh_new.js"></script>
</body>

</html>