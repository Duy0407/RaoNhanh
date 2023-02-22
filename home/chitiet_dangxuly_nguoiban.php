<?
include("config.php");
$id = getValue('id', 'int', 'GET', 0);
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT']) && $id != 0) {
    $id_user = $_COOKIE['UID'];
    $type_user = $_COOKIE['UT'];

    $list_dh = new db_query("SELECT `dh_id`,`id_nguoi_dh`, `id_nguoi_ban`, `id_spham`, `ghi_chu`, `loai_ttoan`, `tien_ttoan`, `dia_chi_nhanhang`, `trang_thai`,
                            `tgian_xnbh`, `usc_name`, `usc_logo`,`chat365_id`,`usc_id`, `usc_phone`, `new_title`, `new_money`, `new_unit`, `new_user_id`, `new_type`, `new_image`
                            FROM `dat_hang` INNER JOIN `new` ON `new`.`new_id` = `dat_hang`.`id_spham`
                            INNER JOIN `user` ON `user`.`usc_id` = `dat_hang`.`id_nguoi_dh`
                            WHERE `trang_thai` = 1 AND `id_nguoi_ban` = $id_user AND `dh_id` = $id ");
    $row_tin = mysql_fetch_assoc($list_dh->result);
    $new_iamge = $row_tin['new_image'];
    $anh_tin = explode(',', $new_iamge);

    $my_id = intval(@$_COOKIE['id_chat365']);
    if ($my_id > 0) {
        $qr_sc = new db_query("SELECT chat365_secret FROM user WHERE chat365_id = '$my_id'");
        $row_sc = mysql_fetch_assoc($qr_sc->result);
        $chat365_secret = $row_sc['chat365_secret'];
    } else {
        $chat365_secret = '';
    }
    $link_chat = get_link_chat365($my_id, $row_tin['chat365_id'], $row_tin['usc_id'], $row_tin['usc_name'], $row_tin['usc_phone'], '', $chat365_secret);
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
        <div class="box-right edit_pers">
            <div class="box-right-detail">
                <div class="detail-top">
                    <a href="/quan-ly-don-hang-dang-xu-ly.html">
                        <img src="/images/bo-sung-raonhanh/muiten-back.svg" alt="">
                    </a>
                    <p class="text-title">Thông tin chi tiết đơn hàng</p>
                </div>
                <div class="detail-main">
                    <div class="detail-main-t">

                        <div class="scroll-ngang">
                            <div class="main-t-number">
                                <div class="outtrinh-img">
                                    <img src="/images/bo-sung-raonhanh/outtrinh2.svg" alt="">
                                </div>
                                <div class="outtrinh-text">
                                    <p class="m_1 text_outtrinh">Chờ xác nhận</p>
                                    <p class="m_2 text_outtrinh">Đang xử lý</p>
                                    <p class="m_3 text_outtrinh">Đang giao hàng</p>
                                    <p class="m_4 text_outtrinh">Đã giao</p>
                                    <p class="m_5 text_outtrinh">Hoàn tất</p>
                                </div>
                            </div>
                        </div>
                        <div class="main-t-ttkh">
                            <p class="text_title">Thông tin khách hàng</p>
                            <div class="main-t-ttkh-detail">
                                <div class="detail-ava">
                                    <? if ($row_tin['usc_logo'] != "") { ?>
                                        <img src="<?= $row_tin['usc_logo'] ?>" alt="" onerror="this.src=`/images/anh_moi/dai_dien_avt.png`">
                                    <? } else { ?>
                                        <img src="/images/bo-sung-raonhanh/ava.png" alt="">
                                    <? } ?>
                                </div>
                                <div class="ttkh-detail">
                                    <p class="color_orange text_name"><?= $row_tin['usc_name'] ?></p>
                                    <p class="text_phone">SĐT: <?= $row_tin['usc_phone'] ?></p>
                                    <p class="text_address">Địa chỉ: <?= $row_tin['dia_chi_nhanhang'] ?></p>
                                    <a href="<?= $link_chat ?>" class="content-top-item-3">
                                        <div class="item-3-img">
                                            <img src="/images/bo-sung-raonhanh/chat-text.svg" alt="">
                                        </div>
                                        <div class="item-3-title">
                                            <p class="text_chat">Chat ngay</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="box-right-rec"></div>
                        <div class="main-t-p">
                            <p class="text_title">Thông tin đơn hàng</p>
                            <p class="color_orange text_status">ĐANG XỬ LÝ</p>
                        </div>
                        <div class="box-right-content-ttdh">
                            <div class="bot-ql">
                                <div class="content-bot-ava">
                                    <img src="<?= $anh_tin[0] ?>" alt="" onerror="this.src=`/images/anh_moi/dai_dien_avt.png`">
                                </div>
                                <div class="content-bot-c">
                                    <div class="detail-sp">
                                        <p class="ten_sp color_gray47"><?= $row_tin['new_title'] ?></p>
                                        <P class="text_sp">Mã đơn hàng: <?= $row_tin['id_spham'] ?></P>
                                        <p class="text_sp">Ngày đặt hàng: <?= date('d/m/Y', $row_tin['tgian_xnbh']) ?> &nbsp;&nbsp;<?= date('H:i', $row_tin['tgian_xnbh']) ?></p>
                                        <p class="text_sp">Ngày thanh toán: <?= date('d/m/Y', $row_tin['tgian_xnbh']) ?> &nbsp;&nbsp;<?= date('H:i', $row_tin['tgian_xnbh']) ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="sp-price">
                                <p class="text_sp">Tổng tiền hàng: <span class="color_orange num_price"><?= number_format($row_tin['new_money']) ?> <?= $arr_dvtien[$row_tin['new_unit']] ?></span></p>
                                <p class="text_price">Đã thanh toán: <span class="color_orange num_price"><?= number_format($row_tin['tien_ttoan']) ?> <?= $arr_dvtien[$row_tin['new_unit']] ?></span></p>
                                <p class="text_price">Số tiền còn lại: <span class="color_orange num_price"><?= number_format($row_tin['new_money'] - $row_tin['tien_ttoan']) ?> <?= $arr_dvtien[$row_tin['new_unit']] ?></span></p>
                            </div>
                        </div>
                        <div class="box-right-rec"></div>
                        <div class="main-t-text">
                            <p class="text_title">Phương thức giao hàng</p>
                            <div class="text-giaohang">
                                <p class="text_med">Người bán và người mua tự liên hệ phương thức giao hàng</p>
                            </div>
                        </div>
                        <div class="box-right-rec"></div>
                        <div class="main-t-note">
                            <p class="text_title">Ghi chú</p>
                            <div class="input-mar">
                                <input class="input-note" type="text" value="<?= $row_tin['ghi_chu'] ?>" readonly>
                            </div>
                        </div>
                        <div class="box-right-rec"></div>
                        <div class="main-pay">
                            <div class="pay-left">
                                <p class="text_title">Phương thức thanh toán</p>
                                <p class="text_med">Tài khoản ngân hàng</p>
                            </div>

                        </div>
                        <div class="main-t-btn">
                            <button class="xacnhan-2" data="<?= $row_tin['dh_id'] ?>" data1="2">Xác nhận</button>
                            <button type="button" class="huydon-2" data="<?= $row_tin['dh_id'] ?>">Hủy đơn</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <? include('../modals/nban_huydh.php'); ?>

    <div id="modal_dathang" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
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

    <? include("../modals/xnhan_giaohang.php"); ?>
    <? include("../includes/inc_new/inc_footer.php"); ?>

</body>

</html>
<script type="text/javascript" src="/js/personal_seller_profile.js"></script>
<script type="text/javascript">
    $(".huydon-2").click(function() {
        var id_dh = $(this).attr("data");
        $("#modal-huydon #xacnhan_huydon").attr("data", id_dh);
        $("#modal-huydon").show();
    });

    $(".close, .modal-btn-huy").click(function() {
        $("#modal-huydon").hide();
    });

    $("#dong").click(function() {
        $("#modal_dathang").hide();
        window.location.href = "/quan-ly-don-hang-da-huy.html";
    });
    $(".xacnhan-2").click(function() {
        var id_dh = $(this).attr("data");
        var tthai = $(this).attr("data1");
        $("#modal_giaohang .modal-btn-xacnhan").attr("data", id_dh);
        $("#modal_giaohang .modal-btn-xacnhan").attr("data1", tthai);
        $("#modal_giaohang").show();
    });

    $(".modal-btn-huy, .close").click(function() {
        $("#modal_giaohang").hide();
    });
</script>