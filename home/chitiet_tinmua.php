<?

include("config.php");
$id_tin = getValue('id', 'int', 'GET', 0);
$timkiem_mua = 1;
if ($id_tin != 0) {
    $tang_view = new db_query("UPDATE `new` SET `new_view_count`= new_view_count + 1 WHERE `new_id` = $id_tin ");
    $list_ctiet = new db_query("SELECT n.`new_id`, n.`new_title`, n.`new_money`, n.`gia_kt`, n.`new_cate_id`, n.`new_city`, n.`new_user_id`, n.`new_image`,
                            n.`new_update_time`, n.`new_type`, n.`new_active`, n.`new_unit`, n.`new_address`, n.`quan_huyen`, n.`phuong_xa`, n.`new_view_count`,
                            n.`new_sonha`, n.`dia_chi`, n.`new_tinhtrang`, n.`link_title`, n.`new_name`, d.`new_des_id`, d.`new_description`,
                            d.`com_city`, d.`com_district`, d.`com_ward`, d.`com_address_num`, d.`han_bat_dau`, d.`han_su_dung`, d.`tgian_bd`, d.`tgian_kt`,
                            d.`new_job_kind`, d.`new_file_dthau`, d.`noidung_nhs`, d.`new_file_nophs`, d.`noidung_chidan`, d.`new_file_chidan`, d.`donvi_thau`,
                            d.`phi_duthau`, d.`file_mota`, d.`file_thutuc`, d.`file_hoso`, u.`usc_name`, u.`usc_time`, u.`usc_logo`, u.`usc_store_name`,
                            u.`chat365_id`, u.`usc_phone` FROM `new` AS n
                            INNER JOIN `new_description` AS d ON n.`new_id` = d.`new_id`
                            INNER JOIN `user` AS u ON n.`new_user_id` = u.`usc_id` WHERE  n.`new_id` = $id_tin AND n.`new_buy_sell` = 1 ");
    if (mysql_num_rows($list_ctiet->result) > 0) {
        $row_td = mysql_fetch_assoc($list_ctiet->result);
        $new_user_id = $row_td['new_user_id'];

        $avt_anh = $row_td['new_image'];
        if ($avt_anh != "") {
            $avt_anh = explode(';', $avt_anh);
            $cou_file  = count($avt_anh);
        } else {
            $cou_file = 0;
        };

        $tinh_trang  = array(
            1 => 'Cũ',
            2 => 'Mới (chưa qua sử dụng)',
        );

        $so_sao = new db_query("SELECT SUM(`eva_stars`) AS sum_sao, COUNT(`eva_id`) AS cou_sao FROM `evaluate` WHERE `new_id` = 0 AND `bl_user` = $new_user_id ");
        $ss_sao = mysql_fetch_assoc($so_sao->result);
        $sun_sao = $ss_sao['sum_sao'];
        $cou_sao = $ss_sao['cou_sao'];

        $list_ten = new db_query("SELECT `cat_parent_id`, `cat_name`  FROM `category` WHERE `cat_id` = '" . $row_td['new_cate_id'] . "' ");
        $row_dmuc = mysql_fetch_assoc($list_ten->result);
        $cat_parent_id = $row_dmuc['cat_parent_id'];
        $cat_name = $row_dmuc['cat_name'];
        if ($cat_parent_id != 0) {
            $dmuc_cha = mysql_fetch_assoc((new db_query("SELECT `cat_id`, `cat_name`  FROM `category` WHERE `cat_id` = $cat_parent_id "))->result);
            $id_dmcha = $dmuc_cha['cat_id'];
            $ten_dmcha = $dmuc_cha['cat_name'];
        } else {
            $ten_dmcha = '';
        };

        $my_id = intval(@$_COOKIE['id_chat365']);
        if ($my_id > 0) {
            $qr_sc = new db_query("SELECT chat365_secret FROM user WHERE chat365_id = '$my_id'");
            $row_sc = mysql_fetch_assoc($qr_sc->result);
            $chat365_secret = $row_sc['chat365_secret'];
        } else {
            $chat365_secret = '';
        }
        $link_chat = get_link_chat365($my_id, $row_td['chat365_id'], $row_td['new_user_id'], $row_td['usc_name'], $row_td['usc_phone'], '', $chat365_secret);

        if ($row_td['new_city'] == 0) {
            $city_name = ' trên Toàn quốc';
        } else {
            $city_name = " tại " . $arrcity[$row_td['new_city']]['cit_name'];
        }
        $title = $row_td['new_title'] . $city_name . " - " . $row_td['new_id'];
        $urldt = "http://dev5.tinnhanh365.vn/" . replaceTitle($row_td['link_title']) . "-ct" . $row_td['new_id'] . ".html";

        $urluri = "http://dev5.tinnhanh365.vn" . $_SERVER['REQUEST_URI'];

        if ($urldt != $urluri) {
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: $urldt");
            exit();
        }
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

    <title><?= removeHTML($title) ?></title>
    <meta name="keywords" content="<?= removeHTML($row_td['new_title']) ?>, Rao vặt miễn phí, <?= removeHTML($row_td['new_title']) . $city_name ?>, mua bán, <?= ($row_td['new_city'] == 0) ? "Toàn quốc" : $arrcity[$row_td['new_city']]['cit_name']; ?>, rao vat, rao vặt" />
    <meta name="description" content="<?= removeHTML($row_td['new_title']) . $city_name ?> trên kênh rao vặt miễn phí Raonhanh365. <?= trim(removeHTML(cut_string($row_td['new_description'], 200, ""))) ?>" />
    <meta property="og:title" content="<?= removeHTML($title) ?>" />
    <meta property="og:description" content="<?= removeHTML($row_td['new_title']) . $city_name ?> trên kênh rao vặt miễn phí Raonhanh365. <?= trim(removeHTML(cut_string($row_td['new_description'], 200, ""))) ?>" />
    <meta property="og:url" content="<?= $urldt ?>" />
    <meta name="language" content="vietnamese" />
    <meta name="copyright" content="Copyright © 2017 by raonhanh365.vn" />
    <meta name="abstract" content="<?= removeHTML($title) ?>" />
    <meta name="author" itemprop="author" content="raonhanh365.vn" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="content-language" itemprop="inLanguage" content="vi" />
    <!-- <meta name="robots" content="index, follow,noodp" /> -->
    <meta name="robots" content="noindex,nofollow">

    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui" />
    <meta property="og:image:url" content="<?= $new_image[0] ?>" />
    <meta property="og:image:width" content="476" />
    <meta property="og:image:height" content="249" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="vi_VN" />
    <meta name="revisit-after" content="1 days" />
    <meta name="page-topic" content="Mua bán rao vặt" />
    <meta name="resource-type" content="Document" />
    <meta name="distribution" content="Global" />

    <link rel="canonical" href="<?= $urldt ?>" />

    <link rel="stylesheet" href="/css/slick.css">
    <link rel="stylesheet" href="/css/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />
    <link rel="stylesheet" href="/css/style_new/style.css?v=<?= $version ?>">
    <link rel="stylesheet" href="/css/style_new/app.css?v=<?= $version ?>">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_dien2.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_dien3.css?v=<?= $version ?>">
</head>

<body>
    <?php include("../includes/common/inc_header.php"); ?>
    <section class="edit_infor">
        <div class="mt30 bshadow_none">
            <div class="seller_detail_container_df seller_detail_container bg_shadow_none">
                <div class="tt-nguoiban">
                    <div class="sdc_top">
                        <div class="sdc_avatar">
                            <img onerror="this.onerror=null; this.src='/images/anh_moi/avatar.png';" src="<?= str_replace('../', '/', $row_td['usc_logo']) ?>" alt="avatar">
                        </div>
                        <div class="sdc_info">
                            <p class="fs_16_19 font_500 sdc_name"><?= $row_td['usc_name'] ?></p>
                            <p class="text_disabled fs_13_15 pt-5 sdc_type">Tài khoản <?= $arr_type[$row_td['new_type']] ?></p>
                            <p class="text_disabled fs_13_15 pt-5 sdc_signup">Tham gia: <?= date('d-m-Y', $row_td['usc_time']) ?></p>
                        </div>
                    </div>
                    <div class="sdc_body sdc_body_df mb-20">
                        <div class="v-table v-table_df">
                            <div class="row">
                                <div class="col_one col_one_df">
                                    <p class="fs_16_19 font_500 text_disabled df">Đánh giá</p>
                                </div>
                                <div class="df_5sao_to">
                                    <div class="df_5sao" style="width:<?= ($sun_sao / $cou_sao) * 20 ?>%">
                                        <div class="div5sao_df">
                                            <img src="../images/anh_moi/5sao2.svg" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border_right"></div>
                            <div class="row">
                                <div class="col_one col_one_df">
                                    <p class="fs_16_19 font_500 text_disabled">Phản hồi chat</p>
                                </div>
                                <div class="col_one col_one_df">
                                    <div class="pt-10 fs_20_23 font_500">
                                        <p>0% </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sdc_foot sdc_foot_df">
                        <? if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) { ?>
                            <? if ($_COOKIE['UID'] == $row_td['new_user_id']) { ?>
                                <a href="<?php if ($row_td['new_type'] == 1) {
                                                echo "/ho-so-nguoi-ban-ca-nhan.html";
                                            } else if ($row_td['new_type'] == 5) {
                                                echo "/ho-so-gian-hang-cua-toi-trang-chu.html";
                                            } ?>">
                                    <div class="v-btn-fluid btn_outline-orange fs_14_16 font_500 sh_cursor"><i class="ic-profile-circle pr-20"></i>XEM TRANG CÁ NHÂN</div>
                                </a>
                            <? } else { ?>
                                <? if ($row_td['new_type'] == 5) { ?>
                                    <a href="/gian-hang/<?= $row_td['new_user_id'] ?>/<?= replaceTitle($row_td['usc_store_name']) ?>.html">
                                        <div class="v-btn-fluid btn_outline-orange fs_14_16 font_500 sh_cursor"><i class="ic-profile-circle pr-20"></i>XEM TRANG CÁ NHÂN</div>
                                    </a>
                                <? } else if ($row_td['new_type'] == 1) { ?>
                                    <a href="/ca-nhan/<?= $row_td['new_user_id'] ?>/<?= replaceTitle($row_td['usc_name']) ?>.html">
                                        <div class="v-btn-fluid btn_outline-orange fs_14_16 font_500 sh_cursor"><i class="ic-profile-circle pr-20"></i>XEM TRANG CÁ NHÂN</div>
                                    </a>
                                <? } ?>
                                <div id="show_phonenum" class="v-btn-fluid btn-orange mt-10 fs_14_16 font_500 sh_cursor w_100 bdradius_5" onclick="clk_hso_dthoai(this)" data="<?= $row_td['new_user_id'] ?>">
                                    <i class="ic-phone pr-20"></i>
                                    <span class="phone_text hien_so">NHẤN ĐỂ HIỆN SỐ</span>
                                </div>
                                <a href="<?= $link_chat; ?>" target="_blank" class="v-btn-fluid btn-green mt-10 fs_14_16 font_500 sh_cursor"><i class="ic-chat pr-20"></i>CHAT VỚI NGƯỜI MUA</a>
                            <? }
                        } else {
                            if ($row_td['new_type'] == 1) { ?>
                                <a href="/ca-nhan/<?= $row_td['new_user_id'] ?>/<?= replaceTitle($row_td['usc_name']) ?>.html">
                                    <div class="v-btn-fluid btn_outline-orange fs_14_16 font_500 sh_cursor"><i class="ic-profile-circle pr-20"></i>XEM TRANG CÁ NHÂN</div>
                                </a>
                            <? } else if ($row_td['new_type'] == 5) { ?>
                                <a href="/gian-hang/<?= $row_td['new_user_id'] ?>/<?= replaceTitle($row_td['usc_store_name']) ?>.html">
                                    <div class="v-btn-fluid btn_outline-orange fs_14_16 font_500 sh_cursor"><i class="ic-profile-circle pr-20"></i>XEM TRANG CÁ NHÂN</div>
                                </a>
                            <? } ?>

                            <div id="show_phonenum" class="v-btn-fluid btn-orange mt-10 fs_14_16 font_500 sh_cursor op_ovl_dn w_100 bdradius_5">
                                <i class="ic-phone pr-20"></i>
                                <span class="phone_text">NHẤN ĐỂ HIỆN SỐ</span>
                            </div>
                            <a class="v-btn-fluid btn-green mt-10 fs_14_16 font_500 sh_cursor op_ovl_dn"><i class="ic-chat pr-20"></i>
                                CHAT VỚI NGƯỜI MUA
                            </a>
                        <? } ?>
                    </div>
                </div>
                <div class="ds-khach-on ds_khach_on">
                    <h2 class="tieude_ghonl sh_clr_two">Danh sách bạn bè</h2>
                    <div id="list_chat">

                    </div>
                </div>
            </div>
        </div>
        <div class="v_container">
            <div class="v_product v_product_df_7-7">
                <div class="product_container" data="<?= date('Y-m-d H:i:s', $row_td['han_su_dung']) ?>">
                    <div class="pc_header d-flex space-between pad_b20">
                        <div class="pc_head-left">
                            <ul class="v-breadcrumb">
                                <li><a href="/">Trang chủ</a></li>
                                <li><a href="/trang-tin-mua.html">Trang tin mua</a></li>
                                <? if ($ten_dmcha != "") { ?>
                                    <li><a href="/tim-mua-<?= replaceTitle($ten_dmcha) ?>-d<?= $id_dmcha ?>.html"><?= $ten_dmcha ?></a></li>
                                <? } ?>
                                <li><a href="/tim-mua-<?= replaceTitle($cat_name) ?>-d<?= $row_td['new_cate_id'] ?>.html"><?= $cat_name ?></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="dang-tin-uv-anh slide_show">
                        <div class="slider df_relative anhavt_sld">
                            <? if ($cou_file > 0) {
                                for ($i = 0; $i < $cou_file; $i++) { ?>
                                    <img class="w_100" src="<?= $avt_anh[$i] ?>" alt="">
                                <? }
                            } else { ?>
                                <img class="w_100" src="/images/anh_moi/banner.png" alt="">
                            <? } ?>
                        </div>
                        <div class="dang-tin-uv-gio">
                            <p><?= lay_tgian($row_td['new_update_time']) ?> | <?= $row_td['new_view_count'] ?> lượt xem</p>
                        </div>
                    </div>
                    <div class="pc_name w-100">
                        <p class="pad_b20"><?= $row_td['new_title'] ?></p>
                    </div>
                    <div class="dang-tin-uv-luong ">
                        <div class="luong-trai d_f-g9">
                            <? if ($row_td['new_money'] != 0 && $row_td['gia_kt'] == 0) { ?>
                                <p class="luong-tu pad_0">Từ <?= number_format($row_td['new_money']) ?> <?= $arr_dvtien[$row_td['new_unit']] ?></p>
                            <? } else if ($row_td['new_money'] == 0 && $row_td['gia_kt'] != 0) { ?>
                                <p class="luong-tu pad_0">Đến <?= number_format($row_td['gia_kt']) ?> <?= $arr_dvtien[$row_td['new_unit']] ?></p>
                            <? } else if ($row_td['new_money'] != 0 && $row_td['gia_kt'] != 0) { ?>
                                <p class="luong-tu pad_0"><?= number_format($row_td['new_money']) ?> - <?= number_format($row_td['gia_kt']) ?> <?= $arr_dvtien[$row_td['new_unit']] ?></p>
                            <? } ?>

                            <label for="">
                                <img src="../images/dang-tin-mua/user1.svg" alt="">
                                <p class="vitri-vl"><?= $row_td['new_name'] ?></p>
                            </label>
                            <label for="">
                                <img src="../images/dang-tin-mua/bxs_map.svg" alt="">
                                <p class="vitri-vl"><?= ltrim($row_td['dia_chi'], ', ') ?></p>
                            </label>
                        </div>
                        <div class="luong-phai">
                            <? if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
                                $check_yt = new db_query("SELECT `id`, `new_id`, `user_id`, `usc_type`, `tgian_thich` FROM `tin_yeu_thich`
                                                        WHERE `new_id` = '" . $row_td['new_id'] . "' AND `user_id` = '" . $_COOKIE['UID'] . "' ");
                                $ton_tai = mysql_num_rows($check_yt->result); ?>
                                <div class="posistion_relative chia_se_ftc">
                                    <p class="share_ftc">Chia sẻ</p>
                                    <div class="share_popup">
                                        <a name="fb_share" type="button" target="_blank"><i class="ic-facebook"></i></a>
                                        <a name="tw_share" type="button" target="_blank"><i class="ic-twitter"></i></a>
                                        <a id="clickCopy"><i class="ic-share_link"></i></a>
                                    </div>
                                </div>
                                <? if ($_COOKIE['UID'] != $row_td['new_user_id']) { ?>
                                    <button type="button" class="btn-yeuthich <?= ($ton_tai > 0) ? "active" : "" ?>" onclick="yeu_thich(this)" data="<?= $row_td['new_id'] ?>">
                                        <img src="<?= ($ton_tai > 0) ?  "/images/anh_moi/tin_da_thich.svg" : "/images/dang-tin-mua/heart.svg" ?>" alt="">
                                        <p class="luong-phai-chu"><?= ($ton_tai > 0) ? "Đã thích" : "Yêu thích" ?></p>
                                    </button>
                                <? }
                            } else { ?>
                                <div class="posistion_relative chia_se_ftc">
                                    <p class="share_ftc">Chia sẻ</p>
                                    <div class="share_popup">
                                        <a name="fb_share" type="button" target="_blank"><i class="ic-facebook"></i></a>
                                        <a name="tw_share" type="button" target="_blank"><i class="ic-twitter"></i></a>
                                        <a id="clickCopy"><i class="ic-share_link"></i></a>
                                    </div>
                                </div>
                                <button type="button" class="btn-yeuthich">
                                    <img src="/images/dang-tin-mua/heart.svg" alt="">
                                    <p class="luong-phai-chu">Yêu thích</p>
                                </button>
                            <? } ?>
                        </div>
                    </div>
                    <div class="trangthai-thau d_flex">
                        <? if (time() > $row_td['han_su_dung']) { ?>
                            <p class="trang-thai-1 tt-2 active">KẾT THÚC CHÀO THẦU</p>
                        <? } else { ?>
                            <p class="trang-thai-1 tt-2">ĐANG CHÀO THẦU</p>
                        <? } ?>

                    </div>
                    <div class="thoi-gian-ket-thuc">
                        <div id="countdown">
                            <p class="chu-kt color_gray47">Kết thúc sau</p>
                            <ul class="demnguoc">
                                <div class="days">
                                    <li><span id="days"></span></li>
                                    <p>Ngày</p>
                                </div>
                                <div class="hours">
                                    <li><span id="hours"></span></li>
                                    <p>Giờ</p>
                                </div>
                                <div class="minutes">
                                    <li><span id="minutes"></span></li>
                                    <p>Phút</p>
                                </div>
                                <div class="seconds">
                                    <li><span id="seconds"></span></li>
                                    <p>Giây</p>
                                </div>
                            </ul>
                        </div>
                        <div class="ds-thamgia_nhathau">
                            <div class="btn-ds">
                                <p class="color_blue4c">Danh sách nhà thầu</p>
                            </div>
                            <? if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
                                if ($_COOKIE['UID'] != $row_td['new_user_id']) {
                                    $check_dt = new db_query("SELECT `id`, `status` FROM `dau_thau` WHERE `new_id` = '" . $row_td['new_id'] . "' AND `user_id` = '" . $_COOKIE['UID'] . "' ORDER BY `id` DESC LIMIT 1 ");
                                    if (mysql_num_rows($check_dt->result) > 0) {
                                        $row_dt = mysql_fetch_assoc($check_dt->result);
                                        if ($row_dt['status'] == 0) { ?>
                                            <div class="btn-join active">
                                                <p class="color_white">ĐÃ THAM GIA THẦU</p>
                                            </div>
                                        <? } else if ($row_dt['status'] == 1) { ?>
                                            <div class="btn-join active">
                                                <p class="color_white">ĐÃ TRÚNG THẦU</p>
                                            </div>
                                            <? } else if ($row_dt['status'] == 2) {
                                            if ($row_td['han_su_dung'] >= time()) { ?>
                                                <div class="btn-join sh_cursor" id="btn_join">
                                                    <p class="color_white">THAM GIA THẦU</p>
                                                </div>
                                            <? } else {
                                                echo "";
                                            }
                                        }
                                    } else {
                                        if ($row_td['han_su_dung'] >= time()) { ?>
                                            <div class="btn-join sh_cursor" id="btn_join">
                                                <p class="color_white">THAM GIA THẦU</p>
                                            </div>
                                    <? } else {
                                            echo "";
                                        }
                                    }
                                }
                            } else {
                                if ($row_td['han_su_dung'] >= time()) {  ?>
                                    <div class="btn-join sh_cursor op_ovl_dn">
                                        <p class="color_white">THAM GIA THẦU</p>
                                    </div>
                            <? } else {
                                    echo "";
                                }
                            } ?>
                        </div>
                    </div>
                    <div class="tt-dau-thau">
                        <p class="tt-dau-thau-1">Thông tin đấu thầu</p>
                        <p class="chu-1 font_w600 color_gray47 mt32">Mô tả sản phẩm</p>
                        <p class="chu-1 color_gray47 mt10"><?= nl2br($row_td['new_description']) ?></p>
                        <? if ($row_td['new_file_dthau'] != "") { ?>
                            <div class="up-file">
                                <a href="/pictures/<?= $row_td['new_file_dthau'] ?>" target="_blank" class="d_flex al_items-c gap10">
                                    <span class="shownamefile1"><?= str_replace('avt_tindangmua/', '', $row_td['new_file_dthau'])  ?></span>
                                    <img src="../images/dang-tin-mua/upload-cloud-red.svg" alt="">
                                </a>
                            </div>
                        <? } ?>
                    </div>
                    <? if (in_array($row_td['new_cate_id'], $bo_dtinmua_ttrang) == false) { ?>
                        <div class="tinh-trang">
                            <p class="chu-1 font_w600 color_gray47">Tình trạng</p>
                            <p class="chu-1 color_blue4c font_w500 mt10"><?= $tinh_trang[$row_td['new_tinhtrang']] ?></p>
                        </div>
                    <? } ?>
                    <div class="thu-tuc">
                        <div class="thu-tuc-1 mt20">
                            <p class="chu-1 font_w600 color_gray47">Thủ tục nộp hồ sơ mời thầu:
                            <div class="chon-on-off">
                                <div data-id="2" class="loaihoso"><?= ($row_td['new_address'] != "") ? "Offline" : "Online" ?></div>
                            </div>
                        </div>
                        </p>
                        <? if ($row_td['new_address'] != "") { ?>
                            <p class="chu-1 color_666">Địa điểm nộp hồ sơ: <?= $row_td['new_address'] ?></p>
                        <? }
                        if ($row_td['noidung_nhs'] != "") { ?>
                            <p class="chu-1 color_666"><?= nl2br($row_td['noidung_nhs']) ?></p>
                        <? } ?>
                        <? if ($row_td['new_file_nophs'] != "") { ?>
                            <div class="up-file">
                                <a href="/pictures/<?= $row_td['new_file_nophs'] ?>" target="_blank">
                                    <span class="shownamefile2"><?= str_replace('avt_tindangmua/', '', $row_td['new_file_nophs']) ?></span>
                                    <img src="../images/dang-tin-mua/upload-cloud-red.svg" alt="" style="float: right; padding-left:10px">
                                </a>
                            </div>
                        <? } ?>
                    </div>
                    <div class="tg-batdau">
                        <p class="chu-1 font_w600 color_gray47">Thời gian bắt đầu nhận hồ sơ mời thầu:</p>
                        <p class="chu-1 color_blue4c font_w500 mt10"><?= date('d/m/Y', $row_td['han_bat_dau']) ?></p>
                    </div>
                    <div class="tg-ketthuc mt20">
                        <p class="chu-1 font_w600 color_gray47">Thời gian kết thúc nhận hồ sơ mời thầu:</p>
                        <p class="chu-1 color_blue4c font_w500 mt10"><?= date('d/m/Y', $row_td['han_su_dung']) ?></p>
                    </div>
                    <div class="thoihan-bao-kq mt20">
                        <p class="chu-1 font_w600 color_gray47">Thời hạn thông báo kết quả trúng thầu:</p>
                        <p class="chu-1 color_blue4c font_w500 mt10"><?= date('d/m/Y', $row_td['tgian_bd']) ?> - <?= date('d/m/Y', $row_td['tgian_kt']) ?></p>
                    </div>
                    <div class="chi-dan mt20">
                        <p class="chu-1 font_w600 color_gray47">Chỉ dẫn tìm hiểu hồ sơ mời thầu:</p>
                        <p class="chu-1 color_gray47 mt10"><?= nl2br($row_td['noidung_chidan']) ?></p>
                        <? if ($row_td['new_file_chidan'] != "") { ?>
                            <div class="up-file">
                                <a href="/pictures/<?= $row_td['new_file_chidan'] ?>" target="_blank">
                                    <span class="shownamefile2"><?= str_replace('avt_tindangmua/', '', $row_td['new_file_chidan']) ?></span>
                                    <img src="../images/dang-tin-mua/upload-cloud-red.svg" alt="" style="float: right; padding-left:10px">
                                </a>
                            </div>
                        <? } ?>
                    </div>
                    <div class="phi-du-thau mt20">
                        <p class="chu-1 font_w600 color_gray47">Phí dự thầu</p>
                        <p class="chu-1 color_blue4c font_w500 pad_t10"><?= ($row_td['phi_duthau'] != "") ? number_format($row_td['phi_duthau']) : "0" ?> <?= $arr_dvtien[$row_td['donvi_thau']] ?></p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <div id="modal-huydon" class="modal">
        <div class="modal-content-huydon">
            <div class="huydon-header">
                <p>Thông tin tham gia</p>
                <span class="close">×</span>
            </div>
            <form class="thamgia_thau" data="<?= $row_td['new_user_id'] ?>">
                <div class="huydon-content h_modal420">
                    <div class="scroll-modal d_f-row20">
                        <div class="huydon-content-title d_f-row5 notify_err">
                            <p>Tên đơn vị đấu thầu <span class="color_red">*</span></p>
                            <input class="input-1" type="text" name="ten_dvithau" placeholder="Nhập tên">
                        </div>
                        <div class="huydon-content-title d_f-row5">
                            <p>Sản phẩm giới thiệu <span class="color_red">*</span></p>
                            <div class="notify_err">
                                <input class="input-1" type="text" name="ten_spham" placeholder="Tên sản phẩm...">
                            </div>
                            <div class="notify_err">
                                <textarea name="mota_spham" class="texa-mo-ta font-14-16 input_infor_tag error" placeholder="Nhập mô tả"></textarea>
                            </div>

                            <div class="link-sp po_ra">
                                <input class="input-1" type="text" name="link_spham" placeholder="Link sản phẩm">
                                <img src="../images/dang-tin-mua/lienket.svg" class="avt_ic_lnk">
                            </div>
                        </div>
                        <div class="huydon-content-title d_f-row5">
                            <p>Giới thiệu người tham gia đấu thầu</p>
                            <div class="notify_err">
                                <textarea name="gioi_thieu" class="texa-mo-ta font-14-16 input_infor_tag error" placeholder="Nhập thông tin"></textarea>
                            </div>
                            <div class="link-sp po_ra input-1">
                                <label for="uplink2" class="">
                                    <input type="file" class="up-link up-file-3" id="uplink2" onchange="ImgUpload(this)">
                                    <span class="shownamefile2">Tải tệp lên</span>
                                </label>
                                <div class="tep_tin d_none"></div>
                                <img src="../images/dang-tin-mua/upload-cloud.svg" class="avt_ic_ttin">
                            </div>
                        </div>
                        <div class="huydon-content-title d_f-row5">
                            <p>Hồ sơ năng lực của công ty (nếu là công ty)</p>
                            <div class="notify_err">
                                <textarea name="mota_nangluc" class="texa-mo-ta font-14-16 input_infor_tag error" placeholder="Nhập thông tin"></textarea>
                            </div>
                            <div class="link-sp po_ra input-1">
                                <label for="uplink3" class="">
                                    <input type="file" class="up-link up-file-3" id="uplink3" onchange="ImgUpload(this)">
                                    <span class="shownamefile2">Tải tệp lên</span>
                                </label>
                                <div class="tep_tin d_none"></div>
                                <img src="../images/dang-tin-mua/upload-cloud.svg" class="avt_ic_ttin">
                            </div>
                        </div>
                        <div class="dang-tin-1 d_f-row5">
                            <p class="thong-tin">Giá dự thầu <span class="color_red">*</span></p>
                            <div id="nhap-luong-3" class="dis_flex">
                                <div class="nhap-so notify_err">
                                    <input class="input-1" type="text" name="phidu_thau" id="" placeholder="Nhập phí dự thầu...">
                                </div>
                                <div class="don-vi-2">
                                    <select class="don-vi-tien-2" name="dvi_tien">
                                        <option value="1">VND</option>
                                        <option value="2">USD</option>
                                        <option value="3">EURO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="huydon-content-title d_f-row5">
                            <p>Khuyến mãi kèm theo </p>
                            <div class="notify_err">
                                <textarea name="mota_khuyenmai" class="texa-mo-ta font-14-16 input_infor_tag error" placeholder="Nhập thông tin"></textarea>
                            </div>
                            <div class="link-sp po_ra input-1">
                                <label for="uplink4" class="">
                                    <input type="file" class="up-link up-file-3" id="uplink4" onchange="ImgUpload(this)">
                                    <span class="shownamefile2">Tải tệp lên</span>
                                </label>
                                <div class="tep_tin d_none"></div>
                                <img src="../images/dang-tin-mua/upload-cloud.svg" class="avt_ic_ttin">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="huydon-footer">
                    <button type="button" class="modal-btn-xacnhan btn-orange" data="<?= $id_tin ?>" data1="<?= $_COOKIE['UID'] ?>">Hoàn tất</button>
                </div>
            </form>
        </div>
    </div>
    <?
    include '../modals/md_tb_yeuthich.php';
    include("../includes/inc_new/inc_footer.php"); ?>
    <script src="/js/style_new/app.js"></script>
