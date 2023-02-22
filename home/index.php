<?php
include("config.php");
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $id_user = $_COOKIE['UID'];
    $type_user = $_COOKIE['UT'];
}

// TIN TỨC
$ht_tint = new db_query("SELECT `new_id`, `new_title`, `new_teaser`, `new_date_last_edit` ,`new_picture`, `new_url` FROM `news` ORDER BY `new_id` DESC LIMIT 4");
// người bán
$danhmuc = new db_query("SELECT `cat_id`,`cat_name`,`cat_picture` FROM `category` WHERE `cat_parent_id` = 0 ORDER BY `cat_id` ASC LIMIT 14");
//TIN ĐĂNG
$tindang = "SELECT `new_id`,`new_title`, `link_title`, `new_unit`, `chotang_mphi`, `new_create_time`, `new_update_time`, `dia_chi`, `new_money`, `new_image`,
            `new_pin_home`, `chat365_id`, `chat365_secret` FROM `new` INNER JOIN `user` ON `new`.`new_user_id` = `user`.`usc_id` WHERE `new_buy_sell` = 2
            AND new_active = 1 AND `da_ban` != 1 ORDER BY `new_order` DESC, `new_pin_home` DESC, `new_id` DESC LIMIT 0,24";
$query_home = new db_query($tindang);

$i = 0;
while ($row_td = mysql_fetch_assoc($query_home->result)) {
    $i++;
    if ($i > 12) {
        $tindanghapdan_tr[] = $row_td;
    } else {
        $tindang_tr[] = $row_td;
    }
}

