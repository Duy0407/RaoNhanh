<?
include("config.php");
$id = getValue('id', 'int', 'GET', 0);
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT']) && $id != 0) {
    $id_user = $_COOKIE['UID'];
    $type_user = $_COOKIE['UT'];

    $list_dh = new db_query("SELECT `dh_id`, `id_nguoi_dh`, `id_nguoi_ban`, `id_spham`, `ghi_chu`, `loai_ttoan`, `tien_ttoan`, `dia_chi_nhanhang`, `trang_thai`,
                            `tgian_xnbh`, `usc_name`, `usc_logo`,`chat365_id`,`usc_id`, `usc_phone`, `new_title`, `new_money`, `new_unit`, `new_user_id`, `new_type`, `new_image`
                            FROM `dat_hang` INNER JOIN `new` ON `new`.`new_id` = `dat_hang`.`id_spham`
                            INNER JOIN `user` ON `user`.`usc_id` = `dat_hang`.`id_nguoi_ban`
                            WHERE `trang_thai` = 3 AND `nguoimua_huydh` != 1 AND `id_nguoi_dh` = $id_user AND `dh_id` = $id ");
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

    <title>Rao v???t mi???n ph?? - Mua b??n t???c th?? | RAONHANH365.VN</title>
    <meta name="keywords" content="Raonhanh365, rao v???t mi???n ph??, trang rao v???t, k??nh mua b??n, qu???ng c??o, mua ban, quang cao, rao vat, ????ng tin mi???n ph??" />
    <meta name="description" content="M???ng x?? h???i Rao v???t mi???n ph?? Vi???t, K??nh mua b??n tr???c tuy???n rao v???t c??c lo???i ????? c??, ????? m???i, ????? Secondhand, rao v???t mi???n ph?? c??ng c??c d???ch v??? gi?? c???c r??? ??u ???? t???t. Qu???ng c??o gian h??ng c???a b???n m???t c??ch t???t nh???t uy t??n nh???t, gi??p s???n ph???m c???a b???n ti???p c???n nhi???u ng?????i h??n, l?? c???u n???i t???t nh???t gi???a ng?????i mua v?? ng?????i b??n." />
    <meta property="og:title" content="Rao v???t mi???n ph?? - Mua b??n t???c th?? | RAONHANH365.VN" />
    <meta property="og:description" content="M???ng x?? h???i Rao v???t mi???n ph?? Vi???t, K??nh mua b??n tr???c tuy???n rao v???t c??c lo???i ????? c??, ????? m???i, ????? Secondhand, rao v???t mi???n ph?? c??ng c??c d???ch v??? gi?? c???c r??? ??u ???? t???t. Qu???ng c??o gian h??ng c???a b???n m???t c??ch t???t nh???t uy t??n nh???t, gi??p s???n ph???m c???a b???n ti???p c???n nhi???u ng?????i h??n. Raonhanh365 '????ng tin mi???n ph?? - mua b??n t???c th??, n??i k???t n???i gi???a ng?????i mua k??? b??n.'" />
    <meta property="og:url" content="https://raonhanh365.vn/" />
    <meta name="copyright" content="Copyright ?? 2017 by raonhanh365.vn" />
    <meta name="abstract" content="Rao v???t mi???n ph?? - Mua b??n t???c th?? | RAONHANH365.VN<" />
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
    <meta name="page-topic" content="Mua b??n rao v???t" />
    <meta name="resource-type" content="Document" />
    <meta name="distribution" content="Global" />
    <link rel="canonical" href="https://raonhanh365.vn" />
    <meta name="google-site-verification" content="8HoYLGUD3DXbNpPr7JHZjAxMghKbHnuSClcHal7OnRA" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />
    <link rel="stylesheet" href="../css/style_new/app.css">

    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />

    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/box-left_pers_seller_prof.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_b.css?v=<?= $css_vs ?>" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_dien.css?v=<?= $version ?>">

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
                    <a href="/quan-ly-don-hang-da-giao-nguoi-mua.html"><img src="/images/bo-sung-raonhanh/muiten-back.svg" alt=""></a>
                    <p class="text-title">Th??ng tin chi ti????t ????n ha??ng</p>
                </div>
                <div class="detail-main">
                    <div class="detail-main-t">
                        <div class="scroll-ngang">
                            <div class="main-t-number">
                                <div class="outtrinh-img">
                                    <img src="/images/bo-sung-raonhanh/outtrinh4.svg" alt="">
                                </div>
                                <div class="outtrinh-text">
                                    <p class="m_1 text_outtrinh">Ch???? xa??c nh????n</p>
                                    <p class="m_2 text_outtrinh">??ang x???? ly??</p>
                                    <p class="m_3 text_outtrinh">??ang giao ha??ng</p>
                                    <p class="m_4 text_outtrinh">??a?? giao</p>
                                    <p class="m_5 text_outtrinh">Hoa??n t????t</p>
                                </div>
                            </div>
                        </div>
                        <div class="main-t-ttkh">
                            <p class="text_title">Th??ng tin kha??ch ha??ng</p>
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
                                    <p class="text_phone">S??T: <?= $row_tin['usc_phone'] ?></p>
                                    <p class="text_address">??i??a chi??: <?= $row_tin['dia_chi_nhanhang'] ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="box-right-rec"></div>
                        <div class="main-t-p">
                            <p class="text_title">Th??ng tin ????n ha??ng</p>
                            <p class="color_orange text_status">??A?? GIAO</p>
                        </div>
                        <div class="main-acp-ttdh">
                            <div class="ttdh-menu">
                                <div class="ttdh-menu-title">
                                    <div class="ttdh-menu-title-img">
                                        <? if ($row_tin['usc_logo'] != "") { ?>
                                            <img src="<?= $row_tin['usc_logo'] ?>" alt="" onerror="this.src=`/images/anh_moi/dai_dien_avt.png`">
                                        <? } else { ?>
                                            <img src="/images/bo-sung-raonhanh/ava.png" alt="">
                                        <? } ?>
                                    </div>
                                    <p class="text_shopname"><?= $row_tin['usc_name'] ?></p>
                                </div>
                                <div class="xemshop">
                                    <? if ($row_tin['new_type'] == 1) { ?>
                                        <a href="/ca-nhan/<?= $row_tin['id_nguoi_ban'] ?>/<?= replaceTitle($row_tin['usc_name']) ?>.html" class="text_xemshop">Xem Shop</a>
                                    <? } else { ?>
                                        <a href="/gian-hang/<?= $row_tin['id_nguoi_ban'] ?>/<?= replaceTitle($row_tin['usc_name']) ?>.html" class="text_xemshop">Xem Shop</a>
                                    <? } ?>
                                </div>
                                <a href="<?= $link_chat ?>" class="chatngay">
                                    <img src="/images/bo-sung-raonhanh/chat-text.svg" alt="">
                                    <p class="text_chat color_orange">Chat ngay</p>
                                </a>
                            </div>
                            <div class="box-right-rec"></div>
                            <div class="bot-ql">
                                <div class="content-bot-ava">
                                    <img src="/pictures/<?= $anh_tin[0] ?>" alt="">
                                </div>
                                <div class="content-bot-acp">
                                    <div class="detail-sp">
                                        <p class="ten_sp color_gray47"><?= $row_tin['new_title'] ?></p>
                                        <P class="text_sp">Ma?? ????n ha??ng: <?= $row_tin['id_spham'] ?> </P>
                                        <p class="text_sp">Nga??y ??????t ha??ng: <?= date('d/m/Y', $row_tin['tgian_xnbh']) ?> &nbsp;&nbsp;<?= date('H:i', $row_tin['tgian_xnbh']) ?></p>
                                        <p class="text_sp">Nga??y thanh toa??n: <?= date('d/m/Y', $row_tin['tgian_xnbh']) ?> &nbsp;&nbsp;<?= date('H:i', $row_tin['tgian_xnbh']) ?></p>
                                    </div>
                                    <div class="acp-ttdh-price">
                                        <p class="text_sp">T????ng ti????n ha??ng: <span class="color_orange num_price"><span class="color_orange num_price"><?= number_format($row_tin['new_money']) ?> <?= $arr_dvtien[$row_tin['new_unit']] ?></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-right-rec"></div>
                        <div class="main-t-text">
                            <p class="text_title">Ph????ng th????c giao ha??ng</p>
                            <div class="text-giaohang">
                                <p class="text_med">Ng??????i ba??n va?? ng??????i mua t???? li??n h???? ph????ng th????c giao ha??ng</p>
                            </div>
                        </div>
                        <div class="box-right-rec"></div>
                        <div class="main-t-note">
                            <p class="text_title">Ghi chu??</p>
                            <div class="input-mar">
                                <input class="input-note" type="text" value="<?= $row_tin['ghi_chu'] ?>" readonly>
                            </div>
                        </div>
                        <div class="box-right-rec"></div>
                        <div class="khach-hang-thanh-toan">
                            <div class="pay-left">
                                <p class="text_title">Ph????ng th????c thanh toa??n</p>
                                <p class="text_med">Ta??i khoa??n ng??n ha??ng</p>
                            </div>
                            <div class="khtt-rec"></div>
                            <div class="pay-right">
                                <p class="text_title align_c">Thanh toa??n</p>
                                <p class="text_price no_italic font_w500">T????ng ????n ha??ng: <?= number_format($row_tin['new_money']) ?> <?= $arr_dvtien[$row_tin['new_unit']] ?></p>
                                <p class="text_price">??a?? thanh toa??n: <?= number_format($row_tin['tien_ttoan']) ?> <?= $arr_dvtien[$row_tin['new_unit']] ?></p>
                                <p class="text_price">S???? ti????n co??n la??i: <?= number_format($row_tin['new_money'] - $row_tin['tien_ttoan']) ?> <?= $arr_dvtien[$row_tin['new_unit']] ?></p>
                            </div>
                        </div>
                        <div class="main-t-btn">
                            <button class="xacnhan-4">??a?? nh????n ????????c ha??ng</button>
                            <button type="button" class="huydon-orange" data="<?= $row_tin['dh_id'] ?>">Y??u c????u hoa??n ti????n/tra?? ha??ng</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="modal-huydon" class="modal">
        <div class="modal-content-huydon">
            <div class="huydon-header">
                <p>Y??u c????u hoa??n ti????n/ tra?? ha??ng</p>
                <span class="close">&times;</span>
            </div>
            <div class="huydon-content">
                <p class="text-modal-trahang">Vui l??ng g???i l???i h??ng cho ng?????i b??n v?? cho bi???t l?? do b???n tr??? h??ng.</p>
                <p class="text-modal-trahang pad_10"> Khi ng?????i b??n nh???n ???????c h??ng, Raonhanh365 s??? ho??n tr??? s??? ti???n b???n ???? thanh to??n/ ?????t c???c tr?????c ???? theo Ch??nh s??ch Thanh to??n ?????m b???o c???a Raonhanh</p>
                <div class="huydon-content-title">
                    <p>Ly?? do hu??y ????n ha??ng<span class="color_red">*</span></p>
                </div>
                <div class="huydon-content-item">
                    <input class="input-huydon" type="text" placeholder="Nh????p ly?? do...">
                </div>
            </div>
            <div class="huydon-footer">
                <button type="button" class="modal-btn-huy" id="">Hu??y bo??</button>
                <button type="button" class="modal-btn-xacnhan" id="xacnhan_huydon" data="">Xa??c nh????n</button>
            </div>
        </div>
    </div>

    <div id="modal_dathang" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="content-xacthuc-img">
                <img src="/images/bo-sung-raonhanh/xacthuc.svg" alt="">
            </div>
            <div class="content-xacthuc-title">
                <div class="content-xacthuc-text">
                    <p class="text-modal-trahang">G???i y??u c???u ho??n ti???n/tr??? h??ng th??nh c??ng ! </p>
                    <p class="text-modal-trahang">B??? ph???n Ch??m s??c kh??ch h??ng s??? li??n h??? v???i b???n sau khi nh???n ???????c y??u c???u n??y</p>
                </div>
            </div>
            <div class="huydon-footer">
                <button type="button" class="modal-btn-xacnhan" id="dong">??o??ng</button>
            </div>

        </div>
    </div>
    <? include("../includes/inc_new/inc_footer.php"); ?>
</body>

</html>
<script type="text/javascript" src="/js/personal_seller_profile.js"></script>
<script type="text/javascript">
    $(".huydon-orange").click(function() {
        var id_dh = $(this).attr("data");
        $("#xacnhan_huydon").attr("data", id_dh);
        $("#modal-huydon").show();
    });

    $(".close, .modal-btn-huy").click(function() {
        $("#modal-huydon").hide();
    });

    $(".close, #dong").click(function() {
        $("#modal_dathang").hide();
        $("#modal-huydon").hide();
        window.location.href = '/quan-ly-don-hang-da-huy-nguoi-mua.html';
    });
    $("#xacnhan_huydon").click(function() {
        var id_dh = $(this).attr("data");
        var text_huy = $("#modal-huydon .input-huydon").val();
        if (text_huy == '') {
            alert("Nh???p l?? do h???y ????n h??ng");
        } else {
            $.ajax({
                url: '/ajax/huy_donhang_dgiao.php',
                type: 'POST',
                data: {
                    id_dh: id_dh,
                    huy_dh: text_huy,
                },
                success: function(data) {
                    if (data == "") {
                        $("#modal_dathang").show();
                    } else {
                        alert(data);
                    }
                }
            })
        }
    });
</script>