<?
include('config.php');
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
    <link rel="stylesheet" type="text/css" href="/css/newCss/box-left_pers_seller_prof.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/popup.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/news_management.css?v=<?= $version ?>" />

</head>

<body>
    <? include("../includes/common/inc_header.php"); ?>
    <section class="news_managenment_post d_flex tca_tdang_cnhan">
        <?php include "../includes/person_sell/inc_sidebar_left.php" ?>
        <div class="box-right">
                
            <!-- <div class="box_rightdf" data="" data2="">
                <div class="scroll themvao">
                    <div class="title-qlt">
                        <span class="all-posts">
                            <a class="text-title-qlt active">Tất cả tin đăng </a>
                        </span>
                        <span class="postting">
                            <a href="/ho-so-nguoi-ban-ca-nhan/quan-ly-tin/tin-dang-dang.html" class="text-title-qlt">Tin còn hạn </a>
                        </span>
                        <span class="news-sold">
                            <a href="/ho-so-nguoi-ban-ca-nhan/quan-ly-tin/tin-da-ban.html" class="text-title-qlt">Tin hết hạn</a>
                        </span>
                    </div>
                        <a class="nbanm_dhang" href="/quan-ly-don-hang-ca-nhan-mua.html">Quản lý đơn hàng</a>
                </div>
                <ul class="content-qlt" id="all-posts">
                   
                        <li class="main-content main_contentdf">
                            <div class="anh anh_qltin_df">
                                        <p class="text-main-content-ghim">ĐANG GHIM</p>
                                    <p class="text-main-content">HẾT HẠN</p>
                                <a href=""><img class="img-qlt lazyload" src=""></a>
                            </div>
                            <div class="chu">
                                <div class="text-tilte">
                                    <div class="menu_btn_df_dl cus_poi">
                                        <img src="/images/anh_moi/3cham_dl.svg" alt="">
                                    </div>
                                    <a href="">
                                        <div class="text-title-qlt"></div>
                                    </a>
                                </div>
                                <div class="text-btn">
                                    <div class="menu-bot">
                                        <div class="time-qlt">
                                        </div>
                                        <div class="address-qlt"></div>

                                            <div class="money-qlt">Cho tặng miễn phí</div>
                                            <div class="money-qlt"></div>
                                            <div class="money-qlt">Liên hệ người bán để hỏi giá</div>
                                    </div>
                                </div>

                                    <div class="btn_qlt_df btn_qlt_df_chung btn_qlt_df_dbl hid_1200">
                                        <span class="border-dbl">
                                            <div class="btn-dbl btn_dbldf cus_poi" data="">
                                                <span class="text-qlt">Chi tiết dự thầu</span>
                                            </div>
                                        </span>
                                    </div>
                                    <div class="btn_qlt_df btn_qlt_df_chung btn_qlt_df_3 hid_1200">
                                        <span class="border-ddldb btn_qlt_df_3_d">
                                            <div class="cus_poi df_daban" data="" data2="">
                                                <span class="df_daban1">Xem kết quả</span>
                                            </div>
                                        </span>

                                            
                                        <span class="border-st btn_qlt_df_3_d">

                                            
                                        </span>
                                    </div>
                            </div>
                        </li>
                </ul>
            </div> -->
        </div>
        
    </section>

    <!-- -- đánh dấu là đã bán ---  -->
    <div id="danhdaudaban" class="danhdaudaban d_noned">
        <div class="danhdaudaban_ovl sh_cursor" onclick="click_d()"></div>
        <div class="box-check">
            <div class="modal-content modal_content_df">
                <div class="title_modal_dfpp">
                    <p class="text_title_modal">Đánh dấu là đã bán</p>
                    <span class="close_popup close sh_cursor" onclick="click_d()"><img src="/images/anh_moi/close_popup.png"></span>
                </div>
                <p class="text-check-mail">Tin đăng sẽ bị ẩn khỏi trang chủ và tất cả các mục con của Raonhanh365. Đồng thời các gói quảng cáo bạn đã mua cho tin đăng này sẽ không được bảo lưu trừ khi bạn dùng chức năng “Đăng bán lại”. Bạn có muốn tiếp tục?</p>
                <div class="btn_modal">
                    <a href="" class="btn-cancel input_form">Huỷ bỏ</a>
                    <div class="btn-success input_form sh_cursor click_dongyban" data="" data1="">Đồng ý</div>

                </div>
            </div>
        </div>
    </div>

    <?
    include("../modals/tbao_tcong.php");
    include("../includes/common_new/popup.php");
    include("../includes/inc_new/inc_footer.php");
    ?>
    <script type="text/javascript" src="/js/personal_seller_profile.js"></script>

    <script type="text/javascript">
        
    </script>
</body>

</html>