// GIAN HÀNG NỔI BẬT
$gianhaang = new db_query("SELECT `usc_id`, `usc_store_name`, `usc_logo`, `usc_city`, `usc_email`, `usc_phone`, `chat365_id`, `chat365_secret` FROM `user` WHERE `usc_type` = 5
                        ORDER BY `ghim_gian_hang` DESC, `usc_id` LIMIT 18");

// $my_id = intval(@$_COOKIE['id_chat365']);
// if ($my_id > 0) {
//     $qr_sc = new db_query("SELECT chat365_secret FROM user WHERE chat365_id = '$my_id'");
//     $row_sc = mysql_fetch_assoc($qr_sc->result);
//     $chat365_secret = $row_sc['chat365_secret'];
// } else {
//     $chat365_secret = '';
// }

?>
<!DOCTYPE html>
<html>

<head>

    <!--    -----tvt them  27/05--->
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" as="image" href="/images/banner.webp">
    <link rel="preload" as="image" href="/images/cv_trangchu1.webp">

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

    <meta name="robots" content="index, follow" />

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

    <link rel="stylesheet" type="text/css" href="/css/style_new/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/slick.css" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />

    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_h.css?v=<?= $version ?>">
</head>


<body>
    <?
    include("../includes/common/inc_header.php");
    ?>

    <div class="header_category">
        <div class="header_category_img w_100">
            <img src="/images/banner_header.png" alt="">
            <div class="header_category_text tex_center w_100">
                <h1>RAO VẶT MIỄN PHÍ - MUA BÁN TỨC THÌ</h1>
                <h6>Hệ thống mua bán tìm kiếm dựa trên 1.540.788 bản tin rao vặt đã được xác minh</h6>
            </div>
        </div>
        <div class="header_category_content">
            <div class="header_category_content_header d_flex agn_items jus_content">
                <h2>KHÁM PHÁ DANH MỤC</h2>
                <a href="/tat-ca-tin-dang-ban.html" class="d_flex see_more_container">
                    <p>Tất cả danh mục</p>
                    <img src="/images/eva_arrow-forward-outline.png" alt="">
                </a>
            </div>
            <div class="header_category_content_container">
                <div class="header_category_content_scroll">
                    <div class="header_category_content_list d_flex w_100">
                        <?
                        while ($showdm = (mysql_fetch_assoc($danhmuc->result))) {
                            $link_dm = '/mua-ban/' . $showdm['cat_id'] . '/' . replaceTitle($showdm['cat_name']) . '.html';
                        ?>
                            <div class="category_item tex_center">
                                <div class="df_index_img1">
                                    <a href="<?= $link_dm; ?>" title="<?= $showdm['cat_name'] ?>">
                                        <img src="/pictures/<?= $showdm['cat_picture'] ?>">
                                    </a>
                                </div>
                                <p class="text_cate_df">
                                    <a href="<?= $link_dm; ?>" title="<?= $showdm['cat_name'] ?>">
                                        <?= $showdm['cat_name'] ?>
                                    </a>
                                </p>
                            </div>
                        <? unset($link_dm);
                        } ?>
                    </div>
                </div>
            </div>
            <img class='a-left control-c prev img_arrow scroll_category prev_category' src='/images/newImages/arrow-left.png'>
            <img class='a-right control-c next img_arrow scroll_category next_category' src='/images/newImages/arrow-right.png'>
            <div class="w_100 agn_items justify-content-center btn_seemore j_content mt15">
                <a href="/tat-ca-tin-dang-ban.html" class="btn_seemore_category d_flex justify-content-center agn_items j_content">Tất cả danh mục</a>
            </div>
        </div>
    </div>

    <div class="registers_container">
        <div class="registers_container_header d_flex agn_items jus_content">
            <h2>GIAN HÀNG NỔI BẬT</h2>
        </div>
        <div class="gian_hang_hn">
            <div class="registers_container_content d_flex noibat_gihang">
                <? while ($showgianhang = (mysql_fetch_assoc($gianhaang->result))) {
                    $avat_gianhang = ($showgianhang['usc_logo'] != '') ? str_replace('../', '/', $showgianhang['usc_logo']) : "/images/anh_moi/avatar1.png";
                    $gh_chat365_id = $showgianhang['chat365_id'];
                    $gh_usc_id = $showgianhang['usc_id'];
                    $usc_store_name = $showgianhang['usc_store_name'];  ?>
                    <div class="registers_container_content_item">
                        <div class="anh_gihang_nbat">
                            <a href="/gian-hang/<?= $showgianhang['usc_id'] ?>/<?= replaceTitle($usc_store_name) ?>.html" class="ddan_gihang">
                                <img class="lazyload" src="/images/loading.gif" data-src="<?= $avat_gianhang; ?>" onerror='this.onerror=null;this.src="/images/anh_moi/avatar1.png";' alt="<?= $usc_store_name ?>">
                            </a>
                        </div>
                        <div class="div_bao_fig gihang_noibat">
                            <p class="elipsis2 ten_ghnoibat">
                                <a href="/gian-hang/<?= $showgianhang['usc_id'] ?>/<?= replaceTitle($usc_store_name) ?>.html" class="sh_size_five elipsis2">
                                    <?= $usc_store_name ?>
                                </a>
                            </p>
                            <span class="localtion_register ten_ghnoibat mt_5">
                                <?= ($showgianhang['usc_city'] != "") ? $arrcity[$showgianhang['usc_city']]['cit_name'] : "" ?>
                            </span>
                            <? if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) { ?>
                                <?
                                if ($showgianhang['usc_phone'] != 0 || $showgianhang['usc_phone'] != "") {
                                    $usc_bien = $showgianhang['usc_phone'];
                                } else if ($showgianhang['usc_email'] != "") {
                                    $usc_bien = $showgianhang['usc_email'];
                                }
                                $link_chat = get_link_chat365($my_id, $gh_chat365_id, $gh_usc_id, $usc_store_name, $usc_bien, '', $chat365_secret);
                                ?>
                                <a href="<?= $link_chat ?>" target="_blank" class="chat_gihang item_chat sh_size_five mt_5 ten_ghnoibat" id-chat="<?= $gh_chat365_id ?>">
                                    Chat ngay
                                </a>
                            <? } else { ?>
                                <a class="chat_gihang item_chat sh_size_five mt_5 ten_ghnoibat op_ovl_dn sh_cursor" id-chat="<?= $gh_chat365_id ?>">Chat ngay</a>
                            <? } ?>
                        </div>
                    </div>
                <? } ?>
            </div>
            <div class="gianhang_onl">
                <h4 class="tieude_ghonl sh_clr_six">Khách hàng Online</h4>
                <div class="tatca_ngonli" id="list_chat">

                </div>
            </div>
        </div>
    </div>

    <!-- TIN ĐĂNG NỔI BẬT -->
    <div class="info_purchase">
        <div class="info_purchase_header d_flex agn_items jus_content">
            <h2>TIN ĐĂNG NỔI BẬT</h2>
            <a href="/tat-ca-tin-dang-ban.html" class="d_flex see_more_container">
                <p>Xem tất cả</p>
                <img src="/images/eva_arrow-forward-outline.png" alt="xem tất cả">
            </a>
        </div>
        <div class="info_purchase_container">
            <div class="info_purchase_content info_purchase_content1 d_flex">
                <? foreach ($tindang_tr as $showtindang) {
                    $link_tnb = ($showtindang['link_title'] != "") ? replaceTitle($showtindang['link_title'])  : replaceTitle($showtindang['new_title']);
                    $img_tdnb = $showtindang['new_image'];
                    $id_tin = $showtindang['new_id'];
                    $img_tdnb1 = explode(';', $img_tdnb);
                    $img_tdnb2 = count($img_tdnb1); ?>
                    <div class="info_purchase_content_item">
                        <div class="info_purchase_content_item_child d_flex">
                            <div class="img_product_container img_product_container_df">
                                <div class="df_img_index2">
                                    <a href="<?= $link_tnb . '-c' . $showtindang['new_id'] . '.html'; ?>">
                                        <img class="lazyload img_product" src="/images/loading.gif" data-src="<?= str_replace('../', '/', $img_tdnb1[0]) ?>" onerror='this.onerror=null; this.src="/images/anh_moi/avatar1.png";' alt="<?= $showtindang['new_title'] ?>">
                                    </a>
                                </div>
                                <div class="num_img">
                                    <? if ($img_tdnb2 > 1) { ?>
                                        <img src="/images/newImages/view.png" alt="ảnh sản phẩm">
                                        <p class="count_img"><?= $img_tdnb2 ?></p>
                                    <? } ?>
                                </div>
                                <?php if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) { ?>
                                    <div class="yeuthich_tinl">
                                        <? if (in_array($id_tin, $list_new_like)) { ?>
                                            <img src="/images/anh_moi/anh014.png" data="<?= $id_tin ?>" alt="yêu thích" class="yeuthich hd_cspointer" onclick="yeu_thich(this)">
                                        <? } else { ?>
                                            <img src="/images/anh_moi/yeuthich_moi.png" data="<?= $id_tin ?>" alt="yêu thích" class="ko_yeuthich hd_cspointer" onclick="yeu_thich(this)">
                                        <? } ?>
                                    </div>
                                <?php } else { ?>
                                    <div class="yeuthich_tinl op_ovl_dn">
                                        <img src="/images/anh_moi/yeuthich_moi.png" alt="yêu thích" class="ko_yeuthich hd_cspointer">
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="info_purchase_content_item_text d_flex-col-bw w-break">
                                <a href="<?= $link_tnb . '-c' . $showtindang['new_id'] . '.html'; ?>">
                                    <h4 class="text_ellipsis ellip_line2"><?= $showtindang['new_title'] ?></h4>
                                </a>
                                <div class="content_product">
                                    <p><?= lay_tgian($showtindang['new_update_time']) ?> </p>
                                    <p class="elipsis1"><?= ltrim($showtindang['dia_chi'], ', ') ?></p>
                                    <div class="tien_chat">
                                        <? if ($showtindang['chotang_mphi'] == 1) { ?>
                                            <span class="w65">Cho tặng miễn phí</span>
                                        <? } else if ($showtindang['new_money'] > 0) { ?>
                                            <span class="w65"><?= number_format($showtindang['new_money']) ?>
                                                <?= $arr_dvtien[$showtindang['new_unit']] ?></span>
                                        <? } else if ($showtindang['new_money'] < 0 || $showtindang['new_money'] == 0) { ?>
                                            <span class="w65">Liên hệ ngưới bán</span>
                                        <? } ?>
                                        <?php if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) { ?>
                                            <a class="img_like item_chat" target="_blank" id-chat="<?= $showtindang['chat365_id'] ?>" rel="nofollow" href="<?= rewriteNews($showtindang['new_id'], $showtindang['new_title']); ?>">
                                                <p class="chat_th">Chat</p>
                                            </a>
                                        <?php } else { ?>
                                            <div class="img_like item_chat op_ovl_dn" id-chat="<?= $showtindang['chat365_id'] ?>">
                                                <p class="chat_th">Chat</p>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                <? unset($link_tnb);
                } ?>
            </div>
        </div>
    </div>

    <!-- TIN ĐĂNG HẤP DẪN -->
    <div class="info_purchase ifo_noibat">
        <div class="info_purchase_header d_flex agn_items jus_content">
            <h2>TIN ĐĂNG HẤP DẪN</h2>
            <a href="/tat-ca-tin-dang-ban.html" class="d_flex see_more_container">
                <p>Xem tất cả</p>
                <img src="/images/eva_arrow-forward-outline.png" alt="xem tất cả">
            </a>
        </div>
        <div class="info_purchase_container">
            <div class="info_purchase_content info_purchase_content1 d_flex">
                <? foreach ($tindanghapdan_tr as $show_td_hapdan) {
                    $link_tdang = ($show_td_hapdan['link_title'] != "") ? replaceTitle($show_td_hapdan['link_title'])  : replaceTitle($show_td_hapdan['new_title']);
                    $img_tinhd = $show_td_hapdan['new_image'];
                    $id_tin = $show_td_hapdan['new_id'];
                    $img_tinhd = explode(';', $img_tinhd);
                    $img_tinhd2 = count($img_tinhd);
                ?>
                    <div class="info_purchase_content_item">
                        <div class="info_purchase_content_item_child d_flex">
                            <div class="img_product_container wh-unset">
                                <div class="df_img_index2">
                                    <a href="<?= $link_tdang . '-c' . $show_td_hapdan['new_id'] . '.html';  ?>">
                                        <img class="lazyload img_product" src="/images/loading.gif" data-src="<?= str_replace('../', '/', $img_tinhd[0]) ?>" onerror='this.onerror=null; this.src="/images/anh_moi/avatar1.png";' alt="<?= $show_td_hapdan['new_title'] ?>">
                                    </a>
                                </div>
                                <div class="num_img">
                                    <? if ($img_tinhd2 > 1) { ?>
                                        <img src="/images/newImages/view.png" alt="ảnh sản phẩm">
                                        <p class="count_img"><?= $img_tinhd2 ?></p>
                                    <? } ?>
                                </div>
                                <?php if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) { ?>
                                    <div class="yeuthich_tinl ">
                                        <? if (in_array($id_tin, $list_new_like)) { ?>
                                            <img src="/images/anh_moi/anh014.png" data="<?= $id_tin ?>" alt="yêu thích" class="yeuthich hd_cspointer" onclick="yeu_thich(this)">
                                        <? } else { ?>
                                            <img src="/images/anh_moi/yeuthich_moi.png" data="<?= $id_tin ?>" alt="yêu thích" class="ko_yeuthich hd_cspointer" onclick="yeu_thich(this)">
                                        <? } ?>
                                    </div>
                                <?php } else { ?>
                                    <div class="yeuthich_tinl op_ovl_dn po_abs">
                                        <img src="/images/anh_moi/yeuthich_moi.png" alt="yêu thích" class="ko_yeuthich hd_cspointer">
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="info_purchase_content_item_text d_flex-col-bw w-break">
                                <a href="<?= $link_tdang . '-c' . $show_td_hapdan['new_id'] . '.html'; ?>">
                                    <h4 class="text_ellipsis ellip_line2"><?= $show_td_hapdan['new_title'] ?></h4>
                                </a>
                                <div class="content_product">
                                    <p><?= lay_tgian($show_td_hapdan['new_update_time']) ?></p>
                                    <p class="elipsis1"><?= ltrim($show_td_hapdan['dia_chi'], ', ') ?></p>
                                    <div class="tien_chat">
                                        <? if ($show_td_hapdan['chotang_mphi'] == 1) { ?>
                                            <span class="w65">Cho tặng miễn phí</span>
                                        <? } else if ($show_td_hapdan['new_money'] > 0) { ?>
                                            <span class="w65"><?= number_format($show_td_hapdan['new_money']) ?>
                                                <?= $arr_dvtien[$show_td_hapdan['new_unit']] ?></span>
                                        <? } else if ($show_td_hapdan['new_money'] < 0 || $show_td_hapdan['new_money'] == 0) { ?>
                                            <span class="w65">Liên hệ ngưới bán</span>
                                        <? } ?>
                                        <?php if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) { ?>
                                            <a class="img_like item_chat" target="_blank" id-chat="<?= $show_td_hapdan['chat365_id'] ?>" rel="nofollow" href="<?= rewriteNews($show_td_hapdan['new_id'], $show_td_hapdan['new_title']); ?>">
                                                <p class="chat_th">Chat</p>
                                            </a>
                                        <?php } else { ?>
                                            <div class="img_like item_chat op_ovl_dn" id-chat="<?= $show_td_hapdan['chat365_id'] ?>">
                                                <p class="chat_th">Chat</p>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <? unset($link_tdang);
                } ?>
            </div>
        </div>

    </div>

    <!-- TIN TỨC -->
    <div class="news_container">
        <div class="news_container_header d_flex agn_items jus_content">
            <h2>TIN TỨC</h2>
            <a href="/tin-tuc" class="d_flex see_more_container">
                <p>Xem tất cả</p>
                <img src="/images/eva_arrow-forward-outline.png" alt="xem tất cả">
            </a>
        </div>
        <div class="news_container_parent">
            <div class="news_container_content d_flex">
                <? while ($showtin = (mysql_fetch_assoc($ht_tint->result))) {
                    $limk_ttuc =  ($showtin['new_url'] != "") ? replaceTitle($showtin['new_url']) : replaceTitle($showtin['new_title']); ?>
                    <a href="<?= '/tin-tuc/' . $limk_ttuc . '-p' . $showtin['new_id'] . '.html'; ?>" class="news_container_content_item df_index_2">
                        <div class="df_index_1">
                            <img class="lazyload" src="/images/loading.gif" data-src="/pictures/news/<?= $showtin['new_picture'] ?>" onerror='this.onerror=null; this.src="/images/anh_moi/avatar.png";' alt="<?= $showtin['new_title'] ?>">
                        </div>
                        <h4><?= $showtin['new_title'] ?></h4>
                        <p><?= $showtin['new_teaser'] ?></p>
                    </a>
                <? unset($limk_ttuc);
                } ?>
            </div>
        </div>

    </div>

    <div class="trends_container">
        <div class="trends_container_header d_flex agn_items jus_content">
            <h2>XU HƯỚNG TÌM KIẾM</h2>
        </div>
        <div class="trends_container_content d_flex">
            <?
            $qr = new db_query("SELECT `search_key` FROM `search_popular` ORDER BY count_num desc limit 7");
            $lis = $qr->result_array();
            ?>
            <?php foreach ($lis as $m => $value_lis) : ?>
                <a onclick="click_search2(this)" data-name="<?= str_replace('-', ' ', $value_lis['search_key'])  ?>" class="trends_container_content_item"><?= str_replace('-', ' ', $value_lis['search_key'])  ?></a>
            <?php endforeach ?>
        </div>
    </div>
    <? include '../modals/md_tb_yeuthich.php' ?>
    <? include("../includes/inc_new/inc_footer.php"); ?>

    <script type="text/javascript" src="/js/style_new/js_h.js"></script>
    <script type="text/javascript" src="/js/style_new/app.js" defer></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.op_ovl_dn').click(function() {
                $('.overlay_dn').addClass('active');
            })
            $(' #info_purchase_content2').slick({
                infinite: true,
                rows: 12,
                slidesPerRow: 2,
                arrows: true,
                dots: true,
                prevArrow: "<img class='a-left control-c prev slick-prev img_arrow' src='/images/newImages/arrow-left.png'>",
                nextArrow: "<img class='a-right control-c next slick-next img_arrow' src='/images/newImages/arrow-right.png'>",
                responsive: [{
                    breakpoint: 481,
                    settings: {
                        dots: false,
                        arrows: false,
                    }
                }, ]
            });
            $('.info_purchase_content1').slick({
                infinite: true,
                rows: 6,
                slidesPerRow: 2,
                arrows: true,
                dots: true,
                prevArrow: "<img class='a-left control-c prev slick-prev img_arrow' src='/images/newImages/arrow-left.png'>",
                nextArrow: "<img class='a-right control-c next slick-next img_arrow' src='/images/newImages/arrow-right.png'>",
                responsive: [{
                    breakpoint: 481,
                    settings: {
                        // slidesPerRow: 1,
                        dots: false,
                        arrows: false,
                    }
                }, ]
            });
            $('.registers_container_content').slick({
                infinite: true,
                rows: 3,
                slidesPerRow: 3,
                arrows: true,
                dots: true,
                prevArrow: "<img class='a-left control-c prev slick-prev img_arrow' src='/images/newImages/arrow-left.png'>",
                nextArrow: "<img class='a-right control-c next slick-next img_arrow' src='/images/newImages/arrow-right.png'>",
                responsive: [{
                    breakpoint: 1025,
                    settings: {
                        slidesPerRow: 3,
                        arrows: true,
                        dots: true,
                        prevArrow: "<img class='a-left control-c prev slick-prev img_arrow' src='/images/newImages/arrow-left.png'>",
                        nextArrow: "<img class='a-right control-c next slick-next img_arrow' src='/images/newImages/arrow-right.png'>",
                    }
                }, {
                    breakpoint: 769,
                    settings: {
                        slidesPerRow: 2,
                        arrows: true,
                        dots: true,
                        prevArrow: "<img class='a-left control-c prev slick-prev img_arrow' src='/images/newImages/arrow-left.png'>",
                        nextArrow: "<img class='a-right control-c next slick-next img_arrow' src='/images/newImages/arrow-right.png'>",
                    }
                }, {
                    breakpoint: 481,
                    settings: {
                        slidesPerRow: 2,
                        arrows: false,
                        dots: true,
                    }
                }],
            });
        });
    </script>
</body>

</html>