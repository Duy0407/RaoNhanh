<?
include('config.php');

if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $id_user = $_COOKIE['UID'];
    $type_user = $_COOKIE['UT'];
    if ($type_user == 1 || $type_user == 5) {
        $type_list = getValue('typelist', 'int', 'GET', 0);
        // phân trang
        if ($type_list > 0) {
            $url = $_SERVER['REDIRECT_URL'] . "?typelist=" . $type_list;
        } else {
            $url = $_SERVER['REDIRECT_URL'];
        }
        isset($_GET['page']) ? $page = $_GET['page'] : $page = 1;
        $current_page = 10;
        $start = abs(($page - 1) * $current_page);
        $limit = "LIMIT $start,$current_page";
        // 
        $time = time();
        // ds tin show

        switch ($type_list) {
            case 1: // tin còn hạn
                $all_tin = new db_query("SELECT new.`new_id`,`new_title`,`link_title`,`new_cate_id`,`da_ban`,`new_money`,`gia_kt`,`new_unit`,`new_image`,`new_create_time`,`dia_chi`,`chotang_mphi`,`new_pin_cate`,`new_pin_home`,`new_active`,`han_su_dung`
                FROM `new` LEFT JOIN `new_description` ON `new`.`new_id` = `new_description`.`new_id`
                WHERE `new_type` = $usertype AND `new_user_id` = $id_user AND `new_buy_sell` = 1 AND `new_cate_id` != 120 AND `new_cate_id` != 121 AND `new_active` = 1 AND `han_su_dung` > $time ORDER BY `new_id` DESC $limit");
                break;
            case 2: // tin hết hạn
                $all_tin = new db_query("SELECT new.`new_id`,`new_title`,`link_title`,`new_cate_id`,`da_ban`,`new_money`,`gia_kt`,`new_unit`,`new_image`,`new_create_time`,`dia_chi`,`chotang_mphi`,`new_pin_cate`,`new_pin_home`,`new_active`,`han_su_dung`
                FROM `new` LEFT JOIN `new_description` ON `new`.`new_id` = `new_description`.`new_id`
                WHERE `new_type` = $usertype AND `new_user_id` = $id_user AND `new_buy_sell` = 1 AND `new_cate_id` != 120 AND `new_cate_id` != 121 AND `new_active` = 1 AND `han_su_dung` <= $time ORDER BY `new_id` DESC $limit");
                break;
            case 3: // tin ẩn
                $all_tin = new db_query("SELECT new.`new_id`,`new_title`,`link_title`,`new_cate_id`,`da_ban`,`new_money`,`gia_kt`,`new_unit`,`new_image`,`new_create_time`,`dia_chi`,`chotang_mphi`,`new_pin_cate`,`new_pin_home`,`new_active`,`han_su_dung`
                FROM `new` LEFT JOIN `new_description` ON `new`.`new_id` = `new_description`.`new_id`
                WHERE `new_type` = $usertype AND `new_user_id` = $id_user AND `new_buy_sell` = 1 AND `new_cate_id` != 120 AND `new_cate_id` != 121 AND (`new_active` = 0 OR da_ban = 1) ORDER BY `new_id` DESC $limit");
                break;
            default: // tất cả tin mua
                $type_list = 0;
                $all_tin = new db_query("SELECT new.`new_id`,`new_title`,`link_title`,`new_cate_id`,`da_ban`,`new_money`,`gia_kt`,`new_unit`,`new_image`,`new_create_time`,`dia_chi`,`chotang_mphi`,`new_pin_cate`,`new_pin_home`,`new_active`,`han_su_dung`
                FROM `new` LEFT JOIN `new_description` ON `new`.`new_id` = `new_description`.`new_id`
                WHERE `new_type` = $usertype AND `new_user_id` = $id_user AND `new_buy_sell` = 1 AND `new_cate_id` != 120 AND `new_cate_id` != 121 ORDER BY `new_id` DESC $limit");
                break;
        }
        // tất cả tin mua
        $tongtin = new db_query("SELECT new_id FROM `new` WHERE `new_type` = $usertype AND `new_user_id` = $id_user AND `new_buy_sell` = 1 AND `new_cate_id` != 120 AND `new_cate_id` != 121 ");
        $result_tongin = mysql_num_rows($tongtin->result);
        // tin mua còn hạn
        $tinconhan = new db_query("SELECT new.new_id FROM `new` LEFT JOIN `new_description` ON new.new_id=new_description.new_id WHERE `new_type` = $usertype AND `new_user_id` = $id_user AND `new_buy_sell` = 1 AND `new_cate_id` != 120 AND `new_cate_id` != 121 AND `new_active` = 1 AND `han_su_dung` > $time");
        $tinconhan = mysql_num_rows($tinconhan->result);
        // tin mua hết hạn
        $tinhethan = new db_query("SELECT new.new_id FROM `new` LEFT JOIN `new_description` ON new.new_id=new_description.new_id WHERE `new_type` = $usertype AND `new_user_id` = $id_user AND `new_buy_sell` = 1 AND `new_cate_id` != 120 AND `new_cate_id` != 121 AND `new_active` = 1 AND `han_su_dung` <= $time");
        $tinhethan = mysql_num_rows($tinhethan->result);
        // tin mua đang ẩn
        $tinan = new db_query("SELECT new_id FROM `new` WHERE `new_type` = $usertype AND `new_user_id` = $id_user AND `new_buy_sell` = 1 AND `new_cate_id` != 120 AND `new_cate_id` != 121 AND (`new_active` = 0 OR da_ban = 1)");
        $tinan = mysql_num_rows($tinan->result);
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

    <title>Quản lý tin mua | RAONHANH365.VN</title>
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
    <section class="news_managenment_post d_flex tca_tdang_cnhan<?= ($type_user == 5) ? " hs_df_1" : "" ?>">
        <?php if ($type_user == 1) {
            include "../includes/person_sell/inc_sidebar_left.php";
        } else {
            include "../includes/common/inc_container_box_left_dn_new.php";
        }
        ?>
        <div class="box-right<?= ($type_user == 5) ? " khoiphai_quanly_df" : "" ?>" id="m_boxright_qltm">
            <div class="box_rightdf" data="<?= $id_user ?>" data2="<?= $type_user ?>">
                <div class="scroll themvao">
                    <div class="title-qlt">
                        <span class="all-posts">
                            <a href="/ho-so-<?= ($type_user == 1) ? "nguoi-ban-ca-nhan/" : "" ?>quan-ly-tin-mua.html" class="text-title-qlt <?= ($type_list == 0) ? "active" : "" ?>">Tất cả tin đăng (<?= $result_tongin; ?>)</a>
                        </span>
                        <span class="postting">
                            <a href="/ho-so-<?= ($type_user == 1) ? "nguoi-ban-ca-nhan/" : "" ?>quan-ly-tin-mua/tin-con-han.html" class="text-title-qlt <?= ($type_list == 1) ? "active" : "" ?>">Tin còn hạn (<?= $tinconhan ?>)</a>
                        </span>
                        <span class="news-sold">
                            <a href="/ho-so-<?= ($type_user == 1) ? "nguoi-ban-ca-nhan/" : "" ?>quan-ly-tin-mua/tin-het-han.html" class="text-title-qlt <?= ($type_list == 2) ? "active" : "" ?>">Tin hết hạn (<?= $tinhethan ?>)</a>
                        </span>
                        <span class="news-sold">
                            <a href="/ho-so-<?= ($type_user == 1) ? "nguoi-ban-ca-nhan/" : "" ?>quan-ly-tin-mua/tin-dang-an.html" class="text-title-qlt <?= ($type_list == 3) ? "active" : "" ?>">Tin đang ẩn (<?= $tinan ?>)</a>
                        </span>
                    </div>
                </div>
                <ul class="content-qlt" id="all-posts">
                    <? while ($showtin_nguoiban = (mysql_fetch_assoc($all_tin->result))) {
                        $avatar_tinthuong = $showtin_nguoiban['new_image'];
                        $avatar_tinthuong = explode(';', $avatar_tinthuong);
                        $id_tin = $showtin_nguoiban['new_id'];
                        $cat_id = $showtin_nguoiban['new_cate_id'];
                        $daban = $showtin_nguoiban['da_ban'];
                    ?>
                        <li class="main-content main_contentdf">
                            <div class="chu">
                                <div class="box_chu d_flex fl_row al_ct">
                                    <div class="anh anh_qltin_df">
                                        <? if ($showtin_nguoiban['new_active'] == 1) { ?>
                                            <? if ($showtin_nguoiban['han_su_dung'] <= $time) { ?>
                                                <p class="n_hethan">HẾT HẠN</p>
                                            <? } else { ?>
                                                <p class="text-main-content n_conhan">CÒN HẠN</p>
                                            <? } ?>
                                        <? } else { ?>
                                            <p class="text-main-content n_tinan">TIN ĐANG ẨN</p>
                                        <? } ?>
                                        <a href="/<?= replaceTitle($showtin_nguoiban['link_title']) ?>-ct<?= $id_tin ?>.html">
                                            <img class="img-qlt lazyload" src="<?= $avatar_tinthuong[0] ?>" onerror="this.src=`/images/anh_moi/dai_dien_avt.png`">
                                        </a>
                                    </div>
                                    <div class="box_txttitle d_flex fl_cl">
                                        <div class="text-tilte">
                                            <!-- <div class="menu_btn_df_dl cus_poi">
                                                <img src="/images/anh_moi/3cham_dl.svg" alt="">
                                            </div> -->
                                            <a href="/<?= replaceTitle($showtin_nguoiban['link_title']) ?>-ct<?= $id_tin ?>.html">
                                                <div class="text-title-qlt text_ellipsis"><?= $showtin_nguoiban['new_title'] ?></div>
                                            </a>
                                        </div>
                                        <div class="text-btn">
                                            <div class="menu-bot">
                                                <div class="time-qlt d_flex fl_row al_ct">
                                                    <img src="/images/m_raonhanh_imgnew/timer.png" alt="Thời gian đăng" class="time_qlt_icon img_16">
                                                    <p class="pdl_6"><?= lay_tgian($showtin_nguoiban['new_create_time']) ?></p>
                                                </div>
                                                <div class="m_lct_qlt d_flex fl_row al_ct">
                                                    <img src="/images/m_raonhanh_imgnew/location.png" alt="Thời gian đăng" class="time_qlt_icon img_16">
                                                    <p class="address-qlt pdl_6"><?= $showtin_nguoiban['dia_chi'] ?></p>
                                                </div>

                                                <? if ($showtin_nguoiban['new_money'] > 0 && $showtin_nguoiban['gia_kt'] > 0) { ?>
                                                    <div class="money-qlt"><?= number_format($showtin_nguoiban['new_money']) ?> - <?= number_format($showtin_nguoiban['gia_kt']) ?> <?= $arr_dvtien[$showtin_nguoiban['new_unit']] ?></div>
                                                <? } elseif ($showtin_nguoiban['new_money'] > 0) { ?>
                                                    <div class="money-qlt">Từ <?= number_format($showtin_nguoiban['new_money']) ?> <?= $arr_dvtien[$showtin_nguoiban['new_unit']] ?></div>
                                                <? } else { ?>
                                                    <div class="money-qlt">Đến <?= number_format($showtin_nguoiban['gia_kt']) ?> <?= $arr_dvtien[$showtin_nguoiban['new_unit']] ?></div>
                                                <? } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="btn_qlt_df  btn_qlt_df_chung btn_qlt_df_3 hid_1200  m_btn_qltm_box">
                                    <? if ($showtin_nguoiban['new_active'] == 1) { ?>
                                        <span class="border-dbl btn_qlt_df_3_d m_dsnt">
                                            <a href="/danh-sach-nha-thau.html?new_id=<?= $id_tin ?>" class="a_dsnt">
                                                <div class="btn-dsnt btn_dbldf cus_poi" data="<?= $id_tin ?>">
                                                    <img data-src="/images/newImages/n_dsnt.svg" src="/images/newImages/n_dsnt.svg" class="rotate-left">
                                                    <span class="text-qlt txt_tm-dsnt">Danh sách nhà thầu</span>
                                                </div>
                                            </a>
                                        </span>
                                        <? if ($showtin_nguoiban['da_ban'] == 1 || $showtin_nguoiban['han_su_dung'] <= $time) { ?>
                                            <span class="border-dbl btn_qlt_df_3_d m_tm_btndangml">
                                                <div class="btn-dbl btn_dbldf cus_poi tm_btndangml_id" data="<?= $id_tin ?>" data-update="<?= ($showtin_nguoiban['da_ban'] == 1) ? "sold" : (($showtin_nguoiban['han_su_dung'] <= $time) ? "/chinh-sua-tin-dang-mua-d" . $cat_id . "-s" . $id_tin . ".html" : "") ?>">
                                                    <img data-src="/images/newImages/rotate-left.png" src="/images/newImages/rotate-left.png" class="rotate-left">
                                                    <span class="text-qlt txt_tm_dml">Đăng mua lại</span>
                                                </div>
                                            </span>
                                        <? } else { ?>
                                            <span class="border-ddldb btn_qlt_df_3_d m_tinmua_at">
                                                <div class="cus_poi btn-at m_btn_tmat" data-id="<?= $id_tin ?>" data-active="<?= $showtin_nguoiban['new_active'] ?>">
                                                    <img data-src="/images/newImages/n_hide_new.svg" src="/images/newImages/n_hide_new.svg" class="verify">
                                                    <span class="text-qlt m_tm_txtat">Ẩn tin</span>
                                                </div>
                                            </span>
                                            <span class="border-st btn_qlt_df_3_d m_tm_st">
                                                <a href="/chinh-sua-tin-dang-mua-d<?= $cat_id ?>-s<?= $id_tin ?>.html" class="a_tm_st">
                                                    <div class="btn-st cus_poi m_btn_tmst">
                                                        <img data-src="/images/m_raonhanh_imgnew/edit-2.svg" src="/images/m_raonhanh_imgnew/edit-2.svg" class="edit-news">
                                                        <span class="text-qlt pdl_10 m_tm_txtst">Sửa tin</span>
                                                    </div>
                                                </a>
                                            </span>
                                        <? } ?>
                                    <? } else { ?>
                                        <span class="border-ddldb btn_qlt_df_3_d m_tinmua_htt">
                                            <div class="cus_poi btn-at m_btn_tmhtt" data-id="<?= $id_tin ?>" data-active="<?= $showtin_nguoiban['new_active'] ?>">
                                                <img data-src="/images/newImages/n_show_new.svg" src="/images/newImages/n_show_new.svg" class="verify">
                                                <span class="text-qlt m_tm_txthtt">Hiển thị tin</span>
                                            </div>
                                        </span>
                                    <? } ?>
                                </div>
                            </div>
                        </li>
                    <? } ?>
                </ul>
            </div>
            <!-- phân trang -->
            <div class="m_phantrang w100 d_flex al_ct jtf_ct">
                <? if ($type_list == 1) { ?>
                    <ul class="m_pt_ul d_flex fl_row al_ct">
                        <?= generatePageBar3('', $page, $current_page, $tinconhan, $url, '&', '', 'active', 'preview', '<', 'next', '>', '', '', '', ''); ?>
                    </ul>
                <? } else if ($type_list == 2) { ?>
                    <ul class="m_pt_ul d_flex fl_row al_ct">
                        <?= generatePageBar3('', $page, $current_page, $tinhethan, $url, '?', '', 'active', 'preview', '<', 'next', '>', '', '', '', ''); ?>
                    </ul>
                <? } else if ($type_list == 3) { ?>
                    <ul class="m_pt_ul d_flex fl_row al_ct">
                        <?= generatePageBar3('', $page, $current_page, $tinan, $url, '?', '', 'active', 'preview', '<', 'next', '>', '', '', '', ''); ?>
                    </ul>
                <? } else { ?>
                    <ul class="m_pt_ul d_flex fl_row al_ct">
                        <?= generatePageBar3('', $page, $current_page, $result_tongin, $url, '?', '', 'active', 'preview', '<', 'next', '>', '', '', '', ''); ?>
                    </ul>
                <? } ?>
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

    <div id="" class="popup_confirm modal" style="display: none;">
        <!-- Modal content -->
        <div class="box-check">
            <div class="modal-content">
                <div class="title-modal">
                    <p class="text_title_modal">Title</p>
                    <span class="close dong_ddau" data-dimiss="modal"><img src="/images/newImages/close.png"></span>
                </div>
                <p class="text-check-mail">
                    TXT
                </p>
                <div class="btn_modal">
                    <p class="btn-cancel input_form huy_ddau_ban">Huỷ bỏ</p>
                    <p class="btn-success input_form clickdangbanlai">Đồng ý</p>
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
        $("[data-dimiss=modal]").click(function() {
            $(this).parents(".modal").hide();
        });
        var elem = $(".text-title-qlt.active").parents("span");
        $(elem).get(0).scrollIntoView({
            behavior: 'smooth'
        });
        // $('.title-qlt').animate({ scrollLeft: elem.offset().left}, { duration: 'medium', easing: 'swing' });
        $(".luu_chung").click(function() {
            $(".dddban").hide();
            $(".popup_resell").hide();
            $(".tbao_tcong_d").hide();
            window.location.reload();
        });
        $('#management_news').addClass('menu_active')
        // ĐĂNG BÁN LẠI
        $('.clickdangbanlai').click(function() {
            var type = $(this).attr('data-update');
            var id_tindl = $(this).attr('data');
            if (type == "sold") {
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
            } else if (type != "") {
                window.location = type;
            }
        });
        // UPDATE ĐÃ ban
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
            $('.danhdaudaban').removeClass('d_noned');
        })

        function click_d() {
            $('.danhdaudaban').addClass('d_noned');
        };

        $('.menu_btn_df_dl').click(function() {
            $(this).parents('.chu').find('.btn_qlt_df_chung').toggleClass('hid_1200');
        });

        $(".btn-at").click(function() {
            var new_id = $(this).data('id');
            var new_active = $(this).data('active');
            if (new_active == 1) {
                $(".popup_confirm .text_title_modal").html("Xác nhận");
                $(".popup_confirm .text-check-mail").html("Bạn chắc chắn muốn ẩn tin?");
                $(".popup_confirm").show();
                $(".popup_confirm .btn-success").click(function() {
                    $.ajax({
                        type: 'POST',
                        url: '/ajax/show_hide_new.php',
                        data: {
                            new_id: new_id,
                            new_active: new_active,
                        },
                        dataType: 'json',
                        success: function(data) {
                            if (data.result == true) {
                                window.location.reload();
                            } else {
                                alert(data.msg);
                            }
                        }
                    });
                });
            } else {
                $.ajax({
                    type: 'POST',
                    url: '/ajax/show_hide_new.php',
                    data: {
                        new_id: new_id,
                        new_active: new_active,
                    },
                    dataType: 'json',
                    success: function(data) {
                        alert(data.msg);
                        if (data.result == true) window.location.reload();
                    }
                });
            }
        });
    </script>
</body>

</html>