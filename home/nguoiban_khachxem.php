<?php
include('../includes/inc_new/icon.php');
include 'config.php';

$id = getValue('id', 'int', 'GET', 0);


if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $us_id = $_COOKIE['UID'];
    $us_type = $_COOKIE['UT'];
}
if ($id != 0) {
    $user = new db_query("SELECT `usc_id`, `usc_name`, `usc_phone`, `usc_email`, `usc_logo`, `usc_type`, `usc_time`, `usc_category`, `usc_cate_id`,
                        `usc_address`, `chat365_id`, `email_ht` FROM `user` WHERE `usc_id` = $id AND `usc_type` = 1 ");
    $user_ok = mysql_fetch_assoc($user->result);
    $usc_name = $user_ok['usc_name'];
    $usc_phone = $user_ok['usc_phone'];
    $usc_email = $user_ok['usc_email'];
    $usc_logo = $user_ok['usc_logo'];
    $usc_type = $user_ok['usc_type'];
    $loai_tk = array(1 => 'Cá nhân', 3 => 'Doanh nghiệp');
    $usc_time = $user_ok['usc_time'];
    $usc_time = date('d-m-Y', $usc_time);
    $usc_address = $user_ok['usc_address'];

    $usc_category = $user_ok['usc_category'];
    $dem1 = explode(',', $usc_category);
    $dem_cha = count($dem1);

    $usc_cate_id = $user_ok['usc_cate_id'];
    $dem2 = explode(',', $usc_cate_id);
    $dem_con = count($dem2);

    $tongtin = new db_query("SELECT `new_id` FROM `new` WHERE `new_user_id` = $id AND `new_active` = 1 ");
    $result_tongtin = mysql_num_rows($tongtin->result);


    $tinthich = new db_query("SELECT `id` FROM `tin_yeu_thich` WHERE `user_id` = $id");
    $tinthich_ok = mysql_num_rows($tinthich->result);

    // tin bán
    $laytin = new db_query("SELECT `new_id`, `new_title`, `new_create_time`, `new_user_id`, `new_type`, `dia_chi`, `new_money`, `gia_kt`, `new_image`, `new_cate_id`,
                    `new_unit`, `chotang_mphi`, `link_title`, `da_ban` FROM `new` WHERE `new_user_id` = $id AND `new_buy_sell` = 2 ORDER BY new_id DESC ");
    // tin mua
    $tinmua = new db_query("SELECT `new_id`, `new_title`, `new_create_time`, `new_user_id`, `new_type`, `dia_chi`, `new_money`, `gia_kt`, `new_image`,
                    `new_unit`, `new_cate_id`, `link_title`, `da_ban` FROM `new` WHERE `new_user_id` = $id AND `new_buy_sell` = 1 ORDER BY new_id DESC ");

    $list_bl = new db_query("SELECT `eva_id`, `user_id`, `bl_user`, `eva_parent_id`, `eva_stars`, `eva_comment`, `eva_comment_time`, `eva_active`,
                        `da_csbl`, `tgian_hetcs`, `eva_csua_bl` FROM `evaluate` WHERE `bl_user` = $id AND `eva_active` = 1 ");
    // tổng số sao
    $list_bl = $list_bl->result_array();
    $sum_star = array_sum(array_column($list_bl, 'eva_stars'));
    $total_eva = count($list_bl);

    $hom_nay = strtotime('Y-m-d', time());
    $dayago = time() - 30 * 86400;
    // // tin trong 30 ngày
    $tinago = new db_query("SELECT `new_id` FROM `new` WHERE `new_user_id` = $id AND new_update_time >= $dayago AND `new_active` = 1 ");

    // DANH MỤC CHA


    $my_id = intval(@$_COOKIE['id_chat365']);
    if ($my_id > 0) {
        $qr_sc = new db_query("SELECT chat365_secret FROM user WHERE chat365_id = '$my_id'");
        $row_sc = mysql_fetch_assoc($qr_sc->result);
        $chat365_secret = $row_sc['chat365_secret'];
    } else {
        $chat365_secret = '';
    }
    $link_chat = get_link_chat365($my_id, $user_ok['chat365_id'], $user_ok['usc_id'], $user_ok['usc_name'], $user_ok['usc_email'], '', $chat365_secret);

    $urlcat = "http://dev5.tinnhanh365.vn/ca-nhan/" . $user_ok['usc_id'] . "/" . replaceTitle($user_ok['usc_name']) . ".html";
    $title = $user_ok['usc_name'] . " Shop: Rao vặt miễn phí Shop " . $user_ok['usc_name'];
    $desc = "Rao vặt miễn phí cung Shop " . $user_ok['usc_name'] . " trên hệ thống mua bán của Raonhanh365, Cùng " . $user_ok['usc_name'] . " đăng tin rao vặt các mặt hàng của bạn mọi lúc mọi nơi và đặc biệt là miễn phí. " . $user_ok['usc_name'] . " Shop";
    $key = "rao vặt " . $user_ok['usc_name'] . ", rao vặt, Shop " . $user_ok['usc_name'] . ", mua bán " . $user_ok['usc_name'] . ", mua ban";

    $urluri = "http://dev5.tinnhanh365.vn" . $_SERVER['REQUEST_URI'];

    if ($urlcat != $urluri) {
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: $urlcat");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<!--link meta seo-->

<head>
    <title><?= $title ?></title>
    <meta name="keywords" content="<?= $key ?>" />
    <meta name="description" content="<?= $desc ?>" />
    <meta property="og:title" content="<?= $title ?>" />
    <meta property="og:description" content="<?= $desc ?>" />
    <meta property="og:url" content="<?= $urlcat ?>" />
    <meta name="language" content="vietnamese" />
    <meta name="copyright" content="Copyright © 2017 by raonhanh365.vn" />
    <meta name="abstract" content="<?= $title ?>" />
    <meta name="author" itemprop="author" content="raonhanh365.vn" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="content-language" itemprop="inLanguage" content="vi" />
    <!-- <meta name="robots" content="index, follow" /> -->
    <meta name="robots" content="noindex,nofollow">
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui" />
    <meta property="og:image:url" content="/" />
    <meta property="og:image:width" content="476" />
    <meta property="og:image:height" content="249" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="vi_VN" />
    <meta name="revisit-after" content="1 days" />
    <meta name="page-topic" content="Mua bán rao vặt" />
    <meta name="resource-type" content="Document" />
    <meta name="distribution" content="Global" />
    <link rel="canonical" href="<?= $urlcat ?>" />

    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>

    <link rel="preload" href="/css/select2.min.css" as="style">
    <link href="/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_d.css?ver=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?ver=<?= $version ?>">
    <link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>
</head>

<body>
    <?php include "../includes/common/inc_header.php"; ?>
    <section>
        <div class="khachxemhs-container people_buy_support" data="<?= $user_ok['usc_id'] ?>">
            <div class="top_khachxemhs" data="<?= $us_id ?>" data1="<?= $us_type ?>">
                <div class="hoso_khachxem">
                    <div class="hoso_khachxem-header hd-disflex hd-align-center">
                        <div class="box-hoso_khachxem hd-disflex">
                            <div class="icf-box-cs">
                                <img src="/images/icon/avt_edit.svg" alt="">
                            </div>
                            <h1 class="font-24-2813 font-dam">Thông tin tài khoản rao vặt của <?= $usc_name ?></h1>
                        </div>
                    </div>
                    <div class="hoso_khachxem-content hd-disflex">
                        <div class="img-hoso-khachxem hd_cspointer">
                            <div class="avatar-img-khachxem">
                                <img onerror="this.onerror=null; this.src='/images/anh_moi/avatar.png';" src="<?= str_replace('../', '/', $usc_logo)  ?>" class="avatar-img-hskx" alt="<?= $usc_name ?>">
                            </div>
                            <? if (isset($_COOKIE['id_chat365'])) { ?>
                                <a class="chat_ngay" rel="nofollow" href="<?= $link_chat; ?>" target="_blank">
                                    <p>Chat ngay</p>
                                </a>
                            <? } else { ?>
                                <div class="chat_ngay item_chat op_ovl_dn" id-chat='<?= $user_ok['chat365_id'] ?>'>
                                    <img src="/images/anh_moi/chat_ngayl.png" class="chatngay">
                                    <p>Chat ngay</p>
                                </div>
                            <? } ?>
                        </div>
                        <div class="thong-tin-hskx">
                            <div class="thong-tin-hskx1 hd-disflex">
                                <p class="ten-hskx color-blk"><?= $usc_name ?></p>
                            </div>
                            <div class="thong-tin-hskx2">
                                <div class="hd-disflex df_new1">
                                    <p class="loaitk-hscn mb20 color_xam font-16-19 df_new2">Loại tài khoản: <?= $loai_tk[$usc_type] ?></p>
                                    <p class="ntg-hscn mb20 color_xam font-16-19 df_new2">Ngày tham gia: <?= $usc_time ?></p>
                                </div>
                                <div class="hd-disflex df_new1">
                                    <p class="sdt-hscn mb20 color_xam font-16-19 df_new2 <?= (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) ? "" : "sh_cursor op_ovl_dn" ?>">Số điện thoại: <?= (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) ? $usc_phone : substr_replace($usc_phone, '*******', -7) ?></p>
                                    <p class="email-hscn mb20 color_xam font-16-19 df_new2">Email:
                                        <? if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) { ?>
                                            <? if ($user_ok['email_ht'] != "") { ?>
                                                <span><?= $user_ok['email_ht'] ?></span>
                                            <? } else { ?>
                                                <span><?= $usc_email ?></span>
                                            <? } ?>
                                        <? } ?>
                                    </p>
                                </div>
                                <div class="hd-disflex df_new1">
                                    <p class="diachi-hscn mb20 color_xam font-16-19 df_new2">Địa chỉ: <?= $usc_address ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box_hskx_cha d_flex j_between">
                    <div class="box_hskx_con">
                        <div class="d_flex hd-align-center">
                            <div class="k_anh_chung">
                                <img src="/images/anh_moi/tindadang.svg" alt="Tin đã đăng">
                            </div>
                            <div class="color_cam ghichu">Tin đã đăng</div>
                        </div>
                        <p class="soluong_tt color_cam"><?= $result_tongtin ?></p>
                        <p class="tin_ghi_chu">+<?= mysql_num_rows($tinago->result) ?> tin mới trong 30 ngày qua</p>
                    </div>
                    <div class="box_hskx_con">
                        <div class="d_flex hd-align-center">
                            <div class="k_anh_chung">
                                <img src="/images/anh_moi/danhgia.svg" alt="Đánh giá trung bình">
                            </div>
                            <div class="color_vang ghichu">Đánh giá trung bình</div>
                        </div>
                        <p class="soluong_tt color_vang"><?= ($total_eva != 0) ? round($sum_star / $total_eva, 1) : 0 ?></p>
                        <p class="tin_ghi_chu">Trên <?= $total_eva ?> lượt đánh giá</p>
                    </div>
                    <div class="box_hskx_con">
                        <div class="d_flex hd-align-center">
                            <div class="k_anh_chung">
                                <img src="/images/anh_moi/percent_reply.svg" alt="Tỉ lệ phản hồi chat">
                            </div>
                            <div class="color_BE2EDD ghichu">Tỉ lệ phản hồi chat</div>
                        </div>
                        <p class="soluong_tt color_BE2EDD">0%</p>
                        <p class="tin_ghi_chu">Thường trả lời trong vòng 2 giờ</p>
                    </div>
                </div>
                <div class="tinmuadd_hskx">
                    <div class="d_flex hd-align-center header_tinmuadd">
                        <div class="k_anh_chung">
                            <img src="/images/anh_moi/tinmua.svg" alt="Tin đăng bán">
                        </div>
                        <h2 class="color_xanhluc ghichu">Tin đăng bán</h2>
                    </div>
                    <div class="cha_khoi_dangtin_kx d_flex">
                        <? if (mysql_num_rows($laytin->result) > 0) {
                            while ($laytin_ok = mysql_fetch_assoc($laytin->result)) {
                                $id_tin = $laytin_ok['new_id'];
                                $anhtin = $laytin_ok['new_image'];
                                $anhtin_ok = explode(';', $anhtin);
                                $demanh = count($anhtin_ok);

                                $id_tin = $laytin_ok['new_id']; ?>
                                <div class="khoi_dangtinkx d_flex">
                                    <div class="khoi_anhdangtinkx hd_cspointer">
                                        <a href="/<?= replaceTitle($laytin_ok['link_title']) ?>-c<?= $laytin_ok['new_id'] ?>.html">
                                            <img onerror="this.onerror=null; this.src='/images/anh_moi/avatar.png';" src="<?= str_replace('../', '/', $anhtin_ok[0]) ?>" alt="<?= $laytin_ok['new_title'] ?>" class="img_dangtinkx">
                                            <? if ($demanh > 1) { ?>
                                                <div class="khoi_sl_mayanh">
                                                    <img src="/images/anh_moi/may_anh.png" alt="ảnh sản phẩm">
                                                    <p class="font-12 soluong_anh"><?= $demanh ?></p>
                                                </div>
                                            <? } ?>
                                            <? if ($laytin_ok['da_ban'] == 1) { ?>
                                                <? if ($laytin_ok['new_cate_id'] != 120) { ?>
                                                    <span class="tbao_daban_tx po_ab">Đã bán</span>
                                                <? } else { ?>
                                                    <span class="tbao_daban_tx tdc_uvien po_ab">Đã tìm được ứng viên</span>
                                                <? } ?>
                                            <? } ?>
                                        </a>
                                        <div class="yeuthich_tinl">
                                            <? if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
                                                $check = new db_query("SELECT `id` FROM `tin_yeu_thich` WHERE `new_id` = '$id_tin' AND `user_id` = '$us_id'
                                                                            AND `usc_type` = '$us_type'"); ?>
                                                <? if (mysql_num_rows($check->result) > 0) { ?>
                                                    <img src="/images/anh_moi/anh014.png" data="<?= $id_tin ?>" alt="yêu thích" class="yeuthich hd_cspointer" onclick="yeu_thich(this)">
                                                <? } else { ?>
                                                    <img src="/images/anh_moi/yeuthich_moi.png" data="<?= $id_tin ?>" alt="yêu thích" class="ko_yeuthich hd_cspointer" onclick="yeu_thich(this)">
                                                <? } ?>
                                            <? } else { ?>
                                                <a href="/dang-nhap.html">
                                                    <img src="/images/anh_moi/yeuthich_moi.png" alt="yêu thích" class="ko_yeuthich hd_cspointer">
                                                </a>
                                            <? } ?>
                                        </div>
                                    </div>

                                    <div class="khoi_text_kx">
                                        <a href="/<?= replaceTitle($laytin_ok['link_title']) ?>-c<?= $laytin_ok['new_id'] ?>.html">
                                            <h3 class="title_kx font-16 color-blk font-bold"><?= $laytin_ok['new_title'] ?></h3>
                                        </a>
                                        <p class="font-14 color_a font-bold time_kx"><?= lay_tgian($laytin_ok['new_create_time']) ?></p>
                                        <p class="font-14 color_a address_kx"><?= ltrim($laytin_ok['dia_chi'], ', ') ?></p>
                                        <div class="d_flex j_between hd-align-center people_buy_support_like-img d_flex space_b">
                                            <p class="color_cam tien_kx">
                                                <? if ($laytin_ok['new_cate_id'] != 120) { ?>
                                                    <? if ($laytin_ok['chotang_mphi'] == 1) { ?>
                                                        Cho Tặng Miễn Phí
                                                    <? } else if ($laytin_ok['new_money'] > 0) { ?>
                                                        <?= number_format($laytin_ok['new_money']) ?> <?= $arr_dvtien[$laytin_ok['new_unit']] ?>
                                                    <? } else if ($laytin_ok['new_money'] == '' || $laytin_ok['new_money'] == 0) { ?>
                                                        Liên hệ người bán
                                                    <? } ?>
                                                <? } else { ?>
                                                    <? if ($laytin_ok['new_money'] != 0 && $laytin_ok['gia_kt'] != 0) { ?>
                                                        <?= number_format($laytin_ok['new_money']) ?> - <?= number_format($laytin_ok['gia_kt']) ?> <?= $arr_dvtien[$laytin_ok['new_unit']] ?>
                                                    <? } else if ($laytin_ok['new_money'] != 0 && $laytin_ok['gia_kt'] == 0) { ?>
                                                        Từ <?= number_format($laytin_ok['new_money']) ?> <?= $arr_dvtien[$laytin_ok['new_unit']] ?>
                                                    <? } else if ($laytin_ok['new_money'] == 0 && $laytin_ok['gia_kt'] != 0) { ?>
                                                        Đến <?= number_format($laytin_ok['gia_kt']) ?> <?= $arr_dvtien[$tin_ok['new_unit']] ?>
                                                    <? } else { ?>
                                                        Thỏa thuận
                                                    <? } ?>
                                                <? } ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <? }
                        } else { ?>
                            <p class="chua_codgia">Tài khoản này chưa đăng tin nào</p>
                        <? } ?>
                    </div>
                </div>
                <div class="tinmuadd_hskx">
                    <div class="d_flex hd-align-center header_tinmuadd">
                        <div class="k_anh_chung">
                            <img src="/images/anh_moi/tindangmua.svg" alt="Tin đăng mua">
                        </div>
                        <h2 class="color_F26222 ghichu">Tin đăng mua</h2>
                    </div>
                    <div class="cha_khoi_dangtin_kx d_flex">
                        <? if (mysql_num_rows($tinmua->result) > 0) {
                            while ($laytin_ok = mysql_fetch_assoc($tinmua->result)) {
                                $id_tin = $laytin_ok['new_id'];
                                $anhtin = $laytin_ok['new_image'];
                                $anhtin_ok = explode(';', $anhtin);
                                $demanh = count($anhtin_ok);
                                $id_tin = $laytin_ok['new_id']; ?>
                                <div class="khoi_dangtinkx d_flex">
                                    <div class="khoi_anhdangtinkx hd_cspointer">
                                        <a href="/<?= replaceTitle($laytin_ok['link_title']) ?>-<?= ($laytin_ok['new_cate_id'] != 121) ? "ct" : "c" ?><?= $laytin_ok['new_id'] ?>.html">
                                            <img onerror="this.onerror=null; this.src='/images/anh_moi/avatar.png';" src="<?= str_replace('../', '/', $anhtin_ok[0]) ?>" alt="<?= $laytin_ok['new_title'] ?>" class="img_dangtinkx">
                                            <? if ($demanh > 1) { ?>
                                                <div class="khoi_sl_mayanh">
                                                    <img src="/images/anh_moi/may_anh.png" alt="ảnh sản phẩm">
                                                    <p class="font-12 soluong_anh"><?= $demanh ?></p>
                                                </div>
                                            <? } ?>
                                            <? if ($laytin_ok['da_ban'] == 1) { ?>
                                                <? if ($laytin_ok['new_cate_id'] == 121) { ?>
                                                    <span class="tbao_daban_tx tdc_uvien po_ab">Đã tìm được việc làm</span>
                                                <? } ?>
                                            <? } ?>
                                        </a>
                                        <div class="yeuthich_tinl">
                                            <? if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
                                                $check = new db_query("SELECT `id` FROM `tin_yeu_thich` WHERE `new_id` = '$id_tin' AND `user_id` = '$us_id'
                                                                            AND `usc_type` = '$us_type'"); ?>
                                                <? if (mysql_num_rows($check->result) > 0) { ?>
                                                    <img src="/images/anh_moi/anh014.png" data="<?= $id_tin ?>" alt="yêu thích" class="yeuthich hd_cspointer" onclick="yeu_thich(this)">
                                                <? } else { ?>
                                                    <img src="/images/anh_moi/yeuthich_moi.png" data="<?= $id_tin ?>" alt="yêu thích" class="ko_yeuthich hd_cspointer" onclick="yeu_thich(this)">
                                                <? } ?>
                                            <? } else { ?>
                                                <a href="/dang-nhap.html">
                                                    <img src="/images/anh_moi/yeuthich_moi.png" alt="yêu thích" class="ko_yeuthich hd_cspointer">
                                                </a>
                                            <? } ?>
                                        </div>
                                    </div>
                                    <div class="khoi_text_kx">
                                        <a href="/<?= replaceTitle($laytin_ok['link_title']) ?>-<?= ($laytin_ok['new_cate_id'] != 121) ? "ct" : "c" ?><?= $laytin_ok['new_id'] ?>.html">
                                            <h3 class="title_kx font-16 color-blk font-bold"><?= $laytin_ok['new_title'] ?></h3>
                                        </a>
                                        <p class="font-14 color_a font-bold time_kx"><?= lay_tgian($laytin_ok['new_create_time']) ?></p>
                                        <p class="font-14 color_a address_kx"><?= ltrim($laytin_ok['dia_chi'], ', ') ?></p>
                                        <div class="d_flex j_between hd-align-center people_buy_support_like-img d_flex space_b">
                                            <? if ($laytin_ok['new_money'] != 0 && $laytin_ok['gia_kt'] == 0) { ?>
                                                <p class="color_cam tien_kx">Từ <?= number_format($laytin_ok['new_money']) ?> <?= $arr_dvtien[$laytin_ok['new_unit']] ?></p>
                                            <? } else if ($laytin_ok['new_money'] == 0 && $laytin_ok['gia_kt'] != 0) { ?>
                                                <p class="color_cam tien_kx">Đến <?= number_format($laytin_ok['gia_kt']) ?> <?= $arr_dvtien[$laytin_ok['new_unit']] ?></p>
                                            <? } else if ($laytin_ok['new_money'] != 0 && $laytin_ok['gia_kt'] != 0) { ?>
                                                <p class="color_cam tien_kx"><?= number_format($laytin_ok['new_money']) ?> - <?= number_format($laytin_ok['gia_kt']) ?> <?= $arr_dvtien[$laytin_ok['new_unit']] ?></p>
                                            <? } ?>
                                            <? if ($laytin_ok['new_cate_id'] == 121) { ?>
                                                <? if ($laytin_ok['new_money'] == 0 && $laytin_ok['gia_kt'] == 0) { ?>
                                                    <p class="color_cam tien_kx">Thỏa thuận</p>
                                                <? } ?>
                                            <? } ?>
                                        </div>
                                    </div>
                                </div>
                            <? }
                        } else { ?>
                            <p class="chua_codgia">Tài khoản này chưa đăng tin nào</p>
                        <? } ?>
                    </div>
                </div>
            </div>

            <div class="danhgia_hskx">
                <div class="d_flex hd-align-center danhgiataikhoankx">
                    <div class="k_anh_chung">
                        <img src="/images/anh_moi/danhgia.svg" alt="Đánh giá tài khoản">
                    </div>
                    <h2 class="color_vang ghichu">Đánh giá tài khoản</h2>
                </div>
                <div class="cha_danhgiataikhoankx">
                    <? if ($total_eva > 0) {
                        foreach ($list_bl as $row_bl) {
                            $bl_id = $row_bl['eva_id'];
                            $bl_usc = $row_bl['user_id'];
                            // lấy thông tin người binh luận
                            $nguoi_bl = new db_query("SELECT `usc_id`, `usc_name`, `usc_logo` FROM `user` WHERE `usc_id` = $bl_usc ");
                            $row_nbl = mysql_fetch_assoc($nguoi_bl->result);
                            $bl_logo = $row_nbl['usc_logo'];

                            // tra loi binh luan
                            $check_dcbl = new db_query("SELECT `bl_user`, `eva_comment`, `eva_comment_time` FROM `evaluate`
                                                        WHERE `user_id` = $id AND `eva_active` = 1 AND `eva_parent_id` = $bl_id "); ?>

                            <div class="con_danhgiataikhoankx">
                                <div class="d_flex align_c mb_10">
                                    <div class="con_danhgiataikhoankx-img">
                                        <img onerror="this.onerror=null; this.src='/images/anh_moi/avatar.png';" src="<?= str_replace('../', '/', $bl_logo) ?>" alt="<?= $row_nbl['usc_name'] ?>" class="avt_ndanhgia_bl">
                                    </div>
                                    <p class="name_tkdanhgiakx"><?= $row_nbl['usc_name'] ?>
                                        <? if ($bl_usc == $_COOKIE['UID']) {
                                            if ($row_bl['da_csbl'] != 1) { ?>
                                                <span class="chinh_sua" data="<?= $bl_id ?>" data1="<?= $usc_type ?>">Chỉnh sửa</span>
                                        <? }
                                        } ?>
                                        <span class="time_tkdanhgiakx"><?= ($row_bl['eva_csua_bl'] != "" && $row_bl['eva_csua_bl'] != 0) ? lay_tgian($row_bl['eva_csua_bl']) : lay_tgian($row_bl['eva_comment_time']) ?></span>
                                    </p>
                                </div>
                                <div class="d_flex hd-align-center star_taikhoandanhgia">
                                    <? for ($i = 0; $i < $row_bl['eva_stars']; $i++) { ?>
                                        <img src="/images/icon/star.svg" class="số sao">
                                    <? }
                                    for ($j = 0; $j < (5 - $row_bl['eva_stars']); $j++) { ?>
                                        <img src="/images/newImages/sao-rong.png" class="số sao">
                                    <? } ?>
                                </div>
                                <div class="d_flex hd-align-center tl_taikhoandanhgiakx">
                                    <p class="texttl_tkdanhgiakx"><?= $row_bl['eva_comment'] ?></p>
                                </div>
                                <div class="csdanh_gia">

                                </div>
                                <? if (mysql_num_rows($check_dcbl->result) > 0) {
                                    $row_tl = mysql_fetch_assoc($check_dcbl->result); ?>
                                    <div class="a_chinhsua_tkdanhgiakx d_flex">
                                        <div class="b_chinhsua_tkdanhgiakx"></div>
                                        <div class="c_chinhsua_tkdanhgiakx">
                                            <div class="d_flex align_c mb_10">
                                                <div class="con_danhgiataikhoankx-img">
                                                    <img onerror="this.onerror=null; this.src='/images/anh_moi/avatar.png';" src="<?= str_replace('../', '/', $usc_logo) ?>" class="anh_daidien_bl" alt="<?= $usc_name ?>">
                                                </div>
                                                <p class="name_tkdanhgiakx"><?= $usc_name ?>
                                                    <span class="time_tkdanhgiakx"><?= lay_tgian($row_tl['eva_comment_time']) ?></span>
                                                </p>
                                            </div>
                                            <p class="texttl_tkdanhgia1kx"><?= $row_tl['eva_comment'] ?></p>
                                        </div>
                                    </div>
                                <? } ?>
                            </div>
                        <? }
                    } else { ?>
                        <p class="chua_codgia">Tài khoản này chưa có đánh giá nào </p>
                    <? } ?>
                </div>
            </div>
            <? if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) { ?>
                <div class="danhgia_hskx2">
                    <div class="d_flex hd-align-center danhgia_kh">
                        <div class="k_anh_chung">
                            <img src="/images/anh_moi/vietdanhgia.svg" alt="đánh giá">
                        </div>
                        <div class="color_vang ghichu">Viết đánh giá</div>
                    </div>
                    <form class="o-danhgia_kh1">
                        <p class="font-dam hd_font15-17">Nội dung đánh giá<span class="color_red p5">*</span></p>
                        <div class="div-text-danh-gia-kx d_flex danhgia_kcs">
                            <div class="form_gr">
                                <textarea class="text-danh-gia-kx form-control" placeholder="Nhập nội dung đánh giá" name="noidung_danhgia1"></textarea>
                            </div>
                            <div class="row-hskx div-ma-xac-nhan">
                                <div class="stars">
                                    <input class="star star-5" id="star-5" type="radio" name="star" value="5" checked />
                                    <label class="star star-5" for="star-5"></label>

                                    <input class="star star-4" id="star-4" type="radio" name="star" value="4" />
                                    <label class="star star-4" for="star-4"></label>

                                    <input class="star star-3" id="star-3" type="radio" name="star" value="3" />
                                    <label class="star star-3" for="star-3"></label>

                                    <input class="star star-2" id="star-2" type="radio" name="star" value="2" />
                                    <label class="star star-2" for="star-2"></label>

                                    <input class="star star-1" id="star-1" type="radio" name="star" value="1" />
                                    <label class="star star-1" for="star-1"></label>
                                </div>
                                <p class="title_row_rtbm font-dam hd_font15-17">Mã xác nhận <span class="color_red">*</span></p>
                                <div class="d_flex gap_20 ">
                                    <div class="form_gr">
                                        <input type="text" name="td_ma_nx" class="ma-xac-nhan form-control">
                                    </div>
                                    <div class="ma-captcha-cont">
                                        <span class="avt_icon_lh_cp">
                                            <img src="/images/hd-refresh-captcha.svg" alt="tải lại mã captch" class="hd_cspointer xoay360" style="transform: rotate(2880deg); transition: all 0.2s ease 0s;">
                                        </span>
                                        <p class="ma_dcap ma_dcap_2 sh_clr_five sh_size_five b_radius_5 background-none">442644</p>
                                        <input type="hidden" value="442644" id="macap_cha_moi" class="ma_cpch">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="btn-danh-gia-kx d_flex">
                            <button type="button" class="btn-gui-dg hd_cspointer" onclick="gui_bluan()">Gửi đánh giá</button>
                        </div>
                    </form>
                </div>
            <? } ?>
        </div>
        <? include '../modals/tbao_tcong.php' ?>
        <? include '../modals/md_tb_yeuthich.php' ?>
    </section>
    <? include '../includes/inc_new/inc_footer.php'; ?>
    <script type="text/javascript" src="/js/style_new/style.js"></script>
</body>

</html>
<script type="text/javascript">
    $(".chinh_sua").click(function() {
        var bl_id = $(this).attr("data");
        var type = $(this).attr("data1");
        var _this = $(this);
        var target = $(this).parents(".con_danhgiataikhoankx");
        var target1 = $(this).parents(".con_danhgiataikhoankx").find(".csdanh_gia");
        $.ajax({
            url: '/render/chinh_sua_bl.php',
            type: 'POST',
            data: {
                bl_id: bl_id,
                type: type,
            },
            success: function(data) {
                _this.parents(".con_danhgiataikhoankx").find(".csdanh_gia").html(data);
                var elem = target1;
                $(elem).get(0).scrollIntoView({
                    behavior: 'smooth'
                });
            }
        })
    });

    function dong_csbluan(el) {
        $(el).parents(".csdanh_gia").html('');
    }

    function an_err(el) {
        $(el).parents(".csua_bluan_nban").find(".error_cap").text('');
    }

    function csua_bluan(id) {
        var form_csdgia = $(".o-danhgia_kh");
        form_csdgia.validate({
            errorPlacement: function(error, element) {
                error.appendTo(element.parents(".form_gr"));
                error.wrap("<span class='error'>");
            },
            rules: {
                noidung_danhgia: {
                    required: true,
                },
                td_ma_xn: {
                    required: true,
                }
            },
            messages: {
                noidung_danhgia1: {
                    required: "Nhập đánh giá của bạn",
                },
                td_ma_xn: {
                    required: "Nhập mã otp",
                }
            },
        });
        if (form_csdgia.valid() === true) {
            var bl_id = $(id).attr("data");
            var noi_dung = $(id).parents(".csua_bluan_nban").find(".text-danh-gia-kx").val();
            var so_sao = $("input[name='star_nb']:checked").val();
            var ma_cap = $(id).parents(".csua_bluan_nban").find(".ma_cpch").val();
            var macap_nhap = $(id).parents(".csua_bluan_nban").find(".ma-xac-nhan").val();
            if (ma_cap != macap_nhap) {
                $(id).parents(".csua_bluan_nban").find(".error_cap").text("Mã xác thực không đúng");
            } else {
                $.ajax({
                    url: '/ajax/csua_bluan.php',
                    type: 'POST',
                    data: {
                        bl_id: bl_id,
                        noi_dung: noi_dung,
                        so_sao: so_sao,
                    },
                    success: function(data) {
                        if (data == "") {
                            alert("Chỉnh sửa đánh giá thành công");
                            window.location.reload();
                        } else {
                            alert(data);
                        }
                    }
                })
            }
        }
    }

    $('.btn-danh-gia-kx').click(function() {
        $('.tbao_tcong').fadeIn(500);
    });

    $('.luu_chung').click(function() {
        $('.tbao_tcong').fadeOut(500);
    });

    function gui_bluan() {
        var form_dgia = $(".o-danhgia_kh1");
        form_dgia.validate({
            errorPlacement: function(error, element) {
                error.appendTo(element.parents(".form_gr"));
                error.wrap("<span class='error'>");
            },
            rules: {
                noidung_danhgia1: {
                    required: true,
                },
                td_ma_nx: {
                    required: true,
                    equalTo: "#macap_cha_moi",
                }
            },
            messages: {
                noidung_danhgia1: {
                    required: "Nhập đánh giá của bạn",
                },
                td_ma_nx: {
                    required: "Nhập mã otp",
                    equalTo: "Mã xác thực không đúng",
                }
            },
        });
        if (form_dgia.valid() === true) {
            var noi_dung_dgia = $(".danhgia_kcs").find("textarea[name='noidung_danhgia1']").val();
            var so_sao = $(".danhgia_kcs").find("input[name='star']:checked").val();
            var us_bl = $(".khachxemhs-container").attr("data");
            var us_nbl = $(".top_khachxemhs").attr("data");
            $.ajax({
                url: '/ajax/binh_luan.php',
                type: 'POST',
                data: {
                    noi_dung_dgia: noi_dung_dgia,
                    so_sao: so_sao,
                    us_bl: us_bl,
                    us_nbl: us_nbl,
                },
                success: function(data) {
                    if (data == "") {
                        alert("Gửi đánh giá thành công");
                        window.location.reload();
                    } else {
                        alert(data);
                    }
                }
            })
        }
    }
</script>