<?php
include("config.php");

if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $id_user = $_COOKIE['UID'];
    $type_user = $_COOKIE['UT'];
};

// TIN TỨC
$ht_tint = new db_query("SELECT `new_id`, `new_title`, `new_teaser`, `new_date_last_edit` ,`new_picture` FROM `news` ORDER BY `new_id` DESC LIMIT 4");
// DANH MUC
$danhmuc = new db_query("SELECT `cat_id`,`cat_name`,`cat_picture` FROM `category` WHERE `cat_parent_id` = 0 ORDER BY `cat_id` DESC LIMIT 14");
$gia = array(1 => 'VNĐ', 2 => 'USD', 3 => 'EURO');

//TIN ĐĂNG NỔI BẬT
$tindang = new db_query("SELECT `new_id`, `new_unit`, `new_title`, `chotang_mphi`, `new_create_time`, `dia_chi`, `new_money`, `new_image`,
                        `new_pin_home_prominent`, `chat365_id` FROM `new` INNER JOIN `user` ON `new`.`new_user_id` = `user`.`usc_id`
                        WHERE `new_type` != 2 AND `da_ban` != 1  ORDER BY `new_id` DESC LIMIT 0,24 ");

// TIN ĐĂNG HẤP DẪN
$tindanghapdan = new db_query("SELECT `new_id`, `new_unit`, `chotang_mphi`, `new_title`, `new_create_time`, `dia_chi`, `new_money`, `new_image`,
                            `new_pin_home_attractive`, `chat365_id` FROM `new` INNER JOIN `user` ON `new`.`new_user_id` = `user`.`usc_id`
                            WHERE `new_pin_home_prominent` = 0 AND `new_type` != 2 AND `da_ban` != 1 ORDER BY `new_id` DESC LIMIT 25,24 ");

// GIAN HÀNG NỔI BẬT
$gianhaang = new db_query("SELECT `usc_id`, `usc_store_name`,`usc_anhbia`,`usc_city` FROM `user` WHERE `usc_type` = 3 ORDER BY `usc_id` LIMIT 60");
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="robots" content="noindex, nofollow" />
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui" />

    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>

    <link rel="preload" href="/css/select2.min.css?v='<?= $version ?>'" as="style">
    <link rel="stylesheet" type="text/css" href="/css/select2.min.css?v='<?= $version ?>'" />

    <link rel="stylesheet" type="text/css" href="/css/style_new/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/slick.css" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />

    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>">

    <link rel="stylesheet" type="text/css" href="/css/style_new/style_h.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/app.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/newCss/admin.style.css?v=<?= $version ?>">
    <title>Trang người bán</title>
</head>


<body>
    <?
    //----------------
    include("../includes/common/inc_header.php");
    include("../classes/Mobile_Detect.php");
    ?>

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
                <a href="/tat-ca-danh-muc.html" class="d_flex see_more_container">
                    <p>Tất cả danh mục</p>
                    <img src="../images/eva_arrow-forward-outline.png" alt="">
                </a>
            </div>
            <div class="header_category_content_container">
                <div class="header_category_content_scroll">
                    <div class="header_category_content_list d_flex w_100">
                        <? while ($showdm = (mysql_fetch_assoc($danhmuc->result))) { ?>
                            <a href="#" class="category_item tex_center">
                                <div class="df_index_img1">
                                    <img src="/pictures/<?= $showdm['cat_picture'] ?>">
                                </div>
                                <p><?= $showdm['cat_name']; ?></p>
                            </a>
                        <? } ?>
                    </div>

                </div>
            </div>

            <img class='a-left control-c prev img_arrow scroll_category prev_category' src='../images/newImages/arrow-left.png'>
            <img class='a-right control-c next img_arrow scroll_category next_category' src='../images/newImages/arrow-right.png'>
            <div class="w_100 agn_items justify-content-center btn_seemore">
                <a href="" class="btn_seemore_category d_flex justify-content-center agn_items">Tất cả danh mục</a>
            </div>
        </div>
    </div>

    <div class="registers_container">
        <div class="registers_container_header d_flex agn_items jus_content">
            <h2>GIAN HÀNG NỔI BẬT</h2>
        </div>
        <div class="gian_hang_hn">
            <div class="registers_container_content d_flex">
                <? while ($showgianhang = (mysql_fetch_assoc($gianhaang->result))) {
                    $avat_gianhang = $showgianhang['usc_anhbia'];
                ?>
                    <a href="/gian-hang/<?= $showgianhang['usc_id'] ?>/<?= replaceTitle($showgianhang['usc_store_name']) ?>.html" class="registers_container_content_item">
                        <div class="df_img_index3">
                            <? if ($avat_gianhang == '') { ?>
                                <img src="/images/anh_moi/dai_dien_avt.png" alt="">
                            <? } else { ?>
                                <img src="/pictures/avt_dangtin/<?= $showgianhang['usc_anhbia'] ?>" alt="">
                            <? } ?>
                        </div>
                        <div class="div_bao_fig">
                            <p class="elipsis2"><?= $showgianhang['usc_store_name'] ?></p>
                            <span class="localtion_register"><?= $arr_tinh[$showgianhang['usc_city']] ?></span>
                        </div>
                    </a>
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
            <a href="/tat-ca-danh-muc.html" class="d_flex see_more_container">
                <p>Xem tất cả</p>
                <img src="../images/eva_arrow-forward-outline.png" alt="">
            </a>
        </div>
        <div class="info_purchase_container">
            <div class="info_purchase_content d_flex">
                <? while ($showtindang = (mysql_fetch_assoc($tindang->result))) {

                    $img_tdnb = $showtindang['new_image'];
                    $img_tdnb1 = explode(',', $img_tdnb);

                    $img_tdnb2 = count($img_tdnb1);

                    $id_tin = $showtindang['new_id'];
                    $check = new db_query("SELECT `id` FROM `tin_yeu_thich` WHERE `new_id` = '$id_tin' AND `user_id` = '$id_user' AND `usc_type` = '$type_user'");
                    $check_num = mysql_num_rows($check->result);
                ?>
                    <div class="info_purchase_content_item">
                        <div class="info_purchase_content_item_child d_flex">
                            <div class="img_product_container img_product_container_df">
                                <div class="df_img_index2">
                                    <a href="#"><img class="img_product" src="/pictures/<?= $img_tdnb1[0] ?>"></a>
                                </div>
                                <div class="num_img">
                                    <? if ($img_tdnb2 > 1) { ?>
                                        <img src="../images/newImages/view.png" alt="">
                                        <p class="count_img"><?= $img_tdnb2 ?></p>
                                    <? } ?>
                                </div>
                                <div class="yeuthich_tinl">
                                    <? if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) { ?>
                                        <? if ($check_num == 0) { ?>
                                            <img src="../images/anh_moi/yeuthich_moi.png" data="<?= $id_tin ?>" alt="" class="ko_yeuthich hd_cspointer" onclick="yeu_thich(this)">
                                        <? } else { ?>
                                            <img src="../images/anh_moi/anh014.png" data="<?= $id_tin ?>" alt="" class="yeuthich hd_cspointer" onclick="yeu_thich(this)">
                                        <? } ?>
                                    <? } else { ?>
                                        <a href="/dang-nhap.html">
                                            <img src="../images/anh_moi/yeuthich_moi.png" alt="anh013" class="ko_yeuthich hd_cspointer">
                                        </a>
                                    <? } ?>
                                </div>
                            </div>
                            <div class="info_purchase_content_item_text">
                                <a href="<?= replaceTitle($showtindang['new_title']) ?>-c<?= $showtindang['new_id'] ?>.html">
                                    <h4 class="text_ellipsis ellip_line2"><?= $showtindang['new_title'] ?></h4>
                                </a>
                                <div class="content_product">
                                    <p><?= lay_tgian($showtindang['new_create_time']) ?></p>
                                    <p class="elipsis1"><?= $showtindang['dia_chi'] ?></p>
                                    <? if ($showtindang['chotang_mphi'] == 1) { ?>
                                        <span>Cho tặng miễn phí</span>
                                    <? } elseif ($showtindang['new_money'] > 0) { ?>
                                        <span><?= number_format($showtindang['new_money']) ?> <?= $gia[$showtindang['new_unit']] ?></span>
                                    <? } elseif ($showtindang['new_money'] == 0) { ?>
                                        <span>Liên hệ người bán để hỏi giá</span>
                                    <? } ?>
                                </div>
                            </div>
                            <a class="img_like item_chat" target="_blank" id-chat="<?= $showtindang['chat365_id'] ?>" rel="nofollow" href="<?= rewriteNews($showtindang['new_id'], $showtindang['new_title']); ?>">
                                <p class="chat_th">Chat</p>
                            </a>
                        </div>
                    </div>
                <? } ?>
            </div>
        </div>
    </div>
    <!-- TIN ĐĂNG HẤP DẪN -->
    <div class="info_purchase">
        <div class="info_purchase_header d_flex agn_items jus_content">
            <h2>TIN ĐĂNG HẤP DẪN</h2>
            <a href="/tat-ca-danh-muc.html" class="d_flex see_more_container">
                <p>Xem tất cả</p>
                <img src="../images/eva_arrow-forward-outline.png" alt="">
            </a>
        </div>
        <div class="info_purchase_container">
            <div class="info_purchase_content d_flex">
                <? while ($show_td_hapdan = (mysql_fetch_assoc($tindanghapdan->result))) {
                    $img_tinhd = $show_td_hapdan['new_image'];
                    $img_tinhd = explode(',', $img_tinhd);

                    $img_tinhd2 = count($img_tinhd);
                    $id_tin = $show_td_hapdan['new_id'];
                    $check = new db_query("SELECT `id` FROM `tin_yeu_thich` WHERE `new_id` = '$id_tin' AND `user_id` = '$id_user' AND `usc_type` = '$type_user'");
                    $check_num = mysql_num_rows($check->result);
                ?>
                    <div class="info_purchase_content_item">
                        <div class="info_purchase_content_item_child d_flex">
                            <div class="img_product_container img_product_container_df">
                                <div class="df_img_index2">
                                    <? if ($img_tinhd == '') { ?>
                                        <img class="img_product" src="../images/newImages/flower.png" alt="">
                                    <? } else { ?>
                                        <img class="img_product" src="/pictures/<?= $img_tinhd[0] ?>" alt="">
                                    <? } ?>
                                </div>
                                <div class="num_img">
                                    <? if ($img_tinhd2 > 1) { ?>
                                        <img src="../images/newImages/view.png" alt="">
                                        <p class="count_img"><?= $img_tinhd2 ?></p>
                                    <? } ?>
                                </div>
                                <div class="yeuthich_tinl">
                                    <? if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) { { ?>
                                            <? if ($check_num == 0) { ?>
                                                <img src="../images/anh_moi/yeuthich_moi.png" data="<?= $id_tin ?>" class="ko_yeuthich hd_cspointer" onclick="yeu_thich(this)">
                                            <? } else { ?>
                                                <img src="../images/anh_moi/anh014.png" data="<?= $id_tin ?>" alt="" class="yeuthich hd_cspointer" onclick="yeu_thich(this)">
                                            <? } ?>
                                        <? }
                                    } else { ?>
                                        <a href="/dang-nhap.html">
                                            <img src="../images/anh_moi/yeuthich_moi.png" class="ko_yeuthich hd_cspointer">
                                        </a>
                                    <? } ?>
                                </div>
                            </div>
                            <div class="info_purchase_content_item_text">
                                <a href="/<?= replaceTitle($show_td_hapdan['new_title']) ?>-c<?= $show_td_hapdan['new_id'] ?>.html">
                                    <h4 class="text_ellipsis ellip_line2"><?= $show_td_hapdan['new_title'] ?></h4>
                                </a>
                                <div class="content_product">
                                    <p><?= lay_tgian($show_td_hapdan['new_create_time']) ?></p>
                                    <p class="elipsis1"><?= $show_td_hapdan['dia_chi'] ?></p>
                                    <? if ($show_td_hapdan['chotang_mphi'] == 1) { ?>
                                        <span>Cho tặng miễn phí</span>
                                    <? } elseif ($show_td_hapdan['new_money'] > 0) { ?>
                                        <span><?= number_format($show_td_hapdan['new_money']) ?> <?= $gia[$show_td_hapdan['new_unit']] ?></span>
                                    <? } elseif ($show_td_hapdan['new_money'] == 0) { ?>
                                        <span>Liên hệ người bán để hỏi giá</span>
                                    <? } ?>
                                </div>
                            </div>
                            <a class="img_like item_chat" target="_blank" id-chat="<?= $show_td_hapdan['chat365_id'] ?>" rel="nofollow" href="<?= rewriteNews($show_td_hapdan['new_id'], $show_td_hapdan['new_title']); ?>">
                                <p class="chat_th">Chat</p>
                            </a>
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
                            <img src="/pictures/avt_dangtin/<?= $showtin['new_picture'] ?>" alt="">
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
            <a href="" class="trends_container_content_item">
                shiba inu
            </a>
            <a href="" class="trends_container_content_item">
                iPhone 12
            </a>
            <a href="" class="trends_container_content_item">
                dụng cụ vệ sinh xe hơi
            </a>
            <a href="" class="trends_container_content_item">
                laptop lenovo
            </a>
            <a href="" class="trends_container_content_item">
                Tai nghe harman kardon
            </a>
        </div>
    </div>
    <? include '../modals/md_tb_yeuthich.php' ?>
    <? include("../includes/inc_new/inc_footer.php"); ?>
    <script type="text/javascript" src="../js/style_new/js_h.js"></script>
    <script type="text/javascript" src="../js/style_new/app.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.info_purchase_content').slick({
                infinite: true,
                rows: 6,
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
                            slidesPerRow: 3,
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