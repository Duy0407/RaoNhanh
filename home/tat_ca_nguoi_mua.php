<?php
include("config.php");
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $id_user = $_COOKIE['UID'];
    $type_user = $_COOKIE['UT'];
};
$timkiem_mua = 1;
// TIN TỨC
$ht_tint = new db_query("SELECT `new_id`, `new_title`, `new_teaser`, `new_date_last_edit`, `new_picture` FROM `news` ORDER BY `new_id` DESC LIMIT 4");
// DANH MUC
$danhmuc = new db_query("SELECT `cat_id`,`cat_name`,`phan_loai`,`cat_picture` FROM `category` WHERE `cat_parent_id` = 0 AND `phan_loai` != 1 ORDER BY `cat_id` ASC LIMIT 14");


// GIAN HÀNG NỔI BẬT
$gianhaang = new db_query("SELECT `usc_id`, `usc_store_name`,`usc_anhbia`, `usc_logo`, `usc_city` FROM `user` WHERE `usc_type` = 5 ORDER BY `ghim_gian_hang` DESC,
                        `usc_id` LIMIT 60");

// TIN MUA MỚI NHẤT
$tinmuamoinhat = new db_query("SELECT n.`new_id`, n.`new_unit`, n.`gia_kt`, n.`new_title`, n.`new_create_time`, n.`dia_chi`, n.`new_money`, n.`new_image`,
                            n.`new_cate_id`, n.`new_type`, n.`new_update_time`, u.`chat365_id`, u.`usc_name`, u.`usc_store_name`, d.`han_su_dung` FROM `new` AS n
                            INNER JOIN `user` AS u ON n.`new_user_id` = u.`usc_id`
                            INNER JOIN `new_description` AS d ON n.`new_id` = d.`new_id`
                            WHERE n.`new_buy_sell` = 1 AND n.`da_ban` = 0 AND n.`new_active` = 1 ORDER BY n.`new_update_time` DESC, n.`new_id` DESC LIMIT 48 ");

$my_id = intval(@$_COOKIE['id_chat365']);
if ($my_id > 0) {
    $qr_sc = new db_query("SELECT chat365_secret FROM user WHERE chat365_id = '$my_id'");
    $row_sc = mysql_fetch_assoc($qr_sc->result);
    $chat365_secret = $row_sc['chat365_secret'];
} else {
    $chat365_secret = '';
}

?>
<!DOCTYPE html>
<html>

<head>

    <title>Tin Cần Mua Mới Nhất Tháng / Năm hiện Tại</title>
    <meta name="keywords" content="Raonhanh365, rao vặt miễn phí, trang rao vặt, kênh mua bán, quảng cáo, mua ban, quang cao, rao vat, đăng tin miễn phí" />
    <meta name="description" content="Danh sách tin mua mới nhất tháng/năm hiện tại trên raonhanh365.vn. Cập nhật liên tục hàng giờ" />
    <meta property="og:title" content="Tin Cần Mua Mới Nhất Tháng / Năm hiện Tại" />
    <meta property="og:description" content="Danh sách tin mua mới nhất tháng/năm hiện tại trên raonhanh365.vn. Cập nhật liên tục hàng giờ" />
    <!-- <meta property="og:url" content="https://raonhanh365.vn/" /> -->
    <meta property="og:url" content="http://dev5.tinnhanh365.vn/trang-tin-mua.html" />

    <meta name="copyright" content="Copyright © 2017 by raonhanh365.vn" />
    <meta name="abstract" content="Rao vặt miễn phí - Mua bán tức thì | RAONHANH365.VN<" />
    <meta name="author" itemprop="author" content="raonhanh365.vn" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="robots" content="noindex, nofollow" />

    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui" />
    <!-- <meta property="og:image:url" content="https://raonhanh365.vn/images/banner_raonhanh365.jpg" /> -->
    <meta property="og:image:url" content="http://dev5.tinnhanh365.vn/images/banner_raonhanh365.jpg" />

    <meta property="og:image:width" content="476" />
    <meta property="og:image:height" content="249" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="vi_VN" />
    <meta name="revisit-after" content="1 days" />
    <meta name="page-topic" content="Mua bán rao vặt" />
    <meta name="resource-type" content="Document" />
    <meta name="distribution" content="Global" />
    <!-- <link rel="canonical" href="https://raonhanh365.vn" /> -->
    <link rel="canonical" href="http://dev5.tinnhanh365.vn/trang-tin-mua.html" />

    <!-- <meta name="robots" content="noindex, nofollow" />
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui" /> -->

    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>

    <link rel="stylesheet" type="text/css" href="/css/style_new/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/slick.css" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />

    <link rel="stylesheet" type="text/css" href="/css/style_new/app.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/newCss/admin.style.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_h.css?v=<?= $version ?>">
    <title>Trang tin mua</title>
</head>

<body>
    <? include("../includes/common/inc_header.php"); ?>

    <div class="header_category">
        <div class="header_category_img w_100">
            <img src="../images/banner_header.png" alt="">
            <div class="header_category_text tex_center w_100">
                <h1>RAO VẶT MIỄN PHÍ - MUA BÁN TỨC THÌ</h1>
                <h6>Hệ thống mua bán tìm kiếm dựa trên 1.540.788 bản tin rao vặt đã được xác minh</h6>
            </div>
        </div>
        <div class="header_category_content">
            <div class="header_category_content_header d_flex agn_items jus_content">
                <h2>KHÁM PHÁ DANH MỤC</h2>
                <a href="/tat-ca-tin-dang-mua.html" class="d_flex see_more_container">
                    <p>Tất cả danh mục</p>
                    <img src="../images/eva_arrow-forward-outline.png" alt="">
                </a>
            </div>
            <div class="header_category_content_container">
                <div class="header_category_content_scroll">
                    <div class="header_category_content_list d_flex w_100">
                        <? while ($showdm = (mysql_fetch_assoc($danhmuc->result))) { ?>
                            <? if (in_array($showdm['cat_id'], $bodmuc_mua) == false) { ?>
                                <div class="category_item tex_center">
                                    <div class="df_index_img1">
                                        <a href="/tim-mua-<?= replaceTitle($showdm['cat_name']) ?>-d<?= $showdm['cat_id'] ?>.html" title="<?= $showdm['cat_name'] ?>">
                                            <img src="/pictures/<?= $showdm['cat_picture'] ?>">
                                        </a>
                                    </div>
                                    <p class="text_cate_df">
                                        <a href="/tim-mua-<?= replaceTitle($showdm['cat_name']) ?>-d<?= $showdm['cat_id'] ?>.html" title="<?= $showdm['cat_name'] ?>">
                                            <?= $showdm['cat_name'] ?>
                                        </a>
                                    </p>
                                </div>
                            <? } ?>
                        <? } ?>
                    </div>
                </div>
            </div>

            <img class='a-left control-c prev img_arrow scroll_category prev_category' src='../images/newImages/arrow-left.png'>
            <img class='a-right control-c next img_arrow scroll_category next_category' src='../images/newImages/arrow-right.png'>
            <div class="w_100 agn_items justify-content-center btn_seemore">
                <a href="/tat-ca-tin-dang-mua.html" class="btn_seemore_category d_flex justify-content-center agn_items">Tất cả danh mục</a>
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
                    $avat_gianhang = $showgianhang['usc_logo'];
                    $gh_chat365_id = $showgianhang['chat365_id'];
                    $gh_usc_id = $showgianhang['usc_id'];
                    $usc_store_name = $showgianhang['usc_store_name'];  ?>
                    <div class="registers_container_content_item">
                        <div class="anh_gihang_nbat">
                            <a href="/gian-hang/<?= $showgianhang['usc_id'] ?>/<?= replaceTitle($usc_store_name) ?>.html" class="ddan_gihang">
                                <img onerror='this.onerror=null;this.src="/images/anh_moi/avatar.png";' src="<?= str_replace('../', '/', $showgianhang['usc_logo'])  ?>" alt="<?= $usc_store_name ?>">
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

    <!-- TIN MUA MỚI NHẤT -->
    <div class="info_purchase tinmua_tatca">
        <div class="info_purchase_header d_flex agn_items jus_content">
            <h2>TIN MUA MỚI NHẤT</h2>
            <a href="/tat-ca-tin-dang-mua.html" class="d_flex see_more_container">
                <p>Xem tất cả</p>
                <img src="../images/eva_arrow-forward-outline.png" alt="">
            </a>
        </div>
        <div class="info_purchase_container">
            <div class="info_purchase_content d_flex df_tdhd_1">
                <? while ($showtindang = (mysql_fetch_assoc($tinmuamoinhat->result))) {
                    $img_tdnb = $showtindang['new_image'];
                    $img_tdnb1 = explode(';', $img_tdnb);
                    $img_tdnb2 = count($img_tdnb1);
                    $id_tin = $showtindang['new_id'];
                    $check = new db_query("SELECT `id` FROM `tin_yeu_thich` WHERE `new_id` = '$id_tin' AND `user_id` = '$id_user' AND `usc_type` = '$type_user'");
                    $check_num = mysql_num_rows($check->result);
                ?>
                    <div class="info_purchase_content_item">
                        <div class="info_purchase_content_item_child d_flex">
                            <div class="img_product_container img_product_container_df">
                                <div class="df_img_index2">
                                    <? if ($showtindang['new_cate_id'] == 121) { ?>
                                        <a href="/<?= replaceTitle($showtindang['new_title']) ?>-c<?= $showtindang['new_id'] ?>.html">
                                            <? if ($img_tdnb != "") { ?>
                                                <img class="img_product" src="<?= $img_tdnb1[0] ?>" alt="">
                                            <? } else { ?>
                                                <img class="img_product" src="/images/anh_moi/avatar.png" alt="">
                                            <? } ?>
                                        </a>
                                    <? } else { ?>
                                        <a href="/<?= replaceTitle($showtindang['new_title']) ?>-ct<?= $showtindang['new_id'] ?>.html">
                                            <? if ($img_tdnb != "") { ?>
                                                <img class="img_product" src="<?= $img_tdnb1[0] ?>" alt="">
                                            <? } else { ?>
                                                <img class="img_product" src="/images/anh_moi/avatar.png" alt="">
                                            <? } ?>
                                        </a>
                                    <? } ?>
                                </div>
                                <div class="num_img">
                                    <? if ($img_tdnb2 > 1) { ?>
                                        <img src="../images/newImages/view.png" alt="">
                                        <p class="count_img"><?= $img_tdnb2 ?></p>
                                    <? } ?>
                                </div>
                                <div class="yeuthich_tinl">
                                    <? if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {  ?>
                                        <? if ($check_num == 0) { ?>
                                            <img src="../images/anh_moi/yeuthich_moi.png" data="<?= $id_tin ?>" class="ko_yeuthich hd_cspointer" onclick="yeu_thich(this)">
                                        <? } else { ?>
                                            <img src="../images/anh_moi/anh014.png" data="<?= $id_tin ?>" alt="" class="yeuthich hd_cspointer" onclick="yeu_thich(this)">
                                        <? } ?>
                                    <?  } else { ?>
                                        <a href="/dang-nhap.html">
                                            <img src="../images/anh_moi/yeuthich_moi.png" class="ko_yeuthich hd_cspointer">
                                        </a>
                                    <? } ?>
                                </div>
                            </div>
                            <div class="info_purchase_content_item_text">
                                <? if ($showtindang['new_cate_id'] == 121) { ?>
                                    <a href="/<?= replaceTitle($showtindang['new_title']) ?>-c<?= $showtindang['new_id'] ?>.html">
                                        <h4 class="text_ellipsis ellip_line1 mb_15 sh_size_one"><?= $showtindang['new_title'] ?></h4>
                                    </a>
                                <? } else { ?>
                                    <a href="/<?= replaceTitle($showtindang['new_title']) ?>-ct<?= $showtindang['new_id'] ?>.html">
                                        <h4 class="text_ellipsis ellip_line1 mb_5 sh_size_one"><?= $showtindang['new_title'] ?></h4>
                                    </a>
                                <? } ?>
                                <div class="content_product">
                                    <? if ($showtindang['new_cate_id'] != 121) { ?>
                                        <div class="nguoim_dangtin d_flex mb_10">
                                            <img src="/images/anh_moi/avt_tam_ndang.png" class="anhtam_ndang">
                                            <span class="text_ellipsis ellip_line1 ten_ndang_tin ml_5 sh_clr_six sh_size_five">
                                                <?= ($showtindang['new_type'] == 1) ? $showtindang['usc_name'] : $showtindang['usc_store_name']  ?>
                                            </span>
                                        </div>
                                    <? } ?>
                                    <p class="fz_13 cr_weight <?= ($showtindang['new_cate_id'] == 121) ? "tvlam_mb" : "" ?>"><?= lay_tgian($showtindang['new_update_time']) ?> </p>
                                    <p class="elipsis1 fz_13 <?= ($showtindang['new_cate_id'] == 121) ? "tvlam_mb" : "" ?>"><?= ltrim($showtindang['dia_chi'], ', ') ?></p>
                                    <? if ($showtindang['new_cate_id'] != 121) { ?>
                                        <p class="fz_13">Thời gian hết hạn thầu: <?= date('d/m/Y', $showtindang['han_su_dung']) ?></p>
                                    <? } ?>
                                    <div class="tien_chat">
                                        <? if ($showtindang['new_money'] != 0 && $showtindang['gia_kt'] == 0) { ?>
                                            <span class="sh_size_four gia_tien_m elipsis1">Từ <?= number_format($showtindang['new_money']) ?> <?= $arr_dvtien[$showtindang['new_unit']] ?></span>
                                        <? } else if ($showtindang['new_money'] == 0 && $showtindang['gia_kt'] != 0) { ?>
                                            <span class="sh_size_four gia_tien_m elipsis1">Đến <?= number_format($showtindang['gia_kt']) ?> <?= $arr_dvtien[$showtindang['new_unit']] ?></span>
                                        <? } else if ($showtindang['new_money'] != 0 && $showtindang['gia_kt'] != 0) { ?>
                                            <span class="sh_size_four gia_tien_m elipsis1"><?= number_format($showtindang['new_money']) ?> - <?= number_format($showtindang['gia_kt']) ?> <?= $arr_dvtien[$showtindang['new_unit']] ?></span>
                                        <? } ?>
                                        <? if ($showtindang['new_cate_id'] == 121) { ?>
                                            <? if ($showtindang['new_money'] == 0 && $showtindang['gia_kt'] == 0) { ?>
                                                <span class="sh_size_four gia_tien_m elipsis1">Thỏa thuận</span>
                                            <? } ?>
                                        <? } ?>
                                        <? if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) { ?>
                                            <a class="img_like item_chat" target="_blank" id-chat="<?= $showtindang['chat365_id'] ?>" rel="nofollow" href="<?= rewriteNews($showtindang['new_id'], $showtindang['new_title']); ?>">
                                                <p class="chat_th">Chat</p>
                                            </a>
                                        <? } else { ?>
                                            <a class="img_like item_chat op_ovl_dn" id-chat="<?= $showtindang['chat365_id'] ?>">
                                                <p class="chat_th">Chat</p>
                                            </a>
                                        <? } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <? } ?>
            </div>
        </div>
    </div>

    <div class="news_container">
        <div class="news_container_header d_flex agn_items jus_content">
            <h2>TIN TỨC</h2>
            <a href="/tin-tuc.html" class="d_flex see_more_container">
                <p>Xem tất cả</p>
                <img src="../images/eva_arrow-forward-outline.png" alt="">
            </a>
        </div>
        <div class="news_container_parent">
            <div class="news_container_content d_flex">
                <? while ($showtin = (mysql_fetch_assoc($ht_tint->result))) { ?>
                    <a href="/tin-tuc/<?= replaceTitle($showtin['new_title']) ?>-c<?= $showtin['new_id'] ?>.html" class="news_container_content_item tex_jus df_index_2">
                        <div class="df_index_1">
                            <img src="/pictures/news/<?= $showtin['new_picture'] ?>" alt="">
                        </div>
                        <h4><?= $showtin['new_title'] ?></h4>
                        <p><?= $showtin['new_teaser'] ?></p>
                    </a>
                <? } ?>
            </div>
        </div>

    </div>

    <div class="trends_container">
        <div class="trends_container_header d_flex agn_items jus_content">
            <h2>XU HƯỚNG TÌM KIẾM</h2>
        </div>
        <div class="trends_container_content d_flex">
            <?
            $qr = new db_query("SELECT `search_key` FROM `search_popular` ORDER BY count_num desc , rand() limit 7");
            $lis = $qr->result_array();
            ?>
            <?php foreach ($lis as $m => $value_lis) : ?>
                <a onclick="click_search2(this)" data-name="<?= str_replace('-', ' ', $value_lis['search_key'])  ?>" class="trends_container_content_item"><?= str_replace('-', ' ', $value_lis['search_key'])  ?></a>
            <?php endforeach ?>
        </div>
    </div>
    <? include("../includes/inc_new/inc_footer.php"); ?>
    <script type="text/javascript" src="../js/style_new/js_h.js"></script>
    <script type="text/javascript" src="../js/style_new/app.js"></script>
    <script type="text/javascript">
        // CLICK TIM TIN
        function yeu_thich(id) {
            var new_id = $(id).attr('data');

            $.ajax({
                type: 'POST',
                url: '../ajax/tinyeuthich.php',
                data: {
                    new_id: new_id,
                },
                success: function(d) {
                    // alert(d);
                    window.location.reload();
                }
            })
        }


        $(document).ready(function() {
            $('.info_purchase_content').slick({
                infinite: true,
                rows: 12,
                slidesPerRow: 2,
                arrows: true,
                dots: true,
                prevArrow: "<img class='a-left control-c prev slick-prev img_arrow' src='../images/newImages/arrow-left.png'>",
                nextArrow: "<img class='a-right control-c next slick-next img_arrow' src='../images/newImages/arrow-right.png'>",
                responsive: [{
                    breakpoint: 481,
                    settings: {
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
                prevArrow: "<img class='a-left control-c prev slick-prev img_arrow' src='../images/newImages/arrow-left.png'>",
                nextArrow: "<img class='a-right control-c next slick-next img_arrow' src='../images/newImages/arrow-right.png'>",
                responsive: [{
                        breakpoint: 1025,
                        settings: {
                            slidesPerRow: 3,
                            arrows: true,
                            dots: true,
                            prevArrow: "<img class='a-left control-c prev slick-prev img_arrow' src='../images/newImages/arrow-left.png'>",
                            nextArrow: "<img class='a-right control-c next slick-next img_arrow' src='../images/newImages/arrow-right.png'>",
                        }
                    },
                    {
                        breakpoint: 769,
                        settings: {
                            slidesPerRow: 2,
                            arrows: true,
                            dots: true,
                            prevArrow: "<img class='a-left control-c prev slick-prev img_arrow' src='../images/newImages/arrow-left.png'>",
                            nextArrow: "<img class='a-right control-c next slick-next img_arrow' src='../images/newImages/arrow-right.png'>",
                        }
                    }, {
                        breakpoint: 481,
                        settings: {
                            slidesPerRow: 2,
                            arrows: false,

                            dots: true,

                        }
                    }
                ],

            });



        });
    </script>

</body>

</html>