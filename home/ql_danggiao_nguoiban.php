<?
include("config.php");
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $id_user = $_COOKIE['UID'];
    $type_user = $_COOKIE['UT'];

    $list_dh = new db_query("SELECT `dh_id`,`id_nguoi_dh`, `id_nguoi_ban`, `id_spham`, `ghi_chu`, `loai_ttoan`, `tien_ttoan`, `dia_chi_nhanhang`, `trang_thai`,
                            `usc_name`, `usc_logo`, `usc_type`,`chat365_id`,`usc_id`,`usc_phone`, `new_title`, `new_money`, `new_unit`, `new_user_id`,
                            `new_type`, `new_image` FROM `dat_hang`
                            INNER JOIN `new` ON `new`.`new_id` = `dat_hang`.`id_spham`
                            INNER JOIN `user` ON `user`.`usc_id` = `dat_hang`.`id_nguoi_dh`
                            WHERE `trang_thai` = 2 AND `id_nguoi_ban` = $id_user ");

    $my_id = intval(@$_COOKIE['id_chat365']);
    if ($my_id > 0) {
        $qr_sc = new db_query("SELECT chat365_secret FROM user WHERE chat365_id = '$my_id'");
        $row_sc = mysql_fetch_assoc($qr_sc->result);
        $chat365_secret = $row_sc['chat365_secret'];
    } else {
        $chat365_secret = '';
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
    <meta name="robots" content="noindex, nofollow" />
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

    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/box-left_pers_seller_prof.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_b.css?v=<?= $css_vs ?>" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_dien.css?v=<?= $version ?>" />

</head>

<body>
    <? include("../includes/common/inc_header.php"); ?>
    <section class="edit_infor tca_tdang_cnhan">
        <? if ($type_user == 1) { ?>
            <?php include "../includes/person_sell/inc_sidebar_left.php" ?>
        <? }
        if ($type_user == 5) { ?>
            <?php include "../includes/common/inc_container_box_left_dn_new.php" ?>
        <? } ?>
        <div class="ben_phai">
            <div class="ql_donhang">
                <a href="/quan-ly-don-hang-ban.html" class="qly_dhang_dc cr_weight">Quản lý đơn hàng </a>
            </div>
            <div class="box-right edit_pers">
                <? include("../includes/inc_new/ttoan_dbao_td.php"); ?>
                <div class="custom-scrollbar">
                    <div class="box-right-content">
                        <? if (mysql_num_rows($list_dh->result) > 0) {
                            while ($row_tin = mysql_fetch_assoc($list_dh->result)) {
                                $new_iamge = $row_tin['new_image'];
                                $anh_tin = explode(';', $new_iamge);
                                $link_chat = get_link_chat365($my_id, $row_tin['chat365_id'], $row_tin['usc_id'], $row_tin['usc_name'], $row_tin['usc_phone'], '', $chat365_secret); ?>
                                <div class="content-item-1">
                                    <div class="box-right-content-top">
                                        <div class="content-top-left">
                                            <div class="content-top-item-1">
                                                <div class="item-1-img anh_nguoidang">
                                                    <? if ($row_tin['usc_logo'] != "") { ?>
                                                        <img src="<?= $row_tin['usc_logo'] ?>" alt="" onerror="this.src=`/images/anh_moi/dai_dien_avt.png`">
                                                    <? } else { ?>
                                                        <img src="/images/bo-sung-raonhanh/ava.png" alt="">
                                                    <? } ?>
                                                </div>
                                                <div class="item-1-title">
                                                    <p class="text_name"><?= $row_tin['usc_name'] ?></p>
                                                </div>
                                            </div>
                                            <div class="content-top-item-2-group">
                                                <div class="content-top-item-2">
                                                    <? if ($row_tin['usc_type'] == 1) { ?>
                                                        <a href="/ca-nhan/<?= $row_tin['id_nguoi_dh'] ?>/<?= replaceTitle($row_tin['usc_name']) ?>.html" class="xem-kh">Xem Khách Hàng</a>
                                                    <? } else { ?>
                                                        <a href="/gian-hang/<?= $row_tin['id_nguoi_dh'] ?>/<?= replaceTitle($row_tin['usc_name']) ?>.html" class="xem-kh">Xem Khách Hàng</a>
                                                    <? } ?>
                                                </div>
                                                <a class="content-top-item-3-ql" href="<?= $link_chat ?>">
                                                    <div class="item-3-img">
                                                        <img src="/images/bo-sung-raonhanh/chat-text.svg" alt="">
                                                    </div>
                                                    <div class="item-3-title">
                                                        <p class="text_chat color_orange">Chat ngay</p>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="content-top-right">
                                            <div class="top-right-text">
                                                <p class="color_orange text_status">ĐANG GIAO</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-right-content-rec"></div>
                                    <div class="box-right-content-bot">
                                        <a href="/chi-tiet-don-hang-dang-giao-nguoi-ban-<?= $row_tin['dh_id'] ?>.html">
                                            <div class="bot-l">
                                                <div class="content-bot-l anhdaid_tin">
                                                    <img src="<?= $anh_tin[0] ?>" alt="" onerror="this.src=`/images/anh_moi/dai_dien_avt.png`">
                                                </div>
                                                <div class="content-bot-c">
                                                    <p class="ten_sp color_orange">
                                                        <?= $row_tin['new_title'] ?>
                                                    <p>
                                                    <p class="text_sp">Mã đơn hàng: <?= $row_tin['id_spham'] ?></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="content-bot-r">
                                        <p class="text_sp">Tổng đơn hàng: <span class="color_orange num_price"><?= number_format($row_tin['new_money']) ?> <?= $arr_dvtien[$row_tin['new_unit']] ?></span></p>
                                    </div>
                                    <div class="box-right-content-rec"></div>
                                    <div class="main-btn-danggiao-ql">
                                        <button class="xacnhan-3" data="<?= $row_tin['dh_id'] ?>">Giao hàng thành công</button>
                                        <div class="btn-480">
                                            <button type="button" class="huydon-3" id="huydon_3" data="<?= $row_tin['dh_id'] ?>">Hủy đơn</button>
                                            <button class="giao_thatbai" data="<?= $row_tin['dh_id'] ?>">Giao hàng thất bại</button>
                                        </div>
                                    </div>
                                </div>
                        <? }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <? include('../modals/nban_huydh.php'); ?>

    <div id="modal_dathang" class="modal popup_dhang_tcong">
        <div class="modal-content">
            <!-- <span class="close">&times;</span> -->
            <div class="content-xacthuc-img">
                <img src="/images/bo-sung-raonhanh/xacthuc.svg" alt="">
            </div>
            <div class="content-xacthuc-title">
                <p>Hủy đơn hàng thành công !</p>
            </div>
            <div class="huydon-footer">
                <button type="button" class="modal-btn-dong" id="dong">Đóng</button>
            </div>

        </div>
    </div>

    <div id="modal-giaohang-thatbai" class="modal giao_hang_that_bai">
        <div class="modal-content-huydon">
            <div class="huydon-header">
                <p>Lý do giao thất bại</p>
                <span class="close">&times;</span>
            </div>
            <div class="huydon-content">
                <p>Lý do giao hàng thất bại <span class="color_red">*</span></p>
                <input class="input-lydo" type="text" placeholder="Nhập lý do...">
            </div>
            <div class="huydon-footer">
                <button type="button" class="modal-btn-huy huy_giaohang">Hủy bỏ</button>
                <button type="button" class="modal-btn-xacnhan tbai_xacnhan" data="">Xác nhận</button>
            </div>
        </div>

    </div>
    <? include("../includes/inc_new/inc_footer.php"); ?>
</body>

</html>
<script type="text/javascript" src="/js/personal_seller_profile.js"></script>
<script type="text/javascript">
    $("#huydon_3").click(function() {
        var id_dh = $(this).attr("data");
        $("#modal-huydon #xacnhan_huydon").attr("data", id_dh);
        $("#modal-huydon").show();
    });

    $(".close, .modal-btn-huy").click(function() {
        $("#modal-huydon").hide();
    });
    $("#xacnhan_huydon").click(function() {
        $("#modal_dathang").show();
        $("#modal-huydon").hide();
    });

    $("#dong").click(function() {
        $("#modal_dathang").hide();
        window.location.href = "/quan-ly-don-hang-da-huy.html";
    });
    $(".giao_thatbai").click(function() {
        var id_dh = $(this).attr("data");
        $(".giao_hang_that_bai").find(".modal-btn-xacnhan").attr("data", id_dh);
        $(".giao_hang_that_bai").show();
    });

    $(".close, .huy_giaohang").click(function() {
        $(".giao_hang_that_bai").hide();
    });

    $(".xacnhan-3").click(function() {
        var id_dh = $(this).attr("data");
        var tthai = 3;
        $.ajax({
            url: '/ajax/xac_nhan_bhang.php',
            type: 'POST',
            data: {
                id_dh: id_dh,
                tthai: tthai,
            },
            success: function(data) {
                if (data == "") {
                    window.location.href = '/quan-ly-don-hang-da-giao.html';
                } else {
                    alert(data);
                }
            }
        })
    });

    $(".tbai_xacnhan").click(function() {
        var id_dh = $(this).attr("data");
        var lydo = $(this).parents(".giao_hang_that_bai").find(".input-lydo").val();
        $.ajax({
            url: '/ajax/giaohang_tbai.php',
            type: 'POST',
            data: {
                id_dh: id_dh,
                lydo: lydo,
            },
            success: function(data) {
                if (data == "") {
                    window.location.reload();
                } else {
                    alert(data);
                }
            }
        })
    });
</script>