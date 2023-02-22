<?
include('config.php');


if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $id_user = $_COOKIE['UID'];
    $type_user = $_COOKIE['UT'];
    if ($type_user == 1) {
        // phan trang
        $url = $_SERVER['REDIRECT_URL'];

        isset($_GET['page']) ? $page = $_GET['page'] : $page = 1;
        $current_page = 10;
        $start = ($page - 1) * $current_page;
        $start = abs($start);
        $sql_limit = "limit $start,$current_page";
        // end phan trang

        // tổng tất cả tin bán
        $all_tin = new db_query("SELECT `new_id`FROM `new` WHERE `new_type` = $usertype AND `new_user_id` = $id_user
                    AND `new_buy_sell` = 2 AND `new_cate_id` != 120 AND `new_cate_id` != 121 ORDER BY `new_id` DESC $sql_limit");
        $tongtin = new db_query("SELECT new_id FROM `new` WHERE `new_type` = $usertype AND `new_user_id` = $id_user AND `new_buy_sell` = 2 AND `new_cate_id` != 120 AND `new_cate_id` != 121 ");
        $result_tongin = mysql_num_rows($tongtin->result);
        // echo  $new_id;

        $tongtindangdang = new db_query("SELECT new_id FROM `new` WHERE `new_type` = $usertype AND `new_user_id` = $id_user AND `da_ban` = 0 AND `new_buy_sell` = 2 AND `new_cate_id` != 120 
        AND `new_cate_id` != 121 ");
        $result_tongtindangdang = mysql_num_rows($tongtindangdang->result);
        // TIN DANG HOAT DONG
        $tongtinhoatdong = new db_query("SELECT new_id FROM `new` WHERE `new_type` = $usertype AND tong_sluong != 0 AND`new_user_id` = $id_user AND `da_ban` = 0 AND `new_buy_sell` = 2 AND `new_cate_id` != 120 
        AND `new_cate_id` != 121  AND new_active = 1 ");
        $result_tongtinhoatdong = mysql_num_rows($tongtinhoatdong->result);
        // TIN DA AN
        $tongtindaan = new db_query("SELECT new_id, `new_title`, `link_title`,tong_sluong,`sluong_daban` ,`new_cate_id`, `da_ban`,`new_active` ,`new_money`, `new_unit`, `new_image`, `new_create_time`, `dia_chi`,
        `chotang_mphi`, `new_pin_cate`, `new_pin_home`, `new_day_tin` FROM `new` WHERE `new_type` = $usertype AND `new_user_id` = $id_user AND `new_buy_sell` = 2 
        AND `new_cate_id` != 120 AND `new_cate_id` != 121 AND new_active = 0 ");
        $result_tongtindaan = mysql_num_rows($tongtindaan->result);
        // 
        $tong_tinban = new db_query("SELECT new_id FROM `new` WHERE `new_user_id` = $id_user AND `da_ban` != 0 AND `new_buy_sell` = 2 
        AND `new_cate_id` != 120 AND `new_cate_id` != 121 ");
        $result_tongtinban = mysql_num_rows($tong_tinban->result);
        // Hết hàng
        $tongsoluong = new db_query("SELECT new_id FROM `new` WHERE `new_user_id` = $id_user AND `new_buy_sell` = 2 AND `new_cate_id` != 120 AND `new_cate_id` != 121 AND new_active = 1 AND tong_sluong = 0");
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
    <link rel="stylesheet" type="text/css" href="/css/newCss/box-left_pers_seller_prof.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/popup.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/news_management.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/m_raonhanhcssnew.css?v=<?= $version ?>" />

</head>

<body>
    <? include("../includes/common/inc_header.php"); ?>
    <section class="news_managenment_post d_flex tca_tdang_cnhan">
        <?php include "../includes/person_sell/inc_sidebar_left.php" ?>
        <div class="box-right">
            <!-- <? if ($xacthuc_lket != 1) { ?>
                <div class="benphai_tren">
                    <p class="tieude_lket">Để theo dõi tình trạng đơn hàng vui lòng xác thực tài khoản <a href="/xac-thuc-tai-khoan-ngan-hang.html" class="xact_lket cr_weight">Xác thực</a></p>
                </div>
            <? } ?> -->

            <div class="box_rightdf" data="<?= $id_user ?>" data2="<?= $type_user ?>">
                <!-- check  title quan ly tin(tat ca tin,tin dang dang,danghd.... trong)  -->
                <? include("../includes/inc_new/check_quanlytin.php") ?>
                <!-- end check quan ly tin -->
                <ul class="content-qlt" id="all-posts">
                    <? while ($showtin_daan = (mysql_fetch_assoc($tongtindaan->result))) {
                        $avatar_tinthuong = $showtin_daan['new_image'];
                        $avatar_tinthuong = explode(';', $avatar_tinthuong);
                        $id_tin = $showtin_daan['new_id'];
                        $cat_id = $showtin_daan['new_cate_id'];
                        $daban = $showtin_daan['da_ban'];
                    ?>
                        <li class="main-content main_contentdf">
                            <div class="chu">
                                <div class="m_box_chu d_flex fl_row w100">
                                    <div class="anh anh_qltin_df">
                                        <? if ($showtin_daan['da_ban'] == 0) { ?>
                                            <? if ($showtin_daan['new_pin_home'] != 0 || $showtin_daan['new_pin_cate'] != 0 || $showtin_daan['new_day_tin'] != "") { ?>
                                                <p class="text-main-content-ghim">ĐANG GHIM</p>
                                            <? } ?>
                                            <!-- het hang -->
                                            <? if ($showtin_daan['tong_sluong'] == 0) { ?>
                                                <p class="hethang_img">Hết hàng</p>
                                            <? } ?>
                                            <!-- het hang -->
                                            <? if ($showtin_daan['new_active'] == 0) { ?>
                                                <p class="dangan_img">Tin đang ẩn</p>
                                            <? } ?>
                                        <? } else { ?>
                                            <p class="text-main-content">ĐÃ BÁN</p>
                                        <? } ?>
                                        <a href="/<?= replaceTitle($showtin_daan['link_title']) ?>-c<?= $id_tin ?>.html">
                                            <img class="img-qlt lazyload" src="<?= $avatar_tinthuong[0] ?>" onerror="this.src=`/images/anh_moi/dai_dien_avt.png`">
                                        </a>
                                        <img src="/images/m_raonhanh_imgnew/tthd.png" alt="" class="m_qlt_hd img22">
                                    </div>
                                    <div class="m_box-txttilte d_flex fl_cl w100">
                                        <div class="text-tilte d_flex fl_row al_ct jtf_spb">
                                            <a href="/<?= replaceTitle($showtin_daan['link_title']) ?>-c<?= $id_tin ?>.html">
                                                <div class="text-title-qlt text_ellipsis pr_10"><?= $showtin_daan['new_title'] ?></div>
                                            </a>
                                        </div>
                                        <div class="text-btn">
                                            <div class="menu-bot">
                                                <div class="time-qlt d_flex fl_row al_ct">
                                                    <img src="/images/m_raonhanh_imgnew/timer.png" alt="Thời gian đăng" class="time_qlt_icon img_16">
                                                    <div class="pdl_6"><?= lay_tgian($showtin_daan['new_create_time']); ?></div>
                                                </div>
                                                <div class="m_lct_qlt d_flex fl_row al_ct">
                                                    <img src="/images/m_raonhanh_imgnew/location.png" alt="Thời gian đăng" class="time_qlt_icon img_16">
                                                    <div class="address-qlt pdl_6"><?= $showtin_daan['dia_chi'] ?></div>
                                                </div>
                                                <div class="m_tieuthu_qlt d_flex fl_row jtf_spb">
                                                    <div class="m_money_qlt">
                                                        <? if ($showtin_daan['chotang_mphi'] == 1) { ?>
                                                            <div class="money-qlt">Cho tặng miễn phí</div>
                                                        <? } elseif ($showtin_daan['new_money'] > 0) { ?>
                                                            <div class="money-qlt d_flex fl_row al_ct ">
                                                                <div class="pdr_5">
                                                                    <?= number_format($showtin_daan['new_money']) ?> <?= $donvitien[$showtin_daan['new_unit']] ?>
                                                                </div>
                                                                <? if ($xacthuc_lket == 1) { ?>
                                                                    <img src="/images/m_raonhanh_imgnew/edit-black.png" alt="" class="m_edit_money img_18 cursor_Pt ">
                                                                <? } ?>
                                                            </div>
                                                        <? } elseif ($showtin_daan['new_money'] == 0) { ?>
                                                            <div class="money-qlt">Liên hệ người bán để hỏi giá</div>
                                                        <? } ?>
                                                    </div>
                                                    <!-- xac thuc thanh toan dam bao -->
                                                    <? if ($xacthuc_lket == 1) { ?>
                                                        <div class="m_amount_qlt d_flex fl_row al_ct">
                                                            <img src="/images/m_raonhanh_imgnew/Box.png" alt="" class="m_amount_qlt_icon img_18">
                                                            <p class="m_amount_qlt_text pdl_5 pdr_5 p_400_s14_l17">
                                                                Số lượng: <?= $showtin_daan['tong_sluong'] ?>
                                                            </p>
                                                            <img src="/images/m_raonhanh_imgnew/edit-black.png" alt="" class="m_amount_qlt_edit img_18 cursor_Pt">
                                                        </div>
                                                        <div class="m_sold_qlt d_flex fl_row al_ct">
                                                            <img src="/images/m_raonhanh_imgnew/shopping-cart.png" alt="" class="m_sold_qlt_icon img_18 cursor_Pt">
                                                            <p class="m_sold_qlt_text pdl_5 p_400_s14_l17">
                                                                Đã bán: <?= $showtin_daan['sluong_daban'] ?>
                                                            </p>
                                                        </div>
                                                    <? } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <? if ($showtin_daan['da_ban'] == 1) { ?>
                                    <!-- <div class="btn_qlt_df btn_qlt_df_chung btn_qlt_df_dbl hid_1200">
                                        <span class="border-dbl">
                                            <div class="btn-dbl btn_dbldf cus_poi d_flex fl_row al_ct" data="<?= $id_tin ?>">
                                                <img src="/images/m_raonhanh_imgnew/eye.png" alt="" class="m_antin_qlt img_20">
                                                <span class="text-qlt">Hiện tin</span>
                                            </div>
                                        </span>
                                    </div> -->
                                    <div class="m_dangbanlai">
                                        <div class="btn_dangbanlai cursor_Pt" data="<?= $id_tin ?>" data1="/<?= duong_dan($id_tin, $cat_id) ?>" data2="<?= $xacthuc_lket ?>" onclick="id_dangbanlai(this)">
                                            <img src="/images/m_raonhanh_imgnew/refresh.png" alt="" class="btn_dangbanlai_icon img20">
                                            <p class="btn_dangbanlai_txt">Đăng bán lại</p>
                                        </div>
                                    </div>
                                <? } else { ?>
                                    <div class="btn_qlt_df btn_qlt_df_chung btn_qlt_df_3 hid_1200">
                                        <!-- <span class="border-ddldb btn_qlt_df_3_d">
                                                <img src="/images/m_raonhanh_imgnew/eye-slash.png" alt="" class="m_antin_qlt img_20">
                                                <span class="df_daban1">Ẩn tin</span>
                                        </span> -->
                                        <div class="m_anhientin ctn_anhien_<?= $id_tin ?>" data="<?= $id_tin ?>" data1="<?= $showtin_daan['new_active'] ?>">
                                            <!-- an -->
                                            <? if ($showtin_daan['new_active'] == 1) { ?>
                                                <span class="m_antin cursor_Pt">
                                                    <div class="d_flex fl_row al_ct">
                                                        <img src="/images/m_raonhanh_imgnew/eye-slash.png" alt="Ẩn tin" class="m_antin_qlt img_20 ">
                                                        <span class="m_antin_btnantin">Ẩn tin</span>
                                                    </div>
                                                </span>
                                            <? } else { ?>
                                                <!-- hien -->
                                                <span class="m_antin cursor_Pt">
                                                    <div class="d_flex fl_row al_ct">
                                                        <img src="/images/m_raonhanh_imgnew/eye.png" alt="Hiện tin" class="m_hientin_qlt img_20 ">
                                                        <span class="m_hientin_btnhientin">Hiện tin</span>
                                                    </div>
                                                </span>
                                            <? } ?>
                                        </div>
                                        <? if ($showtin_daan['new_pin_home'] == 0 && $showtin_daan['new_pin_cate'] == 0 && $showtin_daan['new_day_tin'] == "") { ?>
                                            <? if ($xacthuc_lket == 1) { ?>
                                                <span class="border-gt btn_qlt_df_3_d <?= ($xacthuc_lket == 1 && $showtin_daan['new_active'] == 0) ? "op0_5" : "aaaa" ?>">
                                                    <div class="btn_bnh_cn btn-gt cus_poi text-gt" data="<?= $id_tin ?>">
                                                        <!-- <img data-src="/images/newImages/fluent_pin-48-regular.png" src="/images/newImages/fluent_pin-48-regular.png" class="fluent_pin"> -->
                                                        <img src="/images/m_raonhanh_imgnew/cartspeed.png" alt="Bán nhanh hơn" class="m_bannhanhhon_qlt img_18">
                                                        <span class="m_txt_bannh text-gt" data="<?= $id_tin ?>">Bán nhanh hơn</span>
                                                    </div>
                                                </span>
                                            <? } ?>
                                        <? } ?>
                                        <span class="border-st btn_qlt_df_3_d">
                                            <a href="/<?= duong_dan($id_tin, $cat_id) ?>">
                                                <div class="btn-st cus_poi d_flex fl_row ">
                                                    <img data-src="/images/m_raonhanh_imgnew/edit-cam.png" src="/images/newImages/edit-2.png" class="edit-news img_18">
                                                    <span class="text-st">Sửa tin</span>
                                                </div>
                                            </a>
                                        </span>
                                    </div>
                                <? } ?>
                            </div>
                        </li>
                    <? } ?>
                </ul>
            </div>
            <!-- phân trang -->
            <div class="m_phantrang w100 d_flex al_ct jtf_ct">
                <ul class="m_pt_ul d_flex fl_row al_ct">
                    <?= generatePageBar3('', $page, $current_page, $result_tongtindaan, $url, '?', '', 'active', 'preview', '<', 'next', '>', '', '', '', ''); ?>
                </ul>
            </div>
            <!--  -->
        </div>
        <!-- <div class="df_ko_dno duy">
                <div class="sub_d_none duy">
                    <img src="../images/anh_moi/anh_dulieutrong.png" alt="" class="d_flex img_trong">
                    <h1 class="h1_text">Ôi không, chẳng có gì ở đây cả</h1>
                    <p class="text_rong">Bạn chưa đăng tin nào cả <br>
                        Đăng bán những món đồ hấp dẫn ngay thôi nào</p>
                    <div class="text_centerdf_dl">
                        <a href="/dang-tin-san-pham.html" class="">Đăng tin</a>
                    </div>
                </div>
            </div> -->
    </section>
    <!-- popup xac nhan an tin dang -->
    <div id="m_xn_anhientd" class="d_none">
        <div class=" w100 h100 d_flex fl_cl al_ct jtf_ct">
            <div class="container_anhientd">
                <div class="anhientd_title d_flex fl_cl w100">
                    <p class="title_antd p_600_s20_l30 w100">Ẩn tin đăng</p>
                </div>
                <div class="anhientd_content w100 d_flex fl_cl">
                    <p class="content_hientd p_400_s14_l21 w100">
                        Tin đăng của bạn sẽ hiện trên trang chủ,
                        mọi người sẽ tìm thấy tin đăng của bạn.
                        bạn muốn tiếp tục?</p>
                </div>
                <div class="anhientd_footer w100 d_flex fl_row">
                    <div class=" footer_button_huy">
                        <p class="d_flex al_ct jtf_ct aht_ft_huy_p p_600_s14_l21 cl_cam boder_cam cursor_Pt bg_trang rdu10">
                            Hủy
                        </p>
                    </div>
                    <div class="footer_button_an">
                        <p class=" d_flex al_ct jtf_ct aht_ft_p p_600_s14_l21 cl_fffff rdu10 bgr_cam cursor_Pt" data="" data1="" onclick="anhientin(this)">
                            Ẩn tin
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end popup xac nhan an tin dang -->
    <!-- popup chinh sua nhanh -->
    <div id="m_cstinnhanh" class="d_none">
        <div class="d_flex w100 h100 al_ct jtf_ct">
            <div class="container_cstinnhanh">
                <div class="ctn_cstn_box1 d_flex fl_row al_ct">
                    <img src="/images/m_raonhanh_imgnew/anhavatar.png" alt="" class="cstn_b1_img img80">
                    <p class="cstn_b1_text">Bán nhà mặt phố ở định công hoàng mai Hà Nội Việt Nam</p>
                </div>
                <div class="ctn_cstn_box2 d_flex fl_cl">
                    <!--  -->
                    <div class="cstn_b2_title d_flex fl_row al_ct w100">
                        <p class="cstn_b2_tt1 txt_al_ct">
                            Loại
                        </p>
                        <div class="cstn_b2_tt2">
                            <p class="cstn_b2_tt2_text w100 txt_al_ct">Số lượng trong kho</p>
                            <div class="cstn_b2_tt2_btn">
                                <p class="cstn_b2_tt2_btntext1">Nhập</p>
                            </div>
                        </div>
                        <div class="cstn_b2_tt3">
                            <p class="cstn_b2_tt3_text w100 txt_al_ct">Giá bán <span class="cl_red">*</span></p>
                            <div class="cstn_b2_tt3_btn">
                                <p class="cstn_b2_tt3_btntext1">Giá</p>
                                <p class="cstn_b2_tt3_btntext2">VNĐ</p>
                            </div>
                        </div>
                        <p class="cstn_b2_tt4 txt_al_ct">
                            Xóa
                        </p>
                    </div>
                    <!--  -->
                    <div class="cstn_b2_content d_flex fl_cl al_ct">
                        <!--  -->
                        <div class="b2_ct_fr d_flex fl_row al_ct w100">
                            <div class="cstn_b2_ct1 ">
                                <p class="cstn_b2_ct1_txt p_400_s16_l19 cl_474747">Đỏ, XL</p>
                            </div>
                            <div class="cstn_b2_ct2">
                                <input type="text" name="nhapsoluong" value="" class="cstn_b2_ct2_nhapsl p_400_s14_l17 cl_99999" placeholder="Nhập">
                            </div>
                            <div class="cstn_b2_ct3">
                                <div class="cstn_b2_ct3_box d_flex fl_row al_ct">
                                    <input type="text" name="nhapgia" value="" class="cstn_b2_ct3_gia p_400_s14_l17 cl_99999" placeholder="Giá">
                                    <p class="cstn_b2_ct3_chontien p_400_s14_l17 cl_474747">VNĐ</p>
                                    <!-- chon loai tien  -->
                                    <!-- <div class="m_chontien d_none">
                                                <div class="d_flex fl_cl al_ct">
                                                    <p class="m_sl_mn_VND p_400_s14_l17 cl_474747">VNĐ</p>
                                                    <p class="m_sl_mn_USD p_400_s14_l17 cl_474747">USD</p>
                                                    <p class="m_sl_mn_EURO p_400_s14_l17 cl_474747">EURO</p>
                                                </div>
                                            </div>   -->
                                    <!--  -->
                                </div>
                            </div>
                            <div class="cstn_b2_ct4">
                                <img src="/images/m_raonhanh_imgnew/delete_red.png" alt="" class="cstn_b2_ct4_icon img20 cursor_Pt">
                            </div>
                        </div>
                        <!--  -->
                    </div>
                </div>
                <div class="ctn_cstn_box3 d_flex al_ct w100 jtf_ct">
                    <button type="button" class="ctn_cstn_b3close cl_cam bg_trang p_600_s15_l18 rdu5 boder_cam cursor_Pt">
                        Đóng
                    </button>
                    <button type="button" class="ctn_cstn_b3update cl_fffff p_600_s15_l18 rdu5 bgr_cam boder_none mgr_l_20 cursor_Pt">
                        Cập nhập
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- end chinh sua nhanh -->
    <!-- -- đăng bán lại ---  -->
    <div id="popup_resell_over" class="popup_resell">
        <!-- Modal content -->
        <div class="box-check">
            <div class="modal-content">
                <div class="title-modal">
                    <p class="text_title_modal">Đăng bán lại</p>
                    <span class="close dong_ddau"><img src="/images/newImages/close.png"></span>
                </div>
                <p class="text-check-mail">
                    Tin của bạn sẽ được đăng lại trên hệ thống Raonhanh365.
                    Bạn có muốn tiếp tục?
                </p>
                <div class="btn_modal">
                    <p class="btn-cancel input_form huy_ddau_ban">Huỷ bỏ</p>
                    <p class="btn-success input_form clickdangbanlai" data="">Đồng ý</p>
                </div>
            </div>
        </div>
    </div>
    <!-- -- end bán lại ---  -->
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
        $(".luu_chung").click(function() {
            $(".dddban").hide();
            $(".popup_resell").hide();
            $(".tbao_tcong_d").hide();
            window.location.reload();
        });
        $('#management_news').addClass('menu_active')
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
        //  ĐÃ ban
        $('.click_dongyban').click(function() {
            var id_tin = $(this).attr('data');
            var fd = new FormData();
            fd.append('id_tin', id_tin);
            $.ajax({
                type: 'POST',
                url: '/ajax/updata_tindaban.php',
                data: fd,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data == "") {
                        var sp_xd = `<span style="width: 100%; float: left" >Đánh dấu đã bán thành công!</span>
                                    <span style="width: 100%; float: left" >Tin của bạn sẽ được ẩn sau vài phút.</span>
                                    <span style="width: 100%; float: left" >Vui lòng kiểm tra lại mục Tin đã bán.</span>`;
                        $(".tbao_tcong_d .cau_tbao").html(sp_xd);
                        $(".tbao_tcong_d .luu_chung").text("Đóng");
                        $(".tbao_tcong_d").show();
                    } else {
                        alert(data);
                    }
                }
            })
        });
        //
        $('.df_daban').click(function() {
            var dt1 = $(this).attr('data');
            var dt2 = $(this).attr('data2');
            $(".danhdaudaban .click_dongyban").attr("data", dt1);
            $(".danhdaudaban .click_dongyban").attr("data1", dt2);
            $(".danhdaudaban .text_title_modal").html("Đánh dấu là đã bán");
            $(".danhdaudaban .text-check-mail").html("Tin đăng sẽ bị ẩn khỏi trang chủ và tất cả các mục con của Raonhanh365. Đồng thời các gói quảng cáo bạn đã mua cho tin đăng này sẽ không được bảo lưu trừ khi bạn dùng chức năng “Đăng bán lại”. Bạn có muốn tiếp tục?");
            $('.danhdaudaban').removeClass('d_noned');
        });

        function click_d() {
            $('.danhdaudaban').addClass('d_noned');
        };

        $('.menu_btn_df_dl').click(function() {
            $(this).parents('.chu').find('.btn_qlt_df_chung').toggleClass('hid_1200');
        });
    </script>
    <script src="/js/m_raonhanh_new.js"></script>
</body>

</html>