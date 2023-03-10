<?
include("config.php");
$id = getValue('id', 'int', 'GET', 0);

if (isset($_COOKIE['UID']) && isset($_COOKIE['UT']) && $id != 0) {
    $us_id = $_COOKIE['UID'];
    $us_type = $_COOKIE['UT'];

    $list_tin = new db_query("SELECT `new_title`, `new_money`, `new_user_id`, `new_image`, `new_unit`, `new_type`, `usc_name`, `usc_logo`, `chat365_id`, `usc_phone` FROM `new`
                            INNER JOIN `user` ON `new`.`new_user_id` = `user`.`usc_id` WHERE `new_id` = $id ");
    $row_tin = mysql_fetch_assoc($list_tin->result);
    $new_image = explode(';', $row_tin['new_image']);

    $diachi_nhang = new db_query("SELECT `dia_chi` FROM `dchi_nhan_hang` WHERE `us_id` = $us_id ");

    $my_id = intval(@$_COOKIE['id_chat365']);
    if ($my_id > 0) {
        $qr_sc = new db_query("SELECT chat365_secret FROM user WHERE chat365_id = '$my_id'");
        $row_sc = mysql_fetch_assoc($qr_sc->result);
        $chat365_secret = $row_sc['chat365_secret'];
    } else {
        $chat365_secret = '';
    }
    $link_chat = get_link_chat365($my_id, $row_tin['chat365_id'], $row_tin['new_user_id'], $row_tin['usc_name'], $row_tin['usc_phone'], '', $chat365_secret);
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

    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/box-left_pers_seller_prof.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/edit_personal_prof_inf.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_dien.css?v=<?= $version ?>">

</head>

<body>
    <? include("../includes/common/inc_header.php"); ?>
    <section class="edit_infor">
        <div class="box-right edit_pers">
            <div class="box-right-detail">
                <div class="detail-title">
                    <p class="text-title-acp color_orange">Xa??c nh????n ????n ha??ng</p>
                </div>
                <div class="detail-main-acp">
                    <div class="detail-main-t">
                        <div class="box-right-rec"></div>
                        <div class="main-acp-ttkh">
                            <div class="ttkh-title">
                                <p class="text_title-acp color_05">Th??ng tin nh????n ha??ng</p>
                                <button type="button" class="btn-address change_address color_orange">Thay ??????i ??i??a chi??</button>
                            </div>
                            <div class="main-t-ttkh-detail">
                                <div class="ttkh-acp">
                                    <!-- <div class="ttkh-acp-left"></div> -->
                                    <div class="ttkh-acp-right thaylai_dchi">
                                        <p class="text_name-acp" data="<?= $_COOKIE['UID'] ?>"><?= $user_name ?></p>
                                        <p class="text_phone">S??T: <?= $usc_phone ?></p>
                                        <p class="text_address diachinhanhang_mn"><input type="radio" checked> ??i??a chi??: <span><?= $usc_address ?></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-right-rec"></div>
                        <div class="main-t-p">
                            <p class="text_title-acp color_05">Th??ng tin ????n ha??ng</p>
                        </div>
                        <div class="main-acp-ttdh" data="<?= $id ?>">
                            <div class="ttdh-menu">
                                <div class="ttdh-menu-title">
                                    <div class="ttdh-menu-title-img">
                                        <img onerror="this.onerror=null; this.src='/images/anh_moi/avatar.png';" src="<?= $row_tin['usc_logo'] ?>" alt="">
                                    </div>
                                    <p class="ten_shop-acp color_gray47"><?= $row_tin['usc_name'] ?></p>
                                </div>
                                <div class="xemshop">
                                    <? if ($row_tin['new_type'] == 1) { ?>
                                        <a href="/ca-nhan/<?= $row_tin['new_user_id'] ?>/<?= $row_tin['usc_name'] ?>.html" class="text_see">Xem shop</a>
                                    <? } else if ($row_tin['new_type'] == 5) { ?>
                                        <a href="/gian-hang/<?= $row_tin['new_user_id'] ?>/<?= $row_tin['usc_name'] ?>.html" class="text_see">Xem shop</a>
                                    <? } ?>
                                </div>
                                <a class="chatngay" href="<?= $link_chat ?>" target="_blank">
                                    <img src="/images/bo-sung-raonhanh/chat-text.svg" alt="">
                                    <p class="text_chat color_orange">Chat ngay</p>
                                </a>
                            </div>
                            <div class="box-right-rec"></div>
                            <div class="bot-ql">
                                <div class="content-bot-ava">
                                    <img onerror="this.onerror=null; this.src='/images/anh_moi/avatar.png';" src="<?= str_replace('../', '/', $new_image[0])  ?>" alt="">
                                </div>
                                <div class="content-bot-acp">
                                    <div class="detail-sp">
                                        <p class="ten_sp color_gray47" data="<?= $row_tin['new_user_id'] ?>"><?= $row_tin['new_title'] ?></p>
                                        <P class="text_sp">Ma?? ????n ha??ng: <?= $id ?></P>

                                    </div>
                                    <div class="acp-ttdh-price">
                                        <p class="text_sp">T????ng ti????n ha??ng: <span class="num_price color_orange"><?= number_format($row_tin['new_money']) ?> <?= $arr_dvtien[$row_tin['new_unit']] ?></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="main-acp-text">
                        <p class="text_title-acp color_05">Ph????ng th????c giao ha??ng</p>
                        <div class="text-giaohang">
                            <p class="text_med">Ng??????i ba??n va?? ng??????i mua t???? li??n h???? ph????ng th????c giao ha??ng</p>
                        </div>
                    </div>
                    <div class="main-t-note">
                        <p class="text_title-acp color_05">Ghi chu?? cho ng??????i ba??n</p>
                        <div class="input-mar">
                            <input class="input-note" type="text" placeholder="Nh????p ghi chu?? cho ng??????i ba??n" name="ghi_chu">
                        </div>
                    </div>
                    <div class="main-pay">
                        <div class="pay-left">
                            <p class="text_title-acp color_05">Ph????ng th????c thanh toa??n</p>
                            <div class="payment-methods">
                                <input type="radio" name="phuong_thuc" checked>
                                <p class="text_med-atm color_gray47">The?? ATM/ CHuy????n khoa??n</p>
                            </div>
                            <p class="cauthongbao">B???n vui l??ng thanh to??n gi?? tr??? ????n h??ng theo s??? t??i kho???n c???a Raonhanh365.vn ????? ???????c ?????m b???o mua h??ng</p>
                        </div>
                    </div>
                    <div class="payment-amount">
                        <p class="text_title-acp color_05">S???? ti????n thanh toa??n</p>
                        <div class="payment-amount-top">
                            <div class="pay-choices">
                                <label class="pay-choices-1" data="<?= number_format($row_tin['new_money']) ?>">
                                    <input type="radio" name="thanh_toan" class="ttoan_tien" value="1" checked>
                                    <p class="text_med-atm color_gray47">Thanh toa??n toa??n b???? s???? ti????n</p>
                                </label>
                                <p class="num_price-acp color_orange"><?= number_format($row_tin['new_money']) ?> <?= $arr_dvtien[$row_tin['new_unit']] ?></p>
                            </div>
                            <div class="pay-choices">
                                <label class="pay-choices-1" data="<?= number_format($row_tin['new_money'] * (10 / 100)) ?>" data1="<?= number_format($row_tin['new_money'] - ($row_tin['new_money'] * (10 / 100))) ?>">
                                    <input type="radio" name="thanh_toan" class="ttoan_tien" value="2">
                                    <p class="text_med-atm color_gray47">??????t co??c (10%)</p>
                                </label>
                                <p class="num_price-acp color_orange"><?= number_format($row_tin['new_money'] * (10 / 100)) ?> <?= $arr_dvtien[$row_tin['new_unit']] ?></p>
                                <p class="sotienconlai_ttoan">S??? ti???n c??n l???i t??? thanh to??n v???i ng?????i b??n</p>
                            </div>
                        </div>
                        <div class="payment-amount-bot">
                            <p class="sum_pay color_gray47 tong_ttoan">T????ng thanh toa??n: <span><?= number_format($row_tin['new_money']) ?></span> <?= $arr_dvtien[$row_tin['new_unit']] ?></p>
                            <p class="sum_pay color_gray47 tien_clai">S???? ti????n co??n la??i: <span>0</span> <?= $arr_dvtien[$row_tin['new_unit']] ?></p>
                        </div>
                    </div>
                    <div class="nganhang_ckhoan">
                        <p class="thongtin_taikhoan">Th??ng tin t??i kho???n</p>
                        <div class="ttin_tkhoan_nhang">
                            <p class="ttin_tkctien">T??n ng??n h??ng: <span>BIDV</span></p>
                            <p class="ttin_tkctien">Ch??? t??i kho???n: <span>TR????NG V??N TR???C</span></p>
                            <p class="ttin_tkctien">S??? t??i kho???n: <span>21610000775434</span></p>
                            <p class="ttin_tkctien">Chi ti???t: <span>Ho??ng Mai, H?? N???i</span></p>
                            <p class="ttin_tkctien">N???i dung chuy???n ti???n: <span>[T??i kho???n email ho???c s??? ??i???n tho???i] - Thanh to??n mua h??ng</span></p>
                        </div>
                    </div>
                    <div class="purchase-policy">
                        <input class="csach_dbao" type="checkbox" name="csach_dbao" checked>
                        <p class="text_med-atm color_gray47">Hi????u ro?? va?? ??????ng y?? v????i <a href="#"><span class="color_orange">chi??nh sa??ch mua ha??ng</span></a> cu??a Raonhanh365</p>
                    </div>
                    <div class="main-t-btn">
                        <button type="button" class="xacnhan-orange" id="dathang">??????t ha??ng</button>
                        <button type="button" class="huydon-2" id="btn-huydon">Hu??y ????n</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="modal_change_address" class="modal">
        <div class="modal-content-huydon">
            <div class="md-change-address-title">
                <div class="md-change-address-title-img back-md">
                    <img src="/images/bo-sung-raonhanh/muiten-back.svg" alt="">
                </div>
                <p>??i??a chi?? nh????n ha??ng</p>
                <div class="md-change-address-close">
                    <span class="close color_fff">&times;</span>
                </div>
            </div>
            <div class="md-change-address">
                <div class="ttkh-acp">
                    <div class="ttkh-acp-right">
                        <p class="color_orange font_s20 line_h23 font_w500"><?= $user_name ?></p>
                        <p class="font_s16 line_h19 font_w400">S??T: <?= $usc_phone ?></p>
                        <label class="diachi_dbiet">
                            <input type="radio" name="dia_chi" onclick="thaydia_chi(this)" checked>
                            <p class="font_s16 line_h19 font_w400"> ??i??a chi??: <?= $usc_address ?></p>
                        </label>
                        <? if (mysql_num_rows($diachi_nhang->result) > 0) {
                            while ($row_dc = mysql_fetch_assoc($diachi_nhang->result)) { ?>
                                <label class="diachi_dbiet">
                                    <input type="radio" name="dia_chi" onclick="thaydia_chi(this)">
                                    <p class="font_s16 line_h19 font_w400"> ??i??a chi??: <?= $row_dc['dia_chi'] ?></p>
                                </label>
                        <? }
                        } ?>
                    </div>
                </div>
                <div class="insert-address">
                    <div class="input-mar them_diachi" style="display: none;">
                        <input class="input-note" type="text" placeholder="Nh????p ??i??a chi??" name="them-dia-chi"></input>
                        <button type="button" class="them" onclick="them_dchi(this)" data="<?= $_COOKIE['UID'] ?>">Th??m</button>
                    </div>
                    <p class="font_w400 font_s16 font_h19 color_orange" id="them_dc">+ Th??m ??i??a chi??</p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal popup_dhang_tcong">
        <div class="modal-content">
            <div class="content-xacthuc-img">
                <img src="/images/bo-sung-raonhanh/xacthuc.svg" alt="">
            </div>
            <div class="content-xacthuc-title">
                <p>X??c nh???n ????n h??ng th??nh c??ng</p>
            </div>
            <div class="huydon-footer">
                <button type="button" class="btn-dong btx_dongpou sh_cursor">??o??ng</button>
            </div>
        </div>
    </div>

    <div class="modal popup_dathang">
        <div class="modal-content">
            <div class="content-xacthuc-title">
                <p class="tieu_de">SAU KHI CHUY???N TI???N TH??NH C??NG QU?? KH??CH H??NG VUI L??NG G???I TH??NG B??O CHUY???N TI???N CHO H??? TH???NG THEO M???T TRONG C??C C??CH SAU</p>
                <div class="cach_tbao_chkhoan">
                    <div class="nut_tbao">
                        <a href="javascript:void(Tawk_API.toggle())">Th??ng b??o tr??n Chatbox</a>
                    </div>
                    <div class="nut_tbao">
                        <a rel="nofollow" href="skype:live:binhminhmta123?chat">Th??ng b??o qua Skype</a>
                    </div>
                    <div class="nut_tbao">
                        <a rel="nofollow" target="_blank" href="https://chat365.timviec365.vn/chat-NTYzODc=">Th??ng b??o qua Chat365</a>
                    </div>
                    <div class="nut_tbao">
                        <a rel="nofollow" href="tel:1900633682">Th??ng b??o qua Hotline</a>
                    </div>
                </div>
            </div>
            <div class="huydon-footer">
                <button type="button" class="btn-dong btx_dongpou sh_cursor">??o??ng</button>
            </div>
        </div>
    </div>

    <? include("../includes/inc_new/inc_footer.php"); ?>
    <div id="load_tawk"></div>

</body>

</html>
<script type="text/javascript">
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > 50) {
            if ($('#load_tawk').hasClass('tawk_add') == false) {
                $('#load_tawk').append('<script type="text/javascript">var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();(function(){var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0]; s1.async=true; s1.src="https://embed.tawk.to/5978135a5dfc8255d623ef25/default"; s1.charset="UTF-8"; s1.setAttribute("crossorigin","*"); s0.parentNode.insertBefore(s1,s0);})();<\/script>');
                $('#load_tawk').addClass('tawk_add');
            }
        }
    });
    $(".ttoan_tien").click(function() {
        var ttoan = $(this).val();
        if (ttoan == 1) {
            var tong_tien = $(this).parents("label").attr("data");
            $(".tong_ttoan").find("span").text(tong_tien);
            $(".tien_clai").find("span").text(0);
        } else if (ttoan == 2) {
            var tong_tien = $(this).parents("label").attr("data");
            var tien_clai = $(this).parents("label").attr("data1");
            $(".tong_ttoan").find("span").text(tong_tien);
            $(".tien_clai").find("span").text(tien_clai);
        }
    })

    $(".change_address").click(function() {
        $("#modal_change_address").show();
    });

    $(".close, .back-md").click(function() {
        $("#modal_change_address").hide();
    });
    $("#them_dc").click(function() {
        $(".them_diachi").show();
    });

    $(".popup_dhang_tcong .btn-dong").click(function() {
        $(this).parents(".popup_dhang_tcong").hide();
        $(".popup_dathang").show();
    });

    $(".popup_dathang .btn-dong").click(function() {
        window.location.href = "/quan-ly-don-hang-mua.html";
    });

    $("#dathang").click(function() {
        var id_nguoi_dh = $(".text_name-acp").attr("data");
        var id_nguoi_ban = $(".ten_sp").attr("data");
        var dchi_nhanhang = $(".text_address").find("span").text();
        var new_id = $(".main-acp-ttdh").attr("data");
        var ghi_chu = $("input[name='ghi_chu']").val();
        var loai_ttoan = $("input[name='thanh_toan']:checked").val();
        var tien_ttoan = $(".tong_ttoan").find("span").text();
        if ($("input[name='csach_dbao']").is(":checked")) {
            $.ajax({
                url: '/ajax/xac_nhan_dhang.php',
                type: 'POST',
                data: {
                    id_nguoi_dh: id_nguoi_dh,
                    id_nguoi_ban: id_nguoi_ban,
                    new_id: new_id,
                    dchi_nhanhang: dchi_nhanhang,
                    ghi_chu: ghi_chu,
                    loai_ttoan: loai_ttoan,
                    tien_ttoan: tien_ttoan,
                },
                success: function(data) {
                    if (data == "") {
                        $(".popup_dhang_tcong").show();
                    } else {
                        alert("data");
                    }
                }
            })
        } else {
            alert("Ch???n ?????ng ?? v???i ch??nh s??ch b???o m???t");
        }
    });

    function them_dchi(id) {
        var diachi_moi = $(id).parents(".them_diachi").find(".input-note").val();
        var us_id = $(id).attr("data");
        if (diachi_moi != "") {
            var html = '<label class="diachi_dbiet"><input type="radio" name="dia_chi" onclick="thaydia_chi(this)"><p class="font_s16 line_h19 font_w400"> ??i??a chi??: ' + diachi_moi + '</p></label>';
            $.ajax({
                url: '/ajax/them_diachi_nhanhang.php',
                type: 'POST',
                data: {
                    us_id: us_id,
                    diachi_moi: diachi_moi,
                },
                success: function(data) {
                    if (data == "") {
                        $("#modal_change_address .ttkh-acp-right").append(html);
                        $(id).parents(".them_diachi").find(".input-note").val('');
                    }
                }
            })
        } else {
            alert("Nh???p ?????a ch???");
        }
    };


    function thaydia_chi(id) {
        var diachi = $(id).parents("label").find("p").text();
        var html = `<input type="radio"checked>` + diachi;
        $(".thaylai_dchi").find(".text_address").html(html);
    }
</script>