</body>

</html>

<script type="text/javascript">
    $('#btn_join').click(function() {
        $('#modal-huydon').show();
    });

    // $(".share_ftc").click(function() {
    //     $(this).parents(".chia_se_ftc").find(".share_popup").toggle();
    // })

    $('.share_ftc').click(function() {
        $(this).parents(".chia_se_ftc").find(".share_popup").toggle('visibility');
    });

    function clk_hso_dthoai(id) {
        var us_id = $(id).attr("data");
        $.ajax({
            url: '/render/hienso_dthoai.php',
            type: 'POST',
            data: {
                us_id: us_id,
            },
            success: function(data) {
                $(id).parent().find(".hien_so").text(data);
            }
        })
    };

    $('.close').click(function() {
        $('#modal-huydon').hide();
    });

    function ImgUpload(el) {
        var file_data = $(el).prop('files')[0];
        var rong = '';
        var file_type = file_data.type;
        var size = file_data.size;
        var filename = file_data.name;
        var file_size = (size / (1024 * 1024)).toFixed(2);
        var bo_ddang = ['image/gif', 'video/mp4'];
        if ($.inArray(file_type, bo_ddang) != -1) {
            alert("Vui lòng chọn file có định đạng khác: GIF, MP4");
            $(el).val(rong);
            $(el).parents(".link-sp").find('label').removeClass("d_none");
            $(el).parents(".link-sp").find('.tep_tin').html('');
            $(el).parents(".link-sp").find('.tep_tin').addClass("d_none");
        } else {
            if (file_size <= 6) {
                var html = `<p class="ten_tepchon"><span class="xoa_botep" onclick="xoa_botep(this)"></span>` + filename + `</p>`;
                $(el).parents(".link-sp").find('.tep_tin').html(html);
                $(el).parents(".link-sp").find('.tep_tin').removeClass("d_none");
                $(el).parents(".link-sp").find('label').addClass("d_none");
            } else {
                alert("Dung lượng ảnh tối đa 6MB");
                $(el).val(rong);
                $(el).parents(".link-sp").find('label').removeClass("d_none");
                $(el).parents(".link-sp").find('.tep_tin').html('');
                $(el).parents(".link-sp").find('.tep_tin').addClass("d_none");
            }
        }
    }

    function xoa_botep(el) {
        $(el).parents(".link-sp").find('.up-link').val('');
        $(el).parents(".link-sp").find('label').removeClass("d_none");
        $(el).parents(".link-sp").find('.tep_tin').html('');
        $(el).parents(".link-sp").find('.tep_tin').addClass("d_none");
    };

    var tgian = $(".product_container").attr("data");
    $.ajax({
        url: '/render/thoi_gian_dt.php',
        type: 'POST',
        dataType: 'json',
        data: {
            tgian: tgian,
        },
        success: function(data) {
            $("#days").text(data.ngay);
            $("#hours").text(data.gio);
            $("#minutes").text(data.phut);
            $("#seconds").text(data.giay);
        }
    });

    $(".modal-btn-xacnhan").click(function() {
        var form_dthau = $(".thamgia_thau");
        form_dthau.validate({
            errorPlacement: function(error, element) {
                error.appendTo(element.parents(".notify_err"));
                error.wrap("<span class='error'>");
            },
            rules: {
                ten_dvithau: {
                    required: true,
                    minlength: 10,
                },
                ten_spham: {
                    required: true,
                    minlength: 10,
                },
                mota_spham: {
                    required: true,
                    minlength: 10,
                    maxlength: 1000,
                },
                phidu_thau: {
                    required: true,
                },
            },
            messages: {
                ten_dvithau: {
                    required: "Nhập tên đơn vị đấu thầu",
                    minlength: "Nhập ít nhất 10 ký tự",
                },
                ten_spham: {
                    required: "Nhập tên sản phẩm",
                    minlength: "Nhập ít nhất 10 ký tự",
                },
                mota_spham: {
                    required: 'Nhập mô tả sản phẩm',
                    minlength: "Nhập ít nhất 10 ký tự",
                    maxlength: "Nhập nhiều nhất 1000 ký tự",
                },
                phidu_thau: {
                    required: "Nhập phí dự thầu",
                },
            }
        });
        if (form_dthau.valid() === true) {
            var dvi_dthau = $("input[name='ten_dvithau']").val();
            var ten_spham = $("input[name='ten_spham']").val();
            var mota_spham = $("textarea[name='mota_spham']").val();
            var gioi_thieu = $("textarea[name='gioi_thieu']").val();
            var mota_nangluc = $("textarea[name='mota_nangluc']").val();
            var phidu_thau = $("input[name='phidu_thau']").val();
            var dvi_tien = $("select[name='dvi_tien']").val();
            var mota_khuyenmai = $("textarea[name='mota_khuyenmai']").val();
            var new_id = $(this).attr("data");
            var id_nduthau = $(this).attr("data1");
            var id_nmua = $(".thamgia_thau").attr("data");
            var link_spham = $("input[name='link_spham']").val();

            var file_nangluc = $("#uplink3").prop('files')[0];
            var file_gioithieu = $("#uplink2").prop('files')[0];
            var file_kmai = $("#uplink4").prop('files')[0];

            var fd = new FormData();
            fd.append('new_id', new_id);
            fd.append('id_nduthau', id_nduthau);
            fd.append('id_nmua', id_nmua);
            fd.append('dvi_dthau', dvi_dthau);
            fd.append('ten_spham', ten_spham);
            fd.append('mota_spham', mota_spham);
            fd.append('gioi_thieu', gioi_thieu);
            fd.append('mota_nangluc', mota_nangluc);
            fd.append('phidu_thau', phidu_thau);
            fd.append('dvi_tien', dvi_tien);
            fd.append('mota_khuyenmai', mota_khuyenmai);
            fd.append('file_nangluc', file_nangluc);
            fd.append('file_gioithieu', file_gioithieu);
            fd.append('file_kmai', file_kmai);
            fd.append('link_spham', link_spham);

            $.ajax({
                url: '/ajax/thamgia_dauthau.php',
                type: 'POST',
                data: fd,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data.result == true) {
                        alert("Bạn tham dự thầu thành công");
                        window.location.reload();
                    } else if (data.result == false) {
                        alert(data.msg);
                    }
                }
            })
        }
    });

    // đếm ngược giờ
    var countDownDate = new Date($(".product_container").attr("data")).getTime();
    // cập nhập thời gian sau mỗi 1 giây
    var x = setInterval(function() {
        // Lấy thời gian hiện tại
        var now = new Date().getTime();
        // Lấy số thời gian chênh lệch
        var distance = countDownDate - now;
        // Tính toán số ngày, giờ, phút, giây từ thời gian chênh lệch
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        // HIển thị chuỗi thời gian trong thẻ p
        $("#days").text(days);
        $("#hours").text(hours);
        $("#minutes").text(minutes);
        $("#seconds").text(seconds);
        // Nếu thời gian kết thúc, hiển thị chuỗi thông báo
        if (distance < 0) {
            clearInterval(x);
            $("#days").text(0);
            $("#hours").text(0);
            $("#minutes").text(0);
            $("#seconds").text(0);
        }
    }, 1000);

    $('[name=fb_share]').click(function() {
        var url = window.location.href;
        window.open('https://www.facebook.com/sharer/sharer.php?u=' + url,
            'facebook-share-dialog',
            'width=800,height=600'
        );
        return false;
    });
    $('[name=tw_share]').click(function() {
        var url = window.location.href;
        window.open('https://twitter.com/share?text=&url=' + url);
        return false;
    });


    document.getElementById("clickCopy").onclick = function() {
        var url = window.location.href;
        copyToClipboard(url);
        $(".sao_chep_đan").show();
        setTimeout(() => {
            $(".sao_chep_đan").hide();
        }, 1500);
    }

    function copyToClipboard(e) {
        var tempItem = document.createElement('input');
        tempItem.setAttribute('type', 'text');
        tempItem.setAttribute('display', 'none');
        let content = e;
        if (e instanceof HTMLElement) {
            content = e.innerHTML;
        }
        tempItem.setAttribute('value', content);
        document.body.appendChild(tempItem);
        tempItem.select();
        document.execCommand('Copy');
        tempItem.parentElement.removeChild(tempItem);
    };

    $('.slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        Accessibility: true,
        adaptiveHeight: false,
        nextArrow: '<div class="slide_control next_slide"><i class="ic-next"></i></div>',
        prevArrow: '<div class="slide_control prev_slide"><i class="ic-prev"></i></div>'
    });
</script>